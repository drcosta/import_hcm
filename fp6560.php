<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR', 'RUR_RV');
$num = 1;
foreach ($bancos as $banco) {

  $db = new connection($banco);

  $result = $db->query("SELECT * FROM ds04010 WHERE exer = '2014' AND cdnn = '002' ORDER BY acss ASC ");

  while ($row = pg_fetch_object($result)) {

    $acss = $row->acss;
    $emp_estab = recuperaEmpresaEstab($acss, $banco);

    if (strlen($num) <= 4) {
      for ($i = strlen($num); $i <= 4; $i++) {
        $num = "0" . $num;
      }
    }

    $mes = '10';
    $ano = '2014';

    $result2 = $db->query("SELECT * FROM ds01d WHERE acss = '$acss' AND stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND dtnc <> '00000000' AND irrf >= '1' ORDER BY nord ASC");

    $n_dep = pg_num_rows($result2);


    $vl_deduc = "179.71";
    if ($n_dep >= 1) {
      $vl_deduc = number_format($n_dep * $vl_deduc, 2, '', '');
    } else {
      $vl_deduc = "";
    }


    $vl_deduc_inss = number_format($row->valo, 2, '', '');
    $zero = "";

    echo "dirf;";                                             // Constante
    echo $num . ";";                                          // Número do registro
    echo $emp_estab["empresa"] . ";";                         // Número da empresa
    echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
    echo removeDigito($acss) . ";";                           // Matrícula sem dígito
    echo $ano . ";";                                          // Ano de referencia
    echo $mes . ";";                                          // Mês de referencia
    echo $n_dep . ";";                                        // Número de dependentes
    echo $vl_deduc . ";";                                     // Valor dedução dependentes
    echo $zero . ";";                                         // Valor dedução pensão alimentícia
    echo $vl_deduc_inss . ";";                                // Valor dedução INSS
    echo $zero . ";";                                         // Valor dedução previdência privada
    echo $zero . ";";                                         // Valor resto precidência privada
    echo $zero . ";";                                         // Valor base bruta IRF
    echo $zero . ";";                                         // Valor IRF Retido
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo $zero . ";";
    echo "<br />";

    $num++;
  }
}
?>