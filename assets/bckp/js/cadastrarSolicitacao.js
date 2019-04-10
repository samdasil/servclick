<script type="text/javascript">

   $('.enviar-dados').on('click', function(evento) {

        evento.preventDefault();

           var dados = $("#formulario").serialize();

           console.log(dados);

           $.ajax({
               type: "POST",
               dataType: "html",
               url: "../../control/controlCadastrarSolicitacao.php",
               data: dados,

               success: function(respostaDaURL) {

                   if (respostaDaURL == "") {
                       respostaDaURL = "Não houve resposta da página" + url;
                   }

                   $('span.status').text(respostaDaURL);
                   $("#modalStatus").modal('show');

                   $("a.status-yes").click(function() {
                       window.location.href="../../view/cliente/listarSolicitacao.php?id=<?php echo $id; ?>";"";
                   });


               },
               error: function(respostaDaURL) {

                   if (respostaDaURL == "") {
                       respostaDaURL = "Não houve resposta da página" + url;
                   }

                   $('span.status').text(respostaDaURL);
                   $("#modalStatus").modal('show');

                   $("a.status-yes").click(function() {
                       window.location.reload();
                   });
               }
           });
   });

</script>
