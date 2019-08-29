<?php 
 
if($team['mostrarpreco']=="" or $team['mostrarpreco']=="1"  ){
	 $mostrarprecosim='checked="checked"';
}
else { 
	$mostrarpreconao='checked="checked"';
}

if($team['imob_financiamento'] == "1"){
	 $imob_financiamento_1 = 'checked="checked"';
}
else { 
	$imob_financiamento_0 = 'checked="checked"';
}

if($team['status']=="2"){
	$status2='checked="checked"';
}
else if($team['status']=="0"){
	$status0='checked="checked"';
}
else {
	$status1='checked="checked"';
} 

if($team['mostrarseguranca']=="" or $team['mostrarseguranca']=="1"  ){
	 $mostrarsegurancasim='checked="checked"';
}
else { 
	$mostrarsegurancanao='checked="checked"';
} 
   
   
 
?>
 