<?php

include_once './lib/connection.php';
include_once './lib/functions.php';
include_once './lib/verbas.php';
include_once './lib/base_ir.php';

$bancos = array('RUR', 'RUR_RV', 'URB', 'URB_RV');


foreach ($bancos as $banco) {
  $db = new connection($banco);

  $num = 1;
  $arquivo = null;
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

      $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND (cdnn = '005' OR cdnn = '017' OR cdnn = '020') ORDER BY acss ASC ");

      while ($row = pg_fetch_object($result)) {
        $empresa = null;
        $estabelecimento = null;
        $matricula = null;
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
        $eve_187 = null;
        $eve_002 = null;
        $eve_188 = null;
        $eve_016 = null;
        $eve_070 = null;
        $eve_147 = null;
        $sinal = null;
        $dep_ir = null;
        $periodo = null;

        $acss = $row->acss;
        $ano = $row->exer;
        $valor = $row->valo;

        $evento_vrh = trim($row->cdnn);

        $emp_estab = recuperaEmpresaEstab($acss, $banco);
        $empresa = $emp_estab["empresa"];
        $estabelecimento = $emp_estab["estabelecimento"];
        $matricula = removeDigito($acss);

        $tipo_folha = 1;
        $parcela = 9;

        if ($i <= 8) {
          $dt_pag = "010";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
          $periodo = $ano . $mes + 1;
        } else if ($i == 9) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
          $periodo = $ano . $mes + 1;
        } else if ($i <= 11) {
          $dt_pag = "01";
          $dt_pag .= $mes + 1;
          $dt_pag .= $ano;
          $periodo = $ano . $mes + 1;
        } else {
          $dt_pag = "0101";
          $dt_pag .= $ano + 1;
          $periodo = $ano + 1 . "01";
        }


        $result_d = $db->query("SELECT * FROM ds01d WHERE acss = '$acss_ori' AND (irrf = 'S' OR irrf = 'P')");
        $dep_ir = 0;

        if (pg_num_rows($result_d) >= 1) {
          while ($row_d = pg_fetch_object($result_d)) {
            $dtnc = $row_d->dtnc;
            $corrente = $ano . $mes . "01";
            if (($row_d->pare == "F") && ($dtnc <= $corrente) && (dif_data($dtnc, $corrente) / 365 < 24)) {
              $dep_ir ++;
            } else if (($row_d->pare != "F") && ($dtnc <= $corrente)) {
              $dep_ir ++;
            }
          }
        }

        $dep_ir = $dep_ir * base_ir_2($periodo);

        if ($row->cdnn == '005') { // Normal
          $evento = 561;

          $result_002 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '002' AND exer = '$ano' AND mesf = '$mes' ");
          $row_002 = pg_fetch_object($result_002);
          $eve_002 = $row_002->valo;
          if ($eve_002 < 0) {
            $eve_002 *= -1;
          }

          $result_187 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '187' AND exer = '$ano' AND mesf = '$mes' ");
          $row_187 = pg_fetch_object($result_187);
          $eve_187 = $row_187->valo;
          if ($eve_187 < 0) {
            $eve_187 *= -1;
          }

          $base = $eve_187 - $eve_002 - $dep_ir;
        } else if ($row->cdnn == '017') { // Férias
          $evento = 562;

          $result_016 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '016' AND exer = '$ano' AND mesf = '$mes' ");
          $row_016 = pg_fetch_object($result_016);
          $eve_016 = $row_016->valo;
          if ($eve_016 < 0) {
            $eve_016 *= -1;
          }

          $result_188 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '188' AND exer = '$ano' AND mesf = '$mes' ");
          $row_188 = pg_fetch_object($result_188);
          $eve_188 = $row_188->valo;

          if ($eve_188 < 0) {
            $eve_188 *= -1;
          }

          $result_070 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '070' AND exer = '$ano' AND mesf = '$mes' ");
          $row_070 = pg_fetch_object($result_070);
          $eve_070 = $row_070->valo;

          if ($eve_070 < 0) {
            $eve_070 *= -1;
          }

          $base = $eve_188 - $eve_016 - $dep_ir + $eve_070;
        } else if ($row->cdnn == '020') { // 13º Salário
          $evento = 563;

          $result_147 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '147' AND exer = '$ano' AND mesf = '$mes' ");
          $row_147 = pg_fetch_object($result_147);
          $eve_147 = $row_147->valo;
          if ($eve_147 < 0) {
            $eve_147 *= -1;
          }

          $result_012 = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' AND cdnn = '012' AND exer = '$ano' AND mesf = '$mes' ");
          $row_012 = pg_fetch_object($result_012);
          $eve_012 = $row_012->valo;
          if ($eve_012 < 0) {
            $eve_012 *= -1;
          }

          $base = $eve_147 - $eve_012 - $dep_ir;
        }

        if ($base < 0) {
          $base *= -1;
        }

        $valor = zero_esq(number_format($row->valo, 2, '', ''), 11);
        $base = zero_esq(number_format($base, 2, '', ''), 11);

        if ((removeDigito($acss) == '67' || removeDigito($acss) == '1925') && ($ano . $mes <= 201403)) {
          $estabelecimento = 12;
        }

        if ($matricula == '00000183' && $banco == 'URB_RV') {
          $matricula = '00000173';
        }

        if ($evento == 563) {
          $tipo_folha = 3;
        }

        $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' AND exer = '$ano' AND mesf = '$mes'");
        $row2 = pg_fetch_object($result2);
        $sal_hora = zero_esq(number_format(($row2->msal + $row2->csal) / 220, 3, '', ''), 10);
        $sal_total = zero_esq(number_format($row2->msal + $row2->csal, 3, '', ''), 10);

        $arquivo .= "movtoclc;";                             // Constante
        $arquivo .= zero_esq($num, 5) . ";";                 // Número do registro
        $arquivo .= $empresa . ";";                          // Número da empresa
        $arquivo .= $estabelecimento . ";";                  // Número do estabelecimento
        $arquivo .= $matricula . ";";                        // Matrícula sem dígito
        $arquivo .= $mes . ";";                              // Mês de referencia
        $arquivo .= $ano . ";";                              // Ano de referencia
        $arquivo .= $dt_pag . ";";                           // Data de pagamento
        $arquivo .= $tipo_folha . ";";                       // Tipo de folha
        $arquivo .= $parcela . ";";                          // Número da parcela
        $arquivo .= $evento . ";";                           // Código do evento
        $arquivo .= $horas . ";";                            // Quantidade
        $arquivo .= $base . ";";                             // Base de calculo
        $arquivo .= $valor . ";";                            // Valor
        $arquivo .= $sinal . ";";                            // Sinal do valor
        $arquivo .= $sal_hora . ";";                         // Salario hora do funcionário
        $arquivo .= $sal_total;                              // Salario atual do funcionario
        $arquivo .= "\n";
//        echo "\n";
        $num++;
      }
    }
  }

  unlink("./files/fp6540-ir-" . $banco . ".lst");
  fclose($ponteiro);

  $fp = fopen("./files/fp6540-ir-" . $banco . ".lst", "a");
  $escreve = fwrite($fp, $arquivo);
  fclose($fp);
}



echo "\n Fim da script";
