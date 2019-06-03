<?php 
    
    require '../../config.php';
    require_once 'head.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $fisico     = new Fisico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $v          = base64_encode($id);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEnderecoFisico($id);
    $pagina     = $p->carregarPagina($fisico->getPagina());
    $area       = $a->carregarPagina($fisico->getArea());

    $_SESSION['nome'] = $cliente->getNome();

?>