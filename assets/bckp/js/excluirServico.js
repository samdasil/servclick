<script type="text/javascript">

     // MODAL DELETAR -----------------------------------
    $('a.btn.btn-danger.btn-xs').on('click', function() {

        var id = $(this).data('id');
        var url = "../../control/controlExcluirServico.php?acao=deletar&id="+id+";";

        //var id = $(this).data('id'); /* Pegar o ID a ser removido */
        $('span.id').text(id); // inserir o ID da tabela dentro do modal


        $("a.deleta-sim").click(function() {
            $.ajax({
                type: "GET",
                dataType: "html",
                url: url,
                data: 'id='+id, /*atributo ID deve estar no Controller para ser recebido como GET ou Request */

                success: function(respostaDaURL) {

                    $("#modalDelete").modal('hide');

                    if (respostaDaURL == "") {
                        respostaDaURL = "Não houve resposta da página" + url;
                    }

                    $('span.status').text(respostaDaURL);
                    $("#modalStatus").modal('show');

                    $("a.status-yes").click(function() {
                        window.location.reload();
                    });


                },
                error: function(respostaDaURL) {

                    $("#modalDelete").modal('hide');

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

        $('#modalDelete').modal('show'); // modal aparece
    });


    </script>
