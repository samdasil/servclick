<?php

    unset($_GET);
    
    
    require 'config.php';
    
    $controller = new ControllerUsuario();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) || isset($_GET) && !empty($_GET)){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {
            
            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $controller->realizarLogin( $_POST['login'], $_POST['senha'] );
        
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
<body style="background-image:  url(assets/images/background/fundo.jpg);">
<div class="co-body">
    <section id="cabecalho">
        <div class="sec-cabecalho">
            <p> Bem vindo, faça o login ou crie sua conta</p>
        </div>
    </section>

	<section id="conteudo">
	    <div class="container-form-login">

            <div class="col-sm-12">
                <img src="assets/images/logo-login.png" class="img-responsive" alt="" style="margin-left:auto; margin-right: auto;">
            </div>
        
            <br>
	        <form id="" name="contact-form" method="post" action="">

                <input type="hidden" name="metodo" value="realizarLogin">
                <input type="hidden" name="classe" value="Usuario">

                <div class="form-group">
                    <input type="text" name="login" class="form-control input-login" required="required" placeholder="Login" autofocus >
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control input-login" required="required" placeholder="*********">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Entrar">
                </div>
            
            </form>
        </div>

        <div class="container text-center">
            <div class="buttons-action">
                <a href="opcao-perfil.php"><button type="button" class="btn btn-btn btn-success"><i class="fa fa-plus"></i>&nbsp Cadastrar-se</button></a>
            </div>
        </div>
    
	</section>

    <section class="rodape">
        <footer id="footer">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12">
                        <div class="copyright-text text-center">
                            <p>&copy; servClick</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>    
    </section>
    
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>   
</div>
</body>
</html>
