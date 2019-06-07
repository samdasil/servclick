
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

    // caso receba dados via POST 
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        $f->editarFisico($dados, $aFile);

    }

?>
    
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
                        <h4 class="titulo">Profissional Pessoa Física</h4>

                        <form name="form" method="post" action="" enctype="multipart/form-data">

                            <input type="hidden" name="idfisico" value="<?=$fisico->getIdfisico();?>">
                            <input type="hidden" name="pagina" value="<?=$fisico->getPagina();?>">
                            <input type="hidden" name="status_" value="<?=$fisico->getStatus_();?>">
                            <input type="hidden" name="perfil" value="<?=$fisico->getPerfil();?>">
                            <input type="hidden" name="login" value="<?=$fisico->getLogin();?>">
                            <input type="hidden" name="senha" value="<?=$fisico->getSenha();?>">
                            
                            <div class="col-md-3">
                                <div class="portfolio-wrapper">
                                    <div class="portfolio-single">
                                        
                                        <input type="hidden" name="img" value="<?=$fisico->getFoto();?>">
                                        <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-perfil" alt="" name="img" id="img" />

                                        <div class="portfolio-view">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg" onchange="alterarImagem()" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group text-center">
                                    <label >Foto do perfil</label>
                                </div>
                            </div>

                            <div class="col-md-8" style="margin-left: 40px;">
                                <label class="form-group">Dados</label>
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getCpf();?>"  >
                                        </div> 
                                        <div class="col-md-8">
                                            <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" value="<?=$fisico->getNome();?>"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho" ><?=$fisico->getDescricao();?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$fisico->getEmail();?>" >
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$fisico->getFone();?>" >
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getFixo();?>" >
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

                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="buttons-action float-left">
                                            <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="buttons-action float-right">
                                            <input type="submit" name="submit" class="btn btn-success" value="Enviar Atualização">
                                        </div>
                                    </div>   
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
    