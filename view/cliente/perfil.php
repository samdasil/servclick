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
    
    <!-- script mask -->
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cnpj").mask('00.000.000/0000-00')
            $("#cpf").mask('000.000.000-00')
            $("#cep").mask('00000-000')
            $("#fone").mask('(00) 00000-0000')
        })

    </script>
    
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
                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive img-perfil" alt="" id="img">
                </div>
                <div class="col-sm-6">
                    <div class="project-name overflow">
                        
                    </div>
                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2 class="titulo">Dados</h2>
                            <strong>CPF</strong>
                            <p id="cpf"><?=$cliente->getCpf();?></p>
                            <strong>E-mail</strong>
                            <p><?=$cliente->getEmail();?></p>
                            <strong>Fone</strong>
                            <p id="fone"><?=$cliente->getFone();?></p>
                            
                        </div>
                    </div>

                    <div class="project-info overflow">
                         <div class="col-md-3 col-sm-6">
                            <h2 class="titulo">Endereço</h2>
                            <strong>Bairro</strong>
                            <p><?=$endereco->getBairro();?>,</p>
                            <strong>Rua</strong>
                            <p><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                            <strong>Cidade</strong>
                            <p><?=$endereco->getCidade();?>-<?=$endereco->getEstado();?></p>
                        </div>
                    </div>
                    
                    <div class="buttons-action">
                        <div class="col-md-3 col-sm-6">
                            <a href="editar.php?v=<?=$v;?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once 'footer.php'; ?>