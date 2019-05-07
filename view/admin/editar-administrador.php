
<?php include 'header.php'; ?>

<?php

  $a             = new ControllerAdministrador();
  $administrador = new Administrador();
  $administrador = $a->carregarAdministrador($get);

  // caso receba dados via POST ou GET
  if( isset($_POST) && !empty($_POST)){

      $dados  = $_POST;

      $a->editarAdministrador($dados);
      
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
                        <h4 class="titulo">Editar Administrador</h4>

                        <form id="form" name="contact-form" method="post" action="">
                            
                            <input type="hidden" name="v" value="<?=$v;?>" >

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="idadmin" class="form-control" placeholder="ID" value="<?=$administrador->getIdadmin();?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?=$administrador->getNome();?>" required="required" autofocus>
                                    </div>
                                </div>
                            </div>
                            
                            <!--
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="login" class="form-control" placeholder="Login"  minlength="3" maxlength="15"  value="<?=$administrador->getLogin();?>" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="password" name="senha" class="form-control" placeholder="Senha" value="" minlength="5" maxlength="" required="required">
                                        <small>Mínimo de 5 dígitos</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" minlength="5" maxlength="" required="required">
                                <small>Mínimo de 5 dígitos</small>
                            </div>
                            -->

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Enviar Atualização">
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
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    