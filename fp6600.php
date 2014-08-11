<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "urb";

$db = new connection($banco);

$result = $db->query("SELECT * FROM dgs01 WHERE stat <> 'x' ORDER BY acss ASC LIMIT 500");
$num = 1;

if ($emp_estab["estabelecimento"] == "61") {
  $cat_sal = "2";
} else if ($banco == "urb" || $banco == "urb_rv") {
  $cat_sal = "1";
} else if ($banco == "rur" || $banco == "rur_rv") {
  $cat_sal = "5";
}

while ($row = pg_fetch_object($result)) {

  $acss = $row->acss;
  $nome = trim($row->nome);
  $sexo = $row->sexo;
  $civi = $row->civi;

  $emp_estab = recuperaEmpresaEstab($acss, $banco);

  if ($civi == 1) {
    $st_civil = "02";
  } else if ($civi == 2) {
    $st_civil = "01";
  } else if ($civi == 3) {
    $st_civil = "05";
  } else if ($civi == 4) {
    $st_civil = "04";
  }

  $end = getEndereco($acss, $banco);
  $pais = "BRA";
  $ddd_tel = "";
  $tel = "";
  $num_habilitacao = "";
  $uso_dtsul = "";

  // Tipo 1
  echo "funciona" . ";";                                // Constante
  echo "1" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $cat_sal . ";";                                  // Código da categoria salarial
  echo $nome . ";";                                     // Nome
  echo converteData($row->admi) . ";";                  // Data de admissao
  echo $num . ";";                                      // Número de registro do funcionário
  echo $sexo . ";";                                     // Sexo
  echo $st_civil . ";";                                 // Estado civil
  echo $end["endereco"] . ";";                          // Endereco
  echo $end["tp_ref"] . ";";                            // Ponto de Referencia
  echo $end["bairro"] . ";";                            // Bairro
  echo $end["cep"] . ";";                               // Cep
  echo $end["cidade"] . ";";                            // Cidade
  echo $end["estado"] . ";";                            // Estado
  echo $pais . ";";                                     // País
  echo $ddd_tel . ";";                                  // DDD Telefone
  echo $tel . ";";                                      // Telefone do funcionário
  echo $num_habilitacao . ";";                          // Número do certificado habilitacao profissional
  echo $uso_dtsul;                                      // Uso interno datasul
  echo "<br />";
  $num++;
  // Fim Tipo 1
  //
  //Tipo 2

  $cpf = $row->ncpf;
  $pis = $row->npis;
  $nscp = $row->nscp;

  $cx_postal = "";
  $origem = "01";                                       // 01 - Brasileiro
  $ano_chegada = "";
  $cat_identidade = "";
  $militar_doc = "03";                                  // 03 - Não informado ou Não possui
  $militar_regiao = "";
  $militar_circus = "";
  $militar_numero = "";
  $militar_serie = "";
  $ctps_mod = "3";                                      // 3 - Urbano
  $cutis = "03";                                        // 03 - Parda
  $cabelo = "02";                                       // 02 - Preto
  $olhos = "01";                                        // 01 - Castanho
  $altura = "";
  $peso = "";
  $manequim = "";
  $sapato = "";
  $deficiencia = "N";                                   // N - Não
  $d_prorrog = "";
  $dt_vencto_prorrog = "";
  $num_seq_reg = "";
  $cart_saude = "";

  $ctps_num = "";
  $ctps_ser = "";
  if ($nscp != "") {
    for ($i = 0; $i <= 5; $i++) {
      $ctps_num .= $nscp[$i];
    }

    for ($i = 6; $i <= strlen($nscp); $i++) {
      $ctps_ser .= $nscp[$i];
    }
  }

  echo "funciona" . ";";                                // Constante
  echo "2" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $cx_postal . ";";                                // Caixa postal do funcionário
  echo $ddd_tel . ";";                                  // DDD Telefone
  echo $tel . ";";                                      // Telefone do funcionário
  echo converteData($row->dtnc) . ";";                  // Data de admissao
  echo $origem . ";";                                   // Origem do funcionario
  echo $pais . ";";                                     // Nacionalidade;
  echo $ano_chegada . ";";                              // Ano de chegada ao País
  echo $cat_identidade . ";";                           // Carteira de identidade (Se extrangeiro)
  echo $cpf . ";";                                      // CPF
  echo $pis . ";";                                      // PIS
  echo $militar_doc . ";";                              // Documento militar - Tipo
  echo $militar_regiao . ";";                           // Documento militar - Regiao
  echo $militar_circus . ";";                           // Documento militar - Circunscricao
  echo $militar_numero . ";";                           // Documento militar - Número
  echo $militar_serie . ";";                            // Documento militar - série
  echo $end["ide_num"] . ";";                           // Carteira de ientidade - Número
  echo $end["ide_orm"] . ";";                           // Carteira de identidade - Orgao emissor
  echo $end["ide_est"] . ";";                           // Carteira de identidade - Estado
  echo $end["telt_num"] . ";";                          // Título de eleitor - Número
  echo $end["telt_seca"] . ";";                         // Título de eleitor - Seção
  echo $end["telt_zona"] . ";";                         // Título de eleitor - Zona
  echo $end["telt_cida"] . ";";                         // Título de eleitor - Cidade
  echo $end["telt_esta"] . ";";                         // Título de eleitor - Estado
  echo $ctps_num . ";";                                 // Carteira de trabalho - Número
  echo $ctps_ser . ";";                                 // Carteira de trabalho - Série
  echo $ctps_mod . ";";                                 // Carteira de trabalho - Modelo
  echo $end["ctps_esta"] . ";";                         // Carteira de trabalho - Estado emissor
  echo $end["cep"] . ";";                               // Zip code
  echo $cutis . ";";                                    // Cutis
  echo $cabelo . ";";                                   // Cabelo
  echo $olhos . ";";                                    // Olhos
  echo $altura . ";";                                   // Altura
  echo $peso . ";";                                     // Peso
  echo $manequim . ";";                                 // Manequim
  echo $sapato . ";";                                   // Sapato
  echo $deficiencia . ";";                              // Portador de deficiência física
  echo $d_prorrog . ";";                                // Dias prorrogação
  echo $dt_vencto_prorrog . ";";                        // Data vencimento prorrogacao
  echo $num_seq_reg . ";";                              // Número sequencial do registro
  echo $cart_saude;                                     // Cartão nacional de saude
  echo "<br />";

  // Fim Tipo 2
  //
  //Tipo 3

  echo "funciona" . ";";                                // Constante
  echo "3" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo "<br />";
}
?>

