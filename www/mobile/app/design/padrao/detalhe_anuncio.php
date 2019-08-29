<?php  
	require_once("include/head.php"); 
?>
	<?php
		if(isset($team) && !(empty($team))) {
	?>
	<meta property="og:url" content="<?php echo UrlAnuncio($team['id']); ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo utf8_decode($team['title']); ?>">
	<meta property="og:description" content="<?php echo strip_tags($team['summary']); ?>">
	<meta property="og:image" content="<?php echo $ROOTPATH . "/media/" . $team['image']; ?>">
	<?php } ?>
	<style>
		.fb-like.fb_iframe_widget.fb_iframe_widget_fluid {
			top: 5px;
			position: relative;
			left: 5px;
		}
	</style>
	<body id="page">
		<script>
			function envia_url_comprar(){ 
				location.href  = '<?php echo  $team['url_comprar'] ?>'; 
			}
		</script>
		<!-- Responsivo -->
		<div class="containerM">
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/header.php"); ?>
				<div class="titlePage">
					<p>Detalhes do anúncio</p>
				</div>		
				<?php  
					$partner = Table::Fetch('user', $team['partner_id']);
					require_once(DIR_BLOCO_M . "/detalhe_anuncioM.php");
				?>
			</div>							
			<div class="row">
				<div class="titlePage">
					<p>Enviar proposta</p>
				</div>		
				<?php  
					require_once(DIR_BLOCO_M . "/enviar_propostaM.php");
				?>
			</div>				
			<div class="row">
				<?php require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>				
			</div>			
		</div>
	</body>
</html>