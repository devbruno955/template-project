<?php include template("manage_html_header");?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery-3.3.1.min.js" ></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="<?=$ROOTPATH?>/js/colorbox/colorbox.css"/> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?=$ROOTPATH?>/js/color/farbtastic.css"/> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/farbtastic.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jbase.js"></script>
<link rel="stylesheet" href="/media/calendar/dhtmlgoodies/dhtmlgoodies_calendar.css" type="text/css" media="screen" charset="utf-8" /> 
<script src="/media/calendar/dhtmlgoodies/dhtmlgoodies_calendar.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" href="/media/tip/theme/style.css" />
<link rel="stylesheet" type="text/css" href="/media/css/menu.css" />
<script src="/media/tip/js/jquery.betterTooltip.js" type="text/javascript"></script> 
<script type="text/javascript" src="/js/mascara.js"></script> 
<script type="text/javascript" src="/media/js/main.js"></script> 
<script type="text/javascript" src="/media/js/jquery.price_format.1.7.min.js"></script> 
 
<script type="text/javascript">

	$(document).ready(function(){
		$('.tTip').betterTooltip({speed: 100, delay: 30});
	});

</script> 
 
<div id="hdw" style="color:#FFF;background:url('<?=$ROOTPATH?>/media/js/menu/images/8.jpg') repeat-x scroll 0 0 transparent";>
	<div id="hd">
	
	
	 <div id="logo" style="height: 92px;"><a href="/adminanunciante/index.php" class="link" ><img src="/include/logo/logo.png" style="max-width: 330px; max-height:82px;" /></a></div> 
	 
	<!-- 
	<? if(file_exists(WWW_ROOT."/include/logo/logo.png")){?>
		 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.png" style="max-width: 330px; height:89px;" /></a></div> 
	<? } 
	else{?>
		 <div id="logo"><a href="/index.php" class="link" target="_blank"><img  src="/include/logo/logo.jpg" style="max-width: 330px;height:89px;" /></a></div> 
	<? } ?>
	
	-->
        <?
				$realname = $login_user['realname'];
				 
				if(!$realname){
					    $partner = Table::Fetch('partner',  $login_user_id);
						$realname = $partner['title'];
				}
				if($_SESSION['partner_id']){
				
					$partner = Table::Fetch('partner', $_SESSION['partner_id']);
					$realname = $partner['title'];
				}
				
		?>
 
		<div class="guides" style="top:3px;width:300px;" > 
			 <div style="font-size:11px;color:#303030;"><?php if($_SESSION['partner_id']){ echo "Usuário Logado: ". $realname. " ( Código ". $_SESSION['user_id']." )"; } ?></div>
		</div>  
		<?php if($_SESSION['partner_id']){require_once("menu_anunciante.php");}?> 
		<?php if(need_anunciante()){?><div class="vcoupon">&raquo;&nbsp;<a href="<?=$ROOTPATH?>/autenticacao/logout.php"><span style="color:#303030;">Sair</span></a></div><?php }?>
	</div>
</div>

<?php if($session_notice=Session::Get('notice',true)){?>
	<script>
		jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/Accept-icon.png'> <?php echo $session_notice; ?></div>"});
		});
	</script>
<?php }?>
<?php if($session_notice=Session::Get('error',true)){?>
	<script>
		jQuery(document).ready(function(){   
			jQuery.colorbox({html:"<div class='msgsoft'> <img src='<?=$ROOTPATH?>/media/css/i/falha.png'> <?php echo $session_notice; ?></div>"});
		});
	</script>
<?php }?>
<?php
	 header("Content-Type: text/html; charset=UTF-8"); 
?>
 