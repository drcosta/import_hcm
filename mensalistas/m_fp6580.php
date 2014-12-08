<?php

/**
 *
 * Script que recupera as informações do período aquisitivo;
 * Utiliza a tabela ds870 que contem as informações do período aquisitivo
 *
 */
include_once '../lib/connection.php';
include_once '../lib/functions.php';

$num = 1;
$ler = file('./men.csv');
foreach ($ler as $linha) {
  $explode = explode(';', $linha);
  list($acss, $banco) = $explode;
  $acss = trim($acss);
  $banco = trim($banco);
  $db = new connection($banco);

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE acss = '$acss' AND ccst NOT LIKE '000%' ORDER BY acss ASC");


  $t = 0;

  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

    $result = $db->query("SELECT * FROM ds870 WHERE acss = '$acss_ori' AND dtfr >= '2003' ORDER BY acss ASC");
    $qtde = pg_num_rows($result);

    while ($row = pg_fetch_object($result)) {

      $diasDireito = "";

      $fnjs = $row->fnjs;
      $difr = $row->difr;
      $qrab = $row->qrab;
      $acss = $row->acss;
      $dtfr = $row->dtfr;
      $dffr = $row->dffr;
      $digz = $row->digz;


      $emp_estab = recuperaEmpresaEstab($acss, $banco);
      /**
       * 6 a 14 faltas: 24 dias corridos de férias;
       * 15 a 23 faltas: 18 dias corridos de férias;
       * 24 a 32 faltas: 12 dias corridos de férias;
       * acima de 32 faltas: não tem direito às férias.
       */
      if ($fnjs > 32) {
        $diasDireito = "000";
      } else if ($fnjs > 24) {
        $diasDireito = "1200";
      } else if ($fns > "1500") {
        $diasDireito = "1800";
      } else if ($fnjs > 6) {
        $diasDireito = "2400";
      } else {
        $diasDireito = "3000";
      }

      if ($difr > 0) {
        $diasConcedidos = number_format($difr / 10, 2, '', '');
      } else {
        $diasConcedidos = $diasDireito;
      }

      $diasGozados = $diasConcedidos[0] . $diasConcedidos[1] . $diasConcedidos[2];

      if ($qrab == 1) {
        $diasAbono = "100";
      } else {
        $diasAbono = "000";
      }

      $diasLinceca = "000";

      $cal_dias = "N";

      $result2 = $db->query("SELECT * FROM ds870 WHERE acss = '$acss' AND dtfr = '$dtfr' AND dffr = '$dffr'");
      $total = pg_num_rows($result2);

      if ($total == 1 && $T == 0) {

        if ($diasAbono > 0) {
          $diasGozados = $diasGozados - $diasAbono;
        }

        if ($diasGozados == 500) {
          $diasDireito = "0500";
          $diasConcedidos = "0500";
          $diasGozados = "050";
        }

        echo "frmestre;";                                     // Constante
        echo $num . ";";                                      // Número do registro
        echo $emp_estab[empresa] . ";";                       // Código da empresa
        echo $emp_estab[estabelecimento] . ";";               // Código do estabelecimento
        echo removeDigito($acss) . ";";                       // Matrícula sem dígito
        echo converteData($dtfr) . ";";                       // Data início período aquisitivo
        echo converteData($dffr) . ";";                       // Data término período aquisitivo
        echo $cal_dias . ";";                                 // Calcula dias automaticamente
        echo $diasDireito . ";";                              // Número total de dias de direito
        echo $diasConcedidos . ";";                           // Número total de dias concedidos
        echo converteData($digz) . ";";                       // Histórico da 1ª Concessão - Data concessão
        echo $diasGozados . ";";                              // Histórico da 1ª Concessão - Dias gozados
        echo $diasAbono . ";";                                // Histórico da 1ª Concessão - Dias abono
        echo $diasLinceca . ";";                              // Histórico da 1ª Concessão - Dias linceça
        echo ";;;;;;;;;;;;;;;;";

        echo "<br />";
//        echo "\n";
        $num++;


        if ($qtde == 1) {
          echo "frmestre;";                                     // Constante
          echo $num . ";";                                      // Número do registro
          echo $emp_estab[empresa] . ";";                       // Código da empresa
          echo $emp_estab[estabelecimento] . ";";               // Código do estabelecimento
          echo removeDigito($acss) . ";";                       // Matrícula sem dígito
          echo date('dmY', strtotime(converteData2($dtfr) . ' + 1 year')) . ";";                       // Data início período aquisitivo
          echo date('dmY', strtotime(converteData2($dffr) . ' + 1 year')) . ";";                       // Data término período aquisitivo
          echo "S;";                                            // Calcula dias automaticamente
          echo '0000' . ";";                              // Número total de dias de direito
          echo '0000' . ";";                           // Número total de dias concedidos
          echo '' . ";";                       // Histórico da 1ª Concessão - Data concessão
          echo '' . ";";                              // Histórico da 1ª Concessão - Dias gozados
          echo '' . ";";                                // Histórico da 1ª Concessão - Dias abono
          echo '' . ";";                              // Histórico da 1ª Concessão - Dias linceça
          echo ";;;;;;;;;;;;;;;;";

          echo "<br />";
//          echo "\n";
          $num++;
        }
      } else if ($total == 2) {

        if ($t == 0) {
          echo "frmestre;";                                     // Constante
          echo $num . ";";                                      // Número do registro
          echo $emp_estab[empresa] . ";";                       // Código da empresa
          echo $emp_estab[estabelecimento] . ";";               // Código do estabelecimento
          echo removeDigito($acss) . ";";                       // Matrícula sem dígito
          echo converteData($dtfr) . ";";                       // Data início período aquisitivo
          echo converteData($dffr) . ";";                       // Data término período aquisitivo
          echo "N;";                                            // Calcula dias automaticamente
          echo $diasDireito . ";";                              // Número total de dias de direito
          echo $diasConcedidos . ";";                           // Número total de dias concedidos
          echo converteData($digz) . ";";                       // Histórico da 1ª Concessão - Data concessão
          echo $diasGozados . ";";                              // Histórico da 1ª Concessão - Dias gozados
          echo $diasAbono . ";";                                // Histórico da 1ª Concessão - Dias abono
          echo $diasLinceca . ";";                              // Histórico da 1ª Concessão - Dias linceça

          $t = 1;
        } else {
          echo converteData($digz) . ";";                       // Histórico da 2ª Concessão - Data concessão
          echo $diasGozados . ";";                              // Histórico da 2ª Concessão - Dias gozados
          echo $diasAbono . ";";                                // Histórico da 2ª Concessão - Dias abono
          echo $diasLinceca . ";";                              // Histórico da 2ª Concessão - Dias linceça
          echo ";;;;;;;;;;;;";
          echo "<br />";
//          echo "\n";
          $num++;
          $t = 0;
        }
      } else if ($total == 3) {

        if ($t == 0) {
          echo "frmestre;";                                     // Constante
          echo $num . ";";                                      // Número do registro
          echo $emp_estab[empresa] . ";";                       // Código da empresa
          echo $emp_estab[estabelecimento] . ";";               // Código do estabelecimento
          echo removeDigito($acss) . ";";                       // Matrícula sem dígito
          echo converteData($dtfr) . ";";                       // Data início período aquisitivo
          echo converteData($dffr) . ";";                       // Data término período aquisitivo
          echo "N;";                                            // Calcula dias automaticamente
          echo $diasDireito . ";";                              // Número total de dias de direito
          echo $diasConcedidos . ";";                           // Número total de dias concedidos
          echo converteData($digz) . ";";                       // Histórico da 1ª Concessão - Data concessão
          echo $diasGozados . ";";                              // Histórico da 1ª Concessão - Dias gozados
          echo $diasAbono . ";";                                // Histórico da 1ª Concessão - Dias abono
          echo $diasLinceca . ";";                              // Histórico da 1ª Concessão - Dias linceça

          $t = 1;
        } else if ($t == 1) {
          echo converteData($digz) . ";";                       // Histórico da 2ª Concessão - Data concessão
          echo $diasGozados . ";";                              // Histórico da 2ª Concessão - Dias gozados
          echo $diasAbono . ";";                                // Histórico da 2ª Concessão - Dias abono
          echo $diasLinceca . ";";                              // Histórico da 2ª Concessão - Dias linceça
          $t = 2;
        } else {
          echo converteData($digz) . ";";                       // Histórico da 3ª Concessão - Data concessão
          echo $diasGozados . ";";                              // Histórico da 3ª Concessão - Dias gozados
          echo $diasAbono . ";";                                // Histórico da 3ª Concessão - Dias abono
          echo $diasLinceca . ";";                              // Histórico da 3ª Concessão - Dias linceça
          echo ";;;;;;;;";
          echo "<br />";
//          echo "\n";
          $num++;
          $t = 0;
        }
      }
      $qtde--;
    }
  }
}
echo "<br /> Fim da script";
//echo "\n Fim da script";
?>