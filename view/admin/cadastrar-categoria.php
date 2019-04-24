
<?php include 'header.php'; ?>

<?php

  $c          = new ControllerCategoria();
  $categoria  = new Categoria();

  if( isset($_POST) && !empty($_POST)){
    $dados    = $_POST;
    $categoria  = $c->cadastrarCategoria($dados);
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
                              <h2>Categoria</h2>
                              <form id="form" name="contact-form" method="post" action="">
                                  <input type="hidden" name="v" value="<?=$v;?>" >
                                  <div class="form-group">
                                      <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="" required="required" autofocus >
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="submit" class="btn btn-submit" value="Salvar">
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
    