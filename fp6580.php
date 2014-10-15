<?php

/**
 *
 * Script que recupera as informações do período aquisitivo;
 * Utiliza a tabela ds870 que contem as informações do período aquisitivo
 *
 *
 *
 */
include_once './lib/connection.php';
include_once './lib/functions.php';
$banco = "urb_rv";

$db = new connection($banco);

$result = $db->query("SELECT * FROM ds870 ORDER BY acss ASC");
$num = 1;
$t = 0;
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

  $result2 = $db->query("SELECT * FROM ds870 WHERE acss = '$acss' AND dtfr = '$dtfr' AND dffr = '$dffr'");
  $total = pg_num_rows($result2);

  if ($emp_estab["estabelecimento"] != "00") {

    if ($total == 1 && $T == 0) {

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
      echo ";;;;;;;;;;;;;;;;";

      echo "<br />";
      $num++;
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
        $num++;
        $t = 0;
      }
    }
  }
}


echo "<br /> Fim da script";
