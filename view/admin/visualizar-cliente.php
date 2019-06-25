    <?php 
    
    require_once 'header.php'; 
  
    $p        = isset($_GET['p']) ? $_GET['p'] : 0;
    $c        = new ControllerCliente();
    $e        = new ControllerEndereco();
    $cliente  = new Cliente();
    $endereco = new Endereco();
    $cliente  = $c->carregarCliente($p);
    $endereco = $e->carregarEndereco($cliente->getEndereco());

?>

    <section id="portfolio" class="pt10">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
            
                <div class="col-md-9">
                    <div class="contact-form">
                        <h4 class="titulo">Clientes</h4>

                        <div class="col-md-3">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                
                                    <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-perfil" alt="" name="img" id="img" />
                                
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label ><?=$cliente->getNome();?></label>
                            </div>
                        </div>

                        <div class="col-md-9">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            
                                        </table>
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>CPF           : </strong> <?=$cliente->getCpf();?></p>
                                        <p class="linha"><strong>E-mail        : </strong> <?=$cliente->getEmail();?></p>
                                        <p class="linha"><strong>Fone          : </strong> <?=$cliente->getFone();?></p>
                                        <br>
                                        <p class="subtitulo"><strong>Endereço </strong></p>
                                        <p class="linha"><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                                        <p class="linha"><?=$endereco->getCidade();?> - <?=$endereco->getBairro();?>, <?=$endereco->getEstado();?></p>
                                        <br>
                                    </div> 
                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                         <div class="buttons-action float-left">
                                            <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="buttons-action float-right">
                                            <a href="editar-cliente.php?p=<?=$p?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                                        </div>
                                    </div>   
                                </div>                                
                   
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>