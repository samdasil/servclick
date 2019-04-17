<?php 
    
    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }

    require_once '../../config.php';
    
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $juridico   = $j->carregarJuridico($id);
    $endereco   = $e->carregarEnderecoJuridico($id);
    $pagina     = $p->carregarPagina($juridico->getPagina());

    require 'header.php'; 
    
?>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$juridico->getRazaosocial();?></h1>
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
                    <?php if (!is_null($juridico->getLogo())) { ?>
                        <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-responsive" alt="">
                    <?php } else { ?>
                        <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive" alt="">
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        
                    </div>
                    <div class="project-info overflow">
                        <h3>Descrição</h3>
                        <p><?=$juridico->getDescricao();?></p>
                        </div>
                    <div class="skills overflow">
                        <h3>Categorias</h3>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-check-square"></i>Design</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>HTML/CSS</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>Javascript</a></li>
                            <li><a href="#"><i class="fa fa-check-square"></i>Backend</a></li>
                        </ul>
                    </div>
                    <div class="client overflow">
                        <h3>Meus Clientes:</h3>
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

<?php require_once 'footer.php'; ?>