

function abrir(pagina, largura, altura) {

    // Definindo meio da tela
    var esquerda = (screen.width - largura)/2;
    var topo     = (screen.height - altura)/2;

    // Abre a nova janela
    // window.open(pagina,'', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, fullscreen=yes ,height=' + altura + ', width=' + largura + ', top=' + topo + ', left=' + esquerda);

    window.location(pagina, '_blank');
}

function verifica(){

    var nomeUsu = document.getElementById('nome').value;
    var senhaUsu = document.getElementById('senha').value;

    if(nomeUsu == "admin" && senhaUsu == "admin")
    {
        //abrir("home/index.html", 900, 780);

        document.getElementById('nome').value = "";
        document.getElementById('senha').value = "";
        return true;
    }else{
        alert("[SISTEMA INFORMA]: Dados Incorretos! Verifique novamente!");
        return false;
    }

}

function verificaAbertura(){
    var nome    = document.getElementById("nome").value;
    var cargo   = document.getElementById("cargo").value;
    var usuario = document.getElementById("usuario").value;
    var senha   = document.getElementById("senha").value;

    usuario = usuario.toLowerCase();

    if(usuario=="admin" ) {

        alert("[Sistema Alerta]: Usuário não pode ser cadastrado como admin!"); return false;

    } else if (nome.length == 0 ||
          cargo.length == 0 ||
        usuario.length == 0 ||
          senha.length == 0 ||
                 nome == "" ||
                cargo == "" ||
              usuario == "" ||
                senha == ""
           )
    {

        alert("Erro, faltando Atributos a serem preenchidos!"); return false

    } else {

        alert("[SISTEMA] \n\n[Nome]: "+nome+"\n[Cargo]: "+cargo+"\n[Usuario]:"+usuario+"\n\n[Status]: Cadastrado com sucesso!");               return false;
    }
}



var arrayDia = new Array(7);
arrayDia[0] = "Domingo";
arrayDia[1] = "Segunda";
arrayDia[2] = "Terça";
arrayDia[3] = "Quarta";
arrayDia[4] = "Quinta";
arrayDia[5] = "Sexta";
arrayDia[6] = "Sábado";

var arrayMes = new Array(12);
arrayMes[0] = "Janeiro";
arrayMes[1] = "Fevereiro";
arrayMes[2] = "Março";
arrayMes[3] = "Abril";
arrayMes[4] = "Maio";
arrayMes[5] = "Junho";
arrayMes[6] = "Julho";
arrayMes[7] = "Agosto";
arrayMes[8] = "Setembro";
arrayMes[9] = "Outubro";
arrayMes[10]= "Novembro";
arrayMes[11]= "Dezembro";

function getMesExtenso(mes){
    return this.arrayMes[mes];
}

function getDiaExtenso(dia){
    return this.arrayDia[dia];
}

function mostrarDataHora(){
    var dataAtual  = new Date();
    var dia        = dataAtual.getDate();
    var diaSemana  = getDiaExtenso(dataAtual.getDay());
    var mes        = getMesExtenso(dataAtual.getMonth());
    var ano        = dataAtual.getFullYear();

    //retorno = "" + diaSemana + ", " + dia + " de " + mes + " de " + ano;
    retorno = "" + ano + "-" + mes + "-" + dia;
    document.getElementById("data").innerHTML = retorno;
}

function dataAtual(){
	/*var d = new Date();
	document.write(d.toLocaleString());

    var hora = new Date();
    document.write(hora.getHours()+" : "+hora.getMinutes()+" h");*/
    var now = new Date;
    var data = document.write (now.getFullYear() + " - " + (now.getMonth() +1) + " - " + now.getDate() );
    return data;
}
