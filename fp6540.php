<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$bancos = array('RUR', 'RUR_RV');

foreach ($bancos as $banco) {

  $db = new connection($banco);

  $num = 1;

//$result_ori = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

  while ($row_ori = pg_fetch_object($result_ori)) {

    $acss_ori = $row_ori->acss;

// Roda todas as tabelas
// Vai demorar muito
    for ($i = 1; $i <= 12; $i++) {
//for ($i = 1; $i <= 1; $i++) {
      if ($i <= 9) {
        $mes = "0" . $i;
        $tabela = "ds0400" . $i;
      } else {
        $mes = $i;
        $tabela = "ds040" . $i;
      }



      $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' ORDER BY acss ASC ");

      while ($row = pg_fetch_object($result)) {

        $acss = $row->acss;
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

        /**
         * Se o tipo de folha for 1, o número da parcela será 9.
         * Caso contrário será 1 - Confirmar com Donizette.
         */
        if ($banco == "RUR" && $row->cdnn == "191") {
          $tipo_folha = 2;
          $num_parcela = 1;
        } else if ($row->cdnn == "008") {
          $tipo_folha = 2;
          $num_parcela = 1;
        } else if ($row->cdnn == "009") {
          $tipo_folha = 3;
          $num_parcela = 9;
        } else if ($row->cdnn == "010" && $i == 11) {
          $tipo_folha = 4;
          $num_parcela = 1;
        } else {
          $tipo_folha = 1;
          $num_parcela = 9;
        }

        /**
         * Como foi o VRH que cálculo o evento, a informação de quantidade não deve existir.
         */
        $quantidade = "";

        /**
         * Deixando a base como 00. Verificar impacto
         */
        $base = "00";

        $valor = str_replace('', '', $row->valo);
        if ($valor < 0) {
          $valor = $valor * -1;
        } else {

        }

        /**
         * Sinal do valor - ou +
         * Deixado em branco
         */
        $sinal = "";

        $ano = $row->exer;
        $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' AND exer = '$ano' AND mesf = '$mes'");
        $row2 = pg_fetch_object($result2);
        $sal_total = $row2->msal + $row2->csal;

        $evento = "";

        if ($row->cdnn == "006") {
          $evento = "457 ";
        } else if ($row->cdnn == "007") {
          $evento = "632 ";
        } else if ($row->cdnn == "010") {
          $evento = "416 ";
        } else if ($row->cdnn == "013") {
          $evento = "371 ";
        } else if ($row->cdnn == "014") {
          $evento = "262 ";
        } else if ($row->cdnn == "016") {
          $evento = "511 ";
        } else if ($row->cdnn == "029") {
          $evento = "351 ";
        } else if ($row->cdnn == "043") {
          $evento = "530 ";
        } else if ($row->cdnn == "049") {
          $evento = "485 ";
        } else if ($row->cdnn == "050") {
          $evento = "400 ";
        } else if ($row->cdnn == "054") {
          $evento = "351 ";
        } else if ($row->cdnn == "056") {
          $evento = "290 ";
        } else if ($row->cdnn == "057") {
          $evento = "107 ";
        } else if ($row->cdnn == "059") {
          $evento = "479 ";
        } else if ($row->cdnn == "061") {
          $evento = "472 ";
        } else if ($row->cdnn == "062") {
          $evento = "233 ";
        } else if ($row->cdnn == "064") {
          $evento = "294 ";
        } else if ($row->cdnn == "068") {
          $evento = "452 ";
        } else if ($row->cdnn == "069") {
          $evento = "558 ";
        } else if ($row->cdnn == "073") {
          $evento = "216 ";
        } else if ($row->cdnn == "076") {
          $evento = "230 ";
        } else if ($row->cdnn == "077") {
          $evento = "222 ";
        } else if ($row->cdnn == "078") {
          $evento = "216 ";
        } else if ($row->cdnn == "079") {
          $evento = "330 ";
        } else if ($row->cdnn == "080") {
          $evento = "478 ";
        } else if ($row->cdnn == "081") {
          $evento = "216 ";
        } else if ($row->cdnn == "082") {
          $evento = "492 ";
        } else if ($row->cdnn == "085") {
          $evento = "205 ";
        } else if ($row->cdnn == "088") {
          $evento = "227 ";
        } else if ($row->cdnn == "090") {
          $evento = "482 ";
        } else if ($row->cdnn == "093") {
          $evento = "487 ";
        } else if ($row->cdnn == "094") {
          $evento = "496 ";
        } else if ($row->cdnn == "095") {
          $evento = "403 ";
        } else if ($row->cdnn == "096") {
          $evento = "484 ";
        } else if ($row->cdnn == "109") {
          $evento = "257 ";
        } else if ($row->cdnn == "111") {
          $evento = "541 ";
        } else if ($row->cdnn == "115") {
          $evento = "025 ";
        } else if ($row->cdnn == "117") {
          $evento = "197 ";
        } else if ($row->cdnn == "118") {
          $evento = "191 ";
        } else if ($row->cdnn == "122") {
          $evento = "494 ";
        } else if ($row->cdnn == "123") {
          $evento = "098 ";
        } else if ($row->cdnn == "126") {
          $evento = "479 ";
        } else if ($row->cdnn == "128") {
          $evento = "400 ";
        } else if ($row->cdnn == "129") {
          $evento = "486 ";
        } else if ($row->cdnn == "131") {
          $evento = "403 ";
        } else if ($row->cdnn == "132") {
          $evento = "403 ";
        } else if ($row->cdnn == "134") {
          $evento = "024 ";
        } else if ($row->cdnn == "135") {
          $evento = "216 ";
        } else if ($row->cdnn == "137") {
          $evento = "488 ";
        } else if ($row->cdnn == "140") {
          $evento = "801 ";
        } else if ($row->cdnn == "144") {
          $evento = "E17 ";
        } else if ($row->cdnn == "145") {
          $evento = "532 ";
        } else if ($row->cdnn == "147") {
          $evento = "E18 ";
        } else if ($row->cdnn == "148") {
          $evento = "E02 ";
        } else if ($row->cdnn == "150") {
          $evento = "E19 ";
        } else if ($row->cdnn == "155") {
          $evento = "940 ";
        } else if ($row->cdnn == "157") {
          $evento = "603 ";
        } else if ($row->cdnn == "158") {
          $evento = "654 ";
        } else if ($row->cdnn == "166") {
          $evento = "507 ";
        } else if ($row->cdnn == "167") {
          $evento = "E20 ";
        } else if ($row->cdnn == "211") {
          $evento = "216 ";
        } else if ($row->cdnn == "225") {
          $evento = "035 ";
        } else if ($row->cdnn == "255") {
          $evento = "360 ";
        } else if ($row->cdnn == "058") {
          $evento = "356 ";
        } else if ($row->cdnn == "055") {
          $evento = "216 ";
        } else if ($row->cdnn == "146") {
          $evento = "161 ";
        } else if ($row->cdnn == "009") {
          $evento = "419 ";
        } else {
          $evento = $row->cdnn;
        }

        echo "movtoclc;";                                         // Constante
        echo $num . ";";                                          // Número do registro
        echo $emp_estab["empresa"] . ";";                         // Número da empresa
        echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
        echo removeDigito($acss) . ";";                           // Matrícula sem dígito
        echo $mes . ";";                                          // Mês de referencia
        echo $ano . ";";                                          // Ano de referencia
        echo $dt_pag . ";";                                       // Data de pagamento
        echo $tipo_folha . ";";                                   // Tipo de folha
        echo $num_parcela . ";";                                  // Número da parcela
        echo $evento . ";";                                    // Código do evento
        echo $quantidade . ";";                                   // Quantidade
        echo $base . ";";                                         // Base de calculo
        echo number_format($valor, 2, '', '') . ";";              // Valor
        echo $sinal . ";";                                        // Sinal do valor
        echo number_format($sal_total / 220, 2, '', '') . ";";    // Salario hora do funcionário
        echo number_format($sal_total, 2, '', '');                // Salario atual do funcionario
//      echo "<br />";
        echo "\n";
        $num++;
      }
    }
  }
}

echo 'Fim da scripts';
