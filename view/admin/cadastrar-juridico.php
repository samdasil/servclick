
<?php include 'header.php'; ?>

<?php

    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }

        $dados  = $_POST;
        $j->cadastrarJuridico($dados, $aFile);

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
        })

    </script>
    <section id="portfolio-information" class="padding-top">
        <div class="container">
              <?php include 'novos-profissionais.php'; ?>
              <div class="row">
                <div class="col-sm-6">
                    <br>
                    <h2>Profissional Jurídico</h2>
                    <form name="form" method="post" action="" enctype="multipart/form-data">
                        

                        <div class="col-sm-6">
                            <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive" alt="" name="img" id="img" />
                        </div>
                        <div class="portfolio-view">
                            <ul class="nav nav-pills">
                                <li><a href="portfolio-details.html"><i class="fa fa-link"></i></a></li>
                                <li><a href="../../assets/images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                            <input type="file" name="logo" id="logo" class="form-control" onchange="alterarImagem()" required /> 
                        </div>

                        <label class="form-group">Dados</label>
                        
                        <div class="form-group">
                            <input type="text" name="cnpj" id="cnpj" class="form-control" required="required" placeholder="CNPJ" autocomplete="off" maxlength="18" minlength="18">
                        </div>
                        <div class="form-group">
                            <input type="text" name="razaosocial" class="form-control" required="required" placeholder="Razão Social" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="nomefantasia" class="form-control" required="required" placeholder="Nome Fantasia" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="responsavel" class="form-control" required="required" placeholder="responsavel" autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14">
                        </div>

                        <label class="form-group">Endereço</label>

                        <div class="form-group">
                            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9">
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" class="form-control" placeholder="Nº" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off">
                        </div>

                        <label class="form-group">Páginas e websites <small>(url)</small></label>

                        <div class="form-group">
                            <input type="url" name="facebook" class="form-control" placeholder="Facebook">
                        </div>
                        
                        <div class="form-group">
                            <input type="url" name="instagram" class="form-control"  placeholder="Instagram">
                        </div>

                        <div class="form-group">
                            <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest">
                        </div>

                        <div class="form-group">
                            <input type="url" name="twitter" class="form-control"  placeholder="Twitter">
                        </div>

                        <div class="form-group">
                            <input type="url" name="google" class="form-control"  placeholder="Google">
                        </div>

                        <div class="form-group">
                            <input type="url" name="site" class="form-control"  placeholder="Site">
                        </div>

                        <label class="form-group">Configuração de acesso</label>

                        <div class="form-group">
                            <input type="text" name="login" class="form-control" required="required" placeholder="Login" autocomplete="off" minlength="3" maxlength="15">
                        </div>
                        <div class="form-group">
                            <input type="password" name="senha" class="form-control" required="required" placeholder="*********" autocomplete="off" minlength="5">
                            <small>Mínimo de 5 dígitos</small>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                        </div>
                        <br>
                        <div class="topo">
                            <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    