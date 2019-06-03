<?php

	require_once '../../config.php';

	$e  		= new ControllerEndereco();
	$endereco 	= new Endereco();

    // caso receba dados via POST
    if( isset($_GET) && !empty($_GET) ){

        $cep  = $_GET['cep'];

	    $endereco   = $e->carregarEndereco($cep);

    }

?>