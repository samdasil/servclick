<?php

class ControllerCliente
{

    public function cadastrarCliente($dados = null, $aFile = null)
    {

        if ( !isset($dados) ) return false;

        $cliente     = new Cliente();
        $endereco    = new Endereco(); 
        $clienteDAO  = new ClienteDAO();
        $enderecoDAO = new EnderecoDAO();

        $cpf  = str_replace(".", "", str_replace("-", "", $dados['cpf']));
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        if (!ClienteDAO::verificaCpf($cpf)) {

            if ( ClienteDAO::validaCpf($cpf) ) {

                $foto =  $dados['login'] . time('ss') . ".jpg";

                $cliente->setCpf($cpf);
                $cliente->setNome(ucwords($dados['nome']));
                $cliente->setEmail(strtolower($dados['email']));
                $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
                $cliente->setLogin(strtolower($dados['login']));
                $cliente->setSenha(base64_encode($dados['senha']));
                $cliente->setPerfil(2); // 2=cliente
                $cliente->setFoto($foto);
                $cliente->setStatus(1); //1=ativo 2=inativo

                $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
                $endereco->setLogradouro(ucwords($dados['logradouro']));
                $endereco->setCidade(ucwords($dados['cidade']));
                $endereco->setBairro(ucwords($dados['bairro']));
                $endereco->setEstado(strtoupper($dados['estado']));
                $endereco->setNumero($dados['numero']);
                $endereco->setComplemento($dados['complemento']);

                $cliente_result = $clienteDAO->cadastrar($cliente, $endereco);

                if ( $cliente_result > 0 ) { 

                    if ( $aFile['foto']['size'] > 0 ) {

                        $target  = BASE_DIR."assets/images/cliente/" . $foto;
                        $tamanho = $aFile['foto']['size'];
                        $imagem  = $aFile['foto']['name'];
                        $path    = $aFile['foto']['tmp_name'];
                        
                        if ( move_uploaded_file($path, $target) ) {

                            echo "<script>alert('Seu cadastro foi efetuado com sucesso!');</script>";
                            echo "<script>window.location = '../../index.php';</script>";

                        } else {

                            echo "<script>alert('Ocorreu um erro ao salvar a foto, mas seu cadastro foi realizado!');</script>";
                            echo "<script>window.location = '../../index.php';</script>";

                        }

                    } else {

                        echo "Imagem não setada";
                        //exit;

                    }

                } elseif (!$cliente_result) {

                    echo "<script>alert('Houve um erro ao cadastrar cliente.');</script>";
                    echo "<script>window.location = 'cadastro.php';</script>";

                }
                
            } else {
                
                echo "<script>alert('CPF informado é invalido');</script>";
                echo "<script>window.location = 'cadastro.php';</script>";            

            }

        } else {

            //echo "<script>alert('CPF informado já existe em nossa base, deseja recuperar deu cadastro ?');</script>";
            //echo "<script>window.location = 'cadastro.php';</script>";            

            echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
                
                  decisao = confirm('CPF informado já existe em nossa base deseja recuperar deu cadastro ?');
                  if (decisao){
                    alert ('Enviamos uma confirmação para o email cadastrado favor verifique e siga as instruçoes enviadas.');
                  } 

                 </SCRIPT>";
            
            //echo "<script>window.location = 'cadastro.php';</script>";            

        }


    }

    public function editarCliente($dados = null, $aFile = null)
    {

        $v           = $dados['v'];
        $cliente     = new Cliente;
        $endereco    = new Endereco; 
        $clienteDAO  = new ClienteDAO;
        $EnderecoDAO = new EnderecoDAO;

        $cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        $valida = $clienteDAO->validaCpf($cpf);

        if($valida) {

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
            $cliente->setLogin(strtolower($dados['login']));
            if(isset($dados['senha'])){
                $cliente->setSenha(base64_encode($dados['senha']));    
            }
            $cliente->setPerfil($dados['perfil']); // 2=cliente
            $cliente->setFoto($foto);
            $cliente->setStatus($dados['status']); //1=ativo 2=inativo

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setNumero($dados['numero']);
            $endereco->setComplemento($dados['complemento']);
            
            $result = $clienteDAO->editar($cliente,$endereco);
            
            if( $result > 0 ){
                
                if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                    $target  = BASE_DIR."assets/images/cliente/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    
                    $array = explode('/', $_SERVER['REQUEST_URI']);
                    
                   if( in_array("admin", $array) ) {

                        echo "<script>alert('Cliente atualizado com sucesso!');</script>";
                        echo "<script>window.location = 'listar-clientes.php?v=$v';</script>";    
                    }                 

                }

                echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
                echo "<script>window.location = 'perfil.php?v=$v';</script>";

            } else if (!$result) {
                
                echo "<script>alert('Houve um erro ao atualizar cliente.');</script>";
                echo "<script>window.location = 'editar-cliente.php?v=$v&get=".$dados['idcliente']."';</script>";
            }

        } else {
            
            echo "<script>alert('CPF informado é invalido');</script>";
            echo "<script>window.location = 'editar-cliente.php?v=$v&get=".$dados['idcliente']."';</script>";

        }

    }

    public function desativarCliente($dados = null)
    {
        $v             = $dados['v'];
        
        if ( is_null($dados) ) return false;

        $clienteDAO     = new ClienteDAO();
        
        $result = $clienteDAO->desativar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {


            if( in_array("admin", $array) ) {

                echo "<script>alert('Cliente desativado com sucesso! ');</script>";
                echo "<script>window.location = 'listar-clientes.php?v=$v';</script>";    
            }

            echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
            echo "<script>window.location = '../../index.php';</script>";

        } else {

            echo "<script>alert('Nao foi possivel desativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
            echo "<script>window.location = 'view/cliente/home.php';</script>";

        }

    }

    public function carregarCliente($idcliente)
    {

        $cliente  = new Cliente();
        $cdao     = new ClienteDAO();

        $result  = $cdao->carregar($idcliente);

        $cliente->setIdcliente($result[0]['idcliente']); 
        $cliente->setCpf($result[0]['cpf']); 
        $cliente->setNome($result[0]['nome']); 
        $cliente->setEmail($result[0]['email']); 
        $cliente->setFone($result[0]['fone']); 
        $cliente->setLogin($result[0]['login']); 
        $cliente->setFoto($result[0]['foto']); 
        $cliente->setSenha($result[0]['senha']); 
        $cliente->setperfil($result[0]['perfil']); 
        $cliente->setStatus($result[0]['status_']); 

        return $cliente;

    }

    public function verificaCpf($cpf)
    {

        if ( ClienteDAO::verificaCpf($cpf) ) {
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