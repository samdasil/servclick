// funcao para mudar imagem no cadastro e edicao de profissionais
function alterarImagem() {
            
    var input = document.getElementById("foto");
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function(event){
        var img = document.getElementById("img");
        img.src = event.target.result;
    //document.form.img.src = document.form.foto.files[0].name;   
    }

}

// funcao para mudar foto no cadastro e edicao de clientes
function alterarFoto() {
            
    var input = document.getElementById("foto");
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function(event){
        var img = document.getElementById("img");
        img.src = event.target.result;
    //document.form.img.src = document.form.foto.files[0].name;   
    }

}

// funcao para mudar logo no cadastro e edicao de profissionais juridicos
function alterarLogo() {
            
    var input = document.getElementById("foto");
    var fReader = new FileReader();
    fReader.readAsDataURL(input.files[0]);
    fReader.onloadend = function(event){
        var img = document.getElementById("img");
        img.src = event.target.result;
    //document.form.img.src = document.form.foto.files[0].name;   
    }

}

function cliente_next(obj) {

    document.getElementById('div_dados').style.display="none";
    document.getElementById('div_endereco').style.display="none";
    document.getElementById('div_acesso').style.display="none";

    switch (obj.id) {
        case 'dados-right':
            if($('#foto').val() ==  ""){
                document.getElementById('div_dados').style.display="block";
                $('.vfoto').css('display','block');
                $('.vfoto').css('margin-top','2vh');
                $('#foto').focus();
            }else if($('#cpf').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vcpf').css('display','block');
                $('#cpf').focus();
            }else if(!validaCPF($('#cpf').val().replace(/\D/g, ''))) {
                document.getElementById('div_dados').style.display="block";
                $('.vcpf2').css('display','block');
                $('#cpf').focus();
            }else if($('#nome').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vnome').css('display','block');
                $('#nome').focus();
            }else if($('#email').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if(!validaEmail($('#email').val())){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if($('#fone').val() ==  '' || $('#fone').val().length<15){
                document.getElementById('div_dados').style.display="block";
                $('.vfone').css('display','block');
                $('#fone').focus();
            }else{
                document.getElementById('div_dados').style.display="none";
                document.getElementById('div_endereco').style.display="block";
                if($('#cep').val()!=""){
                    document.getElementById('sub-end').style.display="block";
                    $('#cep').focus();
                }else{
                    $('#cep').focus();   
                }
            }
        break
        case 'endereco-right':
            if($('#logradouro').val() ==  ""){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vlogradouro').css('display','block');
                $('#logradouro').focus();
            }else if($('#cidade').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vcidade').css('display','block');
                $('#cidade').focus();
            }else if($('#bairro').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vbairro').css('display','block');
                $('#bairro').focus();
            }else if($('#estado').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vestado').css('display','block');
                $('#estado').focus();
            }else if($('#numero').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vnumero').css('display','block');
                $('#numero').focus();
            }else{
                document.getElementById('div_endereco').style.display="none";
                document.getElementById('div_acesso').style.display="block";
                document.getElementById('sub-end').style.display="none";
            }
            
        break
        case 'endereco-left':
            document.getElementById('div_endereco').style.display="none";
            document.getElementById('sub-end').style.display="none";
            document.getElementById('div_dados').style.display="block";
        break
        case 'acesso-left':
            document.getElementById('div_acesso').style.display="none";
            if($('#logradouro').val() != ""){
                document.getElementById('sub-end').style.display="block";
            }
            document.getElementById('div_endereco').style.display="block";
        break
    }
}

function validoff(obj){
    var span = '.v'+ this.value;
    $('span').css('display','none');
}

function proximo_vw_serv(obj) {

      document.getElementById('div_endereco').style.display="none";

   switch (obj.id) {
      case 'dados-right':
        document.getElementById('div_dados').style.display="none";
        document.getElementById('div_endereco').style.display="block";
      break
      case 'endereco-right':
        document.getElementById('div_endereco').style.display="none";
        document.getElementById('div_acesso').style.display="block";
      break
      case 'endereco-left':
        document.getElementById('div_endereco').style.display="none";
        document.getElementById('div_dados').style.display="block";
      break
      case 'acesso-left':
        document.getElementById('div_acesso').style.display="none";
        document.getElementById('div_endereco').style.display="block";
      break
   }
}

function fisico_next(obj) {

      document.getElementById('div_dados').style.display="none";
      document.getElementById('div_area').style.display="none";
      document.getElementById('div_endereco').style.display="none";
      document.getElementById('div_pagina').style.display="none";
      document.getElementById('div_acesso').style.display="none";

    switch (obj.id) {
        case 'dados-right':
            if($('#foto').val() ==  ""){
                document.getElementById('div_dados').style.display="block";
                $('.vfoto').css('display','block');
                $('.vfoto').css('margin-top','2vh');
                $('#foto').focus();
            }else if($('#cpf').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vcpf').css('display','block');
                $('#cpf').focus();
            }else if(!validaCPF($('#cpf').val().replace(/\D/g, ''))) {
                document.getElementById('div_dados').style.display="block";
                $('.vcpf2').css('display','block');
                $('#cpf').focus();
            }else if($('#nome').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vnome').css('display','block');
                $('#nome').focus();
            }else if($('#email').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if(!validaEmail($('#email').val())){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if($('#fone').val() ==  '' || $('#fone').val().length<15){
                document.getElementById('div_dados').style.display="block";
                $('.vfone').css('display','block');
                $('#fone').focus();
            }else{
                document.getElementById('div_dados').style.display="none";
                document.getElementById('div_area').style.display="block";
                $('#area').focus();   
            }
        break
        case 'area-right':
            if($('#categoria').val() == ""){
                document.getElementById('div_area').style.display="block";
                $('.vcategoria').css('display','block');
                $('#categoria').focus();   
            }else if($('#area').val() == ""){
                document.getElementById('div_area').style.display="block";
                document.getElementById('div_desc').style.display="none";
                $('.varea').css('display','block');
                $('#area').focus();   
            }else if($('#descricao').val() == ""){
                document.getElementById('div_area').style.display="block";
                document.getElementById('div_desc').style.display="block";
                $('.vdescricao').css('display','block');
                $('#descricao').focus();   
            }else{
                document.getElementById('div_area').style.display="none";
                document.getElementById('div_endereco').style.display="block";
                if($('#logradouro').val() != ""){
                    document.getElementById('sub-end').style.display="block";
                }
            }
        break
        case 'area-left':
            document.getElementById('div_area').style.display="none";
            document.getElementById('div_dados').style.display="block";
        break
        case 'endereco-right':
            if($('#logradouro').val() ==  ""){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vlogradouro').css('display','block');
                $('#logradouro').focus();
            }else if($('#cidade').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vcidade').css('display','block');
                $('#cidade').focus();
            }else if($('#bairro').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vbairro').css('display','block');
                $('#bairro').focus();
            }else if($('#estado').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vestado').css('display','block');
                $('#estado').focus();
            }else if($('#numero').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vnumero').css('display','block');
                $('#numero').focus();
            }else{
                document.getElementById('div_endereco').style.display="none";
                document.getElementById('div_pagina').style.display="block";
                document.getElementById('sub-end').style.display="none";
            }
        break
        case 'endereco-left':
            document.getElementById('div_endereco').style.display="none";
            document.getElementById('sub-end').style.display="none";
            document.getElementById('div_area').style.display="block";
        break
        case 'pagina-right':
            document.getElementById('div_pagina').style.display="none";
            document.getElementById('div_acesso').style.display="block";
        break
        case 'pagina-left':
            document.getElementById('div_pagina').style.display="none";
            document.getElementById('div_endereco').style.display="block";
            if($('#logradouro').val() != ""){
                document.getElementById('sub-end').style.display="block";
            }
        break
        case 'acesso-left':
            document.getElementById('div_acesso').style.display="none";
            document.getElementById('div_pagina').style.display="block";
        break
   }
}

function juridico_next(obj) {

      document.getElementById('div_dados').style.display="none";
      document.getElementById('div_area').style.display="none";
      document.getElementById('div_endereco').style.display="none";
      document.getElementById('div_pagina').style.display="none";
      document.getElementById('div_acesso').style.display="none";

    switch (obj.id) {
        case 'dados-right':
            if($('#foto').val() ==  ""){
                document.getElementById('div_dados').style.display="block";
                $('.vfoto').css('display','block');
                $('.vfoto').css('margin-top','2vh');
                $('#foto').focus();
            }else if($('#cnpj').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vcnpj').css('display','block');
                $('#cnpj').focus();
            }else if(!validaCNPJ($('#cnpj').val().replace(/\D/g, ''))) {
                document.getElementById('div_dados').style.display="block";
                $('.vcnpj2').css('display','block');
                $('#cnpj').focus();
            }else if($('#razaosocial').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vrazaosocial').css('display','block');
                $('#razaosocial').focus();
            }else if($('#nomefantasia').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vnomefantasia').css('display','block');
                $('#nomefantasia').focus();
            }else if($('#responsavel').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vresponsavel').css('display','block');
                $('#responsavel').focus();
            }else if($('#email').val() ==  ''){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if(!validaEmail($('#email').val())){
                document.getElementById('div_dados').style.display="block";
                $('.vemail').css('display','block');
                $('#email').focus();
            }else if($('#fone').val() ==  '' || $('#fone').val().length<15){
                document.getElementById('div_dados').style.display="block";
                $('.vfone').css('display','block');
                $('#fone').focus();
            }else{
                document.getElementById('div_dados').style.display="none";
                document.getElementById('div_area').style.display="block";
                $('#area').focus();   
            }
        break
        case 'area-right':
            if($('#categoria').val() == ""){
                document.getElementById('div_area').style.display="block";
                $('.vcategoria').css('display','block');
                $('#categoria').focus();   
            }else if($('#area').val() == ""){
                document.getElementById('div_area').style.display="block";
                document.getElementById('div_desc').style.display="none";
                $('.varea').css('display','block');
                $('#area').focus();   
            }else if($('#descricao').val() == ""){
                document.getElementById('div_area').style.display="block";
                document.getElementById('div_desc').style.display="block";
                $('.vdescricao').css('display','block');
                $('#descricao').focus();   
            }else{
                document.getElementById('div_area').style.display="none";
                document.getElementById('div_endereco').style.display="block";
                if($('#logradouro').val() != ""){
                    document.getElementById('sub-end').style.display="block";
                }
            }
        break
        case 'area-left':
            document.getElementById('div_area').style.display="none";
            document.getElementById('div_dados').style.display="block";
        break
        case 'endereco-right':
            if($('#logradouro').val() ==  ""){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vlogradouro').css('display','block');
                $('#logradouro').focus();
            }else if($('#cidade').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vcidade').css('display','block');
                $('#cidade').focus();
            }else if($('#bairro').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vbairro').css('display','block');
                $('#bairro').focus();
            }else if($('#estado').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vestado').css('display','block');
                $('#estado').focus();
            }else if($('#numero').val() ==  ''){
                document.getElementById('div_endereco').style.display="block";
                document.getElementById('sub-end').style.display="block";
                $('.vnumero').css('display','block');
                $('#numero').focus();
            }else{
                document.getElementById('div_endereco').style.display="none";
                document.getElementById('div_pagina').style.display="block";
                document.getElementById('sub-end').style.display="none";
            }
        break
        case 'endereco-left':
            document.getElementById('div_endereco').style.display="none";
            document.getElementById('sub-end').style.display="none";
            document.getElementById('div_area').style.display="block";
        break
        case 'pagina-right':
            document.getElementById('div_pagina').style.display="none";
            document.getElementById('div_acesso').style.display="block";
        break
        case 'pagina-left':
            document.getElementById('div_pagina').style.display="none";
            document.getElementById('div_endereco').style.display="block";
            if($('#logradouro').val() != ""){
                document.getElementById('sub-end').style.display="block";
            }
        break
        case 'acesso-left':
            document.getElementById('div_acesso').style.display="none";
            document.getElementById('div_pagina').style.display="block";
        break
   }
}

   
function tamanhoCampo(){
    var cep = document.getElementById('cep').value;
    console.log(cep);

    if(cep.length>8){
        console.log(cep.value)
        buscaCep()
    }

}

function fone(){
    var ddd = document.getElementById('ddd').value;
    //console.log(cep);

    if(ddd.length>1){
        //console.log(fone.value)
        $('#fone').focus();
    }

}

//Quando o campo cep perde o foco.
//$("#cep").blur(function() {
function buscaCep(){

    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#logradouro").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
        $("#numero").val("");
        $("#cep").val("");
        $("#cep").focus();
        //$("#ibge").val("");
    }
    
    //Nova variável "cep" somente com dígitos.
    var cep = document.getElementById('cep').value.replace(/\D/g, '');

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

            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#sub-end").css("display", "block");
                    $("#lupa").css("display", "none");
                    $("#logradouro").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#estado").val(dados.uf);
                    $("#numero").focus();

                    //$("#ibge").val(dados.ibge);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    alert("CEP: "+cep+" não encontrado.");
                    limpa_formulario_cep();
                    $("#sub-end").css("display", "none");
                    $("#lupa").css("display", "block");
                }
            });
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
}


function validaCPF(cpf) {
    var Soma;
    var Resto;
    Soma = 0;

    console.log(cpf);
  if (cpf == "00000000000") return false;
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) ) return false;


    return true;
}

function validaEmail(email) {
  er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
  
  if(er.exec(email))
    {
      return true;
    } else {
      return false;
    }
}

function validaCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function validFormCliente() {

    if($('#cpf').val() ==  ''){
        $('.vcpf').css('display','block');
        $('#cpf').focus();
        return false;
    }else if(!validaCPF($('#cpf').val().replace(/\D/g, ''))) {
        $('.vcpf2').css('display','block');
        $('#cpf').focus();
        return false;
    }else if($('#nome').val() ==  ''){
        $('.vnome').css('display','block');
        $('#nome').focus();
        return false;
    }else if($('#email').val() ==  ''){
        $('.vemail').css('display','block');
        $('#email').focus();
        return false;
    }else if(!validaEmail($('#email').val())){
        $('.vemail').css('display','block');
        $('#email').focus();
        return false;
    }else if($('#fone').val() ==  '' || $('#fone').val().length<15){
        $('.vfone').css('display','block');
        $('#fone').focus();
        return false;
    }else if($('#logradouro').val() ==  ""){
        $('.vlogradouro').css('display','block');
        $('#logradouro').focus();
        return false;
    }else if($('#cidade').val() ==  ''){
        $('.vcidade').css('display','block');
        $('#cidade').focus();
        return false;
    }else if($('#bairro').val() ==  ''){
        $('.vbairro').css('display','block');
        $('#bairro').focus();
        return false;
    }else if($('#estado').val() ==  ''){
        $('.vestado').css('display','block');
        $('#estado').focus();
        return false;
    }else if($('#numero').val() ==  ''){
        $('.vnumero').css('display','block');
        $('#numero').focus();
        return false;
    }else{
        return true;
    }

}


function validFormServico() {

    if($('#area').val() ==  ''){
        $('.varea').css('display','block');
        $('#area').focus();
        return false;
    }else if($('#descricao').val() ==  ''){
        $('.vdescricao').css('display','block');
        $('#descricao').focus();
        return false;
    }else if($('#prodrio').prop('checked') ==  false && $('#outro').prop('checked') == false){
        $('.vendereco').css('display','block');
        return false;
    }

}

$(window).on('load', function() {
    var pre_loader = $('#preloader');
    pre_loader.fadeOut('slow', function() {
      $(this).remove();
    });
});

function preloader() {
    
    var pre_loader = $('#preloader');
    pre_loader.fadeOut('slow', function() {
      $(this).remove();
    });
    
}

function acesso() {
    if ($('#status_').val('1')) {
        $(".nome").readonly('true');
        $(".senha").readonly('true');
    } else {
        $(".nome").readonly('false');
        $(".senha").readonly('false');
    }
        
}