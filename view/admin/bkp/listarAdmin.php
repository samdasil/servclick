<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'administrador';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL"><i class="fa fa-key"></i> &nbsp administrador</span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
          <h4><i class="fa fa-key"></i> Administrador
              <a href="cadastrarAdmin.php"><span id="botaoCadastro"><input type="button" value="&#10009; Cadastrar"/></span></a>
          </h4>
      </div>

      <!-- INICIO PAINEL CORPO -->
      <div class="painel_corpo">

            <!-- INÍCIO TABELA BOOTSTRAP -->
            <div id="list" class="row">

               <!-- INÍCIO DIV TABLE -->
               <div class="table-responsive col-md-12">
                  <?php
                     if(isset($_POST['buscarAdmin'])){
                        //include  '../../controller/controlBuscarAdmin.php';
                     }else{
                        //include '../../controller/controlListarAdmin.php';
                     }
                  ?>
                  <nav class="navbar navbar-light bg-light">
                     <form class="form-inline" method="POST" action="" name="formularioBuscar">
                        <input class="form-control mr-sm-1" type="search" placeholder="" maxwidth="20%" aria-label="Buscar" name="buscar" id="buscar" minlength="1" required>
                        <button class="btn btn-primary my-1 my-sm-0" type="submit" name="buscarAdmin" data-toggle="tooltip" data-placement="top"  title="Buscar"><i class="fa fa-search"></i></button>
                        <a href="listarAdmin.php"><button class="btn btn-inline-success my-1 my-sm-0" data-toggle="tooltip" data-placement="top"  title="Recarregar" type="button" value="Limpar" /><i class="fa fa-retweet"></i></button></a>
                     </form>
                  </nav>
                  
                  <table class="table table-striped" cellspacing="0" cellpadding="0">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Nome</th>
                           <th>Login</th>
                           <th class="actions">Ações</th>
                        </tr>
                     </thead>

                     <!-- Utilizar os TRs e TDs para exibir as informações de conteúdo -->
                     <tbody>
                        <?php// while($admin = mysqli_fetch_array($listAdmin)){ ?>
                           <tr>
                              <td><?php //echo $admin['admid']; ?></td>
                              <td><?php //echo $admin['admnome'];   ?></td>
                              <td><?php //echo $admin['admlogin'];   ?></td>
                              <td class="actions">
                                 <a class="btn btn-success btn-xs"  data-toggle="tooltip" data-placement="top"  title="Visualizar" href="visualizarAdmin.php?acao=visualizar&id=<?php echo $admin['admid']; ?>"><i class="fa fa-eye"></i></a>
                                 <a class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top"  title="Editar"  href="editarAdmin.php?acao=editar&id=<?php echo $admin['admid']; ?>"><i class="fa fa-pencil"></i></a>
                                 <a class="btn btn-danger btn-xs" href="#"  data-toggle="tooltip" data-placement="top"  title="Excluir" data-toggle="modal" data-id="<?php echo $admin['admid']; ?>"><i class="fa fa-times"></i></a>
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
   include '../../assets/js/excluirAdmin.js';
   include '../layout/footer.php';
?>
