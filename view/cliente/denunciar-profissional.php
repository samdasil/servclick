<?php 

	require_once 'header.php';

    $c          = new ControllerCliente();
    $f          = new ControllerFisico();
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $ce         = new ControllerEmail();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    
    $cliente = $c->carregarCliente($id);

    if ($_GET['fis'] != 0 ) {
    	$perfil		  = "fisico";
    	$profissional = new Fisico();
        $nome         = $profissional->getNome();
        $profis  	  = $_GET['fis'];
        $profissional = $f->carregarFisico($profis);
        //print_r($fisico);exit;
        $endereco     = $e->carregarEndereco($profissional->getEndereco());    
        $pagina       = $p->carregarPagina($profissional->getPagina());
        $area         = $a->carregarArea($profissional->getArea());
        //print_r($area);exit;
    } else if ($_GET['jur'] != 0 ) {
    	$perfil		  = "juridico";
    	$profissional = new Juridico();
        $nome         = $profissional->getRazaosocial();
        $profis       = $_GET['jur'];   
        //echo $profissional;exit; 
        $profissional = $j->carregarJuridico($profis);
        //print_r($juridico);exit;
        $endereco     = $e->carregarEndereco($profissional->getEndereco());    
        $pagina       = $p->carregarPagina($profissional->getPagina());
        $area         = $a->carregarArea($profissional->getArea());
        //print_r($juridico);exit;
    }

    if( isset($_POST) && !empty($_POST) ){
        $ce->enviarEmail($_POST);
    }
    
?>

	<header id='header'> <?php require_once 'menu.php'; ?> </header>

	<div class="container pt10">

		<div class='col-sm-6'>
            <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>
                <div class='sidebar-item  recent'>
                    <div class='media'>
                        <div class='pull-left'>
                            <h4>
                                <img src='../../assets/images/<?=$perfil;?>/<?=$profissional->getFoto();?>' alt='' style='width: 80px; height: 80px;' class="img-responsive img-perfil">
                            </h4>
                        </div>
                        <div class='media-body indicacao'>
                        	<h4 style="margin-bottom: 5px;"><?=$nome;?></p>
                            <p><?=$area->getDescricao();?></p>    
                          	<p><?=$endereco->getBairro();?>, <?=$endereco->getCidade();?>-<?=$endereco->getEstado();?></p>
                          	<p>Fone: <?=$profissional->getFone();?></p>
                          	<p>E-mail: <?=$profissional->getEmail();?></p>
                            <p><?=$pagina->getSite();?></p>
                      	</div>
                  	</div>
             	</div>
         	</div>
    	</div>

		<section class="projects">
            <form name="indicacao" action="" method="POST">

                
                <div class="form-group">
                    <label>Qual o motivo ?</label>
                    <div class="op-denuncia">    
                        <div class="op-item">
                            <input type="hidden" name="assunto" value="denuncia">
                            <input type="hidden" name="idcliente" value="<?=$cliente->getIdcliente();?>">
                            <input type="hidden" name="email" value="<?=$cliente->getEmail();?>">
                            <input type="hidden" name="nome" value="<?=$cliente->getNome();?>">
                            <input type="hidden" name="perfil" value="<?=$perfil;?>">
                            <input type="hidden" name="profissional" value="<?=$nome;?>">

                            <input type="checkbox" class="form" name="preco" id="preco">
                            <span for="motivo"><label for="preco">Preços abusivos</label></span>
                        </div>
                        <div class="op-item">
                            <input type="checkbox" class="form" name="pessimo" id="pessimo">
                            <span for="motivo"><label for="pessimo">Péssimo serviço</label></span>
                        </div>
                        <div class="op-item">
                            <input type="checkbox" class="form" name="conduta" id="conduta">
                            <span for="motivo"><label for="conduta">Conduta imprópria</label></span>
                        </div>
                        <div class="op-item">
                            <input type="checkbox" class="form" name="desqualificado" id="desqualificado">
                            <span for="motivo"><label for="desqualificado">Profissional desqualificado</label></span>
                        </div>
                        <div class="op-item">
                            <input type="checkbox" class="form" name="outros" id="outros">
                            <span for="motivo"><label for="outros">Outros motivos</label></span>
                        </div>
                    </div>
                </div>
                
    			<label>Comentários</label>
				
                <div class="form-group">
                    <textarea name="descricao" id="descricao" required="required" class="form-control" rows="4" placeholder="" required></textarea>
                </div>
    			
    			<div style="margin-top: 40px;"></div>

    			<div class="form-group">
                    <button type="submit" name="denunciar" value="denunciar" class="btn btn-danger">Enviar Denuncia</button>
                </div>

            </form>
		</section>

	</div>


<?php require_once 'footer.php'; ?>