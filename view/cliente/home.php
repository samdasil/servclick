<?php require_once 'header.php'; ?>

    <header id="header">      
        <div class="navbar" role="banner">
        	<div class="navbar-header">
				
            </div>
        </div>
    </header>

    <section id="page-breadcrumb" class="pt10 pb1">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$cliente->getNome();?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

	<section id="portfolio" class="pt10">
	    <div class="container">
	    	
	    	<?php require_once 'alert.php'; ?>

	        <div class="row padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">

				<div class="portfolio-items" style="color: #567793">
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="perfil.php"><i class="fa fa-user fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>PERFIL</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="buscar-profissional.php"><i class="fa fa-search fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info">
			                    <h2>BUSCAR PROFISSIONAL</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="solicitar-servico.php"><i class="fa fa-plus fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>SOLICITAR SERVIÇO</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="meus-servicos.php"><i class="fa fa-cart-plus fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>MEUS SERVIÇOS</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="relatorios.php"><i class="fa fa-file fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>RELATÓRIOS</h2>
			                </div>
			            </div>
			        </div>
			        <div class="col-xs-6 col-sm-4 col-md-3 portfolio-item">
			            <div class="portfolio-wrapper text-center">
			                <div class="portfolio-single">
			                    <div class="portfolio-thumb">
			                        <a href="config.php"><i class="fa fa-cogs fa-5x"></i></a>
			                    </div>
			                </div>
			                <div class="portfolio-info ">
			                    <h2>CONFIG.</h2>
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
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; servClick</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/wow.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>   
</body>
</html>
