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
      <i class="fa fa-plus"></i> &nbsp cadastro
   </span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
         <h4><i class="fa fa-user"></i> Novo Sindico</h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

         <!-- INÍCIO FORM BOOTSTRAP -->
         <form name="formulario" id="formulario" method="POST" action="." onsubmit="">

            <input type="text" name="id" id="id" minlength="4" maxlength="50" value="" hidden/>

            <div class="row">
               <div class="form-group col-md-8">
                  <label for="nome">Nome do Sindico</label>
                  <input type="text" class="form-control" name="nome" id="nome" minlength="4" maxlength="50" placeholder="Digite o nome do sindico" required autofocus/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="fone">Fone</label>
                  <input type="text" class="form-control" name="fone" id="fone" minlength="4" maxlength="15" placeholder="" required />
               </div>
               <div class="form-group col-md-5">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" minlength="4" maxlength="80" placeholder="exemplo@email.com" required />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label for="cep">CEP</label>
                  <input type="text" class="form-control" name="cep" id="cep" minlength="0" maxlength="8" width="100%" placeholder="cep" required />
               </div>
               <div class="form-group col-md-2">
                  <label for="numero">Número</label>
                  <input type="text" class="form-control" name="numero" id="numero" minlength="1" maxlength="8" width="10%" placeholder="xxxx" required />
               </div>
               <div class="form-group col-md-4">
                  <label for="complemento">Complemento</label>
                  <input type="text" class="form-control" name="complemento" id="complemento" minlength="0" maxlength="80" width="100%" placeholder="quadra, bloco, apto" />
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-5">
                  <label for="rua">Rua</label>
                  <input type="text" class="form-control" name="rua" id="rua" minlength="8" maxlength="120" width="100%" placeholder="Digite o nome da rua" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="bairro">Bairro</label>
                  <input type="text" class="form-control" name="bairro" id="bairro" minlength="1" maxlength="8" width="100%" placeholder="bairro" required/>
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-5">
                  <label for="cidade">Cidade</label>
                  <input type="text" class="form-control" name="cidade" id="cidade" minlength="8" maxlength="120" width="100%" placeholder="" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="uf">UF</label>
                  <input type="text" class="form-control" name="uf" id="uf" minlength="1" maxlength="8" width="100%" placeholder="" required/>
               </div>
            </div>

            <br>
            <legend style="font-size: 10pt; color: #005241;"> Configuraçao de acesso</legend>

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" name="login" id="login" minlength="3" maxlength="20" width="100%" placeholder="login" required/>
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-3">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha" minlength="5" maxlength="8" width="100%" placeholder="********" required/>
               </div>
               <div class="form-group col-md-3">
                  <label for="confirmasenha">Confirmar Senha</label>
                  <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" minlength="5" maxlength="8" width="100%" placeholder="********" required/>
               </div>
            </div>

            <input type="text" name="perfil" id="perfil" minlength="1" maxlength="8" width="10%" placeholder="" value="2" hidden/>

            <div class="row">
               <div class="col-md-12">
                  <div style="float:left;">
                     <button type="submit" id="cadastrarSindico" name="cadastrarSindico" class="btn btn-primary enviar-dados">Salvar</button>
                     <a href="listarSindico.php"><button type="button"  name="cancelar" class="btn btn-default">Cancelar</button></a>
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
   include '../../assets/js/cadastrarSindico.js';
   include '../layout/footer.php';
?>
