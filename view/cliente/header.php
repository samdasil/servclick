<?php 

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
    require_once '../../config.php';

    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente;
    $endereco   = new Endereco;
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);
    
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
    <link rel="shortcut icon" href="../../assets/images/ico/favicon.png">
    
    <script type="text/javascript">var switchTo5x=true;</script>

    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
</head>
<body>
    <header id="header">      
    
        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
            
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php?v=<?=$v;?>">Home</a></li>
                        <li><a href="perfil.php?v=<?=$v;?>">Perfil</a></li>
                        <li><a href="buscarprofissional.php?v=<?=$v;?>">Buscar profissional</a></li>
                        <li><a href="criarservico.php?v=<?=$v;?>">Solicitar Serviço</a></li>
                        <li><a href="servicos.php?v=<?=$v;?>">Meus Serviços</a></li>
                        <li><a href="relatorios.php?v=<?=$v;?>">Relatórios</a></li>
                        <li><a href="config.php?v=<?=$v;?>">Config</a></li>
                        <li><a href="../../index.php">Sair</a></li>
                    </ul>
                </div>
                    
            </div>

        </div>

    </header>
    <!--/#header-->    
