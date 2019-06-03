    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; servClick</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../assets/js/wow.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>   
</body>
</html>

<!-- script mask -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $("#cnpj").mask('00.000.000/0000-00')
        $("#cpf").mask('000.000.000-00')
        $("#cep").mask('00000-000')
        $("#fone").mask('(00) 00000-0000')
    })

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

    function getArea(obj) {              

        //var select = document.getElementById(obj.id);
        //var value  = select.options[select.selectedIndex].value;

        //console.log(value.length);
        switch (value) {
            case '0':
                document.getElementById('casa').style.display="block";
                document.getElementById('veiculo').style.display="none";
                document.getElementById('esporte').style.display="none";

            break
            case '1':
                document.getElementById('veiculo').style.display="block";
                document.getElementById('casa').style.display="none";
                document.getElementById('esporte').style.display="none";
            break
            case '2':
                document.getElementById('casa').style.display="block";
                //document.getElementById('casa').style.display="none";
                document.getElementById('veiculo').style.display="none";
            break
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

</script>