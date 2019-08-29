<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php
	
	$limite = empty($INI['system']['limite_vitrine']) ? 20 : (int) $INI['system']['limite_vitrine'];
	$ordem =  'rand()';	
	
	$sql = "select * from team where  ehdestaque = 'Y' and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by " . $ordem . " limit " . $limite;
	$rs = mysql_query($sql);	

	if(mysql_num_rows($rs)){	
?>
	<div class="destaquesMobile">
	<?php
	while($l = mysql_fetch_assoc($rs)){
			
		$l['title'] = utf8_decode($l['title']);
		$link = $ROOTPATH . "/?idoferta=" . $l['id'];	
			
		
		$imagemoferta = $INI['system']['wwwprefix']."/media/".$l['img0'];
		
		
		if(!(empty($l["maximo_hospede"]))) {
			$hospedes = "Total de h&oacute;spedes: " . $l["maximo_hospede"];
		}
		
		if(!(empty($l["team_price"]))) { 
			$valordiaria = "Valor: R$ " . number_format($l["team_price"],2,",",".");
		}
		
		if(!(empty($l["imob_tipo"]))) {
			
			$sqlT = "select nome from tipoimoveis where id = '" . $l["imob_tipo"] . "'";
			$rsT = mysql_query($sqlT);
			$tipo = mysql_fetch_assoc($rsT);
		}
		else {
			$bairro = utf8_decode("Bairro não informado.");
		}
		
		$l['title'] = $l['title'];
		?>
			<div class="itemMobile">
				<figure class="boxFigureMobile">
					<a href="<?=$link?>">
						<img src="<?=$imagemoferta?>" alt="<?=$l['title']?>" title="<?=$l['title']?>">
					</a>
				</figure>				
				<div class="boxContentMobile">
					<p class="boxContentText"> <?=displaySubStringWithStrip($l['title'], 30)?> </p>
					<p class="boxContentNormal"><?php echo "Imóvel: " . utf8_decode($tipo["nome"]); ?></p>
					<p class="boxContentNormal"><?php echo $valordiaria; ?></p>
					<p class="boxContentNormal"><?php echo $hospedes; ?></p>
				</div>
			</div>	
	<?php } ?>	
	</div>	
<?php } ?>