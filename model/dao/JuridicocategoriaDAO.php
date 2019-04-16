<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class JuridicocategoriaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($juridico){
		//include("conexao.php");
		$sql = 'SELECT * FROM juridicocategoria WHERE juridico = :juridico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":juridico",$juridico);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		//include("conexao.php");
		$sql = 'SELECT * FROM juridicocategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM juridicocategoria ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($juridico){
		//include("conexao.php");
		$sql = 'DELETE FROM juridicocategoria WHERE juridico = :juridico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":juridico",$juridico);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($juridicocategoria){
		//include("conexao.php");
		$sql = 'INSERT INTO juridicocategoria (juridico, categoria) VALUES (:juridico, :categoria)';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':juridico',$juridicocategoria->getJuridico()); 
		$consulta->bindValue(':categoria',$juridicocategoria->getCategoria()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($juridicocategoria){
		//include("conexao.php");
		$sql = 'UPDATE juridicocategoria SET juridico = :juridico, categoria = :categoria WHERE juridico = :juridico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':juridico',$juridicocategoria->getJuridico()); 
		$consulta->bindValue(':categoria',$juridicocategoria->getCategoria()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM juridicocategoria';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>