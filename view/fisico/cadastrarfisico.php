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
				<form class="login100-form validate-form" action="ControllerFisico.php">
					<span class="login100-form-logo">
						<!--<i class="zmdi zmdi-landscape"></i>-->
						<img src="../../layout/assets/images/servclick-icone-100x90.png" style="margin-bottom: 20%;">
					</span>

					<span class="login100-form-title p-b-60 p-t-27">
						Serviços
					</span>
					<div class="frase-perfil">
						<button class="frase-perfil">
							<p>Cadastro de Pessoa Física</p>
						</button>
					</div>

					<div class="wrap-input100 validate-input" data-validate="cpf">
						<input class="input100" type="text" name="cpf" placeholder="CPF">
						<span class="focus-input100" data-placeholder="&#xf283;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Informe seu nome">
						<input class="input100" type="text" name="nome" placeholder="Nome">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100">
						<p>Descrição</p>
						<textarea class="input100"></textarea>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "exemplo@eservclick.com.br">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100" data-placeholder="&#x2709;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "(92) 99999-9999">
						<input class="input100" type="text" name="fone" placeholder="Fone">
						<span class="focus-input100" data-placeholder="&#xe32c;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "(92) 9999-9999">
						<input class="input100" type="text" name="fixo" placeholder="Fixo">
						<span class="focus-input100" data-placeholder="&#xf2bc;"></span>
					</div>

					<div class="wrap-input100 validate-input"">
						<input class="input100" type="file" name="foto" placeholder="sua foto">
						
					</div>
					
					<div class="acesso">
						<hr>
						<div class="config-text"><p>ENDEREÇO</p></div>
						<hr>
					</div>

					<div class="wrap-input100 validate-input" data-validate="CEP">
						<input class="input100" type="text" name="cep" placeholder="CEP">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Logradouro (rua, avenida)">
						<input class="input100" type="text" name="login" placeholder="Logradouro (rua, avenida)">
						<span class="focus-input100" data-placeholder="&#xf095;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Cidade">
						<input class="input100" type="text" name="cidade" placeholder="Cidade">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Bairro">
						<input class="input100" type="text" name="cidade" placeholder="Bairro">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Estado">
						<input class="input100" type="text" name="estado" placeholder="Estado">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Número">
						<input class="input100" type="text" name="numero" placeholder="Número">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Complemento">
						<input class="input100" type="text" name="complemento" placeholder="Complemento">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="acesso">
						<hr>
						<div class="config-text"><p>PÁGINAS WEB</p></div>
						<hr>
					</div>

					<div class="wrap-input100 validate-input" data-validate="http://www.meusite.com.br">
						<input class="input100" type="url" name="site" placeholder="Site">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="https://www.facebook.com/meuface">
						<input class="input100" type="url" name="facebook" placeholder="Facebook">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="http://www.instagram/meuinsta">
						<input class="input100" type="url" name="instagram" placeholder="Instagram">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="https://pinterest/pinterest">
						<input class="input100" type="url" name="pinterest" placeholder="Pinterest">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="http://www.tweeter/meutweeter">
						<input class="input100" type="url" name="tweeter" placeholder="tweeter">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="http://www.meusite.googlesites.com">
						<input class="input100" type="url" name="google" placeholder="Google">
						<span class="focus-input100" data-placeholder="&#xf3e0;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Cadastrar
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