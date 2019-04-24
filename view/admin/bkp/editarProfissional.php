<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'sindico';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL">
      <i class="fa fa-user"></i> &nbsp sindico &nbsp &nbsp
      <i class="fa fa-pencil"></i> &nbsp editar
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-pencil"></i> Editar dados do Sindico</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

        <!-- INÍCIO FORM BOOTSTRAP -->

         <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

            <?php
            include '../../control/controlVisualizarSindico.php';
            $sindico = mysqli_fetch_assoc($result);
            ?>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="id">Identificador</label>
                  <input type="text" class="form-control" name="id" id="id"  value="<?php echo $sindico['sinid']; ?>" readonly />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="nome">Nome do Sindico</label>
                  <input type="text" class="form-control" name="nome" id="nome" minlength="4" maxlength="50" placeholder="Digite o nome do sindico" value="<?php echo $sindico['sinnome']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="fone">Fone</label>
                  <input type="text" class="form-control" name="fone" id="fone" minlength="4" maxlength="50" placeholder="" value="<?php echo $sindico['sinfone']; ?>" required />
               </div>
               <div class="form-group col-md-5">
                  <label for="email">Fone</label>
                  <input type="email" class="form-control" name="email" id="email" minlength="4" maxlength="80" placeholder="exemplo@email.com" value="<?php echo $sindico['sinemail']; ?>" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" minlength="0" maxlength="15" width="100%" placeholder="cep" value="<?php echo $sindico['sincep']; ?>" required />
               </div>
               <div class="form-group col-md-2">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" name="numero" id="numero" minlength="1" maxlength="8" width="10%" placeholder="xxxx" value="<?php echo $sindico['sinnumero']; ?>" required/>
               </div>
               <div class="form-group col-md-4">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento" minlength="0" maxlength="80" width="100%" value="<?php echo $sindico['sincomplemento']; ?>"  />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-5">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" name="rua" id="rua" minlength="8" maxlength="120" width="100%" placeholder="Digite o nome da rua" value="<?php echo $sindico['sinrua']; ?>" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro" minlength="2" maxlength="50" width="100%" placeholder="bairro" value="<?php echo $sindico['sinbairro']; ?>" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-5">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" minlength="3" maxlength="50" width="100%" placeholder="" value="<?php echo $sindico['sincidade']; ?>" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" name="uf" id="uf" minlength="2" maxlength="2" width="100%" placeholder="" value="<?php echo $sindico['sinuf']; ?>" required/>
               </div>
            </div>

            <br>
            <div class="row">
            <legend style="font-size: 10pt; color: #005241;" class="form-group col-md-5"> Configuraçao de acesso</legend>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" name="login" id="login" minlength="3" maxlength="20" width="100%" placeholder="login" value="<?php echo $sindico['sinlogin']; ?>" required />
               </div>
               <div class="form-group col-md-3">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha" minlength="3" maxlength="8" width="100%" placeholder="********" value="<?php echo $sindico['sinsenha']; ?>" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="confirmasenha">Confirmar Senha</label>
                  <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" minlength="2" maxlength="8" width="100%" placeholder="********" required/>
               </div>
            </div>

            <input type="text"  name="perfil" id="perfil" minlength="1" maxlength="8" width="100%" placeholder="" value="<?php echo $sindico['sintpuid']; ?>" hidden/>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="editarSindico" name="editarSindico" class="btn btn-primary enviar-dados">Guardar</button>
                     <a href="listarSindico.php"><button type="button"  name="cancelar" class="btn btn-default">Cancelar</button></a>
                  </div>
               </div>
            </div>

         </form>
         <!-- FIM FORM BOOTSTRAP -->
      </div>
      <!-- FIM PAINEL CORPO -->
   </div>

</div>

<?php
   require '../layout/infoAcao.php';
   //require '../../assets/js/mask.js';
   include '../../assets/js/editarSindico.js';
   require '../layout/footer.php';
?>
