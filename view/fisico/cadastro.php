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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <!--
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "7e8eb33b-fbe0-4915-9b93-09490e3d10df", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    -->
</head>
<body>
    <header id="header">      
        <!--
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
    -->
        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    <div class="topo">
                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                    </div>
                    <!--
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    -->
                    <!--
                    <a class="navbar-brand" href="index.html">
                        <h1><img src="../../assets/images/logo.png" alt="logo"></h1>
                    </a>
                    -->
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

    <div class="col-md-4 col-sm-12">
        <div class="contact-form bottom">
            <h2>Bem vindo à nossa página de cadastro!</h2>
            <h5>Aumente seu leque de clientes criando seu perfil</h5>
            <br>
            <form id="main-contact-form" name="contact-form" method="post" action="">
                <!--
                <label class="form-group">Seu logotipo</label>

                <div class="col-sm-6">
                    <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive" alt="">
                </div>
                <div class="portfolio-view">
                    <ul class="nav nav-pills">
                        <li><a href="portfolio-details.html"><i class="fa fa-link"></i></a></li>
                        <li><a href="../../assets/images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                    </ul>
                </div>

                <div class="form-group">
                    <input type="file" name="logo" id="logo" class="form-control" required="required" placeholder="Logo">
                </div>
                -->
                <label class="form-group">Dados</label>

                <div class="col-sm-6">
                    <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive" alt="">
                </div>

                <div class="form-group">
                    <small for="logo">Foto do perfil</small>
                    <input type="file" name="logo" id="logo" class="form-control" required="required" placeholder="Logo">
                </div>

                <div class="form-group">
                    <input type="text" name="cpf" class="form-control" required="required" placeholder="CPF">
                </div>
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" required="required" placeholder="Nome">
                </div>
                <div class="form-group">
                    <textarea name="descricao" id="message" required="required" class="form-control" rows="8" placeholder="Descreva seu trabalho"></textarea>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required="required" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input type="phone" name="fone" class="form-control" required="required" placeholder="Fone">
                </div>
                <div class="form-group">
                    <input type="text" name="fixo" class="form-control" required="" placeholder="Fixo">
                </div>

                <label class="form-group">Endereço</label>

                <div class="form-group">
                    <input type="text" name="cep" class="form-control" required="required" placeholder="CEP">
                </div>
                <div class="form-group">
                    <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro">
                </div>
                <div class="form-group">
                    <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade">
                </div>
                <div class="form-group">
                    <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <input type="text" name="estado" class="form-control" required="required" placeholder="Estado">
                </div>
                <div class="form-group">
                    <input type="text" name="numero" class="form-control" required="required" placeholder="Nº">
                </div>
                <div class="form-group">
                    <input type="text" name="complemento" class="form-control" required="required" placeholder="Quadra, apto ...">
                </div>

                <label class="form-group">Páginas e websites <small>(url)</small></label>

                <div class="form-group">
                    <input type="url" name="facebook" class="form-control" required="" placeholder="Facebook">
                </div>
                
                <div class="form-group">
                    <input type="url" name="instagram" class="form-control" required="" placeholder="Instagram">
                </div>

                <div class="form-group">
                    <input type="url" name="pinterest" class="form-control" required="" placeholder="Pinterest">
                </div>

                <div class="form-group">
                    <input type="url" name="twitter" class="form-control" required="" placeholder="Twitter">
                </div>

                <div class="form-group">
                    <input type="url" name="google" class="form-control" required="" placeholder="Google">
                </div>

                <div class="form-group">
                    <input type="url" name="site" class="form-control" required="" placeholder="Site">
                </div>

                <label class="form-group">Configuração de acesso</label>

                <div class="form-group">
                    <input type="text" name="login" class="form-control" required="required" placeholder="Login">
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" required="required" placeholder="*********">
                    <small>Mínimo de 5 dígitos</small>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                </div>

            </form>
        </div>
    </div>

<?php require_once 'footer.php'; ?>