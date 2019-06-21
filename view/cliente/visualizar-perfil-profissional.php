<?php require_once 'header.php'; ?>

    <header id='header'> <?php require_once 'menu.php'; ?> </header>

<?php
    
    $f          = new ControllerFisico();
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $fisico     = new Fisico();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $servDAO    = new ServicoDAO();

    
    if ($_GET['fis'] != 0 ) {
        $profissional = $_GET['fis'];
        $fisico       = $f->carregarFisico($profissional);
        //print_r($fisico);exit;
        $endereco     = $e->carregarEndereco($fisico->getEndereco());    
        $pagina       = $p->carregarPagina($fisico->getPagina());
        $area         = $a->carregarArea($fisico->getArea());
        $nota         = ServicoDAO::mediaNotasProfissional($fisico->getIdfisico(), 'fisico');
        //print_r($area);exit;
        include_once 'perfil-fisico.php';
    } else if ($_GET['jur'] != 0 ) {
        $profissional = $_GET['jur'];   
        //echo $profissional;exit; 
        $juridico     = $j->carregarJuridico($profissional);
        //print_r($juridico);exit;
        $endereco     = $e->carregarEndereco($juridico->getEndereco());    
        $pagina       = $p->carregarPagina($juridico->getPagina());
        $area         = $a->carregarArea($juridico->getArea());
        $nota         = ServicoDAO::mediaNotasProfissional($juridico->getIdjuridico(), 'juridico');
        //print_r($area);exit;
        include_once 'perfil-juridico.php';
    } 

?>


<?php require_once 'footer.php'; ?>