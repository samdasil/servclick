<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'condominio';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL">
      <i class="fa fa-university"></i> &nbsp condominio &nbsp &nbsp
      <i class="fa fa-pencil"></i> &nbsp editar
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-pencil"></i> Atualizar dados do Condomínio</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

         <!-- INÍCIO FORM BOOTSTRAP -->
         <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

            <?php
               include '../../control/controlVisualizarCondominio.php';
               $condominio = mysqli_fetch_assoc($result);
            ?>

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="id">Identificador do Condomínio</label>
                  <input type="text" class="form-control" name="id" id="id" minlength="6" maxlength="10" placeholder="" value="<?php echo $condominio['conid']; ?>" readonly />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="nome">Nome do Condomínio</label>
                  <input type="text" class="form-control" name="nome" id="nome" minlength="3" maxlength="50" placeholder="" value="<?php echo $condominio['connome']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" minlength="0" maxlength="8" width="100%" placeholder="cep" value="<?php echo $condominio['concep']; ?>" required />
               </div>
               <div class="form-group col-md-2">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" name="numero" id="numero" minlength="1" maxlength="8" width="100%" placeholder="xxxx" value="<?php echo $condominio['connumero']; ?>" required />
               </div>
               <div class="form-group col-md-4">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" name="rua" id="rua" minlength="8" maxlength="120" width="100%" placeholder="" value="<?php echo $condominio['conrua']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro" minlength="1" maxlength="50" width="100%" placeholder="" value="<?php echo $condominio['conbairro']; ?>" required />
               </div>
               <div class="form-group col-md-4">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" minlength="8" maxlength="120" width="100%" placeholder="" value="<?php echo $condominio['concidade']; ?>" required />
               </div>
               <div class="form-group col-md-2">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" name="uf" id="uf" minlength="2" maxlength="2" width="100%" placeholder="" value="<?php echo $condominio['conuf']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-4">
                  <label for="sindico">Sindico</label>
                  <input type="text" name="sindico" id="sindico" width="100%" placeholder="" value="<?php echo $condominio['consinid']; ?>" hidden />
                  <input type="text" class="form-control" name="nomesindico" id="nomesindico" width="100%" placeholder="" value="<?php echo $condominio['sindico']; ?>" required />
               </div>
               <div class="form-group col-md-4">
                  <label for="subsindico">Subsindico</label>
                  <input type="text" name="subsindico" id="subsindico" width="100%" placeholder="" value="<?php echo $condominio['consubsindico']; ?>" hidden />
                  <input type="text" class="form-control" name="nomesubsindico" id="nomesubsindico" width="100%" placeholder="" value="<?php echo $condominio['subsindico']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="editarCondominio" name="editarCondominio" class="btn btn-primary enviar-dados">Guardar</button>
                     <a href="listarCondominio.php"><button type="button"  name="cancelar" class="btn btn-default">Cancelar</button></a>
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
   require '../layout/infoAcao.php';
   include '../../assets/js/editarCondominio.js';
   require '../layout/footer.php';
?>
