<?
$esgotado 				=	false;
$aguardando 		 	=	false;
$oferta_ativa 		 	=	false;
$oferta_cancelada 	 	=	false;
$oferta_esgotada 	 	=	false;
$finalizacao 	 		=	false;
$reprovada 	 			=	false;
$naopago 				= 	false;
$usou_bonus				= 	false;

$end_time 				= 	date('YmdHis', $one['end_time']); 
$begin_time 		 	= 	date('YmdHis', $one['begin_time']); 
$date 					= 	date('YmdHis');

if($one['usou_bonus'] == "sim" ){ 
	$usou_bonus 	= true;
} 
if($one['pago'] != "sim" and $one['pago'] != ""  ){   							
	 $naopago 	= true;
}
else if( $end_time  <= $date){
	$finalizacao 	= true;
	 
} 
else if($one['status'] === "0"){ 
	$aguardando 	= true;
}
else if($one['status'] == 2){ 
	$reprovada 	= true;
}
else if( $end_time  > $date){
	$oferta_ativa 	= true;
}
 
  
if($naopago ){
		$bandeira = "Flag-blue.ico";
		$title = "Aguardando pagamento.";
}							
else if($finalizacao ){
		$bandeira = "Flag-red.png";
		$title = "An�ncio Finalizado";
}
else if($naopago ){
		$bandeira = "Flag-blue.ico";
		$title = "Aguardando pagamento.";
}

else if($aguardando ){
		$bandeira = "Flag-yellow.ico";
		$title = "Este an�ncio est� pago mas ainda n�o publicado. Aguardando modera��o";
}	

else if($reprovada  ){
		$bandeira = "Flag-black.ico";
		$title = "Este an�ncio foi reprovado pelo moderador.";
}	

else  { // oferta ativa
		$bandeira = "Flag-green.ico";
		$title = "Este an�ncio est� ativo";
}

if($one['anunciogratis']=="s" and $finalizacao){
	$title = "An�ncio Gr�tis. An�ncio finalizado";
	$bandeira = "Flag-red.png";
}

else if($one['anunciogratis']=="s" and $one['status'] == 0){
	$title = "An�ncio Gr�tis. Aguardando modera��o";
	$bandeira = "Flag-yellow.ico";
}
else if($one['anunciogratis']=="s" and $one['status'] == 1){
	$title = "An�ncio Gr�tis. Este an�ncio est� publicado";
	$bandeira = "Flag-green.ico";
}
else if($one['anunciogratis']=="s" and $one['status'] == 2){
	$title = "An�ncio Gr�tis. Este an�ncio foi reprovado";
	$bandeira = "Flag-black.ico";
}
else if($usou_bonus and $finalizacao ){
		$bandeira = "Flag-red.png";
		$title = "An�ncio de plano. Este an�ncio est� finalizado";
}
else if($usou_bonus and $aguardando  ){
		$bandeira = "Flag-yellow.png";
		$title = "An�ncio de plano. Aguardando modera��o";
}	
else if($usou_bonus and $one['status'] == 1  ){
		$bandeira = "Flag-green.png";
		$title = "An�ncio de plano. Este an�ncio est� publicado";
}	
else if($usou_bonus and $one['status'] == 2  ){
		$bandeira = "Flag-black.png";
		$title = "An�ncio de plano. Este an�ncio foi reprovado";
}
  
if( $one['visualizados']==""){
		 $one['visualizados']="0";
}
if( $one['clicados']==""){
		 $one['clicados']="0";
}
$tituloanuncio = buscaTituloAnuncio($one);
?>