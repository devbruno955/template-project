<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');
need_anunciante(); 


$id = abs(intval($_GET['id']));
$tipo =  $_REQUEST['team_type'];
$url = "index.php";
$team = $eteam = Table::Fetch('team', $id);
if(!empty($team)){
	$edicao = true; 
}
	$login_user_id = $_SESSION['partner_id'];
	$anunciante = Table::Fetch('partner', $login_user_id);
	$saldo = get_saldo($anunciante['id']);
	if ($saldo > 0) {
		$pago = 'sim';
	}else{
		$pago = 'nao';
	} 
	if($INI['option']['moderacaoanuncios']=="N" or $edicao){
		$status_oferta = '1';
	}
	else  {
		$status_oferta = '0';
	} 
if ( is_get() && empty($team) ) {
	$team = array();
	$team['id'] = "";
	$team['user_id'] = $login_user_id;
	$team['begin_time'] = strtotime('+0 days');
	$team['begin_time2'] = date('H:i');
	$team['end_time2'] =   strtotime('+1 months +1 days');
	$team['end_time'] =   strtotime('+1 months +1 days');  
	$team['pago'] = $pago;
	$team['usou_bonus'] = $usoubonus;
}
else if ( is_post() ) {
	$team = $_POST;
	 /*if(!empty($_FILES['video1']['name'])){
		$nomevideo = $_FILES['video1']['name'];
		$_tamanho = $_FILES['video1']['size'];
		$extensao = explode(".", $nomevideo);
		$extensao = $extensao[1];
		$_extValidas = array(".mpeg",".avi","mp4");
		if(!in_array($extensao,$_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extenção do vídeo1 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extenção <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo1 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
	}
	 if(!empty($_FILES['video2']['name'])){
		$nomevideo = $_FILES['video2']['name'];
		$_tamanho = $_FILES['video2']['size'];
		$extensao = explode(".", $nomevideo);
		$extensao = $extensao[1];
		$_extValidas = array(".mpeg",".avi","mp4"); 
		if(!in_array($extensao,$_extValidas)) {
			Session::Set('error', '<div style=margin-top:11px>A extenção do vídeo2 é inválida. Utilize apenas vídeos MPEG, AVI ou MP4. Você enviou uma extenção <b>'.$extensao.'</b></div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		} 
		if($_tamanho > 2100000){
			Session::Set('error', '<div style=margin-top:11px>O seu vídeo2 ultrapassou o tamanho permitido de 2MB </div>');
			redirect( WEB_ROOT . "/vipmin/team/".$url);
		}
	}*/
    $idplano 	 =  busca_plano_cliente($login_user_id );
	if($idplano){
		$dias 					=  getdiasplanocliente($idplano);
		$team['begin_time']  	=  strtotime('+0 days');
		$team['end_time']		=  strtotime('+'.$dias.' days'); 
		$team['begin_time2'] 	= date('H:i');  
		$team['end_time2'] 		=   date('H:i');    
	}
	else{
		if(!$edicao){
			$dataaux = explode("/",$team['end_time']);
			$dafafim = $dataaux['2']."-".$dataaux['1']."-".$dataaux['0']; 
			$team['begin_time'] = strtotime(str_replace("/","-",$team['begin_time']). " ".$team['begin_time2']);
			$team['end_time'] = strtotime($dafafim);  
		}
	}
	$adicionais = '';
    foreach($_POST['adicionais'] as $add) {
    $adicionais .= $add . ',';
    }
    unset($_POST['adicionais']);
    $team['imob_adicionais'] = $adicionais;
    $team['imob_cidade'] = getCidadeTeam($team['city_id']);
	
	if( $team['imob_iptu'] == ""){
		 $team['imob_iptu'] = 0.00;
	}
	if( $team['imob_condominio'] == ""){
		 $team['imob_condominio'] = 0.00;
	}
	
	$insert = array(
		'title',  'team_price', 'summary', 'sort_order', 'user_id', 'city_id', 
		'group_id', 'partner_id','video1','video2', 'imob_cidade','team_type',
		'mostrarpreco','create_time','mostrarseguranca', 'anunciogratis', 'imob_rua', 
		'imob_numero','imob_condominio', 'imob_cep', 'imob_estado', 'imob_finalidade', 
		'imob_tipo', 'imob_bairro', 'imob_quartos', 'imob_vagas', 'imob_adicionais', 
		'imob_area', 'imob_area_p', 'imob_iptu', 'imob_codigo', 'imob_suite', 'imob_banheiro', 
		'imob_financiamento',
		'img0', 'img1', 'img2', 'img3', 'img4', 'img5', 'img6', 'img7', 'img8', 'img9', 'img10', 'img11', 'img12', 'img13'
		, 'img14', 'img15', 'img16', 'img17', 'img18', 'img19'

		);
	if(!$edicao){
			$insert[]="begin_time";
			$insert[]="end_time";
			$insert[]="usou_bonus";
			$insert[]="pago";
			$insert[]="status";
	 }
    if($edicao){
	  //if(empty($team['imob_finalidade'])){ unset($insert[ array_search('imob_finalidade', $insert) ]); }
	  if(empty($team['imob_quartos'])){ unset($insert[ array_search('imob_quartos', $insert) ]); }
	  if(empty($team['imob_vagas'])){ unset($insert[ array_search('imob_vagas', $insert) ]); } 
	}
	$idnovaoferta =	getUltimoIdOferta();
	if($INI['option']['moderacaoanuncios']=="N" ){
		$status='1';
	}
	else  {
		$status='0';
	}


	$tituloanuncio = buscaTituloAnuncio($team);
	$team['id'] = $idnovaoferta;
	$team['user_id'] = $login_user_id;
	$team['create_time'] = date('Y-m-d');
	$team['status'] = $status;
	$team['usou_bonus'] = $usoubonus;
	$team['title'] = $tituloanuncio;
    $team['team_price'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['team_price'])));
    $team['imob_condominio'] =  str_replace("R$ ","",str_replace(",",".",str_replace(".","",$team['imob_condominio'])));
	$team['city_id'] = $team['city_id'];
	$team['partner_id'] = abs(intval($team['partner_id']));
	$team['sort_order'] = abs(intval($team['sort_order']));
	$team['pre_number'] = abs(intval($team['pre_number']));  
	
	$team['img0'] 		= upload_image('img0',$eteam['img0'],'team');
	$team['img1'] 		= upload_image('img1',$eteam['img1'],'team');
	$team['img2'] 		= upload_image('img2',$eteam['img2'],'team');
	$team['img3'] 		= upload_image('img3',$eteam['img3'],'team');
	$team['img4'] 		= upload_image('img4',$eteam['img4'],'team');
	$team['img5'] 		= upload_image('img5',$eteam['img5'],'team'); 
	$team['img6'] 		= upload_image('img6',$eteam['img6'],'team'); 
	$team['img7'] 		= upload_image('img7',$eteam['img7'],'team'); 
	$team['img8'] 		= upload_image('img8',$eteam['img8'],'team'); 
	$team['img9'] 		= upload_image('img9',$eteam['img9'],'team'); 
	$team['img10'] 		= upload_image('img10',$eteam['img10'],'team'); 
	$team['img11'] 		= upload_image('img11',$eteam['img11'],'team'); 
	$team['img12'] 		= upload_image('img12',$eteam['img12'],'team'); 
	$team['img13'] 		= upload_image('img13',$eteam['img13'],'team'); 
	$team['img14'] 		= upload_image('img14',$eteam['img14'],'team'); 
	$team['img15'] 		= upload_image('img15',$eteam['img15'],'team'); 
	$team['img16'] 		= upload_image('img16',$eteam['img16'],'team'); 
	$team['img17'] 		= upload_image('img17',$eteam['img17'],'team'); 
	$team['img18'] 		= upload_image('img18',$eteam['img18'],'team'); 
	$team['img19'] 		= upload_image('img19',$eteam['img19'],'team'); 

	$insert = array_unique($insert);
	$table = new Table('team', $team);
	$table->SetStrip('summary');
	if ( $edicao ) {
		$table->SetPk('id', $id);
		$table->update($insert);
		Session::Set('notice', 'Informações modificadas com sucesso!');
		redirect( WEB_ROOT . "/adminanunciante/team/");
	}
	else if ( $table->insert($insert) ) {
		$idnovo = mysql_insert_id();
		if($pago=="sim"){ 
			$partner_plano_id = get_partner_plano_id($_SESSION['partner_id']);
			atualiza_partner_plano_id($idnovo,$partner_plano_id );
		}
		if($idnovo){
			
			Session::Set('notice', 'Novo anúncio adicionado ('.$idnovo.')'  );	 
			
			if($INI['option']['moderacaoanuncios'] == 'Y'){
				$body = 
				"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
				<div> O an&uacute;ncio ".$idnovo." foi criado. Ap&oacute;s a efetiva&ccedil;&atilde;o do pagamento voc&ecirc; ir&aacute; receber um email para moder&aacute;-lo antes de sua publica&ccedil;&atilde;o.</div><br>
				<b> Dados do An&uacute;ncio</b>
				<p>T&iacute;tulo: ".buscaTituloAnuncio($team)."</p> 
				<p>Pre&ccedil;o: ".$team['team_price']."</p> 
				<p>Link para o an&uacute;ncio: ".$INI['system']['wwwprefix']."/imovel/visualizacao/".$idnovo."/</p>
				</body></html>" ;
			}else{
				$body = 
				"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
				<div> O an&uacute;ncio ".$idnovo." foi criado. Ap&oacute;s a efetiva&ccedil;&atilde;o do pagamento o an&uacute;ncio ser&aacute; ativado.</div><br>
				<b> Dados do An&uacute;ncio</b>
				<p>T&iacute;tulo: ".buscaTituloAnuncio($team)."</p> 
				<p>Pre&ccedil;o: ".$team['team_price']."</p> 
				<p>Link para o an&uacute;ncio: ".$INI['system']['wwwprefix']."/imovel/visualizacao/".$idnovo."/</p>
				</body></html>" ;
			}
			
			$emailadmin = $INI['mail']['from'];
			$emailuser = getEmailParceiro($team['partner_id']);

			 if(enviar( $emailadmin,utf8_decode($INI["system"]["sitename"]." - Anúncio ".$idnovo." aguardando pagamento"), $body )){
			 	 enviar( $emailuser,utf8_decode($INI["system"]["sitename"])." - ".utf8_decode($team['title']). " - ( ID: ".$idnovo." )" , $body );
				 $enviou =  true;
			 }
			
		 
		 if ($pago == 'nao') {
				if($INI["pagseguro"]["acc"] != ""){
					if ($anunciante['max_anuncios'] > '0') {
						Session::Set('notice', 'Seu limite de anúncios se esgotou, caso queira continuar, por favor, selecione um de nossos planos.');	
						include template('manage_team_pagamentopagseguro');
						exit; 
					}
					if ($anunciante['max_anuncios'] < '0') {
						Session::Set('notice', 'Por favor, selecione um plano para publicar seu anúncio.');	
						include template('manage_team_pagamentopagseguro');
					exit;
					}
				}
				else {
					 echo "Você ainda não configurou a sua conta do pagseguro. Por favor acesse Sistema->Métodos de Pagamento";
					 exit;
				}
			 } else {
				if ($status_oferta == '0') {
					Session::Set('notice', 'Novo anúncio adicionado e aguardando modera&ccedil;&atilde;o do administrador ('.$idnovo.')' );	
					 redirect( WEB_ROOT . "/adminanunciante/team/".$url);
				} else {
					Session::Set('notice', 'Novo anúncio adicionado e publicado ('.$idnovo.')' );	
					redirect( WEB_ROOT . "/adminanunciante/team/".$url);
				}
			 } 
			exit; 
		}
		else {
			Session::Set('error', utf8_encode('Não foi possível cadastrar o novo anúncio'));
			 redirect(null);
		}
	}
	else {
		Session::Set('error', utf8_encode('Falha ao atualizar o anúncio'.$idnovaoferta));
	   redirect(null);
	}
}
$groups = DB::LimitQuery('category', array(
			'condition' => array( 'zone' => 'group', ),
			));
$groups = Utility::OptionArray($groups, 'id', 'name');
$condition[] = " tipo = 'parceiro' or tipo is null";
$partners = DB::LimitQuery('partner', array(
			'condition' => array( $condition ),
			'order' => 'ORDER BY id DESC',
			));
$partners = Utility::OptionArray($partners, 'id', 'title');
$selector = $team['id'] ? 'edit' : 'create';
$addArray = explode(',', $team['imob_adicionais']);
include template('manage_team_anunciante_edit');