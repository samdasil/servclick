<?php

    require_once 'header.php';
    
    $c          = new ControllerCategoria();
    $categoria  = new Categoria();
    $categoria  = $c->listarCategoria();

?>

    <header id="header"> <?php require_once 'topo.php'; ?> </header>

    <script type="text/javascript">
        
            $(document).ready(function(){
              $( "#categoria" ).change(function() {
                    $.post("carregarAreas.php",{id:this.value},function(data){
                        //console.log(data);
                        $("#areas").html(data);
                ﻿        $("#areas").css("display", "block");
                        $("#profissionais").css("display", "none");
                        $("#lupa").css("display", "block");
                    });
                });
            });

            $(document).ready(function(){
                $( '#areas' ).change(function() {
                    area = $('#area').val();
                    console.log(area);
                    $.post('carregarProfissionais.php',{id:area},function(data){
                        
                        $('#profissionais').html(data);
                ﻿        $('#profissionais').css('display', 'block');
                        $('#lupa').css('display', 'none');
                    });
                });
            ﻿});
    </script>﻿﻿

    <section id="portfolio-information" class="padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container">
            <div class="col-sm-6">
                <div class="form-group">
                    <label><i class="fa fa-list">&nbsp&nbsp</i>Categoria</label>
                    <select class="form-control" id='categoria'>
                        <option selected></option>
                        <?php foreach ($categoria as $item) {
                            echo "<option value='".$item['idcategoria']."'>".$item['descricao']."</option>";
                        } ?>
                    </select>
                </div>
            </div>
        </div>

        <div id="areas" class="container padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" style="display: none;">
            
        </div>
        
    </section>

    <section class="projects" id="projects  padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">

        <div class="container text-center" id="lupa">
            <img src="../../assets/images/background/lupa.png" class="lupa">
        </div>

        <div id="profissionais" class="container padding-top wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms" style="display: none;">

        </div>
    </section>

<?php require_once 'footer.php'; ?>

