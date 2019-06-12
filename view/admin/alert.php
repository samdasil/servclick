

<!-- ERRO DELETAR CATEGORIA -->
<?php 
    if((isset($_SESSION['cad-categoria']) && !empty($_SESSION['cad-categoria']) && $_SESSION['cad-categoria'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-warning alert-dismissible" role="alert" id="message">
            <strong>Erro!</strong><br> Categoria já existe!
        </div> 
<?php unset($_SESSION['cad-categoria']); } ?>

<!-- CATEGORIA CADASTRADA COM SUCESSO -->
<?php 
    if((isset($_SESSION['cad-categoria']) && !empty($_SESSION['cad-categoria']) && $_SESSION['cad-categoria'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Sucesso!</strong><br> Categoria cadastrada.
        </div> 
<?php unset($_SESSION['cad-categoria']); } ?>

<!-- ACESSO ATUALIZADO COM SUCESSO -->
<?php 
    if((isset($_SESSION['acesso']) && !empty($_SESSION['acesso']) && $_SESSION['acesso'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Sucesso!</strong><br> Acesso atualizado com sucesso.
        </div> 
<?php unset($_SESSION['acesso']); } ?>

<!-- ACESSO ERRO -->
<?php 
    if((isset($_SESSION['acesso']) && !empty($_SESSION['acesso']) && $_SESSION['acesso'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Erro!</strong><br> Não foi possível atualizar o acesso.
        </div> 
<?php unset($_SESSION['acesso']); } ?>