<?php

	class FisicocategoriaDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($fisico)
		{
			
			$sql = 'SELECT * FROM fisicocategoria WHERE fisico = :fisico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":fisico",$fisico);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarTodos()
		{
			
			$sql = 'SELECT * FROM fisicocategoria';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function listarTodosOrgenandoPor($coluna)
		{
			
			$sql = 'SELECT * FROM fisicocategoria ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Apaga um elemento da tabela
		public function deletar($fisico)
		{
			
			$sql = 'DELETE FROM fisicocategoria WHERE fisico = :fisico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":fisico",$fisico);
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Insere um elemento na tabela
		public function inserir($fisicocategoria)
		{
			
			$sql = 'INSERT INTO fisicocategoria (fisico, categoria) VALUES (:fisico, :categoria)';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':fisico',$fisicocategoria->getFisico()); 
			$consulta->bindValue(':categoria',$fisicocategoria->getCategoria()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function atualizar($fisicocategoria)
		{
			
			$sql = 'UPDATE fisicocategoria SET fisico = :fisico, categoria = :categoria WHERE fisico = :fisico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':fisico',$fisicocategoria->getFisico()); 
			$consulta->bindValue(':categoria',$fisicocategoria->getCategoria()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

		//Apaga todos os elementos da tabela
		public function limparTabela()
		{
			
			$sql = 'DELETE FROM fisicocategoria';
			$consulta = Conexao::getCon()->prepare($sql);
			if($consulta->execute())
				return true;
			else
				return false;
		}
	}
?>