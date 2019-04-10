<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'home';
   require '../layout/header-admin.php';
?>

<!-- CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL"><i class="fa fa-home"></i> &nbsp home</span>

   <div class="painel">

      <div class="painel_titulo">
         <h4><i class="fa fa-home"></i> Painel - Bem vindo</h4>
      </div>

      <div class="painel_corpo">

      </div>

   </div>

</div>
<!-- FIM CONTEÚDO -->

<?php include '../layout/footer.php'; ?>
