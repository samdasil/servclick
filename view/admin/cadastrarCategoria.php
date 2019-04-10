<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'categoria';
  require '../../layout/admin/header-admin.php';
?>
<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL">
      <i class="fa fa-list-alt"></i> &nbsp categoria &nbsp &nbsp
      <i class="fa fa-plus"></i> &nbsp cadastro
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-list-alt"></i> Nova Categoria</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

         <!-- INÍCIO FORM BOOTSTRAP -->
         <form name="formulario" id="formulario" method="POST" action="." onsubmit="">

            <input type="text" name="id" id="id" minlength="4" maxlength="50" value="" hidden/>

            <div class="row">
               <div class="form-group col-md-8">
                 <label for="descricao">Descrição</label>
                 <input type="text" class="form-control" name="descricao" id="descricao" minlength="4" maxlength="50" placeholder="" required autofocus/>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="cadastrarCategoria" name="cadastrarCategoria" class="btn btn-primary enviar-dados">Salvar</button>
                     <a href="listarCategoria.php"><button type="button"  name="cancelar" class="btn btn-default">Cancelar</button></a>
                  </div>
               </div>
            </div>

        </form>
        <!-- FIM FORM BOOTSTRAP -->
      </div>
        <!-- FIM PAINEL CORPO -->
   </div>
   <!-- FIM PAINEL -->
</div>

<?php
   include '../layout/infoAcao.php';
   include '../../assets/js/cadastrarCategoria.js';
   include '../layout/footer.php';
?>
