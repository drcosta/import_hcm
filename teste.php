<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$bancos = array('URB', 'URB_RV', 'RUR', 'RUR_RV');


foreach ($bancos as $banco) {
  $db = new connection($banco);
  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  while ($row_ori = pg_fetch_object($result_ori)) {
    $acss_ori = $row_ori->acss;
    $emp_estab = recuperaEmpresaEstab($acss_ori, $banco);
    echo $banco . ";";
    echo $emp_estab["empresa"] . ";";
    echo $emp_estab["estabelecimento"] . ";";
    echo removeDigito($acss_ori) . ";";
    echo $row_ori->stat . ";";
    $tab_mes = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
    $var_ano = array('2012', '2013', '2014');

    foreach ($var_ano as $ano) {
      foreach ($tab_mes as $mes) {
        $tmes = 'ds040' . $mes;
        $result = $db->query("SELECT * FROM $tmes WHERE cdnn = '165' AND exer = '$ano' AND acss = '$acss_ori' ORDER BY acss ASC");
        $row = pg_fetch_object($result);

        $result_sal = $db->query("SELECT * FROM ds041 WHERE acss = '$acss_ori' AND exer = '$ano' AND mesf = '$mes'");
        $row_sal = pg_fetch_object($result_sal);

        if ($banco == 'RUR' || $banco == 'RUR_RV') {
          $msal = $row_sal->msal;
          $csal = $row_sal->csal;

          $sala = $msal + $csal;
          $vlr = $row->valo;

          $vlr = number_format($vlr - $sala, 2, ',', '.');
        } else {
          $vlr = number_format($row->valo, 2, ',', '.');
        }

        if ($vlr >= 1) {
          echo $vlr . ";";
        } else {
          echo '0,00;';
        }
      }
    }


    foreach ($var_ano as $ano) {
      foreach ($tab_mes as $mes) {
        $tmes = 'ds040' . $mes;
        $result = $db->query("SELECT * FROM $tmes WHERE cdnn = '165' AND exer = '$ano' AND acss = '$acss_ori' ORDER BY acss ASC");
        $row = pg_fetch_object($result);

        $result_sal = $db->query("SELECT * FROM ds041 WHERE acss = '$acss_ori' AND exer = '$ano' AND mesf = '$mes'");
        $row_sal = pg_fetch_object($result_sal);

        if (trim($row_sal->fnjs) != "") {
          echo $row_sal->fnjs . ";";
        } else {
          echo '00';
        }
      }
    }
    echo "<br />";
  }
}


echo "<br /> Fim da script";
//echo "\n Fim da script";
?>