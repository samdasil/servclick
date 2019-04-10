<?php
    
    $id = $_GET['id'];

    //include "../../control/controlVisualizarPerfilCliente.php";
    //$cliente = mysqli_fetch_assoc($resultado);
  
    require '../../layout/cliente/header-cliente.php';
    
?>
   </head>
   <body onload="remove()">
      <div id="principal">
      
         <!-- NAV SUPERIOR -->
         <div class="conteudoTotal">
            
            <!-- CONTEÚDO -->
            <div class="conteudo aberto">
                <!--<a class="botaoMenu"></a>-->
                 <span class="caminhoURL">
                 <i class="fa fa-home"></i> &nbsp home</span>
               <div class="painel">
                  <div class="painel_titulo">
                     <h4><i class="fa fa-home"></i>&nbsp Olá Sr(a) <?php //echo $cliente['clinome']; ?> </h4>
                  </div>
                  <div class="painel_corpo">

                      <div class="linha">
                        <div class="col1">
                          <a href="visualizarcliente.html<?php //echo $cliente['cliid']; ?>"><i class="fa fa-user fa-5x"></i></a><br>
                          <label class="label-icone">PERFIL</label>
                        </div>
                        <div class="col2">
                          <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>"><i class="fa fa-search fa-5x"></i></a>
                          <label class="label-icone">BUSCAR PROFISSIONAL</label>
                        </div>
                      </div>
                      <div class="linha">
                        <div class="col1">
                          <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>"><i class="fa fa-plus fa-5x"></i></a>
                          <label class="label-icone">NOVO SERVIÇO</label>
                        </div>
                        <div class="col2">
                          <a href="listarSolicitacao.php?id=<?php echo $cliente['cliid']; ?>"><i class="fa fa-bullhorn fa-5x"></i></a>
                          <label class="label-icone">MEUS SERVIÇOS</label>
                        </div>
                      </div>
                      <div class="linha">
                        <div class="col1">
                          <a href="listarHistorico.php?id=<?php echo $cliente['cliid']; ?>"><i class="fa fa-th-list fa-5x"></i></a>
                          <label class="label-icone">HISTÓRICO</label>
                        </div>
                        <div class="col2">
                          <a href="creditos.php?id=<?php echo $cliente['cliid']; ?>"><i class="fa fa-coffee fa-5x"></i></a>
                          <label class="label-icone">CRÉDITOS</label>
                        </div>
                      </div>

                    </div>
                  </div>
               <!--  FIM PAINEL CORPO -->
               </div>
            <!--  FIM PAINEL  -->
           </div>
         <!--  FIM CONTEUDO ABERTO -->
      </div>
      <!--  FIM CONTEUDO TOTAL -->
      <!-- INICIO FOOTER -->
            <?php include '../../layout/footer.php'; ?>
         <!-- FIM  FOOTER -->
      <!--  FIM FOOTER -->
    </div>
    <!--  FIM PRINCIPAL -->

   </body>
</html>
