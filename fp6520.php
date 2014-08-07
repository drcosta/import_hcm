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


  $result = $db->query("SELECT * FROM $tabela WHERE cdnn = '165' ORDER BY acss ASC LIMIT 500 OFFSET 0");

  while ($row = pg_fetch_object($result)) {

    $acss = $row->acss;
    $emp_estab = recuperaEmpresaEstab($acss, $banco);

    if ($row->valo > 0) {
      echo "adiciona;";                                 // Constante
      echo $num . ";";                                 // Número do registro
      echo $emp_estab["empresa"] . ";";                // Número da empresa
      echo $emp_estab["estabelecimento"] . ";";        // Número do estabelecimento
      echo removeDigito($acss) . ";";                  // Matrícula sem dígito
      echo $row->exer . ";";                           // Ano de referencia
      echo $mes . ";";                                 // Mês de referencia
      echo ";";                                        // Adicionais em horas para 13.
      echo str_replace('.', '', $row->valo) . ";";     // Adicionais em valor para 13. salario
      echo ";";                                        // Adicionais em horas para férias
      echo str_replace('.', '', $row->valo) . ";";     // Adicionais em valor para férias
      echo ";;;;";
      echo "<br />";
      $num++;
    }
  }
}
