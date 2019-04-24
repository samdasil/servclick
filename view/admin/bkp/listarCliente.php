<?php
   if(!isset($_SESSION)) session_start();
   $_SESSION['ativo'] = 'cliente';
   require '../../layout/admin/header-admin.php';
?>

<!-- INICIO CONTEÚDO -->
<div class="conteudo aberto">
   <a class="botaoMenu"></a>
   <span class="caminhoURL"><i class="fa fa-user"></i> &nbsp cliente</span>

   <!-- INICIO PAINEL -->
   <div class="painel">
      <div class="painel_titulo">
          <h4><i class="fa fa-user"></i> Clientes
              <a href="cadastrarCliente.php"><span id="botaoCadastro"><input type="button" value="&#10009; Cadastrar"/></span></a>
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

                      if(isset($_POST['buscarCliente'])){
                        //include  '../../controller/controllerCliente.php';
                      }else{
                        //include '../../control/controlListarcliente.php';
                      }
                  ?>
                  <nav class="navbar navbar-light bg-light">
                     <form class="form-inline" method="POST" action="" name="formularioBuscar">
                        <input class="form-control mr-sm-1" type="search" placeholder="" maxwidth="20%" aria-label="Buscar" name="buscar" id="buscar" minlength="1" required>

                        <button class="btn btn-primary my-1 my-sm-0" type="submit" name="buscarCliente" data-toggle="tooltip" data-placement="top"  title="Buscar"><i class="fa fa-search"></i></button>
                        <a href="listarCliente.php"><button class="btn btn-inline-success my-1 my-sm-0" data-toggle="tooltip" data-placement="top"  title="Recarregar" type="button" value="Limpar" /><i class="fa fa-retweet"></i></button></a>
                    </form>
                  </nav>
               <table class="table table-striped" cellspacing="0" cellpadding="0">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Fone</th>
                        <th>Login</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>Bairro</th>
                        <th>UF</th>
                        <th class="actions">Ações</th>
                     </tr>
                  </thead>

                  <!-- Utilizar os TRs e TDs para exibir as informações de conteúdo -->
                  <tbody>
                     <?php //while($cliente = mysqli_fetch_array($listCliente)){ ?>
                        <tr>
                           <td><?php //echo $cliente['idcliente']; ?></td>
                           <td><?php //echo $cliente['nome'];   ?></td>
                           <td><?php //echo $cliente['email'];   ?></td>
                           <td><?php //echo $cliente['fone'];   ?></td>
                           <td><?php //echo $cliente['login'];   ?></td>
                           <td><?php //echo $cliente['cep'];   ?></td>
                           <td><?php //echo $cliente['cidade'];   ?></td>
                           <td><?php //echo $cliente['bairro'];   ?></td>
                           <td><?php //echo $cliente['estado'];   ?></td>
                           <td class="actions">
                              <a class="btn btn-success btn-xs" href="visualizarcliente.php?acao=visualizar&id=<?php echo $cliente['idcliente']; ?>"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-warning btn-xs" href="editarcliente.php?acao=editar&id=<?php echo $cliente['idcliente']; ?>"><i class="fa fa-pencil"></i></a>
                              <a class="btn btn-danger btn-xs" href="" data-toggle="modal" data-id="<?php echo $cliente['idcliente']; ?>" ><i class="fa fa-times"></i></a>
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
   include '../../assets/js/excluircliente.js';
   include '../layout/footer.php';
?>
