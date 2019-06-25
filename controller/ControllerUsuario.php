<?php

class ControllerUsuario 
{

    public function realizarLogin($usuario, $pass)
    {
        $uDao   = new UsuarioDAO();

        $result = $uDao->realizarLogin($usuario, md5($pass));

        if(!$result){

            $_SESSION['login'] =  $usuario;
            $_SESSION['res']   =  "erro";

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
        $usuarioDao = new UsuarioDAO();
        $status_    = isset($dados['status_']) && $dados['status_'] == 1 ? 2 : 1;
        
        switch ($dados['perfil']) {
            case 1:
                $admin   = new Administrador();
                $admin->setIdAdmin($dados['id']);
                $admin->setLogin(strtolower($dados['login']));
                $admin->setSenha(md5($dados['senha']));
                $admin->setPerfil($dados['perfil']);
                $admin->setStatus_($status_);
                $result = $usuarioDao->editarAcesso($admin);
                break;
            case 2:
                $cliente = new Cliente();
                $cliente->setIdcliente($dados['id']);
                $cliente->setLogin(strtolower($dados['login']));
                $cliente->setSenha(md5($dados['senha']));
                $cliente->setPerfil($dados['perfil']);
                $cliente->setStatus_($status_);
                $result = $usuarioDao->editarAcesso($cliente);
                break;
            case 3: {
                
                if((isset($dados['id']) && $dados['desc-perfil'] == 'fisico') || $dados['desc-perfil'] == 'Profissional Físico'){
                    $fisico  = new Fisico();
                    $fisico->setIdfisico($dados['id']);
                    $fisico->setLogin(strtolower($dados['login']));
                    $fisico->setSenha(md5($dados['senha']));
                    $fisico->setPerfil($dados['perfil']);    
                    $fisico->setStatus_($status_);
                    
                    $result = $usuarioDao->editarAcesso($fisico, 'fisico');
                    
                }
                if((isset($dados['id']) && $dados['desc-perfil'] == 'juridico') || $dados['desc-perfil'] == 'Profissional Jurídico'){    
                    $juridico = new Juridico();
                    $juridico->setIdjuridico($dados['id']);
                    $juridico->setLogin(strtolower($dados['login']));
                    $juridico->setSenha(md5($dados['senha']));
                    $juridico->setPerfil($dados['perfil']);
                    $juridico->setStatus_($status_);
                    
                    $result = $usuarioDao->editarAcesso($juridico, 'juridico');
                    
                }
            break;
            }
            
        }
            
        $isadmin = explode('/', $_SERVER['REQUEST_URI']);

        if( $result ){
            
            if( in_array("admin", $isadmin) ) {
                $_SESSION['acesso'] = 'success';
                echo "<script>window.location = 'gerenciar-usuarios.php';</script>";                
            } else {
                $_SESSION['acesso'] = 'success';
                echo "<script>window.location = 'home.php';</script>";    
            }         

        } else {

            if( in_array("admin", $isadmin) ) {
                $_SESSION['acesso'] = 'erro';
                echo "<script>window.location = 'gerenciar-usuarios.php';</script>";                
            } else {
                $_SESSION['acesso'] = 'erro';
                echo "<script>window.location = 'config.php';</script>";
            }

        }

    }

    public function carregarUsuario($login, $id, $perfil = null)
    {
        
        if ( !isset($login) || !isset($id) ) return false;

        $usuario    = new Usuario();
        $uDao       = new UsuarioDAO();
        
        $result     = $uDao->carregar($login, $id);
        
        switch($result[0]['perfil']){
            case 1:
                $admin  = new Administrador();
                $adao   = new AdministradorDAO();
                $result = $adao->carregar($id);

                $admin->setIdadmin($result[0]['idadmin']);
                $admin->setNome($result[0]['nome']);
                $admin->setLogin($result[0]['login']);
                $admin->setSenha($result[0]['senha']);
                $admin->setPerfil($result[0]['perfil']);
                $admin->setStatus_($result[0]['status_']);
                $admin->setDtcadastro($result[0]['dtcadastro']);
                return $admin;
                break;
            case 2:
                $cliente = new Cliente();
                $cdao    = new ClienteDAO();
                $result  = $cdao->carregar($id);

                $cliente->setIdcliente($result[0]['idcliente']);
                $cliente->setNome($result[0]['nome']);
                $cliente->setLogin($result[0]['login']);
                $cliente->setSenha($result[0]['senha']);
                $cliente->setPerfil($result[0]['perfil']);
                $cliente->setStatus_($result[0]['status_']);
                $cliente->setDtcadastro($result[0]['dtcadastro']);
                return $cliente;
                break;
            case 3:
                if($result[0]['cliente'] == 'fisico'){
                    $fisico  = new Fisico();
                    $fdao    = new FisicoDAO();
                    $result  = $fdao->carregar($id);

                    $fisico->setIdfisico($result[0]['idfisico']);
                    $fisico->setNome($result[0]['nome']);
                    $fisico->setLogin($result[0]['login']);
                    $fisico->setSenha($result[0]['senha']);
                    $fisico->setPerfil($result[0]['perfil']);
                    $fisico->setStatus_($result[0]['status_']);
                    $fisico->setDtcadastro($result[0]['dtcadastro']);
                    return $fisico;
                }else if($result[0]['cliente'] == 'juridico'){               
                    $juridico = new Juridico();
                    $jdao     = new JuridicoDAO();
                    $result   = $jdao->carregar($id);

                    $juridico->setIdjuridico($result[0]['idjuridico']);
                    $juridico->setRazaoSocial($result[0]['razaosocial']);
                    $juridico->setLogin($result[0]['login']);
                    $juridico->setSenha($result[0]['senha']);
                    $juridico->setPerfil($result[0]['perfil']);
                    $juridico->setStatus_($result[0]['status_']);
                    $juridico->setDtcadastro($result[0]['dtcadastro']);
                    return $juridico;
                }

            break;
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