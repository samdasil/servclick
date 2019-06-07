    <?php
	
class ControllerJuridico
{
		
	public function cadastrarJuridico($dados = null, $aFile = null)
    {

        if ( !isset($dados) || UsuarioDAO::verificarLogin($dados['login']) ) return 0;
        
        $juridico    = new Juridico();
        $endereco    = new Endereco(); 
        $area        = new AreaAtuacao();
        $pagina      = new Pagina();
        $juridicoDAO = new JuridicoDAO();
        $EnderecoDAO = new EnderecoDAO();
        $areaDAO     = new AreaAtuacaoDAO();
        $paginaDAO   = new PaginaDAO();
        
        $array = explode('/', $_SERVER['REQUEST_URI']);


        $cnpj  = str_replace("/", "", str_replace(".", "", str_replace("-", "", $dados['cnpj'])));
        $cnpj  = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        if (!JuridicoDAO::verificaCnpj($cnpj)) {

            $foto =  $dados['login'] . time('ss') . ".jpg";

            $juridico->setCnpj($cnpj);
            $juridico->setRazaosocial(ucwords($dados['razaosocial']));
            $juridico->setNomefantasia(ucwords($dados['nomefantasia']));
            $juridico->setResponsavel(ucwords($dados['responsavel']));
            $juridico->setDescricao(ucwords($dados['descricao']));
            $juridico->setEmail(strtolower($dados['email']));
            $juridico->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $juridico->setFixo(preg_replace("/[^0-9]/", "",$dados['fixo']));
            $juridico->setLogin(strtolower($dados['login']));
            $juridico->setSenha(md5($dados['senha']));
            $juridico->setPerfil(3); // 3=juridico
            $juridico->setFoto($foto);
            $juridico->setStatus_(3); //1=ativo 2=inativo 3=pendente
            $juridico->setArea($dados['area']);

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
            
            $result = $juridicoDAO->cadastrar($juridico, $endereco, $pagina);

            if ( $result > 0 ) { 

                if ( $aFile['foto']['size'] > 0 ) {

                    $target  = BASE_DIR."assets/images/juridico/" . $foto;
                    $tamanho = $aFile['foto']['size'];
                    $imagem  = $aFile['foto']['name'];
                    $path    = $aFile['foto']['tmp_name'];

                    move_uploaded_file($path, $target);

                    if( in_array("admin", $array) ) {
                        $_SESSION['juridico-cad'] =  'success';
                        echo "<script>window.location = 'gerenciar-juridico.php';</script>";    
                    } else {
                        $_SESSION['cadastro'] =  'success';
                        echo "<script>window.location = '../../index.php';</script>";
                    }

                } else {

                    if( in_array("admin", $array) ) {
                        $_SESSION['juridico-cad'] =  'erro';
                        echo "<script>window.location = 'gerenciar-juridico.php';</script>"; 
                    } else {
                        $_SESSION['cadastro'] =  'erro';
                        echo "<script>window.location = '../../index.php';</script>";
                    }

                }

            } else {

                if( in_array("admin", $array) ) {
                    $_SESSION['juridico-cad'] =  'erro';
                    echo "<script>window.location = 'gerenciar-juridico.php';</script>";
                } else {
                    $_SESSION['juridico-cad'] =  'erro';
                    echo "<script>window.location = 'cadastro.php';</script>";
                }
            }
 
        } else {       

            echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>
                
                  decisao = confirm('CNPJ informado já existe em nossa base deseja recuperar seu acesso ?');
                  if (decisao){
                    alert ('Enviamos uma confirmação para o email cadastrado favor verifique e siga as instruções enviadas.');
                  } 

                 </SCRIPT>";
        }

    }

    public function desativarJuridico($dados = null)
    {
        $v             = $dados['v'];

        if ( is_null($dados) ) return false;

        $juridicoDAO     = new JuridicoDAO;

        $result = $juridicoDAO->desativar($dados);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                echo "<script>alert('Profissional desativado com sucesso! ');</script>";
                echo "<script>window.location = 'gerenciar-juridico.php?v=$v';</script>";    
            } else {
                echo "<script>alert('Seu cadastro foi desativado com sucesso! Para resgatar entre em contato com a equipe do ServClick. Agradecemos pelo tempo que passamos juntos.');</script>";
                echo "<script>window.location = '../../index.php';</script>";
            }

            
        } else {

            if( in_array("admin", $array) ) {
                echo "<script>alert('Nao foi possivel desativar o perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
                echo "<script>window.location = 'desativar-juridico.php?v=$v&get=".$dados['idjuridico']."';</script>";
            } else {
                echo "<script>alert('Nao foi possivel desativar seu perfil, ocorreu um erro. Favor entre em contato com o suporte.');</script>";
                echo "<script>window.location = 'view/juridico/home.php?v=$v';</script>";
            }
        }

    }

    public function carregarJuridico($idjuridico)
    {

        $juridico  = new Juridico();
        $jdao      = new JuridicoDAO();

        $result  = $jdao->carregar($idjuridico);

        if($result){
            $juridico->setIdjuridico($result[0]['idjuridico']); 
            $juridico->setCnpj($result[0]['cnpj']); 
            $juridico->setRazaosocial($result[0]['razaosocial']); 
            $juridico->setNomefantasia($result[0]['nomefantasia']); 
            $juridico->setResponsavel($result[0]['responsavel']); 
            $juridico->setDescricao($result[0]['descricao']); 
            $juridico->setEmail($result[0]['email']); 
            $juridico->setFone($result[0]['fone']); 
            $juridico->setFixo($result[0]['fixo']); 
            $juridico->setLogin($result[0]['login']); 
            $juridico->setSenha($result[0]['senha']); 
            $juridico->setFoto($result[0]['foto']); 
            $juridico->setPagina($result[0]['pagina']); 
            $juridico->setStatus_($result[0]['status_']); 
            $juridico->setPerfil($result[0]['perfil']); 
            $juridico->setArea($result[0]['area']); 
            $juridico->setEndereco($result[0]['endereco']); 
        
        return $juridico;
        } else {
            return false;
        }

    }

    public function editarJuridico($dados = null, $aFile = null)
    {

        $v           = $dados['v'];
        $juridico    = new Juridico();
        $endereco    = new Endereco(); 
        $pagina      = new Pagina();
        $juridicoDAO = new JuridicoDAO();
        $EnderecoDAO = new EnderecoDAO();
        $paginaDAO   = new PaginaDAO();
        $array = explode('/', $_SERVER['REQUEST_URI']);

        //$cpf  = preg_replace("/[^0-9]/", "", $dados['cpf']);
        //$cpf  = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        //$valida = $juridicoDAO->validaCpf($cpf);

        //if($valida) {
            

            if ( isset($aFile['logo']['name']) && !empty($aFile) ) {
                $logo =  $dados['login'] . time('ss') . ".jpg";
            } else {
                $logo = $dados['img'];
            }

            $juridico->setIdjuridico($dados['idjuridico']);
            $juridico->setCnpj($dados['cnpj']);
            $juridico->setRazaosocial(ucwords($dados['razaosocial']));
            $juridico->setNomefantasia(ucwords($dados['nomefantasia']));
            $juridico->setResponsavel(ucwords($dados['responsavel']));
            $juridico->setDescricao(ucwords($dados['descricao']));
            $juridico->setEmail(strtolower($dados['email']));
            $juridico->setFone(preg_replace("/[^0-9]/", "",$dados['fone']));
            $juridico->setFixo(preg_replace("/[^0-9]/", "",$dados['fixo']));
            $juridico->setLogin(strtolower($dados['login']));
            $juridico->setSenha(base64_encode($dados['senha']));
            $juridico->setPerfil($dados['perfil']); // 3=juridico
            $juridico->setLogo($logo);
            $juridico->setStatus($dados['status']); //1=ativo 2=inativo
            $juridico->setPagina($dados['pagina']);        

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
            
            $result = $juridicoDAO->editar($juridico, $endereco, $pagina);

            if( $result > 0 ){
                
                if ( isset($aFile['logo']['name']) && !empty($aFile) ) {

                    $target  = BASE_DIR."assets/images/juridico/" . $logo;
                    $tamanho = $aFile['logo']['size'];
                    $imagem  = $aFile['logo']['name'];
                    $path    = $aFile['logo']['tmp_name'];

                    move_uploaded_file($path, $target);

                }

                if( in_array("admin", $array) ) {
                    echo "<script>alert('Profissional atualizado com sucesso! ');</script>";
                    echo "<script>window.location = 'gerenciar-juridico.php?v=$v';</script>";    
                } else {
                    echo "<script>alert('Seu cadastro foi atualizado com sucesso!');</script>";
                    echo "<script>window.location = 'perfil.php?v=$v';</script>";  
                }

            } elseif (!$result) {

                 if( in_array("admin", $array) ) {

                    echo "<script>alert('Houve um erro ao atualizar dados.');</script>";
                    echo "<script>window.location = 'editar-juridico.php?v=$v&get=".$dados['idjuridico']."';</script>";
                }else{
                    echo "<script>alert('Houve um erro ao atualizar dados.');</script>";
                    echo "<script>window.location = 'perfil.php?v=$v';</script>";
                }
            }

        /*} else {
            
            echo "<script>alert('CPF informado é invalido');</script>";
            echo "<script>window.location = 'perfil.php?v=$v';</script>";            

        }*/

    }

    public function listarPorArea($idarea)
    {
        $jdao    = new JuridicoDAO();
        $list    = $jdao->listarPorArea($idarea);
 
        return $list;
    }

    public function listarPendentes()
    {
        $jdao    = new JuridicoDAO();
        $list    = $jdao->listarPendentes();

        return $list;
    }

    public function listarTodos()
    {
        $jdao    = new JuridicoDAO();
        $list    = $jdao->listarTodos();

        return $list;
    }

    public function validarJuridico($idjuridico = null)
    {

        if ( is_null($idjuridico) ) return false;

        $juridicoDAO     = new JuridicoDAO();

        $result = $juridicoDAO->validar($idjuridico);

        $array = explode('/', $_SERVER['REQUEST_URI']);

        if ( $result ) {

            if( in_array("admin", $array) ) {

                $_SESSION['ativar'] = 'success';
                echo "<script>window.location = 'gerenciar-juridico.php';</script>";    
            }

        } else {

            $_SESSION['ativar'] = 'erro';
            echo "<script>window.location = 'gerenciar-juridico.php';</script>";    

        }
    }

}

?>