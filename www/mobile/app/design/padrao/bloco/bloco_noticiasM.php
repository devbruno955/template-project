<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 

<?php

$ordem =  'rand()';  // aleatório
$sql = "select * from page where destaque = '1' and   status = 1 order by $ordem limit 3";
$rs = mysql_query($sql);

?>
<div class="revistaMobile">
	<?php 
		while($article = mysql_fetch_assoc($rs)) { 
			$imagemdestaque = $ROOTMEDIA . "/paginas/" . $article['id'] . ".png";
			$link = $ROOTPATH . "/page/" . $article['id']."/".urlamigavel(retira_acentos($article['titulo']));	
	?>
	<div class="itemMagazineMobile">
		<a href="<?php echo $link; ?>">
			<span><?php echo utf8_decode(displaySubStringWithStrip($article['titulo'], 60)); ?></span>
		</a>
		<a href="<?php echo $link; ?>">
			<img title="<?php echo utf8_decode($article['title']); ?>" alt="<?php echo utf8_decode($article['title']); ?>" src="<?php echo $imagemdestaque; ?>">
		</a>
		<p class="textMagazine">
			<?php echo displaySubStringWithStrip(str_replace("&nbsp;", "", $article['value']), 90); ?>
		</p>
	</div>
	<?php } ?>
</div>