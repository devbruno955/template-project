<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
	<? if($INI['option']['anunciousuario'] == "Y" ){?>
	
		<div style="font-size:16px;text-align:center;background:#ffffff;padding:2px;margin-bottom:11px; clear:both;">
			<div style="text-align:center;"><h1 style="font-size:1.707em"> <?=utf8_decode($INI['system']['txt4'])?> </h1></div>

			<div class="row-fluid"> 
				<?=utf8_decode($INI['system']['txt6'])?>
			</div>
			<div style="margin-top: 2px; "><a href="<?=$ROOTPATH?>/adminanunciante/team/edit.php" <?php if(!$login_user){echo "class='tk_logar'";} ?> ><img src="<?=$PATHSKIN?>/images/botao-anuncie.png"></a></div>
		</div>
		
	<? } ?>