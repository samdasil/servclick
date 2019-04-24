<?php

  if(!isset($_GET['v']) || empty($_GET['v'])) header('Location: ../../index.php');
      
  require_once '../../config.php';


  if(isset($_GET['get']) && !empty($_GET['get'])) 
  //id da classe em foco
  $get = $_GET['get']; 

  //id do usuario logado 
  $id         = base64_decode($_GET['v']); 

  //id do usuario criptografado 
  $v          = base64_encode($id);

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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
</head><!--/head-->

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

                    <a class="navbar-brand" href="home.php">
                        <h1><img src="../../assets/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php?v=<?=$v;?>">Home</a></li>
                        <li class="dropdown"><a href="#">Profissionais <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="gerenciar-juridico.php?v=<?=$v;?>">Pessoa Juridica</a></li>
                                <li><a href="gerenciar-fisico.php?v=<?=$v;?>">Pessoa Fisica</a></li>
                            </ul>
                        </li>                    
                        <li><a href="listar-clientes.php?v=<?=$v;?>">Clientes</a></li>
                        <li><a href="gerenciar-categorias.php?v=<?=$v;?>">Categorias</a></li>
                        <li><a href="gerenciar-usuarios.php?v=<?=$v;?>">Usuários</a></li>
                        <li><a href="gerenciar-administradores.php?v=<?=$v;?>">Administradores</a></li>
                        <li><a href="../../index.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
