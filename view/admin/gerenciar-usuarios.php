
<?php 

    require_once 'header.php'; 

    $u          = new ControllerUsuario();
    $usuario    = new Usuario();
    $usuarios   = $u->listarUsuario();
  
?>

    <section id="projects" class="pt10">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                  <div id="section-profissionais">
                    <?php include 'novos-profissionais.php'; ?>
                  </div>
                </div>

                <?php require_once 'alert.php'; ?>

                <div class="col-md-9 col-sm-8">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-5 col-sm-8 ml15">
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
                                            <th>Senha</th>
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
                                                    <td><?=$usuario['senha'];?></td>
                                                    <?php if($usuario['status_'] == 1) 
                                                             echo "<th><i class='fa fa-check'></i></th>"; 
                                                          else echo "<th><i class='fa fa-ban'></th>"; 
                                                     ?>
                                                    <td class="text-primary">
                                                        <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-usuario.php?login=<?=$usuario['login'];?>&p=<?=$usuario['perfil'];?>&i=<?=$usuario['id'];?>"><i class="fa fa-eye" id="fas"></i></a>
                                                        <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-usuario.php?login=<?=$usuario['login'];?>&i=<?=$usuario['id'];?>"><i class="fa fa-pencil" id="fas"></i></a>
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
    