
<?php 

    require_once 'header.php';

    $a               = new ControllerAdministrador();  
    $administradores = new Administrador();
    $administradores = $a->listarAdministrador();  

?>

    <section id="projects" class="padding-top">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                  <div id="section-profissionais">
                    <?php include 'novos-profissionais.php'; ?>
                  </div>
                </div>

                <div class="col-md-9 ">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-3 col-sm-8"> 
                                <h4>Administradores</h4>
                            </div>
                            <div class="col-md-9 col-sm-8">
                                <div class="topo" style="text-align: right; padding-right: 15px;">
                                    <a href="cadastrar-administrador.php" title="Cadastrar" class="cad"><i class="fa fa-plus fa-2x"></i></a>
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
                                            <th>Nome</th>
                                            <th>Status</th>
                                            <th class="actions"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($administradores as $administrador) { ?>
                                                <tr>
                                                  <td><?=$administrador['idadmin'];?></td>
                                                  <td><?=$administrador['nome'];?></td>
                                                  <?php if($administrador['status_'] == 1) echo "<th><i class='fa fa-check'></i></th>"; else echo "<th><i class='fa fa-ban'></th>"; ?>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-administrador.php?p=<?=$administrador['idadmin'];?>"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-administrador.php?p=<?=$administrador['idadmin'];?>"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="desativar-administrador.php?p=<?=$administrador['idadmin'];?>"><i class="fa fa-trash"></i></a>
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
    