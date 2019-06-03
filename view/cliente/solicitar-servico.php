<?php

    require_once 'header.php';
    
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $categoria  = $c->listarCategoria();

?>
	<script type="text/javascript">
		$(document).ready(function(){
          	$( "#proprio-end" ).click(function() {
                //console.log(data);
        ﻿        $("#proprio-end").css("color", "#23385e");
                $("#outro-end").css("color", "#9f9696");
                $("#div_endereco").css("display", "none");
            });
        });

        $(document).ready(function(){
          	$( "#outro-end" ).click(function() {
                //console.log(data);
                $("#outro-end").css("color", "#23385e");
        ﻿        $("#proprio-end").css("color", "#9f9696");
        ﻿        $("#dados-right").css("display", "none");
        		$("#div_endereco").css("display", "block");
            });
        });	
        $(document).ready(function(){
          	$( "#proprio" ).click(function() {
                //console.log(data);
        ﻿        $("#proprio-end").css("color", "#23385e");
                $("#outro-end").css("color", "#9f9696");
                $("#div_endereco").css("display", "none");
            });
        });

        $(document).ready(function(){
          	$( "#outro" ).click(function() {
                //console.log(data);
                $("#outro-end").css("color", "#23385e");
        ﻿        $("#proprio-end").css("color", "#9f9696");
        		$("#div_endereco").css("display", "block");
        		$("#cep").val("");
        		$("#logradouro").val("");
        		$("#cidade").val("");
        		$("#bairro").val("");
        		$("#estado").val("");
        		$("#numero").val("");
        		$("#complemento").val("");
            });
        });	
	</script>

    <header id="header"> <?php require_once 'topo.php'; ?> </header>

    <section id="portfolio">
    	
    	<div class="container">
    		

    	</div>

    	<div class="container">
    		<div class="col-md-4 col-sm-12">

    			<form name="form" method="post" action="" enctype="multipart/form-data">

    				<!-- DADOS  -->
				    <div id="div_dados" style="display:block;">
					    <div class="form-group">
					    	<label for="descricao"><i class="fa fa-tags">&nbsp&nbsp</i>Qual o serviço que você precisa?</label>
					        <textarea name="descricao" id="descricao" required="required" class="form-control" rows="4" placeholder=""></textarea>
					    </div>

					    <!--<div class="form-group">
	                        <input type="number" name="valorSugerido" class="form-control" required="" placeholder="Quanto você está disposto a pagar?" autocomplete="off" value="">
	                    </div>-->
	                    <br>
	                    <div class="form-group">
	                    	<label><i class="fa fa-map-marker">&nbsp&nbsp</i> Onde deverá ser feito o serviço ?</label>
	                    		<div id="op-endereco">		
			                    	<div class="row">
			                    		<input type="radio" name="endereco" id="proprio" checked >
			                    		<label class="radio-end" for="proprio" id="proprio-end">no meu endereço cadastrado</label>
			                    	</div>
			                    	<div class="row">
			                    		<input type="radio" name="endereco" id="outro">
			                    		<label class="radio-end" for="outro" id="outro-end">outro endereço</label>
			                    	</div>
	                    		</div>
	                    </div>
                        <a href="#" id="dados-right" onclick="solicitarServico(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
	                </div>

                    <!-- ENDEREÇO  -->
                    <div id="div_endereco" style="display:none;">
                    	<label class="form-group">Endereço</label>

	                    <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9">
                        </div>
                        <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>">
                        </div> 
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" value="<?=$endereco->getCidade();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" value="<?=$endereco->getBairro();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2">
                        </div>
                        <div class="form-group">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>">
                        </div>
                        <a href="#" id="endereco-right" onclick="solicitarServico(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                        <a href="#" id="endereco-left" onclick="solicitarServico(this)" class="left"><i class="fa fa-arrow-left fa-3x"></i></a>
	            	</div>


				</form>

			</div>
		</div>
	</section>


<?php require_once 'footer.php'; ?>