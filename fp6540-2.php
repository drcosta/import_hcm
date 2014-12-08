<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';

$bancos = array('URB');

foreach ($bancos as $banco) {

  $db = new connection($banco);

  $num = 1;

  $result_ori = $db->query("SELECT * FROM dgs01 WHERE (stat = '' OR stat = ' ' OR stat = 'L' OR stat = 'F' OR stat = 'I' OR stat = 'S' OR stat = 'M' OR stat = 'E') AND caus = '0' AND dqit = '00000000' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

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

      $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' ORDER BY acss ASC ");

      while ($row = pg_fetch_object($result)) {

        $empresa = null;
        $estabelecimento = null;
        $ano = null;
        $tipo_folha = null;
        $parcela = null;
        $evento = null;
        $horas = null;
        $base = null;
        $valor = null;
        $sal_hora = null;
        $sal_total = null;
        $dt_pag = null;

        $acss = $row->acss;
        $ano = $row->exer;

        $evento_vrh = trim($row->cdnn);

        $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' AND exer = '$ano' AND mesf = '$mes'");
        $row2 = pg_fetch_object($result2);

        $controle = evento_novo($evento_vrh, $banco);

        if ($controle["valid"]) {

          $emp_estab = recuperaEmpresaEstab($acss, $banco);
          $empresa = $emp_estab["empresa"];
          $estabelecimento = $emp_estab["estabelecimento"];
          $tipo_folha = $controle["tfolha"];
          $parcela = $controle["parcela"];
          $evento = $controle["hcm"];
          $base = $controle["base"];

          $valor = number_format($row->valo, 2, '', '');
          $sinal = "";
          $sal_hora = zero_esq(number_format(($row2->msal + $row2->csal) / 220, 3, '', ''), 10);
          $sal_total = zero_esq(number_format($row2->msal + $row2->csal, 3, '', ''), 10);

          if ($valor < 0) {
            $valor = $valor * -1;
          }
          $horas = $row->hors;
          if ($controle["horas"] == "N" || $horas == "0000000") {
            $horas = "";
          } else if ($horas > 220) {
            $horas = "0220000";
          } else {
            $horas = zero_esq(number_format($horas, 3, '', ''), 7);
          }

          if ($base != "") {
            $result3 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '$base' AND exer = '$ano'");
            $row3 = pg_fetch_object($result3);
            if (pg_num_rows($result3) == 1) {
              $base = $row3->valo;
            } else if ($evento_vrh == '154' || $evento_vrh == '160') {
              $result3 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '144' AND exer = '$ano'");
              $row3 = pg_fetch_object($result3);
              if (pg_num_rows($result3) == 1) {
                $base = $row3->valo;
              } else {
                $result3 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '150' AND exer = '$ano'");
                $row3 = pg_fetch_object($result3);
                if (pg_num_rows($result3) == 1) {
                  $base = $row3->valo;
                } else {
                  $result3 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '173' AND exer = '$ano'");
                  $row3 = pg_fetch_object($result3);
                  if (pg_num_rows($result3) == 1) {
                    $base = $row3->valo;
                  } else {
                    $base = $row3->valo . "---Nao Encontrado";
                  }
                }
              }
            } else {
              $base = $row3->valo . "---Nao Encontrado";
            }

            if ($base < 0) {
              $base = $base * -1;
            }
            $base = zero_esq(number_format($base, 2, '', ''), 11);
          }



          $valor = zero_esq($valor, 11);

          if ($i <= 8) {
            $dt_pag = "010";
            $dt_pag .= $mes + 1;
            $dt_pag .= $ano;
          } else if ($i == 9) {
            $dt_pag = "01";
            $dt_pag .= $mes + 1;
            $dt_pag .= $ano;
          } else if ($i <= 11) {
            $dt_pag = "01";
            $dt_pag .= $mes + 1;
            $dt_pag .= $ano;
          } else {
            $dt_pag = "0101";
            $dt_pag .= $ano + 1;
          }

          if ($evento_vrh == '012' || $evento_vrh == '185' || $evento_vrh == '010' || $evento_vrh == '145' || ($banco == 'URB' && $evento_vrh == '192')) {
            if ($mes <= 10) {
              $tipo_folha = '1';
              $parcela = '9';
            } else if ($mes == '11') {
              $tipo_folha = '4';
              $parcela = '1';
            } else if ($mes == '12') {
              $tipo_folha = '3';
              $parcela = '9';
            }
          }

          echo "movtoclc;";                             // Constante
          echo zero_esq($num, 5) . ";";                 // Número do registro
          echo $empresa . ";";                          // Número da empresa
          echo $estabelecimento . ";";                  // Número do estabelecimento
          echo removeDigito($acss) . ";";               // Matrícula sem dígito
          echo $mes . ";";                              // Mês de referencia
          echo $ano . ";";                              // Ano de referencia
          echo $dt_pag . ";";                           // Data de pagamento
          echo $tipo_folha . ";";                       // Tipo de folha
          echo $parcela . ";";                          // Número da parcela
          echo $evento . ";";                           // Código do evento
          echo $horas . ";";                            // Quantidade
          echo $base . ";";                             // Base de calculo
          echo $valor . ";";                            // Valor
          echo $sinal . ";";                            // Sinal do valor
          echo $sal_hora . ";";                         // Salario hora do funcionário
          echo $sal_total;                              // Salario atual do funcionario
          echo "<br />";
//        echo "\n";
          $num++;
        }
      }
    }
  }
}

echo "<br /> Fim da script";
//echo "\n Fim da script";
