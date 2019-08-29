<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
<?php

	/* Busca de imóveis para comprar. */
	$sqlC = "select * from team where imob_finalidade = 0 and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by id limit 5";
	$rsC = mysql_query($sqlC);

	/* Busca de imóveis para alugar. */
	$sqlA = "select * from team where imob_finalidade = 1 and (status is null or status = 1) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' order by id limit 5";
	$rsA = mysql_query($sqlA);
	
	$sql = "select idpai,id,name,tipo,link,linkexterno,target from category where ( idpai <> 0 and idpai is not null) and zone='group' and display = 'Y' order by sort_order desc";
	$rs = mysql_query($sql); 
?>
<div class="rodapeM">
	<div class="titleFooter">
		<p>
			Links úteis
		</p>
	</div>
	<ul>
		<?php if(!($login_user)) { ?>
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/mlogin">
				Cadastrar
			</a>
		</li>		
		<li class="linksItemFooter lastList">
			<a class="linksItemFooter" href="<?php echo $ROOTPATH; ?>/mlogin">
				Entrar
			</a>
		</li>
		<?php } else { ?>
		<li class="linksItemFooter lastList">
			<a class="linksItemFooter" href="<?php echo $ROOTPATH; ?>/?page=meusdados">
				Minha conta
			</a>
		</li>		
		<?php } ?>
		<?php
			if($rowP['status'] == 1) {
		?>
		<li class="linksItemFooter firstList">
			<a href="<?php echo $ROOTPATH; ?>/page/about_us">
				Quem somos
			</a>
		</li>	
		<?php } ?>
		<?php
			if($rowA['status'] == 1) {
		?>
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/page/about_terms">
				Termos de uso
			</a>
		</li>	
		<?php } ?>
		<!--
		<li class="linksItemFooter">
			<a href="<?php echo $ROOTPATH; ?>/contato">
				Entre em contato
			</a>
		</li>		
		-->
	</ul>
	<!--<div class="titleFooter">
		<p style="text-align:left;">
			Outros links
		</p>
	</div>-->
	<ul class="list-group-footer">
		<?php				
			while($row = mysql_fetch_assoc($rs)) {
		?>
		<li class="linksItemFooter">
			<a title="<?=utf8_decode($row['name'])?>" href="<?php echo empty($row['linkexterno']) ? "#" : $row['linkexterno']; ?>">
				<span>
					<span>
						<?=utf8_decode($row['name'])?>
					</span>
				</span>
			</a>
		</li>
		<?php } ?>
	</ul>
</div>	