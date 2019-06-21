<?php
    
    require_once '../../config.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $id         = base64_decode($_SESSION['session']);
    $c          = new ControllerCliente();
    $cliente    = new Cliente();
    $cliente    = $c->carregarCliente($id);

    $_SESSION['nome'] = $cliente->getNome();

    $s       = new ControllerServico();
    $a       = new ControllerAreaAtuacao();
    $servico = new Servico();
    $area    = new AreaAtuacao();

    if (isset($_POST) && !empty($_POST)) {
        $dados = $_POST;
    }

    $servicos = $s->listarServicos($cliente->getIdcliente());

?>

    <script type="text/javascript">

        function filtro(obj) {


            $('#abertos').css('display', 'none');
            $('#andamentos').css('display', 'none');
            $('#aceitos').css('display', 'none');
            $('#finalizados').css('display', 'none');

            var obj = obj.id

            if ( obj == 'op-abertos' ) {
                $('#abertos').css('display', 'block');
                $('#op-abertos').addClass('active');
                $('#op-aceitos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-aceitos' ) {
                $('#aceitos').css('display', 'block');
                $('#op-aceitos').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-andamentos' ) {
                $('#andamentos').css('display', 'block');
                $('#op-andamentos').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-aceitos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-finalizados' ) {
                $('#finalizados').css('display', 'block');
                $('#op-finalizados').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-aceitos').removeClass('active');
            } 

        }

</script>
            <script type="text/javascript">
                $('#op-abertos').addClass('active');
                $('#op-aceitos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            </script>
            <div class="content padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="abertos" style="display: block;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-list">
                            <th>ID</th>
                            <th>Data</th>
                            <th>Tipo de Serviço</th>
                            
                            <th class="actions"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($servicos as $item) { 
                                  if ($item['status_'] == 1) {
                            ?>
                                <tr>
                                  <td><?=$item['idservico'];?></td>
                                  <td><?=date('d-m',strtotime($item['dtinicio']));?></td>
                                  <td><?php $area = $a->carregarArea($item['area']); echo $area->getDescricao();?></td>
                                
                                  <td class="text-primary">
                                    <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i></a>
                                  </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="content padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="aceitos">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-list">
                            <th>ID</th>
                            <th>Data</th>
                            <th>Tipo de Serviço</th>
                            <th class="actions"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($servicos as $item) { 
                                  if ($item['status_'] == 2) {
                            ?>
                                <tr>
                                  <td><?=$item['idservico'];?></td>
                                  <td><?=date('d-m',strtotime($item['dtinicio']));?></td>
                                  <td><?php $area = $a->carregarArea($item['area']); echo $area->getDescricao();?></td>
                                  <td class="text-primary">
                                    <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i></a>
                                  </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="content padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="andamentos">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-list">
                            <th>ID</th>
                            <th>Data</th>
                            <th>Tipo de Serviço</th>
                            <th class="actions"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($servicos as $item) { 
                                  if ($item['status_'] == 3) {
                            ?>
                                <tr>
                                  <td><?=$item['idservico'];?></td>
                                  <td><?=date('d-m',strtotime($item['dtinicio']));?></td>
                                  <td><?php $area = $a->carregarArea($item['area']); echo $area->getDescricao();?></td>
                                  <td class="text-primary">
                                    <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i></a>
                                  </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>
            </div>        

            <div class="content padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="finalizados">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-list">
                            <th>ID</th>
                            <th>Data</th>
                            <th>Tipo de Serviço</th>
                            <th class="actions"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($servicos as $item) { 
                                  if ($item['status_'] == 4) {
                            ?>
                                <tr>
                                  <td><?=$item['idservico'];?></td>
                                  <td><?=date('d-m',strtotime($item['dtinicio']));?></td>
                                  <td><?php $area = $a->carregarArea($item['area']); echo $area->getDescricao();?></td>
                                  <td class="text-primary">
                                    <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i></a>
                                  </td>
                                </tr>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>
            </div>