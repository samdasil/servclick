
<?php 

    require_once 'header.php';

    $p        = isset($_GET['p']) ? $_GET['p'] : 0;
    $f        = new ControllerFisico();
    $e        = new ControllerEndereco();
    $pg       = new ControllerPagina();
    $fisico   = new Fisico();
    $endereco = new Endereco();
    $pagina   = new Pagina();
    $fisico   = $f->carregarFisico($p);
    $endereco = $e->carregarEndereco($fisico->getEndereco());
    $pagina   = $pg->carregarPagina($fisico->getPagina());

?>
    
    <section id="portfolio" class="pt10">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="contact-form">
                        <h4 class="titulo">Profissional Pessoa Física</h4>

                        <div class="col-md-3">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                
                                    <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-perfil" alt="" name="img" id="img" />
                                
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label ><?=$fisico->getNome();?></label>
                            </div>
                        </div>

                        <div class="col-md-8" style="margin-left: 40px;">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>CPF           : </strong> <?=$fisico->getCpf();?></p>
                                        <p class="linha"><strong>Descrição     : </strong> <?=$fisico->getDescricao();?></p>
                                        <p class="linha"><strong>E-mail        : </strong> <?=$fisico->getEmail();?></p>
                                        <p class="linha"><strong>Fone          : </strong> <?=$fisico->getFone();?></p>
                                        <p class="linha"><strong>Fixo          : </strong> <?=$fisico->getFixo();?></p>
                                        <br>
                                        <p class="subtitulo"><strong>Endereço </strong></p>
                                        <p class="linha"><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                                        <p class="linha"><?=$endereco->getCidade();?> - <?=$endereco->getBairro();?>, <?=$endereco->getEstado();?></p>
                                        <br>
                                        <p class="subtitulo"><strong>Páginas </strong></p>
                                        <p class="linha"><strong>Facebook          : </strong> <?=$pagina->getFacebook();?></p>
                                        <p class="linha"><strong>Instagram         : </strong> <?=$pagina->getInstagram();?></p>
                                        <p class="linha"><strong>Pinterest         : </strong> <?=$pagina->getPinterest();?></p>
                                        <p class="linha"><strong>Twitter           : </strong> <?=$pagina->getTwitter();?></p>
                                        <p class="linha"><strong>Site              : </strong> <?=$pagina->getSite();?></p>
                                    </div> 
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="buttons-action float-left">
                                            <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="buttons-action float-right">
                                            <a href="editar-fisico.php?p=<?=$p?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                                         </div>
                                    </div>   
                                </div>
                   
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    