<?php

include "../../app.php"; 

if($_REQUEST['acao']=='verifica_regras_pre_compra'){
	$error =  verifica_regras_pre_compra();
	echo trim($error);
}
else if($_REQUEST['acao']=='insere_dados_pagamento'){
	insere_dados_pagamento($_REQUEST['team_id'],$_REQUEST['idpedido'],$_REQUEST['valor'],$_REQUEST['partner_id'],$_REQUEST['idplano'],$_REQUEST['status_pagamento'],$_REQUEST['mensagem']);
}
else if($_REQUEST['acao']=='buscaParcelas'){
	buscaParcelas();
}
else if($_REQUEST['acao']=='finalizaanuncio'){
	finalizaanuncio();
}
else if($_REQUEST['acao']=='gravaplano'){
	gravaplano($_REQUEST['partner_id'],$_REQUEST['idplano'],"",$_REQUEST['idanuncio']);
}
else if($_REQUEST['acao']=='atualizapagamentoanuncio'){
	atualizapagamentoanuncio();
}
else if($_REQUEST['acao']=='verreserva'){
	verreserva( RemoveXSS($_REQUEST['inicioperiodo']), RemoveXSS($_REQUEST['fimperiodo']), RemoveXSS($_REQUEST['idanuncio']), RemoveXSS($_REQUEST['hoscrianca']), RemoveXSS($_REQUEST['hosadulto']));
	sleep(1);
}
else  if($_REQUEST['acao']=='get_id_pagamento'){
	echo get_id_pagamento(); 
}
else  if($_REQUEST['acao']=='frete'){ 
	$qtd =  $_REQUEST['qtd'] ;
	$id =  $_REQUEST['idoferta'] ;
	$team = Table::Fetch('team', $id); 
	$peso = $team['peso'];
	$peso = str_replace(",",".",$peso);
	$pesototal = (int)$qtd  * $peso ;
	
	if( $team['fretegratuito'] == "1"){
		$valor = "0,00";
	}
	else if( $team['valorfrete'] != "" and $team['valorfrete'] != "0,00" ){
		$valor = $team['valorfrete'];
	}
	else{
		$valor = calculaFrete(41106, $team['ceporigem'], $_REQUEST['cep_destino'], $pesototal, $team['altura'], $team['largura'] , $team['comprimento'] , $team['team_price']);
	}
	echo $valor;
}

else  if($_REQUEST['acao']=='pegadata'){ 
	echo date("d/m/Y H:i:s");
}
 
?>