
<?php include 'header.php'; ?>

<?php

  $a             = new ControllerAdministrador();
  $administrador = new Administrador();
  
  if( isset($_POST) && !empty($_POST)){
    $dados          = $_POST;
    $administrador  = $a->cadastrarAdministrador($dados);
  }

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
                        <h4 class="titulo">Cadastrar Administrador</h4>

                                <form id="form" name="contact-form" method="post" action="">
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="nome" class="form-control" placeholder="Nome" value="" required="required" autofocus >                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="login" class="form-control" placeholder="Login" value="" minlength="3" maxlength="15" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="senha" class="form-control" placeholder="Senha" value="" minlength="5" maxlength="" required="required">
                                                <small>Mínimo de 5 dígitos</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="buttons-action float-left">
                                                <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="buttons-action float-right">
                                                <input type="submit" name="submit" class="btn btn-info" value="Enviar">
                                             </div>
                                        </div>   
                                    </div>
                              </form>

                            </div>
                        </div>
                    
                </div>

            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    