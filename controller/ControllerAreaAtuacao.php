<?php

class ControllerAreaAtuacao
{

    public function cadastrarAreaAtuacao($dados = null)
    {

        if ( !isset($dados) ) return false;

        $area  = new AreaAtuacao();
        $aDAO  = new AreaAtuacaoDAO();

        $area->setDescricao(ucwords($dados['descricao']));
        $area->setCategoria($dados['categoria']);
        
        $result = $aDAO->cadastrar($area);

        if ( $result > 0 ) { 

            //echo "<script>alert('Cadastro foi efetuado com sucesso!');</script>";
            echo "<script>window.location = 'gerenciar-areas.php?new=success';</script>";

        } elseif (!$result) {

            //echo "<script>alert('Houve um erro ao cadastrar categoria.');</script>";
            echo "<script>window.location = 'cadastrar-area.php?new=erro';</script>";

        }

    }

    public function editarAreaAtuacao($dados = null)
    {

        if ( !isset($dados) ) return false;

        $area  = new AreaAtuacao();
        $aDAO  = new AreaAtuacaoDAO();

        $area->setIdarea($dados['idarea']);
        $area->setDescricao(ucwords($dados['descricao']));
        $area->setCategoria($dados['categoria']);
        
        $result = $aDAO->editar($area);

        if ( $result > 0 ) {            

            //echo "<script>alert('Categoria atualizada com sucesso!');</script>";
            echo "<script>window.location = 'gerenciar-areas.php';</script>";

        } elseif (!$result) {

            //echo "<script>alert('Houve um erro ao atualizar categoria.');</script>";
            echo "<script>window.location = 'editar-area.php?v=$v&get=$categoria->getIdcategoria()';</script>";

        }

    }

    public function deletarArea($dados = null)
    {
        
        if ( is_null($dados) ) return false;

        $v             = $dados['v'];
        $aDAO  = new aDAO;
        $result = $aDAO->deletar($dados['idarea']);

        if ( $result ) {

            echo "<script>alert('Area de Atuação deletada com sucesso.');</script>";
            echo "<script>window.location = 'gerenciar-areas.php?v=$v';</script>";

        } else {

            echo "<script>alert('Nao foi possivel deletar area de atuação, pois está sendo referenciada em um relacionamento.');</script>";
            echo "<script>window.location = 'visualizar-area.php?v=$v';</script>";

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

    public function listarAreas($idcategoria)
    {
        
        $a      = new AreaAtuacao();
        $adao   = new AreaAtuacaoDAO();
        $a    = $adao->listar($idcategoria['id']);
        
        return $a;
    }
}

?>