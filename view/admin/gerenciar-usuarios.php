
<?php include 'header.php'; ?>

<?php

  $u          = new ControllerUsuario();  
  $usuario    = new Usuario();
  $usuarios   = $u->listarUsuario();

?>

    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">
                <div id="section_profissionais"><?php include 'novos-profissionais.php'; ?></div>
                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        
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
                                            <th>Nome</th>
                                            <th></th>
                                            <th style="width: 20px;"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <tr>
                                                  <td><?=$usuario['nome'];?></td>
                                                  <td><?=$usuario['login'];?></td>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizarUsuario.php"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editarUsuario.php"><i class="fa fa-pencil"></i></a>
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
    