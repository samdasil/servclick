    <div class="container pt8">
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

    <section id="portfolio" class="padding-top" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <?php if (!is_null($juridico->getFoto())) { ?>
                        <img src="../../assets/images/juridico/<?=$juridico->getFoto();?>" class="img-responsive img-perfil" alt="">
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
                            <p><?=$juridico->getDescricao();?></p>    
                        </div>
                    </div>

                    <div class="skills overflow">
                        <h2 class="titulo">Contato</h2>
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="" class="blue"><i class="fa fa-at"></i>E-mail: <?=$juridico->getEmail();?></a></li>
                            <li><a href="" class="blue"><i class="fa fa-whatsapp"></i>Fone: <?=$juridico->getFone();?></a></li>
                            <li><a href="" class="blue"><i class="fa fa-phone"></i>Fixo: <?=$juridico->getFixo();?></a></li>
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
                                    <a  href="indicar-profissional.php?jur=<?=$juridico->getIdjuridico();?>&fis=0">
                                        <i class="fa fa-child fa-2x i-menu-footer"></i><p class="text-center" style="font-size: smaller; margin-top: 10px;">Indicar</p>
                                    </a>
                                </li>
                                <li class="botoes-footer red">
                                    <a  href="denunciar-profissional.php?jur=<?=$juridico->getIdjuridico();?>&fis=0">
                                        <i class="fa fa-bullhorn fa-2x i-menu-footer"></i><p class="text-center" style="font-size: smaller; margin-top: 10px">Denunciar</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function menuOn(){
            $('.menu-profissional-footer').css('display','block');
            $('.op-right').css('display','none');
            $('.op-left').css('display','block');
        }

        function menuOff(){
            $('.menu-profissional-footer').css('display','none');
            $('.op-right').css('display','block');
            $('.op-left').css('display','none');
        }
    </script>

    <div class="op-right">
        <i class="fa fa-plus fa-2x"  onclick="menuOn()"></i>
    </div>
    <div class="op-left">
        <i class="fa fa-minus fa-2x"  onclick="menuOff()"></i>
    </div>
