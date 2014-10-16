<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "RUR";

$db = new connection($banco);

// Roda todas as tabelas
// Vai demorar muito
$num = 1;

//$result_ori = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");

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

    $result = $db->query("SELECT * FROM $tabela WHERE acss = '$acss_ori' ORDER BY acss ASC");

    while ($row = pg_fetch_object($result)) {

      $acss = $row->acss;
      $emp_estab = recuperaEmpresaEstab($acss, $banco);

      if ($row->valo > 0 && $emp_estab["empresa"] > 0) {
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
//        echo "<br />";
        echo "\n";
        $num++;
      }
    }
  }
}

echo "\n Fim da script";
?>