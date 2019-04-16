<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class FisicocategoriaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($fisico){
		//include("conexao.php");
		$sql = 'SELECT * FROM fisicocategoria WHERE fisico = :fisico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":fisico",$fisico);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		//include("conexao.php");
		$sql = 'SELECT * FROM fisicocategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM fisicocategoria ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($fisico){
		//include("conexao.php");
		$sql = 'DELETE FROM fisicocategoria WHERE fisico = :fisico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":fisico",$fisico);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($fisicocategoria){
		//include("conexao.php");
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
	public function atualizar($fisicocategoria){
		//include("conexao.php");
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
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM fisicocategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>