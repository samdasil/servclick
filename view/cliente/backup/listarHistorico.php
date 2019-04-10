<?php

    $id = $_GET['id'];

    include "../../control/controlVisualizarPerfilCliente.php";
    $cliente = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <title>MySE | Visualizar</title>
      <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
      <meta charset="UTF-8"/>
      <meta name="description" content="Sistema de Gerenciamento de Solicitaçao de Serviços"/>
      <meta name="keywords"    content="interface, home, fametro, serviços, Cliente, condominio"/>
      <meta name="robots"      content="nofollow, index"/>
      <meta name="viewport"    content="width=device-width initial-scale=1.0"/>

      <link rel="icon"       type="image/png" href="../../assets/img/icone-login-mySE 136x155.png"/>
      <!-- Iconografia -->
      <link rel="stylesheet" type="text/css" href="../../assets/addons/font-awesome-4.7.0/css/font-awesome.css"/>
      <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../../assets/addons/bootstrap/css/bootstrap.min.css">
      <!-- FolhaEstilos -->
      <link rel="stylesheet" type="text/css" href="../../assets/css/app.css"/>


      <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="../../assets/js/js.js"></script>
      <script type="text/javascript" src="../../assets/addons/bootstrap/js/bootstrap.min.js"></script>
   </head>
   <body onload="remove()">
      <div id="principal">
         <div id="navegacao" >MySE - Cliente</div>
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
                     <a href="visualizarCliente.php?id=<?php echo $cliente['cliid']; ?>">Perfil</a>
                  </li>
                  <li>
                     <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>">Solicitações</a>
                  </li>
                  <li>
                     <a class="ativo" href="listarHistorico.php?id=<?php echo $cliente['cliid']; ?>">Histórico</a>
                  </li>
                  <li>
                     <a href="creditos.php?acao=visualizar?id=<?php echo $cliente['cliid']; ?>">Créditos</a>
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
                 <i class="fa fa-th-list"></i> &nbsp histórico</span><!-- \f00b -->

               <!-- INICIO PAINEL -->
               <div class="painel">
                  <div class="painel_titulo">
                      <h4><i class="fa fa-th-list"></i> Histórico de Solicitações
                          <!--<a href="cadastrarSolicitacao.php?id=<?php  echo $cliente['cliid'] ; ?>"><span id="botaoCadastro"><input type="button" value="&#10009; Nova Solicitação"/></span></a>-->
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

                                  if(isset($_POST['buscarSolicitacao'])){
                                    include  '../../control/controlBuscarSolicitacaoCliente.php';
                                  }else{
                                    include '../../control/controlListarHistoricoSolicitacaoCliente.php';
                                  }
                              ?>
                              <nav class="navbar navbar-light bg-light">
                                <form class="form-inline" method="POST" action="" name="formularioBuscar">
                                  <input class="form-control mr-sm-1" type="search" placeholder="" maxwidth="20%" aria-label="Buscar" name="buscar" id="buscar" minlength="1" required>
                                  <input type="text" name="cliente" id="cliente" value="<?php echo $id; ?>" hidden >
                                  <button class="btn btn-primary my-1 my-sm-0" type="submit" name="buscarSolicitacao">Buscar</button>
                                  <a href="listarSolicitacao.php"><button class="btn btn-inline-success my-1 my-sm-0" type="button" value="Limpar" />Limpar</button></a>
                                </form>
                              </nav>
                                <table class="table table-striped" cellspacing="0" cellpadding="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Data</th>
                                            <th>Hora</th>
                                            <th>Serviço</th>
                                            <th>Status</th>
                                            <th class="actions">Ações</th>
                                        </tr>
                                    </thead>

                                    <!-- Utilizar os TRs e TDs para exibir as informações de conteúdo -->
                                   <?php
                                      //$result = lista_estados();
                                       //include '../../model/conexao.php';

                                       while($solicitacao = mysqli_fetch_array($resultado)){
                                   ?>
                                    <tbody>

                                        <tr>
                                            <td><?php echo $solicitacao['solid']; ?></td>
                                            <td><?php echo $solicitacao['soldata'];   ?></td>
                                            <td><?php echo $solicitacao['solhora'];   ?></td>
                                            <td><?php echo $solicitacao['serdescricao'];   ?></td>
                                            <td><?php echo $solicitacao['solstatus'];   ?></td>
                                            <td class="actions">
                                                <a class="btn btn-success btn-xs" href="visualizarSolicitacao.php?acao=visualizar&id=<?php echo $solicitacao['solid']; ?>"><i class="fa fa-eye"></i></a>
                                                <!--<a class="btn btn-warning btn-xs" href="editarSolicitacao.php?acao=editar&id=<?php echo $solicitacao['solid']; ?>"><i class="fa fa-pencil"></i></a>-->
                                                <!--<a class="btn btn-danger btn-xs" href="" data-toggle="modal" data-id="<?php echo $solicitacao['solid']; ?>" ><i class="fa fa-times"></i></a>-->
                                            </td>
                                        </tr>
                                    <?php } ?>
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
         <!-- FIM DIV CONTEUDO ABERTO -->

         <!-- INICIO MODAL - INFO -->
         <?php
            include '../layout/infoAcao.php';
            include '../../assets/js/cancelarSolicitacao.js';
         ?>
         <!-- FIM MODAL - INFO -->

         <!-- INICIO FOOTER -->
         <div id="fimPrincipal">
            <?php include '../layout/footer.php'; ?>
         </div>
         <!-- FIM  FOOTER -->
      </div>
      <!-- FIM DIV CONTEUDO TOTAL -->
   </body>
</html>
