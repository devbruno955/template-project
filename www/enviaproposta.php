<?php

require_once "./app.php";
 
$idoferta = strval($_REQUEST['idoferta']);
$nome_proposta = strval($_REQUEST['nome_proposta']); 
$email_proposta = strval($_REQUEST['email_proposta']);
$ddd_proposta = strval($_REQUEST['ddd_proposta']);
$telefone_proposta = strval($_REQUEST['telefone_proposta']);
$proposta = strval($_REQUEST['proposta']);
$team  = Table::Fetch('team',$idoferta);

if($ddd_proposta=="DDD"){
	$ddd_proposta="";
}
if($telefone_proposta=="Telefone"){
	$telefone_proposta="";
} 
$user_id = $team['partner_id'];
$partner  = Table::Fetch('partner',$user_id);
	  

if ( $_POST ) {

	$dominio = getDomino($email_proposta);
	
	if(!checkdnsrr ($dominio)){
			echo  utf8_encode("Por favor, informe um email válido");
			exit;
	}
	
	$city_id=0;
	
	ZSubscribe::Create($email_proposta, $city_id);
 
 $parametros = array( 'idoferta' => $idoferta, 'nome_proposta' => $nome_proposta, 'email_proposta' => $email_proposta,  'ddd_proposta' => $ddd_proposta ,'telefone_proposta' => $telefone_proposta,'proposta' => $proposta, 'user_id' => $user_id);
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
 
	if(enviar( $partner['contact'],ASSUNTO_PROPOSTA,utf8_decode($mensagem))){
			$enviado=true;
	}

	$mensagem="";
	unset($mensagem);
	
	$data = date("Y-m-d H:i:s");
  
	$insert = array(
	'idoferta', 'nome_proposta', 'email_proposta', 'ddd_proposta',
	'telefone_proposta', 'proposta', 'data', 'user_id', 
	);
	
	$propostas = $_POST;
	
	$propostas['data'] = $data;
	$propostas['user_id'] = $team['partner_id'];
	
	$table = new Table('propostas', $propostas);
	
	if (  !$enviado ) {
		echo utf8_encode("Sua proposta não foi enviada por email, por favor tente mais tarde.") ;	
	}
	else if ( !$table->insert($insert) and $enviado ) {
		echo utf8_encode("Sua proposta foi enviada por email, mas não conseguimos salvá-la. ".mysql_error()) ;
	}
	
	 

}
 
