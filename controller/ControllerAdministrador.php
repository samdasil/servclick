<?php

class ControllerAdministrador
{

    public function cadastrarAdministrador($dados = null)
    {

        if ( !isset($dados) ) return false;

        $administrador     = new Administrador();
        $administradorDAO  = new AdministradorDAO();

        $administrador->setNome(ucwords($dados['nome']));
        $administrador->setLogin(strtolower(($dados['login'])));
        $administrador->setSenha(ucwords(md($dados['senha'])));
        $administrador->setPerfil(1);
        $administrador->setStatus_(1);
        
        $result = $administradorDAO->cadastrar($administrador);

        if ( $result > 0 ) {            

            echo "<script>alert('Cadastro foi efetuado com sucesso!');</script>";
            echo "<script>window.location = 'gerenciar-administradores.php?v=$v';</script>";

        } elseif (!$result) {

            echo "<script>alert('Houve um erro ao cadastrar administrador.');</script>";
            echo "<script>window.location = 'cadastrar-administrador.php?v=$v';</script>";

        }

    }

    public function editarAdministrador($dados = null)
    {
        $administrador     = new Administrador();
        $administradorDAO  = new AdministradorDAO();

        $administrador->setIdadmin($dados['idadmin']);
        $administrador->setNome(ucwords($dados['nome']));
        $administrador->setPerfil(1);
        
        $result = $administradorDAO->editar($administrador);

        if ( $result > 0 ) {            

            $_SESSION['edit'] = 'success';
            echo "<script>window.location = 'gerenciar-administradores.php?v=$v';</script>";

        } elseif (!$result) {

            echo "<script>alert('Houve um erro ao atualizar administrador.');</script>";
            echo "<script>window.location = 'editar-administrador.php?v=$v&get=".$dados['idadmin']."';</script>";

        }

    }

    public function desativarAdministrador($dados = null)
    {
        
        if ( is_null($dados) ) return false;

        $v                 = $dados['v'];
        $administrador     = new Administrador();
        $administradorDAO  = new AdministradorDAO;

        $administrador->setIdadmin($dados['idadmin']);
        $result            = $administradorDAO->desativar($administrador);

        if ( $result ) {

            echo "<script>alert('Administrador desativado com sucesso.');</script>";
            echo "<script>window.location = 'gerenciar-administradores.php?v=$v';</script>";

        } else {

            echo "<script>alert('Nao foi possivel deletar administrador, pois está sendo referenciada em um relacionamento.');</script>";
            echo "<script>window.location = 'visualizar-administrador.php?v=$v&get=".$dados['idadmin']."';</script>";

        }

    }

    public function carregarAdministrador($id)
    {

        $administrador  = new Administrador();
        $adao           = new AdministradorDAO();

        $result  = $adao->carregar($id);

        $administrador->setIdadmin($result[0]['idadmin']); 
        $administrador->setNome($result[0]['nome']); 
        $administrador->setLogin($result[0]['login']); 
        $administrador->setStatus_($result[0]['status_']); 

        return $administrador;

    }

    public function listarAdministrador()
    {
        $cdao    = new AdministradorDAO();
        $list    = $cdao->listar();

        return $list;
    }
}

?>