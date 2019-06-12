<?php 

    require_once 'header.php'; 

    $s       = new ControllerServico();
    $servico = new Servico();

    if (isset($_POST) && !empty($_POST)) {
        $dados = $_POST;
    }

    $servicos = $s->listarServicos($cliente->getIdcliente());

?>

<script type="text/javascript">
        function filtro(obj) {
            $('#abertos').css('display', 'none');
            $('#andamento').css('display', 'none');
            $('#cancelados').css('display', 'none');
            $('#finalizados').css('display', 'none');

            var obj = obj.id

            if ( obj == 'op-abertos' ) {
                $('#abertos').css('display', 'block');
                $('#op-abertos').addClass('active');
                $('#op-cancelados').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-andamentos' ) {
                $('#andamento').css('display', 'block');
                $('#op-andamentos').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-cancelados').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-cancelados' ) {
                $('#cancelados').css('display', 'block');
                $('#op-cancelados').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-finalizados').removeClass('active');
            } else if ( obj == 'op-finalizados' ) {
                $('#finalizados').css('display', 'block');
                $('#op-finalizados').addClass('active');
                $('#op-abertos').removeClass('active');
                $('#op-andamentos').removeClass('active');
                $('#op-cancelados').removeClass('active');
            } 

        }
</script>

<header id="header"> <?php require_once 'menu.php'; ?> </header>

<section id="portfolio">
    <div class="container">
        <div class="row">
            <ul class="portfolio-filter text-center">
                <li><button class="btn btn-default active" id="op-abertos" href="#"  onclick="filtro(this)"><i class="fa fa-folder-open fa-5x"></i> Abertos </button></li>
                <li><button class="btn btn-default" id="op-andamentos" href="#"  onclick="filtro(this)"><i class="fa fa-history fa-5x"></i> Andamen.</button></li>
                <li><button class="btn btn-default" id="op-cancelados" href="#"  onclick="filtro(this)"><i class="fa fa-ban fa-5x"></i> Canc.</button></li>
                <li><button class="btn btn-default" id="op-finalizados" href="#" onclick="filtro(this)"><i class="fa fa-check fa-5x"></i> Concl.</button></li>
            </ul>
        </div>

        <div class="content" id="abertos" style="display: block;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Área</th>
                        <th>Descrição</th>
                        
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['status_'] == 1) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['area'];?></td>
                              <td><?=$item['descricao'];?></td>
                            
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="cancelar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="content" id="andamento">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Área</th>
                        <th>Descrição</th>
                        <!--<th>Status</th>-->
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['status_'] == 2) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['area'];?></td>
                              <td><?=$item['descricao'];?></td>
                            <!--
                              <?php if($item['status_'] == 1) { ?>
                                    <th><i class='fa fa-exclamation-triangle'></i></th>
                              <?php } else if($item['status_'] == 2) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } else if($item['status_'] == 3) { ?>
                                    <th><i class='fa fa-clock'></th>
                              <?php } else if($item['status_'] == 4) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } ?>
                            -->
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="cancelar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="content" id="cancelados">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Área</th>
                        <th>Descrição</th>
                        <!--<th>Status</th>-->
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['status_'] == 3) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['area'];?></td>
                              <td><?=$item['descricao'];?></td>
                            <!--
                              <?php if($item['status_'] == 1) { ?>
                                    <th><i class='fa fa-exclamation-triangle'></i></th>
                              <?php } else if($item['status_'] == 2) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } else if($item['status_'] == 3) { ?>
                                    <th><i class='fa fa-clock'></th>
                              <?php } else if($item['status_'] == 4) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } ?>
                            -->
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="cancelar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>        

        <div class="content" id="finalizados">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-list">
                        <th>ID</th>
                        <th>Data</th>
                        <th>Área</th>
                        <th>Descrição</th>
                        <!--<th>Status</th>-->
                        <th class="actions"></th>
                    </thead>
                    <tbody>
                        <?php foreach ($servicos as $item) { 
                              if ($item['status_'] == 4) {
                        ?>
                            <tr>
                              <td><?=$item['idservico'];?></td>
                              <td><?=$item['dtinicio'];?></td>
                              <td><?=$item['area'];?></td>
                              <td><?=$item['descricao'];?></td>
                            <!--
                              <?php if($item['status_'] == 1) { ?>
                                    <th><i class='fa fa-exclamation-triangle'></i></th>
                              <?php } else if($item['status_'] == 2) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } else if($item['status_'] == 3) { ?>
                                    <th><i class='fa fa-clock'></th>
                              <?php } else if($item['status_'] == 4) { ?>
                                    <th><i class='fa fa-check'></th>
                              <?php } ?>
                            -->
                              <td class="text-primary">
                                <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Deletar"  href="cancelar-servico.php?p=<?=$item['idservico'];?>"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
</section>

<?php require_once 'footer.php'; ?>