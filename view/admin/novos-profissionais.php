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
            <script type="text/javascript">

               audio = document.getElementById('audio');

                function play(){
                   audio.play();
                }

            </script>
            

                    <div class="sidebar portfolio-sidebar" >
                        <div class="sidebar-item  recent">
                            <h3>Notificações</h3>

                             <?php foreach ($pjuridico as $j) { ?>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="validar-juridico.php?v=<?=$v;?>&get=<?=$j['idjuridico'];?>"><img src="../../assets/images/juridico/<?=$j['logo'];?>" alt="" style="width: 50px; height: 50px;"></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="validar-juridico.php?v=<?=$v;?>&get=<?=$j['idjuridico'];?>"><?=$j['razaosocial'];?>,</a></h4>
                                    <p>enviado em  <?=$j['dtcadastro'];?></p>
                                </div>
                            </div>
                            <?php }  ?>

                            <?php foreach ($pfisico as $f) { ?>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="validar-fisico.php?v=<?=$v;?>&get=<?=$f['idfisico'];?>"><img src="../../assets/images/fisico/<?=$f['foto'];?>" alt="" style="width: 50px; height: 50px;"></a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="validar-fisico.php?v=<?=$v;?>&get=<?=$f['idfisico'];?>"><?=$f['nome'];?>,</a></h4>
                                    <p>enviado em  <?=$f['dtcadastro'];?></p>
                                </div>
                            </div>
                            <?php }  ?>
                        

                        </div>
                    </div>
