<?php 

    require_once 'header.php'; 

    $s       = new ControllerServico();
    $c       = new ControllerCliente();
    $servico = new Servico();
    $cliente = new Cliente();

    if (isset($_POST) && !empty($_POST)) {
        $dados = $_POST;
    }

    $servicos = $s->listarServicosPorStatus($juridico->getArea(), 1);
        
?>


<header id="header"> <?php require_once 'menu.php'; ?> </header>

<section id="portfolio">
    <div class="container pt10">

        <?php if (count($servicos) == 0 ) { ?>
        <div class="container text-center" id="lupa">
            <label>Não há novas solicitações para sua área de atuação no momento.</label>
            <label>Fique tranquilo, nós avisaremos quando houver.</label>
            <img src="../../assets/images/background/hourglass.png" class="lupa">
        </div>
        <?php } else { ?>

        <div class="content">
            <div class="table-responsive">
                   
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>Nº</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                    <?php } ?>
                        <?php  foreach ($servicos as $item) { ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['nome'];?></td>
                            
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i>
                                </a>
                              </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>



    </div>
</section>

<?php require_once 'footer.php'; ?>