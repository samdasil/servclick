

<!-- ERRO DESATIVAR PERFIL -->
<?php 
    if((isset($_SESSION['del']) && !empty($_SESSION['del']) && $_SESSION['del'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-warning alert-dismissible" role="alert" id="message">
            <strong>Erro!</strong><br> Não foi possível desativar perfil, contate o administrador!
        </div> 
<?php unset($_SESSION['del']); } ?>

<!-- PERFIL ATUALIZADO COM SUCESSO -->
<?php 
    if((isset($_SESSION['edit']) && !empty($_SESSION['edit']) && $_SESSION['edit'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Sucesso!</strong><br> Perfil atualizado.
        </div> 
<?php unset($_SESSION['edit']); } ?>

<!-- ERRO CPF -->
<?php 
    if((isset($_SESSION['cpf']) && !empty($_SESSION['cpf']) && $_SESSION['cpf'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-warning alert-dismissible" role="alert" id="message">
            <strong>Erro!</strong><br> CPF inválido.
        </div> 
<?php unset($_SESSION['cpf']); } ?>

<!-- LOGIN REALIZADO COM SUCESSO -->
<?php 
    if((isset($_SESSION['ret']) && !empty($_SESSION['ret']) && $_SESSION['ret'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Olá <?=$_SESSION['nome'];?>!</strong><br> Seja bem-vindo(a)!
        </div> 
<?php unset($_SESSION['ret']); unset($_SESSION['nome']); } ?>

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
        <strong>Sucesso!</strong><br> Acesso atualizado.
    </div> 
<?php unset($_SESSION['acesso']); } ?>

<?php 
if((isset($_SESSION['acesso']) && !empty($_SESSION['acesso']) && $_SESSION['acesso'] == 'erro')) { ?>
   <script type="text/javascript">
        setTimeout(function() {
        $('#message').fadeOut(8000, function(){
            $(this).remove();
        });
    });
    </script>
    <div class="alert alert-warning alert-dismissible" role="alert" id="message">
        <strong>Erro!</strong><br> Acesso não atualizado.
    </div> 
<?php unset($_SESSION['acesso']); } ?>

<!-- DENUNCIA REALIZADA COM SUCESSO -->
<?php 
if((isset($_SESSION['denuncia']) && !empty($_SESSION['denuncia']) && $_SESSION['denuncia'] == 'success')) { ?>
   <script type="text/javascript">
        setTimeout(function() {
        $('#message').fadeOut(8000, function(){
            $(this).remove();
        });
    });
    </script>
    <div class="alert alert-success alert-dismissible" role="alert" id="message">
        <strong>Sucesso!</strong><br> Denúncia realizada com sucesso.
    </div> 
<?php unset($_SESSION['denuncia']); } ?>