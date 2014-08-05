<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './connection.php';

/**
 *
 * Retorna a empresa e o estabeleciomento
 *
 * Banco RUR
 * Ipanema Agrícola 1:
 * ccst iniciando com 001 = 13
 * ccst iniciando com 002 = 12
 * ccst iniciando com 003 = 17
 *
 * Banco RUR_RV
 * Ipanema Agrícola 1:
 * ccst iniciando com 001 = 14
 * ccst iniciando com 002 = 15
 *
 */
function recuperaEmpresaEstab($access, $banco) {
  $db = new connection($banco);
  $result = $db->query("SELECT * FROM dgs01 WHERE acss = '$access'");
  $row = pg_fetch_object($result);

  $ccst = $row->ccst;
  $estab = "";
  for ($i = 0; $i <= 2; $i++) {
    $estab .= $ccst[$i];
  }

  if ($banco == "rur") {
    $temp["empresa"] = "1";
  } else if ($banco == "rur_rv") {
    $temp["empresa"] = "1";
  }

  //RUR
  if ($banco == "rur" && $estab == "001") {
    $temp["estabelecimento"] = "13";
  } else if ($banco == "rur" && $estab == "002") {
    $temp["estabelecimento"] = "12";
  } else if ($banco == "rur" && $estab == "003") {
    $temp["estabelecimento"] = "17";
  }
  // RUR_RV
  else if ($banco == "rur_rv" && $estab == "001") {
    $temp["estabelecimento"] = "14";
  } else if ($banco == "rur_rv" && $estab == "002") {
    $temp["estabelecimento"] = "15";
  }
  //URB
  else if ($banco == "urb" && $estab == "001") {
    $temp["estabelecimento"] = "13";
    $temp["empresa"] = "1";
  } else if ($banco == "urb" && $estab == "002") {
    $temp["estabelecimento"] = "12";
    $temp["empresa"] = "1";
  } else if ($banco == "urb" && $estab == "015") {
    $temp["estabelecimento"] = "17";
    $temp["empresa"] = "1";
  } else if ($banco == "urb" && $estab == "005") {
    $temp["estabelecimento"] = "21";
    $temp["empresa"] = "2";
  } else if ($banco == "urb" && $estab == "008") {
    $temp["estabelecimento"] = "22";
    $temp["empresa"] = "2";
  } else if ($banco == "urb" && $estab == "013") {
    $temp["estabelecimento"] = "23";
    $temp["empresa"] = "2";
  } else if ($banco == "urb" && $estab == "003") {
    $temp["estabelecimento"] = "61";
    $temp["empresa"] = "6";
  }
  // URB_RV
  else if ($banco == "urb_rv" && $estab == "001") {
    $temp["estabelecimento"] = "14";
    $temp["empresa"] = "1";
  } else if ($banco == "urb_rv" && $estab == "003") {
    $temp["estabelecimento"] = "15";
    $temp["empresa"] = "1";
  } else if ($banco == "urb_rv" && $estab == "002") {
    $temp["estabelecimento"] = "24";
    $temp["empresa"] = "2";
  }
  // Se tudo der errado
  else {
    $temp["estabelecimento"] = "00";
    $temp["estabelecimento"] = "0";
  }

  return $temp;
}

function formatNumber($num) {
  if (strlen($num) == 1) {
    return "0000" . $num;
  } else if (strlen($num) == 2) {
    return "000" . $num;
  } else if (strlen($num) == 3) {
    return "00" . $num;
  } else if (strlen($num) == 4) {
    return "0" . $num;
  } else {
    return $num;
  }
}

function converteData($data) {
  $ano = "";
  $mes = "";
  $dia = "";

  for ($i = 0; $i <= 3; $i++) {
    $ano .= $data[$i];
  }

  $mes = $data[4] . $data[5];

  $dia = $data[6] . $data[7];

  return $dia . $mes . $ano;
}

function removeDigito($acesso) {
  $mat = "";
  for ($i = 0; $i <= strlen($acesso) - 2; $i++) {
    $mat .= $acesso[$i];
  }

  return intval($mat);
}
