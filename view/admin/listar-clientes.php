<?php 
    
    require_once 'header.php'; 
  
    $p             = isset($_GET['p']) ? $_GET['p'] : 0;
    $c          = new ControllerCliente();
    $e          = new ControllerEndereco();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $clientes   = $c->listarCliente();

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
                            <div class="col-md-5 col-sm-8">
                                <h4>Clientes</h4>
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
                                            <th>CPF</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Fone</th>
                                            <th>Status</th>
                                            <th class="actions"></th>
                                          </thead>
                                          <tbody>
                                            <?php foreach ($clientes as $cliente) { ?>
                                                <tr>
                                                  <td><?=$cliente['idcliente'];?></td>
                                                  <td><?=$cliente['cpf'];?></td>
                                                  <td><?=$cliente['nome'];?></td>
                                                  <td><?=$cliente['email'];?></td>
                                                  <td><?=$cliente['fone'];?></td>
                                                  <?php if($cliente['status_'] == 1) echo "<th><i class='fa fa-check'></i></th>"; else echo "<th><i class='fa fa-ban'></th>"; ?>
                                                  <td class="text-primary">
                                                    <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-cliente.php?p=<?=$cliente['idcliente'];?>"><i class="fa fa-eye"></i>
                                                    </a>
                                                    <!--<a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editarAdmin.php?acao=editar&id="><i class="fa fa-pencil"></i></a>
                                                    -->
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
                              <li class="active"><a href="../../assets/#">1</a></li>
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
    