<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('market');
 
$id =  $_GET['id'] ;
$category = Table::Fetch('cidades', $id);
 
if(!empty($category)){
	$edicao = true; 
}

if (!$edicao) { // cadastro
	
	if(!is_post()){
		include template('manage_category_editcidades');
	}
	else{ 
		 
		$table = new Table('cidades', $_POST); 
		
		$table->imagem = upload_image('imagem', null, 'cidades-destaques', true);		
		$uarray = array('uf',  'nome', 'descricao', 'destaque', 'imagem');
		 
		$flag = $table->insert($uarray);
		
		if($flag){
			Session::Set('notice', 'Dados cadastrados com sucesso!');
			redirect( WEB_ROOT . "/vipmin/category/indexcidades.php");
		}
		else{
			Session::Set('notice', 'Erro ao inserir dados!');
			redirect( WEB_ROOT . "/vipmin/category/indexcidades.php");
		}
	
	} 
}

else  { // edicao
 
	if(!is_post()){
		include template('manage_category_editcidades');
	}
	else{
	
		$table = new Table('cidades', $_POST); 
		
		$table->imagem = upload_image('imagem', $category['imagem'], 'cidades-destaques', true);
		$uarray = array('uf',  'nome', 'descricao', 'destaque', 'imagem');
		 
		$table->SetPk('id', $id); 
		$flag = $table->update($uarray); 
		
		if ( $flag) {
			Session::Set('notice', 'Dados alterados com sucesso!');
			redirect( WEB_ROOT . "/vipmin/category/indexcidades.php");
		}
		else{
			Session::Set('notice', 'Erro na alteração dos dados!');
			redirect( WEB_ROOT . "/vipmin/category/indexcidades.php");
		}
	} 
}