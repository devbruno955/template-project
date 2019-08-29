	<?php
		$sql = "select idpai,id,name,tipo,link,linkexterno,target from category where ( idpai=0 or idpai is null) and zone='group' and display = 'Y' order by sort_order desc";
		$rs = mysql_query($sql); 

		$sqlP = "select status from page where id = 'about_us'";
		$rsP = mysql_query($sqlP);
		$rowP = mysql_fetch_assoc($rsP);
		
		$sqlA = "select status from page where id = 'about_terms'";
		$rsA = mysql_query($sqlA);
		$rowA = mysql_fetch_assoc($rsA);
	?>	
	<div style="display:none;" class="tips"><?=__FILE__?></div> 
	<div class="headerM">
		<div class="logo">
			<a href="<?php echo $ROOTPATH; ?>">
				<img style="max-width:250px;" src="<?php echo str_replace("/mobile", "", $ROOTPATH); ?>/include/logo/logo.png" alt="Logo" title="Logo">
				<!-- <img src="<?php echo $ROOTPATH; ?>/include/logo/logo.png" alt="Logo" title="Logo">-->
			</a>
		</div>
		<div class="navigation">
			<a href="#">
				<img src="<?php echo $PATHSKIN; ?>/images/navigation.png" />
			</a>
		</div>
	</div>
	<div class="navigationMobile hidden">
		<ul>		
			<li class="linkPanel">
				<span class="navigationText">
				<?php if($login_user) { ?>
					<a href="<?php echo $ROOTPATH; ?>">Olá <?php echo utf8_decode($login_user['realname']); ?>!</a>
					<a class="navigationLogout" href="<?php echo $INI['system']['wwwprefix']; ?>/sair">
						Sair
					</a>
				<?php } else { ?>
					<a href="<?php echo $ROOTPATH; ?>/mlogin">Faça login ou cadastre-se</a>
				<?php } ?>
				</span>
			</li>			
			<?php if($login_user) { ?>
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo $ROOTPATH; ?>/?page=meusdados">Meus dados</a>
					</span>
				</a>
			</li>		
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo str_replace("/mobile", "", $ROOTPATH); ?>/adminanunciante">Inserir anúncio</a>
					</span>
				</a>
			</li>		
			<li>
				<a href="<?php echo $ROOTPATH; ?>">
					<span class="navigationText">
						<a href="<?php echo $ROOTPATH; ?>/?page=propostas">Propostas</a>
					</span>
				</a>
			</li>
			<?php } ?>	
			<?php
				if($rowP['status'] == 1) {
			?>
			<!--<li>
				<a href="<?php echo $ROOTPATH; ?>/page/about_us">
					Quem somos
				</a>
			</li>	-->	
			<?php } ?>
			<?php
				if($rowA['status'] == 1) {
			?>
			<!--<li>
				<a href="<?php echo $ROOTPATH; ?>/page/about_terms">
					Termos de uso
				</a>
			</li>	-->
			<?php } ?>
			<?php 
				while($l = mysql_fetch_assoc($rs)){
				 
					$tipocategoria = "categorias";
					$linkid ="";
					
					if($l['linkexterno']!=""){?>
						<li style="z-index:1000;" class="parent" id="<?=$l['id']?>">
							<a target="<?=$l['target']?>" title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH . $l['linkexterno']?>">
								<span>
									<span>
										<?=utf8_decode($l['name'])?>
									</span>
								</span>
							</a>
						</li>
						<? 
					 }else if($l['tipo']=="pagina"){
					
						$tipocategoria = "pagina";
						$sqlc = "select id,value,titulo,data_criacao from page where status = 1 and category_id =".$l['id'] ;
						$rsc = mysql_query($sqlc);
						$linha = mysql_fetch_object($rsc);
						
						$titulo  = tratanome($linha->titulo);
						$id  = $linha->id;
						if($id!=""){
							$linkid = $id."/".$titulo;
						} 
						if($linkid !=""){
						?>
							<li style="z-index:1000;" class="parent" id="<?=$l['id']?>">
								<a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/page/<?=$linkid?>">
									<span>
										<span>
											<?=utf8_decode($l['name'])?>
										</span>
									</span>
								</a>
							</li>
						<?
						}						
					}
					else if($l['tipo']=="sistema"){
						?>
						<li style="z-index:1000;" class="parent" id="<?=$l['id']?>">
							<a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/mobile/index.php?page=<?=$l['link']?>&idcategoria=<?=$l['id']?>&pagina=1&nome=<?=utf8_decode($l['name'])?>">
								<span>
									<span>
										<?=utf8_decode($l['name'])?>
									</span>
								</span>
							</a>
						</li>
						<? 
					}
					else{
					?>
						<li style="z-index:1000;" class="parent" id="<?=$l['id']?>">
							<a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/mobile/index.php?page=<?=$tipocategoria?>&idcategoria=<?=$l['id']?>&pagina=1">
								<span>
									<span>
										<?=utf8_decode($l['name'])?>
									</span>
								</span>
							</a>
						</li>
					<? 
					}	
				} 
			?> 
			<li style="z-index:1000;" class="parent" id="shop"> <a title="Shop" target="_blank" href="<?= str_replace("mobile","",$ROOTPATH)?>/shop"><span><span>Shop</span></span></a>
		</ul>
	</div>