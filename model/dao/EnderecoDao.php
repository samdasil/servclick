<?php

	class EnderecoDAO
	{

		//carrega os dados do endereco pelo ID
		public function carregar($idendereco)
		{
			
			$sql = 'SELECT * FROM endereco WHERE idendereco = :idendereco';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idendereco",$idendereco);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//carrega o endereco solicitado
		public function carregarEndereco($idendereco)
		{

			$sql =  "SELECT  *
					 FROM endereco
					 WHERE idendereco = :idendereco";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idendereco",$idendereco);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//carrega o endereco do cliente solicitado
		public function carregarEnderecoCliente($idcliente)
		{
			
			$sql = 'SELECT * FROM endereco INNER JOIN cliente ON idcliente = cliente WHERE idcliente = :cliente';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":cliente",$idcliente);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//carrega o endereco do fisico solicitado
		public function carregarEnderecoFisico($idfisico)
		{
			
			$sql = 'SELECT * FROM endereco INNER JOIN fisico ON idfisico = fisico WHERE idfisico = :fisico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":fisico",$idfisico);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//carrega o endereco do juridico solicitado
		public function carregarEnderecoJuridico($idjuridico)
		{
			
			$sql = 'SELECT * FROM endereco 
					INNER JOIN juridico ON idjuridico = juridico 
					WHERE idjuridico = :juridico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":juridico",$idjuridico);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//lista os enderecos
		public function listar()
		{
			
			$sql = 'SELECT * FROM endereco';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//lista os enderecos de acordo com o parametro passado
		public function pesquisar($pesquisa)
		{
			
			$sql = "SELECT * FROM endereco
					WHERE cep LIKE '%".$pesquisa."%' OR
					rua LIKE '%".$pesquisa."%' OR
					cidade LIKE '%".$pesquisa."%' OR
					bairro LIKE '%".$pesquisa."%' OR
					estado LIKE '%".$pesquisa."%' ";

			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//cadastra um endereco
		public function cadastrar(Endereco $endereco)
		{
			
			$sql = 'INSERT INTO endereco (cep, logradouro, cidade, bairro, estado, numero, complemento, cliente) VALUES (:cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento, :cliente, :fisico, :juridico)';
			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 
			$consulta->bindValue(':cliente',$endereco->getCliente()); 
			$consulta->bindValue(':fisico',$endereco->getFisico()); 
			$consulta->bindValue(':juridico',$endereco->getJuridico()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Endereco $endereco)
		{
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

		
	}
?>