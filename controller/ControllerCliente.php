<?php

class ControllerCliente
{

    public function cadastrarCliente($dados = null, $aFile = null)
    {

        if ( !isset($dados) || UsuarioDAO::verificarLogin($dados['login']) ) return 0;

        $cliente     = new Cliente();
        $endereco    = new Endereco(); 
        $clienteDAO  = new ClienteDAO();
        $enderecoDAO = new EnderecoDAO();

        $array = explode('/', $_SERVER['REQUEST_URI']);
        $cpf  = str_replace(".", "", str_replace("-", "", $dados['cpf']));
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        if (!ClienteDAO::verificarCpf($cpf)) {

            $foto =  $dados['login'] . time('ss') . ".jpg";

            $cliente->setCpf($cpf);
            $cliente->setNome(ucwords($dados['nome']));
            $cliente->setEmail(strtolower($dados['email']));
            $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $cliente->setLogin(strtolower($dados['login']));
            $cliente->setSenha(md5($dados['senha']));
            $cliente->setPerfil(2); // 2=cliente
            $cliente->setFoto($foto);
            $cliente->setStatus_(1); //1=ativo 2=inativo

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setNumero($dados['numero']);
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setComplemento($dados['complemento']);

            $result = $clienteDAO->cadastrar($cliente, $endereco);

            if ( $result > 0 ) { 

                if ( $aFile['foto']['size'] > 0 ) {

                    $target  = BASE_DIR."assets/images/cliente/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                
                    move_uploaded_file($path, $target);

                    $_SESSION['cadastro'] =  'success';
                    echo "<script>window.location = '../../index.php';</script>";

                } else {

                    $_SESSION['cadastro'] =  'success';
                    echo "<script>window.location = '../../index.php';</script>";

                }

            } else {

                $_SESSION['cadastro'] =  'erro';
                echo "<script>window.location = 'cadastro.php';</script>";

            }
                
        } else {

            echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
                
                      decisao = confirm('CPF informado já existe em nossa base, deseja recuperar seu acesso ?');
                      if (decisao){
                        alert ('Enviamos uma confirmação para o email cadastrado favor verifique e siga as instruçoes enviadas.');
                      } 

                 </SCRIPT>";

        }


    }

    public function editarCliente($dados = null, $aFile = null)
    {
        
        $cliente     = new Cliente();
        $endereco    = new Endereco(); 
        $clienteDAO  = new ClienteDAO();
        $enderecoDAO = new EnderecoDAO();

        $array = explode('/', $_SERVER['REQUEST_URI']);

        $cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if ( isset($aFile['foto']['name']) && !empty($aFile) ) {
            $foto =  $dados['login'] . time('ss') . ".jpg";
            
        } else {
            $foto = $dados['img'];
        }

        $cliente->setIdcliente($dados['idcliente']);
        $cliente->setCpf($cpf);
        $cliente->setNome(ucwords($dados['nome']));
        $cliente->setEmail(strtolower($dados['email']));
        $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));  
        $cliente->setFoto($foto);
        $cliente->setStatus_($dados['status_']); //1=ativo 2=inativo
        
        $cliente->setEndereco($dados['endereco']); 
        $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
        $endereco->setLogradouro(ucwords($dados['logradouro']));
        $endereco->setCidade(ucwords($dados['cidade']));
        $endereco->setBairro(ucwords($dados['bairro']));
        $endereco->setEstado(strtoupper($dados['estado']));
        $endereco->setNumero($dados['numero']);
        $endereco->setComplemento($dados['complemento']);
        
        $result = $clienteDAO->editar($cliente, $endereco);
        
        if ( $result > 0 ) {
            
            if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                $target  = BASE_DIR."assets/images/cliente/" . $foto;
                $tamanho = $aFile['foto']['size'];
                $imagem  = $aFile['foto']['name'];
                $path    = $aFile['foto']['tmp_name'];

                move_uploaded_file($path, $target);
            }

            if ( in_array("admin", $array) ) {

                $_SESSION['cliente-edit'] = 'success';
                echo "<script>window.location = 'listar-clientes.php';</script>";    
            } else {
                $_SESSION['edit'] = 'success';
                echo "<script>window.location = 'perfil.php';</script>";

            }

        } else if (!$result) {

             if( in_array("admin", $array) ) {

                $_SESSION['cliente-edit'] = 'erro';
                $_SESSION['cliente']      = $dados['idcliente'];
                echo "<script>window.location = 'editar-cliente.php';</script>";

             } else {

                $_SESSION['edit'] = 'erro';
                echo "<script>window.location = 'editar.php';</script>";

             }
            
        }

    }

    public function desativarCliente($dados = null)
    {
        
        if ( is_null($dados) ) return false;

        $clienteDAO     = new ClienteDAO();
        
        $result = $clienteDAO->desativar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                $_SESSION['cliente-del'] = 'success';
                echo "<script>window.location = 'listar-clientes.php?v=$v';</script>";    
            } else {

                echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
                echo "<script>window.location = '../../index.php';</script>";
            }

        } else {

           if( in_array("admin", $array) ) {
                $_SESSION['cliente-del'] = 'erro';
                $_SESSION['cliente'] = $dados['idcliente'];
                echo "<script>window.location = 'desativar-cliente.php';</script>";
            } else {
                $_SESSION['del'] = 'erro';
                echo "<script>window.location = 'view/cliente/home.php';</script>";
            }

        }

    }

    public function carregarCliente($idcliente = null)
    {

        $cliente  = new Cliente();
        $cdao     = new ClienteDAO();

        $result   = $cdao->carregar($idcliente);
        
        if($result){
            $cliente->setIdcliente($result[0]['idcliente']); 
            $cliente->setCpf($result[0]['cpf']); 
            $cliente->setNome($result[0]['nome']); 
            $cliente->setEmail($result[0]['email']); 
            $cliente->setFone($result[0]['fone']); 
            $cliente->setLogin($result[0]['login']); 
            $cliente->setFoto($result[0]['foto']); 
            $cliente->setSenha($result[0]['senha']); 
            $cliente->setperfil($result[0]['perfil']); 
            $cliente->setStatus_($result[0]['status_']);     
            $cliente->setEndereco($result[0]['endereco']);

            return $cliente;
        } else {
            return false;
        }

    }

    public function verificarCpf($cpf)
    {

        if ( ClienteDAO::verificarCpf($cpf) ) {
            return true;
        }else{
            return false;
        }

    }

    public function listarCliente()
    {
        $cdao    = new ClienteDAO();
        $list    = $cdao->listar();

        return $list;
    }

    

}

?>