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

    $servicos = $s->listarServicosProfissional($id, 'fisico');

?>

	<header id="header"> <?php require_once 'menu.php'; ?> </header>

    <section id="page-breadcrumb" class="pt10 pb1">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title"><?=$fisico->getNome()?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php require_once 'footer.php'; ?>