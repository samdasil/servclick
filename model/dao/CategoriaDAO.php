<?php

class CategoriaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idcategoria){
		//include("conexao.php");
		$sql = 'SELECT * FROM categoria WHERE idcategoria = :idcategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idcategoria",$idcategoria);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		//include("conexao.php");
		$sql = 'SELECT * FROM categoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM categoria ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idcategoria){
		//include("conexao.php");
		$sql = 'DELETE FROM categoria WHERE idcategoria = :idcategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idcategoria",$idcategoria);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($categoria){
		//include("conexao.php");
		$sql = 'INSERT INTO categoria (idcategoria, descricao) VALUES (:idcategoria, :descricao)';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idcategoria',$categoria->getIdcategoria()); 
		$consulta->bindValue(':descricao',$categoria->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($categoria){
		//include("conexao.php");
		$sql = 'UPDATE categoria SET idcategoria = :idcategoria, descricao = :descricao WHERE idcategoria = :idcategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idcategoria',$categoria->getIdcategoria()); 
		$consulta->bindValue(':descricao',$categoria->getDescricao()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM categoria';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>