<?php
    
    require_once '../../config.php';
    if(!isset($_SESSION['session'])) header('Location: ../../index.php');

    $id      = base64_decode($_SESSION['session']);
    $s       = new ControllerServico();
    $c       = new ControllerCliente();
    $j       = new ControllerJuridico();
    $servico = new Servico();
    $cliente = new Cliente();
    $juridico  = new Juridico();

    $cliente = $c->carregarCliente($servico->getCliente());

    if (isset($_POST) && !empty($_POST)) {
        $dados = $_POST;
    }

    $servicos = $s->listarServicosProfissional($id, 'juridico');

?>

<script type="text/javascript">
        function filtro(obj) {
            $('#propostas').css('display', 'none');
            $('#andamentos').css('display', 'none');
            $('#cancelados').css('display', 'none');
            $('#finalizados').css('display', 'none');

            var obj = obj.id

            if ( obj == 'op-propostas' ) {
                $('#propostas').css('display', 'block');
                $('#op-propostas').addClass('active');
                $('#op-cancelados').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-andamentos' ) {
                $('#andamentos').css('display', 'block');
                $('#op-andamentos').addClass('active');
                $('#op-propostas').removeClass('active');
                $('#op-cancelados').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-cancelados' ) {
                $('#cancelados').css('display', 'block');
                $('#op-cancelados').addClass('active');
                $('#op-propostas').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-finalizados' ) {
                $('#finalizados').css('display', 'block');
                $('#op-finalizados').addClass('active');
                $('#op-propostas').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-cancelados').removeClass('active');
            } 

        }
</script>        

    <script type="text/javascript">
        $('#op-propostas').addClass('active');
        $('#op-cancelados').removeClass('active');
        $('#op-andamentos').removeClass('active');
        $('#op-finalizados').removeClass('active');
    </script>

        <div class="content  padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" style="display: block;" id="propostas" style="display: block;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['stat'] == 2) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['nome'];?></td>
                              <td class="text-primary">
                                    <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-arrow-right"></i></a>
                                  </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="content  padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="andamentos">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['stat'] == 3) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['nome'];?></td>
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Finalizar" href="finalizar-servico.php?p=<?=$item['idservico'];?>">
                                  <i class="fa fa-check"></i>
                                </a>
                                <a class="btn btn-warning btn-xs center-icon"  data-toggle="tooltip" data-placement="top"  title="Cancelar" href="cancelar-servico.php?p=<?=$item['idservico'];?>">
                                  <i class="fa fa-trash"></i>
                                </a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="content  padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="finalizados">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['stat'] == 4) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['nome'];?></td>
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-finalizado.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="content padding-bottom wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" id="cancelados">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Cliente</th>
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['stat'] == 5) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['nome'];?></td>
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-cancelado.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>        