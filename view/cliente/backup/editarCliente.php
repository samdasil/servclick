<?php
  /*
    $id = $_GET['id'];

    include "../../control/controlVisualizarPerfilCliente.php";
    $cliente = mysqli_fetch_assoc($resultado);

    */
     require '../layout/header-cliente.php';

?>
<!DOCTYPE html>

   <body onload="remove()">
      <div id="principal">
         
         <!-- NAV SUPERIOR -->
         <div class="conteudoTotal">
            <!-- MENU LATERAL  -->
            <div class="sidebar">
               <div class="tituloMenu">
                  MENU
               </div>
               <ul class="nav">
                  <li>
                     <a href="home.php?id=<?php echo $cliente['cliid']; ?>">Home</a>
                  </li>
                  <li>
                     <a class="ativo" href="visualizarCliente.php?id=<?php echo $nome['cliid']; ?>">Perfil</a>
                  </li>
                  <li>
                     <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>">Buscar Profissional</a>
                  </li>
                  <li>
                     <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>">Novo Serviço</a>
                  </li>
                  <li>
                     <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>">Meus Serviços</a>
                  </li>
                  <li>
                     <a href="listarHistorico.php?id=<?php echo $cliente['cliid']; ?>">Histórico</a>
                  </li>
                  <li>
                     <a href="creditos.php?id=<?php echo $cliente['cliid']; ?>">Créditos</a>
                  </li>
                  <li>
                     <a href="logout.php">Sair</a>
                  </li>
                </ul>
            </div>
            <!-- CONTEÚDO -->
            <div class="conteudo aberto">
                 <a class="botaoMenu"></a>
                 <span class="caminhoURL">
                  <i class="fa fa-pencil"></i> &nbsp
               </span>

               <!-- INICIO PAINEL -->
               <div class="painel">
                  <div class="painel_titulo">
                     <h4><i class="fa fa-pencil"></i> &nbsp Editar Meu Perfil</h4>
                  </div>

                  <!-- INICIO PAINEL CORPO -->
                  <div class="painel_corpo">

                    <!-- INÍCIO FORM BOOTSTRAP -->

                    <form name="formulario" id="formulario" method="POST" action="" onsubmit="">

                      <?php
                        //include '../../control/controlVisualizarCliente.php';
                        //$cliente = mysqli_fetch_assoc($result);
                      ?>

                      <form name="formulario" id="formulario" method="POST" action="." onsubmit="">

                      <input type="text" name="id" id="id" minlength="4" maxlength="50" value="" hidden/>

                      <div class="row">
                        <div class="form-group col-md-8">
                          <label for="cpf">CPF</label>
                          <input type="text" class="form-control" name="cpf" id="cpf" placeholder="" autocapitalize required autofocus >
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-8">
                          <label for="nome">Nome</label>
                          <input type="text" class="form-control" name="nome" id="nome" minlength="4" maxlength="50" placeholder="" autocapitalize required >
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-5">
                          <label for="email">E-mail</label>
                          <input type="email" class="form-control" name="email" id="email" minlength="4" maxlength="80" placeholder="exemplo@email.com" required >
                        </div>
                      
                          <div class="form-group col-md-3">
                            <label for="fone">Fone</label>
                            <input type="tel" class="form-control" name="fone" id="fone" minlength="8" maxlength="15" placeholder="" pattern="(\d{2}) \d{5}-\d{4}" required="" >
                          </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-md-2">
                          <label for="cep">CEP</label>
                          <input type="text" class="form-control" name="cep" id="cep" minlength="0" maxlength="8" width="100%" placeholder=""  required >
                        </div>
                        <div class="form-group col-md-2">
                          <label for="numero">Número</label>
                          <input type="text" class="form-control" name="numero" id="numero" minlength="1" maxlength="8" width="10%" placeholder="" required />
                        </div>
                        <div class="form-group col-md-4">
                          <label for="complemento">Complemento</label>
                          <input type="text" class="form-control" name="complemento" id="complemento" minlength="0" maxlength="80" width="100%" placeholder="quadra, bloco, apto" />
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-5">
                          <label for="rua">Rua</label>
                          <input type="text" class="form-control" name="rua" id="rua" minlength="8" maxlength="120" width="100%" placeholder="" required/>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="bairro">Bairro</label>
                          <input type="text" class="form-control" name="bairro" id="bairro" minlength="1" maxlength="50" width="100%" placeholder="" required/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-5">
                          <label for="cidade">Cidade</label>
                          <input type="text" class="form-control" name="cidade" id="cidade" minlength="8" maxlength="120" width="100%" placeholder="" required/>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="estado">Estado</label>
                          <input type="text" class="form-control" name="estado" id="estado" minlength="1" maxlength="20" width="100%" placeholder="" required/>
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

                      <input type="text" name="perfil" id="perfil"  value="2" hidden/>


                      <input type="text" name="perfil" id="perfil" minlength="1" maxlength="8" width="100%" placeholder="" value="<?php echo $cliente['clitpuid']; ?>" hidden />

                      <div class="row">
                        <div class="col-md-12">
                          <div style="float:left;">
                            <a class="btn btn-light btn-xs" href="home.php?id=<?php echo $cliente['cliid'] ?>"><i class="fa fa-arrow-left fa-3x"></i></a>
                          </div>
                          <div style="float:right;">
                            <button type="submit" id="editarCliente" name="editarCliente" class="btn btn-primary enviar-dados"><i class="fa fa-save fa-3x"></i></button>
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

         <!-- INICIO MODAL - DELETAR -->
         <?php
            require '../layout/infoAcao.php';
            include '../../assets/js/editarCliente.js';
         ?>
         <!-- FIM MODAL - DELETAR -->

         <!-- INICIO FOOTER -->
            <?php require '../layout/footer.php'; ?>
         <!-- FIM  FOOTER -->
      </div>
      <!-- FIM DIV CONTEUDO TOTAL -->
   </body>
</html>
