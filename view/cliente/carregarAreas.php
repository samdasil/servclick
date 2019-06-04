<?php
    
    require_once '../../config.php';

	$c 		= new ControllerAreaAtuacao();
	$area 	= new AreaAtuacao();

	// caso receba dados via POST
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $area 	= $c->listarAreas($dados);

        echo "<div class='col-sm-6'>";
        echo "<div class='form-group'>";
        echo "    <label><i class='fa fa-delicious'>&nbsp&nbsp</i>Área de Atuação</label>";
        echo "    <select id='area' name='area' class='form-control'>";
                    echo "<option value='' disabled selected></option>";
			        foreach ($area as $item) {
			            echo "<option value='".$item['idarea']."'>".$item['descricao']."</option>";
			        }            
        echo "    </select>";
        echo "</div>";
        echo "</div>";
        

    }

?>
    