<?php
	
	require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/config/Conexao.php';

	class ClienteDao
	{

		public function __construct()
		{	
			$cliente = new Cliente;
			$con = new Conexao;
		}
		
		public function cadastrarCliente(Cliente $cliente, Endereco $endereco)
		{
			$con = new Conexao;

			$p1 = $cliente->getCpf();
			$p2 = $cliente->getNome();
	        $p3 = $cliente->getEmail();
	        $p4 = $cliente->getFone();
	        $p5 = $cliente->getLogin();
	        $p6 = $cliente->getSenha();
	        $p7 = $cliente->getPerfil();
	        $p8 = $cliente->getFoto();
	        $p9 = $cliente->getStatus();

	        $p10 = $endereco->getCep();
	        $p11 = $endereco->getLogradouro();
	        $p12 = $endereco->getCidade();
	        $p13 = $endereco->getBairro();
	        $p14 = $endereco->getEstado();
	        $p15 = $endereco->getNumero();
	        $p16 = $endereco->getComplemento();

			$query = "INSERT INTO cliente (cpf, nome, email, fone, login, senha, perfil, foto, status_)
					  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			/* Prepare Statements */
			$stmt = $con->getConexao()->prepare($query);

			/* Bind Parameters */
			$stmt->bind_param("ssssssisi",$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9);
			
			/* Execute Statements */			
			$stmt->execute();

			/* debug */
			//print_r($stmt->affected_rows);
			//exit;

			/* validar Statements */
			if ($stmt->affected_rows == 1){
				
				$cli = $stmt->insert_id;			

				$query = "INSERT INTO endereco (cep, logradouro, cidade, bairro, estado, numero, complemento, cliente)
					   	  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

				/* Prepare Statements */
				$stmt2 = $con->getConexao()->prepare($query);
				
				/* Bind Parameters */
				$stmt2->bind_param("sssssssi",$p10, $p11, $p12, $p13, $p14, $p15, $p16, $cli);
				
				/* Execute Statements */			
				if($stmt2->execute()) {

					$stmt2->close();
					//echo "Sucesso";
					//exit;
					return true;

				} else {
					
					//print_r($endereco);
					$erro = $stmt2->error;
					//echo "<br>";
					//echo "<br>";
					//echo "Erro ao gravar endereço para o cliente de ID: ". $cli ."/n";
					//echo "Descrição: ". $erro;
					
					$stmt2->close();
					//exit;
					return $erro;	

				}

			} else {

				$erro = $stmt->error;

				//print_r($cliente);
				//echo "<br>";
				//echo "<br>";
				//echo "Erro ao gravar dados do cliente.<br>";
				//echo "Descrição: ". $erro;
				
				
				$stmt->close();
				//exit;
				return $erro;

			}

		}

		public function editarCliente(Cliente $cliente, Endereco $endereco, $id)
		{
			$con = new Conexao;

			$p1 = $cliente->getCpf();
			$p2 = $cliente->getNome();
	        $p3 = $cliente->getEmail();
	        $p4 = $cliente->getFone();
	        $p5 = $cliente->getLogin();
	        $p6 = $cliente->getSenha();
	        $p7 = $cliente->getPerfil();
	        $p8 = $cliente->getFoto();
	        $p9 = $cliente->getStatus();
	        $pcliente = $id;

	        $p10 = $endereco->getCep();
	        $p11 = $endereco->getLogradouro();
	        $p12 = $endereco->getCidade();
	        $p13 = $endereco->getBairro();
	        $p14 = $endereco->getEstado();
	        $p15 = $endereco->getNumero();
	        $p16 = $endereco->getComplemento();

			$query = "UPDATE cliente SET  cpf 		= ?, 
										  nome 		= ?, 
										  email 	= ?, 
										  fone 		= ?, 
										  login 	= ?, 
										  senha 	= ?, 
										  perfil 	= ?, 
										  foto 		= ?, 
										  status_ 	= ? 
									WHERE idcliente = ?";

			/* Prepare Statements */
			$stmt = $con->getConexao()->prepare($query);

			/* Bind Parameters */
			$stmt->bind_param("ssssssisii",$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $pcliente);
			
			/* Execute Statements */			
			$stmt->execute();
			
			/* debug */
			//print_r($stmt->affected_rows);
			//exit;

			/* validar Statements */
			if ($stmt->affected_rows == 1) {

				$query = "UPDATE endereco SET cep 		 = ?, 
								 			  logradouro = ?, 
								 			  cidade 	 = ?, 
								 			  bairro 	 = ?, 
								 			  estado 	 = ?, 
								 			  numero 	 = ?, 
								 			  complemento= ?
					   	  				  WHERE cliente = ?";

				/* Prepare Statements */
				$stmt2 = $con->getConexao()->prepare($query);
				
				/* Bind Parameters */
				$stmt2->bind_param("sssssssi",$p10, $p11, $p12, $p13, $p14, $p15, $p16, $id);
				
				/* Execute Statements */			
				if($stmt2->execute()) {

					$stmt2->close();
					//echo "Sucesso";
					//exit;
					return true;

				} else {
					
					//print_r($endereco);
					$erro = $stmt2->error;
					//echo "<br>";
					//echo "<br>";
					//echo "Erro ao gravar endereço para o cliente de ID: ". $cli ."/n";
					//echo "Descrição: ". $erro;
					
					$stmt2->close();
					//exit;
					return $erro;	

				}

			} else if ($stmt->affected_rows == 0) {

				return true;

			} else {

				$erro = $stmt->error;

				//print_r($cliente);
				//echo "<br>";
				//echo "<br>";
				//echo "Erro ao gravar dados do cliente.<br>";
				//echo "Descrição: ". $erro;
				
				
				$stmt->close();
				//exit;
				return $erro;

			}

		}

		public function desativarCliente($id = null)
		{
			$con = new Conexao;
			
			if ( is_null($id) ) {
				
				return false;

			} else {

				$query = "UPDATE cliente SET status_ = 2 WHERE idcliente = ?";

				$stmt  = $con->getConexao()->prepare($query);

				$p1    = $id;

				$stmt->bind_param("i", $p1);

				$stmt->execute();

				if($stmt->affected_rows > 0) {
					
					return true;

				} else {
					
					return false;
				}
			}
		}

		public function buscarClienteId($id)
		{

			$con = new Conexao;

			$cliente = new Cliente;

			$query = "SELECT * FROM cliente WHERE idcliente = '".$id."'";
	
			$result = $con->getConexao()->query($query);
			
			$rs = $result->fetch_array(MYSQLI_USE_RESULT);

			$cliente->setIdcliente($rs['idcliente']);
			$cliente->setNome($rs['nome']);
			$cliente->setCpf($rs['cpf']);
			$cliente->setEmail($rs['email']);
			$cliente->setFone($rs['fone']);
			$cliente->setLogin($rs['login']);
			$cliente->setFoto($rs['foto']);
			
			return $cliente;
		
		}

		static function logar($login, $senha)
		{

			$con = new Conexao;

			$query = "SELECT * FROM cliente WHERE login = '$login' AND senha = '$senha' AND status_ <> 2";

			$result = $con->getConexao()->query($query);

			$rs = $result->fetch_array(MYSQLI_NUM);

			if ($rs[0] > 0) {
				return $rs;	
			}else{
				return false;
			}

		}

		public static function verificarLogin($id)
		{

			$con = new Conexao;

			$cliente = new Cliente;

			$query = "SELECT * FROM cliente WHERE idcliente = '".$id."'";
	
			$result = $con->getConexao()->query($query);

			$rs = $result->fetch_array(MYSQLI_NUM);

			if ($rs[0] > 0) {
				
				return true;

			} else {

				header("Location: ../../index.php");

				exit;	
			}
			
		}

		public function validaCPF($cpf = null) {

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
		
	}
?>