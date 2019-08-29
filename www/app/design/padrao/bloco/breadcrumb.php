	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<div style="min-height: 81px;" class="row hidden-xs hidden-sm" id="breadcrumb">
		<div class="col col-xs-12 col-sm-12 col-md-10 col-lg-10 col-breadcrumb col-breadcrumb-w" itemtype="http://schema.org/WebPage" itemscope="">
			<h1 class="desc-imovel">
			<span><a href="<?=$ROOTPATH?>">voltar</a></span> - 
				<? if(empty($anuncio) or $cidade =="todas as cidades") {?>
					<? if($cidade !="todas as cidades"){  ?>
						<span id="breadcrumb-top-tipo">Buscando imóveis na cidade de </span><span id="breadcrumb-top-transacao"> <?php echo utf8_decode($cidade); ?>&nbsp;</span>
					<? }
					else { 
					if($estado=="todos-estados"){ $estado= "Todos os estados" ;} else { $estado = retornaNomeEstado($estado);}
					?>
						<span id="breadcrumb-top-tipo">Buscando imóveis em </span>  <span id="breadcrumb-top-transacao"> <?php echo $estado; ?>&nbsp;</span> 
					<? } ?>
			   <? } else {
					if(!empty($anuncio) or $cidade !="todas as cidades") { 
						if(!empty($anuncio)){
							$para = " para $anuncio ";
						} 
					?> 
					<span id="breadcrumb-top-tipo">Buscando imóveis <?php echo $para ; ?> em </span><span id="breadcrumb-top-transacao"> <?php echo utf8_decode($cidade); ?>&nbsp;</span>
					<span id="breadcrumb-bairro" class="bc-local"></span> 
				<? } }?> 
			
				<span id="breadcrumb-estado" class="bc-local"></span>
			</h1>
			<!-- 
			<ol class="breadcrumb hidden-xs hidden-sm" id="ol-breadcrumb" itemprop="breadcrumb">
				<li>Imóveis para <?php echo $anuncio; ?>:&nbsp;</li><li class="path">&nbsp;&nbsp;
					<a class="choose-city" href="#"><?php echo ucwords($cidade); ?></a>
				</li>
			</ol>
			-->
		</div>
		<div class="col col-xs-12 col-sm-12 col-md-2 col-lg-2 text-right col-breadcrumb-right-w nopadmar">
			<p class="desc-total hidden-md">total de imóveis localizados</p>
			<span class="numero-topo" id="breadcrumb-quantidade"><?php echo $row; ?></span>
		</div>
	</div>