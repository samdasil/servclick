<?php

    require_once '../../config.php';
    require_once 'head.php';

    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $controller = new ControllerFisico();

    $categoria  = $c->listarCategoria();

    // caso receba dados via POST 
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {
            
            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $controller->cadastrarFisico($dados, $aFile);
        
    }

?>
    
    <header id="header"> <?php require_once 'topo.php'; ?></header>

    <script type="text/javascript">
        
            $(document).ready(function(){
              $( "#categoria" ).change(function() {
                    $.post("carregarAreas.php",{id:this.value},function(data){
                        //console.log(data);
                        $("#areas").html(data);
                ﻿        $("#areas").css("display", "block");
                ﻿        $("#div_desc").css("display", "none");
                ﻿        $("#setas").css("display", "none");
                        $("#descricao").val("");
                    });
                });
            });

            $(document).ready(function(){
              $( "#areas" ).change(function() {
                    //console.log(data);
                    $("#div_desc").css("display", "block");
            ﻿        $("#setas").css("display", "block");
                    $("#descricao").focus();
                });
            });          
        ﻿
    </script>﻿﻿

    <div class="container text-center ">
        <h5>Aumente seu leque de clientes criando seu perfil</h5>
        <h5>Ajude-nos a divulgar seu trabalho!</h5>
    </div>

    <!-- container do formulario -->
    <section id="portfolio">
        <div class="container padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms"  >

            <div class="col-md-4 col-sm-12">

                <div class="contact-form bottom">
                    
                    <br>

                    <form name="form" method="post" action="" enctype="multipart/form-data">
                            
                        <div id="div_dados" style="display:block;">
                            <!--<label class="form-group"><i class="fa fa-photo">&nbsp&nbsp</i>Foto para perfil</label>-->

                            <div class="col-sm-6">
                                <img src="../../assets/images/portfolio/photo.png" class="img-responsive img-perfil" alt="" name="img" id="img" />
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    <li><a href="portfolio-details.html"><i class="fa fa-link"></i></a></li>
                                    <li><a href="../../assets/images/portfolio/photo.png" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                                <input type="file" name="foto" id="foto" class="form-control upload-foto" accept="image/png, image/jpeg" onchange="alterarFoto()" required /> 
                                <span class="valid vfoto text-center">Selecione uma foto *</span>
                            </div>

                            <label class="form-group"><i class="fa fa-database">&nbsp&nbsp</i>Dados</label>

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
                            <div class="form-group">
                                <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14">
                            </div>
                            <a href="#" id="dados-right" onclick="fisico_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                        </div>

                        <div id="div_area" style="display:none;">
                            
                            <div class="form-group">
                                <label><i class="fa fa-list">&nbsp&nbsp</i>Selecione uma Categoria</label>
                                <select class="form-control" id='categoria'>
                                    <option selected disabled></option>
                                    <?php foreach ($categoria as $item) {
                                        echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                                    } ?>
                                </select>
                                <span class="valid vcategoria">Campo obrigatório *</span>
                            </div>

                            <div id="areas" style="display: none;">
                                <span class="valid varea">Campo obrigatório *</span>
                            </div><br>

                            <div id="div_desc" class="form-group" style="display: none;">
                                <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva um pouco do seu trabalho para que seus clientes possam lhe conhecer melhor." onkeypress="validoff()"></textarea>
                                <span class="valid vdescricao">Campo obrigatório *</span>
                            </div>

                            <div id="setas" style="display: none;">
                                <a href="#" id="area-left" onclick="fisico_next(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
                                <a href="#" id="area-right" onclick="fisico_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                            </div>
                        </div>
                    
                        </div>
                        
                        <div id="div_endereco" style="display:none;">
                            <label class="form-group"><i class="fa fa-map-marker">&nbsp&nbsp</i>Endereço</label>

                            <div class="form-group">
                                <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" onkeyup="tamanhoCampo()">
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
                                    <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off">
                                </div>
                                <a href="#" id="endereco-left" onclick="fisico_next(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
                                <a href="#" id="endereco-right" onclick="fisico_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                            </div>
                        </div>

                        <div id="div_pagina" style="display:none;">
                            <label class="form-group"><i class="fa fa-globe">&nbsp&nbsp</i>Páginas e websites <small>(url)</small></label>

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
                            <a href="#" id="pagina-left" onclick="fisico_next(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
                            <a href="#" id="pagina-right" onclick="fisico_next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                        </div>

                        <div id="div_acesso" style="display:none;">
                            <label class="form-group"><i class="fa fa-key">&nbsp&nbsp</i>Configuração de acesso</label>

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
                            <a href="#" id="acesso-left" onclick="fisico_next(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>