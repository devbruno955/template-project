<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110925788-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110925788-1');
</script>








<div style="display:none;" class="tips"><?=__FILE__?></div>
<style>
a{
	color:#fff;
}
</style>
<div class="headertop">
	<header style="height:103px;"><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> 
		 <div style="float:left;color:#000;margin-top:4px;width:442px;margin-left:122px;">  
				<a href="<?=$ROOTPATH?>"><img class="logotipohome" border="0" src="<?=$ROOTPATH?>/include/logo/logo.png"></a>
		 </div>
		 <!-- <div class="viplogo"></div> -->
		 <div style="float: right; margin-top: 8px;margin-right:33px;"> 
			<div style="margin-top: 0px; font-size: 13px;color:#000">
			 	<?php if($login_user){ ?>  
					<? if($INI['option']['anunciousuario'] == "Y" ){?>
						<a  href="<?=$ROOTPATH?>/adminanunciante/team/edit.php"><img style="width:21px;margin-left:8px;" src="<?=$PATHSKIN?>/images/ico_conta.png">  Anunciar Imóvel</a>
						<a  href="<?=$ROOTPATH?>/adminanunciante/"><img style="width:21px;margin-left:8px;" src="<?=$PATHSKIN?>/images/ico_conta.png">  Meus Anúncios</a>
					<? } ?>
					<a href="<?=$ROOTPATH?>/autenticacao/logout.php"><img style="width:21px;margin-left:8px;" src="<?=$PATHSKIN?>/images/ico_off.png"> Sair</a>
				<?} else {?> 
					 <a class='tk_logar' href="#"><img style="width:21px;" src="<?=$PATHSKIN?>/images/ico_entrar.png">Anunciar Imóvel </a>
					 <a class='tk_logar' href="#"><img style="width:21px;" src="<?=$PATHSKIN?>/images/ico_entrar.png">Entrar </a>
					 <a class='tk_cadastrar' href="#"><img style="width:21px;margin-left:8px;" src="<?=$PATHSKIN?>/images/ico_cadastrar.png">Cadastrar</a>  
				<? } ?>
			</div>  
		 </div>
	</header>  
</div>
 <?php  