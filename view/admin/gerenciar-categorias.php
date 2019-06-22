
<?php 

  require_once 'header.php';

  $c          = new ControllerCategoria();
  $categorias = new Categoria();
  $categorias = $c->listarCategoria();

?>

    <section id="projects" class="pt10">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                  <div id="section-profissionais">
                    <?php include 'novos-profissionais.php'; ?>
                  </div>
                </div>

                <div class="col-md-9 col-sm-8">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-3 col-sm-8">
                                <h4>Categorias</h4>
                            </div>
                            <div class="col-md-9 col-sm-8">
                                <div class="topo" style="text-align: right; padding-right: 15px;">
                                    <a href="cadastrar-categoria.php"  title="Cadastrar" class="cad"><i class="fa fa-plus fa-2x"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="content">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-hover">
                                          <thead class="table-list">
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th class="actions"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($categorias as $categoria) { ?>
                                                <tr>
                                                  <td><?=$categoria['idcategoria'];?></td>
                                                  <td><?=$categoria['descricao'];?></td>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-categoria.php?p=<?=$categoria['idcategoria'];?>"><i class="fa fa-eye" id="fas"></i></a>
                                                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-categoria.php?p=<?=$categoria['idcategoria'];?>"><i class="fa fa-pencil" id="fas"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="deletar-categoria.php?p=<?=$categoria['idcategoria'];?>"><i class="fa fa-trash" id="fas"></i></a>
                                                  </td>
                                                </tr>
                                            <?php } ?>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="portfolio-pagination">
                            <ul class="pagination">
                              <li><a href="#">left</a></li>
                              <li class="active"><a href="../../assets/#">1</a></li>
                              <li><a href="#">right</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    