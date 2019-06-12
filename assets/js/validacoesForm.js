
//cria mascara entradas dos inputs em formularios
$(document).ready(function(){
    $("#cpf").mask('000.000.000-00')
    $("#cnpj").mask('00.000.000/0000-00')
    $("#cep").mask('00000-000')
    $("#fone").mask('(00) 00000-0000')
    $("#fixo").mask('(00) 0000-0000')
    $("#valor").mask('0000,00')
});
