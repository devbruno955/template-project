<div style="display:none;" class="tips"><?=__FILE__?></div>
	<?php 
		$team = Table::Fetch('team', $team['id']);
	?>
	<div class="col-1">
		<div class="indent" style="padding:2px;">
			<div class="container1"> 
				<div class="descricaooferta">  
					<?
						$endereco= "";
						$endegoogle = "";
						if($team['imob_rua']!=""){
						$endereco.= $team['imob_rua']. ", ";
						$endegoogle .= $team['imob_rua']. " ";}
						if($team['imob_numero']!=""){
						$endereco.=$team['imob_numero']. ", ";
						$endegoogle .= $team['imob_numero']. " ";}
						if($team['imob_bairro']!=""){
							$bairro = getBairro($team['imob_bairro']);
							$bairro = utf8_encode($bairro);
						$endereco.="Bairro ".$bairro. ", ";	
						$endegoogle .= $bairro. " ";}
						if($team['imob_cidade']!=""){
						$endereco.=$team['imob_cidade']. " ";
						$endegoogle .= $team['imob_cidade']. " ";}
						if($team['imob_estado']!="") {
						$endereco.= "- ".$team['imob_estado']. " "; 
						$endegoogle .= $team['imob_estado']. " ";}
						if($team['cep']!="")
						$endereco.=$team['cep']. " ";
						if($team['phone']!="")
						$endereco.=$team['phone']. " "; 
						if($team['imob_cep'] != "") {
							$endereco.=$team['imob_cep']. " ";
						}
					?>
					<b><?php echo utf8_decode(buscaTituloAnuncio($team)) ; ?></b><BR><?=  utf8_decode($endereco)  ; ?> 
					
					<br>					
					<?php  if($INI['option']['bloco_googlemaps'] == "Y" ){?>
					<div style="float:left; width: 800px;"> 
						<iframe frameborder="0" height="300" width="740" scrolling="no" src="<?=$ROOTPATH?>/maps.php?coord=<?=$partner['longlat']?>&endereco=<?=utf8_decode($endegoogle);?>" id="imaps"></iframe>
					</div>
					<? } ?> 
				</div>	
			</div>	
		</div>	
	</div>	 