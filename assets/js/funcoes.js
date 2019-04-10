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