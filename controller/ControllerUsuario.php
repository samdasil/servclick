<?php

class ControllerUsuario 
{

    public function realizarLogin($usuario, $pass)
    {

        $login  = $usuario;
        $senha  = md5($pass);
        $uDao   = new UsuarioDAO();

        $result = $uDao->realizarLogin($login, $senha);

        //if(!isset($_SESSION)) session_start();

        if(!$result){

            $_SESSION['login'] =  $usuario;
            $_SESSION['res']   =  "erro";
//print_r($_SESSION);exit;
            //echo "<script>window.location = 'index.php';</script>";

        } else {
            
            
            if($result[0]['perfil'] == 1){

                $_SESSION['session'] = base64_encode($result[0]['idadmin']);
                $_SESSION['ret'] =  'success';
                echo "<script>window.location = 'view/admin/home.php';</script>";

            }elseif($result[0]['perfil'] == 2){

                $_SESSION['session'] = base64_encode($result[0]['idcliente']);
                $_SESSION['ret'] =  'success';
                echo "<script>window.location = 'view/cliente/home.php';</script>";					

            }elseif($result[0]['perfil'] == 3){
                
                if (isset($result[0]['idfisico'])) {

                    $_SESSION['session'] = base64_encode($result[0]['idfisico']);
                    $_SESSION['ret'] =  'success';
                    echo "<script>window.location = 'view/fisico/home.php';</script>";                    

                } else if (isset($result[0]['idjuridico'])) {

                    $_SESSION['session'] = base64_encode($result[0]['idjuridico']);
                    $_SESSION['ret'] =  'success';
                    echo "<script>window.location = 'view/juridico/home.php';</script>";                    

                }

            }

        }

    }

    public function editarUsuario($dados = null)
    {
        
        if ( !isset($dados) ) return false;

        $usuario    = new Usuario();
        $usuarioDao = new UsuarioDao();
        
        switch ($dados['perfil']) {
            case 1:
                $admin   = new Administrador();
                $admin->setIdAdmin($dados['idadmin']);
                $admin->setLogin(strtolower($dados['login']));
                $admin->setSenha(md5($dados['senha']));
                $admin->setPerfil($dados['perfil']);
                $result = $usuarioDao->editarAcesso($admin);
                break;
            case 2:
                $cliente = new Cliente();
                $cliente->setIdcliente($dados['idcliente']);
                $cliente->setLogin(strtolower($dados['login']));
                $cliente->setSenha(md5($dados['senha']));
                $cliente->setPerfil($dados['perfil']);
                $result = $usuarioDao->editarAcesso($cliente);
                break;
            case 3:
                if(isset($dados['idfisico'])){
                    $fisico  = new Fisico();
                    $fisico->setIdfisico($dados['idfisico']);
                    $fisico->setLogin(strtolower($dados['login']));
                    $fisico->setSenha(md5($dados['senha']));
                    $fisico->setPerfil($dados['perfil']);    
                    $result = $usuarioDao->editarAcesso($fisico);
                }else if(isset($dados['idjuridco'])){               
                    $juridico = new Juridico();
                    $juridico->setIdjuridico($dados['idjuridico']);
                    $juridico->setLogin(strtolower($dados['login']));
                    $juridico->setSenha(md5($dados['senha']));
                    $juridico->setPerfil($dados['perfil']);
                    $result = $usuarioDao->editarAcesso($juridico);
                }

                break;
            
        }
            
        
        if( $result ){
            
            $_SESSION['acesso'] = 'success';
            echo "<script>window.location = 'home.php';</script>";

        } else {
            $_SESSION['acesso'] = 'erro';
            echo "<script>window.location = 'config.php';</script>";

        }

    }

    public function listarUsuario()
    {
        $udao    = new UsuarioDAO();
        $list    = $udao->listar();
        
        return $list;
    }

}

?>