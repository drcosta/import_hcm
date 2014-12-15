<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR', 'RUR_RV', 'URB', 'URB_RV');

foreach ($bancos as $banco) {
  $arquivo = null;
  $db = new connection($banco);

  $num = 1;

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

    $emp_estab = null;
    $empresa = null;
    $estabelecimento = null;
    $matricula = null;
    $ano = null;
    $tipo_folha = null;
    $parcela = null;
    $evento = null;
    $horas = null;
    $base = null;
    $valor = null;
    $sal_hora = null;
    $sal_total = null;
    $dt_pag = null;
    $sinal = null;
    $sal_hora = null;
    $sal_total = null;

    $emp_estab = recuperaEmpresaEstab($acss_ori, $banco);
    $empresa = $emp_estab["empresa"];
    $estabelecimento = $emp_estab["estabelecimento"];
    $matricula = removeDigito($acss_ori);
    $tipo_folha = 1;
    $parcela = 9;
    $evento = 511;

    for ($i = 1; $i <= 12; $i++) {
      if ($i <= 9) {
        $mes = "0" . $i;
        $tabela = "ds0400" . $i;
      } else {
        $mes = $i;
        $tabela = "ds040" . $i;
      }

      for ($ano = 1987; $ano <= 2015; $ano++) {

        if ($i <= 8) {
          $dt_pag = "010";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
        } else if ($i == 9) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
        } else if ($i <= 11) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
        } else {
          $dt_pag = "0101";
          $dt_pag .= $ano + 1;
        }

        $valor = 0;
        $base = 0;
        $result = $db->query("SELECT * FROM $tabela WHERE exer = '$ano' AND acss = '$acss_ori' AND (cdnn = '002' OR cdnn = '016' OR cdnn = '187' OR cdnn = '188')");

        if (pg_num_rows($result) >= 1) {

          while ($row = pg_fetch_object($result)) {

            if (trim($row->cdnn) == '002' || trim($row->cdnn) == '016') {
              if (trim($row->valo) > 0) {
                $valor += trim($row->valo);
              } else {
                $valor += (trim($row->valo) * -1);
              }
            } else if (trim($row->cdnn) == '187' || trim($row->cdnn) == '188') {
              if (trim($row->valo) > 0) {
                $base += trim($row->valo);
              } else {
                $base += (trim($row->valo) * -1);
              }
            }
          }

          if ($base == 0) {

            $result = $db->query("SELECT * FROM $tabela WHERE exer = '$ano' AND acss = '$acss_ori' AND cdnn = '144'");
            $row = pg_fetch_object($result);
            if (pg_num_rows($result) == 1) {
              if (trim($row->valo) > 0) {
                $base = trim($row->valo);
                echo "\n\n\n\n\n\n144 + " . $base;
              } else {
                $base = (trim($row->valo) * -1);
                echo "\n\n\n\n\n\n144 - " . $base;
              }
            } else {
              $result = $db->query("SELECT * FROM $tabela WHERE exer = '$ano' AND acss = '$acss_ori' AND cdnn = '150'");
              $row = pg_fetch_object($result);
              if (pg_num_rows($result) == 1) {
                if (trim($row->valo) > 0) {
                  $base = trim($row->valo);
                  echo "\n\n\n\n\n\n150 + " . $base;
                } else {
                  $base = (trim($row->valo) * -1);
                  echo "\n\n\n\n\n\n150 -" . $base;
                }
              } else {
                $result = $db->query("SELECT * FROM $tabela WHERE exer = '$ano' AND acss = '$acss_ori' AND cdnn = '173'");
                $row = pg_fetch_object($result);
                if (pg_num_rows($result) == 1) {
                  if (trim($row->valo) > 0) {
                    $base = trim($row->valo);
                    echo "\n\n\n\n\n\n173 + " . $base;
                  } else {
                    $base = (trim($row->valo) * -1);
                    echo "\n\n\n\n\n\n173 - " . $base;
                  }
                }
              }
            }
          }

          $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss_ori' AND exer = '$ano' AND mesf = '$mes'");
          $row2 = pg_fetch_object($result2);
          $sal_hora = zero_esq(number_format(($row2->msal + $row2->csal) / 220, 3, '', ''), 10);
          $sal_total = zero_esq(number_format($row2->msal + $row2->csal, 3, '', ''), 10);

          $valor = zero_esq(number_format($valor, 2, '', ''), 11);
          $base = zero_esq(number_format($base, 2, '', ''), 11);

          if ($matricula == '00000067' || $matricula == '00001925' && ($ano . $mes <= 201403)) {
            $estabelecimento = 12;
          }
          
          if ($matricula == '00000183' && $banco == 'URB_RV') {
            $matricula = '00000173';
          }

          $arquivo .= "movtoclc;";                             // Constante
          $arquivo .= zero_esq($num, 5) . ";";                 // Número do registro
          $arquivo .= $empresa . ";";                          // Número da empresa
          $arquivo .= $estabelecimento . ";";                  // Número do estabelecimento
          $arquivo .= $matricula . ";";                        // Matrícula sem dígito
          $arquivo .= $mes . ";";                              // Mês de referencia
          $arquivo .= $ano . ";";                              // Ano de referencia
          $arquivo .= $dt_pag . ";";                           // Data de pagamento
          $arquivo .= $tipo_folha . ";";                       // Tipo de folha
          $arquivo .= $parcela . ";";                          // Número da parcela
          $arquivo .= $evento . ";";                           // Código do evento
          $arquivo .= $horas . ";";                            // Quantidade
          $arquivo .= $base . ";";                             // Base de calculo
          $arquivo .= $valor . ";";                            // Valor
          $arquivo .= $sinal . ";";                            // Sinal do valor
          $arquivo .= $sal_hora . ";";                         // Salario hora do funcionário
          $arquivo .= $sal_total;                              // Salario atual do funcionario
          $arquivo .= "\n";
//          $arquivo .= "<br />";
//          echo $arquivo;

          $num++;
        }
      }
    }
  }
  unlink("./files/fp6540-511-" . $banco . ".lst");
  $fp = fopen("./files/fp6540-511-" . $banco . ".lst", "a");
  $escreve = fwrite($fp, $arquivo);
  fclose($fp);
}



//echo "<br /> Fim da script";
echo "\n Fim da script";
