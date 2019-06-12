<?php 
    
    require '../../config.php';
    require_once 'head.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $fisico     = new Fisico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEndereco($fisico->getEndereco());
    $pagina     = $p->carregarPagina($fisico->getPagina());
    $area       = $a->carregarArea($fisico->getArea());

    $_SESSION['nome'] = $fisico->getNome();
    $_SESSION['area'] = $fisico->getArea();
    $_SESSION['cont'] =  0;

?>

<script type="text/javascript">
    var intervalo = setInterval(function() {$('#span_servicos').load('span-servicos.php');}, 5000);
</script>