<?php

	class AdministradorDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($idadmin)
		{
			
			$sql = 'SELECT * FROM administrador WHERE idadmin = :idadmin';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idadmin",$idadmin);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listar()
		{
			
			$sql = 'SELECT * FROM administrador';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		public function pesquisar($pesquisa)
		{
			
			$sql = 'SELECT * FROM administrador ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Insere um elemento na tabela
		public function cadastrar(Administrador $administrador)
		{
			
			$sql = 'INSERT INTO administrador (nome, login, senha, status_, perfil) VALUES (:nome, :login, :senha, :status_, :perfil)';
			$consulta = Conexao::getCon()->prepare($sql);
			 
			$consulta->bindValue(':nome',$administrador->getNome()); 
			$consulta->bindValue(':login',$administrador->getLogin()); 
			$consulta->bindValue(':senha',$administrador->getSenha()); 
			$consulta->bindValue(':status_',$administrador->getStatus()); 
			$consulta->bindValue(':perfil',$administrador->getPerfil()); 

			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Administrador $administrador)
		{
			
			$sql = 'UPDATE administrador SET nome = :nome WHERE idadmin = :idadmin';
			$consulta = Conexao::getCon()->prepare($sql);

			$consulta->bindValue(':nome',$administrador->getNome()); 
			$consulta->bindValue(':idadmin',$administrador->getIdadmin()); 
			
			if($consulta->execute())
				return true;
			else
				return false;
		}

		//Atualiza um elemento na tabela
		public function desativar(Administrador $administrador)
		{
			
			$sql = 'UPDATE administrador SET status_ = 2 WHERE idadmin = :idadmin';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idadmin',$administrador->getIdadmin()); 
			
			if($consulta->execute())
				return true;
			else
				return false;
		}

	}
?>