<?php

include_once '../lib/connection.php';
include_once '../lib/functions.php';


$bancos = array('RUR', 'RUR_RV', 'URB', 'URB_RV');
$num = 1;
foreach ($bancos as $banco) {
  $db = new connection($banco);

  if ($banco == "RUR" || $banco == 'RUR_RV') {
    $result = $db->query("SELECT * FROM dgs01 WHERE stat = 'D' AND dqit <= '20141104' AND ccst NOT LIKE '000%' ORDER BY acss ASC");
  } else if ($banco == "URB" || $banco == "URB_RV") {
    $result = $db->query("SELECT * FROM dgs01 WHERE stat = 'D' AND dqit <= '20140331' AND ccst NOT LIKE '000%' ORDER BY acss ASC");
  }

  while ($row = pg_fetch_object($result)) {

    $acss = $row->acss;

    echo $acss . ";" . removeDigito2($acss, $banco) . ";" . $banco . "<br />";
    $num++;
  }
}