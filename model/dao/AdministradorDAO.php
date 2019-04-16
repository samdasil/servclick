<?php

class AdministradorDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idadmin){
		//$conexao = new Conexao();
		$sql = 'SELECT * FROM administrador WHERE idadmin = :idadmin';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idadmin",$idadmin);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		//include("conexao.php");
		$sql = 'SELECT * FROM administrador';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM administrador ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idadmin){
		//include("conexao.php");
		$sql = 'DELETE FROM administrador WHERE idadmin = :idadmin';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idadmin",$idadmin);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function inserir($administrador){
		//include("conexao.php");
		$sql = 'INSERT INTO administrador (idadmin, nome, login, senha, status_, perfil, dtcadastro) VALUES (:idadmin, :nome, :login, :senha, :status_, :perfil, :dtcadastro)';
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
	
	//Atualiza um elemento na tabela
	public function atualizar($administrador){
		//include("conexao.php");
		$sql = 'UPDATE administrador SET idadmin = :idadmin, nome = :nome, login = :login, senha = :senha, status_ = :status_, perfil = :perfil, dtcadastro = :dtcadastro WHERE idadmin = :idadmin';
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

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM administrador';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>