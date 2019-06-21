<?php 

	require_once 'header.php';

    $c          = new ControllerCliente();
    $f          = new ControllerFisico();
    $j          = new ControllerJuridico();
    $e          = new ControllerEndereco();
    $p          = new ControllerPagina();
    $a          = new ControllerAreaAtuacao();
    $cat        = new ControllerCategoria();
    $cliente    = new Cliente();
    $endereco   = new Endereco();
    $pagina     = new Pagina();
    $area       = new AreaAtuacao();
    $categoria  = new Categoria();
    $id         = base64_decode($_SESSION['session']);
    
    if ($_GET['fis'] != 0 ) {
    	$perfil		  = "fisico";
    	$profissional = new Fisico();
        $profis  	  = $_GET['fis'];
        $profissional = $f->carregarFisico($profis);
        //print_r($fisico);exit;
        $nomeProfis   = $profissional->getNome();
        $endereco     = $e->carregarEndereco($profissional->getEndereco());    
        $pagina       = $p->carregarPagina($profissional->getPagina());
        $area         = $a->carregarArea($profissional->getArea());
        $categoria    = $cat->carregarCategoria($profissional->getArea());
        //print_r($area);exit;
    } else if ($_GET['jur'] != 0 ) {
    	$perfil		  = "juridico";
    	$profissional = new Juridico();
        $profis       = $_GET['jur'];   
        //echo $profissional;exit; 
        $profissional = $j->carregarJuridico($profis);
        //print_r($juridico);exit;
        $nomeProfis   = $profissional->getRazaosocial();
        $endereco     = $e->carregarEndereco($profissional->getEndereco());    
        $pagina       = $p->carregarPagina($profissional->getPagina());
        $area         = $a->carregarArea($profissional->getArea());
        $categoria    = $cat->carregarCategoria($area->getCategoria());
        //print_r($juridico);exit;
    }

    if( isset($_POST) && !empty($_POST) ){
        $contato = $_POST['nome'];
        $fone = '55'.preg_replace("/[^0-9]/", "", $_POST['fone']);
        $categoria  = str_replace(' ',"%20",$categoria->getDescricao());
        $nomeProfis = str_replace(' ',"%20",$nomeProfis);
        $areaProfis = str_replace(' ',"%20",$area->getDescricao());
        $foneProfis = str_replace(' ',"%20",$profissional->getFone());
        $link = 'https://api.whatsapp.com/send?phone='.$fone.'&text=Olá%20'.$contato.',%20estou%20enviando%20o%20contato%20desse%20profissional%20-%20'.$nomeProfis.'%20-%20'.$foneProfis.'%20como%20indicação%20para%20serviços%20de%20'.$categoria.'%20como%20'.$areaProfis.'.%20Instale%20o%20app%20do%20ServClick%20para%20encontrar%20mais%20informações.%20http://www.servclick.com.br/app';

        //echo $link;exit;   
        //echo "<a href='".$link."'>Enviar</a>";exit;
        echo "<script>window.location = '".$link."';</script>";

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
                                <img src='../../assets/images/<?=$perfil;?>/<?=$profissional->getFoto();?>' alt='' style='width: 120px; height: 120px;'>
                            </h4>
                        </div>
                        <div class='media-body indicacao'>
                        	<?php if($perfil == 'fisico'){ ?>
                            	<h4 style="margin-bottom: 5px;"><?=$profissional->getNome();?></p>
                                <p><?=$area->getDescricao();?></p>    
                                <!--<p id="cpf"><?=$profissional->getCpf();?></h4>-->
                            <?php } else {?>
                            	<h4 style="margin-bottom: 5px;"><?=$profissional->getRazaosocial();?></h4>
                                <p><?=$area->getDescricao();?></p>    
                                <!--<p id="cnpj"><?=$profissional->getCnpj();?></p>-->
                            <?php } ?>
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

                <label>Qual o nome do seu contato ?</label>
                <input type="text" name="nome" class="form-control" required autofocus/>
    			<label>Informe o número para quem quer indicá-lo</label>
				<input type="text" name="fone" id="fone" class="form-control" placeholder="Telefone" autocomplete="off" maxlength="15" required/>
    			
    			<div style="margin-top: 40px;"></div>

    			<div class="form-group">
                    <button type="submit" name="indicar" class="btn btn-submit">Compartilhar</button>
                </div>

            </form>
		</section>

	</div>


<?php require_once 'footer.php'; ?>