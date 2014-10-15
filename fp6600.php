<?php

include_once './lib/connection.php';
include_once './lib/functions.php';

$banco = "RUR";

$db = new connection($banco);

$result = $db->query("SELECT * FROM dgs01 WHERE stat <> 'X' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' ORDER BY acss ASC");
//$result = $db->query("SELECT * FROM dgs01 WHERE stat = '' AND ccst NOT LIKE '005%' AND ccst NOT LIKE '000%' AND admi > '20140101' ORDER BY acss ASC");

if ($emp_estab["estabelecimento"] == "61") {
  $cat_sal = "2";
} else if ($banco == "URB" || $banco == "URB_RV") {
  $cat_sal = "1";
} else if ($banco == "RUR" || $banco == "RUR_RV") {
  $cat_sal = "5";
}
$c = 1;
while ($row = pg_fetch_object($result)) {

  $acss = $row->acss;
  $nome = trim($row->nome);
  $sexo = $row->sexo;
  $civi = $row->civi;

  $result3 = $db->query("SELECT * FROM ds01c WHERE acss = '$acss' AND stat != 'X'");
  $row3 = pg_fetch_object($result3);

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
  echo $acss . ";";                                     // Número de registro do funcionário
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
  $zip_code = "";

  $ctps_num = "";
  $ctps_ser = "";
  if ($nscp != "") {
    for ($i = 0; $i <= 6; $i++) {
      $ctps_num .= $nscp[$i];
    }

    for ($i = 7; $i <= strlen($nscp); $i++) {
      $ctps_ser .= $nscp[$i];
    }
  }

  if ($row3->etna == "1") {
    $cutis = "01";
  } else if ($row3->etna == "2") {
    $cutis = "02";
  } else if ($row3->etna == "3") {
    $cutis = "04";
  } else if ($row3->etna == "4") {
    $cutis = "03";
  } else if ($row3->etna == "5") {
    $cutis = "06";
  } else {
    $cutis = "05";
  }

  $year = $row->dtnc[0] . $row->dtnc[1] . $row->dtnc[2] . $row->dtnc[3];

  if ($year > 2000) {
    $dt_nasc = converteData($row->dtnc);
    $dt_nasc[4] = 1;
    $dt_nasc[5] = 9;
  } else {
    $dt_nasc = converteData($row->dtnc);
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
  echo $dt_nasc . ";";                  // Data de nascimento
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
  echo $zip_code . ";";                                 // Zip code
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

  $grau = $row->grau;
  $num_sal_fam = $row->ndsf;
  $num_ir = $row->ndir;
  $tboc = $row->tboc;
  $msal = $row->msal;
  $csal = $row->csal;
  $vsal = $row->vsal;
  $nbco = $row->nbco;


  $g_instru = "";
  if ($grau == 1) {
    $g_instru = 1;
  } else if ($grau == 2) {
    $g_instru = 6;
  } else if ($grau == 3) {
    $g_instru = 11;
  } else if ($grau == 4) {
    $g_instru = 16;
  } else if ($grau == 5) {
    $g_instru = 21;
  } else if ($grau == 6) {
    $g_instru = 26;
  } else if ($grau == 7) {
    $g_instru = 31;
  } else if ($grau == 8) {
    $g_instru = 36;
  } else if ($grau == 9) {
    $g_instru = 41;
  } else {
    $g_instru = 31;
  }

  $indic_estu = "N";                                    // N - Não
  $uni_fed_emp = "";
  $mat_inss = "";
  $dt_ult_exem = "";
  $g_sanguineo = "05";                                  // 05 - Não informado
  $fator_rh = "3";                                      // 3 - Não informado
  $inic_doador = "N";                                   // N - Não
  $dt_vencto_fam = "31122014";
  $pl_lotacao = "1";
  $uni_lotacao = "110100000";
  $c_custo = "001";
  $t_apropriacao = "01";                                // 01 - Por centro de custo
  $c_turno = "0001";
  $turma = "1";
  $num_relo_ponto = "";
  $num_chapeiro = "";
  $num_car_ponto = "";
  $t_funcionario = "01";                                // 01 - Funcionário
  $indic_qualif = "S";                                  // S - Sim
  $cod_vinc_emp = "10";                                 // 10 - Trabalhador urbano vinculado a pessoa jurídica
  $vinculo_fun = "1";                                   // 1 - Com vínculo empregatício
  $t_mao_de_obra = "DIR";                               // DIR - Direta
  $cod_nivel = "0";                                     // Código do nível: 0 - Zé Ruela

  $tab_sal = "N";                                       // N - Não
  $cod_tab_sal = "";
  $fx_tab_sal = "";
  $nv_tab_fx = "";

  if ($msal + $csal > 0) {
    $sal_autal = str_replace('.', '', $msal + $csal) . "00";
  } else if ($vsal > 0) {
    $sal_autal = str_replace('.', '', $vsal) . "00";
  } else {
    $sal_autal = '26000';
  }



  $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' ORDER BY acss DESC, exer DESC, mesf DESC");
  $row2 = pg_fetch_object($result2);
  $ms = $row2->msal;
  $cs = $row2->csal;

  if ($ms == "") {
    $ms = 0;
  }

  if ($cs == "") {
    $cs = 0;
  }
  $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' AND msal = '$ms' AND csal = '$cs' ORDER BY acss ASC, exer ASC, mesf ASC");
  $row2 = pg_fetch_object($result2);
  $dt_ult_sal = "01" . $row2->mesf . $row2->exer;

  if ($dt_ult_sal == "01") {
    $dt_ult_sal = converteData($row->admi);
  }

  if (dif_data($row->admi, $row2->exer . $row2->mesf . "01") < 1) {
    $dt_ult_sal = converteData($row->admi);
  }

  $motivo_alt = "10";                                   // 10 - Acordo coletivo
//  $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' ORDER BY acss ASC, exer ASC, mesf ASC");
//  $row2 = pg_fetch_object($result2);
//  $ms = $row2->msal;
//  $cs = $row2->csal;
//  $sal_admin = str_replace('.', '', $ms + $cs) . "00";
  $result2 = $db->query("SELECT * FROM ds041 WHERE acss = '$acss' ORDER BY acss ASC, exer ASC, mesf ASC");
  while ($row2 = pg_fetch_object($result2)) {
    if ($row2->msal > 0) {
      $ms = $row2->msal;
      $cs = $row2->csal;
      $sal_admin = str_replace('.', '', $ms + $cs) . "00";
      break;
    }
  }


  $sal_simulado = "";
  $optante_FGTS = "S";                                  // S - Sim
  $cod_fgts = "";
  $tipo_admi_fgts = "1";                                // 2 - Reemprego
  $indicador_reco_fgts = "S";                           // S - Sim
  $num_meses_fgts = "";
  $indicador_reco_inss = "S";                           // S - Sim
  $classe_inss = "";
  $dt_mudanca_inss = "";

  $form_pagto = "";
  if ($banco == "URB" && $nbco == 003) {
    $form_pagto = "03";
    $cod_banco = "";
    $cod_agencia = "";
    $forma_pagto_banco = "";
  } else {
    $result2 = $db->query("SELECT * FROM dgs15 WHERE nbco = '$nbco'");
    $row2 = pg_fetch_object($result2);
    if ($row2->stat != "x") {
      $form_pagto = "01";
      $cod_banco = $row2->nrbc;
      $cod_agencia = $row2->nrag;
      $forma_pagto_banco = "01";
    } else {
      $form_pagto = "03";
      $cod_banco = "";
      $cod_agencia = "";
      $forma_pagto_banco = "";
    }
  }

  if ($banco == "RUR" && $nbco == 002) {
    $form_pagto = "03";
    $cod_banco = "";
    $cod_agencia = "";
    $forma_pagto_banco = "";
  } else {
    $result2 = $db->query("SELECT * FROM dgs15 WHERE nbco = '$nbco'");
    $row2 = pg_fetch_object($result2);
    if ($row2->stat != "x") {
      $form_pagto = "01";
      $cod_banco = $row2->nrbc;
      $cod_agencia = $row2->nrag;
      $forma_pagto_banco = "01";
    } else {
      $form_pagto = "03";
      $cod_banco = "";
      $cod_agencia = "";
      $forma_pagto_banco = "";
    }
  }

  if ($banco == "URB_RV" && $nbco == 002) {
    $form_pagto = "03";
    $cod_banco = "";
    $cod_agencia = "";
    $forma_pagto_banco = "";
  } else {
    $result2 = $db->query("SELECT * FROM dgs15 WHERE nbco = '$nbco'");
    $row2 = pg_fetch_object($result2);
    if ($row2->stat != "x") {
      $form_pagto = "01";
      $cod_banco = $row2->nrbc;
      $cod_agencia = $row2->nrag;
      $forma_pagto_banco = "01";
    } else {
      $form_pagto = "03";
      $cod_banco = "";
      $cod_agencia = "";
      $forma_pagto_banco = "";
    }
  }





  if ($banco == "RUR_RV" && $nbco == 002) {
    $form_pagto = "03";
    $cod_banco = "";
    $cod_agencia = "";
    $forma_pagto_banco = "";
  } else {
    $result2 = $db->query("SELECT * FROM dgs15 WHERE nbco = '$nbco'");
    $row2 = pg_fetch_object($result2);
    if ($row2->stat != "x" && trim($row2->nrbc) != "" && trim($row2->nrag) != "") {
      $form_pagto = "01";
      $cod_banco = $row2->nrbc;
      $cod_agencia = $row2->nrag;
      $forma_pagto_banco = "01";
    } else {
      $form_pagto = "03";
      $cod_banco = "";
      $cod_agencia = "";
      $forma_pagto_banco = "";
    }
  }

  if (trim($row->ncta) == "") {
    $form_pagto = "03";
    $cod_banco = "";
    $cod_agencia = "";
    $forma_pagto_banco = "";
  }

  $cod_banco_comp_fgts = "";
  $cod_agencia_comp_fgts = "";
  $cod_conta_comp_fgts = "";
  $cod_dig_comp_fgts = "";
  $forma_pagto_fgts = "";
  $regiao_salarial = "00";
  $cod_uni_negocio = "";
  $indi_cooperado = "";
  $cod_sefip = "1";

  if ($num_sal_fam == 0) {
    $dt_vencto_fam = "";
  }

  echo "funciona" . ";";                                // Constante
  echo "3" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $g_instru . ";";                                 // Grau de instrução
  echo $indic_estu . ";";                               // Indicador se funcionário estudante
  echo $uni_fed_emp . ";";                              // Unidade da federação do emprego anterior
  echo $mat_inss . ";";                                 // Número da matricula do inss
  echo $dt_ult_exem . ";";                              // Data do último exame médico
  echo $g_sanguineo . ";";                              // Grupo sanguineo
  echo $fator_rh . ";";                                 // Indicador do fator rh do grupo sanguineo
  echo $inic_doador . ";";                              // Indicador se o funcionário doador
  echo $num_sal_fam . ";";                              // Número dependentes para salário família
  echo $dt_vencto_fam . ";";                            // Data de vencimento cota salário família
  echo $num_ir . ";";                                   // Número dependentes para imposto de renda
  echo $pl_lotacao . ";";                               // Código do plano de lotação
  echo $uni_lotacao . ";";                              // Códifo da unidade de lotação
  echo $c_custo . ";";                                  // Código do centro de custo
  echo $t_apropriacao . ";";                            // Tipo de apropriação
  echo $c_turno . ";";                                  // Código do turno
  echo $turma . ";";                                    // Código da turma
  echo $num_relo_ponto . ";";                           // Número do relógio ponto
  echo $num_chapeiro . ";";                             // Número do chapeiro
  echo $num_car_ponto . ";";                            // Número do cartão ponto
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $t_funcionario . ";";                            // Tipo de funcionário
  echo $indic_qualif . ";";                             // Indica se funcaionário qualificado
  echo $cod_vinc_emp . ";";                             // Código do vínculo empregaticio
  echo $vinculo_fun . ";";                              // Indicador se funcionário com vínculo
  echo $t_mao_de_obra . ";";                            // Indicador do tipo de mão-de-obra
  echo intval($tboc) . ";";                             // Código do cargo
  echo $cod_nivel . ";";                                // Código do nível
  echo $sal_admin . ";";                                // Valor do salário
  echo $tab_sal . ";";                                  // Indicador se considera tabela salarios
  echo $cod_tab_sal . ";";                              // Código da tabela de salarios
  echo $fx_tab_sal . ";";                               // Faixa salarial da tabela
  echo $nv_tab_fx . ";";                                // Nível salarial da tabela
  echo $dt_ult_sal . ";";                               // Data da última alteração salarial
  echo $motivo_alt . ";";                               // Motivo da última alteração salarial
  echo intval($tboc) . ";";                             // Código do cargo básico atual
  echo $cod_nivel . ";";                                // Código do nível atual
  echo $sal_autal . ";";                                // Salário atual
  echo $sal_simulado . ";";                             // Salário simulado
  echo $optante_FGTS . ";";                             // Indicador se optante fgts
  echo converteData($row->admi) . ";";                  // Data da opção para FGTS
  echo $cod_fgts . ";";                                 // Código do sistema fgts
  echo $tipo_admi_fgts . ";";                           // Tipo admissão fgts;
  echo $indicador_reco_fgts . ";";                      // Indicador se recolhe fgts
  echo $num_meses_fgts . ";";                           // Número meses como não optante para fgts
  echo $indicador_reco_inss . ";";                      // Indicador se funcionário recebe inss
  echo $classe_inss . ";";                              // Classe inss sem vículo
  echo $dt_mudanca_inss . ";";                          // Data de mudança de classe do inss
  echo $form_pagto . ";";                               // Forma de pagamento
  echo $cod_banco . ";";                                // Código do banco da forma de pagamento
  echo $cod_agencia . ";";                              // Código da agência da forma de pagamento
  echo $forma_pagto_banco . ";";                        // Forma de pagamento no banco
  echo $cod_banco_comp_fgts . ";";                      // Código do banco compl fgts temporário
  echo $cod_agencia_comp_fgts . ";";                    // Código da agência compl fgts temporário
  echo $cod_conta_comp_fgts . ";";                      // Código da conta corrente compl fgts temporário
  echo $cod_dig_comp_fgts . ";";                        // Dígito da conta corrente compl fgts temporário
  echo $forma_pagto_fgts . ";";                         // Forma de pagamento no banco compl fgts temporário
  echo $regiao_salarial . ";";                          // Região salarial
  echo $cod_uni_negocio . ";";                          // Código da unidade de negócio
  echo $indi_cooperado . ";";                           // Indicador cooperado
  echo $cod_sefip;                                      // Código categoria sefip
  echo "<br />";

  // Fim Tipo 3
  //
  //Tipo 4

  $ncta = trim($row->ncta);

  $explode = explode('-', $ncta);
  list($cc_corrente, $cc_digito) = $explode;

  if ($cc_digito == "") {
    $cc_conta = "";
    $cc_dig = "";
    for ($i = 0; $i <= strlen($cc_corrente) - 1; $i++) {
      $cc_conta .= $cc_corrente[$i];
    }
    $cc_dig = $cc_corrente[strlen($cc_corrente)];
  } else {
    $cc_conta = $cc_corrente;
    $cc_dig = $cc_digito;
  }

  $indic_sindic = "N";                                  // N - Não
  $indic_desc_sindic = "N";                             // N - Não
  $indi_carga_turnos = "S";                             // S - Sim
  $indic_rec_adian = "N";                               // N - Não
  $indic_rais = "S";                                    // S - Sim
  $indic_decimo_ter = "S";                              // S - Sim
  $indic_ferias = "S";                                  // S - Sim
  $num_avos_ant = "";
  $num_avos = "";
  $vl_prov_dec = "";
  $vl_prov_inss = "";
  $vl_prov_fgts = "";
  $dias_prov_m_ant = "";
  $dias_prov_m_at = "";
  $vl_prov_acu_fer = "";
  $vl_prov_acu_inss = "";
  $vl_prov_acu_fgts = "";
  $vl_prov_acu_ter = "";
  $emite_cart_ponto = "3";                              // Não emite cartão
  $sld_hrs_comp_m_ant = "";
  $sn_sld_hrs_m_ant = "";
  $sn_sld_hors_comp = "";
  $cod_reg_ext = "";
  $num_end_res = "";

  $peric = getPeric($acss, $banco);
  $insa = getInsa($acss, $banco);

  $nome_pai = trim($row3->npai);
  $nome_mae = str_replace(';', '', trim($row3->nmae));
  $r_cnh = trim($row3->rhab);


  echo "funciona" . ";";                                // Constante
  echo "4" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $cc_conta . ";";                                 // Número da conta corrente
  echo $cc_dig . ";";                                   // Dígito verificador conta corrente
  echo $indic_sindic . ";";                             // Indicador se funcionário sindicalizado
  echo $indic_desc_sindic . ";";                        // Indicador se desconta contrib. sindical
  echo $indi_carga_turnos . ";";                        // Indicador se considera carga autom turno
  echo $peric["per"] . ";";                             // Indicador se recebe adic. periculosidade
  echo $peric["per_nv"] . ";";                          // Nível de periculosidade
  echo $insa["in"] . ";";                               // Indicador se recebe adic. insalubridade
  echo $insa["in_nv"] . ";";                            // Nível de insalubridade
  echo $indic_rec_adian . ";";                          // Indicador se recebe adiantamento
  echo $indic_rais . ";";                               // Indicador se considera na emissão rais
  echo $indic_decimo_ter . ";";                         // Indicador se calcula 13 salario
  echo $indic_ferias . ";";                             // Indicador se recebe férias
  echo $num_avos_ant . ";";                             // Número avos 13. salario cálculo anterior
  echo $num_avos . ";";                                 // Número avos 13. salário cálculo
  echo $vl_prov_dec . ";";                              // Valor provisão acumulada 13. salário
  echo $vl_prov_inss . ";";                             // Valor provisão acumulada inss 13 salário
  echo $vl_prov_fgts . ";";                             // Valor provisão acumulada fgts 13. salário
  echo $dias_prov_m_ant . ";";                          // Dias provisão férias mês anterior
  echo $dias_prov_m_at . ";";                           // Dias provisão férias mês atual
  echo $vl_prov_acu_fer . ";";                          // Valor provisão acumulada férias
  echo $vl_prov_acu_inss . ";";                         // Valor provisão acumulada inss férias
  echo $vl_prov_acu_fgts . ";";                         // Valor provisão acumulada fgts férias
  echo $vl_prov_acu_ter . ";";                          // Valor provisão acumulada 1/3 férias
  echo $emite_cart_ponto . ";";                         // Emite cartão ponto
  echo $sld_hrs_comp_m_ant . ";";                       // Saldo horas compensação mês anterior
  echo $sn_sld_hrs_m_ant . ";";                         // Sinal saldo horas compensação mês anterior
  echo $sn_sld_hors_comp . ";";                         // Sinal saldo horas compensação
  echo $nome_pai . ";";                                 // Nome do pai
  echo $nome_mae . ";";                                 // Nome da mãe
  echo $cod_reg_ext . ";";                              // Código registro no sistema externo
  echo $r_cnh . ";";                                    // Carteira de habilitação - número
  echo $num_end_res . ";";                              // Número endereço residencial
  echo $uso_dtsul;                                      // livre para uso futuro

  echo "<br />";

  // Fim Tipo 4
  //
  // Tipo 5

  $dt_ult_aval = "";
  $per_adian_conc = "";
  $dt_term_contr = "";
  $dt_ult_alt_end = "";
  $num_mes_trab_ant = "";
  $dt_expe_func = "";
  $dt_vencto_hab = "";
  $local_pagto = "";
  $contrib_sindical = "S";                              // Contribuição sindical em dia
  $cgc_cei_caged = "";
  $func_adm_caged = "";
  $cod_adm_caged = "";
  $func_dem_caged = "";
  $cod_dem_caged = "";
  $dt_cart_trab = "";
  $dt_val_cart_trab = "";
  $dt_pis_pasep = "";
  $cod_img = "";
  $compensacao = "";
  $compesa_mes = "";
  $qtd_dias_cont_exp = "";
  $cod_local_marca = "";
  $cod_fornecedor = "";
  $cod_class_func_pt_elec = "";

  if ($row->stat == "D" && $row->caus == 6) {
    $dt_trans = converteData($row->dqit);
  } else {
    $dt_trans = "";
  }

  echo "funciona" . ";";                                // Constante
  echo "5" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $nome . ";";                                     // Nome abreviado do funcionário
  echo $dt_trans . ";";                                 // Data de admissão de transferência
  echo $dt_ult_aval . ";";                               // Data da última avaliação do funcionário
  echo $per_adian_conc . ";";                           // Percentual de adiantamento a ser concedido
  echo $dt_term_contr . ";";                            // Data de término do contrato
  echo $dt_ult_alt_end . ";";                           // Data da última alteração do endereço do funcionário
  echo $num_mes_trab_ant . ";";                         // Número de meses no trabalho anterior
  echo $dt_expe_func . ";";                             // Data de experiência do funcionário
  echo $dt_vencto_hab . ";";                            // Data de vencimento da habilitação
  echo $local_pagto . ";";                              // Local de pagamento
  echo $contrib_sindical . ";";                         // Contribuição sindical em dia
  echo $cgc_cei_caged . ";";                            // CGC/CEI (Caged)
  echo $func_adm_caged . ";";                           // Funcionário admitido (Caged)
  echo $cod_adm_caged . ";";                            // Código admissão (caged)
  echo $func_dem_caged . ";";                           // Funcionário demitido (caged)
  echo $cod_dem_caged . ";";                            // Código demissão (caged)
  echo converteData(trim($row3->dcpr)) . ";";           // Data da carteira de trabalho
  echo $dt_val_cart_trab . ";";                         // Data de validade da carteira de trabalho
  echo $dt_pis_pasep . ";";                             // Data pis/pasep
  echo $cod_img . ";";                                  // Código da imagem
  echo $compensacao . ";";                              // Compesação
  echo $compesa_mes . ";";                              // Compensação mês
  echo $qtd_dias_cont_exp . ";";                        // Quantidade de dias contrato experiência
  echo $cod_local_marca . ";";                          // Código do local de marcação
  echo $cod_fornecedor . ";";                           // Código do fornecedor
  echo $cod_class_func_pt_elec . ";";                   // Código da classe de funcionários para ponto eletrônico
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul . ";";                                // Uso futuro
  echo $uso_dtsul;                                      // Uso futuro

  echo "<br />";

  // Fim Tipo 5
  //
  // Tipo 6

  $cart_trab_ant = "";
  $cart_trab_ant_ser = "";
  $pis_ant = "";
  $num_fax = "";
  $telex = "";
  $end_elec_internet = "";
  $indic_tipo_visto = "1";                              // 1 - Sem visto
  $cod_agen_noc = "0";                                  // Nunca esteve esposto
  $desc_rever_sindi = "S";
  $localidade = "1";

  if ($emp_estab["estabelecimento"] == '14' || $emp_estab["estabelecimento"] == '15') {
    $localidade = "2";
  }


  $cod_fpas = "0";

  $cod_sind = getSindicato($row->nsin, $banco);

  echo "funciona" . ";";                                // Constante
  echo "6" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $cart_trab_ant . ";";                            // Carteira de trabalho anterior- número
  echo $cart_trab_ant_ser . ";";                        // Carteira de trabalho anteiror - série
  echo $pis_ant . ";";                                  // Pis anterior
  echo $num_fax . ";";                                   // Número do fax
  echo $telex . ";";                                     // Telex
  echo $end_elec_internet . ";";                        // Endereço eletrônico na internet
  echo $end["estado"] . ";";                            // Código unidade federação nascimento
  echo $end["cidade"] . ";";                            // Cidade de nascimento do funcionario
  echo $indic_tipo_visto . ";";                         // Indicador tipo visto estrangeiro
  echo $uso_dtsul . ";";                                // Carteira de identidade estrangeiro - Data validade
  echo $uso_dtsul . ";";                                // Emissão identidade
  echo $uso_dtsul . ";";                                // Validade id estadual
  echo $uso_dtsul . ";";                                // Código da jornada de trabalho [1]
  echo $uso_dtsul . ";";                                // Código do intervalo de refeição [1]
  echo $uso_dtsul . ";";                                // Código da jornada de trabalho [2]
  echo $uso_dtsul . ";";                                // Código do intervalo de refeição [2]
  echo $uso_dtsul . ";";                                // Código da jornada de trabalho [3]
  echo $uso_dtsul . ";";                                // Código do intervalo de refeição [3]
  echo $uso_dtsul . ";";                                // Código da jornada de trabalho [4]
  echo $uso_dtsul . ";";                                // Código do intervalo de refeição [4]
  echo $uso_dtsul . ";";                                // Código da jornada de trabalho [5]
  echo $uso_dtsul . ";";                                // Código do intervalo de refeição [5]
  echo $cod_agen_noc . ";";                             // Código de exposição agentes nocivos
  echo $desc_rever_sindi . ";";                         // Desconto reversão sindical
  echo $pais . ";";                                     // Páis localidade
  echo $localidade . ";";                               // Localidade
  echo $cod_fpas . ";";                                 // Código FPAS
  echo $uso_dtsul . ";";                                // Código tomador de serviço
  echo $cod_sind;                                       // Código

  echo "<br />";

  // Fim Tipo 6
  //
  // Tipo 7

  $cat_trab_tab1 = "101";                               // 101 - Empregado - Geral
  $idica_adm = "1";                                     // 1 - Normal
  $nat_atividade = "1";                                 // 1 - Trabalhador urbano
  $reside_exterior = "N";
  $cas_brasi_estra = "N";
  $filhos_com_bras = "N";

  $muni_nasc_ibge = "06507"; // < < ----------- VER COMO FAZER
  $tp_logradouro = "R";  // < < ----------- VER COMO FAZER
  $muni_end_ibge = "06507";  // < < ----------- VER COMO FAZER

  echo "funciona" . ";";                                // Constante
  echo "7" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $cat_trab_tab1 . ";";                            // Categoria trabalhador - tab. 1 eSocial
  echo $idica_adm . ";";                                // indicativo admissão
  echo $nat_atividade . ";";                            // Natureza atividade
  echo $pais . ";";                                     // Pais nacionalidade
  echo $muni_nasc_ibge . ";";                           // Município nascimento - tab. ibge
  echo $uso_dtsul . ";";                                // RIC - Registro de identidade civil
  echo $uso_dtsul . ";";                                // UF RIC - registro de identidade civil
  echo $uso_dtsul . ";";                                // Cidade RIC - Registro de identidade civil
  echo $uso_dtsul . ";";                                // Orgão emissor ric - registro de identidade civil
  echo $uso_dtsul . ";";                                // Expedição ric - registro de identidade civil
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $uso_dtsul . ";";                                // Categoria CNH - carteira nacional de habilitação
  echo $uso_dtsul . ";";                                // UF CNH - Carteira nacional de habilitação
  echo $uso_dtsul . ";";                                // Orgão emissor cnh - Carteira nacional de habilitação
  echo $uso_dtsul . ";";                                // Expedição CNH - carteira nacional de habilitação
  echo $uso_dtsul . ";";                                // Expedição RNE - registro nacional de estrageiro
  echo $uso_dtsul . ";";                                // Orgão emissor rne - registro nacional de estrangeiro
  echo $tp_logradouro . ";";                            // Tipo de logradouro - tab. 20 esocial
  echo $muni_end_ibge . ";";                            // Município endereço - tab. ibge
  echo $uso_dtsul . ";";                                // E-mail principal
  echo $uso_dtsul . ";";                                // E-mail alternativo
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $reside_exterior . ";";                          // Reside no exterior
  echo $uso_dtsul . ";";                                // Código endereçamento postal quando reside no exterior
  echo $uso_dtsul . ";";                                // Data de chegada ao Brasil se estrangeiro
  echo $uso_dtsul . ";";                                // Data de naturalização
  echo $cas_brasi_estra . ";";                          // Casado(a) com brasileiro(a) se estrangeiro
  echo $filhos_com_bras . ";";                          // Tem filho(s) com brasileiro(a)
  echo $uso_dtsul . ";";                                // CAEPF - Código atividade específica pesso física
  echo $uso_dtsul . ";";                                // Uso interno datasul
  echo $uso_dtsul;                                      // Processo judicial

  echo "<br />";

  // Fim Tipo 7
  //
  // Tipo 8

  echo "funciona" . ";";                                // Constante
  echo "8" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $uso_dtsul . ";";                                // Natureza do estágio
  echo $uso_dtsul . ";";                                // Nível do estágio
  echo $uso_dtsul . ";";                                // Código da PF que representa o supervisor do estágio
  echo $uso_dtsul . ";";                                // Área de autação do estágiario
  echo $uso_dtsul . ";";                                // Número apólice de seguro estágio
  echo $uso_dtsul . ";";                                // Código da PJ que represnta a instituição ensino estágio
  echo $uso_dtsul;                                      // Código da PJ que represnta o agnte integração estágio

  echo "<br />";

  // Fim Tipo 8
  //
  // Tipo 9

  $tp_adm_esocial = "1";                                // 1 - Admissão
  $reg_traba = "1";                                     // CLT - Consolidação das Leis de Trabalho
  $reg_prev = "1";                                      // 1 - RGPS - Regime geral da previdência social
  $reg_jornada = "1";                                   // 1 - Submetidos a horário de trabalho (cap. II da CLT)
  $contra_trab_temp = "N";

  echo "funciona" . ";";                                // Constante
  echo "9" . ";";                                       // Tipo de informacao
  echo $emp_estab["empresa"] . ";";                     // Codigo da empresa
  echo $emp_estab["estabelecimento"] . ";";             // Codigo do estabelecimento
  echo removeDigito($acss) . ";";                       // Matrícula sem dígito
  echo getDV($acss) . ";";                              // Dígito da Matricula
  echo $tp_adm_esocial . ";";                           // Tipo admissão esocial
  echo $reg_traba . ";";                                // Regime trabalhista
  echo $reg_prev . ";";                                 // Regime previdênciario
  echo $reg_jornada . ";";                              // Regime jornada
  echo $uso_dtsul . ";";                                // Descrição salário variável
  echo $uso_dtsul . ";";                                // CNPJ empregador anterior
  echo $uso_dtsul . ";";                                // Matrícula esocial anterior
  echo $uso_dtsul . ";";                                // Início vínculo
  echo $uso_dtsul . ";";                                // CNPJ empresa cedente
  echo $uso_dtsul . ";";                                // Matrícula esocial empresa cedente
  echo $uso_dtsul . ";";                                // Data admissão empresa cedente
  echo $uso_dtsul . ";";                                // Ônus da cessão
  echo $contra_trab_temp . ";";                         // Contratação de trabalhor temporário
  echo $uso_dtsul . ";";                                // Motivo contratação
  echo $uso_dtsul . ";";                                // Matrícula esocial do funcionário substituído
  echo $uso_dtsul . ";";                                // CPF do funcionário substituído
  echo $uso_dtsul;                                      // Matrícula esocial

  echo "<br />";
}
?>

