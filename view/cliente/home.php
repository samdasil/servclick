<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/controller/ControllerCliente.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/projects/servclick/model/dao/ClienteDao.php';

    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['idcliente'])){
        header('Location: ../../index.php');
    }
    $cliente = new ClienteDao();
    $id = $_SESSION['idcliente'];
    $cliente->buscarClienteId($id);

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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <!--<script type="text/javascript">var switchTo5x=true;</script>-->

</head>
<body>
    <header id="header">      
        <div class="navbar navbar-inverse" role="banner"></div>
    </header>

	<section id="portfolio">
	    <div class="container">
	        <div class="row">

				<div class="portfolio-items" style="color: #567793">
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded logos" style="color: ">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="perfil.php"><i class="fa fa-user fa-5x"></i></a>
			                    </div>
			                    <!--
			                    <div class="portfolio-view">
			                        <ul class="nav nav-pills">
			                            <li><a href="portfolio-details.html"><i class="fa fa-link"></i></a></li>
			                            <li><a href="images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
			                        </ul>
			                    </div>
			                	-->
			                </div>
			                <div class="portfolio-info ">
			                    <h2>PERFIL</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded folio">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="listarsolicitacoes.php"><i class="fa fa-search fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info">
			                    <h2>BUSCAR PROFISSIONAL</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item design logos">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="servicosaceitos.php"><i class="fa fa-plus fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>NOVO SERVIÇO</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item design logos">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="orcamentos.php"><i class="fa fa-cart-plus fa-5x"></i>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>MEUS SERVIÇOS</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded mobile">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="notas.php"><i class="fa fa-file fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>RELATÓRIOS</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item branded mockup">
			            <div class="portfolio-wrapper" style="text-align: center;">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="config.php"><i class="fa fa-cogs fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>CONFIGURAÇÃO</h2>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
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


    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    <!--
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="../../assets/js/gmaps.js"></script>
	-->
    <script type="text/javascript" src="../../assets/js/wow.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>   
</body>
</html>
