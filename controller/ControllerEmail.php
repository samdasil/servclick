<?php
	
	class ControllerEmail
	{

		public function enviarEmail($dados='')
		{
			
			if (!isset($dados)) return false;

			$cliente 		= $dados['idcliente'];
			$email    		= $dados['email']; 
			$nome    		= $dados['nome'];
			$assunto 		= $dados['assunto'];
			
			if ($assunto == 'denuncia') {
				$descricao 		 = $dados['descricao'];
				$perfil  		 = $dados['perfil'];
				$profissional    = $dados['profissional'];
				$preco 			 = isset($dados['preco'])   		?  'Preço abusivo'				 : '';
				$pessimo		 = isset($dados['pessimo']) 		?  'Péssimo serviço'			 : '';
				$conduta 		 = isset($dados['conduta']) 		?  'Conduta imprópria'			 : '';
				$desqualificado  = isset($dados['desqualificado']) 	?  'Profissional desqualificado' : '';
				$outros 		 = isset($dados['outros'])			?  'Outros motivos'				 : '';

				$msg	 = "Cliente  : ".$cliente." - ".$nome."";
				$msg	.= "E-mail   : ".$email."<br><br>";
				$msg    .=  "O profissional <strong>".$profissional."</strong> pessoa ".$perfil." recebeu uma denúncia.<br>"; 
				$msg	.= "- ".$preco."<br>";
				$msg	.= "- ".$pessimo."<br>";
				$msg	.= "- ".$conduta."<br>";
				$msg	.= "- ".$desqualificado."<br>";
				$msg	.= "- ".$outros."<br>";
				$msg	.= "<br>";
				$msg	.= $descricao;
			}

			$email  = new Email($email, $nome, $assunto, $msg);
			
			$ret = $email->send();

			if ($assunto == 'denuncia' && $ret) {
				$_SESSION['denuncia'] =  'success';
                echo "<script>window.location = 'home.php';</script>";
			}

		}

	}

?>