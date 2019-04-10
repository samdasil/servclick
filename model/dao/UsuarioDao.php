<?php
	
	require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/config/Conexao.php';

	class UsuarioDao
	{

		public function __construct()
		{
			$con = new Conexao;
		}
		
		public function inserirUsuario(Usuario $usuario)
		{
			
			$SQL = $con->prepare("INSERT INTO usuario (login, senha, perfil) VALUES (?, ?, ?)") or die ($mysqli->error);
			
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
			
			$SQL = $con->query("SELECT * FROM usuario");
				
			return $SQL;
		
		}

		public function buscarUsuario(Usuario $usuario)
		{
			
			$SQL = $con->query("SELECT * FROM usuario WHERE login = '".$login."' AND senha = '".$senha."' AND status != 2");
			
			$rs = $SQL->fetch_array();
			
			$usuario->setIdusuario($rs["idusuario"]);
			$usuario->setLogin($rs["login"]);
			
			return $usuario;

		}
		
		public function realizarLogin($login, $senha)
		{

			/*
			if($admin = AdministradorDao::logar($login, $senha)){
				return $admin;
			}
			*/

			if($cliente = ClienteDao::logar($login, $senha)){
				return $cliente;
			}

			/*
			if($fisico = FisicoDao::logar($login, $senha)){
				return $fisico;
			}
			*/
			/*
			if($fisico = AdministradorDao::logar($login, $senha)){
				return $fisico;
			}
			*/
			/*
			if($juridico = JuridicoDao::logar($login, $senha)){
				return $juridico;
			}
			*/
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
		
		public function editarAcesso($dados, $id)
		{

			$con = new Conexao;
			
			if(!Usuario::verificaUsuario($id)) return false;

			if(isset($_SESSION['idadmin'])) {

				$query = "UPDATE administrador SET login = ? AND senha = ? WHERE idadmin = ?";

				$stmt = $con->getConexao()->prepare($query);

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

			} else if(isset($_SESSION['idcliente'])) {

				$query = "UPDATE cliente SET login = ? AND senha = ? WHERE idcliente = ?";

				$stmt = $con->getConexao()->prepare($query);

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

				$query = "UPDATE fisico SET login = ? AND senha = ? WHERE idfisico = ?";

				$stmt = $con->getConexao()->prepare($query);

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

				$query = "UPDATE juridico SET login = ? AND senha = ? WHERE idjuridico = ?";

				$stmt = $con->getConexao()->prepare($query);

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