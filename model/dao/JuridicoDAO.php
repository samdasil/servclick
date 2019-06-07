<?php
		
	class JuridicoDAO
	{	

		public function cadastrar(Juridico $juridico, Endereco $endereco, Pagina $pagina)
		{

			$sql = "CALL SP_CADASTRAR_JURIDICO(:descricao, :fixo, :fone, :email, :responsavel, :foto, :nomefantasia, :cnpj, :razaosocial, :login, :senha, :perfil, :status_, :area, :cep, :logradouro, :numero, :bairro, :cidade, :estado, :complemento, :site, :google, :twitter, :pinterest, :facebook, :instagram)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':cnpj',$juridico->getCnpj()); 
			$consulta->bindValue(':descricao',$juridico->getDescricao()); 
			$consulta->bindValue(':email',$juridico->getEmail()); 
			$consulta->bindValue(':fone',$juridico->getFone()); 
			$consulta->bindValue(':fixo',$juridico->getFixo()); 
			$consulta->bindValue(':status_',$juridico->getStatus_()); 
			$consulta->bindValue(':razaosocial',$juridico->getRazaosocial()); 
			$consulta->bindValue(':nomefantasia',$juridico->getNomefantasia()); 
			$consulta->bindValue(':responsavel',$juridico->getResponsavel()); 
			$consulta->bindValue(':foto',$juridico->getFoto()); 
			$consulta->bindValue(':login',$juridico->getLogin()); 
			$consulta->bindValue(':senha',$juridico->getSenha()); 
			$consulta->bindValue(':perfil',$juridico->getPerfil()); 
			$consulta->bindValue(':area',$juridico->getArea());
			
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


		//Carrega um elemento pela chave primária
		public function carregar($idjuridico)
		{
			$sql = "SELECT * FROM juridico 
					WHERE idjuridico = :idjuridico";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idjuridico", $idjuridico);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarPorArea($idarea)
		{
			
			$sql = 'SELECT * FROM juridico
					INNER JOIN endereco 	ON idendereco 	= endereco
					INNER JOIN areaatuacao 	ON idarea 		= area
					INNER JOIN pagina 		ON idpagina 	= pagina
					WHERE status_ = 1  AND area = :area';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":area", $idarea);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarPendentes()
		{
			
			$sql = 'SELECT * FROM juridico WHERE status_ = 3';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela
		public function listarTodos()
		{
			
			$sql = 'SELECT * FROM juridico ORDER BY razaosocial asc,status_ asc';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
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
		
		public function validar($idjuridico = null)
		{

			if ( is_null($idjuridico) ) {
				
				return false;

			} else {

				$sql = "UPDATE juridico SET status_ = 1 WHERE idjuridico = :idjuridico";

				$consulta = Conexao::getCon()->prepare($sql);
				$consulta->bindValue(":idjuridico",$idjuridico);
				
				if($consulta->execute())
					return true;
				else
					return false;
			}
		}

		//verificar se existe Juridico com o CNPJ informado
		public static function verificaCnpj($cnpj)
		{

			$sql = "SELECT * FROM juridico WHERE cnpj = :cnpj ";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":cnpj",$cnpj);
			$consulta->execute();
			$result = $consulta->fetchAll(PDO::FETCH_ASSOC);

			if ($result) {
				return true;
			}else{
				return false;
			}
			
		}

	}
?>