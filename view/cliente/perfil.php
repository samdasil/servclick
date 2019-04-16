<?php 
    
    if(!session_start()) session_start();

    if(!isset($_GET['v'])){
        header('Location: ../../index.php');
    }
    
    require 'header.php'; 
    require_once '../../config.php';
    
    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente;
    $endereco   = new Endereco;
    $id         = base64_decode($_GET['v']);
    $v          = base64_encode($id);
    $cliente    = $c->carregarCliente($id);
    $endereco   = $e->carregarEnderecoCliente($id);

?>
    
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$cliente->getNome();?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

   <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive" alt="" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        <!--
                        <h2 class="bold">Nome da Empresa</h2>
                        
                        <ul class="nav navbar-nav navbar-default">
                            <li><a href="#"><i class="fa fa-clock-o"></i>February11,2014</a></li>
                            <li><a href="#"><i class="fa fa-tag"></i>Branding</a></li>
                        </ul>
                    -->
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2>Dados</h2>
                            <strong>CPF</strong>
                            <p><?=$cliente->getCpf();?></p>
                            <strong>E-mail</strong>
                            <p><?=$cliente->getEmail();?></p>
                            <strong>Fone</strong>
                            <p><?=$cliente->getFone();?></p>
                            
                        </div>
                    </div>

                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2>Endereço</h2>
                            <strong>Bairro</strong>
                            <p><?=$endereco->getBairro();?>,</p>
                            <strong>Rua</strong>
                            <p><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                            <strong>Cidade</strong>
                            <p><?=$endereco->getCidade();?>-<?=$endereco->getEstado();?></p>
                        </div>
                    </div>
                    
                    <div class="buttons-action">
                        <a href="editar.php?v=<?=$v;?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                    </div>

<?php require_once 'footer.php'; ?>