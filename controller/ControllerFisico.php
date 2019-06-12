<?php
	
class ControllerFisico
{
		
	public function cadastrarFisico($dados = null, $aFile = null)
    {

        if ( !isset($dados) || UsuarioDAO::verificarLogin($dados['login']) ) return 0;

        $fisico      = new Fisico();
        $endereco    = new Endereco(); 
        $area        = new AreaAtuacao();
        $pagina      = new Pagina();
        $fisicoDAO   = new FisicoDAO();
        $EnderecoDAO = new EnderecoDAO();
        $areaDAO     = new AreaAtuacaoDAO();
        $paginaDAO   = new PaginaDAO();
        
        $array = explode('/', $_SERVER['REQUEST_URI']);

        $cpf  = str_replace(".", "", str_replace("-", "", $dados['cpf']));
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (!FisicoDAO::verificarCpf($cpf)) {

            $foto =  $dados['login'] . time('ss') . ".jpg";

            $fisico->setCpf($cpf);
            $fisico->setNome(ucwords($dados['nome']));
            $fisico->setDescricao(ucwords($dados['descricao']));
            $fisico->setEmail(strtolower($dados['email']));
            $fisico->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $fisico->setFixo(preg_replace("/[^0-9]/", "",$dados['fixo']));
            $fisico->setLogin(strtolower($dados['login']));
            $fisico->setSenha(md5($dados['senha']));
            $fisico->setPerfil(3); // 3=fisico
            $fisico->setFoto($foto);
            $fisico->setStatus_(3); //1=ativo 2=inativo 3=pendente
            $fisico->setArea($dados['area']);

            $endereco->setCep(preg_replace("/[^0-9]/", "", $dados['cep']));
            $endereco->setLogradouro(ucwords($dados['logradouro']));
            $endereco->setCidade(ucwords($dados['cidade']));
            $endereco->setBairro(ucwords($dados['bairro']));
            $endereco->setEstado(strtoupper($dados['estado']));
            $endereco->setNumero($dados['numero']);
            $endereco->setComplemento($dados['complemento']);

            $pagina->setFacebook(strtolower($dados['facebook']));
            $pagina->setInstagram(strtolower($dados['instagram']));
            $pagina->setPinterest(strtolower($dados['pinterest']));
            $pagina->setTwitter(strtolower($dados['twitter']));
            $pagina->setGoogle(strtolower($dados['google']));
            $pagina->setSite(strtolower($dados['site']));
            
            $result = $fisicoDAO->cadastrar($fisico, $endereco, $pagina);

            if ( $result > 0 ) { 

                if ( $aFile['foto']['size'] > 0 ) {

                    $target  = BASE_DIR."assets/images/fisico/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];
                    
                    move_uploaded_file($path, $target);

                    if( in_array("admin", $array) ) {
                        $_SESSION['fisico-cad'] =  'success';
                        echo "<script>window.location = 'gerenciar-fisico.php';</script>";    
                    } else {
                        $_SESSION['cadastro'] =  'success';
                        echo "<script>window.location = '../../index.php';</script>";
                    }

                } else {

                    if( in_array("admin", $array) ) {
                        $_SESSION['fisico-cad'] =  'erro';
                        echo "<script>window.location = 'gerenciar-fisico.php';</script>"; 
                    } else {
                        $_SESSION['cadastro'] =  'erro';
                        echo "<script>window.location = '../../index.php';</script>";
                    }

                }

            } else {

                if( in_array("admin", $array) ) {
                    $_SESSION['fisico-cad'] =  'erro';
                    echo "<script>window.location = 'gerenciar-fisico.php';</script>";
                } else {
                    $_SESSION['fisico-cad'] =  'erro';
                    echo "<script>window.location = 'cadastro.php';</script>";
                }
            }

        } else {

            echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
                
                  decisao = confirm('CPF informado já existe em nossa base deseja recuperar seu acesso ?');
                  if (decisao){
                    alert ('Enviamos uma confirmação para o email cadastrado favor verifique e siga as instruções enviadas.');
                  } 

                 </SCRIPT>";

        }

    }

    public function editarFisico($dados = null, $aFile = null)
    {
        
        $fisico      = new Fisico();
        $endereco    = new Endereco(); 
        $area        = new AreaAtuacao();
        $pagina      = new Pagina();
        $fisicoDAO   = new FisicoDAO();
        $EnderecoDAO = new EnderecoDAO();
        $paginaDAO   = new PaginaDAO();
        $areaDAO     = new AreaAtuacaoDAO();

        $array = explode('/', $_SERVER['REQUEST_URI']);

        $cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        $cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

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
        $fisico->setFoto($foto);
        $fisico->setStatus_($dados['status_']); //1=ativo 2=inativo 3 pendente
        $fisico->setPagina($dados['pagina']);
        $fisico->setArea($dados['area']);
        $fisico->setEndereco($dados['endereco']);

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
        
        $result = $fisicoDAO->editar($fisico, $endereco, $pagina);
        
        if( $result > 0 ){
            
            if ( isset($aFile['foto']['name']) && !empty($aFile) ) {

                $target  = BASE_DIR."assets/images/fisico/" . $foto;
                $tamanho = $aFile['foto']['size'];
                $imagem  = $aFile['foto']['name'];
                $path    = $aFile['foto']['tmp_name'];
                
                move_uploaded_file($path, $target);
            }

            if( in_array("admin", $array) ) {

                $_SESSION['profissional-edit'] = 'success';
                echo "<script>window.location = 'gerenciar-fisico.php';</script>";    
            } else {
                $_SESSION['edit'] = 'success';
                echo "<script>window.location = 'perfil.php';</script>";
            }

        } elseif (!$result) {

            if( in_array("admin", $array) ) {
                $_SESSION['fisico-edit'] = 'erro';
                $_SESSION['fisico']      = $dados['idfisico'];
                echo "<script>window.location = 'validar-fisico.php';</script>";
            } else {
                $_SESSION['edit'] = 'erro';
                echo "<script>window.location = 'perfil.php';</script>";
            }
        }

    }

    public function desativarFisico($dados = null)
    {

        if ( is_null($dados) ) return false;

        $fisicoDAO     = new fisicoDAO;

        $result = $fisicoDAO->desativar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                $_SESSION['fisico-del'] = 'success';
                echo "<script>window.location = 'gerenciar-fisico.php';</script>";    

            } else {

                echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
                echo "<script>window.location = '../../index.php';</script>";
            }
          
        } else {

            if( in_array("admin", $array) ) {
                $_SESSION['fisico-del'] = 'erro';
                $_SESSION['fisico'] = $dados['idfisico'];
                echo "<script>window.location = 'desativar-fisico.php';</script>";
            } else {
                $_SESSION['del'] = 'erro';
                echo "<script>window.location = 'view/fisico/home.php';</script>";
            }
        }

    }

    public function carregarFisico($idfisico = null)
    {

        $fisico   = new Fisico();
        $fdao     = new FisicoDAO();

        $result   = $fdao->carregar($idfisico);

        if($result){
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
            $fisico->setArea($result[0]['area']); 
            $fisico->setStatus_($result[0]['status_']); 
            $fisico->setPerfil($result[0]['perfil']); 
            $fisico->setArea($result[0]['area']); 
            $fisico->setEndereco($result[0]['endereco']); 

            return $fisico;
        } else {
            return false;
        }

    }

    public function listarPorArea($idarea)
    {
        $fdao    = new FisicoDAO();
        $list    = $fdao->listarPorArea($idarea);
 
        return $list;
    }

    public function listarPendentes()
    {
        $fdao    = new FisicoDAO();
        $list    = $fdao->listarPendentes();

        return $list;
    }

    public function listarTodos()
    {
        $fdao    = new FisicoDAO();
        $list    = $fdao->listarTodos();

        return $list;
    }

    public function validarFisico($dados = null)
    {

        if ( is_null($dados) ) return false;
        //print_r($dados);exit;
        $fisicoDAO     = new fisicoDAO;

        $result = $fisicoDAO->validar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            $_SESSION['ativar'] = 'success';
            echo "<script>window.location = 'gerenciar-fisico.php';</script>";    

        } else {

            $_SESSION['ativar'] = 'erro';
            echo "<script>window.location = 'gerenciar-fisico.php';</script>";    

        }

    }

}

?>