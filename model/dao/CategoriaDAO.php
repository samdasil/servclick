<?php

	class CategoriaDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($idcategoria)
		{
			
			$sql = 'SELECT * FROM categoria WHERE idcategoria = :idcategoria';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idcategoria",$idcategoria);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listar()
		{
			
			$sql = 'SELECT * FROM categoria';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function pesquisar($pesquisa)
		{
			
			$sql = 'SELECT * FROM categoria ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Apaga um elemento da tabela
		public function deletar($idcategoria)
		{
			
			$sql = 'DELETE FROM categoria WHERE idcategoria = :idcategoria';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idcategoria",$idcategoria);
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Insere um elemento na tabela
		public function cadastrar(Categoria $categoria)
		{
			
			$sql = 'INSERT INTO categoria (descricao) VALUES (:descricao)';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':descricao',$categoria->getDescricao()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Categoria $categoria)
		{
			
			$sql = 'UPDATE categoria SET idcategoria = :idcategoria, descricao = :descricao WHERE idcategoria = :idcategoria';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idcategoria',$categoria->getIdcategoria()); 
			$consulta->bindValue(':descricao',$categoria->getDescricao()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

	}
?>