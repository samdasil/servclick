<script type="text/javascript">
       $(function(){
         $('#categoria').change(function(){
            if($(this).val()){
               //$('#categoria').hide();
               //$('.carregando').show();
               $.getJSON('../../control/controlDropdownServico.php?cat=',{categoria: $(this).val(),ajax:'true'}, function(j){
                  var options = '<option value="" disabled selected>Selecione o serviço </option>';
                  for(var i = 0; i < j.length; i++){
                     options += '<option value="' + j[i].serid + '">' + j[i].serdescricao + '</option>';
                  }
                  $('#servico').html(options).show();

                  //$('.carregando').hide();
               });
            }else{
               $('#servico').html('<option value="" disabled selected> Selecione o serviço </option>');
            }
         });
       });

</script>
