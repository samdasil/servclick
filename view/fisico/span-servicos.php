<?php
    
    require_once '../../config.php';

    $s			= new ControllerServico();
    $servicos   = $s->listarServicosPorStatus($_SESSION['area'], 1);

    $contador = count($servicos);
    
?>
    <?php if ($contador > $_SESSION['cont']) { ?>
        <embed src='../../assets/audio/MSN.mp3'width='1' height='1'>
    <?php 
        $_SESSION['cont'] = $contador;
        } 
    ?>
    <script type="text/javascript">function span(){$('#span_servicos').css('display','block')}</script>
    <script type="text/javascript">span()</script>
    <span style="vertical-align: middle;"><?=$contador?></span>

    