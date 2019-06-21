<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>servClick</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lightbox.css" rel="stylesheet"> 
    <link href="assets/css/animate.min.css" rel="stylesheet"> 
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">    
    <link rel="shortcut icon" href="assets/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
</head>
<body>
    <header id="header">      
        <div class="navbar navbar-inverse" role="banner">
                    
            <div class="container">
                
                <div class="navbar-header mt0">
                    <div class="topo">
                        <a class="arrow" href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                        <div class="topo-arrow">
                            <label>
                                <?php 
                                    $titulo=explode('/', ucfirst($_SERVER['REQUEST_URI']) ) ; 
                                    $titulo=explode('.php',end($titulo));
                                    $titulo = explode('-', $titulo[0]); 
                                    $titulo = implode(" ",$titulo);
                                    $titulo = ucwords($titulo);
                                    echo $titulo;
                                ?>
                                    
                            </label>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>
    </header>
    
	<section class="services">
	    <div class="container pt15">
	        <div class="row">
	            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" style="padding: 5px;">
	                <div class="single-service">
	                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
	                        <img src="assets/images/cliente/cliente-perfil.png" alt="">
	                    </div>
	                    <a class="btn btn-btn btn-default" href="view/cliente/cadastro.php">Sou Cliente</a>
	                    <p>Solicite serviços de profissionais reconhecidos que estão próximos de você.</p>
	                </div>
	            </div>
	            <div class="col-sm-4 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms" style="padding: 5px;">
	                <div class="single-service">
	                    <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="600ms">
	                        <img src="assets/images/profissional/profissional-perfil.png" alt="">
	                    </div>
	                    <a class="btn btn-btn btn-default" href="opcao-profissional.php">Sou um Profissional</a>
	                    <p>Quero que minha empresa/negócio esteja a disposição de todos.</p>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

<?php require_once 'footer.php'; ?>