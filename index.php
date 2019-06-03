<?php

    require_once 'config.php';
 
    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST)){
        
        $controller = new ControllerUsuario();
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
        <link rel="shortcut icon" href="assets/images/logo/servclick-50x42.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
        <script type="text/javascript">var switchTo5x=true;</script>
    </head>
    <body>

        <header style="margin-top: 60px;"></header>
     
    	<section id="portfolio">
    	    <div class="container">

                <?php require_once 'alert.php'; ?>

                <div class="col-sm-12">
                    <img src="assets/images/logo/servclick-200x155.png" class="img-responsive login" alt="" >
                </div>
            
                <br>
    	        <form  name="contact-form" method="post" action="" class="contact-form-login">

                    <div class="form-group">
                        <input type="text" name="login" class="form-control" required="required" placeholder="Login" value=''  autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" required="required" placeholder="*********" >
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-submit" value="Entrar">
                    </div>
                
                </form>
            </div>
    	</section>

        <div class="container text-center" style="margin-top: -10vh;">
            <div class="buttons-action">
                <a href="opcao-perfil.php"><button type="button" class="btn btn-btn btn-success"><i class="fa fa-plus"></i>&nbsp Cadastrar-se</button></a>
            </div>
        </div>

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
        <!--/#footer-->


        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>   
    </body>
</html>
