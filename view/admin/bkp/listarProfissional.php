<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'profissional';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL"><i class="fa fa-user"></i> &nbsp sindico</span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
          <h4><i class="fa fa-user"></i> Sindico
              <a href="cadastrarSindico.php"><span id="botaoCadastro"><input type="button" value="&#10009; Cadastrar"/></span></a>
          </h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

            <!-- INÍCIO TABELA BOOTSTRAP -->
            <div id="list" class="row">

                <!-- INÍCIO DIV TABLE -->
                <div class="table-responsive col-md-12">
                  <?php
                      //include '../../model/modelAdmin.php';

                      if(isset($_POST['buscarSindico'])){
                        //include  '../../control/controlBuscarSindico.php';
                      }else{
                        //include '../../control/controlListarSindico.php';
                      }
                  ?>
                  <nav class="navbar navbar-light bg-light">
                     <form class="form-inline" method="POST" action="" name="formularioBuscar">
                        <input class="form-control mr-sm-1" type="search" placeholder="" maxwidth="20%" aria-label="Buscar" name="buscar" id="buscar" minlength="1" required>

                        <button class="btn btn-primary my-1 my-sm-0" type="submit" name="buscarProfissional" data-toggle="tooltip" data-placement="top"  title="Buscar"><i class="fa fa-search"></i></button>
                        <a href="listarProfissional.php"><button class="btn btn-inline-success my-1 my-sm-0" data-toggle="tooltip" data-placement="top"  title="Recarregar" type="button" value="Limpar" /><i class="fa fa-retweet"></i></button></a>
                    </form>
                  </nav>
               <table class="table table-striped" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Fone</th>
                        <th>E-mail</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Login</th>
                        <th class="actions">Ações</th>
                     </tr>
                  </thead>

                  <!-- Utilizar os TRs e TDs para exibir as informações de conteúdo -->
                  <tbody>
                     <?php //while($sindico = mysqli_fetch_array($listSindico)){ ?>
                        <tr>
                           <td><?php //echo $sindico['sinid']; ?></td>
                           <td><?php //echo $sindico['sinnome'];   ?></td>
                           <td><?php //echo $sindico['sinfone'];   ?></td>
                           <td><?php //echo $sindico['sinemail'];   ?></td>
                           <td><?php //echo $sindico['sinbairro'];   ?></td>
                           <td><?php //echo $sindico['sincidade'];   ?></td>
                           <td><?php //echo $sindico['sinlogin'];   ?></td>
                           <td class="actions">
                              <a class="btn btn-success btn-xs" href="visualizarSindico.php?acao=visualizar&id=<?php echo $sindico['sinid']; ?>"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-warning btn-xs" href="editarSindico.php?acao=editar&id=<?php echo $sindico['sinid']; ?>"><i class="fa fa-pencil"></i></a>
                              <a class="btn btn-danger btn-xs" href="" data-toggle="modal" data-id="<?php echo $sindico['sinid']; ?>" ><i class="fa fa-times"></i></a>
                           </td>
                        </tr>
                     <?php //} ?>
                  </tbody>
               </table>
            </div>
            <!-- FIM DIV TABLE -->
         </div>
         <!-- FIM TABELA BOOTSTRAP -->
      </div>
      <!-- FIM PAINEL CORPO -->
   </div>
   <!-- FIM PAINEL -->
</div>

<?php
   include '../layout/infoAcao.php';
   include '../../assets/js/excluirSindico.js';
   include '../layout/footer.php';
?>
