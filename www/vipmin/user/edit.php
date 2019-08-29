<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$tipo = $_REQUEST['tipo'];
$adminnew =  $_REQUEST['adminnew'];
$id = abs(intval($_GET['id']));
$email =  $_REQUEST['email'];
$username =  $_REQUEST['username'];

$sql = "ALTER TABLE  `user` ADD  `tipo` VARCHAR( 50 ) NULL  ";
$rs = @mysql_query($sql);


$sql = "ALTER TABLE  `user` ADD  `image` VARCHAR( 200 ) NULL  ";
$rs = @mysql_query($sql);

$sql = "ALTER TABLE  `partner` ADD  `image` VARCHAR( 200 ) NULL  ";
$rs = @mysql_query($sql);


$pg="index.php";
 
if($tipo=="admin"){
 $pg="manager.php";
}

if($adminnew=="true"){
	$urlaux =  "?adminnew=true";
}

if($id){
	$user = Table::Fetch('user', $id);

	$user['cidadeusuario'] = stripslashes($user['cidadeusuario']);
	$user['bairro'] = stripcslashes($user['bairro']);
	$user['address'] = stripslashes($user['address']);
}
 
if(!empty($user)){
	$edicao = true; 
}

if ( !$edicao ) { // cadastro
	
	if( !is_post()){
		include template('manage_user_edit');
	}
	else{ 
		 
		$table = new Table('user', $_POST);

		$table->cidadeusuario = mysql_real_escape_string($table->cidadeusuario);
	 	$table->bairro = mysql_real_escape_string($table->bairro);
	 	$table->address = mysql_real_escape_string($table->address);
		$table->image = upload_image('upload_image', null, 'parceiro', true);
		$logotipo = $table->image;
		$up_array = array(
				'username', 'realname','email','create_time','manager', 'whatsapp',
				'mobile', 'zipcode', 'address','password','zipcode','ip','senha',
				'secret', 'qq','local','bairro','money','cpf','estado','cidadeusuario','tipo','image'
				);
  
		$eu = Table::Fetch('user', $email, 'email');
		if ($eu ) {
			Session::Set('notice', 'Email existente. Por favor, use outro email');
			redirect( WEB_ROOT . "/vipmin/user/edit.php".$urlaux);
		}
		  	 
		$eu = Table::Fetch('user', $username, 'username');
		if ($eu ) {
			Session::Set('notice', 'Login existente. Por favor, use outro login');
			redirect( WEB_ROOT . "/vipmin/user/edit.php".$urlaux);
		}
		  
		if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
		if ( $id == 1 && $login_user_id > 1 ) {
			Session::Set('notice', 'Você não tem privilegio de super administrador para fazer as alterações');
			
			redirect( WEB_ROOT . "/vipmin/user/$pg");
		}
		$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
		$table->senha = $table->password;
		$table->create_time = time();
		$table->password = ZUser::GenPassword($table->password);
	   
		$flag = $table->insert($up_array); 
		
		if ( $flag) {
			if($adminnew=="true"){
			
			 Session::Set('notice', 'Dados do administrador cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/manager.php");
			}
			else{
			
			$table = new Table('partner', $_POST);
			$table->SetStrip('location', 'other');
			$table->create_time = time();
			$table->username 	=  $_POST['email'];
			$table->contact 	=  $_POST['email']; 
			$table->password 	=  $_POST['password'];
			$table->tipo 		= "Particular";   
			//$table->numero 		=  $_POST['numero'];     
			$table->cidade 		=  $_POST['cidadeusuario'];      
			$table->bairro 		=  $_POST['bairro'];       
			$table->cep 		=  $_POST['zipcode'];      
			$table->estado 		=  $_POST['estado'];      
			$table->title 		=  $_POST['realname'];    
			//$table->city_id 	=  $_POST['city_id'];      
			//$table->mobile 		=  $u['ddd']."-".$u['mobile'];      
			$table->mobile 		=   $_POST['mobile'];    
			$table->whatsapp 		=   $_POST['whatsapp'];   
			//$table->phone 		=  $_POST['entrega_telefone'];       
			$table->address  	=  $_POST['address'];      
			$table->group_id 	=  0;      
			$table->city_id 	=  0;      
			$table->cpf 	 	=  $_POST['cpf'];      
			//$table->user_id 	=  $user['id'];      
			$table->max_anuncios 	=  "-1";      
			$table->image =  $logotipo; 
			 
			$flag = $table->insert(array(
				'username', 'user_id', 'city_id', 'title', 'group_id', 'create_time',
				'location',   'contact', 'mobile',  'whatsapp',
				'password', 'address',    'bairro', 'cep', 'estado', 'cidade','numero', 'tipo','cpf','max_anuncios','tipo','image'
			));
			  
			 Session::Set('notice', 'Dados cadastrados com sucesso !');
			 redirect( WEB_ROOT . "/vipmin/user/index.php");
			 
			}
			
			//replicando na tabela de parceiro	 	
				  
			//$partner = Table::Fetch('partner', $_POST['email'],'contact');
		
			 
			
			
				//Session::Set('partner_id', mysql_insert_id());
				
			 
		
		}
		else{
			if($adminnew=="true"){
			
			 Session::Set('notice', 'Dados do administrador cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/manager.php");
			}
			else{
			 Session::Set('notice', 'Dados cadastrados com sucesso');
			 redirect( WEB_ROOT . "/vipmin/user/index.php");
			 
			}
		} 
	} 
}

else  { // edicao
  
	if(!is_post()){
		include template('manage_user_edit');
	}
	else{ 
		$table = new Table('user', $_POST);

		$table->cidadeusuario = mysql_real_escape_string($table->cidadeusuario);
		 	$table->bairro = mysql_real_escape_string($table->bairro);
		 	$table->address = mysql_real_escape_string($table->address);
			
			$table->image = upload_image('upload_image', null, 'parceiro', true);
		    $logotipo =  $table->image;
			
			$up_array = array(
				'username', 'realname','email','manager', 'whatsapp',
				'mobile', 'zipcode', 'address','zipcode','qq','local','bairro','money','cpf','estado','cidadeusuario','tipo','image'
				);
		$eu = Table::Fetch('user', $email, 'email');
		
		if ($eu && $eu['id'] != $id ) {
			Session::Set('notice', 'Email existente. Por favor, use outro email');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
		  	 
		$eu = Table::Fetch('user', $username, 'username');
		if ($eu && $eu['id'] != $id ) {
			Session::Set('notice', 'Login existente. Por favor, use outro login');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
		
		if ( $login_user_id == 1 && $id > 1 ) { $up_array[] = 'manager'; }
		if ( $id == 1 && $login_user_id > 1 ) {
			Session::Set('notice', 'Você não tem privilegio de super administrador para fazer as alterações');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
	 
		$table->manager = (strtoupper($table->manager)=='Y') ? 'Y' : 'N';
		if ($table->password ) {
			$senha = $table->password;
			$table->password = ZUser::GenPassword($table->password);
			$up_array[] = 'password';
			$sql = "update user set senha='".$senha."' where username='".$table->username."'";
			mysql_query($sql);
			 
		} 
		
		$flag = $table->update($up_array); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados do usuario alterados com sucesso');
			
			$table = new Table('partner', $_POST);
			$table->SetStrip('location', 'other');
			//$table->create_time = time();
			$table->username 	=  $_POST['email'];
			$table->contact 	=  $_POST['email']; 
			$table->password 	=  $_POST['password'];
			$table->tipo 		= "Particular";   
			//$table->numero 		=  $_POST['numero'];     
			$table->cidade 		=  $_POST['cidadeusuario'];      
			$table->bairro 		=  $_POST['bairro'];       
			$table->cep 		=  $_POST['zipcode'];      
			$table->estado 		=  $_POST['estado'];      
			$table->title 		=  $_POST['realname'];    
			//$table->city_id 	=  $_POST['city_id'];            
			$table->mobile 		=   $_POST['mobile']; 
			$table->whatsapp 		=   $_POST['whatsapp'];     
			//$table->phone 		=  $_POST['entrega_telefone'];       
			$table->address  	=  $_POST['address'];      
			$table->group_id 	=  0;      
			$table->city_id 	=  0;      
			$table->cpf 	 	=  $_POST['cpf'];      
			//$table->user_id 	=  $user['id'];   
			
			$flag = $table->update(array(
				'username', 'user_id', 'city_id', 'title', 'group_id',
				'location',   'contact', 'mobile',  'whatsapp',
				'password', 'address',    'bairro', 'cep', 'estado', 'cidade','numero', 'tipo','cpf', 'tipo',
			));
			 
			    $sql = "update partner set image = '$logotipo',  username = '".$_POST['email']."',contact = '".$_POST['email']."', password = '".$_POST['password']."',cidade = '".$_POST['cidadeusuario']."',bairro = '".$_POST['bairro']."',cep = '".$_POST['zipcode']."',estado = '".$_POST['estado']."',mobile = '".$_POST['mobile']."', whatsapp = '".$_POST['whatsapp']."',address = '".$_POST['address']."',cpf = '".$_POST['cpf']."' where username= '".$_POST['email']."'";
				$rs = mysql_query($sql);
				if(!$rs){
					Session::Set('notice',mysql_error());
				}
			 
			 redirect( WEB_ROOT . "/vipmin/user/$pg");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/user/edit.php?id=$id");
		}
	} 
}