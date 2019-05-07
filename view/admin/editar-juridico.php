
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

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        
        $j->editarJuridico($dados, $aFile);

    }

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

                        <form name="form" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="v" value="<?=$v;?>" >
                            <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                            <input type="hidden" name="pagina" value="<?=$juridico->getPagina();?>">
                            <input type="hidden" name="status" value="<?=$juridico->getStatus();?>">
                            <input type="hidden" name="perfil" value="<?=$juridico->getPerfil();?>">
                            <input type="hidden" name="login" value="<?=$juridico->getLogin();?>">
                            <input type="hidden" name="senha" value="<?=$juridico->getSenha();?>">

                            <div class="col-md-3">
                                <div class="portfolio-wrapper">
                                    <div class="portfolio-single">
                                        
                                        <input type="hidden" name="img" value="<?=$juridico->getLogo();?>">
                                        <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-perfil" alt="" name="img" id="img" />

                                        <div class="portfolio-view">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                                    <input type="file" name="logo" id="logo" class="form-control" accept="image/png, image/jpeg" onchange="alterarImagem()" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group text-center">
                                    <label >Foto do perfil</label>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <label class="form-group">Dados</label>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cnpj" id="cnpj" class="form-control" required="required" placeholder="CNPJ" autocomplete="off" maxlength="18" minlength="18" value="<?=$juridico->getCnpj();?>">
                                        </div> 
                                        <div class="col-md-8">
                                            <input type="text" name="responsavel" class="form-control" required="required" placeholder="Responsavel" autocomplete="off" value="<?=$juridico->getResponsavel();?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="razaosocial" class="form-control" required="required" placeholder="Razão Social" autocomplete="off" value="<?=$juridico->getRazaosocial();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="nomefantasia" class="form-control" required="required" placeholder="Nome Fantasia" autocomplete="off" value="<?=$juridico->getNomefantasia();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho"><?=$juridico->getDescricao();?></textarea>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$juridico->getEmail();?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$juridico->getFone();?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$juridico->getFixo();?>">
                                        </div>
                                    </div>
                                </div>
                              
                                <label class="form-group">Endereço</label>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>" >
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>">
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>">
                                         </div>
                                     </div>
                                 </div>

                                <label class="form-group">Páginas e websites <small>(url)</small></label>

                                <div class="form-group">
                                    <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?=$pagina->getFacebook();?>">
                                </div>
                                
                                <div class="form-group">
                                    <input type="url" name="instagram" class="form-control"  placeholder="Instagram" value="<?=$pagina->getInstagram();?>">
                                </div>

                                <div class="form-group">
                                    <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest" value="<?=$pagina->getPinterest();?>">
                                </div>

                                <div class="form-group">
                                    <input type="url" name="twitter" class="form-control"  placeholder="Twitter" value="<?=$pagina->getTwitter();?>">
                                </div>

                                <div class="form-group">
                                    <input type="url" name="google" class="form-control"  placeholder="Google" value="<?=$pagina->getGoogle();?>">
                                </div>

                                <div class="form-group">
                                    <input type="url" name="site" class="form-control"  placeholder="Site" value="<?=$pagina->getSite();?>">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                                </div>
                                <br>
                                <div class="topo">
                                    <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    