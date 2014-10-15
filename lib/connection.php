<?php

/*
 * Classe de conexão com o banco de dados postgresql
 */

/**
 * Description of connection
 *
 * @author drc
 */
class connection {

  var $db_HOST = "taurus";
  var $db_PORT = "5432";
  var $db_USER = "postgres";
  var $db_PASS = "pgsql102030";
  var $db = "";
  var $CONST_ERRO = "erro ao conectar no nosso banco";
  var $dbc;
  var $last_id;

  function connection($db) {
    $this->db = $db;
    $this->connect_db();
  }

  function connect_db() {
    $connect_string = "host=" . $this->db_HOST . " port=" . $this->db_PORT . " user=" . $this->db_USER . " password=" . $this->db_PASS . " dbname=" . $this->db;
    $this->dbc = pg_connect($connect_string);
    return $dbc;
  }

  function close_db() {
    pg_close($this->dbc);
  }

  function query($sql) {
    $sts = pg_query($this->dbc, $sql) or die($this->CONST_ERRO . pg_last_error());
    return($sts);
  }

}
