<div style="display:none;" class="tips"><?=__FILE__?></div>
<header>   
	  <div class="viplogo"><a href="<?=$ROOTPATH?>"><img class="logotipomenor" border="0" src="<?=$ROOTPATH?>/include/logo/logo.png"></a></div> 
	  <div class="linkstopoheader">
	  
	   <?php if(!$login_user){ ?>   
			<div class="bttopo"><a href="#" class="newbutton tk_cadastrar">Cadastrar</a></div>  
			<div class="bttopo"><a href="<?=$ROOTPATH?>/adminanunciante" class="newbutton tk_logar">Anunciar Imóvel</a></div>
			<!-- <div class="bttopo"><a href="<?=$ROOTPATH?>/index.php?page=queroanunciar" class="newbutton buttonanunciar">Anunciar Imóvel</a></div>  -->
			<!-- <div class="bttopo"><a href="<?=$ROOTPATH?>/adminanunciante" class="newbutton">Login do Anunciante</a></div>-->
		<? } else {?>
			<div class="olauser">Olá <?=getnome($login_user[id])?> |  <a href="<?=$ROOTPATH?>/adminanunciante/"> Anunciar Imóvel  </a> |  <a href="<?=$ROOTPATH?>/autenticacao/logout.php"> Sair </a></div>
			  
			<!-- <div class="bttopo"><a href="<?=$ROOTPATH?>/adminanunciante" class="newbutton">Login do Anunciante</a></div>-->
			<!-- <div class="bttopo"><a href="<?=$ROOTPATH?>/index.php?page=queroanunciar" class="newbutton buttonanunciar">Anunciar Imóvel</a></div>  -->  
		<? } ?>
	  </div> 			
</header>
  
 <? 
 require_once(DIR_BLOCO."/bloco_menu.php"); ?> 
<!-- DIV OCULTA QUE IRÁ ABRIR QUANDO A AUTENTICACAO FOR REQUISITADA --> 
<?php require_once(WWW_ROOT."/app/design/padrao/bloco/autenticacao.php"); ?> 
<!-- FIM - DIV OCULTA QUE IRÁ ABRIR QUANDO A AUTENTICACAO FOR REQUISITADA -->