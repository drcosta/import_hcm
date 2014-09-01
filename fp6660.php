<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "rur";

$db = new connection($banco);

$result = $db->query("SELECT * FROM dgs01 WHERE stat <> '' AND stat <> 'x' AND stat <> 'X' AND stat <> 'P' ORDER BY acss ASC LIMIT 500");
$num = 1;

while ($row = pg_fetch_object($result)) {

  $branco = "";

  $acss = $row->acss;
  $stat = $row->stat;
  $caus = $row->caus;
  $dqit = converteData($row->dqit);

  $dias_sit = "0";

  $emp_estab = recuperaEmpresaEstab($acss, $banco);
  $sit = "";
  $tp_aviso = "";
  if ($stat == "D") {
    if ($caus == 1) { // Despedido, C/Justa-C
      $sit = 80;
    } else if ($caus == 2) { // Despedido, S/Justa-C
      $sit = 81;
    } else if ($caus == 3) { // Ped Demis, C/Justa-C
      $sit = 82;
    } else if ($caus == 4) { // Ped Demis, S/Justa-C
      $sit = 83;
    } else if ($caus == 5) { // Aposentadoria
      $sit = 85;
    } else if ($caus == 6) { // Transferencia sem Ônus para Cedente
      $sit = 45;
      $dqit = date('dmY', strtotime(converteData2($row->dqit) . ' + 1 days'));
    } else if ($caus == 8) { // Falecimento
      $sit = 84;
    } else if ($caus == 9) { // Término de contrato
      $sit = 87;
    } else {
      $sit = "NÃO ENCONTREI";
    }
    $tp_aviso = "3";
  } else if ($stat == "F" || $stat == "f" || $stat == "S" || $stat == "s" || $stat == "E" || $stat == "e") {
    $result2 = "SELECT * FROM ds100 WHERE acss = '$acss'";
    $row2 = pg_fetch_object($result2);
  } else {
    $tp_aviso = "";
  }

  echo "altersit" . ";";  // Constante
  echo $num . ";";                                          // Número do registro
  echo $emp_estab["empresa"] . ";";                         // Número da empresa
  echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
  echo removeDigito($acss) . ";";                           // Matrícula sem dígito
  echo $sit . ";";                                          // Código da situação
  echo $dqit . ";";                                         // Data de início da situação
  echo $dqit . ";";                                         // Data de término da situação
  echo $dias_sit . ";";                                     // Dias na situação
  echo $branco . ";";                                       // Horas na situação
  echo $branco . ";";                                       // Horas na situação
  echo $branco . ";";                                       // Horário de início da situação
  echo $branco . ";";                                       // Horário de término da situação
  echo $branco . ";";                                       // Código registro no sistema externo
  echo $branco . ";";                                       // Código da empresa origem/destino
  echo $branco . ";";                                       // Código do estabelecimento orgiem/destino
  echo $branco . ";";                                       // Matrícula do funcionário origem/destino
  echo $tp_aviso . ";";                                     // Tipo aviso prévio

  $num ++;
  echo "<br />";
}
?>