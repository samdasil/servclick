<?php
    
    require_once '../../config.php';

    $pjuridicos = new ControllerJuridico();
    $juri       = new Juridico();
    $pfisicos   = new ControllerFisico();
    $fisi       = new Fisico(); 
    $pjuridico  = $pjuridicos->listarPendentes();
    $pfisico    = $pfisicos->listarPendentes();

    $contador = count($pjuridico) + count($pfisico);
    
?>
    <?php if ($contador > $_SESSION['cont']) { ?>
        <embed src='../../assets/audio/MSN.mp3'width='1' height='1'>
        <audio id="audio" autoplay>
            <source src="../../assets/audio/MSN.mp3" type="audio/mp3">
        </audio>    
    <?php 
        $_SESSION['cont'] = $contador;
        } 
    ?>

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
