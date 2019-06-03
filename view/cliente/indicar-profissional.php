<?php 

	require_once 'header.php';

    $f          = new ControllerFisico();
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $id         = base64_decode($_SESSION['session']);
    
    if ($_GET['fis'] != 0 ) {
    	$perfil		  = "fisico";
    	$profissional = new Fisico();
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
        $profis       = $_GET['jur'];   
        //echo $profissional;exit; 
        $profissional = $j->carregarJuridico($profis);
        //print_r($juridico);exit;
        $endereco     = $e->carregarEndereco($profissional->getEndereco());    
        $pagina       = $p->carregarPagina($profissional->getPagina());
        $area         = $a->carregarArea($profissional->getArea());
        //print_r($juridico);exit;
    } 
    
?>

	<header id='header'> <?php require_once 'topo.php'; ?> </header>

	<div class="container">

		<div class='col-sm-6'>
            <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>
                <div class='sidebar-item  recent'>
                    <div class='media'>
                        <div class='pull-left'>
                            <h4>
                                <img src='../../assets/images/<?=$perfil;?>/<?=$profissional->getFoto();?>' alt='' style='width: 120px; height: 120px;'>
                            </h4>
                        </div>
                        <div class='media-body indicacao'>
                        	<?php if($perfil == 'fisico'){ ?>
                            	<h4><?=$profissional->getNome();?></h4>
                            <?php } else {?>
                            	<h4><?=$profissional->getRazaosocial();?></h4>
                            <?php } ?>
                          	<p><?=$endereco->getBairro();?>, <?=$endereco->getCidade();?>-<?=$endereco->getEstado();?></p>
                          	<p>Fone: <?=$profissional->getFone();?></p>
                          	<p>E-mail: <?=$profissional->getEmail();?></p>
                      	</div>
                  	</div>
             	</div>
         	</div>
    	</div>

		<section class="projects">

			<label>Informe o número para quem quer indicá-lo</label>
			<table style="width: 100%;">
				<td style="width: 80px;padding-right: 15px;">
					<input type="text" name="ddd" id="ddd" class="form-control" required="required" placeholder="DDD" autocomplete="off" />
				</td>
				<td>
					<input type="text" name="tel" id="fone" class="form-control" placeholder="Telefone" autocomplete="off" maxlength="15" required/>
				</td>
			</table>

			<div style="margin-top: 40px;"></div>

			<div class="form-group">
                <a href="" type="button" name="indicar" class="btn btn-submit">Compartilhar</a>
            </div>

		</section>

	</div>


<?php require_once 'footer.php'; ?>