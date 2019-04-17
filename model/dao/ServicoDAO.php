<?php

class ServicoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idservico){
		
		$sql = 'SELECT * FROM servico WHERE idservico = :idservico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idservico",$idservico);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listar(){
		
		$sql = 'SELECT * FROM servico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function pesquisar($pesquisa){
		
		$sql = 'SELECT * FROM servico ORDER BY '.$pesquisa;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idservico){
		
		$sql = 'DELETE FROM servico WHERE idservico = :idservico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idservico",$idservico);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function cadastrar(Servico $servico){
		
		$sql = 'INSERT INTO servico (idservico, descricao, data, datafim, valor, status_, cliente, fisico, categoria, juridico) VALUES (:idservico, :descricao, :data, :datafim, :valor, :status_, :cliente, :fisico, :categoria, :juridico)';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idservico',$servico->getIdservico()); 
		$consulta->bindValue(':descricao',$servico->getDescricao()); 
		$consulta->bindValue(':data',$servico->getData()); 
		$consulta->bindValue(':datafim',$servico->getDatafim()); 
		$consulta->bindValue(':valor',$servico->getValor()); 
		$consulta->bindValue(':status_',$servico->getStatus_()); 
		$consulta->bindValue(':cliente',$servico->getCliente()); 
		$consulta->bindValue(':fisico',$servico->getFisico()); 
		$consulta->bindValue(':categoria',$servico->getCategoria()); 
		$consulta->bindValue(':juridico',$servico->getJuridico()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function editar(Servico $servico){
		
		$sql = 'UPDATE servico SET idservico = :idservico, descricao = :descricao, data = :data, datafim = :datafim, valor = :valor, status_ = :status_, cliente = :cliente, fisico = :fisico, categoria = :categoria, juridico = :juridico WHERE idservico = :idservico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idservico',$servico->getIdservico()); 
		$consulta->bindValue(':descricao',$servico->getDescricao()); 
		$consulta->bindValue(':data',$servico->getData()); 
		$consulta->bindValue(':datafim',$servico->getDatafim()); 
		$consulta->bindValue(':valor',$servico->getValor()); 
		$consulta->bindValue(':status_',$servico->getStatus_()); 
		$consulta->bindValue(':cliente',$servico->getCliente()); 
		$consulta->bindValue(':fisico',$servico->getFisico()); 
		$consulta->bindValue(':categoria',$servico->getCategoria()); 
		$consulta->bindValue(':juridico',$servico->getJuridico()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
}
?>