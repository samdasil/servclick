<?php

	class AreaAtuacaoDAO{

		//Carrega um elemento pela chave primária
		public function carregar($idarea)
		{
			$sql = 'SELECT a.idarea idarea,
						   a.descricao descricao,
						   a.categoria categoria,
						   c.idcategoria idcategoria,
						   c.descricao desc_categoria
					FROM areaatuacao a
					INNER JOIN categoria c ON c.idcategoria = a.categoria
					WHERE a.idarea = :idarea';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idarea",$idarea);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarAreas()
		{
			$sql = 'SELECT a.idarea idarea,
						   a.descricao descricao,
						   a.categoria categoria,
						   c.idcategoria idcategoria,
						   c.descricao desc_categoria
					FROM areaatuacao a
					INNER JOIN categoria c ON c.idcategoria = a.categoria
					ORDER BY a.descricao';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarAreasPorcategoria($categoria)
		{
			$sql = 'SELECT a.idarea idarea,
						   a.descricao descricao,
						   a.categoria categoria,
						   c.idcategoria idcategoria,
						   c.descricao desc_categoria
					FROM areaatuacao a
					INNER JOIN categoria c ON c.idcategoria = a.categoria
					WHERE a.categoria = :categoria
					ORDER BY a.descricao';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":categoria",$categoria);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listar($idcategoria)
		{
			$sql = 'SELECT a.idarea, a.descricao FROM areaatuacao a
					INNER JOIN  categoria c ON c.idcategoria = a.categoria
					WHERE a.categoria = :idcategoria
					ORDER BY a.descricao';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idcategoria",$idcategoria);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Apaga um elemento da tabela
		public function deletar($idarea)
		{
			$sql = 'DELETE FROM areaatuacao WHERE idarea = :idarea';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idarea",$idarea);
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Insere um elemento na tabela
		public function cadastrar(AreaAtuacao $area)
		{
			$sql = 'INSERT INTO areaatuacao (descricao, categoria) VALUES (:descricao, :categoria)';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':descricao',$area->getDescricao()); 
			$consulta->bindValue(':categoria',$area->getCategoria()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(AreaAtuacao $area){
			$sql = 'UPDATE areaatuacao SET idarea = :idarea, descricao = :descricao, categoria = :categoria WHERE idarea = :idarea';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idarea',$area->getIdarea()); 
			$consulta->bindValue(':descricao',$area->getDescricao()); 
			$consulta->bindValue(':categoria',$area->getCategoria()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

	}

?>