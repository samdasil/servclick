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
			if(AdministradorDao::logar($login, $senha)){
				if(!session_start()) session_start();
				$_SESSION['idadmin'] = $admin;
			}
			*/

			if($cliente = ClienteDao::logar($login, $senha)){
				return $cliente;
			}

			//JuridicoDao::logar();
			//FisicoDao::logar();
			
			//$usuario = new Usuario();

			//$usuario->setLogin($rs["login"]);
			//$usuario->setSenha($rs["senha"]);
			//$usuario->setPerfil($rs["perfil"]);
			
			//if($rs > 0){

				/* DEBUG */
				/*
				print_r($usuario);
				exit;
				*/
			//	return $usuario;
			//}else{
				
				/* DEBUG */
				/*
				print_r($rs);
				exit;
				*/
			//	return false;
			//}

		}

		static function verificaUsuario($id){
			
				if(!isset($_SESSION)) session_start();

				if((isset($_SESSION['idadmin'])) or isset($_SESSION['idcliente']) or isset($_SESSION['idfisico']) or isset($_SESSION['idjuridico'])){
					return true;
				}else{
					return false;
				}

		}
		
	}
?>