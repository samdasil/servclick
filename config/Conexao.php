<?php

class Conexao {
    
    /* variáveis de conexao */
    const DSN  = "mysql:dbname=dbserv; host=localhost" ;
	const USER = "root";
	const PASS = "";
	public static $con;

	/* gerar nova conexao ao banco de dados */
	public static function getCon() 
	{
		try {
			
			/* tenta nova instancia de conexao */
			self::$con = new PDO(Conexao::DSN, Conexao::USER, Conexao::PASS);

			return self::$con;

		} catch (PDOException $e) {
			
			/* caso haja erro na conexao, retorna o erro */
			//$this->con->getMessage();
			echo $e;

		}
	}
    
}
