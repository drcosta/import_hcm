<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR', 'RUR_RV', 'URB', 'URB_RV');

$num = 1;

foreach ($bancos as $banco) {

  $db = new connection($banco);

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE acss = '00075094' AND (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");


  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

    for ($i = 1; $i <= 12; $i++) {

      if ($i <= 9) {
        $mes = "0" . $i;
        $tabela = "ds0400" . $i;
        $tabela2 = "_ds0400" . $i;
      } else {
        $mes = $i;
        $tabela = "ds040" . $i;
        $tabela2 = "_ds040" . $i;
      }

      $ler = file('./verbas_' . $banco . '.csv');
      foreach ($ler as $linha) {
        $explode = explode(';', $linha);
        list($vrh, $hcm) = $explode;
        $vrh = trim($vrh);
        $hcm = trim($hcm);

        $result = $db->query("SELECT * FROM $tabela WHERE cdnn = '$vrh' AND acss = '$acss_ori'  ORDER BY acss ASC ");
        while ($row = pg_fetch_object($result)) {

          $exer = $row->exer;
          $mesf = $row->mesf;
          $acss = $row->acss;
          $cdnn = $row->cdnn;
          $stat = $row->stat;
          $stan = $row->stan;
          $refx = $row->refl;
          $hors = $row->hors;
          $valo = $row->valo;
          $cp02 = $row->cp02;

          $result2 = $db->query("SELECT * FROM $tabela2 WHERE exer = '$exer' AND mesf = '$mesf' AND acss = '$acss' AND cdnn = '$hcm'  ORDER BY acss ASC ");

          if (pg_num_rows($result2) == 0) {

            $db->query("INSERT INTO $tabela2 (exer,mesf,acss,cdnn,stat,stan,refl,hors,valo,cp02) VALUES ('$exer','$mesf','$acss','$hcm','$stat','$stan','$refx','$hors','$valo','$cp02')");
            echo "AD" . $banco . " ; " . $exer . " ; " . $mesf . " ; " . $acss . " ; " . $hcm . " ; " . $stat . " ; " . $stan . " ; " . $refx . " ; " . $hors . " ; " . $valo . " ; " . $cp02 . "\n";
          } else {
            $result2 = $db->query("SELECT * FROM $tabela2 WHERE exer = '$exer' AND mesf = '$mesf' AND acss = '$acss' AND cdnn = '$hcm'  ORDER BY acss ASC ");
            $row2 = pg_fetch_object($result2);
            $hors = $hors + $row2->hors;
            $valo = $valo + $row2->valo;
            $db->query("UPDATE $tabela2 SET hors = '$hors', valo = '$valo' WHERE exer = '$exer' AND mesf = '$mesf' AND acss = '$acss' AND cdnn = '$hcm'");
            echo "UP" . $banco . " ; " . $exer . " ; " . $mesf . " ; " . $acss . " ; " . $hcm . " ; " . $stat . " ; " . $stan . " ; " . $refx . " ; " . $hors . " ; " . $valo . " ; " . $cp02 . "\n";
          }
        }
      }
    }
  }
}

echo "\n\n\n\n\Fim da Script";
?>
