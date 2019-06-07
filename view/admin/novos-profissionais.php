<?php
    require_once '../../config.php';

    $pjuridicos = new ControllerJuridico();
    $juri       = new Juridico();
    $pfisicos   = new ControllerFisico();
    $fisi       = new Fisico(); 
    $pjuridico  = $pjuridicos->listarPendentes();
    $pfisico    = $pfisicos->listarPendentes();  

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
                                    <a href="validar-juridico.php?p=<?=$j['idjuridico'];?>">
                                        <img src="../../assets/images/juridico/<?=$j['foto'];?>" alt="" class="novos-profissionais" >
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="validar-juridico.php?p=<?=$j['idjuridico'];?>"><?=$j['razaosocial'];?>,</a></h4>
                                    <p>enviado em  <?=$j['dtcadastro'];?></p>
                                </div>
                            </div>
                            <?php }  ?>

                            <?php foreach ($pfisico as $f) { ?>
                            <div class="media">
                                <div class="pull-left">
                                    <a href="validar-fisico.php?p=<?=$f['idfisico'];?>">
                                        <img src="../../assets/images/fisico/<?=$f['foto'];?>" alt="" class="novos-profissionais">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4><a href="validar-fisico.php?p=<?=$f['idfisico'];?>"><?=$f['nome'];?>,</a></h4>
                                    <p>enviado em  <?=$f['dtcadastro'];?></p>
                                </div>
                            </div>
                            <?php }  ?>
                        

                        </div>
                    </div>
