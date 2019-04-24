<?php 
    
    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
//    require 'header.php'; 
    require_once '../../config.php';
    
    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente;
    $endereco   = new Endereco;
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $c->editarCliente($dados, $aFile);
        
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
                   
                </div>
            
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php?v=<?=$v;?>">Home</a></li>
                        <li><a href="perfil.php?v=<?=$v;?>">Meu Perfil</a></li>
                        <li><a href="listarsolicitacoes.php?v=<?=$v;?>">Solicitações de Serviços</a></li>
                        <li><a href="servicosaceitos.php?v=<?=$v;?>">Meus Serviços</a></li>
                    </ul>
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

                <input type="hidden" name="v" value="<?=$v;?>" >
                <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                <input type="hidden" name="status" value="<?=$cliente->getStatus();?>">
                <input type="hidden" name="perfil" value="<?=$cliente->getPerfil();?>">
                <input type="hidden" name="login" value="<?=$cliente->getLogin();?>">
                <input type="hidden" name="senha" value="<?=$cliente->getSenha();?>">

                <label class="form-group">Foto para perfil</label>

                <div class="col-sm-6">
                    <input type="hidden" name="img" value="<?=$cliente->getFoto();?>">
                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive img-perfil" alt="Foto Cliente" name="img" id="img">
                </div>
                
                <div class="form-group">
                    <input type="file" name="foto" id="foto" class="form-control" onchange="alterarImagem()">
                </div>

                <label class="form-group">Dados</label>

                <div class="form-group">
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?=$cliente->getCpf();?>" readonly >
                </div>
                <div class="form-group">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?=$cliente->getNome();?>" readonly >
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$cliente->getEmail();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$cliente->getFone();?>" maxlength="15" minlength="15" >
                </div>
                
                <label class="form-group">Endereço</label>

                <div class="form-group">
                    <input type="text" name="cep" id="cep" class="form-control" required="required" placeholder="CEP" value="<?=$endereco->getCep();?>" minlength="9" maxlength="9">
                </div>
                <div class="form-group">
                    <input type="text" name="logradouro" id="logradouro" class="form-control" required="required" placeholder="Logradouro" value="<?=$endereco->getLogradouro();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="cidade" id="cidade" class="form-control" required="required" placeholder="Cidade" value="<?=$endereco->getCidade();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="bairro" id="bairro" class="form-control" required="required" placeholder="Bairro" value="<?=$endereco->getBairro();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="estado" id="estado" class="form-control" required="required" placeholder="Estado" value="<?=$endereco->getEstado();?>" maxlength="2" minlength="2">
                </div>
                <div class="form-group">
                    <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº" value="<?=$endereco->getNumero();?>">
                </div>
                <div class="form-group">
                    <input type="text" name="complemento" id="complemento" class="form-control" placeholder="Quadra, apto ..." value="<?=$endereco->getComplemento();?>">
                </div>

                <label class="form-group">Configuração de acesso</label>

                <div class="form-group">
                    <input type="text" name="login" id="login" class="form-control" required="required" placeholder="Login" value="<?=$cliente->getLogin();?>" minlength="3" >
                </div>
                <div class="form-group">
                    <input type="password" name="senha" id="senha" class="form-control" required="required" placeholder="*********" minlength="5"> 
                    <small>Mínimo de 5 dígitos</small>
                </div>

                <input type="hidden" name="metodo" value="editar">
                <input type="hidden" name="classe" value="Cliente">

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                </div>

                <div class="form-group">
                    <a type="submit" href="desativar.php?v=<?=$v;?>" class="btn btn-btn btn-warning"><i class="fa fa-trash"></i>&nbsp</a>
                    <small>Desativar meu perfil</small>
                </div>

            </form>            

        </div>
    </div>

<?php require_once 'footer.php'; ?>