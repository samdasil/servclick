<?php

	require_once 'header.php';

    $p        = $_GET['p'];
	$s  	  = new ControllerServico();
	$c 		  = new ControllerCliente();
    $e        = new ControllerEndereco();
	$servico  = new Servico();
	$cliente  = new Cliente();
    $endereco = new Endereco();

    $servico  = $s->carregarServico($p);
    $cliente  = $c->carregarCliente($servico->getCliente());
    $endereco = $e->carregarEndereco($servico->getEndereco());

    // chamada do controller
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $s->aceitarServico($dados);

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

    <section id="portfolio">
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
                                <p class="desc-servico"><strong>Data da solicitação :  </strong><?=$servico->getDtinicio()?></p>
                                <p class="desc-servico"><strong>Endereço :  </strong><?=$endereco->getBairro()?>, <?=$endereco->getCidade()?>-<?=$endereco->getEstado()?></p>
                            </div>
                        </div>
                    
                    </div>

                </div>

                <form method="post" action="">

                    <input type="hidden" name="idservico" value="<?=$servico->getIdservico()?>">
                    <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico()?>">

                    <div class="row">
                        <div class="form-group">
                            <label> Valor <strong>(R$)</strong></label>
                            <input type="text" name="valor" id="valor" class="form-control" placeholder="ex.: 50,00" maxlength="10"  required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Aceitar Serviço">
                        </div>
                    </div>

                </form>
            
            </div>
        </div>
    </section>


<?php require_once 'footer.php'; ?>