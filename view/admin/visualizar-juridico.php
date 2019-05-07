
<?php include 'header.php'; ?>

<?php

    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $juridico   = $j->carregarJuridico($get);
    $endereco   = $e->carregarEnderecoJuridico($get);
    $pagina     = $p->carregarPagina($juridico->getPagina());

?>
    <script type="text/javascript">
        function alterarImagem() {
            
            var input = document.getElementById("logo");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                var img = document.getElementById("img");
                img.src = event.target.result;
            //document.form.img.src = document.form.foto.files[0].name;   
            }

        }

    </script>

    <!-- script mask -->
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cnpj").mask('00.000.000/0000-00')
            $("#cpf").mask('000.000.000-00')
            $("#cep").mask('00000-000')
            $("#fone").mask('(00) 00000-0000')
            $("#fixo").mask('(00) 0000-0000')
        })

    </script>
    

    <section id="portfolio" class="padding-top">
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
                                
                                    <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-perfil" alt="" name="img" id="img" />
                                
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label ><?=$juridico->getRazaosocial();?></label>
                            </div>
                        </div>

                        <div class="col-md-9">                        
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

                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="buttons-action">
                                            <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="buttons-action">
                                            <a href="editar-juridico.php?v=<?=$v;?>&get=<?=$get?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
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
    