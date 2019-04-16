<?php

class EnderecoDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idendereco){
		////include("conexao.php");
		$sql = 'SELECT * FROM endereco WHERE idendereco = :idendereco';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idendereco",$idendereco);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function carregarEnderecoCliente($idcliente){
		////include("conexao.php");
		$sql = 'SELECT * FROM endereco INNER JOIN cliente ON idcliente = cliente WHERE idcliente = :cliente';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":cliente",$idcliente);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	public function carregarEnderecoFisico($idfisico){
		////include("conexao.php");
		$sql = 'SELECT * FROM endereco INNER JOIN fisico ON idfisico = fisico WHERE idfisico = :fisico';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":fisico",$idfisico);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		////include("conexao.php");
		$sql = 'SELECT * FROM endereco';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		$sql = 'SELECT * FROM endereco ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idendereco){
		//include("conexao.php");
		$sql = 'DELETE FROM endereco WHERE idendereco = :idendereco';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idendereco",$idendereco);
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Insere um elemento na tabela
	public function cadastrar(Endereco $endereco){
		//include("conexao.php");
		$sql = 'INSERT INTO endereco (cep, logradouro, cidade, bairro, estado, numero, complemento, cliente) VALUES (:cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento, :cliente)';
		$consulta = Conexao::getCon()->prepare($sql);
		//$consulta->bindValue(':idendereco',$endereco->getIdendereco()); 
		$consulta->bindValue(':cep',$endereco->getCep()); 
		$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
		$consulta->bindValue(':cidade',$endereco->getCidade()); 
		$consulta->bindValue(':bairro',$endereco->getBairro()); 
		$consulta->bindValue(':estado',$endereco->getEstado()); 
		$consulta->bindValue(':numero',$endereco->getNumero()); 
		$consulta->bindValue(':complemento',$endereco->getComplemento()); 
		$consulta->bindValue(':cliente',$endereco->getCliente()); 
		//$consulta->bindValue(':fisico',$endereco->getFisico()); 
		//$consulta->bindValue(':servico',$endereco->getServico()); 
		//$consulta->bindValue(':juridico',$endereco->getJuridico()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}
	
	//Atualiza um elemento na tabela
	public function atualizar($endereco){
		//include("conexao.php");
		$sql = 'UPDATE endereco SET idendereco = :idendereco, cep = :cep, logradouro = :logradouro, cidade = :cidade, bairro = :bairro, estado = :estado, numero = :numero, complemento = :complemento, cliente = :cliente, fisico = :fisico, servico = :servico, juridico = :juridico WHERE idendereco = :idendereco';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(':idendereco',$endereco->getIdendereco()); 
		$consulta->bindValue(':cep',$endereco->getCep()); 
		$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
		$consulta->bindValue(':cidade',$endereco->getCidade()); 
		$consulta->bindValue(':bairro',$endereco->getBairro()); 
		$consulta->bindValue(':estado',$endereco->getEstado()); 
		$consulta->bindValue(':numero',$endereco->getNumero()); 
		$consulta->bindValue(':complemento',$endereco->getComplemento()); 
		$consulta->bindValue(':cliente',$endereco->getCliente()); 
		$consulta->bindValue(':fisico',$endereco->getFisico()); 
		$consulta->bindValue(':servico',$endereco->getServico()); 
		$consulta->bindValue(':juridico',$endereco->getJuridico()); 
		if($consulta->execute())
			return true;
		else
			return false;
	}

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		$sql = 'DELETE FROM endereco';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}
}
?>