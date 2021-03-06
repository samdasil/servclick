<?php 

    require_once 'header.php'; 

    $s          = new ControllerServico();
    $servico    = new Servico();
    $servDAO    = new ServicoDAO();

    $nota = ServicoDAO::mediaNotasProfissional($fisico->getIdfisico(), 'fisico');

?>

    <header id="header"> <?php require_once 'menu.php'; ?> </header>

    <div class="container pt10 ">
        <div class="row">
            <div class="col-sm-12 overflow">
               <div class="social-icons pull-left">
                    <ul class="nav nav-pills">

                        <?php if ($pagina->getFacebook() != '') { ?>
                            <li><a href="<?=$pagina->getFacebook();?>"><i class="fa fa-facebook"></i></a></li>
                        <?php } ?>
                        <?php if ($pagina->getInstagram() != '') { ?>
                            <li><a href="<?=$pagina->getInstagram();?>"><i class="fa fa-instagram"></i></a></li>
                        <?php } ?>
                        <?php if ($pagina->getPinterest() != '') { ?>
                            <li><a href="<?=$pagina->getPinterest();?>"><i class="fa fa-pinterest"></i></a></li>
                        <?php } ?>
                        <?php if ($pagina->getTwitter() != '') { ?>
                            <li><a href="<?=$pagina->getTwitter();?>"><i class="fa fa-twitter"></i></a></li>
                        <?php } ?>
                        <?php if ($pagina->getGoogle() != '') { ?>
                            <li><a href="<?=$pagina->getGoogle();?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php } ?>
                        <?php if ($pagina->getSite() != '') { ?>
                            <li><a href="<?=$pagina->getSite();?>"><i class="fa fa-globe"></i></a></li>
                        <?php } ?>
                    </ul>
                </div> 
            </div>
         </div>
    </div>

    <section id="page-breadcrumb" class="">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$fisico->getNome();?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="portfolio-information" class="padding-top">
        <div class="container">

            <?php require_once 'alert.php'; ?>
            
            <div class="row">
                <div class="col-sm-6">
                    <?php if (!is_null($fisico->getFoto())) { ?>
                        <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive img-perfil" alt="">
                    <?php } else { ?>
                        <img src="../../assets/images/portfolio-details/photo.png" class="img-responsive img-perfil" alt="">
                    <?php } ?>
                </div>
                <div class="col-sm-6">
                    
                    <div class="project-info overflow">
                         <p class="text-center"><?=$area->getDescricao();?></p>
                    </div>

                    <div class="project-info overflow">
                        <div class="resenha">
                            <p><?=$fisico->getDescricao();?></p>    
                        </div>
                    </div>

                    <div class="skills overflow">
                        <h2 class="titulo">Contato</h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="" class="blue"><i class="fa fa-at"></i>E-mail: <?=$fisico->getEmail();?></a></li>
                            <li><a href="" class="blue"><i class="fa fa-whatsapp"></i>Fone: <?=$fisico->getFone();?></a></li>
                            <li><a href="" class="blue"><i class="fa fa-phone"></i>Fixo: <?=$fisico->getFixo();?></a></li>
                        </ul>
                    </div>

                    <div class="client overflow">
                        <h2 class="titulo">Média de Avaliações</h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="project-info overflow">
                            <div class="text-center">
                                <img class="img-nota" src="../../assets/images/notas/n<?=$nota?>.png">
                            </div>
                        </div>
                    </div>

                    <div class="menu-profissional-footer" style="display: none;">
                        <div class="buttons-action">
                            <ul class="ul-menu-footer">
                                <li class="botoes-footer green">
                                    <a  href="indicar-profissional.php?fis=<?=$fisico->getIdfisico();?>&jur=0">
                                        <i class="fa fa-child fa-2x i-menu-footer"></i><p class="text-center" style="font-size: smaller; margin-top: 10px;">Indicar</p>
                                    </a>
                                </li>
                                <li class="botoes-footer red">
                                    <a  href="denunciar-profissional.php?fis=<?=$fisico->getIdfisico();?>&jur=0">
                                        <i class="fa fa-bullhorn fa-2x i-menu-footer"></i><p class="text-center" style="font-size: smaller; margin-top: 10px">Denunciar</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="buttons-action">
                        <div class="col-md-3 col-sm-6 button-fixed-right">
                            <a href="editar.php"><button type="button" class="btn btn-info button-radius"><i class="fa fa-pencil icon-btn "></i></button></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>