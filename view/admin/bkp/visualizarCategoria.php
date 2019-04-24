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
      <i class="fa fa-eye"></i> &nbsp visualizar
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-eye"></i> Visualizar dados da Categoria</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

         <!-- INÍCIO FORM BOOTSTRAP -->
         <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

            <?php
               include '../../control/controlVisualizarCategoria.php';
               $categoria = mysqli_fetch_assoc($result);
            ?>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="id">Identificador</label>
                  <input type="text" class="form-control" name="id" id="id"  value="<?php echo $categoria['catid']; ?>" readonly />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="descricao">Descricao</label>
                  <input type="text" class="form-control" name="descricao" id="descricao" minlength="2" maxlength="50" placeholder="" value="<?php echo $categoria['catdescricao']; ?>" readonly />
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <a href="listarCategoria.php"><button type="button"  name="cancelar" class="btn btn-default">Voltar</button></a>
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
 include '../layout/footer.php';
?>
