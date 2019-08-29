<div class="col-2" style="<?=$styledireita?>">
  <div style="display:none;height:35px;" class="tips"><?=__FILE__?></div>
    <div class="box">
        <div class="indent-box" > 
		
		<?  if(file_exists(WWW_MOD."/anunciante.inc")){?>
		      <div class="dvanunciarbg">
				  <a  class="dvcorpoanun2" target="_blank" href="/adminanunciante/team/edit.php"> <img  style="margin-top: 11px;" src="<?=$PATHSKIN?>/images/anuncie.jpg"> </a> 
			 </div>   
		<? } ?> 
			 <!-- INICIO BLOCO OFERTA NACIONAL -->
					<?php  $this->coluna_direita("10"); ?>
			 <!-- FIM BLOCO OFERTA NACIONAL -->
		    
			<?php  
			if($this->tem_outras_ofertas()){ ?>			
				<table cellpadding="0" cellspacing="0" border="0">
					<tr><td colspan="2"><div class="secaotitulo outras"><?=$INI['option']['nomeblocodireita']?><div></td></tr>
						 <!-- INICIO BLOCO OFERTAS GERAIS -->
						<?php  $this->coluna_direita("4,6"); ?>
						<!-- FIM BLOCO OFERTAS GERAIS -->
				 </table>
				 <? } ?>
			
	  		<? require_once(DIR_BLOCO."/bloco_imobiliarias.php"); ?>
			
	  		<? require_once(DIR_BLOCO."/bloco_facebook.php"); ?>
			
			<? require_once(DIR_BLOCO."/bloco_twitter.php"); ?> 
			 
			<? require_once(DIR_BLOCO."/bloco_avisos_banner.php"); ?>
			 
		</div>     
</div>
 <script> 
	J(".outras").corner("round 2px");
	J(".tit_oferta_nacional").corner("round 2px");
</script>	