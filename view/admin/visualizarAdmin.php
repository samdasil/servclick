<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'administrador';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL">
      <i class="fa fa-key"></i> &nbsp administrador &nbsp &nbsp
      <i class="fa fa-eye"></i> &nbsp visualizar
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-eye"></i> Visualizar dados do Administrador</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

         <!-- INÍCIO FORM BOOTSTRAP -->
         <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

            <?php
               include '../../control/controlVisualizarAdmin.php';
               $admin = mysqli_fetch_assoc($result);
            ?>

            <div class="row">
               <div class="form-group col-md-1">
                  <label for="id">Identificador</label>
                  <input type="text" class="form-control" name="id" id="id"  value="<?php echo $admin['admid']; ?>" readonly />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="nome">Nome do Administrador</label>
                  <input type="text" class="form-control" name="nome" id="nome" minlength="4" maxlength="50" placeholder="" value="<?php echo $admin['admnome']; ?>" readonly/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" name="login" id="login" minlength="20" maxlength="20" width="30%" placeholder="" value="<?php echo $admin['admlogin']; ?>" readonly/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="senha">Senha</label>&nbsp <small>(somente 8 digitos)</small>
                  <input type="password" class="form-control" name="senha" id="senha" minlength="8" maxlength="8" width="30%" placeholder="" value="<?php echo $admin['admsenha']; ?>" readonly/>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <a href="listarAdmin.php"><button type="button"  name="cancelar" class="btn btn-default">Voltar</button></a>
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
