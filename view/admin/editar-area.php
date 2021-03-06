
<?php 

    require_once 'header.php';
    
    $p          = isset($_GET['p']) ? $_GET['p'] : 0;
    $a          = new ControllerAreaAtuacao();
    $c          = new ControllerCategoria();
    $area       = new AreaAtuacao();
    $categoria  = new Categoria();
    $area       = $a->carregarArea($p);
    $categoria  = $c->carregarCategoria($area->getCategoria());
    $list_categ = $c->listarCategoria();

    // caso receba dados via POST ou GET
    if( isset($_POST) && !empty($_POST)){

      $dados  = $_POST;
      //print_r($dados);exit;
      $a->editarArea($dados);
      
    }
    
   
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
                        <h4 class="titulo">Editar Área de Atuação</h4>
                               
                        <form id="form" name="form" method="post" action="">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <label><i class="fa fa-list">&nbsp&nbsp</i>  Categoria</label>
                                    <select class="form-control" name="categoria" id='categoria'>
                                        <option value="<?=$categoria->getIdcategoria();?>" selected ><?=$categoria->getDescricao();?></option>
                                        <?php foreach ($list_categ as $item) {
                                            echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                                        } ?>
                                    </select>
                                    <span class="valid vcategoria">Campo obrigatório *</span>
                                </div>
                                
                                <label class="form-group"><i class="fa fa-database">&nbsp&nbsp</i>Dados</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="idarea" class="form-control" placeholder="ID" value="<?=$area->getIdarea();?>" readonly>
                                        </div> 
                                        <div class="col-md-10">
                                            <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="<?=$area->getDescricao();?>" >
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
                                        <input type="submit" name="submit" class="btn btn-success" value="Enviar Atualização">
                                    </div>
                                </div>   
                            </div>
                            
                      </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->

<?php include 'footer.php'; ?>
    