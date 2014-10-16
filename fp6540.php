<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "RUR";

$db = new connection($banco);

$num = 1;

//$result_ori = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

$result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

while ($row_ori = pg_fetch_object($result_ori)) {

  $acss_ori = $row_ori->acss;

// Roda todas as tabelas
// Vai demorar muito
  for ($i = 1; $i <= 12; $i++) {
//for ($i = 1; $i <= 1; $i++) {
    if ($i <= 9) {
      $mes = "0" . $i;
      $tabela = "ds0400" . $i;
    } else {
      $mes = $i;
      $tabela = "ds040" . $i;
    }



    $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' ORDER BY acss ASC ");

    while ($row = pg_fetch_object($result)) {

      $acss = $row->acss;
      $emp_estab = recuperaEmpresaEstab($acss, $banco);

      if ($i <= 9) {
        $dt_pag = "010";
        $dt_pag .= $mes + 1;
      } else if ($i <= 11) {
        $dt_pag = "01";
        $dt_pag .= $mes + 1;
      } else {
        $dt_pag = "0101";
      }

      /**
       * Se o tipo de folha for 1, o número da parcela será 9.
       * Caso contrário será 1 - Confirmar com Donizette.
       */
      if ($banco == "rur" && $row->cdnn == "191") {
        $tipo_folha = 2;
        $num_parcela = 1;
      } else if ($row->cdnn == "008") {
        $tipo_folha = 2;
        $num_parcela = 1;
      } else if ($row->cdnn == "009") {
        $tipo_folha = 3;
        $num_parcela = 1;
      } else if ($row->cdnn == "010" && $i == 11) {
        $tipo_folha = 4;
        $num_parcela = 1;
      } else {
        $tipo_folha = 1;
        $num_parcela = 9;
      }

      /**
       * Como foi o VRH que cálculo o evento, a informação de quantidade não deve existir.
       */
      $quantidade = "";

      /**
       * Deixando a base como 00. Verificar impacto
       */
      $base = "00";

      $valor = str_replace('', '', $row->valo);
      if ($valor < 0) {
        $valor = $valor * -1;
      } else {

      }

      /**
       * Sinal do valor - ou +
       * Deixado em branco
       */
      $sinal = "";

      $ano = $row->exer;
      $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' AND exer = '$ano' AND mesf = '$mes'");
      $row2 = pg_fetch_object($result2);
      $sal_total = $row2->msal + $row2->csal;

      echo "movtoclc;";                                          // Constante
      echo $num . ";";                                          // Número do registro
      echo $emp_estab["empresa"] . ";";                         // Número da empresa
      echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
      echo removeDigito($acss) . ";";                           // Matrícula sem dígito
      echo $mes . ";";                                          // Mês de referencia
      echo $ano . ";";                                          // Ano de referencia
      echo $dt_pag . $row->exer . ";";                          // Data de pagamento
      echo $tipo_folha . ";";                                   // Tipo de folha
      echo $num_parcela . ";";                                  // Número da parcela
      echo $row->cdnn . ";";                                    // Código do evento
      echo $quantidade . ";";                                   // Quantidade
      echo $base . ";";                                         // Base de calculo
      echo number_format($valor, 2, '', '') . ";";              // Valor
      echo $sinal . ";";                                        // Sinal do valor
      echo number_format($sal_total / 220, 2, '', '') . ";";    // Salario hora do funcionário
      echo number_format($sal_total, 2, '', '');                // Salario atual do funcionario
//      echo "<br />";
      echo "\n";
      $num++;
    }
  }
}
