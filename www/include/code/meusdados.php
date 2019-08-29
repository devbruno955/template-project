<?php

need_login();
if ( $_POST ) {
 
	$update = array(
	 	'email' => $_POST['email'],
	//	'username' => $_POST['username'],
		'realname' => utf8_encode($_POST['realname']),
	    'zipcode' => $_POST['cep_'],
	    'address' => utf8_encode($_POST['endereco_']), 
	    'numero' => $_POST['numero_'], 
	    'complemento' => utf8_encode($_POST['complemento_']), 
	    'ddd' => $_POST['ddd_'],
	    'mobile' => $_POST['numero_'],
	    'bairro' => utf8_encode($_POST['bairro_']),
	    'cidadeusuario' => utf8_encode($_POST['cidadeusuario_']),
	    'estado' => $_POST['estado_'],
	    'ddd' => $_POST['ddd_'],
	    'mobile' => $_POST['telefone_'],
	    'entrega_telefone' => $_POST['entrega_telefone_'],
		'city_id' => abs(intval($_POST['websites3'])),
	 );
 
	if ( trim($_POST['password']) != "" )
	{
		$sqlaux = ", password = '".trim($_POST['password'])."'";
		
		if(trim($_POST['password']) == trim($_POST['password2'])){
			$update['password'] = trim($_POST['password']);
			$update['senha']     = trim($_POST['password']);
		}
	}
	  
	if ( ZUser::Modify($login_user['id'], $update) ) {
		
		 $sql = "update partner set mobile = '".$_POST['telefone_']."', phone = '".$_POST['entrega_telefone_']."', estado = '".$_POST['estado_']."', title = '".utf8_encode($_POST['realname'])."', address = '".utf8_encode($_POST['endereco_'])."',  bairro = '".utf8_encode($_POST['bairro_'])."',  cep = '".$_POST['cep_']."',  cidade = '".utf8_encode($_POST['cidadeusuario_'])."', numero = '". $_POST['numero_']."' $sqlaux where username = '".$_POST['email']."'";
		$rs = mysql_query($sql);
		
		
		$msg = 'Dados modificados com sucesso, aperte crtl + f5 para visualizar as modificações!' ;
	} else {
		$msg = 'Houve uma falha na atualização dos dados!' ;
	 }
}

$readonly['email'] = defined('UC_API') ? '' : 'readonly';
$readonly['username'] = defined('UC_API') ? 'readonly' : '';
	
$pagetitle = "";



?>