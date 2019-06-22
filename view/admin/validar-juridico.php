
<?php 

    require_once 'header.php';

    $p          = isset($_GET['p']) ? $_GET['p'] : 0;
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $pg         = new ControllerPagina();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $juridico   = $j->carregarJuridico($p);
    $endereco   = $e->carregarEndereco($juridico->getEndereco());
    $pagina     = $pg->carregarPagina($juridico->getPagina());

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if ( isset($_POST['recusar']) ) {
            $dados  = $_POST;
            $j->recusarJuridico($dados);
        } else if ( isset($_POST['validar']) ) {
            $dados  = $_POST;
            $j->validarJuridico($dados);
        }
        
    }
?>

    <section id="portfolio" class="pt15">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="contact-form">
                        <h4 class="titulo">Profissional Pessoa Jurídica</h4>

                        <div class="col-md-3">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                
                                    <img src="../../assets/images/juridico/<?=$juridico->getFoto();?>" class="img-perfil" alt="" name="img" id="img" />
                                
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label ><?=$juridico->getRazaosocial();?></label>
                            </div>
                        </div>

                        <div class="col-md-8"  style="margin-left: 40px;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            
                                        </table>
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>CNPJ          : </strong> <?=$juridico->getCnpj();?></p>
                                        <p class="linha"><strong>Nome Fantasia : </strong> <?=$juridico->getNomefantasia();?></p>
                                        <p class="linha"><strong>Descrição     : </strong> <?=$juridico->getDescricao();?></p>
                                        <p class="linha"><strong>E-mail        : </strong> <?=$juridico->getEmail();?></p>
                                        <p class="linha"><strong>Fone          : </strong> <?=$juridico->getFone();?></p>
                                        <p class="linha"><strong>Fixo          : </strong> <?=$juridico->getFixo();?></p>
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

                                <form name="form" method="post" action="">

                                    <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>" >

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="buttons-action float-right">
                                                <button type="submit" class="btn btn-btn btn-warning" name="recusar"><i class="fa fa-ban"></i>&nbsp Recusar Cadastro</button>
                                             </div>
                                        </div>     
                                        <div class="col-md-6">
                                            <div class="buttons-action float-right">
                                                <button type="submit" class="btn btn-btn btn-info" name="validar"><i class="fa fa-check"></i>&nbsp Validar Cadastro</button>
                                             </div>
                                        </div>     
                                    </div>

                                </form>
                   
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    