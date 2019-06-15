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

<script>
    function btnDown(obj) {
        $(this).slideDown();
        $(this).removeAttr('onclick','btnDown');
        $(this).add('onclick','btnUp');
    }

    function btnUp(obj) {
        $(this).slideUp();
        $(this).removeAttr('onclick','btnUp');
        $(this).add('onclick','btnDown');
    }
    

    $('.op-item-servico-show').click(function() {
        $('.botoes-item-servico').css('display', 'block');
        $('.botoes-item-servico').slideDown();
        $('.op-item-servico-hide').css('display', 'block');
        $('.op-item-servico-show').css('display', 'none');
    });

    $('.op-item-servico-hide').click(function() {
        $('.botoes-item-servico').css('display', 'none');
        $('.op-item-servico-hide').css('display', 'none');
        $('.op-item-servico-show').css('display', 'block');
    });
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

        <div class="content" id="abertos" style="display: none;">
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

        <!--    div servicos abertos -->
        <?php foreach ($servicos as $item) { if ($item['status_'] == 1) {  ?>

            <div class="content" id="abertos" style="display: block;">

                <div class="row">
                    <div class="item-servico">
                        
                        <div class="op-item-servico-show"  onclick="btnDown(this)">
                            <i class="fa fa-chevron-down arrow-op-servico"></i>
                        </div>
                        <div class="op-item-servico-hide">
                            <i class="fa fa-chevron-up arrow-down"></i>
                        </div>

                    </div>
                    
                    <div class="botoes-item-servico">
                        
                    </div>
                </div>
            </div>

        <?php } } ?>

    </div>
</section>

<?php require_once 'footer.php'; ?>