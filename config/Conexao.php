<?php

class Conexao {
    
    const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME   = "dbservclick";

	private $mysqli;

	public function __construct() {

		$this->mysqli = new mysqli("localhost", "root", "", "dbservclick");

	}

	public function getConexao() {
		return $this->mysqli;
	}

	public function getErro() {
		return $this->mysqli->error;
	}

	
    
}
