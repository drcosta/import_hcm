<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "rur";

$db = new connection($banco);

// Roda todas as tabelas
// Vai demorar muito
//for ($i = 1; $i <= 12; $i++) {
$num = 1;
for ($i = 1; $i <= 1; $i++) {
  if ($i <= 9) {
    $mes = "0" . $i;
    $tabela = "ds0400" . $i;
  } else {
    $mes = $i;
    $tabela = "ds040" . $i;
  }



  $result = $db->query("SELECT * FROM $tabela ORDER BY acss ASC LIMIT 500 OFFSET 0");

  while ($row = pg_fetch_object($result)) {

    $acss = $row->acss;
    $emp_estab = recuperaEmpresaEstab($acss, $banco);

    if ($i <= 9) {
      $dt_pag = "010";
      $dt_pag .= $mes + 1;
    } else if ($i <= 11) {
      $dt_pag = "01";
      $dt_pag .= $mes + 1;
    } else {
      $dt_pag = "0101";
    }

    /**
     * Se o tipo de folha for 1, o número da parcela será 9.
     * Caso contrário será 1 - Confirmar com Donizette.
     */
    if ($banco == "rur" && $row->cdnn == "191") {
      $tipo_folha = 2;
      $num_parcela = 1;
    } else if ($row->cdnn == "008") {
      $tipo_folha = 2;
      $num_parcela = 1;
    } else if ($row->cdnn == "009") {
      $tipo_folha = 3;
      $num_parcela = 1;
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

    echo "movtclc;";                                 // Constante
    echo $num . ";";                                 // Número do registro
    echo $emp_estab["empresa"] . ";";                // Número da empresa
    echo $emp_estab["estabelecimento"] . ";";        // Número do estabelecimento
    echo removeDigito($acss) . ";";                  // Matrícula sem dígito
    echo $mes . ";";                                 // Mês de referencia
    echo $row->exer . ";";                           // Ano de referencia
    echo $dt_pag . $row->exer . ";";                 // Data de pagamento
    echo $tipo_folha . ";";                          // Tipo de folha
    echo $num_parcela . ";";                         // Número da parcela
    echo deParaVerbas($row->cdnn) . ";";             // Código do evento
    echo $quantidade . ";";                          // Quantidade

    echo "<br />";
    $num++;
  }
}
