    
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

    <section id="portfolio-information" class="padding-top">
        <div class="container">
            <div id="section_profissionais"><?php include 'novos-profissionais.php'; ?></div>

            <div class="row">
                <div class="col-sm-6">
                    
                    <form name="form" method="post" action="" enctype="multipart/form-data">
                        
                        <input type="hidden" name="v" value="<?=$v;?>" >
                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                        <div class="form-group">
                            <input type="hidden" name="img" value="<?=$cliente->getFoto();?>">
                            <img src="../../assets/images/cliente/<?=$cliente->getFoto();?>" class="img-responsive" alt="Foto Cliente" name="img" id="img" >
                        </div>
                        
                        <label class="form-group">Dados</label>

                        <div class="form-group">
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?=$cliente->getCpf();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" value="<?=$cliente->getNome();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-mail" value="<?=$cliente->getEmail();?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="fone" id="fone" class="form-control" required="required" placeholder="Fone" value="<?=$cliente->getFone();?>" maxlength="15" minlength="15"  readonly>
                        </div>
                    
                        <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
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