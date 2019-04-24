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

    public function editar($dados = null, $id = null, $aFile = null)
    {
        
        if ( !isset($dados) ) return false;

        $usuario    = new Usuario;
        
        $usuarioDao = new UsuarioDao;
                
        $usuario->setLogin(strtolower($dados['login']));
            
        if(isset($dados['senha'])) {

            $usuario->setSenha(base64_encode($dados['senha']));    
            
        }
        
        $result = $usuarioDao->editarAcesso($usuario, $id);
        
        if( $result === true ){
            
            echo "<script>alert('Acesso atualizado com sucesso!');</script>";
            //echo "<script>window.location = 'view/cliente/home.php';</script>";

        } else {
            $erro = str_replace("'"," ",$result);
            //exit;
            echo "<script>alert('Erro ao atualizar: ".$erro."');</script>";
            //echo "<script>window.location = 'view/cliente/editar.php';</script>";

        }

    }


    public function listarUsuario()
    {
        $udao    = new UsuarioDAO();
        $list    = $udao->listar();
        
        return $list;
    }

}
