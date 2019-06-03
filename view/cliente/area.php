<?php
	
	$a   	= new ControllerAreaAtuacao();
	$area   = new AreaAtuacao(); 
	$area   = $a->carregarAreaAtuacao($_POST["categoria"]);   

	foreach ($area as $item) {
        echo "<option value='".$item['idarea']."'>".$item['descricao']."</option>";
    } 
?>	

