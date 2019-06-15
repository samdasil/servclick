<?php

class ControllerServico
{
	public function SolicitarServico($dados)
	{
		if ( !isset($dados) ) return false;

		date_default_timezone_set('America/Sao_Paulo');
		$servico 	= new Servico();
		$endereco 	= new Endereco();
		$servDao 	= new ServicoDAO();
		$endDao 	= new EnderecoDAO();

		$servico->setDtinicio(date('Y-m-d'));
		$servico->setArea($dados['area']);
		$servico->setDescricao($dados['descricao']);
		$servico->setCliente($dados['cliente']);
		$servico->setStatus_(1); //1=aberto

		if ($dados['endereco'] == 2 ) {
			$endereco->setCep($dados['cep']);
			$endereco->setLogradouro($dados['logradouro']);
			$endereco->setBairro($dados['bairro']);
			$endereco->setCidade($dados['Cidade']);
			$endereco->setEstado($dados['estado']);
			$endereco->setNumero($dados['numero']);
			$endereco->setComplemento($dados['complemento']);

			$result = $endDao->cadastrar($endereco);

			if ($result) {
				$servico->setEndereco($result['endereco']);
			} else {
				$_SESSION['erro-endereco'] = 'erro';
				return false;
			} 

		} else {
			$servico->setEndereco($dados['endereco1']);
		}

		//print_r($servico);exit;
		$result = $servDao->cadastrar($servico);
		//echo $result;exit;
		if ( $result ) {
			$_SESSION['solicitacao'] = 'success';
			echo "<script>window.location = 'meus-servicos.php';</script>";
		} else {
			$_SESSION['solicitacao'] = 'erro';
			echo "<script>window.location = 'solicitar-servico.php';</script>";
		}

	}	

	//carregar servico por ID
	public function carregarServico($idservico)
	{
		if ( !isset($idservico) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$result  = $servDao->carregar($idservico); 

		if ( $result ) {

			$servico->setIdservico($result[0]['idservico']);
			$servico->setDescricao($result[0]['descricao']);
			$servico->setDtinicio($result[0]['dtinicio']);
			$servico->setDtfim($result[0]['dtfim']);
			$servico->setValor($result[0]['valor']);
			$servico->setNota($result[0]['nota']);
			$servico->setComentario($result[0]['comentario']);
			$servico->setStatus_($result[0]['status_']);
			$servico->setCliente($result[0]['cliente']);
			$servico->setFisico($result[0]['fisico']);
			$servico->setJuridico($result[0]['juridico']);
			$servico->setArea($result[0]['area']);
			$servico->setEndereco($result[0]['endereco']);
			
			
			return $servico;
		} else {
			$_SESSION['servico'] = 'erro';
			echo "<script>window.location = 'listar-solicitacoes.php';</script>";
		}
	}

	//listar servicos do cliente
	public function listarServicos($idcliente) 
	{	
		if ( !isset($idcliente) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$list = $servDao->listarServicos($idcliente);
		
		return $list;

	}

	//listar servicos do profissional
	public function listarServicosProfissional($profissional, $perfil) 
	{	
		if ( !isset($profissional) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$list = $servDao->listarServicosProfissional($profissional, $perfil);
		
		return $list;

	}

	//listar servicos abersos por area
	public function listarServicosPorStatus($idarea, $status_) 
	{	

		if ( !isset($idarea) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$list = $servDao->listarServicosPorStatus($idarea, $status_);
		
		return $list;

	}

	//aceitar servico
	public function aceitarServico($dados)
	{
		if ( !isset($dados) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$servico->setIdservico($dados['idservico']);
		$servico->setValor(str_replace(',','.',$dados['valor']));
		$servico->setStatus_(2); //2=andamento
		
		if ( isset($dados['idfisico']) ) {
			$servico->setFisico($dados['idfisico']); //2=andamento	
		} else if (isset($dados['idjuridico']) ) {
			$servico->setJuridico($dados['idjuridico']); //2=andamento	
		}

		$result = $servDao->aceitar($servico);

		if ( $result ) {

			$_SESSION['aceitar-servico'] = 'success';
			echo "<script>window.location = 'meus-servicos.php';</script>";
			return true;

		} else {

			$_SESSION['aceitar-servico'] = 'erro';
			echo "<script>window.location = 'listar-solicitacoes.php';</script>";
			return false;

		}

	}

	//finalizar servico
	public function finalizarServico($dados)
	{
		if ( !isset($dados) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$servico->setIdservico($dados['idservico']);
		$servico->setDtfim(date('Y-m-d'));
		$servico->setStatus_(3); //3=finalizado

		$result = $servDao->finalizar($servico);

		if ( $result ) {

			$_SESSION['finalizar-servico'] = 'success';
			echo "<script>window.location = 'meus-servicos.php';</script>";
			return true;

		} else {

			$_SESSION['finalizar-servico'] = 'erro';
			echo "<script>window.location = 'listar-solicitacoes.php';</script>";
			return false;

		}

	}

	//cancelar servico
	public function cancelarServico($dados)
	{
		if ( !isset($dados) ) return false;

		$servico = new Servico();
		$servDao = new ServicoDAO();

		$servico->setIdservico($dados['idservico']);
		$servico->setDtfim(date('Y-m-d'));
		$servico->setStatus_(4); //4=cancelado

		$result = $servDao->cancelar($servico);

		if ( $result ) {

			$_SESSION['cancelar-servico'] = 'success';
			echo "<script>window.location = 'meus-servicos.php';</script>";
			return true;

		} else {

			$_SESSION['cancelar-servico'] = 'erro';
			echo "<script>window.location = 'meus-servico.php';</script>";
			return false;

		}

	}
}	

?>