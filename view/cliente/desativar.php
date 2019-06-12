 <?php

    require_once 'header.php'; 
    
    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente;
    $endereco   = new Endereco;
    $id         = base64_decode($_SESSION['session']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;
        $c->desativarCliente($dados);
        
    }
    
?>

<header id="header"> <?php require_once 'menu.php'; ?> </header>

<section id="portfolio-information" class="padding-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive img-perfil" alt="" id="img">
            </div>
            <div class="col-sm-6">
                <div class="project-name overflow">
                   
                </div>
                <div class="project-info overflow">
                     <div class="col-md-3 col-sm-6">
                        <h2 class="titulo">Dados</h2>
                        <strong>Nome</strong>
                            <p><?=$cliente->getNome();?></p>
                        <strong>CPF</strong>
                        <p id="cpf"><?=$cliente->getCpf();?></p>
                        <strong>E-mail</strong>
                        <p><?=$cliente->getEmail();?></p>
                        <strong>Fone</strong>
                        <p id="fone"><?=$cliente->getFone();?></p>
                        <br>
                        <strong style="font-size: 9pt;">Para confirmar exclusão, clique no botão abaixo.</strong>
                        <br>
                    </div>
                </div>
                
                <form name="form" method="post" action="">
                    <input type="hidden" name="v" value="<?=$_SESSION['session'];?>" >
                    <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-danger" value="DESATIVAR PERFIL">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>