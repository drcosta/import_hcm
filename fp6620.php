<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "RUR_RV";

$db = new connection($banco);

$result = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND ccst NOT LIKE '005%' ORDER BY acss ASC");
$num = 1;
$cod_dep = 1;
$tp_info = 1;
while ($row = pg_fetch_object($result)) {
  $cod_dep = 1;
  $acss = $row->acss;
  $emp_estab = recuperaEmpresaEstab($acss, $banco);

  $result2 = $db->query("SELECT * FROM ds01d WHERE acss = '$acss' AND stat <> 'x' AND stat <> 'X' AND stat <> 'P' AND dtnc <> '00000000' ORDER BY nord ASC");
  while ($row2 = pg_fetch_object($result2)) {
    if (strlen($num) <= 4) {
      for ($i = strlen($num); $i <= 4; $i++) {
        $num = "0" . $num;
      }
    }

    if (strlen($cod_dep) <= 2) {
      for ($i = strlen($cod_dep); $i <= 2; $i++) {
        $cod_dep = "0" . $cod_dep;
      }
    }

    $nome_dep = $row2->nome;
    $sexo = $row2->sexo;
    $pare = $row2->pare;
    $sfam = $row2->sfam;
    $irrf = $row2->irrf;
    $locn = $row2->locn;

    $est_saude = "1";
    $pais = "BRA";
    $est_cur_sup = "N";
    $comp_fre_esc = "N";

    if ($sexo == "M") {
      $sexo = 1;
    } else if ($sexo == "F") {
      $sexo = 2;
    }

    if ($pare == "F") {
      $pare = "1";
    } else if ($pare == "A") {
      $pare = "1";
    } else if ($pare == "C") {
      $pare = "2";
    } else if ($pare == "P") {
      $pare = "3";
    } else if ($pare == "M") {
      $pare = "3";
    } else if ($pare == "J") {
      $pare = "1";
    } else {
      $pare = "7";
    }

    if ($sfam == "S" && $irrf == "S") {
      $incide = "0001";
      $sit_sal_fam = "1";
    } else if ($sfam == "N" && $irrf == "S") {
      $incide = "0002";
      $sit_sal_fam = "3";
    } else if ($sfam == "S" && $irrf == "N") {
      $incide = "0003";
      $sit_sal_fam = "1";
    } else {
      $incide = "0004";
      $sit_sal_fam = "3";
    }

    $explode = explode('-', trim($locn));
    list($cidade, $estado) = $explode;

    $cidade = trim($cidade);
    $estado = trim($estado);

    if ($estado == "") {
      $explode = explode(' MG', trim($locn));
      list($cidade, $estado) = $explode;
    } else if ($estado == "") {
      $explode = explode(' SP', trim($locn));
      list($cidade, $estado) = $explode;
      $estado = "SP";
    }

    $cidade = trim($cidade);
    $estado = trim($estado);

    if (strpos($locn, 'RIO VERDE') || strtoupper(str_replace(' ', '', $cidade)) == 'CRVERDE' || $cidade == "CONCEICAO DO RIO VER") {
      $cidade = "CONCEICAO DO RIO VERDE";
      $estado = "MG";
    } else if ($cidade == "CAXAMBU" || $cidade == "CAXAMVU") {
      $estado = "MG";
    } else if ($cidade == "LAMBARI") {
      $estado = "MG";
    } else if ($cidade == "BAEPENDI") {
      $estado = "MG";
    } else if (strpos($locn, 'CORACOES')) {
      $cidade = "TRES CORACOES";
      $estado = "MG";
    } else if ($cidade == "SAO JOSE DOS CAMPOS") {
      $estado = "SP";
    } else if ($cidade == "CAMUQUIRA" || $cidade == "CAMBUQUIRA") {
      $estado = "MG";
    } else if ($cidade == "VARGINHA") {
      $estado = "MG";
    } else if ($cidade == "ALTEROSA" || $cidade == "ALTEROSA/MG") {
      $cidade = "ALTEROSA";
      $estado = "MG";
    } else if (strtoupper($cidade) == "ALFENAS" || $cidade == "ALFEANAS" || $cidade == "ALFENAS/MG") {
      $cidade = "ALFENAS";
      $estado = "MG";
    } else if (strtoupper($cidade) == "CAMPO DO MEIO" || strtoupper($cidade) == "CAMPO DO MEIO/MG") {
      $cidade = "CAMPO DO MEIO";
      $estado = "MG";
    } else if ($cidade == "PARAGUACU") {
      $estado = "MG";
    } else if (strtoupper($cidade) == "CAMPOS GERAIS" || strtoupper($cidade) == "CAMPO GERAIS" || strtoupper($cidade) == "CAMPOS GERIAS" || strtoupper($cidade) == "CAMPOS GERAIS/MG" || strtoupper($cidade) == "CAMPOS GERAIS") {
      $cidade = "CAMPOS GERAIS";
      $estado = "MG";
    } else if ($cidade == "POCO FUNDO") {
      $estado = "MG";
    } else if ($cidade == "FAMA") {
      $estado = "MG";
    } else if ($cidade == "ITATIBA") {
      $estado = "SP";
    } else if ($cidade == "AGUAS FORMOSAS") {
      $estado = "MG";
    } else if ($cidade == "MONTE BELO") {
      $estado = "MG";
    } else if ($cidade == "SANTA RITA DE CALDAS") {
      $estado = "MG";
    } else if ($cidade == "SOROCABA SP") {
      $cidade = "SOROCABA";
      $estado = "SP";
    } else if ($cidade == "SALINAS") {
      $estado = "MG";
    } else if ($cidade == "BELO HORIZONTE") {
      $estado = "MG";
    } else if ($cidade == "BOA ESPERANCA" || $cidade == "BOA ESPERANCAQ") {
      $cidade = "BOA ESPERANCA";
      $estado = "MG";
    } else if ($cidade == "MACHADO") {
      $estado = "MG";
    } else if ($cidade == "ITAUNA") {
      $estado = "MG";
    } else if ($cidade == "CAPELINHA") {
      $estado = "MG";
    } else if ($cidade == "FRANCO DA ROCHA") {
      $estado = "SP";
    } else if ($cidade == "CAIEIRAS") {
      $estado = "SP";
    } else if ($cidade == "AREADO") {
      $estado = "SP";
    } else if ($cidade == "SALVADOR") {
      $estado = "BA";
    } else if ($cidade == "RIBEIRAO PRETO") {
      $estado = "SP";
    } else if ($cidade == "SERRANA") {
      $estado = "SP";
    } else if ($cidade == "BARUERI") {
      $estado = "SP";
    } else if ($cidade == "DIVISA NOVA") {
      $estado = "MG";
    } else if ($cidade == "MONTALVANIA") {
      $estado = "MG";
    } else if ($cidade == "SERRANIA") {
      $estado = "MG";
    } else if ($cidade == "VARGEM GRANDE DO SUL") {
      $estado = "SP";
    } else if ($cidade == "SAO PAULO" || $cidade == "SAO PAULO/SP") {
      $cidade = "SAO PAULO";
      $estado = "MG";
    } else if (strtoupper($cidade) == "LAVRAS") {
      $cidade = "LAVRAS";
      $estado = "MG";
    }

    if ($cidade == "" || $cidade == "Registro Civil") {
      if ($banco == "RUR_RV" || $banco == "URB_RV") {
        $cidade = "CONCEICAO DO RIO VERDE";
        $estado = "MG";
      } else if ($banco == "RUR" || $banco == "URB") {
        $cidade = "ALFENAS";
        $estado = "MG";
      }
    }

    if (dif_data($row->admi, $row2->dtnc) < 1) {

      $dt_cert = date('dmY', strtotime(converteData2($row->admi) . ' + 1 days'));
    } else {
      $dt_cert = date('dmY', strtotime(converteData2($row2->dtnc) . ' + 1 days'));
    }



    echo "depend" . ";";                                           // Constante
    echo $num . ";";                                          // Número do registro
    echo $emp_estab["empresa"] . ";";                         // Número da empresa
    echo $emp_estab["estabelecimento"] . ";";                 // Número do estabelecimento
    echo removeDigito($acss) . ";";                           // Matrícula sem dígito
    echo $cod_dep . ";";                                      // Código do dependente;
    echo $tp_info . ";";                                      // Tipo de informação 1 - Dependente
    echo trim($nome_dep) . ";";                               // Nome do dependente
    echo $sexo . ";";                                         // Sexo do dependente
    echo converteData($row2->dtnc) . ";";                     // Data de nascimento do dependente
    echo $pare . ";";                                         // Grau de parentesco
    echo $incide . ";";                                       // Incidência imposto de renda e salário família
    echo $est_saude . ";";                                    // Estado de saúde do dependente: 1 - Normal
    echo $sit_sal_fam . ";";                                  // Situação do salário família
    echo $cidade . ";";                                       // Cidade de nascimento
    echo $estado . ";";                                       // Estado de nascimento
    echo $branco . ";";                                       // Nome do cartório
    echo $branco . ";";                                       // Número do registro de nascimento
    echo $branco . ";";                                       // Número da folha de registro
    echo $branco . ";";                                       // Número do livro de registro
    echo $branco . ";";                                       // CGC do cartório
    echo $dt_cert . ";";                                      // Data da certidão de nascimento
    echo $dt_cert . ";";                                      // Data da entrega da certião
    echo $pais . ";";                                         // País de nascimento
    echo $branco . ";";                                       // Uso interno datasul
    echo $branco . ";";                                       // Código de registro no sistema externo
    echo $est_cur_sup . ";";                                  // Estudante de curso superior
    echo $comp_fre_esc . ";";                                 // Comprovante de frequencia escolar
    echo "01102014" . ";";                                    // Data da apresentação Comprovante de frequencia escolar
    echo $branco . ";";                                       // Nome da Mãe
    echo $branco . ";";                                       // CPF Titular responsável
    echo $branco . ";";                                       // Número da pessoa física
    echo $branco . ";";                                       // Registro Matrícula nascimento
    echo $branco . ";";                                       // Declaração de nascido vivo
    echo $branco . ";";                                       // Número cartão nacional de saúdo

    $num++;
    $cod_dep++;
    echo '<br />';
  }
}
?>