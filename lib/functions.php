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
    $temp["empresa"] = "0";
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

function getDV($acesso) {
  $dv = "";
  $tam = strlen($acesso) - 1;
  $dv = $acesso[$tam];

  return $dv;
}

function getEndereco($acesso, $banco) {
  $db = new connection($banco);

  $result = $db->query("SELECT * FROM ds01c WHERE acss = '$acesso'");
  $row = pg_fetch_object($result);

  $end["endereco"] = trim($row->nder);
  $end["tp_ref"] = "";
  $end["bairro"] = trim($row->nde2);
  $end["cep"] = trim($row->ncep) . trim($row->ccep);
  $end["cidade"] = trim($row->muni);
  $end["estado"] = trim($row->esta);
  $end["ide_num"] = trim($row->nide);



  $oexp = trim($row->oexp);

  if (strripos($oexp, "SP")) {
    $end["ide_est"] = "SP";
  }

  if (strripos($oexp, "AC")) {
    $end["ide_est"] = "AC";
  } else if (strripos($oexp, "AL")) {
    $end["ide_est"] = "AL";
  } else if (strripos($oexp, "AP")) {
    $end["ide_est"] = "AP";
  } else if (strripos($oexp, "AM")) {
    $end["ide_est"] = "AM";
  } else if (strripos($oexp, "BA")) {
    $end["ide_est"] = "BA";
  } else if (strripos($oexp, "CE")) {
    $end["ide_est"] = "CE";
  } else if (strripos($oexp, "DF")) {
    $end["ide_est"] = "DF";
  } else if (strripos($oexp, "ES")) {
    $end["ide_est"] = "ES";
  } else if (strripos($oexp, "GO")) {
    $end["ide_est"] = "GO";
  } else if (strripos($oexp, "MA")) {
    $end["ide_est"] = "MA";
  } else if (strripos($oexp, "MT")) {
    $end["ide_est"] = "MT";
  } else if (strripos($oexp, "MS")) {
    $end["ide_est"] = "MS";
  } else if (strripos($oexp, "MG")) {
    $end["ide_est"] = "MG";
  } else if (strripos($oexp, "PA")) {
    $end["ide_est"] = "PA";
  } else if (strripos($oexp, "PB")) {
    $end["ide_est"] = "PB";
  } else if (strripos($oexp, "PR")) {
    $end["ide_est"] = "PR";
  } else if (strripos($oexp, "PE")) {
    $end["ide_est"] = "PE";
  } else if (strripos($oexp, "PI")) {
    $end["ide_est"] = "PI";
  } else if (strripos($oexp, "RJ")) {
    $end["ide_est"] = "RJ";
  } else if (strripos($oexp, "RN")) {
    $end["ide_est"] = "RN";
  } else if (strripos($oexp, "RS")) {
    $end["ide_est"] = "RS";
  } else if (strripos($oexp, "RO")) {
    $end["ide_est"] = "RO";
  } else if (strripos($oexp, "RR")) {
    $end["ide_est"] = "RR";
  } else if (strripos($oexp, "SC")) {
    $end["ide_est"] = "SC";
  } else if (strripos($oexp, "SP")) {
    $end["ide_est"] = "SP";
  } else if (strripos($oexp, "SE")) {
    $end["ide_est"] = "SE";
  } else if (strripos($oexp, "TO")) {
    $end["ide_est"] = "TO";
  } else {
    $end["ide_est"] = trim($row->esta);
  }

  if (strripos($oexp, "PC")) {
    $end["ide_orm"] = "PC";
  } else if (strripos($oexp, "RG")) {
    $end["ide_orm"] = "RG";
  } else if (strripos($oexp, "SEDPF")) {
    $end["ide_orm"] = "SEDPF";
  } else if (strripos($oexp, "SSP")) {
    $end["ide_orm"] = "SSP";
  } else {
    $end["ide_orm"] = "SSP";
  }

  if ($row->telt != "" && $row->zona != "" && $row->seca != "" && $row->mzon != "" && $row->ezon != "") {
    $end["telt_num"] = trim($row->telt);
    $end["telt_zona"] = trim($row->zona);
    $end["telt_seca"] = trim($row->seca);
    $end["telt_cida"] = trim($row->mzon);
    $end["telt_esta"] = trim($row->ezon);
  } else {
    $end["telt_num"] = "";
    $end["telt_zona"] = "";
    $end["telt_seca"] = "";
    $end["telt_cida"] = "";
    $end["telt_esta"] = "";
  }

  if ($row->espr != "") {
    $end["ctps_esta"] = $row->espr;
  } else {
    $end["ctps_esta"] = trim($row->esta);
  }




  return $end;
}

function getInsa($acesso, $banco) {
  $db = new connection($banco);

  $result = $db->query("SELECT * from dm01k WHERE acss = '$acesso'");
  $row = pg_fetch_object($result);

  if ($banco == "urb") {
    if ($row->nbfl[10] == 1) {
      $total["in"] = "S";
      $total["in_nv"] = "1";
    } else if ($row->nbfl[1] == 1) {
      $total["in"] = "S";
      $total["in_nv"] = "2";
    } else {
      $total["in"] = "N";
      $total["in_nv"] = "";
    }
  } else if ($banco == "urb_rv") {
    if ($row->nbfl[0] == 1) {
      $total["in"] = "S";
      $total["in_nv"] = "2";
    } else {
      $total["in"] = "N";
      $total["in_nv"] = "";
    }
  } else if ($banco == "rur") {
    if ($row->nbfl[3] == 1) {
      $total["in"] = "S";
      $total["in_nv"] = "1";
    } else {
      $total["in"] = "N";
      $total["in_nv"] = "";
    }
  } else if ($banco == "rur_rv") {
    if ($row->nbfl[0] == 1) {
      $total["in"] = "S";
      $total["in_nv"] = "1";
    } else {
      $total["in"] = "N";
      $total["in_nv"] = "";
    }
  }

  return $total;
}

function getPeric($acesso, $banco) {
  $db = new connection($banco);

  $result = $db->query("SELECT * from dm01k WHERE acss = '$acesso'");
  $row = pg_fetch_object($result);

  if ($banco == "urb") {
    if ($row->nbfl[2] == 1) {
      $total["per"] = "S";
      $total["per_nv"] = "3";
    } else {
      $total["per"] = "N";
      $total["per_nv"] = "";
    }
  } else if ($banco == "urb_rv") {
    if ($row->nbfl[3] == 1) {
      $total["per"] = "S";
      $total["per_nv"] = "3";
    } else {
      $total["per"] = "N";
      $total["per_nv"] = "";
    }
  } else {
    $total["per"] = "N";
    $total["per_nv"] = "";
  }

  return $total;
}
