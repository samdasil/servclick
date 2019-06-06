<?php 
    
    require '../../config.php';
    require_once 'head.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $id         = base64_decode($_SESSION['session']);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEndereco($cliente->getEndereco());

    $_SESSION['nome'] = $cliente->getNome();

?>