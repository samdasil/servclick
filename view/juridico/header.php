<?php 
    
    require '../../config.php';
    require_once 'head.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $juridico   = $j->carregarJuridico($id);
    $endereco   = $e->carregarEndereco($juridico->getEndereco());
    $pagina     = $p->carregarPagina($juridico->getPagina());
    $area       = $a->carregarArea($juridico->getArea());

    $_SESSION['nome'] = $juridico->getRazaoSocial();
    $_SESSION['area'] = $juridico->getArea();
    $_SESSION['cont'] =  0;

?>

<script type="text/javascript">
    var intervalo = setInterval(function() {$('#span_servicos').load('span-servicos.php');}, 5000);
</script>