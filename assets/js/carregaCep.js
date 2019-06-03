<script type="text/javascript">
        
        $(document).ready(function(){
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        function limpa_formulario_cep() {
            // Limpa valores do formulário de cep.
            $("#logradouro").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#estado").val("");
            $("#numero").val("");
            $("#cep").val("");
            document.getElementById("cep").focus();
            //$("#ibge").val("");
        }
        
        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouro").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");
                //$("#ibge").val("...");

                $.getJSON("carregarEndereco.php?cep="+cep+"", function(dados){
                    if (!("erro" in dados)) {
                        //console.log(dados);
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.cidade);
                        $("#estado").val(dados.estado);
                        document.getElementById("numero").focus();
                    } //end if.
                    else {
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                document.getElementById("numero").focus();

                                //$("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP: "+cep+" não encontrado.");
                                limpa_formulario_cep();
                            }
                        });
                    }
                }); 
 
                /*
                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouro").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                        document.getElementById("numero").focus();

                        //$("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        alert("CEP: "+cep+" não encontrado.");
                        limpa_formulario_cep();
                    }
                });*/
            } //end if.
            else {
                //cep é inválido.
                alert("Formato de CEP inválido.");
                limpa_formulario_cep();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    });
});

    </script>﻿﻿