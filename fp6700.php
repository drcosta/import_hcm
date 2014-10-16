<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "RUR";

$db = new connection($banco);

//$result_ori = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

$result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

while ($row_ori = pg_fetch_object($result_ori)) {

  $acss_ori = $row_ori->acss;

  $result = $db->query("SELECT * FROM ds041 WHERE acss = '$acss_ori' ORDER BY exer ASC, mesf ASC");
  $num = 1;
  $ctrl = 0;

  while ($row = pg_fetch_object($result)) {

    $acss = $row->acss;
    $mes = $row->mesf;
    $ano = $row->exer;
    $msal = $row->msal;
    $csal = $row->csal;
    $tboc = $row->tboc;

    $emp_estab = recuperaEmpresaEstab($acss, $banco);

    if ($emp_estab["estabelecimento"] == "61") {
      $cat_sal = "2";
    } else if ($banco == "URB" || $banco == "URB_RV") {
      $cat_sal = "1";
    } else if ($banco == "RUR" || $banco == "RUR_RV") {
      $cat_sal = "5";
    }

    $motivo_alt = "10";                 // Motivo da alteração salarial: 10 - Acordo coletivo
    $cod_nivel = "0";                   // Código do nível: 0 - Zé Ruela
    $hrs_padrao = "220000";             // Horas padrao catedoria
    $hrs_mes = "220000";                // Horas padrao mesal
    $termino = "31129999";              // Data de vigência
    $uso_dtsul = "";                    // Uso interno datasul
    $cod_sis_externo = "";              // Código registro sistema externo
    $tab_sal = "N";                     // Indicador se considera tabela de salários
    $cod_tab_sal = "";                  // Código da tabela de salários
    $fx_tab_sal = "";                   // Faixa salarial da tabela
    $nv_tab_fx = "";                    // Nível salarial da faixa
    $tp_cargo = "1";                    // Tipo de cargo: 1 - Cargo

    if ($ctrl != $msal && $msal > 0 && $emp_estab[empresa] != "00") {
      echo "histsal;";                                      // Constante
      echo $num . ";";                                      // Número do registro
      echo $emp_estab[empresa] . ";";                       // Código da empresa
      echo $emp_estab[estabelecimento] . ";";               // Código do estabelecimento
      echo $cat_sal . ";";                                  // Código da categoria salarial
      echo removeDigito($acss) . ";";                       // Matrícula sem dígito
      echo $motivo_alt . ";";                               // Motivo da alteração salarial: 10 - Acordo coletivo
      echo "01" . $mes . $ano . ";";                        // Data da alteração do salário
      echo intval($tboc) . ";";                             // Código do cargo
      echo $cod_nivel . ";";                                // Código do nível: 0 - Zé Ruela
      echo str_replace('.', '', $msal + $csal) . "00" . ";";        // Valor do salário
      echo $hrs_padrao . ";";                               // Horas padrao categoria
      echo $hrs_mes . ";";                                  // Horas padrao mesal
      echo "01" . $mes . $ano . ";";                        // Data de vigência
      echo $uso_dtsul . ";";                                // Uso interno datasul
      echo $cod_sis_externo . ";";                          // Código registro sistema externo
      echo $tab_sal . ";";                                  // Indicador se considera tabela de salários
      echo $cod_tab_sal . ";";                              // Código da tabela de salários
      echo $fx_tab_sal . ";";                               // Faixa salarial da tabela
      echo $nv_tab_fx . ";";                                // Nível salarial da faixa
      echo $tp_cargo . ";";                                 // Tipo de cargo: 1 - Cargo
      echo $funcao . ";";                                   // Função: 1 - Ativo
      echo $termino;                                        // Termino
//      echo "<br />";
      echo "\n";
      $num ++;
      $ctrl = $msal;
    }
  }
}
echo "\n Fim da script";
?>