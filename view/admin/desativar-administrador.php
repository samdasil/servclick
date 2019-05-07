
<?php include 'header.php'; ?>

<?php

  $a             = new ControllerAdministrador();
  $administrador = new Administrador();
  $administrador = $a->carregarAdministrador($get);

  // caso receba dados via POST ou GET
  if( isset($_POST) && !empty($_POST)){

      $dados  = $_POST;

      $a->desativarAdministrador($dados);
      
  }

?>

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
                        <h4 class="titulo">Visualizar Administrador</h4>

                        <div class="col-md-12">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>ID         : </strong> <?=$administrador->getIdadmin();?></p>
                                        <p class="linha"><strong>Nome       : </strong> <?=$administrador->getNome();?></p>
                                        <p class="linha"><strong>Login      : </strong> <?=$administrador->getLogin();?></p>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <form name="form" method="post" action="">
                            <input type="hidden" name="v" value="<?=$v;?>" >
                            <input type="hidden" name="idadmin" value="<?=$administrador->getIdadmin();?>" >
                        
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
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    