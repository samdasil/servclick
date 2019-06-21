<?php 
    
    require_once 'header.php';
    
    $f          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $juridico     = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    $juridico     = $f->carregarJuridico($id);
    $endereco   = $e->carregarEndereco($id);
    $pagina     = $p->carregarPagina($juridico->getPagina());
    $area       = $a->carregarArea($juridico->getArea());
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

        $f->editarJuridico($dados, $aFile);
        
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

                    <form name="form" method="post" onsubmit="return validFormJuridico()" action="" enctype="multipart/form-data">

                        <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                        <input type="hidden" name="pagina" value="<?=$juridico->getPagina();?>">
                        <input type="hidden" name="status_" value="<?=$juridico->getStatus_();?>">
                        <input type="hidden" name="endereco" value="<?=$juridico->getEndereco();?>">

                         <div class="col-sm-6">
                            <input type="hidden" name="img" id="img" value="<?=$juridico->getFoto();?>">
                            <img src="../../assets/images/juridico/<?=$juridico->getFoto();?>" class="img-responsive img-perfil" alt="Clique para selecionar nova foto" name="img" id="img" >
                        </div>
                        
                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control upload-foto" onchange="alterarImagem()" accept="image/png, image/jpeg">
                            <span class="valid vfoto text-center">Selecione uma foto *</span>
                        </div>

                        <label class="form-group"><i class="fa fa-database">&nbsp&nbsp</i>Dados</label>
                        
                        <div class="form-group">
                            <input type="text" name="cnpj" id="cnpj" class="form-control" required="required" placeholder="CNPJ" autocomplete="off" maxlength="18" minlength="18" value="<?=$juridico->getCnpj();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="razaosocial" class="form-control" required="required" placeholder="Razão Social" autocomplete="off"  value="<?=$juridico->getRazaosocial();?>">
                            <span class="valid vrazao">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nomefantasia" class="form-control" required="required" placeholder="Nome Fantasia" autocomplete="off"  value="<?=$juridico->getNomefantasia();?>">
                            <span class="valid vnome">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="responsavel" class="form-control" required="required" placeholder="responsavel" autocomplete="off" value="<?=$juridico->getResponsavel();?>">
                            <span class="valid vresponsavel">Campo obrigatório *</span>
                        </div>                        
                       <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$juridico->getEmail();?>" onkeypress="validoff()" >
                            <span class="valid vemail">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$juridico->getFone();?>" onkeypress="validoff()">
                            <span class="valid vfone">Campo obrigatório *</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$juridico->getFixo();?>" onkeypress="validoff()">
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
                            <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva um pouco do seu trabalho para que seus clientes possam lhe conhecer melhor." onkeypress="validoff()"><?=$juridico->getDescricao();?></textarea>
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