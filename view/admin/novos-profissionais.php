<?php
    require_once '../../config.php';
    $pjuridicos = new ControllerJuridico();
    $juri       = new Juridico();
    $pfisicos   = new ControllerFisico();
    $fisi       = new Fisico(); 
    $pjuridico  = $pjuridicos->listarNovoJuridico();
    $pfisico    = $pfisicos->listarNovoFisico();  

    if(isset($_GET['get']) && !empty($_GET['get'])) {
      //id da classe em foco
      $get = $_GET['get']; 

    }
      //id do usuario logado 
      $id         = base64_decode($_GET['v']); 

      //id do usuario criptografado 
      $v          = base64_encode($id);

?>
                <div class="col-md-3 col-sm-4">
                    <div class="sidebar portfolio-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Novos Profissionais</h3>
                            <?php foreach ($pjuridico as $j) { ?>
                                <a href="validar-juridico.php?v=<?=$v;?>&get=<?=$j['idjuridico'];?>">
                                    <div class="media">
                                        <div class="pull-left">
                                            <!--<img src="../../assets/images/juridico/<?=$j['logo'];?>" alt="" style="width: 50%; height: 50%;">-->
                                        </div>
                                        <div class="media-body">
                                            <h4><?=$j['razaosocial'];?></h4>
                                            <p>enviado em  <?=$j['dtcadastro'];?></p>
                                        </div>
                                    </div>
                                </a>  
                            <?php }  ?>
                            <?php foreach ($pfisico as $f) { ?>
                                <a href="validar-fisico.php?v=<?=$v;?>&get=<?=$f['idfisico'];?>">
                                    <div class="media">
                                        <div class="pull-left">
                                            <!--<img src="../../assets/images/fisico/<?=$f['foto'];?>" alt="" style="width: 50%;height: 50%;">-->
                                        </div>
                                        <div class="media-body">
                                            <h4><?=$f['nome'];?></h4>
                                            <p>enviado em  <?=$f['dtcadastro'];?></p>
                                        </div>
                                    </div>
                                </a>  
                            <?php }  ?>

                        </div>
                    </div>
                </div>