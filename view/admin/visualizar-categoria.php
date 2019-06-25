
<?php 

    require_once 'header.php';
    
    $p          = isset($_GET['p']) ? $_GET['p'] : 0;
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $categoria  = $c->carregarCategoria($_GET['p']);

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
                        <h4 class="titulo">Visualizar Categoria</h4>

                        <div class="col-md-12">                        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="subtitulo"><strong>Dados </strong></p>
                                        <p class="linha"><strong>ID            : </strong> <?=$categoria->getIdcategoria();?></p>
                                        <p class="linha"><strong>Descrição     : </strong> <?=$categoria->getDescricao();?></p>
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
                                    <a href="editar-categoria.php?p=<?=$p?>"><button type="button" class="btn btn-btn btn-info"><i class="fa fa-pencil"></i>&nbsp Editar</button></a>
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
    