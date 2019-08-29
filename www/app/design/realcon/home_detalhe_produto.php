<?php  
	require_once("include/head.php"); 
?>
<body id="page1">

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
	
<div class="tail-top"> 
<div style="display:none;" class="tips"><?=__FILE__?></div>	
	<div class="main">
		<?php require_once(DIR_BLOCO . "/header.php");  ?>
		<!-- BUSCA A OFERTA DESTAQUE -->
		<?  $BlocosOfertas->getBlocoDetalheProduto($idoferta,$BlocosOfertas->tipo_oferta);?> 
		<!-- FIM BUSCA A OFERTA DESTAQUE -->			 
	</div>
</div> 
 
<script>
	function envia_url_comprar(){ 
		location.href  = '<?php echo  $team['url_comprar'] ?>'; 
	}
	
	var idOffer = <?php echo $team['id']; ?>;
</script>

<?php
 
	require_once(DIR_BLOCO."/rodape.php");
		
?>
</body>
</html>
