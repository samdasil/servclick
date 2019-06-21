<?php

	class EnderecoDAO
	{

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
			
			$sql = 'INSERT INTO endereco (cep, logradouro, cidade, bairro, estado, numero, complemento) VALUES (:cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento)';
			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 
			
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Endereco $endereco)
		{
			//include("conexao.php");
			$sql = 'UPDATE endereco SET cep = :cep, logradouro = :logradouro, cidade = :cidade, bairro = :bairro, estado = :estado, numero = :numero, complemento = :complemento WHERE idendereco = :idendereco';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idendereco',$endereco->getIdendereco()); 
			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 
			
			if($consulta->execute())
				return true;
			else
				return false;
		}

		
	}
?>