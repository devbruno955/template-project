	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<style>
		#breadcrumb .desc-imovel {
			color: #333;
			margin-left: -15px;
		}
		.tabs-offer {
			margin-top: 80px;
		}
	</style>
	<?php
		$link = explode("#", LinkBreadcrumb($this->id));
	?>
	<div style="min-height: 0px;" class="row hidden-xs hidden-sm" id="breadcrumb">
		<div class="col col-md-12 col-lg-12 col-breadcrumb" >
		 <div style="float: left;padding: 10px 10px 0px 0px;"><a href="javascript:history.back();"> <img src="<?=$PATHSKIN?>/images/btvoltar.png" border="0" style="max-height:30px;" />  </a></div>
		 <div><h4 class="desc-imovel" itemprop="name"><?php echo utf8_decode($this->tituloferta); ?></h4></div>
			 
			<ol class="breadcrumb hidden-xs hidden-sm" itemprop="breadcrumb">
				<div style="display:none;">
					<li>Imóveis para venda:&nbsp;</li>
					<li class="path">
						<a href="<?php echo $ROOTPATH; ?>" itemprop="url">
							<span itemprop="title">
								Home
							</span>
						</a>
						<img class="breadcrumb-image" src="<?php echo $PATHSKIN; ?>/images/breadcrumb-cursor.png">
					</li>
					<li class="path">
						<a href="<?php echo $link[2]; ?>" itemprop="url">
							<span itemprop="title">			
								<?php echo utf8_decode($this->nome_estado); ?>	
							</span>				
						</a>		
						<img class="breadcrumb-image" src="<?php echo $PATHSKIN; ?>/images/breadcrumb-cursor.png">	
					</li> 
					<li class="path">
						<a href="<?php echo $link[1]; ?>" itemprop="url">
							<span itemprop="title">
								<?php echo utf8_decode($this->nome_cidade); ?>
							</span>
						</a>
					</li>
				</div>
			</ol>
		</div>
	</div>