<?php
		   
	class FisicoDAO
	{	
		//Insere um elemento na tabela
		public function cadastrar(Fisico $fisico, Endereco $endereco, Pagina $pagina)
		{

			$sql = "CALL SP_CADASTRAR_FISICO(:descricao, :fixo, :fone,  :email, :nome, :cpf, :foto, :login, :senha, :perfil, :status_, :area, :cep, :logradouro, :numero, :bairro, :cidade, :estado, :complemento, :site, :google, :twitter, :pinterest, :facebook, :instagram )";

			$consulta = Conexao::getCon()->prepare($sql);
		
			$consulta->bindValue(':cpf',$fisico->getCpf()); 
			$consulta->bindValue(':nome',$fisico->getNome()); 
			$consulta->bindValue(':descricao',$fisico->getDescricao()); 
			$consulta->bindValue(':email',$fisico->getEmail()); 
			$consulta->bindValue(':fone',$fisico->getFone()); 
			$consulta->bindValue(':fixo',$fisico->getFixo()); 
			$consulta->bindValue(':status_',$fisico->getStatus_()); 
			$consulta->bindValue(':foto',$fisico->getFoto()); 
			$consulta->bindValue(':login',$fisico->getLogin()); 
			$consulta->bindValue(':senha',$fisico->getSenha()); 
			$consulta->bindValue(':perfil',$fisico->getPerfil()); 
			$consulta->bindValue(':area',$fisico->getArea()); 

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
			
			$sql = "CALL SP_EDITAR_FISICO(:idfisico, :descricao, :fixo, :fone,  :email, :nome, :cpf, :foto, :login, :senha, :perfil, :status_, :area, :cep, :logradouro, :numero, :bairro, :cidade, :estado, :complemento, :site, :google, :twitter, :pinterest, :facebook, :instagram)";

			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':idfisico',$fisico->getIdfisico()); 
			$consulta->bindValue(':cpf',$fisico->getCpf()); 
			$consulta->bindValue(':nome',$fisico->getNome()); 
			$consulta->bindValue(':descricao',$fisico->getDescricao()); 
			$consulta->bindValue(':email',$fisico->getEmail()); 
			$consulta->bindValue(':fone',$fisico->getFone()); 
			$consulta->bindValue(':fixo',$fisico->getFixo()); 
			$consulta->bindValue(':status_',$fisico->getStatus_()); 
			$consulta->bindValue(':foto',$fisico->getFoto()); 
			$consulta->bindValue(':login',$fisico->getLogin()); 
			$consulta->bindValue(':senha',$fisico->getSenha()); 
			$consulta->bindValue(':perfil',$fisico->getPerfil()); 
			$consulta->bindValue(':pagina',$fisico->getPagina()); 
			$consulta->bindValue(':area',$fisico->getArea()); 

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

		//Carrega um elemento pela chave primária
		public function carregar($idfisico = null)
		{

			$sql = "SELECT * FROM fisico f 
					WHERE f.idfisico = :idfisico";
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idfisico", $idfisico);
			$consulta->execute();
			
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listarAtivos($idarea)
		{
			
			$sql = 'SELECT * FROM fisico 
					INNER JOIN endereco 	ON idendereco 	= endereco
					INNER JOIN areaatuacao 	ON idarea 		= area
					INNER JOIN pagina 		ON idpagina 	= pagina
					WHERE status_ = 1 AND area = :area';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":area", $idarea);
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
		public function listar()
		{
			
			$sql = 'SELECT * FROM fisico ORDER BY status_ asc';
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
			
			if ( is_null($dados['idfisico']) ) {
				
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

		//verificar se existe Fisico com o CPF informado
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

				$sql = "UPDATE fisico SET status_ = 1 WHERE idfisico = :idfisico";

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