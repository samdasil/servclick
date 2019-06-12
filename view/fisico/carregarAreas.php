<?php
    
    require_once '../../config.php';

    $c      = new ControllerAreaAtuacao();
    $area   = new AreaAtuacao();

    // caso receba dados via POST
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;
        
        $area   = $c->listarAreasPorCategoria($dados['id']);


        foreach ($area as $item) {
            echo "<option value='".$item['idarea']."'>".$item['descricao']."</option>";
        }            



    }

?>
    