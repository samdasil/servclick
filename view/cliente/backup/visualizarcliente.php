<!DOCTYPE html>
<html lang="en">
<head>
  <title>ServClick</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="../../layout/app/images/servclick-icone-70x40.png"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="../../layout/app/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../../layout/app/css/util.css">
  <link rel="stylesheet" type="text/css" href="../../layout/app/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('../../layout/app/images/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="ControllerCliente.php">
          <span class="form-logo">
            <img class="img-logo" src="../../layout/assets/images/cliente/sammy.jpg">
          </span>

          <div class="frase-perfil">
            <button class="frase-perfil">
              <p>Dalyana Goes</p>
            </button>
          </div>

          <div class="wrap-input100-view validate-input" data-validate="cpf">
            <input class="input100" type="text" name="cpf" value="000.000.000-00" disabled>
            <span class="focus-input100" data-placeholder="&#xf3e0;"></span>
          </div>

          <div class="wrap-input100-view validate-input" data-validate = "Informe seu nome">
            <input class="input100" type="text" name="nome" value="Dalyana Goes" disabled>
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100-view validate-input" data-validate = "exemplo@eservclick.com.br">
            <input class="input100" type="text" name="email" value="exemplo@eservclick.com.br" disabled>
            <span class="focus-input100" data-placeholder="&#xf674;"></span>
          </div>

          <div class="wrap-input100-view validate-input" data-validate = "(92) 99999-9999">
            <input class="input100" type="text" name="fone" value="(92) 99999-9999" disabled>
            <span class="focus-input100" data-placeholder="&#xf095;"></span>
          </div>

          <div class="wrap-input100-view validate-input" data-validate = "CEP">
            <input class="input100" type="text" name="cep" value="00.000-000" disabled>
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>
          
          <div class="wrap-input100-view validate-input" data-validate = "Login">
            <input class="input100" type="text" name="login" value="dalyana" disabled>
            <span class="focus-input100" data-placeholder="&#xf095;"></span>
          </div>

          <!--
          <div class="wrap-input100 validate-input" data-validate = "*******">
            <input class="input100" type="password" name="senha" placeholder="Senha">
            <span class="focus-input100" data-placeholder="&#xf095;"></span>
          </div>
          -->

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" href="editarcliente.php">
              Editar
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/bootstrap/js/popper.js"></script>
  <script src="../../layout/app/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/daterangepicker/moment.min.js"></script>
  <script src="../../layout/app/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="../../layout/app/js/main.js"></script>

</body>
</html>