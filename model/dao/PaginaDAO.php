<?php
		   
	class PaginaDAO
	{

		//Carrega um elemento pela chave primária
		public function carregar($idpagina)
		{
			
			$sql = 'SELECT * FROM pagina WHERE idpagina = :idpagina';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idpagina",$idpagina);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}

		//Lista todos os elementos da tabela
		public function listar()
		{
			
			$sql = 'SELECT * FROM pagina';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Lista todos os elementos da tabela listando ordenados por uma coluna específica
		public function pesquisar($pesquisa)
		{
			
			$sql = 'SELECT * FROM pagina ORDER BY '.$coluna;
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->execute();
			return ($consulta->fetchAll(PDO::FETCH_ASSOC));
		}
		
		//Insere um elemento na tabela
		public function cadastrar(Pagina $pagina)
		{
			
			$sql = 'INSERT INTO pagina (idpagina, facebook, instagram, pinterest, twitter, google, site) VALUES (:idpagina, :facebook, :instagram, :pinterest, :twitter, :google, :site)';
			$consulta = Conexao::getCon()->prepare($sql);
			
			$consulta->bindValue(':facebook',$pagina->getFacebook()); 
			$consulta->bindValue(':instagram',$pagina->getInstagram()); 
			$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
			$consulta->bindValue(':twitter',$pagina->getTwitter()); 
			$consulta->bindValue(':google',$pagina->getGoogle()); 
			$consulta->bindValue(':site',$pagina->getSite()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}
		
		//Atualiza um elemento na tabela
		public function editar(Pagina $pagina)
		{
			
			$sql = 'UPDATE pagina SET idpagina = :idpagina, facebook = :facebook, instagram = :instagram, pinterest = :pinterest, twitter = :twitter, google = :google, site = :site WHERE idpagina = :idpagina';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(':idpagina',$pagina->getIdpagina()); 
			$consulta->bindValue(':facebook',$pagina->getFacebook()); 
			$consulta->bindValue(':instagram',$pagina->getInstagram()); 
			$consulta->bindValue(':pinterest',$pagina->getPinterest()); 
			$consulta->bindValue(':twitter',$pagina->getTwitter()); 
			$consulta->bindValue(':google',$pagina->getGoogle()); 
			$consulta->bindValue(':site',$pagina->getSite()); 
			if($consulta->execute())
				return true;
			else
				return false;
		}

		/*//Apaga um elemento da tabela
		public function deletar($idpagina){
			//include("conexao.php");
			$sql = 'DELETE FROM pagina WHERE idpagina = :idpagina';
			$consulta = Conexao::getCon()->prepare($sql);
			$consulta->bindValue(":idpagina",$idpagina);
			if($consulta->execute())
				return true;
			else
				return false;
		}*/
	}
?>