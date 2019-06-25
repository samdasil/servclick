
<?php 
    
    require_once 'header.php';

    $p = isset($_GET['p']) ? $_GET['p'] : 0;
 
    $a             = new ControllerAdministrador();
    $administrador = new Administrador();
    $administrador = $a->carregarAdministrador($_GET['p']);

?>

    <section id="portfolio" class="pt10">
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
                                 <div class="buttons-action float-left">
                                    <a href="javascript:history.back()" class="return"><i class="fa fa-arrow-left fa-3x"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="buttons-action float-right">
                                    <a href="editar-administrador.php?p=<?=$p?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
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
    