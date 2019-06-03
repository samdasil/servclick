<?php 
    
    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
    require 'header.php'; 
    require_once '../../config.php';
    
    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $fisico     = new Fisico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEnderecoFisico($id);
    $pagina     = $p->carregarPagina($fisico->getPagina());

?>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$fisico->getNome();?></h1>
                            <!--<p>Responsável</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

   <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php if (!is_null($fisico->getFoto())) { ?>
                        <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive img-perfil" alt="">
                    <?php } else { ?>
                        <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive img-perfil" alt="">
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    
                    <div class="project-info overflow">
                        <h2 class="titulo">Descrição</h2>
                        <p><?=$fisico->getDescricao();?></p>
                        </div>
                    <div class="skills overflow">
                        <h2 class="titulo">Categorias</h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-check-square"></i>Design</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>HTML/CSS</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>Javascript</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>Backend</a></li>
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h2 class="titulo">Meus Clientes</h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-bolt"></i>Okler Themes</a></li>
                        </ul>
                    </div>

                    <div id="">
                        <img src="http://maps.googleapis.com/maps/api/staticmap?center=-22.912869,-43.228963
&zoom=15&size=250x250">
                    </div>

                    <div class="buttons-action">
                        <a href="editar.php?v=<?=$v;?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>