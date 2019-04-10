<script type="text/javascript">

  $('.enviar-dados').on('click', function(evento) {

         evento.preventDefault();
            var id = document.getElementById("id").value;
            var dados = $("#formulario").serialize();

            console.log(dados);

            $.ajax({
                type: "POST",
                dataType: "html",
                url: "../../control/controlEditarCliente.php?acao=editar&id="+id+"",
                data: dados,

                success: function(respostaDaURL) {

                    if (respostaDaURL == "") {
                        respostaDaURL = "Não houve resposta da página" + url;
                    }

                    $('span.status').text(respostaDaURL);
                    $("#modalStatus").modal('show');

                    $("a.status-yes").click(function() {
                        window.location.href="../../view/cliente/home.php?id="+id+"";
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
