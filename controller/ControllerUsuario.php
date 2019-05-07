<?php

class ControllerUsuario {

    public function realizarLogin($usuario, $pass)
    {

        $login = $usuario;

        $senha = base64_encode($pass);

        $usuarioDao = new UsuarioDAO();

        $result = $usuarioDao->realizarLogin($login, $senha);
        /*echo "<pre>";
        print_r($result[0]);
        echo "</pre>";
        exit;*/
        if(!$result){

            echo "<script>alert('Login e/ou senha incorretos!');</script>";

            echo "<script>window.location = 'index.php';</script>";
            
        }else{
            
            if(!isset($_SESSION)) session_start();
            
            if($result[0]['perfil'] == 1){
                
                $v    = base64_encode($result[0]['idadmin']);

                echo "<script>alert('Login realizado com sucesso!');</script>";

                echo "<script>window.location = 'view/admin/home.php?v=$v';</script>";

            }elseif($result[0]['perfil'] == 2){

                $v    = base64_encode($result[0]['idcliente']);

                echo "<script>alert('Login realizado com sucesso!');</script>";

                echo "<script>window.location = 'view/cliente/home.php?v=$v';</script>";					

            }elseif($result[0]['perfil'] == 3){
                
                if (isset($result[0]['idfisico'])) {

                    $v    = base64_encode($result[0]['idfisico']);

                    echo "<script>alert('Login realizado com sucesso!');</script>";

                    echo "<script>window.location = 'view/fisico/home.php?v=$v';</script>";                    
                } else if (isset($result[0]['idjuridico'])) {

                    $v    = base64_encode($result[0]['idjuridico']);

                    echo "<script>alert('Login realizado com sucesso!');</script>";

                    echo "<script>window.location = 'view/juridico/home.php?v=$v';</script>";                    

                }

            }

        }

    }

    public function editarUsuario($dados = null)
    {
        
        if ( !isset($dados) ) return false;
        $v = $dados['v'];

        $usuario    = new Usuario();
        $usuarioDao = new UsuarioDao();
        
        switch ($dados['perfil']) {
            case 1:
                $admin   = new Administrador();
                $admin->setIdAdmin($dados['idadmin']);
                $admin->setLogin(strtolower($dados['login']));
                $admin->setSenha(base64_encode($dados['senha']));
                $admin->setPerfil($dados['perfil']);
                $result = $usuarioDao->editarAcesso($admin);
                break;
            case 2:
                $cliente = new Cliente();
                $cliente->setIdcliente($dados['idcliente']);
                $cliente->setLogin(strtolower($dados['login']));
                $cliente->setSenha(base64_encode($dados['senha']));
                $cliente->setPerfil($dados['perfil']);
                $result = $usuarioDao->editarAcesso($cliente);
                break;
            case 3:
                if(isset($dados['idfisico'])){
                    $fisico  = new Fisico();
                    $fisico->setIdfisico($dados['idfisico']);
                    $fisico->setLogin(strtolower($dados['login']));
                    $fisico->setSenha(base64_encode($dados['senha']));
                    $fisico->setPerfil($dados['perfil']);    
                    $result = $usuarioDao->editarAcesso($fisico);
                }else if(isset($dados['idjuridco'])){               
                    $juridico = new Juridico();
                    $juridico->setIdjuridico($dados['idjuridico']);
                    $juridico->setLogin(strtolower($dados['login']));
                    $juridico->setSenha(base64_encode($dados['senha']));
                    $juridico->setPerfil($dados['perfil']);
                    $result = $usuarioDao->editarAcesso($juridico);
                }

                break;
            
        }
            
        
        if( $result ){
            
            echo "<script>alert('Acesso atualizado com sucesso!');</script>";
            echo "<script>window.location = 'view/cliente/home.php?v=$v';</script>";

        } else {
            echo "<script>alert('Erro ao atualizar: ".$erro."');</script>";
            echo "<script>window.location = 'view/cliente/editar.php?v=$v';</script>";

        }

    }


    public function listarUsuario()
    {
        $udao    = new UsuarioDAO();
        $list    = $udao->listar();
        
        return $list;
    }

}
