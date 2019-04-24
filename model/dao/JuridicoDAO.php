<?php
		
	class JuridicoDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($idjuridico)
		{
			$sql = "SELECT * FROM juridico 
					INNER JOIN endereco  ON juridico   = idjuridico
					INNER JOIN pagina    ON idpagina   = pagina 
					WHERE idjuridico = :idjuridico";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idjuridico", $idjuridico);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listar()
		{
			
			$sql = 'SELECT * FROM juridico';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarNovo()
		{
			
			$sql = 'SELECT * FROM juridico WHERE status_ = 3';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function pesquisar($pesquisa)
		{
			
			$sql = 'SELECT * FROM juridico ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		public function desativar($dados = null)
		{

			if ( is_null($dados['idjuridico']) ) {
				
				return false;

			} else {

				$sql = "UPDATE juridico SET status_ = 2 WHERE idjuridico = :idjuridico";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idjuridico",$dados['idjuridico']);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}
		
		public function validar($dados = null)
		{

			if ( is_null($dados) ) {
				
				return false;

			} else {

				$sql = "UPDATE juridico SET status_ = 2 WHERE idjuridico = :idjuridico";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idjuridico",$dados['idjuridico']);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}

		//Insere um elemento na tabela
		public function cadastrar(Juridico $juridico, Endereco $endereco, Pagina $pagina)
		{

			$sql = "CALL SP_CADASTRAR_JURIDICO(:cnpj, :descricao, :email, :fone, :fixo, :status_, :razaosocial, :nomefantasia, :responsavel, :logo, :login, 							   :senha, :perfil, 
											   :cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento,
											   :facebook, :instagram, :pinterest, :twitter, :google, :site)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':cnpj',$juridico->getCnpj()); 
			$consulta->bindValue(':descricao',$juridico->getDescricao()); 
			$consulta->bindValue(':email',$juridico->getEmail()); 
			$consulta->bindValue(':fone',$juridico->getFone()); 
			$consulta->bindValue(':fixo',$juridico->getFixo()); 
			$consulta->bindValue(':status_',$juridico->getStatus()); 
			$consulta->bindValue(':razaosocial',$juridico->getRazaosocial()); 
			$consulta->bindValue(':nomefantasia',$juridico->getNomefantasia()); 
			$consulta->bindValue(':responsavel',$juridico->getResponsavel()); 
			$consulta->bindValue(':logo',$juridico->getLogo()); 
			$consulta->bindValue(':login',$juridico->getLogin()); 
			$consulta->bindValue(':senha',$juridico->getSenha()); 
			$consulta->bindValue(':perfil',$juridico->getPerfil()); 
			
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

	        return $result["idjuridico"]; 
		}
		
		//Atualiza um elemento na tabela
		public function editar(Juridico $juridico, Endereco $endereco, Pagina $pagina)
		{
			
			$sql = "CALL SP_EDITAR_JURIDICO(:idjuridico, :cnpj, :descricao, :email, :fone, :fixo, :status_, :razaosocial, :nomefantasia, :responsavel, 									:logo, :login, :senha, :perfil, :pagina,
											:cep, :logradouro, :cidade, :bairro, :estado, :numero, :complemento,
											:facebook, :instagram, :pinterest, :twitter, :google, :site)";

			$consulta = Conexao::getCon()->prepare($sql);

			$consulta->bindValue(':idjuridico',$juridico->getIdjuridico()); 
			$consulta->bindValue(':cnpj',$juridico->getCnpj()); 
			$consulta->bindValue(':descricao',$juridico->getDescricao()); 
			$consulta->bindValue(':email',$juridico->getEmail()); 
			$consulta->bindValue(':fone',$juridico->getFone()); 
			$consulta->bindValue(':fixo',$juridico->getFixo()); 
			$consulta->bindValue(':status_',$juridico->getStatus()); 
			$consulta->bindValue(':razaosocial',$juridico->getRazaosocial()); 
			$consulta->bindValue(':nomefantasia',$juridico->getNomefantasia()); 
			$consulta->bindValue(':responsavel',$juridico->getResponsavel()); 
			$consulta->bindValue(':logo',$juridico->getLogo()); 
			$consulta->bindValue(':login',$juridico->getLogin()); 
			$consulta->bindValue(':senha',$juridico->getSenha()); 
			$consulta->bindValue(':perfil',$juridico->getPerfil()); 
			$consulta->bindValue(':pagina',$juridico->getPagina()); 
			//$consulta->bindValue(':admin',$juridico->getAdmin()); 

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
	    	
	        return $result["idjuridico"]; 
		}


	}
?>