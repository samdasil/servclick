<?php

    require_once 'header.php'; 
    
    $f          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $juridico   = new Juridico;
    $endereco   = new Endereco;
    $id         = base64_decode($_SESSION['session']);
    $juridico   = $f->carregarJuridico($id);
    $endereco   = $e->carregarEndereco($juridico->getEndereco());

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;

        $f->desativarJuridico($dados);
        
    }
    
?>

    <header id="header"> <?php require_once 'menu.php'; ?> </header>


   <section id="portfolio-information" class="pt15">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="../../assets/images/juridico/<?=$juridico->getFoto();?>" class="img-responsive img-perfil" alt="" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                       
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2>Dados</h2>
                            <strong>CNPJ</strong>
                            <p><?=$juridico->getCnpj();?></p>
                            <strong>Razão Social</strong>
                            <p><?=$juridico->getRazaosocial();?></p>
                            <strong>Nome Fantasia</strong>
                            <p><?=$juridico->getNomefantasia();?></p>
                            <strong>E-mail</strong>
                            <p><?=$juridico->getEmail();?></p>
                            <strong>Fone</strong>
                            <p><?=$juridico->getFone();?></p>
                            <br>
                            <strong>Para confirmar exclusão, clique no botão abaixo.</strong>
                            <br>
                        </div>
                    </div>
                    
                    <form name="form" method="post" action="">
                        <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                        <input type="hidden" name="v" value="<?=$v;?>" >
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="EXCLUIR PERFIL">
                        </div>
                    </form>
                    

<?php require_once 'footer.php'; ?>