<?php

    include '../../config.php';

    $controller = new ControllerJuridico();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) || isset($_GET) && !empty($_GET)){

        if((isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {
            
            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $controller->cadastrar($dados, $aFile);
        
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
        <link rel="shortcut icon" href="../../assets/images/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../../assets/images/ico/apple-touch-icon-57-precomposed.png">
        <script type="text/javascript">var switchTo5x=true;</script>
        <script type="text/javascript" src="../../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="../../assets/js/buscaCep.js"></script>
        <script type="text/javascript" src="../../assets/js/funcoes.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cnpj").mask('00.000.000/0001-00')
                $("#cep").mask('00000-000')
                $("#fone").mask('(00) 00000-0000')
                $("#fixo").mask('(00) 0000-0000')
            });

            function alterarImagem() {
            
                var input = document.getElementById("logo");
                var fReader = new FileReader();
                fReader.readAsDataURL(input.files[0]);
                fReader.onloadend = function(event){
                    var img = document.getElementById("img");
                    img.src = event.target.result;
                //document.form.img.src = document.form.logo.files[0].name;   
                }

            }

        </script>
    </head>

<body>
    <!-- botao voltar do header-->
    <header id="header">      
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <div class="topo">
                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                    </div>
                </div>    
            </div>
        </div>
    </header>
    <!-- /botao voltar do header-->

    <div class="col-md-4 col-sm-12">
        <div class="contact-form bottom">
            <h2>Bem vindo à nossa página de cadastro!</h2>
            <h5>Aumente seu leque de clientes criando seu perfil</h5>
            <h5>Ajude-nos a divulgar seu trabalho!</h5>
            <br>
            <form name="form" method="post" action="" enctype="multipart/form-data">
                
                <label class="form-group">Logo da Empresa</label>

                <div class="col-sm-6">
                    <img src="../../assets/images/portfolio-details/1.jpg" class="img-responsive" alt="" name="img" id="img" />
                </div>
                <div class="portfolio-view">
                    <ul class="nav nav-pills">
                        <li><a href="portfolio-details.html"><i class="fa fa-link"></i></a></li>
                        <li><a href="../../assets/images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                    </ul>
                </div>

                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                    <input type="file" name="logo" id="logo" class="form-control" onchange="alterarImagem()" required /> 
                </div>

                <label class="form-group">Dados</label>
                
                <div class="form-group">
                    <input type="text" name="cnpj" id="cnpj" class="form-control" required="required" placeholder="CNPJ" autocomplete="off" maxlength="18" minlength="18">
                </div>
                <div class="form-group">
                    <input type="text" name="razaosocial" class="form-control" required="required" placeholder="Razão Social" autocomplete="off" >
                </div>
                <div class="form-group">
                    <input type="text" name="nomefantasia" class="form-control" required="required" placeholder="Nome Fantasia" autocomplete="off" >
                </div>
                <div class="form-group">
                    <input type="text" name="responsavel" class="form-control" required="required" placeholder="responsavel" autocomplete="off" >
                </div>
                <div class="form-group">
                    <textarea name="descricao" id="descricao" required="required" class="form-control" rows="6" placeholder="Descreva seu trabalho"></textarea>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15">
                </div>
                <div class="form-group">
                    <input type="text" name="fixo" id="fixo" class="form-control" placeholder="Fixo"  autocomplete="off" maxlength="14" minlength="14">
                </div>

                <label class="form-group">Endereço</label>

                <div class="form-group">
                    <input type="text" class="form-control" name="cep" id="cep" maxlength="9" placeholder="CEP" autocomplete="off" minlength="9">
                </div>
                <div class="form-group">
                    <input type="text" name="logradouro" class="form-control" required="required" placeholder="Logradouro" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="cidade" class="form-control" required="required" placeholder="Cidade" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="bairro" class="form-control" required="required" placeholder="Bairro" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="estado" class="form-control" required="required" placeholder="Estado" maxlength="2" minlength="2" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="numero" class="form-control" placeholder="Nº" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="complemento" class="form-control" placeholder="Quadra, apto ..." autocomplete="off">
                </div>

                <label class="form-group">Páginas e websites <small>(url)</small></label>

                <div class="form-group">
                    <input type="url" name="facebook" class="form-control" placeholder="Facebook">
                </div>
                
                <div class="form-group">
                    <input type="url" name="instagram" class="form-control"  placeholder="Instagram">
                </div>

                <div class="form-group">
                    <input type="url" name="pinterest" class="form-control"  placeholder="Pinterest">
                </div>

                <div class="form-group">
                    <input type="url" name="twitter" class="form-control"  placeholder="Twitter">
                </div>

                <div class="form-group">
                    <input type="url" name="google" class="form-control"  placeholder="Google">
                </div>

                <div class="form-group">
                    <input type="url" name="site" class="form-control"  placeholder="Site">
                </div>

                <label class="form-group">Configuração de acesso</label>

                <div class="form-group">
                    <input type="text" name="login" class="form-control" required="required" placeholder="Login" autocomplete="off" minlength="3" maxlength="15">
                </div>
                <div class="form-group">
                    <input type="password" name="senha" class="form-control" required="required" placeholder="*********" autocomplete="off" minlength="5">
                    <small>Mínimo de 5 dígitos</small>
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                </div>

            </form>
        </div>
    </div>

<?php require_once 'footer.php'; ?>