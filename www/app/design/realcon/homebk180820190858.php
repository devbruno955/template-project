<?php  
		require_once("include/head.php"); 
	?>
 
	<body class="page">
		<div style="display:none;" class="tips"><?=__FILE__?></div>
		
		<div class="tail-top" id="top_debug">   
				<div id="top_menu">
					<?php
					require_once(DIR_BLOCO . "/header_home.php"); 
					//require_once(DIR_BLOCO . "/bloco_busca_topo.php");
					?>
				</div>
			<div class="ImageTop" id="busca_debug"> 
				<?php 
				 //require_once(DIR_BLOCO."/video.php");
				require_once(DIR_BLOCO . "/bannerhome.php");  
				?>
				<?php require_once(DIR_BLOCO . "/bloco_busca_home.php"); ?> <!-- Bloco responsável pelos inputs de busca -->
			</div>
			<div class="mainhome">
				 <?php    
					require_once(DIR_BLOCO . "/autenticacao.php");  
					require_once(DIR_BLOCO . "/box_mapa.php");    					
					require_once(DIR_BLOCO . "/bloco_anuncios_destaques.php");  
					require_once(DIR_BLOCO . "/bloco_banners_meio.php"); 
					require_once(DIR_BLOCO . "/bloco_cidades_destaque.php"); 
					require_once(DIR_BLOCO . "/bloco_noticias_destaques.php");
					require_once(DIR_BLOCO . "/bloco_botao_anuncie_rodape.php");  
				 ?>  
			</div>
		</div>
		<?php require_once(DIR_BLOCO . "/rodape.php"); ?>
	</body>


<script type="text/javascript">
var lmdimgpixel=document.createElement('img');
lmdimgpixel.src='//secure.lomadee.com/pub.png?pid=22753463';
lmdimgpixel.id='lmd-verification-pixel-22753463';
lmdimgpixel.style='display:none';

var elmt = document.getElementsByTagName('body')[0];
elmt.appendChild(lmdimgpixel);
</script>




<!-- Novo layout carregando JS -->
<script src=https://code.jquery.com/jquery-3.3.1.min.js crossorigin=anonymous integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="></script>
<script src=https://code.jquery.com/jquery-migrate-1.4.1.min.js></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js crossorigin=anonymous integrity=sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49></script>
<script src=https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js crossorigin=anonymous integrity=sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/switcher/js/dmss.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
libs/bootstrap-select.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/headers/slidebar.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/headers/header.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/jqBootstrapValidation.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/contact_me.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/flowplayer/flowplayer.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/isotope/isotope.pkgd.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/isotope/imagesLoaded.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/rendro-easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/rendro-easy-pie-chart/jquery.waypoints.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/scrollreveal/scrollreveal.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/ofi.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/slider-pro/jquery.sliderPro.min.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
plugins/slick/slick.js"></script>
<script src="<?=$ROOTPATH?>/app/design/padrao/assets/
js/custom.js"></script>
<!-- Novo layout carregando JS -->
</html>
