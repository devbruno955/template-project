<?php
	while($l = mysql_fetch_assoc($busca)) {
	
		$link = $ROOTPATH . "/?idoferta=" . $l['id'];	
			
		$imagemoferta = $INI['system']['wwwprefix']."/media/".$l['img0'];
		
		if(!(empty($l["maximo_hospede"]))) {
			$hospedes = "Total de h&oacute;spedes: " . $l["maximo_hospede"];
		}
		
		if(!(empty($l["team_price"]))) { 
			$valordiaria = "Valor: <span style='color: #d20f1a;'>R$ " . number_format($l["team_price"],2,",",".") . "</span>";
		}
?>	
<div class="resultSearch">
	<div class="itemMobile">
		<figure class="boxFigureMobile">
			<a href="<?=$link?>">
				<img src="<?=$imagemoferta?>" alt="<?=utf8_decode($l['title'])?>" title="<?=utf8_decode($l['title'])?>">
			</a>
		</figure>				
		<div class="boxContentMobile">
			<p class="boxContentText"><?php echo utf8_decode(substr($l['title'],0, 30)); ?> </p>
			<p class="boxContentNormal"><?php echo customSubString($l['summary'], 100); ?></p>
			<p class="boxContentNormal"><?php echo $valordiaria; ?></p>
			<p class="boxContentNormal"><?php echo $hospedes; ?></p>
		</div>
	</div>	
</div>
<?php
	}
?>