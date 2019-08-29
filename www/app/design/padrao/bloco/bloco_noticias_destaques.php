<? if($INI['option']['noticias'] == "Y" or  $INI['option']['noticias']=="" ) {  ?>
<div style="display:none;" class="tips"><?=__FILE__?></div>
<?php 
	$ordem =  'rand()';  // aleatório
	$sql = "select * from page where destaque = '1' and   status = 1 order by $ordem limit 6";
	$rs = mysql_query($sql);
	if(mysql_num_rows($rs)){	
?>
	<div class="row hidden-xs" style="margin-left: 14px;margin-top: 15px;position:  relative;float: left;width: 100%;">				<div style="text-align:center;"><h1><?=utf8_decode( $INI['system']['txt7'] )?></h1></div>		
		<?php  
			while($l = mysql_fetch_assoc($rs)){
					
				$l['titulo'] = utf8_decode($l['titulo']);
				$link = $INI['system']['wwwprefix']."/page/". $l['id']."/".urlamigavel(retira_acentos($l['titulo']));	
				$imagemdestaque = getImagemDestaquePagina($l['id']);			 
			 
				$l['value'] = strip_tags(html_entity_decode(nl2br($l['value'])));
		?>
			<div class="col-md-4 col-sm-6 col-xs-12 home-a">
				<a href="<?php echo $link; ?>">
					<div class="panel">
					 
						<div class="panel-body">
							<img alt="<?php echo $l['titulo']; ?>" src="<?php echo $imagemdestaque; ?>">
						</div>
						<div class="panel-footer">
							<p><?php echo displaySubStringWithStrip($l['titulo'], 90); ?></p>
						</div>
					</div>
				</a>
			</div>
		<?php }  ?>
		
		</div>
	<? }
}  ?>