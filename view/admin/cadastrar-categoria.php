
<?php 

    require_once 'header.php';

    $p          = isset($_GET['p']) ? $_GET['p'] : 0;
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();

    if( isset($_POST) && !empty($_POST)){
        $dados      = $_POST;
        $categoria  = $c->cadastrarCategoria($dados);
    }

?>  
    <?php require_once 'alert.php'; ?>

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
                        <h4 class="titulo">Cadastrar Categoria</h4>

                                <form id="form" name="form" method="post" action="">

                                    <div class="col-md-12">
                                        <label class="form-group">Dados</label>
                                  
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <input type="text" name="idcategoria" class="form-control" placeholder="ID" value="<?=$categoria->getIdcategoria();?>" readonly>
                                                </div> 
                                                <div class="col-md-10">
                                                    <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="<?=$categoria->getDescricao();?>" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                  
                                      <div class="form-group">
                                          <input type="submit" name="submit" class="btn btn-submit" value="Enviar">
                                      </div>
                                      <div class="navbar-header">
                                      <div class="topo2">
                                          <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
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
    