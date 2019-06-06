
<?php require_once 'header.php'; ?>

<?php

  $u          = new ControllerUsuario();
  $usuario    = new Usuario();
  $usuarios   = $u->listarUsuario();
  
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
                            <div class="col-md-5 col-sm-8">
                                <h4>Usuários</h4>
                            </div>
                            <div class="col-md-7 col-sm-8"></div>
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
                                            <th>Perfil</th>
                                            <th>Login</th>
                                            <th>Status</th>
                                            <th class="actions"></th>   
                                          </thead>
                                          <tbody>
                                            <?php foreach ($usuarios as $usuario) { ?>
                                                <tr>
                                                    <td><?=$usuario['id'];?></td>
                                                    <?php if($usuario['perfil'] == 1){ 
                                                            echo "<td>Administrador</td>";
                                                          }else if($usuario['perfil'] == 2){
                                                            echo "<td>Cliente</td>";
                                                          }else if($usuario['perfil'] == 3){
                                                            echo "<td>Profissional</td>";
                                                          }

                                                    ?>
                                                    
                                                    <td><?=$usuario['login'];?></td>
                                                    <td></td>
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
    