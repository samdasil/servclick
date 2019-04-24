<?php
		   
	class FisicoDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($idfisico = null)
		{

			$sql = "SELECT * FROM fisico f
					INNER JOIN endereco e ON e.fisico   = f.idfisico
					INNER JOIN pagina p   ON p.idpagina = f.pagina 
					WHERE f.idfisico = :idfisico";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idfisico", $idfisico);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}


		//Lista todos os elementos da tabela
		public function listar()
		{
			
			$sql = 'SELECT * FROM fisico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarNovo()
		{
			
			$sql = 'SELECT * FROM fisico WHERE status_ = 3';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela
		public function pesquisar($pesquisa = null)
		{
			
			$sql = 'SELECT * FROM fisico ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		public function desativar($dados = null)
		{
			
			if ( is_null($dados) ) {
				
				return false;

			} else {

				$sql = "UPDATE fisico SET status_ = 2 WHERE idfisico = :idfisico";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idfisico",$dados['idfisico']);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}
		
		//Insere um elemento na tabela
		public function cadastrar(Fisico $fisico, Endereco $endereco, Pagina $pagina)
		{

			$sql = "CALL SP_CADASTRAR_FISICO(:cpf, :nome, :descricao, :email, :fone, :fixo, :status_, :foto, :login, :senha, :perfil, 
											 :cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento,
											 :facebook, :instagram, :pinterest, :twitter, :google, :site)";

			$consulta = Conexao::getCon()->prepare($sql);
		
			$consulta->bindValue(':cpf',$fisico->getCpf()); 
			$consulta->bindValue(':nome',$fisico->getNome()); 
			$consulta->bindValue(':descricao',$fisico->getDescricao()); 
			$consulta->bindValue(':email',$fisico->getEmail()); 
			$consulta->bindValue(':fone',$fisico->getFone()); 
			$consulta->bindValue(':fixo',$fisico->getFixo()); 
			$consulta->bindValue(':status_',$fisico->getStatus()); 
			$consulta->bindValue(':foto',$fisico->getFoto()); 
			$consulta->bindValue(':login',$fisico->getLogin()); 
			$consulta->bindValue(':senha',$fisico->getSenha()); 
			$consulta->bindValue(':perfil',$fisico->getPerfil()); 

			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 

			$consulta->bindValue(':facebook',$pagina->getFacebook()); 
			$consulta->bindValue(':instagram',$pagina->getInstagram()); 
			$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
			$consulta->bindValue(':twitter',$pagina->getTwitter()); 
			$consulta->bindValue(':google',$pagina->getGoogle()); 
			$consulta->bindValue(':site',$pagina->getSite());
			
			$consulta->execute();

	    	$result = $consulta->fetch(PDO::FETCH_ASSOC);

	        return $result["idfisico"]; 
		}
		
		//Atualiza um elemento na tabela
		public function editar(Fisico $fisico, Endereco $endereco, Pagina $pagina)
		{
			
			$sql = "CALL SP_EDITAR_FISICO(:idfisico, :cpf, :nome, :descricao, :email, :fone, :fixo, :status_, :foto, :login, :senha, :perfil, :pagina, 
											 :cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento,
											 :facebook, :instagram, :pinterest, :twitter, :google, :site)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':idfisico',$fisico->getIdfisico()); 
			$consulta->bindValue(':cpf',$fisico->getCpf()); 
			$consulta->bindValue(':nome',$fisico->getNome()); 
			$consulta->bindValue(':descricao',$fisico->getDescricao()); 
			$consulta->bindValue(':email',$fisico->getEmail()); 
			$consulta->bindValue(':fone',$fisico->getFone()); 
			$consulta->bindValue(':fixo',$fisico->getFixo()); 
			$consulta->bindValue(':status_',$fisico->getStatus()); 
			$consulta->bindValue(':foto',$fisico->getFoto()); 
			$consulta->bindValue(':login',$fisico->getLogin()); 
			$consulta->bindValue(':senha',$fisico->getSenha()); 
			$consulta->bindValue(':perfil',$fisico->getPerfil()); 
			$consulta->bindValue(':pagina',$fisico->getPagina()); 

			$consulta->bindValue(':cep',$endereco->getCep()); 
			$consulta->bindValue(':logradouro',$endereco->getLogradouro()); 
			$consulta->bindValue(':cidade',$endereco->getCidade()); 
			$consulta->bindValue(':bairro',$endereco->getBairro()); 
			$consulta->bindValue(':estado',$endereco->getEstado()); 
			$consulta->bindValue(':numero',$endereco->getNumero()); 
			$consulta->bindValue(':complemento',$endereco->getComplemento()); 

			$consulta->bindValue(':facebook',$pagina->getFacebook()); 
			$consulta->bindValue(':instagram',$pagina->getInstagram()); 
			$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
			$consulta->bindValue(':twitter',$pagina->getTwitter()); 
			$consulta->bindValue(':google',$pagina->getGoogle()); 
			$consulta->bindValue(':site',$pagina->getSite());
			
			$consulta->execute();

	    	$result = $consulta->fetch(PDO::FETCH_ASSOC);
	    	
	        return $result["idfisico"]; 
		}

		//validar CPF do profissional físico
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

		//verificar se existe o CPF informado na base
		public static function verificaCpf($cpf)
		{
					
			$sql = "SELECT * FROM fisico WHERE cpf = :cpf ";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":cpf",$cpf);
			$consulta->execute();
			$result = $consulta->fetchAll(PDO::FETCH_ASSOC);

			if ($result){
				return true;
			}else{
				return false;
			}
			
		}

		public function validar($dados = null)
		{

			if ( is_null($dados) ) {
				
				return false;

			} else {

				$sql = "UPDATE fisico SET status_ = 2 WHERE idfisico = :idfisico";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idfisico",$dados['idfisico']);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}

	}
?>