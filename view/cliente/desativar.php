<?php

    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
//    require 'header.php'; 
    require_once '../../config.php';
    
    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente;
    $endereco   = new Endereco;
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        
        $dados  = $_POST;

        $c->desativar($id);
        
    }
    
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

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../../assets/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
    <!--<script type="text/javascript" src="../../assets/js/buscaCep.js"></script>-->

</head>
<body>
    <header id="header">      

        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    <div class="topo">
                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                    </div>
                   
                </div>
            
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="perfil.php">Meu Perfil</a></li>
                        <li><a href="listarsolicitacoes.php">Solicitações de Serviços</a></li>
                        <li><a href="servicosaceitos.php">Meus Serviços</a></li>
                    </ul>
                </div>
                    
            </div>
        </div>
    </header>


   <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive" alt="" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                       
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2>Dados</h2>
                            <strong>CPF</strong>
                            <p><?=$cliente->getCpf();?></p>
                            <strong>E-mail</strong>
                            <p><?=$cliente->getEmail();?></p>
                            <strong>Fone</strong>
                            <p><?=$cliente->getFone();?></p>
                            <br>
                            <strong>Para confirmar exclusão, clique no botão abaixo.</strong>
                            <br>
                        </div>
                    </div>
                    
                    <form name="form" method="post" action="">
                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="EXCLUIR PERFIL">
                        </div>
                    </form>
                    

<?php require_once 'footer.php'; ?>