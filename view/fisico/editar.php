<?php 
    
    require_once 'header.php';
    
    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $fisico     = new Fisico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEndereco($id);
    $pagina     = $p->carregarPagina($fisico->getPagina());
    $area       = $a->carregarArea($fisico->getArea());
    $list_categ = $c->listarCategoria();
    $list_area  = $a->listarAreasPorCategoria($area->getCategoria());
    $categoria  = $c->carregarCategoria($area->getCategoria());
   // print_r($categoria);exit;
    // caso receba dados via POST ou GET
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

    <header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="portfolio">
        <div class="container pt8">

            <?php require_once 'alert.php'; ?>

            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">

                    <script type="text/javascript">
                    
                        $(document).ready(function(){
                          $( "#categoria" ).change(function() {
                                $.post("carregarAreas.php",{id:this.value},function(data){
                                    //console.log(data);
                                    $("#areas").html(data);
                            ﻿        $("#areas").css("display", "block");
                            ﻿        $("#selected").css("display", "none");

                                });
                            });
                        });

                        $(document).ready(function(){
                          $( "#areas" ).change(function() {
                                //console.log(data);
                                $("#div_desc").css("display", "block");
                                $("#descricao").focus();
                            });
                        });          
                    ﻿
                    </script>﻿﻿

                    <form name="form" method="post" onsubmit="return validFormFisico()" action="" enctype="multipart/form-data">

                        <input type="hidden" name="idfisico" value="<?=$fisico->getIdfisico();?>" >
                        <input type="hidden" name="pagina" value="<?=$fisico->getPagina();?>">
                        <input type="hidden" name="status_" value="<?=$fisico->getStatus_();?>">
                        <input type="hidden" name="endereco" value="<?=$fisico->getEndereco();?>">

                        <div class="col-sm-6">
                            <input type="hidden" name="img" id="img" value="<?=$fisico->getFoto();?>">
                            <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive img-perfil" alt="Clique para selecionar nova foto" name="img" id="img" >
                        </div>
                        
                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control upload-foto" onchange="alterarImagem()" accept="image/png, image/jpeg">
                            <span class="valid vfoto text-center">Selecione uma foto *</span>
                        </div>

                        <label class="form-group"><i class="fa fa-database">&nbsp&nbsp</i>Dados</label>

                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getCpf();?>" readonly >
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" value="<?=$fisico->getNome();?>" onkeypress="validoff()">
                            <span class="valid vnome">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$fisico->getEmail();?>" onkeypress="validoff()" >
                            <span class="valid vemail">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$fisico->getFone();?>" onkeypress="validoff()">
                            <span class="valid vfone">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$fisico->getFixo();?>" onkeypress="validoff()">
                        </div>

                        <label><i class="fa fa-list">&nbsp&nbsp</i>Categoria</label>
                        <div class="form-group">
                            <select class="form-control" id='categoria'>
                                <option value="<?=$categoria->getIdcategoria();?>" selected ><?=$categoria->getDescricao();?></option>
                                <?php foreach ($list_categ as $item) {
                                    echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                                } ?>
                            </select>
                            <span class="valid vcategoria">Campo obrigatório *</span>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="area" id='areas'>
                                <option id="selected" value="<?=$area->getIdarea();?>" selected ><?=$area->getDescricao();?></option>
                                
                                
                            </select>
                            <span class="valid varea">Campo obrigatório *</span>
                        </div>

                        <div id="div_desc" class="form-group">
                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva um pouco do seu trabalho para que seus clientes possam lhe conhecer melhor." onkeypress="validoff()"><?=$fisico->getDescricao();?></textarea>
                            <span class="valid vdescricao">Campo obrigatório *</span>
                        </div>

                        <label class="form-group"><i class="fa fa-map-marker">&nbsp&nbsp</i>Endereço</label>

                        <div class="form-group">
                            <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>" onkeyup="tamanhoCampo()">
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>" onkeypress="validoff()">
                            <span class="valid vlogradouro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>" onkeypress="validoff()">
                            <span class="valid vcidade">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>" onkeypress="validoff()">
                            <span class="valid vbairro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>" onkeypress="validoff()">
                            <span class="valid vestado">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>" onkeypress="validoff()">
                            <span class="valid vnumero">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>" onkeypress="validoff()">
                        </div>

                        <label class="form-group"><i class="fa fa-globe">&nbsp&nbsp</i>Páginas e websites <small>(url)</small></label>

                        <div class="form-group">
                            <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?=$pagina->getFacebook();?>">
                        </div>
                        
                        <div class="form-group">
                            <input type="url" name="instagram" class="form-control"  placeholder="Instagram" value="<?=$pagina->getInstagram();?>">
                        </div>

                        <div class="form-group">
                            <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest"  value="<?=$pagina->getPinterest();?>">
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

                        <div class="buttons-action">
                            <div class="col-md-12 button-fixed-right">
                                <button type="submit" class="btn btn-success button-radius"><i class="fa fa-check icon-btn "></i></button>
                            </div>
                        </div>

                        <div class="buttons-action">
                            <div class="col-md-12 button-fixed-left">
                                <a href="desativar.php"><button type="button" class="btn btn-warning button-radius"><i class="fa fa-trash icon-btn "></i></button></a>
                            </div>
                        </div>
                        
                    </form>            

                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>