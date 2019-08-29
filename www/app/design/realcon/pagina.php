<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>
 





<?php 
$page = Table::Fetch('page', $idpagina );
$pagetitle = $page['titulo']; 
$idcategoria = $page['category_id'];

if(!$idpagina){
	$pagetitle = "Página não encontrada";
	$page['value'] = "Nenhuma página associada";
}

require_once("include/head.php"); ?>
 
<body id="page1">
	<div style="display:none;" class="tips"><?=__FILE__?></div>
	<div class="tail-top">
	<?php   
		require_once(DIR_BLOCO."/bloco_background.php"); ?>
		<div class="main">
			<?php  require_once(DIR_BLOCO."/header.php"); ?> 
				<section id="content">  
					<div class="inside"> 
						<div class="col-1f"> 
							<div class="col-6" > 
								<div class="titpages"><?php echo utf8_decode($pagetitle) ?> </div> 
								<div class="contentpage"> <?=utf8_decode($page['value'])?></div>
							</div>   
						</div> 
					</div> 
				</section> 
		</div> 
	</div> 
	<?php require_once(DIR_BLOCO."/rodape.php"); ?>
</body>
</html>
 