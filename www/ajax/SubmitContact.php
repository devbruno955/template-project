<?php

include ('../app.php');

/* É verificado os parâmetros que foram enviados via Ajax. */
if(isset($_POST["acao"]) and !(empty($_POST["acao"]))){
	
	$acao = $_POST["acao"];
	
	if($acao == "EnviarContato") {
	
		/* Parâmetros recebidos via Ajax. */
		$nome = strip_tags($_POST["nome"]);
		$email = strip_tags($_POST["email"]);
		$telefone = strip_tags($_POST["telefone"]);
		$mensagem = strip_tags($_POST["mensagem"]);
		$idOffer = (int) strip_tags($_POST["id"]);
		
		/* A data do qual a inserção foi efetuada. */
		$data = date("Y-m-d H:i:s");
		$team = Table::Fetch('team', $idOffer);
		$partner = Table::Fetch('partner', $team['partner_id']);
		
		/* Os dados são gravados em banco, e após o email é enviado. */
		$sql = "insert into propostas(idoferta, nome_proposta, email_proposta, telefone_proposta, proposta, data, user_id) 
		values('" . $idOffer . "', '" . $nome . "', '" . $email . "', '" . $telefone . "', '" . $mensagem . "', '" . $data . "', '" . $partner['id'] . "')";
		$rs = mysql_query($sql);
		$rows = mysql_affected_rows();

		if($rows >= 1) {
			
			/* Caso a proposta seja salva, é enviado um email ao anunciante. */
			$parametros = array('id' => $idOffer, 'nome' => $nome, 'email' => $email, 'telefone' => $telefone, 'mensagem' => $mensagem);
			$request_params = array(
				'http' => array(
					'method'  => 'POST',
					'header'  => implode("\r\n", array(
						'Content-Type: application/x-www-form-urlencoded',
						'Content-Length: ' . strlen(http_build_query($parametros)),
					)),
					'content' => http_build_query($parametros),
				)
			);				

			$request  = stream_context_create($request_params); 
			$mensagem = file_get_contents($INI["system"]["wwwprefix"]."/templates/envioproposta.php", false, $request);			 
			
			/* O email é enviado ao anunciante informando da proposta. */
			if(enviar($partner['contact'], utf8_decode(ASSUNTO_PROPOSTA), utf8_decode($mensagem))){
				$enviado = true;
				echo utf8_encode("<img src='" . $PATHSKIN . "/images/correct.png'> Proposta salva e enviada com sucesso!");
			}
			else {
				echo utf8_encode("<img src='" . $PATHSKIN . "/images/correct.png'> Proposta salva, porém ocorreu um erro desconhecido ao enviar!");
			}

			unset($mensagem);
		}
		else {
			
			echo utf8_decode("<img src='" . $PATHSKIN . "/images/attention.png'> Erro ao enviar proposta. Tente novamenta mais tarde!");
			return false;
		}
	}
	else {
		/* Tratamento de erros. */
		return false;
	}
}
else {
	/* Tratamento de erros. */
	return false;
}

?>