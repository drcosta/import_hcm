<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR', 'RUR_RV', 'URB', 'URB_RV');

$num = 1;


foreach ($bancos as $banco) {
  $db = new connection($banco);

  $num = 1;

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

    for ($i = 1; $i <= 12; $i++) {
      if ($i <= 9) {
        $mes = "0" . $i;
        $tabela = "ds0400" . $i;
      } else {
        $mes = $i;
        $tabela = "ds040" . $i;
      }

      $ler = file('./verbas_c.csv');
      foreach ($ler as $linha) {
        $explode = explode(';', $linha);
        list($vrn, $hr, $vlr, $tipo_folha, $num_parcela, $hcm) = $explode;

        $vrh = trim($vrh);
        $tipo_folha = trim($tipo_folha);
        $num_parcela = trim($num_parcela);
        $hcm = trim($hcm);


        $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '$vrn' ORDER BY acss ASC ");
        while ($row = pg_fetch_object($result)) {
          $acss = $row->acss;
          $ano = $row->exer;

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

          $valor = $row->valo;

          if ($valor < 0) {
            $valor = $valor * -1;
          }

          $base = "";
          if ($vrn == '002' || $vrn == '016') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE (cdnn = '187' OR cdnn = '188') AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '010' || $vrn == '145') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '189' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }

            if ($i <= 10) {
              $tipo_folha = '1';
              $num_parcela = '9';
            } else if ($i == 11) {
              $tipo_folha = '4';
              $num_parcela = '1';
            } else if ($i == 12) {
              $tipo_folha = '3';
              $num_parcela = '9';
            }
          }

          if ($vrn == '012') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '013' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '148') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '147' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '152') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '151' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '154') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '187' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '160' || $vrn == '163') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '144' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          if ($vrn == '174') {
            $result_b = $db->query("SELECT * FROM $tabela WHERE cdnn = '188' AND acss = '$acss_ori' AND exer = '$ano'");
            while ($row_b = pg_fetch_object($result_b)) {
              $base += $row_b->valo;
            }
          }

          $sinal = "";


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
          echo $hcm . ";";                                       // Código do evento
          echo $quantidade . ";";                                   // Quantidade
          echo number_format($base, 2, '', '') . ";";                                         // Base de calculo
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
}
echo "\n Fim da scripts";
?>