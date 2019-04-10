  function remove(){
    var tam = $(window).width();
    
    if (tam <480 ){  
         $('.sidebar').hide();  
         $('.conteudo').removeClass('aberto');  
    }
}

    $(document).ready(function() {


        
        /* 
            Carrega o Menu Fechado se acima de 480px de largura
            Evento ocorre ao dar resize na página
        */  
        $(window).resize(function(){

            var tam = $(window).width();
            if (tam >=480 ){
            if(!$( ".conteudo" ).hasClass( "aberto" )) { 
                $('.conteudo').addClass('aberto'); 
                $('.sidebar').show(); 
                }
            }else{

            $('.conteudo').removeClass('aberto');
            $('.sidebar').hide();  
            } 
        });
        
       
        
      $('.botaoMenu').on('click', function() {

          if($( ".conteudo" ).hasClass( "aberto" )) {
              
              $('.conteudo').removeClass('aberto');
              $('.sidebar').hide(); 
               console.log("[Menu]: Fechado");

          } else {
            
            $('.conteudo').addClass('aberto'); 
            $('.sidebar').show();     
            $('.sidebar').css('visibility', 'visible');                   
            console.log("[Menu]: Aberto");  

          }    
      });

});