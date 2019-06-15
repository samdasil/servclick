<?php

class ServicoDAO{

	public function carregar($idservico){
		
		$sql = 'SELECT * FROM servico WHERE idservico = :idservico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idservico",$idservico);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os servicos do cliente
	public function listarServicos($idcliente){
		
		$sql = 'SELECT * FROM servico
				WHERE cliente = :idcliente';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idcliente", $idcliente);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os servicos do profissional
	public function listarServicosProfissional($profissional, $perfil){

		$sql = "SELECT *, s.status_ stat, c.status_ statc FROM servico s 
				INNER JOIN 	cliente c ON c.idcliente = s.cliente 
				WHERE s.".$perfil." = :profissional";

		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":profissional", $profissional);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os servicos por area e status_
	public function listarServicosPorStatus($idarea, $status_){
		
		$sql = 'SELECT * FROM servico s
				INNER JOIN 	cliente c ON c.idcliente = s.cliente
				WHERE s.area = :idarea AND s.status_ = :status_';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idarea', $idarea);
		$consulta->bindValue(':status_', $status_);
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
		
		$sql = 'INSERT INTO servico ( area, descricao, dtinicio, status_, cliente, endereco ) VALUES ( :area, :descricao, :dtinicio, :status_, :cliente, :endereco )';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':area',$servico->getArea()); 
		$consulta->bindValue(':descricao',$servico->getDescricao()); 
		$consulta->bindValue(':dtinicio',$servico->getDtinicio()); 
		$consulta->bindValue(':status_',$servico->getStatus_()); 
		$consulta->bindValue(':cliente',$servico->getCliente()); 
		$consulta->bindValue(':endereco',$servico->getEndereco()); 
		
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

	//aceitar servico pelo profissional
	public function aceitar(Servico $servico){

		if ( $servico->getFisico()   != null ) { $fisico   = $servico->getFisico();   } else { $fisico   = null; };
		if ( $servico->getJuridico() != null ) { $juridico = $servico->getJuridico(); } else { $juridico = null; };
		
		$sql = 'UPDATE servico SET valor = :valor, status_ = :status_, fisico = :fisico, juridico = :juridico 
				WHERE idservico = :idservico';

		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idservico', 	$servico->getIdservico()); 
		$consulta->bindValue(':valor',		$servico->getValor()); 
		$consulta->bindValue(':status_',	$servico->getStatus_()); 
		$consulta->bindValue(':fisico',		$servico->getFisico()); 
		$consulta->bindValue(':juridico',	$servico->getJuridico()); 

		if($consulta->execute())
			return true;
		else
			return false;
	}

	//finalizar servico 
	public function finalizar(Servico $servico){

		$sql = 'UPDATE servico SET dtfim = :dtfim, status_ = :status_
				WHERE idservico = :idservico';

		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idservico', 	$servico->getIdservico()); 
		$consulta->bindValue(':dtfim',		$servico->getDtfim()); 
		$consulta->bindValue(':status_',	$servico->getStatus_()); 

		if($consulta->execute())
			return true;
		else
			return false;
	}

	//cancelar servico 
	public function cancelar(Servico $servico){

		$sql = 'UPDATE servico SET dtfim = :dtfim, status_ = :status_
				WHERE idservico = :idservico';

		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idservico', 	$servico->getIdservico()); 
		$consulta->bindValue(':dtfim',		$servico->getDtfim()); 
		$consulta->bindValue(':status_',	$servico->getStatus_()); 

		if($consulta->execute())
			return true;
		else
			return false;
	}
	
}
?>