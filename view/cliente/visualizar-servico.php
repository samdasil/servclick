<?php

	require_once 'header.php';

    $p        = $_GET['p'];
	$s  	  = new ControllerServico();
    $e        = new ControllerEndereco();
    $a        = new ControllerAreaAtuacao();
	$servico  = new Servico();
    $area     = new AreaAtuacao();
    $endereco = new Endereco();

    $servico  = $s->carregarServico($p);
    $area     = $a->carregarArea($servico->getArea());
    $endereco = $e->carregarEndereco($servico->getEndereco());

    if ( $servico->getFisico() != null ) {
        $f            = new ControllerFisico();
        $profissional = new Fisico();
        $profissional = $f->carregarFisico($servico->getFisico());
        $nome         = $profissional->getNome();
        $perfil       = 'fisico';
        $fis          = $profissional->getIdfisico();
        $jur          = 0;
    }

    if ( $servico->getJuridico() != null ) {
        $j            = new ControllerJuridico();
        $profissional = new Juridico();
        $profissional = $j->carregarJuridico($servico->getJuridico());
        $nome         = $profissional->getRazaosocial();
        $perfil       = 'juridico';
        $jur          = $profissional->getIdjuridico();
        $fis          = 0;   
    }

    // chamada do controller
    if( isset($_POST) && !empty($_POST) ){


        if (isset($_POST['aceitar-proposta']) ) {
            
            $dados  = $_POST;
            $s->aceitarProposta($dados);

        }

        if (isset($_POST['recusar-proposta']) ) {
            
            $dados  = $_POST;
            $s->recusarProposta($dados);

        }

        if (isset($_POST['avaliar-servico']) ) {
            
            $dados  = $_POST;
            $s->avaliarServico($dados);

        }

    }

?>

	<header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$cliente->getNome()?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

    <section id="portfolio" class="mb25">
        <div class="container">
            <div class="col-md-12 col-sm-12">

                <div class="row padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    
                    <div class='col-sm-6'>
                        <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>
                            <div class='sidebar-item  recent'>
                                <div class='media'>
                                    <div class='pull-left middle'>
                                        <h4>
                                            <a href='visualizar-perfil-profissional.php?jur=<?=$cliente->getIdcliente()?>&fis=0'>
                                                <img src='../../assets/images/cliente/<?=$cliente->getFoto()?>' alt='' class="img-left">
                                            </a>
                                        </h4>
                                    </div>
                                    <div class='media-body'>
                                        <h4>
                                            <a href='visualizar-perfil-profissional.php?jur=<?=$cliente->getIdcliente()?>&fis=0'></a>
                                        </h4>
                                        <p class="desc-servico"> Descrição</p>
                                        <hr>
                                        <p class="desc-servico"> <?=$servico->getDescricao()?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-sm-6">
                        
                        <div class="project-info overflow">
                            <div class="col-md-3 col-sm-6">
                                <p class="desc-servico"><strong>Nº Serviço :  </strong><?=$servico->getIdservico()?></p>
                                <p class="desc-servico"><strong>Área do Serviço :  </strong><?=$area->getDescricao()?></p>
                                <p class="desc-servico"><strong>Data da solicitação :  </strong><?=$servico->getDtinicio()?></p>
                                <p class="desc-servico"><strong>Endereço :  </strong><?=$endereco->getBairro()?>, <?=$endereco->getCidade()?>-<?=$endereco->getEstado()?></p>
                                    
                                    <?php if ( $servico->getStatus_() == 1 ) { ?>
                                        <p class="desc-servico"><strong>Status :  </strong> Aberto  <i class="fa fa-folder-open"></i></p>
                                    <?php } else if ( $servico->getStatus_() == 2 ) { ?>
                                        <p class="desc-servico"><strong>Status :  </strong> Aceito  <i class="fa fa-thumbs-up"></i></p>
                                    <?php } else if ( $servico->getStatus_() == 3 ) { ?>
                                        <p class="desc-servico"><strong>Status :  </strong> Andamento  <i class="fa fa-history"></i></p>
                                    <?php } else if ( $servico->getStatus_() == 4 ) { ?>
                                        <p class="desc-servico"><strong>Status :  </strong> Finalizado  <i class="fa fa-check"></i></p>
                                    <?php } ?>
                                    
                            </div>
                        </div>
                    
                    </div>

                </div>

                <?php if ( $servico->getStatus_() == 4 ) { ?>

                    <div class="row">
                        <div class="form-group">
                            <fieldset>
                                <legend class="lg-price"> Valor </legend>
                                <label class="valor-servico"> <strong> R$ </strong> <?=$servico->getValor()?></label>
                            </fieldset>
                        </div>
                    </div>
                    
                    <form method="post" name="form-servico" action="">
                        <?php if ( $servico->getNota() == null ) { ?>
                        <input type="hidden" name="idservico" value="<?=$servico->getIdservico()?>">
                        <div class="row">
                            <label>Escolha uma nota</label>
                            <div class="form-group">
                                <p class="left">0</p>
                                <p class="right">5</p>
                                <input type="range" class="custom-range" name="nota" id="nota" min="0" max="5">
                            </div>
                        </div>
                        <div class="row">
                            <label>Faça um comentário</label>
                            <div class="form-group">
                                <textarea class="form-control" name="comentario"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <a href="avaliar-servico.php?p=<?=$servico->getIdservico()?>">
                                    <button type="submit" name="avaliar-servico" class="btn btn-submit yellow">Avaliar Serviço</button>
                                </a>
                            </div>
                        </div>

                        <?php } else {  ?>
                        <div class="col-sm-6">
                            
                            <div class="project-info overflow">
                                <div class="text-center">
                                    <img class="img-nota" src="../../assets/images/notas/n<?=$servico->getNota()?>.png">
                                    <p class="text-center"><?=$servico->getComentario()?></p>
                                </div>
                            </div>
                        
                        </div>
                        <?php } ?>
                    </form>

                <?php } else { ?>

                <form method="post" name="form-servico" action="">

                    <input type="hidden" name="idservico" value="<?=$servico->getIdservico()?>">
                    
                    <?php if ( $servico->getFisico() != null) { ?>
                    <input type="hidden" name="idfisico" value="<?=$profissional->getIdfisico()?>">
                    <?php } else if ( $servico->getJuridico() != null ) { ?>
                    <input type="hidden" name="idjuridico" value="<?=$profissional->getIdjuridico()?>">
                    <?php } ?>

                    <?php if ( $servico->getStatus_() == 2) { ?>
                        <div class="buttons-action">
                            <div class="col-md-12 button-fixed-right">
                                <button type="submit" name="aceitar-proposta" class="btn btn-success button-large">
                                    <i class="fa fa-thumbs-up icon-btn " style="font-size: 2.4em;"></i>
                                </button>
                            </div>
                        </div>

                        <div class="buttons-action">
                            <div class="col-md-12 button-fixed-left">
                                <button type="submit" name="recusar-proposta" class="btn btn-warning button-large">
                                    <i class="fa fa-thumbs-down icon-btn " style="font-size: 2.4em;"></i>
                                </button>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ( $servico->getStatus_() == 1) { ?>
                    <div class="buttons-action">
                        <div class="col-md-3 col-sm-6 button-fixed-right">
                            <a href="editar-servico.php?p=<?=$servico->getIdservico()?>">
                                <button type="button" class="btn btn-info button-radius"><i class="fa fa-pencil icon-btn "></i></button>
                            </a>
                        </div>
                    </div>

                    <div class="buttons-action">
                        <div class="col-md-12 button-fixed-left">
                            <a href="cancelar-servico.php?p=<?=$servico->getIdservico()?>">
                                <button type="button" class="btn btn-warning button-radius"><i class="fa fa-trash icon-btn "></i></button>
                            </a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( $servico->getStatus_() != 1) { ?>
                    <h2 class="titulo">Profissional</h2>
                    <div class='col-sm-6'>
                        <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>
                            <div class='sidebar-item  recent'>
                                <div class='media'>
                                    <div class='pull-left'>
                                        <h4>
                                            <a href='visualizar-perfil-profissional.php?jur=<?=$jur?>&fis=<?=$fis?>'><img src="../../assets/images/<?=$perfil?>/<?=$profissional->getFoto()?>" alt='' style='width: 80px; height: 80px; border-radius: 50%;'></a>
                                        </h4>
                                    </div>
                                    <div class='media-body'>
                                        <h4><a href='visualizar-perfil-profissional.php?jur=<?=$jur?>&fis=<?=$fis?>'><?=$nome?></a></h4>
                                        <p><?=$endereco->getBairro()?>, <?=$endereco->getCidade()?>-<?=$endereco->getEstado()?></p>
                                        <p>Fone: <?=$profissional->getFone()?></p>
                                        <p>E-mail: <?=$profissional->getEmail()?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( $servico->getStatus_() == 3) { ?>
                    <div class="buttons-action">
                        <div class="col-md-12 button-fixed-left">
                            <a href="cancelar-servico.php?p=<?=$servico->getIdservico()?>">
                                <button type="button" class="btn btn-warning button-radius"><i class="fa fa-trash icon-btn "></i></button>
                            </a>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ( $servico->getStatus_() != 1) { ?>
                    <div class="row">
                        <div class="form-group">
                            <fieldset>
                                <legend class="lg-price"> Valor </legend>
                                <label class="valor-servico"> <strong> R$ </strong> <?=$servico->getValor()?></label>
                            </fieldset>
                        </div>
                    </div>
                    <?php } ?>

                </form>

                <?php } ?>
            
            </div>
        </div>
    </section>


<?php require_once 'footer.php'; ?>