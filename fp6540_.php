<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('RUR');

$num = 1;

foreach ($bancos as $banco) {

  $db = new connection($banco);

  for ($i = 1; $i <= 12; $i++) {

    if ($i <= 9) {
      $mes = "0" . $i;
      $tabela = "ds0400" . $i;
    } else {
      $mes = $i;
      $tabela = "ds040" . $i;
    }

    $tabela2 = "mov" . $i;

    $ler = file('./verbas_' . $banco . '.csv');
    foreach ($ler as $linha) {
      $explode = explode(';', $linha);
      list($vrh, $horas, $valor, $base, $tfolha, $parcela, $hcm) = $explode;
      $vrh = trim($vrh);
      $horas = trim($horas);
      $valor = trim($valor);
      $base = trim($base);
      $tfolha = trim($tfolha);
      $parcela = trim($parcela);
      $hcm = trim($hcm);

      $result = $db->query("SELECT exer, acss, cdnn, hors, valo FROM $tabela WHERE cdnn = '$vrh'  ORDER BY acss ASC ");
      while ($row = pg_fetch_object($result)) {

        $acss = $row->acss;
        $exer = $row->exer;
        $acss = $row->acss;
        $cdnn = $row->cdnn;
        $hors = $row->hors;
        $valo = $row->valo;
        $cp02 = $row->cp02;

        $emp_estab = recuperaEmpresaEstab($acss, $banco);

        if ($i <= 8) {
          $dt_pag = "010";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else if ($i == 9) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else if ($i <= 11) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $row->exer;
        } else {
          $dt_pag = "0101";
          $dt_pag .= $row->exer + 1;
        }

        if ($horas == 'S') {
          $horas = $hors;
        } else {
          $horas = '';
        }

        if ($base == '') {
          $base = '000';
        } else {
          $explode = explode('+', $base);
          list($verba1, $verba2) = $explode;
          $verba1 = trim($verba1);
          $verba2 = trim($verba2);
          $base = 0;

          $result_verba = $db->query("SELECT valo FROM $tabela WHERE (cdnn = '$verba1' OR cdnn = '$verba2') AND acss = '$acss' ORDER BY acss ASC ");
          while ($row_verba = pg_fetch_row($result_verba)) {
            $base += $row_verba->valo;
          }
        }

        $empresa = $emp_estab["empresa"];
        $estabelecimento = $emp_estab["estabelecimento"];
        $matricula = removeDigito($acss);

        $result2 = $db->query("SELECT msal, csal FROM ds041 WHERE acss = '$acss' AND exer = '$exer' AND mesf = '$mes'");
        $row2 = pg_fetch_object($result2);
        $sal_atual = $row2->msal + $row2->csal;
        $sal_hora = $sal_atual / 220;


        $result2 = $db->query("SELECT * FROM $tabela2 WHERE empresa = '$empresa' AND estabelecimento = '$estabelecimento' matricula = '$matricula' exer = '$exer' AND evento = '$hcm'  ORDER BY acss ASC ");

        if (pg_num_rows($result2) == 0) {

          $db->query("INSERT INTO $tabela2 (empresa,estabelecimento,matricula,ano,data_pag,tfolha,parcela,evento,horas,base,valor,sal_hora,sal_atual) VALUES ('$empresa','$estabelecimento','$matricula','$exer','$dt_pag','$tfolha','$parcela','$hcm','$horas','$base','$valo', '$sal_hora','$sal_atual')");
        } else {
//          parei aqui
          $horas2 = $hors + $row2->hors;
          $valo = $valo + $row2->valo;
          $db->query("UPDATE $tabela2 SET hors = '$hors', valo = '$valo' WHERE exer = '$exer' AND mesf = '$mesf' AND acss = '$acss' AND cdnn = '$hcm'");
          echo "UP" . $banco . " ; " . $exer . " ; " . $mesf . " ; " . $acss . " ; " . $hcm . " ; " . $stat . " ; " . $stan . " ; " . $refx . " ; " . $hors . " ; " . $valo . " ; " . $cp02 . "\n";
        }
      }
    }
  }
}

echo "\n\n\n\n\Fim da Script";
?>
