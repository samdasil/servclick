<?php
    /* VALIDACAO PARA CHAMADA DO CONTROLER */

    require_once '../../config.php';
    require_once 'head.php';

    $controller = new ControllerCliente();

    // caso receba dados via POST
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $controller->cadastrarCliente($dados, $aFile);
        
    }

?>  

    <header id="header"> <?php require_once 'topo.php'; ?></header>

    <section id="portfolio">
        <div class="container pt10 padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms"  >

            <!-- ERRO ao realizar cadastro -->
            <?php 
                if((isset($_SESSION['cadastro']) && !empty($_SESSION['cadastro']) && $_SESSION['cadastro'] == 'erro')) { ?>
                   <script type="text/javascript">
                        setTimeout(function() {
                        $('#message').fadeOut(8000, function(){
                            $(this).remove();
                        });
                    });
                    </script>
                    <div class="alert alert-success alert-dismissible" role="alert" id="message">
                        <strong>Erro!</strong><br> Tente novamente.
                    </div> 
            <?php } ?>

            <!-- ERRO CPF -->
            <?php 
                if((isset($_SESSION['cpf']) && !empty($_SESSION['cpf']) && $_SESSION['cpf'] == 'erro')) { ?>
                   <script type="text/javascript">
                        setTimeout(function() {
                        $('#message').fadeOut(8000, function(){
                            $(this).remove();
                        });
                    });
                    </script>
                    <div class="alert alert-danger alert-dismissible" role="alert" id="message">
                        <strong>Erro!</strong><br> CPF é inválido.
                    </div> 
            <?php } ?>

            <div class="col-md-4 col-sm-12">
                  
                <div class="contact-form bottom">
                    <!--<h3>Bem vindo à nossa página de cadastro para Clientes!</h3>-->
                    <h5 class="text-center">Crie seu perfil e encontre os melhores profissionais</h5>
                    <br>

                    <form name="form" method="post" action="" enctype="multipart/form-data">

                        <div id="div_dados" style="display:block;">
                            <!--<label class="form-group">Foto para perfil</label>-->

                            <div class="col-sm-6">
                                <img src="../../assets/images/portfolio/photo.png" class="img-responsive img-perfil" alt="Selecione uma Foto" name="img" id="img"/>
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    <li><a href=""><i class="fa fa-link"></i></a></li>
                                    <li>
                                        <a href="../../assets/images/portfolio/photo.png" data-lightbox="example-set"><i class="fa fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                <input type="file" name="foto" id="foto" class="form-control photo-new" onchange="alterarFoto()" onblur="validoff()" required accept="image/png, image/jpeg"/> 
                                <span class="valid vfoto text-center">Selecione uma foto *</span>
                            </div>

                            <label class="form-group"><i class="fa fa-database"></i> &nbsp&nbsp Dados</label>

                            <div class="form-group">
                                <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14"  onkeypress="validoff()" >
                                <span class="valid vcpf">Campo obrigatório *</span>
                                <span class="valid vcpf2">CPF inválido *</span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nome" id="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" onkeypress="validoff()"  >
                                <span class="valid vnome">Campo obrigatório *</span>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" onkeypress="validoff()" >
                                <span class="valid vemail">Campo obrigatório *</span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" onkeypress="validoff()"  >
                                <span class="valid vfone">Campo obrigatório *</span>
                            </div>
                            <a href="#" id="dados-right" onclick="cliente_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                            
                        </div>

                            <div id="div_endereco" style="display:none;">
                                <label class="form-group"><i class="fa fa-map-marker"></i> &nbsp&nbsp Endereço</label>

                                <div class="form-group">
                                    <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="" minlength="9" maxlength="9" onkeyup="tamanhoCampo()">
                                    <span class="valid vcep">Campo obrigatório</span>
                                </div>
                                <div class="container text-center" id="lupa">
                                    <img src="../../assets/images/background/map.png" class="lupa">
                                </div>
                            </div>
                            <div id="sub-end" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" value="" onkeypress="validoff()">
                                    <span class="valid vlogradouro">Campo obrigatório</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" value="" onkeypress="validoff()">
                                    <span class="valid vcidade">Campo obrigatório</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" value="" onkeypress="validoff()">
                                    <span class="valid vbairro">Campo obrigatório</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" value="" 
                                    maxlength="2" minlength="2" onkeypress="validoff()">
                                    <span class="valid vestado">Campo obrigatório</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="" onkeypress="validoff()">
                                    <span class="valid vnumero">Campo obrigatório</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="">
                                </div>
                                <a href="#" id="endereco-left" onclick="cliente_next(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
                                <a href="#" id="endereco-right" onclick="cliente_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                            
                            </div>

                        <div id="div_acesso" style="display:none;">
                            <label class="form-group"><i class="fa fa-key"></i> &nbsp&nbsp Configuração de acesso</label>

                            <div class="form-group">
                                <input type="text" name="login" class="form-control" required="required" placeholder="Login" autocomplete="off" minlength="3" maxlength="15">
                                <span class="valid">Campo obrigatório</span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" required="required" placeholder="*********" autocomplete="off" minlength="5">
                                <small>Mínimo de 5 dígitos</small>
                                <span class="valid">Campo obrigatório</span>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                            </div>
                            <a href="#" id="acesso-left" onclick="cliente_next(this)" class=""><i class="fa fa-arrow-left fa-3x"></i></a>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /container do formulario -->

        </div>
    </section>
    
    

<?php require_once 'footer.php'; ?>