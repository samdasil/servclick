<script type="text/javascript">

   $('.enviar-dados').on('click', function(evento) {

        evento.preventDefault();

           var dados = $("#formulario").serialize();

           console.log(dados);

           //console.log($("#empCEP").val() ); /*DEBUG*/

           $.ajax({
               type: "POST",
               dataType: "html",
               url: "../../control/controlCadastrarSindico.php",
               data: dados,

               success: function(respostaDaURL) {

                   if (respostaDaURL == "") {
                       respostaDaURL = "Não houve resposta da página" + url;
                   }

                   $('span.status').text(respostaDaURL);
                   $("#modalStatus").modal('show');

                   $("a.status-yes").click(function() {
                       window.location.href="../../view/admin/listarSindico.php";
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
