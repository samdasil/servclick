    
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

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <?php include 'novos-profissionais.php'; ?>

            <div class="row">
                <div class="col-sm-6">
                    
                    <form name="form" method="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" name="v" value="<?=$v;?>" >
                        <input type="hidden" name="idjuridico" value="<?=$juridico->getIdjuridico();?>">
                        <div class="form-group">
                            <input type="hidden" name="img" value="<?=$juridico->getLogo();?>">
                            <img src="../../assets/images/juridico/<?=$juridico->getLogo();?>" class="img-responsive" alt="Foto juridico" name="img" id="img" >
                        </div>
                        
                        <label class="form-group">Dados</label>

                        <div class="form-group">
                            <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ" value="<?=$juridico->getCnpj();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="razaosocial" id="razaosocial" class="form-control" placeholder="Razão Social" value="<?=$juridico->getRazaosocial();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$juridico->getEmail();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$juridico->getFone();?>" maxlength="15" minlength="15"  readonly>
                        </div>
                    
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="EXCLUIR PERFIL">
                        </div>
                    </form>
                    <div class="topo">
                        <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>