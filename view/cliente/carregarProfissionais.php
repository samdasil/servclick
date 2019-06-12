<?php
    
    require_once '../../config.php';

	$f  		= new ControllerFisico();
	$fisico 	= new Fisico();
    $j          = new ControllerJuridico();
    $juridico   = new Juridico();

	// caso receba dados via POST
    if( isset($_POST) && !empty($_POST) ){

        $dados  = $_POST;   

        $fisico 	= $f->listarPorArea($dados['id']);
        $juridico   = $j->listarPorArea($dados['id']);

        if (count($fisico) == 0 && count($juridico) == 0 ) { 
            echo "<div class='container text-center' id='lupa'>";
            echo "    <label>Lamentamos, ainda não há profissionais cadastrados para essa área de atuação no momento.</label>";
            echo "<img src='../../assets/images/background/hourglass.png' class='lupa'>";
            echo "</div>";
        } else { 

            foreach ($juridico as $item) {
                echo "<div class='col-sm-6'>";
                echo "    <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>";
                echo "         <div class='sidebar-item  recent'>";
                echo "              <div class='media'>";
                echo "                  <div class='pull-left'>";
                echo "                      <h4><a href='visualizar-perfil-profissional.php?jur=".$item['idjuridico']."&fis=0'><img src='../../assets/images/juridico/".$item['foto']."' alt='' style='width: 80px; height: 80px; border-radius: 50%;'></a>";
                echo "                  </div>";
                echo "                  <div class='media-body'>";
                echo "                      <h4><a href='visualizar-perfil-profissional.php?jur=".$item['idjuridico']."&fis=0'>".$item['razaosocial']."</a></h4>";
                echo "                      <p>".$item['bairro'].", ".$item['cidade']."-".$item['estado']."</p>";
                echo "                      <p>Fone: ".$item['fone']."</p>";
                echo "                      <p>E-mail: ".$item['email']."</p>";
                echo "                  </div>";
                echo "              </div>";
                echo "         </div>";
                echo "     </div>";
                echo "</div>";
                
            }

            foreach ($fisico as $item) {
                echo "<div class='col-sm-6'>";
                echo "    <div class='sidebar portfolio-sidebar wow fadeIn' data-wow-duration='1000ms' data-wow-delay='300ms'>";
                echo "         <div class='sidebar-item  recent'>";
                echo "              <div class='media'>";
                echo "                  <div class='pull-left'>";
                echo "                      <h4><a href='visualizar-perfil-profissional.php?fis=".$item['idfisico']."&jur=0'><img src='../../assets/images/fisico/".$item['foto']."' alt='' style='width: 80px; height: 80px; border-radius: 50%;'></a>";
                echo "                  </div>";
                echo "                  <div class='media-body'>";
                echo "                      <h4><a href='visualizar-perfil-profissional.php?fis=".$item['idfisico']."&jur=0'>".$item['nome']."</a></h4>";
                echo "                      <p>".$item['bairro'].", ".$item['cidade']."-".$item['estado']."</p>";
                echo "                      <p>Fone: ".$item['fone']."</p>";
                echo "                      <p>E-mail: ".$item['email']."</p>";
                echo "                  </div>";
                echo "                  </div>";
                echo "              </div>";
                echo "         </div>";
                echo "     </div>";
                echo "</div>";
            }
        }
    }

?>