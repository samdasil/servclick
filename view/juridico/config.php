<?php
    
    /*if(!session_start()) session_start();
    if(!isset($_SESSION['idcliente'])){
        header('Location: ../../index.php');
    }*/
    if(!isset($_GET['v'])) {
        header('Location: ../../index.php');
    }

    require_once '../../config.php';

    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $u          = new ControllerUsuario();
    $juridico   = new Juridico();
    $endereco   = new Endereco();
    $usuario    = new Usuario();
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $juridico   = $j->carregarJuridico($id);
    $endereco   = $e->carregarEnderecoJuridico($id);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){
        
        $dados  = $_POST;

        $u->editarUsuario($dados);
        
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
    
</head>
<body>
    <header id="header">      
       
        <div class="navbar navbar-inverse" role="banner">
            
            <div class="container">
                
                <div class="navbar-header">
                    <div class="topo">
                        <a class="arrow" href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                        <div class="topo-arrow">
                            <label>Configuração de acesso</label>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </header>


<div class="col-md-4 col-sm-12">
        <div class="contact-form bottom">
            <form name="form" method="post" action="" enctype="multipart/form-data">

                <input type="hidden" name="v" value="<?=$v;?>" >
                <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                <input type="hidden" name="perfil" value="<?=$juridico->getPerfil();?>">

                <div class="col-sm-6">
                    <img src="../../assets/images/portfolio/cadeado.png" class="img-responsive" alt="Foto Cliente" name="img" id="img">
                    <br>
                </div>

                <div class="form-group">
                    <input type="text" name="login" id="login" class="form-control" required="required" placeholder="Login" value="<?=$juridico->getLogin();?>" minlength="3" >
                </div>
                <div class="form-group">
                    <input type="password" name="senha" id="senha" class="form-control" required="required" placeholder="Nova senha" minlength="5"> 
                    <small>Mínimo de 5 dígitos</small>
                </div>

                <div class="form-group">
                    <input type="password" name="senha2" id="senha2" class="form-control" required="required" placeholder="Confirmar senha" minlength="5"> 
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
                </div>

            </form>           

<?php require_once 'footer.php'; ?>