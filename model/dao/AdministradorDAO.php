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
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function pesquisar($pesquisar)
		{
			
			$sql = 'SELECT * FROM administrador ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		/*//Apaga um elemento da tabela
		public function deletar($idadmin){
			
			$sql = 'DELETE FROM administrador WHERE idadmin = :idadmin';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idadmin",$idadmin);
			if($consulta->execute())
				return true;
			else
				return false;
		}*/
		
		//Insere um elemento na tabela
		public function cadastrar(Administrador $administrador)
		{
			
			$sql = 'INSERT INTO administrador (nome, login, senha, status_, perfil, dtcadastro) VALUES (:nome, :login, :senha, :status_, :perfil)';
			$consulta = Conexao::getCon()->prepare($sql);
			 
			$consulta->bindValue(':nome',$administrador->getNome()); 
			$consulta->bindValue(':login',$administrador->getLogin()); 
			$consulta->bindValue(':senha',$administrador->getSenha()); 
			$consulta->bindValue(':status_',$administrador->getStatus_()); 
			$consulta->bindValue(':perfil',$administrador->getPerfil()); 

			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Administrador $administrador)
		{
			
			$sql = 'UPDATE administrador SET idadmin = :idadmin, nome = :nome, login = :login, senha = :senha, status_ = :status_, perfil = :perfil WHERE idadmin = :idadmin';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idadmin',$administrador->getIdadmin()); 
			$consulta->bindValue(':nome',$administrador->getNome()); 
			$consulta->bindValue(':login',$administrador->getLogin()); 
			$consulta->bindValue(':senha',$administrador->getSenha()); 
			$consulta->bindValue(':status_',$administrador->getStatus_()); 
			$consulta->bindValue(':perfil',$administrador->getPerfil()); 
			$consulta->bindValue(':dtcadastro',$administrador->getDtcadastro()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

	}
?>