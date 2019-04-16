<?php
	
	require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/config/Conexao.php';

	class EnderecoDao
	{
		
		public function cadastrarCliente(Cliente $cliente)
		{
			
			$con = new Conexao();

			$endereco = new Endereco;

			/*
			$SQL = $con = $cliente->getConexao()->prepare("INSERT INTO cliente (cpf, email, fone, nome) 
								  VALUES (?, ?, ?, ?)") or die ($con->error);
			
			$SQL->bind_param("ssss", $P1, $P2, $P3, $P4);
			*/			

		}

		public function buscarEnderecoCliente($id) {
			
			$con = new Conexao;

			$endereco = new Endereco;

			$query = "SELECT * FROM endereco WHERE cliente = '".$id."'";
	
			$result = $con->getConexao()->query($query);
			
			$rs = $result->fetch_array(MYSQLI_USE_RESULT);

			$endereco->setCep($rs['cep']);
			$endereco->setLogradouro($rs['logradouro']);
			$endereco->setCidade($rs['cidade']);
			$endereco->setBairro($rs['bairro']);
			$endereco->setEstado($rs['estado']);
			$endereco->setNumero($rs['numero']);
			$endereco->setComplemento($rs['complemento']);
			
			return $endereco;

		}
		
	}
?>