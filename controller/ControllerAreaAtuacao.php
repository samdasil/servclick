<?php

class ControllerAreaAtuacao
{

    public function cadastrarArea($dados = null)
    {

        if ( !isset($dados) ) return false;

        $area  = new AreaAtuacao();
        $aDAO  = new AreaAtuacaoDAO();

        $area->setDescricao(ucwords($dados['descricao']));
        $area->setCategoria($dados['categoria']);
        
        $result = $aDAO->cadastrar($area);

        if ( $result > 0 ) { 

            $_SESSION['cad-area'] = 'success';
            echo "<script>window.location = 'gerenciar-areas.php?new=success';</script>";

        } elseif (!$result) {

            $_SESSION['cad-area'] = 'erro';
            echo "<script>window.location = 'cadastrar-area.php?new=erro';</script>";

        }

    }

    public function editarArea($dados = null)
    {

        if ( !isset($dados) ) return false;

        $area  = new AreaAtuacao();
        $aDAO  = new AreaAtuacaoDAO();

        $area->setIdarea($dados['idarea']);
        $area->setDescricao(ucwords($dados['descricao']));
        $area->setCategoria($dados['categoria']);
        
        $result = $aDAO->editar($area);

        if ( $result > 0 ) {            

            $_SESSION['edit-area'] = 'success';
            echo "<script>window.location = 'gerenciar-areas.php';</script>";

        } elseif (!$result) {

            $_SESSION['edit-area'] = 'success';
            echo "<script>window.location = 'editar-area.php?p=$area->getIdarea()';</script>";

        }

    }

    public function deletarArea($idarea = null)
    {
        
        if ( is_null($idarea) ) return false;

        $aDAO   = new AreaAtuacaoDAO();
        $result = $aDAO->deletar($idarea);

        if ( $result ) {

            $_SESSION['del-area'] = 'success';
            echo "<script>window.location = 'gerenciar-areas.php';</script>";

        } else {

            $_SESSION['del-area'] = 'erro';
            echo "<script>window.location = 'deletar-area.php?p=$idarea';</script>";

        }

    }

    public function carregarArea($idarea)
    {

        $area  = new AreaAtuacao();
        $adao  = new AreaAtuacaoDAO();

        $result  = $adao->carregar($idarea);
        $area->setIdarea($result[0]['idarea']); 
        $area->setDescricao($result[0]['descricao']); 
        $area->setCategoria($result[0]['categoria']); 

        return $area;

    }

    public function listarAreasPorCategoria($idcategoria)
    {
        
        $a      = new AreaAtuacao();
        $adao   = new AreaAtuacaoDAO();
        $a      = $adao->listarAreasPorCategoria($idcategoria);
        
        return $a;
    }

    public function listarAreas()
    {
        
        $a      = new AreaAtuacao();
        $adao   = new AreaAtuacaoDAO();
        $a      = $adao->listarAreas();
        
        return $a;
    }
}

?>