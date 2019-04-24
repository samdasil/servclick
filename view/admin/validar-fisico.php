
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

        $dados  = $_POST;
        $f->validarFisico($dados);

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
    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">
                <div id="section_profissionais"><?php include 'novos-profissionais.php'; ?></div>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                          <div class="contact-form">
                              <h2>Profissional Físico</h2>
                              <form id="form" name="contact-form" method="post" action="">
                                  <input type="hidden" name="v" value="<?=$v;?>" >
                                  
                                  <input type="hidden" name="idfisico" value="<?=$fisico->getIdfisico();?>">
                                  <input type="hidden" name="pagina" value="<?=$fisico->getPagina();?>">

                                  <div class="form-group">
                                      <label class="form-group">Perfil</label>                        
                                      <input type="hidden" name="img" value="<?=$fisico->getFoto();?>">
                                      <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive" alt="Logo da Empresa" name="img" id="img" style="width: 25%;" readonly>
                                  </div>

                                  <label class="form-group">Dados</label>

                                  <div class="form-group">
                                      <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getCpf();?>" readonly >
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" value="<?=$fisico->getNome();?>" readonly >
                                  </div>
                                  <div class="form-group">
                                      <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho" readonly><?=$fisico->getDescricao();?></textarea>
                                  </div>
                                  <div class="form-group">
                                      <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$fisico->getEmail();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$fisico->getFone();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getFixo();?>" readonly>
                                  </div>

                                  <label class="form-group">Endereço</label>

                                  <div class="form-group">
                                      <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>" readonly>
                                  </div>

                                  <label class="form-group">Páginas e websites <small>(url)</small></label>

                                  <div class="form-group">
                                      <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?=$pagina->getFacebook();?>" readonly>
                                  </div>
                                  
                                  <div class="form-group">
                                      <input type="url" name="instagram" class="form-control"  placeholder="Instagram" value="<?=$pagina->getInstagram();?>" readonly>
                                  </div>

                                  <div class="form-group">
                                      <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest"  value="<?=$pagina->getPinterest();?>" readonly>
                                  </div>

                                  <div class="form-group">
                                      <input type="url" name="twitter" class="form-control"  placeholder="Twitter" value="<?=$pagina->getTwitter();?>" readonly>
                                  </div>

                                  <div class="form-group">
                                      <input type="url" name="google" class="form-control"  placeholder="Google" value="<?=$pagina->getGoogle();?>" readonly>
                                  </div>

                                  <div class="form-group">
                                      <input type="url" name="site" class="form-control"  placeholder="Site" value="<?=$pagina->getSite();?>" readonly>
                                  </div>

                                  <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-submit" value="VALIDAR PERFIL">
                                </div>
                            </form>
                            <div class="topo">
                                <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
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
    