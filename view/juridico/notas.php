<?php
    
    require_once 'header.php';

    $id      = base64_decode($_SESSION['session']);
    $s       = new ControllerServico();
    $c       = new ControllerCliente();
    $servico = new Servico();
    $cliente = new Cliente();

    if (isset($_POST) && !empty($_POST)) {
        $dados = $_POST;
    }

    $servicos = $s->listarServicosProfissional($id, 'juridico');

?>

	<header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="page-breadcrumb" class="pt10 pb1">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$juridico->getRazaosocial()?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php foreach ($servicos as $item) { 
          if ($item['stat'] == 4) {
    ?>

    <div class="row">
        <div class='col-md-12'>
            <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>
                <div class='sidebar-item  recent'>
                    <div class='media'>
                        <div class='pull-left middle'>
                            <h4>
                                <img src='../../assets/images/cliente/<?php $cliente = $c->carregarCliente($item['cliente']); echo $cliente->getFoto(); ?>' alt='' class="img-left">
                            </h4>
                        </div>
                        <div class='media-body'>
                            <h4>
                                <a href='visualizar-perfil-profissional.php?jur=<?=$cliente->getIdcliente()?>&fis=0'></a>
                            </h4>
                            <p class="desc-servico"> <?=$cliente->getNome()?></p>
                            <div class="text-center">
                                <img class="img-nota" src="../../assets/images/notas/n<?=$item['nota']?>.png" >
                                <p class="text-center"><?=$item['comentario']?></p>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <?php } } ?>

<?php require_once 'footer.php'; ?>