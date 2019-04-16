<?php
	
class ControllerFisico
{
		
	public function cadastrar($dados = null, $aFile = null)
    {

        if ( !isset($dados) ) return false;

        $fisico      = new Fisico();
        $endereco    = new Endereco(); 
        $pagina      = new Pagina();
        $fisicoDAO   = new FisicoDAO();
        $EnderecoDAO = new EnderecoDAO();

        $cpf  = str_replace(".", "", str_replace("-", "", $dados['cpf']));
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (!FisicoDAO::verificaCpf($cpf)) {

            if ( FisicoDAO::validaCpf($cpf) ) {

                $foto =  $dados['login'] . time('ss') . ".jpg";

                $fisico->setCpf($cpf);
                $fisico->setNome(ucwords($dados['nome']));
                $fisico->setDescricao(ucwords($dados['descricao']));
                $fisico->setEmail(strtolower($dados['email']));
                $fisico->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
                $fisico->setFixo(preg_replace("/[^0-9]/", "",$dados['fixo']));
                $fisico->setLogin(strtolower($dados['login']));
                $fisico->setSenha(base64_encode($dados['senha']));
                $fisico->setPerfil(3); // 3=fisico
                $fisico->setFoto($foto);
                $fisico->setStatus(1); //1=ativo 2=inativo

                $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
                $endereco->setLogradouro(ucwords($dados['logradouro']));
                $endereco->setCidade(ucwords($dados['cidade']));
                $endereco->setBairro(ucwords($dados['bairro']));
                $endereco->setEstado(strtoupper($dados['estado']));
                $endereco->setNumero($dados['numero']);
                $endereco->setComplemento($dados['complemento']);

                $pagina->setFacebook($dados['facebook']);
                $pagina->setInstagram($dados['instagram']);
                $pagina->setPinterest($dados['pinterest']);
                $pagina->setTwitter($dados['twitter']);
                $pagina->setGoogle($dados['google']);
                $pagina->setSite($dados['site']);

                $result = $fisicoDAO->cadastrar($fisico, $endereco, $pagina);

                if ( $result > 0 ) { 

                    if ( $aFile['foto']['size'] > 0 ) {

                        $target  = BASE_DIR."assets/images/fisico/" . $foto;
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

                } elseif (!$result) {

                    echo "<script>alert('Houve um erro ao cadastrar fisico.');</script>";
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
        $fisico      = new Fisico();
        $endereco    = new Endereco(); 
        $pagina      = new Pagina();
        $fisicoDAO   = new FisicoDAO();
        $EnderecoDAO = new EnderecoDAO();
        $paginaDAO   = new PaginaDAO();

        $cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        $valida = $fisicoDAO->validaCpf($cpf);

        if($valida) {

            if ( isset($aFile['foto']['name']) && !empty($aFile) ) {
                $foto =  $dados['login'] . time('ss') . ".jpg";
                
            } else {
                $foto = $dados['img'];
            }

            $fisico->setIdfisico($dados['idfisico']);
            $fisico->setCpf($cpf);
            $fisico->setNome(ucwords($dados['nome']));
            $fisico->setDescricao($dados['descricao']);
            $fisico->setEmail(strtolower($dados['email']));
            $fisico->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $fisico->setFixo(preg_replace("/[^0-9]/", "",$dados['fixo']));
            $fisico->setLogin(strtolower($dados['login']));
            if(isset($dados['senha'])){
                $fisico->setSenha(base64_encode($dados['senha']));    
            }
            $fisico->setPerfil(3); // 2=fisico
            $fisico->setFoto($foto);
            $fisico->setStatus(1); //1=ativo 2=inativo
            $fisico->setPagina($dados['pagina']);

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setNumero($dados['numero']);
            $endereco->setComplemento($dados['complemento']);

            $pagina->setFacebook($dados['facebook']);
            $pagina->setInstagram($dados['instagram']);
            $pagina->setPinterest($dados['pinterest']);
            $pagina->setTwitter($dados['twitter']);
            $pagina->setGoogle($dados['google']);
            $pagina->setSite($dados['site']);
            
            $result = $fisicoDAO->editar($fisico,$endereco, $pagina, $id);

            if( $result > 0 ){
                
                if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                    $target  = BASE_DIR."assets/images/fisico/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    //var_dump($aFile);
                    
                    move_uploaded_file($path, $target);                 

                } 

                echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                echo "<script>window.location = 'perfil.php?v=$v';</script>";

            } elseif (!$result) {

                    echo "<script>alert('Houve um erro ao atualizar dados.');</script>";
                    echo "<script>window.location = 'editar.php?v=$v';</script>";

                }

        } else {
            
            echo "<script>alert('CPF informado é invalido');</script>";
            echo "<script>window.location = 'perfil.php?v=$v';</script>";            

        }

    }

    public function desativar($id = null)
    {
        
        if ( is_null($id) ) return false;

        $fisicoDAO     = new fisicoDAO;

        $result = $fisicoDAO->desativarfisico($id);

        if ( $result ) {

            echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
            echo "<script>window.location = '../../index.php';</script>";

        } else {

            echo "<script>alert('Nao foi possivel desativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
            echo "<script>window.location = 'view/fisico/home.php';</script>";

        }

    }

    public function carregarFisico($idfisico)
    {

        $fisico  = new Fisico();
        $fdao     = new FisicoDAO();

        $result  = $fdao->carregar($idfisico);

        $fisico->setIdfisico($result[0]['idfisico']); 
        $fisico->setCpf($result[0]['cpf']); 
        $fisico->setNome($result[0]['nome']); 
        $fisico->setDescricao($result[0]['descricao']); 
        $fisico->setEmail($result[0]['email']); 
        $fisico->setFone($result[0]['fone']); 
        $fisico->setFixo($result[0]['fixo']); 
        $fisico->setLogin($result[0]['login']); 
        $fisico->setFoto($result[0]['foto']); 
        $fisico->setPagina($result[0]['pagina']); 

        return $fisico;

    }

}

?>