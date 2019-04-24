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
      <i class="fa fa-plus"></i> &nbsp cadastro
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-key"></i> Novo Administrador</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

        <!-- INÍCIO FORM BOOTSTRAP -->

         <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

            <input type="text" name="id" id="id" minlength="4" maxlength="50" value="0" hidden/>

            <div class="row">
               <div class="form-group col-md-6">
                 <label for="nome">Nome do Administrador</label>
                 <input type="text" class="form-control" name="nome" id="nome" minlength="4" maxlength="50" placeholder="Digite o nome do novo administrador" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                 <label for="login">Login</label>
                 <input type="text" class="form-control" name="login" id="login" minlength="20" maxlength="20" width="30%" placeholder="login" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                 <label for="senha">Senha</label>&nbsp <small>(somente 8 digitos)</small>
                 <input type="password" class="form-control" name="senha" id="senha" minlength="8" maxlength="8" width="30%" placeholder="********" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-6">
                 <label for="confirmasenha">Confirmar Senha</label>
                 <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" minlength="8" maxlength="8" width="30%" placeholder="********" required/>
                 <input type="text" name="status" id="status" minlength="4" maxlength="10" value="" hidden/>
                 <input type="text" name="perfil" id="perfil" minlength="4" maxlength="10" value="" hidden/>
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                 <div style="float:left;">
                   <button type="submit" id="cadastrarAdmin" name="cadastrarAdmin" class="btn btn-primary enviar-dados">Salvar</button>
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
<!-- FIM DIV CONTEUDO ABERTO -->

<!-- INICIO SCRIPTS -->
<?php
   include '../layout/infoAcao.php';
   include '../../assets/js/cadastrarAdmin.js';
?>
<!-- FIM SCRIPTS -->

<?php include '../layout/footer.php'; ?>
