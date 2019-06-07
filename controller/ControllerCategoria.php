<?php

class ControllerCategoria
{

    public function cadastrarCategoria($dados = null)
    {

        if ( !isset($dados) ) return false;

        $categoria     = new Categoria();
        $categoriaDAO  = new CategoriaDAO();

        $categoria->setDescricao(ucwords($dados['descricao']));
        
        $result = $categoriaDAO->cadastrar($categoria);

        if ( $result ) {            
            $_SESSION['cad-categoria'] = 'success';
            echo "<script>window.location = 'gerenciar-categorias.php';</script>";

        } else {

            $_SESSION['cad-categoria'] = 'erro';
            echo "<script>window.location = 'cadastrar-categoria.php';</script>";

        }

    }

    public function editarCategoria($dados = null)
    {

        if ( !isset($dados) ) return false;

        $v             = $dados['v'];
        $categoria     = new Categoria();
        $categoriaDAO  = new CategoriaDAO();

        $categoria->setIdcategoria(ucwords($dados['idcategoria']));
        $categoria->setDescricao(ucwords($dados['descricao']));
        
        $result = $categoriaDAO->editar($categoria);

        if ( $result > 0 ) {            

            echo "<script>alert('Categoria atualizada com sucesso!');</script>";
            echo "<script>window.location = 'gerenciar-categorias.php?v=$v';</script>";

        } elseif (!$result) {

            echo "<script>alert('Houve um erro ao atualizar categoria.');</script>";
            echo "<script>window.location = 'editar-categoria.php?v=$v&get=$categoria->getIdcategoria()';</script>";

        }

    }

    public function deletarCategoria($dados = null)
    {
        
        if ( is_null($dados) ) return false;

        $categoriaDAO  = new CategoriaDAO;
        $result = $categoriaDAO->deletar($dados['idcategoria']);

        if ( $result ) {

            echo "<script>alert('Categoria deletada com sucesso.');</script>";
            echo "<script>window.location = 'gerenciar-categorias.php';</script>";

        } else {

            echo "<script>alert('Nao foi possivel deletar categoria, pois está sendo referenciada em um relacionamento.');</script>";
            echo "<script>window.location = 'visualizar-categoria.php';</script>";

        }

    }

    public function carregarCategoria($idcategoria)
    {

        $categoria  = new Categoria();
        $cdao       = new CategoriaDAO();

        $result  = $cdao->carregar($idcategoria);
        $categoria->setIdcategoria($result[0]['idcategoria']); 
        $categoria->setDescricao($result[0]['descricao']); 

        return $categoria;

    }

    public function listarCategoria()
    {
        $cat[]     = new Categoria();
        $cdao    = new CategoriaDAO();
        $cat    = $cdao->listar();

        return $cat;
    }
}

?>