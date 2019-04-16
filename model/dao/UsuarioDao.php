<?php

	class UsuarioDAO
	{

		public function __construct()
		{
			//$con = new Conexao;
		}
		
		public function inserirUsuario(Usuario $usuario)
		{
			
			$SQL = Conexao::getCon()->prepare("INSERT INTO usuario (login, senha, perfil) VALUES (?, ?, ?)") or die ($mysqli->error);
			
			$SQL->bind_param("sdiss", $P1, $P2, $P3);
			
			$P1 = $usuario->getLogin();
			$P2 = $usuario->getSenha();
			$P3 = $usuario->getPerfil();
			
			$SQL->execute();
			
			if ($SQL->affected_rows > 0){

				return true;

			}else{

				$erro = "Não foi possível criar usuário. Erro ao gravar.";
				
				return $erro;
				
			}

		}
		
		public function listarUsuario()
		{
			
			$SQL = Conexao::getCon()->query("SELECT * FROM usuario");
				
			return $SQL;
		
		}

		public function buscarUsuario(Usuario $usuario)
		{
			
			$SQL = Conexao::getCon()->query("SELECT * FROM usuario WHERE login = '".$login."' AND senha = '".$senha."' AND status != 2");
			
			$rs = $SQL->fetch_array();
			
			$usuario->setIdusuario($rs["idusuario"]);
			$usuario->setLogin($rs["login"]);
			
			return $usuario;

		}
		
		public function realizarLogin($login, $senha)
		{
		
			$sql = "CALL SP_REALIZAR_LOGIN(:login, :senha)";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindParam(":login", $login);
			$consulta->bindValue(":senha", $senha);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));

		}

		public static function verificaUsuario($id)
		{
			
				if(!isset($_SESSION)) session_start();

				if((isset($_SESSION['idadmin'])) or isset($_SESSION['idcliente']) or isset($_SESSION['idfisico']) or isset($_SESSION['idjuridico'])){
					return true;
				}else{
					return false;
				}

		}
		
		public function editarAcesso(Usuario $usuario, $id)
		{

			$con = new Conexao;

			if(!Usuario::verificaUsuario($id)) return false;

			if(isset($_SESSION['idadmin'])) {

				$query = "UPDATE administrador SET login = ?, senha = ? WHERE idadmin = ?";

				$stmt = Conexao::getCon()->getConexao()->prepare($query);

				$stmt->bind_param("ssi", $p1, $p2, $p3);

				$p1 = $usuario->getLogin();
				$p2 = $usuario->getSenha();
				$p3 = $id;

				$stmt->execute();

				if($stmt->affected_rows > 0) {
					
					return true;

				} else {
					
					return false;
				}

			} else if(isset($_SESSION['idcliente'])) {

				$query = "UPDATE cliente SET login = ?, senha = ? WHERE idcliente = ?";

				$stmt = Conexao::getCon()->getConexao()->prepare($query);

				$stmt->bind_param("ssi", $p1, $p2, $p3);

				$p1 = $dados['login'];
				$p2 = $dados['senha'];
				$p3 = $id;

				$stmt->execute();

				if($stmt->affected_rows > 0) {
					
					return true;

				} else {
					
					return false;
				}

			} else if(isset($_SESSION['idfisico'])) {

				$query = "UPDATE fisico SET login = ?, senha = ? WHERE idfisico = ?";

				$stmt = Conexao::getCon()->getConexao()->prepare($query);

				$stmt->bind_param("ssi", $p1, $p2, $p3);

				$p1 = $dados['login'];
				$p2 = $dados['senha'];
				$p3 = $id;

				$stmt->execute();

				if($stmt->affected_rows > 0) {
					
					return true;

				} else {
					
					return false;
				}

			} else if(isset($_SESSION['idjuridico'])) {

				$query = "UPDATE juridico SET login = ?, senha = ? WHERE idjuridico = ?";

				$stmt = Conexao::getCon()->getConexao()->prepare($query);

				$stmt->bind_param("ssi", $p1, $p2, $p3);

				$p1 = $dados['login'];
				$p2 = $dados['senha'];
				$p3 = $id;

				$stmt->execute();

				if($stmt->affected_rows > 0) {
					
					return true;

				} else {
					
					return false;
				}

			}

		}
	}
?>