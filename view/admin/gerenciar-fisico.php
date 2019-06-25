<?php 
  
    require_once 'header.php'; 

    $p       = isset($_GET['p']) ? $_GET['p'] : 0;
    $f       = new ControllerFisico();  
    $fisico  = new Fisico();
    $fisicos = $f->listarTodos();  

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
                            <div class="col-md-5 col-sm-8 ml15">
                                <h4>Profissional Pessoa Física</h4>
                            </div>
                            <div class="topo" style="text-align: right; padding-right: 30px;">
                                <a href="cadastrar-fisico.php" title="Cadastrar" class="cad"><i class="fa fa-plus fa-2x"></i></a>
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
                                            <th>CPF</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th class="actions"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($fisicos as $fisico) { ?>
                                                <tr>
                                                  <td><?=$fisico['idfisico'];?></td>
                                                  <td><?=$fisico['cpf'];?></td>
                                                  <td><?=$fisico['nome'];?></td>
                                                  <td><?=$fisico['email'];?></td>
                                                  <?php if($fisico['status_'] == 1) echo "<th><i class='fa fa-check'></i></th>"; else echo "<th><i class='fa fa-ban'></th>"; ?>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-fisico.php?p=<?=$fisico['idfisico'];?>"><i class="fa fa-eye" id="fas"></i></a>
                                                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-fisico.php?p=<?=$fisico['idfisico'];?>"><i class="fa fa-pencil" id="fas"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="desativar-fisico.php?p=<?=$fisico['idfisico'];?>"><i class="fa fa-trash" id="fas"></i></a>
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
    