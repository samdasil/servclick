<?php

    include '../../config.php';

    $controller = new ControllerCliente();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) || isset($_GET) && !empty($_GET)){

        if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)) {

            $aFile = $_FILES;
            
        } else {
            
            $aFile = null;
            
        }
        
        $dados  = $_POST;

        $controller->cadastrarCliente($dados, $aFile);
        
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
        <link rel="shortcut icon" href="images/ico/favicon.ico">
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
        <script type="text/javascript" src="../../assets/js/validacoesForm.js"></script>
    </head>
    <script>
        function next(obj) {

              document.getElementById('div_dados').style.display="none";
              document.getElementById('div_endereco').style.display="none";
              document.getElementById('div_acesso').style.display="none";

           switch (obj.id) {
              case 'dados-right':
              document.getElementById('div_dados').style.display="none";
              document.getElementById('div_endereco').style.display="block";
              break
              case 'endereco-right':
              document.getElementById('div_endereco').style.display="none";
              document.getElementById('div_acesso').style.display="block";
              break
              case 'endereco-left':
              document.getElementById('div_endereco').style.display="none";
              document.getElementById('div_dados').style.display="block";
              break
              case 'acesso-left':
              document.getElementById('div_acesso').style.display="none";
              document.getElementById('div_endereco').style.display="block";
              break
           }
        }

    </script>

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

    <!-- container do formulario -->
    <div class="col-md-4 col-sm-12">
          
        <div class="contact-form bottom">
            <h2>Bem vindo à nossa página de cadastro para Clientes!</h2>
            <h5>Crie seu perfil e encontre os melhores profissionais</h5>
            <br>

            <form name="form" method="post" action="" enctype="multipart/form-data">
                <div id="div_dados" style="display:block;">
                    <label class="form-group">Foto para perfil</label>

                    <div class="col-sm-6">
                        <img src="../../assets/images/portfolio/1.jpg" class="img-responsive img-perfil" alt="" name="img" id="img" />
                    </div>
                    <div class="portfolio-view">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-link"></i></a></li>
                            <li><a href="../../assets/images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="MAX_FILE_SIZE" value="99999999"/>
                        <input type="file" name="foto" id="foto" class="form-control" onchange="alterarFoto()" required /> 
                    </div>

                    <label class="form-group">Dados</label>

                    <div class="form-group">
                        <input type="text" name="cpf" id="cpf" class="form-control" required="required" placeholder="CPF" autocomplete="off" maxlength="14" minlength="14">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" required="required" placeholder="Nome" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required="required" placeholder="E-mail" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" autocomplete="off" maxlength="15" minlength="15">
                    </div>
                    <a href="#" id="dados-right" onclick="next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                    
                </div>

                <div id="div_endereco" style="display:none;">
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
                    <a href="#" id="endereco-left" onclick="next(this)" class=""><i class="fa fa-arrow-left fa-3x"></i></a>
                    <a href="#" id="endereco-right" onclick="next(this)" class="right"><i class="fa fa-arrow-right fa-3x"></i></a>
                </div>

                <div id="div_acesso" style="display:none;">
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
                    <a href="#" id="acesso-left" onclick="next(this)" class=""><i class="fa fa-arrow-left fa-3x"></i></a>
                </div>

            </form>
        </div>
    </div>
    <!-- /container do formulario -->
    
    

<?php require_once 'footer.php'; ?>