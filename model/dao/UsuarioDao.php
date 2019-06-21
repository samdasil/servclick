<?php

	class UsuarioDAO
	{
		
		public function carregar($login = null)
		{

			$sql = "CALL SP_CARREGAR_USUARIO(:login)";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":login", $login);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		public function buscarUsuario(Usuario $usuario)
		{
			
			$SQL = Conexao::getCon()->query("SELECT * FROM usuario WHERE login = '".$login."' AND senha = '".$senha."' AND status != 2");
			
			$result = $SQL->fetch_array();
			
			$usuario->setIdusuario($result["idusuario"]);
			$usuario->setLogin($result["login"]);
			
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

		public static function verificaSessao($id)
		{
			
				if(!isset($_SESSION)) session_start();

				if((isset($_SESSION['idadmin'])) or isset($_SESSION['idcliente']) or isset($_SESSION['idfisico']) or isset($_SESSION['idjuridico'])){
					return true;
				}else{
					return false;
				}

		}
		
		public function editarAcesso($usuario)
		{
			
			switch ($usuario->getPerfil()) {
				case 1:
					$table = 'administrador';
					$user  = 'idadmin';
					$id    = $usuario->getIdadmin();
					break;
				case 2:
					$table  = 'cliente';
					$user 	= 'idcliente';
					$id     = $usuario->getIdcliente();
					break;
				case 3:
					if($usuario->getIdfisico() > 0) {
						$table  = 'fisico';
						$user 	= 'idfisico';
						$id     = $usuario->getIdfisico();
					}else if($usuario->getIdjuridico() > 0){
						$table  = 'juridico';
						$user 	= 'idjuridico';
						$id     = $usuario->getIdjuridico();
					}
					break;
				default:
					
					break;
			}
			
			$sql = "UPDATE $table SET login = :login, senha = :senha, status_ = :status_ WHERE $user = :id";
			//echo $sql;exit;

			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":login", $usuario->getLogin());
			$consulta->bindValue(":senha", $usuario->getSenha());
			$consulta->bindValue(":status_", $usuario->getStatus_());
			$consulta->bindValue(":id"   , $id);

			if($consulta->execute())
				return true;
			else
				return false;

		}

		//Lista todos os USUARIOS
		public function listar()
		{
			$sql = 'CALL SP_LISTAR_USUARIOS()';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();

			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}


	    public static function verificarLogin($login='')
	    {
	        $sql = "SP_VALIDAR_USUARIO(:login)";

			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":login", $login);

			if($consulta->execute())
				return true;
			else
				return false;
	    }

	}
?>