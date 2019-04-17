<?php 
    
    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
//    require 'header.php'; 
    require_once '../../config.php';
    
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $juridico   = $j->carregarJuridico($id);
    $endereco   = $e->carregarEnderecoJuridico($id);
    $pagina     = $p->carregarPagina($juridico->getPagina());

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $j->editar($dados, $id, $aFile);
        
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>servClick</title>
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../assets/css/lightbox.css" rel="stylesheet"> 
    <link href="../../assets/css/animate.min.css" rel="stylesheet"> 
    <link href="../../assets/css/main.css" rel="stylesheet">
    <link href="../../assets/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="../../assets/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
    <!--<script type="text/javascript" src="../../assets/js/buscaCep.js"></script>-->
    
    <script type="text/javascript">
        function alterarImagem() {
            
            var input = document.getElementById("foto");
            var fReader = new FileReader();
            fReader.readAsDataURL(input.files[0]);
            fReader.onloadend = function(event){
                var img = document.getElementById("img");
                img.src = event.target.result;
            //document.form.img.src = document.form.foto.files[0].name;   
            }

        }

    </script>

    <!-- script mask -->
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cpf").mask('000.000.000-00')
            $("#cep").mask('00000-000')
            $("#fone").mask('(00) 00000-0000')
            $("#fixo").mask('(00) 0000-0000')
        })

    </script>
</head>
<body>
    <header id="header">      
        <!--
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
    -->
        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    <div class="topo">
                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                    </div>
                    <!--
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    -->
                    <!--
                    <a class="navbar-brand" href="index.html">
                        <h1><img src="../../assets/images/logo.png" alt="logo"></h1>
                    </a>
                    -->
                </div>
                    
            </div>
        </div>
    </header>

    <div class="col-md-4 col-sm-12">
        <div class="contact-form bottom">

            <h2>Alguns campos não podem ser alterados</h2>
            <h5>Caso queira, contacte o administrador</h5>
            <br>

            <form name="form" method="post" action="" enctype="multipart/form-data">
                
                <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                <input type="hidden" name="pagina" value="<?=$juridico->getPagina();?>">

                <label class="form-group">Logo da Empresa</label>

                <div class="col-sm-6">
                    <input type="hidden" name="img" value="<?=$juridico->getLogo();?>">
                    <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-responsive" alt="Logo da Empresa" name="img" id="img">
                </div>
                
                <div class="form-group">
                    <input type="file" name="foto" id="foto" class="form-control" onchange="alterarImagem()">
                </div>


                <label class="form-group">Dados</label>
                
                <div class="form-group">
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required="required" placeholder="CNPJ" autocomplete="off" maxlength="18" minlength="18" value="<?=$juridico->getCnpj();?>" readonly>
                </div>
                <div class="form-group">
                    <input type="text" name="razaosocial" class="form-control" required="required" placeholder="Razão Social" autocomplete="off"  value="<?=$juridico->getRazaosocial();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="nomefantasia" class="form-control" required="required" placeholder="Nome Fantasia" autocomplete="off"  value="<?=$juridico->getNomefantasia();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="responsavel" class="form-control" required="required" placeholder="responsavel" autocomplete="off" value="<?=$juridico->getResponsavel();?>">
                </div>
                <div class="form-group">
                    <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho"> <?=$juridico->getDescricao();?>></textarea>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off" value="<?=$juridico->getEmail();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15" value="<?=$juridico->getFone();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14" value="<?=$juridico->getFixo();?>">
                </div>

                <label class="form-group">Endereço</label>

                <div class="form-group">
                    <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9" value="<?=$endereco->getCep();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off" value="<?=$endereco->getLogradouro();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off" value="<?=$endereco->getCidade();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off" value="<?=$endereco->getBairro();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off" value="<?=$endereco->getEstado();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="numero" class="form-control" placeholder="Nº" autocomplete="off" value="<?=$endereco->getNumero();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off" value="<?=$endereco->getComplemento();?>">
                </div>

                <label class="form-group">Páginas e websites <small>(url)</small></label>

                <div class="form-group">
                    <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?=$pagina->getFacebook();?>">
                </div>
                
                <div class="form-group">
                    <input type="url" name="instagram" class="form-control"  placeholder="Instagram" value="<?=$pagina->getInstagram();?>">
                </div>

                <div class="form-group">
                    <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest" value="<?=$pagina->getPinterest();?>">
                </div>

                <div class="form-group">
                    <input type="url" name="twitter" class="form-control"  placeholder="Twitter" value="<?=$pagina->getTwitter();?>">
                </div>

                <div class="form-group">
                    <input type="url" name="google" class="form-control"  placeholder="Google" value="<?=$pagina->getGoogle();?>">
                </div>

                <div class="form-group">
                    <input type="url" name="site" class="form-control"  placeholder="Site" value="<?=$pagina->getSite();?>">
                </div>

                <label class="form-group">Configuração de acesso</label>

                <div class="form-group">
                    <input type="text" name="login" class="form-control" required="required" placeholder="Login" autocomplete="off" minlength="3" maxlength="15" value="<?=$juridico->getLogin();?>">
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" required="required" placeholder="*********" autocomplete="off" minlength="5">
                    <small>Mínimo de 5 dígitos</small>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                </div>

                
                <div class="form-group">
                    <a type="submit" href="desativar.php?v=<?=$v;?>" class="btn btn-btn btn-warning"><i class="fa fa-trash"></i>&nbsp</a>
                    <small>Desativar meu perfil</small>
                </div>

            </form>
        </div>
    </div>

<?php require_once 'footer.php'; ?>