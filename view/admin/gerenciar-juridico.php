<?php 

    require_once 'header.php'; 
  
    $p             = isset($_GET['p']) ? $_GET['p'] : 0;
    $j        = new ControllerJuridico();  
    $juridico = new Juridico();
    $juridicos = $j->listarTodos();  

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
                                <h4>Profissional Pessoa Jurídica</h4>
                            </div>
                            <div class="col-md-7 col-sm-8">
                                <div class="topo" style="text-align: right; padding-right: 15px;">
                                    <a href="cadastrar-juridico.php" title="Cadastrar" class="cad"><i class="fa fa-plus fa-2x"></i></a>
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
                                            <th>CNPJ</th>
                                            <th>Razão Social</th>
                                            <th>Responsável</th>
                                            <th>Status</th>
                                            <th class="actions"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($juridicos as $juridico) { ?>
                                                <tr>
                                                  <td><?=$juridico['idjuridico'];?></td>
                                                  <td><?=$juridico['cnpj'];?></td>
                                                  <td><?=$juridico['razaosocial'];?></td>
                                                  <td><?=$juridico['responsavel'];?></td>
                                                  <?php if($juridico['status_'] == 1) echo "<th><i class='fa fa-check'></i></th>"; else echo "<th><i class='fa fa-ban'></th>"; ?>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-juridico.php?p=<?=$juridico['idjuridico'];?>"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-juridico.php?p=<?=$juridico['idjuridico'];?>"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="desativar-juridico.php?p=<?=$juridico['idjuridico'];?>"><i class="fa fa-trash"></i></a>
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
    