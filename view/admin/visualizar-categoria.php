
<?php include 'header.php'; ?>

<?php

  $c          = new ControllerCategoria();
  $categoria  = new Categoria();
  $categoria  = $c->carregarCategoria($get);

?>

    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">
                <div id="section_profissionais"><?php include 'novos-profissionais.php'; ?></div>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                          <div class="contact-form">
                              <h2>Categoria</h2>
                              <form id="main-contact-form" name="contact-form" method="post" action="">
                                  <div class="form-group">
                                      <input type="text" name="idcategoria" class="form-control" placeholder="ID" value="<?=$categoria->getIdcategoria();?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="<?=$categoria->getDescricao();?>" readonly>
                                  </div>
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
    