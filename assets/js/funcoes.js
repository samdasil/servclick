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

function next(obj) {

              document.getElementById('div_dados').style.display="none";
              document.getElementById('div_endereco').style.display="none";
              document.getElementById('div_acesso').style.display="none";

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