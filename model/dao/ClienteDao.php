<?php

class ClienteDAO{

	//Carrega um elemento pela chave primária
	public function carregar($idcliente){
		
		$sql = "SELECT * FROM cliente c INNER JOIN endereco e ON e.cliente = c.idcliente WHERE c.idcliente = :idcliente ";
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idcliente",$idcliente);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}

	//Lista todos os elementos da tabela
	public function listarTodos(){
		
		$sql = 'SELECT * FROM cliente';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Lista todos os elementos da tabela listando ordenados por uma coluna específica
	public function listarTodosOrgenandoPor($coluna){
		//include("conexao.php");
		//$conexao = new Model\Conexao();
		$sql = 'SELECT * FROM cliente ORDER BY '.$coluna;
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->execute();
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));
	}
	
	//Apaga um elemento da tabela
	public function deletar($idcliente){
		//include("conexao.php");
		//$conexao = new Model\Conexao();
		$sql = 'DELETE FROM cliente WHERE idcliente = :idcliente';
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":idcliente",$idcliente);
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public function desativarCliente($id = null)
	{
		$con = new Conexao;
		
		if ( is_null($id) ) {
			
			return false;

		} else {

			$sql = "UPDATE cliente SET status_ = 2 WHERE idcliente = :idcliente";

			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idcliente",$id);
			
			if($consulta->execute())
				return true;
			else
				return false;
		}
	}

	//Insere um elemento na tabela
	public function cadastrar($cliente, $endereco) {	

		//$sql = 'INSERT INTO cliente (cpf, nome, email, fone, login, senha, perfil, foto, status_) 
		///		VALUES (:cpf, :nome, :email, :fone, :login, :senha, :perfil, :foto, :status_)';

		$sql = "CALL SP_CADASTRAR_CLIENTE(:cpf, :nome, :email, :fone, :login, :senha, :perfil, :foto, :status_, 
										  :cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento)";

		$consulta = Conexao::getCon()->prepare($sql);
		
		$consulta->bindValue(':cpf',$cliente->getCpf()); 
		$consulta->bindValue(':nome',$cliente->getNome()); 
		$consulta->bindValue(':email',$cliente->getEmail()); 
		$consulta->bindValue(':fone',$cliente->getFone()); 
		$consulta->bindValue(':login',$cliente->getLogin()); 
		$consulta->bindValue(':senha',$cliente->getSenha()); 
		$consulta->bindValue(':perfil',$cliente->getPerfil()); 
		$consulta->bindValue(':foto',$cliente->getFoto()); 
		$consulta->bindValue(':status_',$cliente->getStatus()); 

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
	
	//Atualiza um elemento na tabela
	public function editar(Cliente $cliente, Endereco $endereco, $id){
		
		$sql = $sql = "CALL SP_EDITAR_CLIENTE(:idcliente, :cpf, :nome, :email, :fone, :login, :senha, :perfil, :foto, :status_, 
										 	  :cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento)";

		$consulta = Conexao::getCon()->prepare($sql);
		
		$consulta->bindValue(':idcliente',$id); 
		$consulta->bindValue(':cpf',$cliente->getCpf()); 
		$consulta->bindValue(':nome',$cliente->getNome()); 
		$consulta->bindValue(':email',$cliente->getEmail()); 
		$consulta->bindValue(':fone',$cliente->getFone()); 
		$consulta->bindValue(':login',$cliente->getLogin()); 
		$consulta->bindValue(':senha',$cliente->getSenha()); 
		$consulta->bindValue(':perfil',$cliente->getPerfil()); 
		$consulta->bindValue(':foto',$cliente->getFoto()); 
		$consulta->bindValue(':status_',$cliente->getStatus()); 

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

	//Apaga todos os elementos da tabela
	public function limparTabela(){
		//include("conexao.php");
		//$conexao = new Model\Conexao();
		$sql = 'DELETE FROM cliente';
		$consulta = Conexao::getCon()->prepare($sql);
		if($consulta->execute())
			return true;
		else
			return false;
	}

	public static function logar($login, $senha)
	{

		$sql = "CALL SP_REALIZAR_LOGIN(:login, :senha)";
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindParam(":login", $login);
		$consulta->bindValue(":senha", $senha);
		$consulta->execute();
		
		print_r($consulta->fetchAll(PDO::FETCH_ASSOC));
		exit;
		return ($consulta->fetchAll(PDO::FETCH_ASSOC));

	}

	public static function validaCpf($cpf = null) 
		{

		    // Verifica se um número foi informado
		    if(empty($cpf)) {
		        return false;
		    }

		    // Elimina possivel mascara
		    $cpf = preg_replace("/[^0-9]/", "", $cpf);
		    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		    
		    // Verifica se o numero de digitos informados é igual a 11 
		    if (strlen($cpf) != 11) {
		        return false;
		    }
		    // Verifica se nenhuma das sequências invalidas abaixo 
		    // foi digitada. Caso afirmativo, retorna falso
		    else if ($cpf == '00000000000' || 
		        $cpf == '11111111111' || 
		        $cpf == '22222222222' || 
		        $cpf == '33333333333' || 
		        $cpf == '44444444444' || 
		        $cpf == '55555555555' || 
		        $cpf == '66666666666' || 
		        $cpf == '77777777777' || 
		        $cpf == '88888888888' || 
		        $cpf == '99999999999') {
		        return false;
		     // Calcula os digitos verificadores para verificar se o
		     // CPF é válido
		     } else {   
		        
		        for ($t = 9; $t < 11; $t++) {
		            
		            for ($d = 0, $c = 0; $c < $t; $c++) {
		                $d += $cpf{$c} * (($t + 1) - $c);
		            }
		            $d = ((10 * $d) % 11) % 10;
		            if ($cpf{$c} != $d) {
		                return false;
		            }
		        }

		        return true;
		    }
		
		}

	public static function verificaCpf($cpf)
	{
				
		$sql = "SELECT * FROM cliente WHERE cpf = :cpf ";
		$consulta = Conexao::getCon()->prepare($sql);
		$consulta->bindValue(":cpf",$cpf);
		$consulta->execute();
		$result = $consulta->fetchAll(PDO::FETCH_ASSOC);
		
		if ($result[0]['idcliente'] > 0){
			return true;
		}else{
			return false;
		}
		
	}
}
?>