
<?php include 'header.php'; ?>

<?php

  $a             = new ControllerAdministrador();
  $administrador = new Categoria();
  $administrador = $a->carregarAdministrador($get);

?>

    <section id="portfolio" class="padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="section-profissionais">
                        <?php include 'novos-profissionais.php'; ?>
                    </div>
                </div>
                
                <div class="col-md-9">                        
                    <div class="contact-form">
                        <h4 class="titulo">Visualizar Administrador</h4>

                        <div class="col-md-12">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>ID         : </strong> <?=$administrador->getIdadmin();?></p>
                                        <p class="linha"><strong>Nome       : </strong> <?=$administrador->getNome();?></p>
                                        <p class="linha"><strong>Login      : </strong> <?=$administrador->getLogin();?></p>
                                    </div>
                                </div>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                 <div class="buttons-action">
                                    <a href="javascript:history.back()"><i class="fa fa-arrow-left fa-3x"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="buttons-action">
                                    <a href="editar-administrador.php?v=<?=$v;?>&get=<?=$get?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
                                 </div>
                            </div>   
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    