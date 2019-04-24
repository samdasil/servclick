<?php
	
class ControllerFisico
{
		
	public function cadastrarFisico($dados = null, $aFile = null)
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
                $fisico->setStatus(3); //1=ativo 2=inativo 3=pendente

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

    public function editarFisico($dados = null, $aFile = null)
    {

        $v           = $dados['v'];
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
            $fisico->setSenha(base64_encode($dados['senha']));
            $fisico->setPerfil($dados['perfil']); // 2=fisico
            $fisico->setFoto($foto);
            $fisico->setStatus($dados['status']); //1=ativo 2=inativo 3 pendente
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
            
            $result = $fisicoDAO->editar($fisico,$endereco, $pagina);
            
            if( $result > 0 ){
                
                if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                    $target  = BASE_DIR."assets/images/fisico/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    
                    $array = explode('/', $_SERVER['REQUEST_URI']);
                    
                    if(move_uploaded_file($path, $target)){

                        if( in_array("admin", $array) ) {

                            echo "<script>alert('Profissional atualizado com sucesso! ');</script>";
                            echo "<script>window.location = 'gerenciar-fisico.php?v=$v';</script>";    
                        }

                    }

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

    public function desativarFisico($dados = null)
    {
        
        $v             = $dados['v'];

        if ( is_null($dados) ) return false;

        $fisicoDAO     = new fisicoDAO;

        $result = $fisicoDAO->desativar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                echo "<script>alert('Profissional desativado com sucesso! ');</script>";
                echo "<script>window.location = 'gerenciar-fisico.php?v=$v';</script>";    
            }

            echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
            echo "<script>window.location = '../../index.php';</script>";

        } else {

            echo "<script>alert('Nao foi possivel desativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
            echo "<script>window.location = 'view/fisico/home.php';</script>";

        }

    }

    public function carregarFisico($idfisico = null)
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
        $fisico->setSenha($result[0]['senha']); 
        $fisico->setFoto($result[0]['foto']); 
        $fisico->setPagina($result[0]['pagina']); 
        $fisico->setStatus($result[0]['status_']); 
        $fisico->setPerfil($result[0]['perfil']); 

        return $fisico;

    }

    public function listarFisico()
    {
        $fdao    = new FisicoDAO();
        $list    = $fdao->listar();

        return $list;
    }

    public function listarNovoFisico()
    {
        $fdao    = new FisicoDAO();
        $list    = $fdao->listarNovo();

        return $list;
    }

    public function validarFisico($dados = null)
    {
        
        $v             = $dados['v'];

        if ( is_null($dados) ) return false;

        $fisicoDAO     = new fisicoDAO;

        $result = $fisicoDAO->validar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                echo "<script>alert('Profissional ativado com sucesso! ');</script>";
                echo "<script>window.location = 'gerenciar-fisico.php?v=$v';</script>";    
            }

        } else {

            echo "<script>alert('Nao foi possivel ativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
            echo "<script>window.location = 'gerenciar-fisico.php?v=$v';</script>";    

        }

    }

}

?>