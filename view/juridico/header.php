<?php 

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
    require_once '../../config.php';

    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $fisico     = new Fisico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEnderecoFisico($id);
    $pagina     = $p->carregarPagina($fisico->getPagina());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>servClick</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../assets/css/lightbox.css" rel="stylesheet"> 
    <link href="../../assets/css/animate.min.css" rel="stylesheet"> 
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/responsive.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
    
</head>
<body>
    <header id="header">      
        
        <?php require_once 'paginas.php'; ?>
    
        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <!--
                    <a class="navbar-brand" href="index.html">
                        <h1><img src="../../assets/images/logo.png" alt="logo"></h1>
                    </a>
                    -->
                </div>
            
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php?v=<?=$v;?>">Home</a></li>
                        <li><a href="perfil.php?v=<?=$v;?>">Perfil</a></li>
                        <li><a href="listarsolicitacoes.php?v=<?=$v;?>">Solicitações</a></li>
                        <li><a href="servicosaceitos.php?v=<?=$v;?>">Meus Serviços</a></li>
                        <li><a href="orcamentos.php?v=<?=$v;?>">Orçamentos</a></li>
                        <li><a href="notas.php?v=<?=$v;?>">Notas</a></li>
                        <li><a href="sobre.php?v=<?=$v;?>">Sobre</a></li>
                    </ul>
                </div>
                    
            </div>
        </div>
    </header>
    <!--/#header-->    