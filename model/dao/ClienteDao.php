<?php

	class ClienteDAO
	{
		//cadastra o cliente no banco
		public function cadastrar(Cliente $cliente, Endereco $endereco) 
		{	

			$sql = "CALL SP_CADASTRAR_CLIENTE(:cpf, :nome, :email, :fone, :login, :senha, :perfil, :foto, :status_, :cep, :logradouro, :numero, :bairro, :cidade, :estado, :complemento)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':cpf',$cliente->getCpf()); 
			$consulta->bindValue(':nome',$cliente->getNome()); 
			$consulta->bindValue(':email',$cliente->getEmail()); 
			$consulta->bindValue(':fone',$cliente->getFone()); 
			$consulta->bindValue(':login',$cliente->getLogin()); 
			$consulta->bindValue(':senha',$cliente->getSenha()); 
			$consulta->bindValue(':perfil',$cliente->getPerfil()); 
			$consulta->bindValue(':foto',$cliente->getFoto()); 
			$consulta->bindValue(':status_',$cliente->getStatus_()); 

			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 
	    	
	    	$consulta->execute();

	    	$result = $consulta->fetch(PDO::FETCH_ASSOC);

	        return $result["idcliente"]; 
	    	
		}

		//atualiza o cadastro do cliente
		public function editar(Cliente $cliente, Endereco $endereco)
		{
			
			$sql = $sql = "CALL SP_EDITAR_CLIENTE(:idcliente, :cpf, :nome, :email, :fone, :foto, :status_, :endereco,
											 	  :cep, :logradouro, :numero, :bairro, :cidade, :estado, :complemento)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':idcliente',$cliente->getIdcliente()); 
			$consulta->bindValue(':cpf',$cliente->getCpf()); 
			$consulta->bindValue(':nome',$cliente->getNome()); 
			$consulta->bindValue(':email',$cliente->getEmail()); 
			$consulta->bindValue(':fone',$cliente->getFone());  
			$consulta->bindValue(':foto',$cliente->getFoto()); 
			$consulta->bindValue(':status_',$cliente->getStatus_()); 
			$consulta->bindValue(':endereco',$cliente->getEndereco()); 

			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 

			$consulta->execute();

			$result = $consulta->fetch(PDO::FETCH_ASSOC);
			
	        return $result["idcliente"]; 

		}

		//carrega os dados do cliente pelo ID
		public function carregar($idcliente = null)
		{
			
			$sql = "SELECT * FROM cliente c INNER JOIN endereco e ON e.idendereco = c.endereco WHERE c.idcliente = :idcliente ";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idcliente",$idcliente);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		
		//Lista todos os clientes
		public function listar()
		{
			
			$sql = 'SELECT * FROM cliente WHERE status_ <> 2';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		public function desativar($dados = null)
		{
		
			if ( is_null($dados['idcliente']) ) {
				
				return false;

			} else {

				$sql = "UPDATE cliente SET status_ = 2 WHERE idcliente = :idcliente";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idcliente",$dados['idcliente']);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}

		//lista os clientes de acordo com o parametro passado
		public function pesquisar($pesquisa)
		{
			
			$sql = "SELECT * FROM cliente 
					WHERE 
					nome 	LIKE '%".$pesquisa."%' OR 
					email 	LIKE '%".$pesquisa."%' OR 
					login 	LIKE '%".$pesquisa."%' OR 
					fone 	LIKE '%".$pesquisa."%' OR 
					idcliente = ".$pesquisa."";

			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//verificar se existe Cliente com o CPF informado
		public static function verificaCpf($cpf)
		{
					
			$sql = "SELECT * FROM cliente WHERE cpf = :cpf ";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":cpf",$cpf);
			$consulta->execute();
			$result = $consulta->fetchAll(PDO::FETCH_ASSOC);
			
			if (!empty($result)){
				return true;
			}else{
				return false;
			}
			
		}

	}
?>