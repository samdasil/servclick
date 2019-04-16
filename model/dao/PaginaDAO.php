<?php

	/* @Autor: Dalker Pinheiro
	   Classe DAO */
	   
class PaginaDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idpagina){
		
		$sql = 'SELECT * FROM pagina WHERE idpagina = :idpagina';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idpagina",$idpagina);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		//include("conexao.php");
		$sql = 'SELECT * FROM pagina';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM pagina ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idpagina){
		//include("conexao.php");
		$sql = 'DELETE FROM pagina WHERE idpagina = :idpagina';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idpagina",$idpagina);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($pagina){
		//include("conexao.php");
		$sql = 'INSERT INTO pagina (idpagina, facebook, instagram, pinterest, twitter, google, site) VALUES (:idpagina, :facebook, :instagram, :pinterest, :twitter, :google, :site)';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idpagina',$pagina->getIdpagina()); 
		$consulta->bindValue(':facebook',$pagina->getFacebook()); 
		$consulta->bindValue(':instagram',$pagina->getInstagram()); 
		$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
		$consulta->bindValue(':twitter',$pagina->getTwitter()); 
		$consulta->bindValue(':google',$pagina->getGoogle()); 
		$consulta->bindValue(':site',$pagina->getSite()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($pagina){
		//include("conexao.php");
		$sql = 'UPDATE pagina SET idpagina = :idpagina, facebook = :facebook, instagram = :instagram, pinterest = :pinterest, twitter = :twitter, google = :google, site = :site WHERE idpagina = :idpagina';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idpagina',$pagina->getIdpagina()); 
		$consulta->bindValue(':facebook',$pagina->getFacebook()); 
		$consulta->bindValue(':instagram',$pagina->getInstagram()); 
		$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
		$consulta->bindValue(':twitter',$pagina->getTwitter()); 
		$consulta->bindValue(':google',$pagina->getGoogle()); 
		$consulta->bindValue(':site',$pagina->getSite()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM pagina';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>