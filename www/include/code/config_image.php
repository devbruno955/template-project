<?php


/*
if(option_yes('teamask')) { 

	$ask_con['team_id']  = $team_id; 
	$ask_con['aprovado'] = 'S'; 
	//$ask_con = array('length(comment)>0'); 
		
	$ask_count = Table::Count('ask', $ask_con);
	$asks = DB::LimitQuery('ask', array('condition'=>$ask_con, 'order'=>'ORDER BY id DESC'));
	print_r($asks);
}
 */


if($team['title'] != ""){
	$titletag =  "Comprando essa oferta, voc� tem ".$discount_rate."% de desconto, e economiza R$ ".number_format($discount_price, 2, ',', '.').". Aproveite pois faltam ".$intfalta." para esgotar." ;
}
else{
	$titletag =  utf8_decode($INI['system']['sitetitle']). " -  O Seu Portal de Compras Coletivas";
}
$titletag=" ";
$num = rand(0, 7);
if($team['layout'] == "3" or $team['layout'] == "5" ){
	$destaque = "pikachoose";
}
if($team['layout'] == "4"  ){
	$destaque = "pikachoose-line";
	$num =  7;
}
if(  $team['layout'] == "7" ){
	$destaque = "slidefull";
	$num = rand(0, 7);
}
if( $team['layout'] == "9" ){
	$destaque = "natural";
}

if($team['manterdimensao']=="1" or $team['layout'] == "9"){
// as imagens ir�o ficar com as dimensoes originais
	$imagem1 	= $team['image'];
	$imagem2 	= $team['image1'];
	$imagem3 	= $team['image2'];
	$galimagem1 = $team['gal_image1'];
	$galimagem2 = $team['gal_image2'];
	$galimagem3 = $team['gal_image3'];
	$galimagem4 = $team['gal_image4'];
	$galimagem5 = $team['gal_image5'];
	$galimagem6 = $team['gal_image6'];

}
else {
//  iremos tratar as imagens para ficar de acordo com o layout
	$imagem1 	= substr($team['image'],0,-4)."_".$destaque.".jpg";
	$imagem2 	= substr($team['image1'],0,-4)."_".$destaque.".jpg";
	$imagem3 	= substr($team['image2'],0,-4)."_".$destaque.".jpg";
	$galimagem1 = substr($team['gal_image1'],0,-4)."_".$destaque.".jpg";
	$galimagem2 = substr($team['gal_image2'],0,-4)."_".$destaque.".jpg";
	$galimagem3 = substr($team['gal_image3'],0,-4)."_".$destaque.".jpg";
	$galimagem4 = substr($team['gal_image4'],0,-4)."_".$destaque.".jpg";
	$galimagem5 = substr($team['gal_image5'],0,-4)."_".$destaque.".jpg";
	$galimagem6 = substr($team['gal_image6'],0,-4)."_".$destaque.".jpg";

}
 
$marginl = "-13px;";
if($oferta_ativa and !$ofertafechada and !$oferta_esgotada){
		$marginl = "-48px;";
}
else{
	$txb = "Faltam $qtdeparaativar para ativar a oferta";
}



?>