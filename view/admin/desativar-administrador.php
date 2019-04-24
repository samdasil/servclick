
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

    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">
                <?php include 'novos-profissionais.php'; ?>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                          <div class="contact-form">
                              <h2>Administrador</h2>
                              <form id="form" name="contact-form" method="post" action="">
                                  <input type="hidden" name="v" value="<?=$v;?>" >
                                  <div class="form-group">
                                      <input type="text" name="idadmin" class="form-control" placeholder="ID" value="<?=$administrador->getIdadmin();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?=$administrador->getNome();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="login" class="form-control" placeholder="Login"  minlength="3" maxlength="15"  value="<?=$administrador->getLogin();?>"  readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="submit" class="btn btn-danger" value="Desativar">
                                  </div>
                                  <div class="navbar-header">
                                  <div class="topo">
                                      <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    