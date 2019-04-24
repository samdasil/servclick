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
      <i class="fa fa-pencil"></i> &nbsp editar
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-pencil"></i> Atualizar dados do Administrador</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

        <!-- INÍCIO FORM BOOTSTRAP -->

        <form name="formulario" id="formulario" method="POST" action="" onsubmit="">
            <?php
               //include '../../model/conexao.php';
               include '../../control/controlVisualizarAdmin.php';
               $admin = mysqli_fetch_assoc($result);
            ?>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="id">Identificador</label>
                  <input type="text" class="form-control" name="id" id="id" minlength="1" maxlength="30" value="<?php echo $admin['admid']; ?>" readonly/>
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
                  <input type="text" class="form-control" name="login" id="login" minlength="3" maxlength="20" width="100%" placeholder="" value="<?php echo $admin['admlogin']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="senha">Senha</label>&nbsp <small>(somente 8 digitos)</small>
                  <input type="password" class="form-control" name="senha" id="senha" minlength="5" maxlength="8" width="100%" placeholder="" value="<?php echo $admin['admsenha']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                  <label for="confirmasenha">Confirmar Senha</label>
                  <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" minlength="5" maxlength="8" width="100%" placeholder="" value="<?php echo $admin['admsenha']; ?>" required />
                  <input type="text" name="status" id="status" minlength="1" maxlength="10" value="<?php echo $admin['admstatus']; ?>" hidden/>
                  <input type="text" name="perfil" id="perfil" minlength="1" maxlength="10" value="<?php echo $admin['admtpuid']; ?>" hidden/>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="editarAdmin" name="editarAdmin" class="btn btn-primary enviar-dados">Guardar</button>
                     <a href="listarAdmin.php"><button type="button"  name="cancelar" class="btn btn-default">Cancelar</button></a>
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
   //include '../../assets/js/mask.js';
   include '../../assets/js/editarAdmin.js';
   include '../layout/footer.php';
?>
