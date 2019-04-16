<?php

class ControllerPagina
{
	public function carregarPagina($idpagina)
    {

        $pagina  = new Pagina();
        $pdao     = new PaginaDAO();

        $result  = $pdao->carregar($idpagina);

        $pagina->setFacebook($result[0]['facebook']); 
        $pagina->setInstagram($result[0]['instagram']); 
        $pagina->setPinterest($result[0]['pinterest']); 
        $pagina->setTwitter($result[0]['twitter']); 
        $pagina->setGoogle($result[0]['google']); 
        $pagina->setSite($result[0]['site']); 
        
        return $pagina;

    }
}

?>