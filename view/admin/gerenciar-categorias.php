
<?php include 'header.php'; ?>

<?php

  $c          = new ControllerCategoria();
  $categorias = new Categoria();
  $categorias = $c->listarCategoria();

?>

    <section id="projects" class="padding-top">
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
                                    <a href="cadastrar-categoria.php?v=<?=$v;?>"  title="Cadastrar"><i class="fa fa-plus fa-2x"></i></a>
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
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-categoria.php?v=<?=$v;?>&get=<?=$categoria['idcategoria'];?>"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-categoria.php?v=<?=$v;?>&get=<?=$categoria['idcategoria'];?>"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="deletar-categoria.php?v=<?=$v;?>&get=<?=$categoria['idcategoria'];?>"><i class="fa fa-trash"></i></a>
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
                              <li><a href="../../assets/#">left</a></li>
                              <li><a href="../../assets/#">1</a></li>
                              <li><a href="../../assets/#">2</a></li>
                              <li class="active"><a href="../../assets/#">3</a></li>
                              <li><a href="../../assets/#">4</a></li>
                              <li><a href="../../assets/#">5</a></li>
                              <li><a href="../../assets/#">6</a></li>
                              <li><a href="../../assets/#">7</a></li>
                              <li><a href="../../assets/#">8</a></li>
                              <li><a href="../../assets/#">9</a></li>
                              <li><a href="../../assets/#">right</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    