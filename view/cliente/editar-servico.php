<?php

    require_once 'header.php';
    
    $p          = $_GET['p'];
    $c          = new ControllerCategoria();
    $s          = new ControllerServico();
    $a          = new ControllerAreaAtuacao();
    $e          = new ControllerEndereco();
    $categoria  = new Categoria();
    $area       = new AreaAtuacao();
    $servico    = new Servico();
    $endereco   = new Endereco();
    $categorias = $c->listarCategoria();
    $servico    = $s->carregarServico($p);
    $area       = $a->carregarArea($servico->getArea());
    $endereco   = $e->carregarEndereco($servico->getEndereco());
    $categoria  = $c->carregarCategoria($area->getCategoria());

    // chamada do controller
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $s->editarServico($dados);

    }

?>
	<script type="text/javascript">

        $(document).ready(function(){
            $( "#categoria" ).change(function() {
                $.post("carregarAreas.php",{id:this.value},function(data){
                    //console.log(data);
                    $("#div_areas").html(data);
            ﻿        $("#div_areas").css("display", "block");
                    $("#lupa").css("display", "block");
                }); 
            });
        });
        
        $(document).ready(function(){
            $('#proprio').click(function(){
                $('#proprio').css('color', '#23385e');
                $('#proprio-end').css('color', '#23385e');
                $('#outro').css('color', '#9f9696');
                $('#outro-end').css('color', '#9f9696');
                $("#div_endereco").css("display", "none");
                $("#div_button").css("display", "block");
            });
        });

        $(document).ready(function(){
            $('#proprio-end').click(function(){
                $('#proprio').css('color', '#23385e');
                $('#proprio-end').css('color', '#23385e');
                $('#outro').css('color', '#9f9696');
                $('#outro-end').css('color', '#9f9696');
                $("#div_endereco").css("display", "none");
                $("#div_button").css("display", "block");
            });
        });

        $(document).ready(function(){
            $('#outro').click(function(){
                $('#proprio').css('color', '#9f9696');
                $('#proprio-end').css('color', '#9f9696');
                $('#outro').css('color', '#23385e');
                $('#outro-end').css('color', '#23385e');
                $("#div_endereco").css("display", "block");
                $("#div_button").css("display", "block");
                $("#cep").val("");
                $("#logradouro").val("");
                $("#cidade").val("");
                $("#bairro").val("");
                $("#estado").val("");
                $("#numero").val("");
                $("#complemento").val("");
            });
        });

        $(document).ready(function(){
            $('#outro-end').click(function(){
                $('#proprio').css('color', '#9f9696');
                $('#proprio-end').css('color', '#9f9696');
                $('#outro').css('color', '#23385e');
                $('#outro-end').css('color', '#23385e');
                $("#div_endereco").css("display", "block");
                $("#div_button").css("display", "block");
                $("#cep").val("");
                $("#logradouro").val("");
                $("#cidade").val("");
                $("#bairro").val("");
                $("#estado").val("");
                $("#numero").val("");
                $("#complemento").val("");
            });
        });

        $(document).ready(function(){
          $( "#div_areas" ).change(function() {
        ﻿        $("#div_dados").css("display", "block");
                $("#descricao").focus();
            });
        });

	</script>

    <header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="portfolio" class="pt5">
    	<div class="container">
    		<div class="col-md-12 col-sm-12">

                <script type="text/javascript">
                
                    $(document).ready(function(){
                      $( "#categoria" ).change(function() {
                            $.post("list-area.php",{id:this.value},function(data){
                                //console.log(data);
                                $("#areas").html(data);
                        ﻿        $("#areas").css("display", "block");
                        ﻿        $("#selected").css("display", "none");

                            });
                        });
                    });
                ﻿
                </script>﻿﻿

    			<form name="form" method="post" action="" onsubmit="return validFormServico()" enctype="multipart/form-data">

                    <input type="hidden" name="endereco" value="<?=$servico->getEndereco()?>">
                    <input type="hidden" name="idservico" value="<?=$servico->getIdservico()?>">
                    <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente()?>">

                    <div id="div_categoria">
                        <div class="form-group">
                            <label><i class="fa fa-list">&nbsp&nbsp</i>Categoria</label>
                            <select class="form-control" id='categoria' autofocus>
                                <option value="<?=$categoria->getIdcategoria()?>" selected> <?=$categoria->getDescricao()?></option>
                                <?php foreach ($categorias as $item) {
                                    echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                                } ?>
                            </select>                            
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label><i class='fa fa-delicious'>&nbsp&nbsp</i>Área de Atuação</label>
                        <select class="form-control" name="area" id='areas'>
                            <option id="selected" value="<?=$area->getIdarea();?>" selected ><?=$area->getDescricao();?></option>
                        
                        </select>
                    </div>

                    <br>
                
    				<!-- DADOS  -->
				    <div id="div_dados">
					    <div class="form-group">
					    	<label for="descricao"><i class="fa fa-tags">&nbsp&nbsp</i>Qual o serviço que você precisa?</label>
					        <textarea name="descricao" id="descricao" required="required" class="form-control" rows="4" placeholder="" ><?=$servico->getDescricao()?></textarea>
					    </div>

	                    <br>
	                </div>

                    <label class="form-group"><i class="fa fa-map-marker">&nbsp&nbsp</i>Endereço</label>

                        <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9" onkeyup="tamanhoCampo()" >
                            <span class="valid vcep">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>"  onkeypress="validoff()">
                            <span class="valid vlogradouro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="<?=$endereco->getCidade();?>"  onkeypress="validoff()">
                            <span class="valid vcidade">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" value="<?=$endereco->getBairro();?>"  onkeypress="validoff()">
                            <span class="valid vbairro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2"  onkeypress="validoff()">
                            <span class="valid vestado">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>"  onkeypress="validoff()">
                            <span class="valid vnumero">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>">
                        </div>

	            	</div>

                    <div class="buttons-action">
                        <div class="col-md-12 button-fixed-right">
                            <button type="submit" class="btn btn-success button-radius"><i class="fa fa-check icon-btn "></i></button>
                        </div>
                    </div>

				</form>

			</div>
		</div>
	</section>


<?php require_once 'footer.php'; ?>
