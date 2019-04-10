<?php
    if(!isset($_SESSION)) session_start();
    session_unset();
    session_destroy();
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

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <!--
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    -->
</head>
<body>
    <header id="header">      
        
    </header>
    

	<section id="portfolio">
	    <div class="container">

            <div class="col-sm-12">
                <img src="assets/images/logo-login.png" class="img-responsive" alt="" style="margin-left: 20%; margin-right: 20%;">
            </div>
        
            <br>
	        <form id="" name="contact-form" method="post" action="router.php">

                <input type="hidden" name="metodo" value="realizarLogin">
                <input type="hidden" name="classe" value="Usuario">

                <div class="form-group">
                    <input type="text" name="login" class="form-control" required="required" placeholder="Login" autofocus >
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" required="required" placeholder="*********">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Entrar">
                </div>
            
            </form>
        </div>
	</section>

    <div class="container text-center">
        <div class="buttons-action">
            <a href="opcao-perfil.php"><button type="button" class="btn btn-btn btn-success"><i class="fa fa-plus"></i>&nbsp Cadastrar-se</button></a>
        </div>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <!--<img src="../../assets/images/home/under.png" class="img-responsive inline" alt="">-->
                </div>
                
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
