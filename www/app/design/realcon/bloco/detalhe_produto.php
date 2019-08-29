<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>




<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div>
<?php 
	require_once(DIR_BLOCO . "/bloco_busca_topo.php");  
	require_once(DIR_BLOCO . "/box_banner.php");  
?> 

<?php 

	if(!(empty($team["id"]))) {
		
		require_once(DIR_BLOCO ."/box-dados-produto.php");
		require_once(DIR_BLOCO ."/box-contato.php");
		?>
		
		<div style="float: right; width: 364px;">
		<? require_once(DIR_BLOCO ."/bloco_banner_lateral.php"); ?>
		</div>

		<script type="text/javascript">
			atualiza_click('<?=$team['id']?>');
		</script>
		
		<?

	}
	else {
		/* Exibe página de erro. */
	}

?>