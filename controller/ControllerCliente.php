<?php

class ControllerCliente
{

    public function cadastrar($dados = null, $aFile = null)
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

    public function editar($dados = null, $id = null, $aFile = null)
    {

        $v = base64_encode($id);
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

            $cliente->setCpf($cpf);
            $cliente->setNome(ucwords($dados['nome']));
            $cliente->setEmail(strtolower($dados['email']));
            $cliente->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $cliente->setLogin(strtolower($dados['login']));
            if(isset($dados['senha'])){
                $cliente->setSenha(base64_encode($dados['senha']));    
            }
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
            
            $result = $clienteDAO->editar($cliente,$endereco, $id);
            
            if( $result > 0 ){
                
                if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                    $target  = BASE_DIR."assets/images/cliente/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    //var_dump($aFile);
                    
                    move_uploaded_file($path, $target);                 

                }

                echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                echo "<script>window.location = 'perfil.php?v=$v';</script>";

            } else if ($result === false) {
                
                echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                echo "<script>window.location = 'perfil.php?v=$v';</script>";
                                
            } else {
                $erro = str_replace("'"," ",$result);
                //exit;
                echo "<script>alert('Erro ao atualizar: ".$erro."');</script>";
                echo "<script>window.location = 'editar.php?v=$v';</script>";

            }

        } else {
            
            echo "<script>alert('CPF informado eh invalido');</script>";
            echo "<script>window.location = 'perfil.php?v=$v';</script>";            

        }

    }

    public function desativar($id = null)
    {
        
        if ( is_null($id) ) return false;

        $clienteDAO     = new ClienteDAO;

        $result = $clienteDAO->desativarCliente($id);

        if ( $result ) {

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

        $cliente->setCpf($result[0]['cpf']); 
        $cliente->setNome($result[0]['nome']); 
        $cliente->setEmail($result[0]['email']); 
        $cliente->setFone($result[0]['fone']); 
        $cliente->setLogin($result[0]['login']); 
        $cliente->setFoto($result[0]['foto']); 

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

}

?>