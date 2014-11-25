<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR', 'RUR_RV');

foreach ($bancos as $banco) {

  $db = new connection($banco);

  $num = 1;

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

    for ($i = 1; $i <= 12; $i++) {
      if ($i <= 9) {
        $mes = "0" . $i;
        $tabela = "_ds0400" . $i;
      } else {
        $mes = $i;
        $tabela = "_ds040" . $i;
      }

      $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' ORDER BY acss ASC ");

      while ($row = pg_fetch_object($result)) {

        $acss = $row->acss;
        $evento = trim($row->cdnn);
        $emp_estab = recuperaEmpresaEstab($acss, $banco);

        if ($i <= 8) {
          $dt_pag = "010";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else if ($i == 9) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else if ($i <= 11) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else {
          $dt_pag = "0101";
          $dt_pag .= $row->exer + 1;
        }

        $info_verba = "";
        $quantidade = "";

        $info_verba = info_verba($evento, $banco);

        if ($info_verba["horas"] == "S") {
          if (($row->hors / 60 ) > 220) {
            $quantidade = "220000";
          } else {
            $quantidade = number_format(($row->hors / 60), 3, '', '');
          }
        }

        $tipo_folha = trim($info_verba["tfolha"]);
        $num_parcela = trim($info_verba["nparcela"]);

        $valor = $row->valo;

        if ($valor < 0) {
          $valor = $valor * -1;
        }

        if ($evento == '371' && $i == '12') {
          $dt_pag = '0112' . $row->exer;
        }

        if ($evento == "419" && $i < '12') {
          $tipo_folha = '1';
          $num_parcela = '9';
        }

        if ($evento == "419" && $i == '12') {
          $tipo_folha = '3';
          $num_parcela = '9';
          $dt_pag = '0112' . $row->exer;
        }

        if ($evento == "532" && $i < '12') {
          $tipo_folha = '1';
          $num_parcela = '9';
        }

        if ($evento == "532" && $i == '12') {
          $tipo_folha = '3';
          $num_parcela = '9';
          $dt_pag = '0112' . $row->exer;
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

        echo "movtoclc;";                                         // Constante
        echo $num . ";";                                          // Número do registro
        echo $emp_estab["empresa"] . ";";                         // Número da empresa
        echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
        echo removeDigito($acss) . ";";                           // Matrícula sem dígito
        echo $mes . ";";                                          // Mês de referencia
        echo $ano . ";";                                          // Ano de referencia
        echo $dt_pag . ";";                                       // Data de pagamento
        echo $tipo_folha . ";";                                   // Tipo de folha
        echo $num_parcela . ";";                                  // Número da parcela
        echo $evento . ";";                                       // Código do evento
        echo $quantidade . ";";                                   // Quantidade
        echo $base . ";";                                         // Base de calculo
        echo number_format($valor, 2, '', '') . ";";              // Valor
        echo $sinal . ";";                                        // Sinal do valor
        echo number_format($sal_total / 220, 2, '', '') . ";";    // Salario hora do funcionário
        echo number_format($sal_total, 2, '', '');                // Salario atual do funcionario
        echo "<br />";
//        echo "\n";
        $num++;
      }
    }
  }
}

echo '\n Fim da scripts';
