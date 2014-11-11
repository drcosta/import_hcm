<?php

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

      $result = $db->query("SELECT * FROM $tabela WHERE cdnn = '165' AND exer >= '2012' AND acss = '$acss_ori' ORDER BY acss ASC");

      while ($row = pg_fetch_object($result)) {

        $acss = $row->acss;
        $emp_estab = recuperaEmpresaEstab($acss, $banco);

        if ($row->valo > 0 && $emp_estab["empresa"] > 0) {

          $exer = $row->exer;

          if ($banco == 'RUR' || $banco == 'RUR_RV') {
            $result_sal = $db->query("SELECT * FROM ds041 WHERE acss = '$acss_ori' AND exer = '$exer' AND mesf = '$mes'");
            $row_sal = pg_fetch_object($result_sal);
            $msal = $row_sal->msal;
            $csal = $row_sal->csal;

            $sala = $msal + $csal;
            $vlr = $row->valo;

            $vlr = number_format($vlr - $sala, 2);
          } else {
            $vlr = number_format($row->valo, 2);
          }

          $vlr = str_replace(',', '', $vlr);


          if ($vlr > 1) {


            echo "adiciona;";                                 // Constante
            echo $num . ";";                                 // Número do registro
            echo $emp_estab["empresa"] . ";";                // Número da empresa
            echo $emp_estab["estabelecimento"] . ";";        // Número do estabelecimento
            echo removeDigito($acss) . ";";                  // Matrícula sem dígito
            echo $row->exer . ";";                           // Ano de referencia
            echo $mes . ";";                                 // Mês de referencia
            echo ";";                                        // Adicionais em horas para 13.
            echo $vlr . ";";     // Adicionais em valor para 13. salario
            echo ";";                                        // Adicionais em horas para férias
            echo $vlr . ";";     // Adicionais em valor para férias
            echo ";;;;";
            echo "<br />";
//            echo "\n";
            $num++;
          }
        }
      }
    }
  }
}
echo "<br /> Fim da script";
//echo "\n Fim da script";
?>