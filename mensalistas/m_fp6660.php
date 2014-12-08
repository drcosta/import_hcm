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

  $result = $db->query("SELECT * FROM dgs01 WHERE acss = '$acss' AND ccst NOT LIKE '000%' AND stat <> 'x' AND stat <> 'X' AND stat <> 'P' ORDER BY acss ASC");

  while ($row = pg_fetch_object($result)) {

    if (strlen($num) <= 4) {
      for ($i = strlen($num); $i <= 4; $i++) {
        $num = "0" . $num;
      }
    }


    $branco = "";

    $stat = $row->stat;
    $caus = $row->caus;
    $dqit = converteData($row->dqit);

    $dias_sit = "1";

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
        $dqit[0] = "0";
        $dqit[1] = "1";
      } else if ($caus == 8) { // Falecimento
        $sit = 84;
      } else if ($caus == 9) { // Término de contrato
        $sit = 87;
      } else {
        $sit = "NÃO ENCONTREI";
      }

      if (dif_data($row2->$ia, $row2->$fa) < 1) {
        $dias_sit = 1;
      } else {
        $dias_sit = dif_data($row2->$ia, $row2->$fa);
      }

      $dtre = $dqit;
    } else if ($stat == "E") {
      $sit = '10';
      $dqit = converteData($row->diaf);
      $dtre = converteData($row->dfaf);
      $dias_sit = "";
    }
    $tp_aviso = "3";
    if ($sit != "" && $dqit != "") {

//      echo "altersit" . ";";  // Constante
//      echo $num . ";";                                          // Número do registro
//      echo $emp_estab["empresa"] . ";";                         // Número da empresa
//      echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
//      echo removeDigito($acss) . ";";                           // Matrícula sem dígito
//      echo $sit . ";";                                          // Código da situação
//      echo $dqit . ";";                                         // Data de início da situação
//      echo $dtre . ";";                                         // Data de término da situação
//      echo $dias_sit . ";";                                     // Dias na situação
//      echo $branco . ";";                                       // Horas na situação
//      echo $branco . ";";                                       // Horas na situação
//      echo $branco . ";";                                       // Horário de início da situação
//      echo $branco . ";";                                       // Horário de término da situação
//      echo $branco . ";";                                       // Código registro no sistema externo
//      echo $branco . ";";                                       // Código da empresa origem/destino
//      echo $branco . ";";                                       // Código do estabelecimento orgiem/destino
//      echo $branco . ";";                                       // Matrícula do funcionário origem/destino
//      echo $tp_aviso;                                           // Tipo aviso prévio
//      $num ++;
//      echo "<br />";
//      echo "\n";
    }



    $result2 = $db->query("SELECT * FROM ds100 WHERE acss = '$acss' ORDER BY acss ASC");
    while ($row2 = pg_fetch_object($result2)) {
      for ($cd = 1; $cd <= 20; $cd++) {
        if ($cd <= 9) {
          $cd = "0" . $cd;
        }
        $var = "cd" . $cd;

        $ia = "ia" . $cd;
        $fa = "fa" . $cd;

        $sit2 = "";
        $tp_aviso = "3";

        if ($row2->$var == "02") {
          $sit2 = "15";
        } else if ($row2->$var == "03") {
          $sit2 = "10";
        } else if ($row2->$var == "04") {
          $sit2 = "10";
        } else if ($row2->$var == "05") {
          $sit2 = "10";
        } else {
          $sit2 = "================================================================";
        }

        if ($row2->$var != "00") {
          if (strlen($num) <= 4) {
            for ($i = strlen($num); $i <= 4; $i++) {
              $num = "0" . $num;
            }
          }



          $dt_term = $row2->$fa;

          if ($dt_term[0] == '9') {
            $dt_term = date('dmY', strtotime(converteData2($row2->$ia) . ' + 998 days'));
            $dt_term = "31129999";
//          $dias_sit = '999';
          } else {

            $dt_term = converteData($row2->$fa);
            if (dif_data($row2->$ia, $row2->$fa) < 1) {
              $dias_sit = 1;
            } else {
              $dias_sit = dif_data($row2->$ia, $row2->$fa);
            }
          }

          $dias_sit = "";

          if (strlen($num) <= 4) {
            for ($i = strlen($num); $i <= 4; $i++) {
              $num = "0" . $num;
            }
          }
          echo "altersit" . ";";                                    // Constante
          echo $num . ";";                                          // Número do registro
          echo $emp_estab["empresa"] . ";";                         // Número da empresa
          echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
          echo removeDigito($acss) . ";";                           // Matrícula sem dígito
          echo $sit2 . ";";                                         // Código da situação
          echo converteData($row2->$ia) . ";";                      // Data de início da situação
          echo $dt_term . ";";                                      // Data de término da situação
          echo $dias_sit . ";";                                     // Dias na situação
          echo $branco . ";";                                       // Horas na situação
          echo $branco . ";";                                       // Horas na situação
          echo $branco . ";";                                       // Horário de início da situação
          echo $branco . ";";                                       // Horário de término da situação
          echo $branco . ";";                                       // Código registro no sistema externo
          echo $branco . ";";                                       // Código da empresa origem/destino
          echo $branco . ";";                                       // Código do estabelecimento orgiem/destino
          echo $branco . ";";                                       // Matrícula do funcionário origem/destino
          echo $tp_aviso;                                           // Tipo aviso prévio

          $num ++;
          echo "<br />";
//          echo "\n";
        }
      }
    }





    //Férias
    $result2 = $db->query("SELECT * FROM ds870 WHERE acss = '$acss' AND digz >= '2003'");
    while ($row2 = pg_fetch_object($result2)) {

      if (strlen($num) <= 4) {
        for ($i = strlen($num); $i <= 4; $i++) {
          $num = "0" . $num;
        }
      }

      echo "altersit" . ";";                                    // Constante
      echo $num . ";";                                          // Número do registro
      echo $emp_estab["empresa"] . ";";                         // Número da empresa
      echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
      echo removeDigito($acss) . ";";                           // Matrícula sem dígito
      echo '90' . ";";                                          // Código da situação: 90 - Férias
      echo converteData($row2->digz) . ";";                     // Data de início da situação
      echo converteData($row2->drgz) . ";";                     // Data de término da situação
      echo $branco . ";";                                       // Dias na situação
      echo $branco . ";";                                       // Horas na situação
      echo $branco . ";";                                       // Horas na situação
      echo $branco . ";";                                       // Horário de início da situação
      echo $branco . ";";                                       // Horário de término da situação
      echo $branco . ";";                                       // Código registro no sistema externo
      echo $branco . ";";                                       // Código da empresa origem/destino
      echo $branco . ";";                                       // Código do estabelecimento orgiem/destino
      echo $branco . ";";                                       // Matrícula do funcionário origem/destino
      echo $tp_aviso;                                           // Tipo aviso prévio

      $num ++;
      echo "<br />";
//      echo "\n";
    }
  }
}
echo "<br /> Fim da script";
//echo "\n Fim da script";
?>