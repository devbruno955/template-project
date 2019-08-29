<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php

unset($descricao);
$descricao = explode(',', $team['imob_adicionais']);
$partner = Table::Fetch('partner', $team['partner_id']);

?>
<div class="descriptionOffer">
	<ul class="rslides" id="slider-offer-mobile">
	<?php if(!(empty($team["id"]))) { ?>
		<li>
			<?php //echo "echo 0"; ?>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img0']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img1']) { ?>
	<?php //echo "echo 1"; ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img1']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img2']) { ?>
	<?php //echo "echo 2"; ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img2']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img3']) { ?>
	<?php //echo "echo gal 1"; ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img3']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img4']) { ?>
	<?php //echo "echo gal 2"; ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img4']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img5']) { ?>
	<?php //echo "echo gal 3"; ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img5']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img6']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img6']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img7']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img7']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img8']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img8']; ?>">
		</li>
	<?php } ?>		
	<?php if($team['img9']) { ?>
		<li>
			<img src="<?php echo $INI['system']['wwwprefix'] . "/media/" . $team['img9']; ?>">
		</li>
	<?php } ?>				
	</ul>
	<div class="borderList">
		<?php if(!(empty($team['imob_codigo']))) { ?>
		<span class="textInfo">Código do imóvel: <?php echo utf8_decode($team['imob_codigo']); ?></span>
		<br />
		<?php } ?>
		<span class="textInfo">Título: <?php echo utf8_decode($team['title']); ?></span>
		<?php if($team['mostrarpreco'] == 1) { ?>
		<br />
		<span class="textInfo">Preço: <span class="priceOffer">R$<?php echo number_format($team['team_price'], 2, ",", "."); ?></span></span>
		<?php } ?>
		<br />
		<br />
		<span class="textInfo">IPTU: <span class="priceOffer"><?php echo empty($team['imob_iptu']) ? "-" : "R$" . number_format($team['imob_iptu'], 2, ",", "."); ?></span></span>
		<br />
		<span class="textInfo">Condomínio: <span class="priceOffer"><?php echo empty($team['imob_condominio']) ? "-" : "R$" . number_format($team['imob_condominio'], 2, ",", "."); ?></span></span>
	</div>	
	<!--<div class="borderList">
		<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
			<h5 class="valor-info">
				<img src="<?php echo $PATHSKIN; ?>/images/Length-32.png" class="info-img"><br><?php echo empty($team['imob_area']) ? "-" : $team['imob_area']; ?></h5>
			<p>área</p>
		</div>
		<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
			<h5 class="valor-info">
				<img src="<?php echo $PATHSKIN; ?>/images/Hotel-32.png" class="info-img"><br><?php echo empty($team['imob_quartos']) ? "-" : $team['imob_quartos']; ?></h5>
			<p>quartos</p>
		</div>
		<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
			<h5 class="valor-info">
				<img src="<?php echo $PATHSKIN; ?>/images/Shower-and-Tub-32.png" class="info-img"><br><?php echo empty($team['imob_suite']) ? "-" : $team['imob_suite']; ?></h5>
			<p>suítes</p>
		</div>
		<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
			<h5 class="valor-info">
				<img src="<?php echo $PATHSKIN; ?>/images/Bath-Room-32.png" class="info-img"><br><?php echo empty($team['imob_banheiro']) ? "-" : $team['imob_banheiro']; ?><br>
			</h5>
			<p>banheiros</p>
		</div>
		<div class="col hidden-sm hidden-xs col-md-6 col-lg-6 box-info">
			<h5 class="valor-info">
				<img src="<?php echo $PATHSKIN; ?>/images/Garage-Filled-32.png" class="info-img"><br><?php echo empty($team['imob_vagas']) ? "-" : $team['imob_vagas']; ?><br>
			</h5>
			<p>vagas</p>
		</div>
	</div>	-->	
	<div class="borderList">
		<h2>Mais sobre este imóvel</h2>
		<p class="textDescriptionOffer"><?php echo utf8_decode(strip_tags($team['summary'])); ?></p>
	</div>		
	<div class="borderList">
		<h2>Características</h2>
		<p class="textDescriptionOffer">
			<ul class="listDescriptionOffer">
			<?php 
				foreach($descricao as $adicionais) {
					if(!(empty($adicionais)) && $adicionais != " ") {
			?>
				<li>
					<?php echo $adicionais; ?>
				</li>
			<?php
					}
				}
			?>
			</ul>
		</p>
	</div>	
	<div class="borderList">
		<h2>Dados do Anunciante</h2>
		<?php
			$endereco="";
			if($partner['address']!=""){
			$endereco.=$partner['address']. " ";
			$endegoogle .= $partner['address']. " ";}
			if($partner['numero']!=""){
			$endereco.= $partner['numero']. ", ";
			$endegoogle .= $partner['numero']. " ";}
			if($partner['bairro']!=""){
			$endereco.=$partner['bairro']. " ";}
			if($partner['cidadeusuario']!=""){
			$endereco.=$partner['cidadeusuario']. " ";
			$endegoogle .= $partner['cidadeusuario']. " - ";}
			if($partner['estado']!="") {
			$endereco.= "- ".$partner['estado']. " "; 
			$endegoogle .= $partner['estado']. " "; }
			if($partner['zipcode']!="") {
			$endereco.=$partner['zipcode']. " ";}

			$endegoogle = retira_acentos($endegoogle);
		?>
		<p class="textDescriptionOffer"><b>Endereço: </b><?php echo utf8_decode($endereco); ?></p>
		<?php if(!(empty($partner['site']))) { ?><p class="textDescriptionOffer">Site: <a target="_blank" href="<?php echo $partner['site']; ?>"><?php echo $partner['site']; ?></a></p><?php } ?>
		<?php if(!(empty($partner['cnpj']))) { ?><p class="textDescriptionOffer">CNPJ: <?php echo $partner['cnpj']; ?></p><?php } ?>
		<p class="textDescriptionOffer">
			Contate o anunciante agora para mais detalhes. <?php echo utf8_decode($INI['system']['sitename']); ?>.
		</p>
	</div>
</div>