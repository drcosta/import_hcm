<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$ler = file('./adian.csv');
$num = 1;
foreach ($ler as $linha) {
  $explode = explode(';', $linha);
  list($emp, $estab, $acss, $even, $seq, $qtde, $valor, $cod_vlr, $mes, $ano, $parcelas, $data, $par_consi, $sit, $ger_envet, $ccusto, $cod_toma) = $explode;

  if (strlen($num) <= 4) {
    for ($i = strlen($num); $i <= 4; $i++) {
      $num = "0" . $num;
    }
  }

  if (strlen($acss) <= 7) {
    for ($i = strlen($acss); $i <= 7; $i++) {
      $acss = "0" . $acss;
    }
  }

  $valor = str_replace(',', '', $valor);

  if ($sit == "Ativo") {
    $sit = 1;
  } else {
    $sit = 2;
  }

  echo $num . ";";                          // Número do registro
  echo $emp . ";";                          // Código da empresa
  echo $estab . ";";                        // Código do estabelecimento
  echo $acss . ";";                         // Matrícula do funcionário
  echo $even . ";";                         // Código do evento
  echo $seq . ";";                          // Sequencia
  echo $qtde . ";";                         // Quantidade
  echo $valor . ";";                        // Valor
  echo $cod_vlr . ";";                      // Código do valor unitário
  echo $mes . ";";                          // Mês início
  echo $ano . ";";                          // Ano início
  echo $parcelas . ";";                     // Total de parcelas
  echo $data . ";";                         // Data efeitvo pagamento
  echo $par_consi . ";";                    // Parcelas consideradas
  echo $sit . ";";                          // Situação
  echo $ger_envet . ";";                    // Geração evento
  echo $ccusto . ";";                       // Código do centro de custo
  echo $cod_toma . ";";                     // Código tomador serviço

  echo "<br />";

  $num++;
}

echo "<br />Fim da scripts";
