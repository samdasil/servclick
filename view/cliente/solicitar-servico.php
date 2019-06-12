<?php

    require_once 'header.php';
    
    $c          = new ControllerCategoria();
    $s          = new ControllerServico();
    $categoria  = new Categoria();
    $servico    = new Servico();
    $categoria  = $c->listarCategoria();

    // chamada do controller
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $s->solicitarServico($dados);

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

    <section id="portfolio">
    	<div class="container">
    		<div class="col-md-12 col-sm-12">

    			<form name="form" method="post" action="" onsubmit="return validFormServico()" enctype="multipart/form-data">

                    <input type="hidden" name="endereco1" value="<?=$cliente->getEndereco()?>">
                    <input type="hidden" name="cliente" value="<?=$cliente->getIdcliente()?>">

                    <div id="div_categoria">
                        <div class="form-group">
                            <label><i class="fa fa-list">&nbsp&nbsp</i>Categoria</label>
                            <select class="form-control" id='categoria' autofocus>
                                <option selected></option>
                                <?php foreach ($categoria as $item) {
                                    echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                                } ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="row">
                        <div id="div_areas" class="padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" style="display: none;">
                          
                        </div>
                    </div>

                    <br>
                
    				<!-- DADOS  -->
				    <div id="div_dados" style="display: none;">
					    <div class="form-group">
					    	<label for="descricao"><i class="fa fa-tags">&nbsp&nbsp</i>Qual o serviço que você precisa?</label>
					        <textarea name="descricao" id="descricao" required="required" class="form-control" rows="4" placeholder="" ></textarea>
					    </div>

	                    <br>

	                    <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
        	                    	<label><i class="fa fa-map-marker">&nbsp&nbsp</i> Onde deverá ser feito o serviço ?</label>
    	                    		<div id="op-endereco">		
    			                    	<div class="row">
    			                    		<input type="radio" name="endereco" id="proprio" value="1" >
    			                    		<label class="radio-end" for="proprio" id="proprio-end">no meu endereço cadastrado</label>
    			                    	</div>
    			                    	<div class="row">
    			                    		<input type="radio" name="endereco" id="outro" val='2'>
    			                    		<label class="radio-end" for="outro" id="outro-end">outro endereço</label>
    			                    	</div>
    	                    		</div>
                                </div>
                            </div>
	                    </div>
	                </div>

                    <!-- ENDEREÇO  -->
                    <div id="div_endereco" style="display:none;">
                    	<label class="form-group">Endereço</label>

                        <div class="form-group">
                            <input type="text" name="cep" id="cep" class="form-control"  placeholder="CEP" value="" minlength="9" maxlength="9" onkeyup="tamanhoCampo()">
                            <span class="valid vcep">Campo obrigatório</span>
                        </div>
	                    <div class="form-group">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro" value="" onkeypress="validoff()">
                            <span class="valid vlogradouro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" value="" onkeypress="validoff()">
                            <span class="valid vcidade">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="bairro" id="bairro" class="form-control"  placeholder="Bairro" value="" onkeypress="validoff()">
                            <span class="valid vbairro">Campo obrigatório</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" value="" 
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

	            	</div>

                    <div class="row" id="div_button" style="display: none;">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="Solicitar Serviço">
                        </div>
                    </div>

				</form>

			</div>
		</div>
	</section>


<?php require_once 'footer.php'; ?>