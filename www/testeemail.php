<?php
		include("app.php");

			$idnovo = 159;
			$team = Table::Fetch("team", $idnovo);

			$body = 
			"<html><head></head><body style='font-size:12px;'><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><meta http-equiv='Content-Language' content='pt-br' />
			<div> O an&uacute;ncio ".$idnovo." foi criado. Ap&oacute;s a efetiva&ccedil;&atilde;o do pagamento por parte do anunciante voc&ecirc; ir&aacute; receber um email para moder&aacute;-lo antes de sua publica&ccedil;&atilde;o.</div><br>
			<b> Dados do An&uacute;ncio</b>
			<p>T&iacute;tulo: ".utf8_decode(buscaTituloAnuncio($team))."</p> 
			<p>Pre&ccedil;o: ".$team['team_price']."</p> 
			<p>Link para o an&uacute;ncio: ".$INI['system']['wwwprefix']."/imovel/visualizacao/".$idnovo."/</p>
			</body></html>" ;
			
			$emailadmin = $INI['mail']['from'];
			$emailuser = "suportel2@vipcomsistemas.com.br";

			 if(enviar( $emailuser,$INI["system"]["sitename"]." - Anúncio ".$idnovo." aguardando pagamento", $body )){
			 	 enviar( $emailuser,utf8_decode($INI["system"]["sitename"])." - ".html_entity_decode($team['title']). " - ( ID: ".$idnovo." )" , $body );
				 echo "enviou";
			 }