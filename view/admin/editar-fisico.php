
<?php include 'header.php'; ?>

<?php

    $f        = new ControllerFisico();
    $e        = new ControllerEndereco();
    $p        = new ControllerPagina();
    $fisico   = new Fisico();
    $endereco = new Endereco();
    $pagina   = new Pagina();
    $fisico   = $f->carregarFisico($get);
    $endereco = $e->carregarEnderecoFisico($get);
    $pagina   = $p->carregarPagina($fisico->getPagina());

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        $f->editarFisico($dados, $aFile);

    }

?>
    <script type="text/javascript">
        function alterarImagem() {
            
            var input = document.getElementById("foto");
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
        })

    </script>
    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <?php include 'novos-profissionais.php'; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h2>Profissional Físico</h2>
                        <form name="form" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="v" value="<?=$v;?>" >

                            <input type="hidden" name="idfisico" value="<?=$fisico->getIdfisico();?>">
                            <input type="hidden" name="pagina" value="<?=$fisico->getPagina();?>">
                            <input type="hidden" name="status" value="<?=$fisico->getStatus();?>">
                            <input type="hidden" name="perfil" value="<?=$fisico->getPerfil();?>">
                            <input type="hidden" name="login" value="<?=$fisico->getLogin();?>">
                            <input type="hidden" name="senha" value="<?=$fisico->getSenha();?>">
                              
                            <div class="form-group">
                              <label class="form-group">Perfil</label>                        
                              <input type="hidden" name="img" value="<?=$fisico->getFoto();?>">
                              <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive" alt="Logo da Empresa" name="img" id="img" style="width: 25%;" >
                            </div>
                            <div class="form-group">
                              <input type="file" name="foto" id="foto" class="form-control" onchange="alterarImagem()">
                            </div>

                            <label class="form-group">Dados</label>

                            <div class="form-group">
                              <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getCpf();?>"  >
                            </div>
                            <div class="form-group">
                              <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" value="<?=$fisico->getNome();?>"  >
                            </div>
                            <div class="form-group">
                              <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho" ><?=$fisico->getDescricao();?></textarea>
                            </div>
                            <div class="form-group">
                              <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$fisico->getEmail();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$fisico->getFone();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getFixo();?>" >
                            </div>

                            <label class="form-group">Endereço</label>

                            <div class="form-group">
                              <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>" >
                            </div>
                            <div class="form-group">
                              <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>" >
                            </div>

                            <label class="form-group">Páginas e websites <small>(url)</small></label>

                            <div class="form-group">
                              <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?=$pagina->getFacebook();?>" >
                            </div>

                            <div class="form-group">
                              <input type="url" name="instagram" class="form-control"  placeholder="Instagram" value="<?=$pagina->getInstagram();?>" >
                            </div>

                            <div class="form-group">
                              <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest"  value="<?=$pagina->getPinterest();?>" >
                            </div>

                            <div class="form-group">
                              <input type="url" name="twitter" class="form-control"  placeholder="Twitter" value="<?=$pagina->getTwitter();?>" >
                            </div>

                            <div class="form-group">
                              <input type="url" name="google" class="form-control"  placeholder="Google" value="<?=$pagina->getGoogle();?>" >
                            </div>

                            <div class="form-group">
                              <input type="url" name="site" class="form-control"  placeholder="Site" value="<?=$pagina->getSite();?>" >
                            </div>

                            <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                            </div>
                            <br>
                            <div class="topo">
                              <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    