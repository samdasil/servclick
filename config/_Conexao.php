<?php

class Conexao {
    
    /* variáveis de conexao */
    private $dsn;
	private $user;
	private $pass;
	private $con;

	/* construtor da classe conexão, chmando o métod getCon() */
	public function __construct($dsn='mysql:dbname=dbservclick; host=localhost', $user='root',  $pass='') {

		$this->dsn = $dsn;
		$this->user = $user;
		$this->pass = $pass;

		$this->getCon();

	}

	/* gerar nova conexao ao banco de dados */
	public function getCon() 
	{
		try {
			
			/* tenta nova instancia de conexao */
			$this->con = new PDO($this->dsn, $this->user, $this->pass);

		} catch (PDOException $e) {
			
			/* caso haja erro na conexao, retorna o erro */
			$this->con->getMessage();

		}
	}
    
}
