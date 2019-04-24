<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'condominio';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL">
      <i class="fa fa-user"></i> &nbsp condomínio &nbsp &nbsp
      <i class="fa fa-plus"></i> &nbsp cadastro
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">

      <div class="painel_titulo">
         <h4><i class="fa fa-university"></i> Novo Condomínio</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

        <!-- INÍCIO FORM BOOTSTRAP -->

         <form name="formulario" id="formulario" method="POST" action="." onsubmit="">

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="id">Identificador do Condomínio</label>
                  <input type="text" class="form-control" name="id" id="id" minlength="6" maxlength="10" placeholder="" required autofocus/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="nome">Nome do Condomínio</label>
                  <input type="text" class="form-control" name="nome" id="nome" minlength="3" maxlength="50" placeholder="Digite o nome do condomínio" required autofocus/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" minlength="0" maxlength="8" width="100%" placeholder="cep" required />
               </div>
               <div class="form-group col-md-2">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" name="numero" id="numero" minlength="1" maxlength="8" width="100%" placeholder="xxxx" required/>
               </div>
               <div class="form-group col-md-4">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" name="rua" id="rua" minlength="8" maxlength="120" width="100%" placeholder="Digite o nome da rua" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro" minlength="1" maxlength="50" width="100%" placeholder="bairro" required/>
               </div>
               <div class="form-group col-md-4">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" minlength="8" maxlength="120" width="100%" placeholder="cidade" required/>
               </div>
               <div class="form-group col-md-2">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" name="uf" id="uf" minlength="2" maxlength="2" width="100%" placeholder="uf" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-4">
                  <label for="sindico">Sindico</label>
                  <select  id='sindico' name='sindico' class="form-control valid" >
                     <option value="0"  disabled selected>Selecione...</option>
                     <?php

                        include '../../control/controlListarSindico.php';

                        while ($sindico = mysqli_fetch_array($listSindico)) {
                     ?>
                        <option value="<?php echo $sindico['sinid']; ?>"><?php echo $sindico['sinnome']; ?></option>
                     <?php }  ?>
                  </select>
               </div>

               <div class="form-group col-md-4">
                  <label for="subsindico">Subsindico</label>
                  <select  id='subsindico' name='subsindico' class="form-control valid" >
                     <option value="0" disabled selected>Selecione...</option>
                     <?php
                           $res = listarSindico();
                           while ($sindico = mysqli_fetch_array($res)) {
                     ?>
                     <option value="<?php echo $sindico['sinid']; ?>"><?php echo $sindico['sinnome']; ?></option>
                     <?php }  ?>
                  </select>
              </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="cadastrarCondominio" name="cadastrarCondominio" class="btn btn-primary enviar-dados">Salvar</button>
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
   include '../layout/infoAcao.php';
   include '../../assets/js/cadastrarCondominio.js';
   include '../layout/footer.php';
?>
