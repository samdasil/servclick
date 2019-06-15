<?php if(!isset($_SESSION)) session_start(); ?>

<!-- ERRO LOGIN -->
<?php
    if((isset($_SESSION['res']) && !empty($_SESSION['res']) && $_SESSION['res'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-danger alert-dismissible" role="alert" id="message">
            <strong>ERRO!</strong> verifique os dados informados e tente novamente!
        </div> 
<?php unset($_SESSION['res']); } ?>


<!-- ERRO AO CADASTRAR CLIENTE -->
<?php 
    if((isset($_SESSION['cadastro']) && !empty($_SESSION['cadastro']) && $_SESSION['cadastro'] == 'erro')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-danger alert-dismissible" role="alert" id="message">
            <strong>Erro!</strong><br> Houve um erro ao cadastrá-lo, favor, tente novamente.
        </div> 
<?php unset($_SESSION['cadastro']); } ?>

<!-- CADASTRO REALIZADO COM SUCESSO -->
<?php 
    if((isset($_SESSION['cadastro']) && !empty($_SESSION['cadastro']) && $_SESSION['cadastro'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Sucesso!</strong><br> Seu cadastro foi efetuado com sucesso, pode realizar o login.
        </div> 
<?php unset($_SESSION['cadastro']); } ?>

<!-- CADASTRO REALIZADO COM SUCESSO -->
<?php 
    if((isset($_SESSION['profissional-cad']) && !empty($_SESSION['profissional-cad']) && $_SESSION['profissional-cad'] == 'success')) { ?>
       <script type="text/javascript">
            setTimeout(function() {
            $('#message').fadeOut(8000, function(){
                $(this).remove();
            });
        });
        </script>
        <div class="alert alert-success alert-dismissible" role="alert" id="message">
            <strong>Sucesso!</strong><br> Cadastro realizado com sucesso, aguarde a validação do seu cadastro para acessar.
        </div> 
<?php unset($_SESSION['profissional-cad']); } ?>
