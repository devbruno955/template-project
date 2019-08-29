<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$id =  $_GET['id'] ;
$category = Table::Fetch('bairros', $id);
 
if(!empty($category)){
	$edicao = true; 
}

if (!$edicao) { // cadastro
	
	if(!is_post()){
		include template('manage_category_editbairros');
	}
	else{ 
		 
		$table = new Table('bairros', $_POST); 
		$uarray = array('uf', 'cidade', 'nome');
		 
		$flag = $table->insert($uarray);
		
		if($flag){
			Session::Set('notice', 'Dados cadastrados com sucesso.');
			redirect( WEB_ROOT . "/vipmin/category/indexbairros.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/category/indexbairros.php");
		}
	
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_category_editbairros');
	}
	else{
	
		$table = new Table('bairros', $_POST); 
		$uarray = array('uf', 'cidade', 'nome');
		 
		$flag = $table->update($uarray); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados alterados com sucesso:');
			redirect( WEB_ROOT . "/vipmin/category/indexbairros.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados');
			redirect( WEB_ROOT . "/vipmin/category/indexbairros.php");
		}
	} 
}