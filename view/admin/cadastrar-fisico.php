
<?php include 'header.php'; ?>

<?php

    $f = new ControllerFisico();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0)) {
            
            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $f->cadastrarFisico($dados, $aFile);
        
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
                            
                            <div class="col-md-3">
                                <div class="portfolio-wrapper">
                                    <div class="portfolio-single text-center">
                                        
                                        <img src="../../assets/images/portfolio/photo.png" class="img-perfil" alt="" name="img" id="img" />

                                        <div class="portfolio-view">
                                            <ul class="nav nav-pills">
                                                <li>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                                    <input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg" onchange="alterarImagem()"  required="required" />
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group text-center">
                                    <label  class="cad-pro fot-pro">Foto do perfil</label>
                                </div>
                            </div>

                            <div class="col-md-8" style="margin-left: 40px;">
                                <label class="form-group">Dados</label>
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14"  onkeypress="validoff()" >
                                        </div> 
                                        <div class="col-md-8">
                                            <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off">
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" >
                                        </div>
                                    </div>
                                </div>

                                <label class="form-group">Endereço</label>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" onkeyup="tamanhoCampo()">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" >
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" >
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" >
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" >
                                         </div>
                                     </div>
                                 </div>

                                <label class="form-group">Páginas e websites <small>(url)</small></label>

                                <div class="form-group">
                                    <input type="url" name="facebook" class="form-control" placeholder="Facebook" >
                                </div>
                                
                                <div class="form-group">
                                    <input type="url" name="instagram" class="form-control"  placeholder="Instagram" >
                                </div>

                                <div class="form-group">
                                    <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest">
                                </div>

                                <div class="form-group">
                                    <input type="url" name="twitter" class="form-control"  placeholder="Twitter" >
                                </div>

                                <div class="form-group">
                                    <input type="url" name="google" class="form-control"  placeholder="Google" >
                                </div>

                                <div class="form-group">
                                    <input type="url" name="site" class="form-control"  placeholder="Site" >
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    