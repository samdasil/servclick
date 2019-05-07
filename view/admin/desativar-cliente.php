    
<?php include 'header.php'; ?>

<?php

    $c        = new ControllerCliente();
    $e        = new ControllerEndereco();
    $cliente  = new Cliente();
    $endereco = new Endereco();
    $cliente  = $c->carregarCliente($get);
    $endereco = $e->carregarEnderecoCliente($get);

  // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;
        $c->desativarCliente($dados);

    }

?>

    <!-- script mask -->
    <script type="text/javascript">
        
        $(document).ready(function(){
            $("#cpf").mask('000.000.000-00')
            $("#cep").mask('00000-000')
            $("#fone").mask('(00) 00000-0000')
        })

    </script>

    <section id="portfolio" class="padding-top">
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

                                <form name="form" method="post" action="">
                                    <input type="hidden" name="v" value="<?=$v;?>" >
                                    <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>" >
                                
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-danger" value="DESATIVAR PERFIL">
                                    </div>
                                    <div class="col-md-6">
                                         <div class="buttons-action">
                                            <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                        </div>
                                    </div>
                                </form>
                   
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>