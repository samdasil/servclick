<?php

    require_once 'header.php'; 
    
    $f          = new ControllerFisico();
    $e          = new ControllerEndereco();
    $fisico     = new Fisico;
    $endereco   = new Endereco;
    $id         = base64_decode($_SESSION['session']);
    $fisico     = $f->carregarFisico($id);
    $endereco   = $e->carregarEndereco($fisico->getEndereco());

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $f->desativarFisico($dados);
        
    }
    
?>

    <header id="header"> <?php require_once 'menu.php'; ?> </header>


   <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="../../assets/images/fisico/<?=$fisico->getFoto();?>" class="img-responsive" alt="" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                       
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2>Dados</h2>
                            <strong>Nome</strong>
                            <p><?=$fisico->getNome();?></p>
                            <strong>CPF</strong>
                            <p><?=$fisico->getCpf();?></p>
                            <strong>E-mail</strong>
                            <p><?=$fisico->getEmail();?></p>
                            <strong>Fone</strong>
                            <p><?=$fisico->getFone();?></p>
                            <br>
                            <strong>Para confirmar exclusão, clique no botão abaixo.</strong>
                            <br>
                        </div>
                    </div>
                    
                    <form name="form" method="post" action="">
                        <input type="hidden" name="idfisico" value="<?=$fisico->getIdfisico();?>">
                        <input type="hidden" name="v" value="<?=$v;?>" >
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="EXCLUIR PERFIL">
                        </div>
                    </form>
                    

<?php require_once 'footer.php'; ?>