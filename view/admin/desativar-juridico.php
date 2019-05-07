    
<?php include 'header.php'; ?>

<?php

  $j        = new ControllerJuridico();
  $e        = new ControllerEndereco();
  $juridico = new Juridico();
  $endereco = new Endereco();
  $juridico = $j->carregarJuridico($get);
  $endereco = $e->carregarEnderecoJuridico($get);

  // caso receba dados via POST ou GET
if( isset($_POST) && !empty($_POST) ){
    
    $dados  = $_POST;
    $j->desativarJuridico($dados);
    
}

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
                        <h4 class="titulo">Profissional Pessoa Jurídica</h4>

                        <div class="col-md-3">
                            <div class="portfolio-wrapper">
                                <div class="portfolio-single">
                                
                                    <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-perfil" alt="" name="img" id="img" />
                                
                                </div>
                            </div>
                            
                            <div class="form-group text-center">
                                <label ><?=$juridico->getRazaosocial();?></label>
                            </div>
                        </div>

                        <div class="col-md-9">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table>
                                            
                                        </table>
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>CNPJ          : </strong> <?=$juridico->getCnpj();?></p>
                                        <p class="linha"><strong>Nome Fantasia : </strong> <?=$juridico->getNomefantasia();?></p>
                                        <p class="linha"><strong>Descrição     : </strong> <?=$juridico->getDescricao();?></p>
                                        <p class="linha"><strong>E-mail        : </strong> <?=$juridico->getEmail();?></p>
                                        <p class="linha"><strong>Fone          : </strong> <?=$juridico->getFone();?></p>
                                        <p class="linha"><strong>Fixo          : </strong> <?=$juridico->getFixo();?></p>
                                        <br>
                                        <p class="subtitulo"><strong>Endereço </strong></p>
                                        <p class="linha"><?=$endereco->getLogradouro();?>, <?=$endereco->getNumero();?></p>
                                        <p class="linha"><?=$endereco->getCidade();?> - <?=$endereco->getBairro();?>, <?=$endereco->getEstado();?></p>
                                        <br>
                                        
                                    </div>
                                <form name="form" method="post" action="">
                                    <input type="hidden" name="v" value="<?=$v;?>" >
                                    <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>" >
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-danger" value="DESATIVAR PERFIL">
                                    </div>
                                </form>
                                <div class="topo">
                                    <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>