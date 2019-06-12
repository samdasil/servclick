<?php

    require_once 'header.php'; 

    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $u          = new ControllerUsuario();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $usuario    = new Usuario();
    $id         = base64_decode($_SESSION['session']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){
        
        $dados  = $_POST;

        $u->editarUsuario($dados);
        
    }
    
?>

<header id="header"> <?php require_once 'menu.php'; ?> </header>

<div class="col-md-4 col-sm-12">
    <!-- ERRO AO ATUALIZAR ACESSO -->
    <?php 
        if((isset($_GET['edit']) && !empty($_GET['edit']) && $_GET['edit'] == 'erro')) { ?>
           <script type="text/javascript">
                setTimeout(function() {
                $('#message').fadeOut(8000, function(){
                    $(this).remove();
                });
            });
            </script>
            <div class="alert alert-success alert-dismissible" role="alert" id="message">
                <strong>Erro!</strong><br> Ocorreu um erro ao atualizar.
            </div> 
    <?php } ?>

        <div class="contact-form bottom">
            <form name="form" method="post" action="" enctype="multipart/form-data">

                <input type="hidden" name="v" value="<?=$v;?>" >
                <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                <input type="hidden" name="perfil" value="<?=$cliente->getPerfil();?>">

                <div class="col-sm-6">
                    <img src="../../assets/images/portfolio/cadeado.png" class="img-responsive" alt="Foto Cliente" name="img" id="img">
                    <br>
                </div>

                <div class="form-group">
                    <input type="text" name="login" id="login" class="form-control" required="required" placeholder="Login" value="<?=$cliente->getLogin();?>" minlength="3" >
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