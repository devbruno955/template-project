﻿<head>
<?php
	if(isset($team) && !(empty($team))) {
?>
<meta charset="utf-8">
<meta property="og:url" content="<?php echo UrlAnuncio($team['id']); ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo utf8_decode($team['title']); ?>">
<meta property="og:description" content="<?php echo utf8_decode(strip_tags($team['summary'])); ?>">
<meta property="og:image" content="<?php echo $ROOTPATH . "/media/" . $team['image']; ?>">
<?php } ?>

<?php if($BlocosOfertas->tituloferta){?>
<title><?php echo  utf8_decode($BlocosOfertas->tituloferta) ; ?> | <?php echo utf8_decode( $INI['system']['sitename']); ?>   </title>
<?php }
 else if($team['seo_title']){?>
<title><?php echo utf8_decode(  $team['seo_title'] )?> </title>
<?}
 else if ($pagetitle){ ?>
<title><?php echo utf8_decode($pagetitle) ; ?> </title>
<?php }
 else{ ?>
<title><?php echo utf8_decode($INI['system']['sitename']); ?> </title>
<?php }?>
 
<?php if(strip_tags($team['seo_description'])) { ?>
<meta name="description" content="<?php echo mb_strimwidth(strip_tags(utf8_decode(strip_tags($team['seo_description'])) ), 0, 320); ?>" />
<?php } else if(strip_tags($INI['system']['seodescricao'])) { ?>
<meta name="description" content="<?php echo utf8_decode( strip_tags($INI['system']['seodescricao'])); ?> " />
<?php }  else { ?>
<meta name="description" content="<?php echo utf8_decode( $INI['system']['sitename']); ?>, <?php echo utf8_decode($INI['system']['sitetitle']); ?> " />
<?php }?> 
<?php if($team['seo_keyword']){?>
<meta name="keywords" content="<?php echo utf8_decode($team['seo_keyword']); ?>" />
<?php } 
	else if($INI['system']['seochaves']){?>
<meta name="keywords" content="<?php echo utf8_decode($INI['system']['seochaves']); ?> " />
<?php } 
	else { ?>
<meta name="keywords" content="<?php echo utf8_decode($INI['system']['sitename']); ?> " />
<?php } ?>
<link rel="icon"  type="image/x-icon" href="<?=$PATHSKIN?>/images/favicon.ico">
<link rel="stylesheet" id="stm_default_google_font-css" href="https://fonts.googleapis.com/css?family=Montserrat%3A400%2C700%7COpen+Sans%3A300%2C400%2C700&amp;subset=latin%2Clatin-ext&amp;ver=1480507725" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
 

<script type="text/javascript">

var WEB_ROOT 	= "<?php echo WEB_ROOT; ?>";
var URLWEB	 	= "<?php echo $ROOTPATH?>";
var CITY_ID	 	= "<?php echo $city['id']?>";
var ID_PARCEIRO = "<?php echo $_REQUEST['idparceiro']?>";
</script>


<script type="text/javascript">var LOGINUID= <?php echo abs(intval($login_user_id)); ?>;</script>

<?php echo Session::Get('script',true); ?>

<!--<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">-->

<!-- CSS ANTIGO 
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/style.css" type="text/css" media="all"> 
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/css.css" type="text/css" media="all"> -->



<!--
<?php  
if(file_exists(WWW_MOD."/fit.inc")){?>	
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/css_fit.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/global_fit.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/menu_fit.css" type="text/css" media="all"> 
	<style>
		
	</style>
<?}
else{?> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/global.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/menu.css" type="text/css" media="all">
<? } ?>
	
<? if(file_exists(WWW_MOD."/enterprise.inc")){?>
	<link rel="stylesheet" href="<?=$PATHSKIN?>/css/css_enterprise.css" type="text/css" media="all">
<? } ?>

<link rel="stylesheet" href="<?=$PATHSKIN?>/css/classic.css" type="text/css" media="all">
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/slide.css" type="text/css" media="all"> 
<link rel="stylesheet" href="<?=$PATHSKIN?>/css/buttons.css" type="text/css" media="all"> 
<link rel="stylesheet" href="<?=$ROOTPATH?>/js/FixedNavigation/css/style.css" type="text/css"  />
<link rel="stylesheet" href="<?=$ROOTPATH?>/js/form_css3/formcss3.css" type="text/css"  /> 
 

<link rel="stylesheet" href="<?=$ROOTPATH?>/js/colorbox/colorbox.css" type="text/css"  /> -->

<!-- Bloco de novas SCS -->

<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/css/debug.css'>
<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/css/master.css'>
<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/plugins/switcher/css/switcher.css'>
<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/plugins/switcher/css/color1.css'>
<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/plugins/switcher/css/color2.css'>
<link rel='stylesheet' href='<?=$ROOTPATH?>/app/design/padrao/assets/plugins/switcher/css/color3.css'>

<!-- Bloco de CDNs -->
<scrip src='https://code.jquery.com/jquery-3.3.1.min.js'>
<scrip src='https://code.jquery.com/jquery-migrate-1.4.1.min.js'>
<scrip src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'>
<scrip src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'>

<!-- fim do novo Layout -->
 
<!-- JS -->
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery-1.7.1.min.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/jquery.cookie.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/mascara.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/countdown/jquery.countdown.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slider.js" ></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/funcoes.js"></script> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/corner.js"></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/menu/menu.js"></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/SearchPlace.js"></script>  
<script type="text/javascript" src="<?=$ROOTPATH?>/js/SubmitContact.js"></script>     
<script type="text/javascript" src="<?=$ROOTPATH?>/js/FormSearch.js"></script>
<script type="text/javascript" src="<?php echo $ROOTPATH; ?>/js/AddFavorite.js" ></script>   
<script type="text/javascript" src="<?=$ROOTPATH?>/js/colorbox/jquery.colorbox-min.js"></script>



  <script src="<?php echo $ROOTPATH; ?>/js/jsslider/jquery.slides.min.js"></script>

 
<? 
	if(file_exists(WWW_MOD."/superbackground.inc")){?>
	
	<? $superslide = getsuperslide();
	if( $INI['background']['background'] != "N" and !empty($superslide)){?>
		<!-- supersized -->
				<link rel="stylesheet" href="<?=$ROOTPATH?>/js/supersized/supersized.css" type="text/css" media="screen" />
				<link rel="stylesheet" href="<?=$ROOTPATH?>/js/supersized/supersized.shutter.css" type="text/css" media="screen" />
				<script type="text/javascript" src="<?=$ROOTPATH?>/js/supersized/jquery.easing.min.js"></script>
				<script type="text/javascript" src="<?=$ROOTPATH?>/js/supersized/supersized.3.2.7.min.js"></script>
				<script type="text/javascript" src="<?=$ROOTPATH?>/js/supersized/supersized.shutter.min.js"></script>
		<!-- supersized -->
	 
		<script type="text/javascript">

		jQuery(function($){
			
			$.supersized({
			 
				slide_interval          :   <?=$INI['background']['intervalo']?>000,		 
				transition              :   1, 			 
				transition_speed		:	<?=$INI['background']['velocidade']?>000,		 						
				slide_links				:	'false',	 
				slides 					:   [<?=$superslide?>]
			});
		});

		</script>
	<? } ?>

<? } ?>

<link rel="stylesheet" href="<?=$ROOTPATH?>/js/slideshow/css/skitter.styles.css" type="text/css"  /> 
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slideshow/js/jquery.skitter.min.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slideshow/js/highlight.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slideshow/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/slideshow/js/jquery.animate-colors-min.js"></script> 
<script>
	<!-- Init Plugin -->
 
	J(document).ready(function() {
		J(".box_skitter_large").skitter({
			//animation: "fade","fadefour","circles","circlesinside","cubejelly","cubeshow",  
			numbers_align: "center", 
 			dots: false, 
 			preview: true, 
 			focus: false, 
 			focus_position: "leftTop", 
 			controls: false, 
 			controls_position: "leftTop", 
 			progressbar: false, 
 			/*progressbar_css: { 
				top:'5px', 
				left:'590px', 
				height:10, 
				borderRadius:'2px', 
				width:200, 
				backgroundColor:'#000', 
				opacity:.7 
			}, */
 			animateNumberOver: { 'backgroundColor':'#555' } ,
			enable_navigation_keys: false
			
		});
	});		
</script>
 
<!--[if lt IE 7]>
<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="<?=$ROOTPATH?>/js/html5.js"></script>
<![endif]-->
 
 <meta http-equiv="cache-control" content="public" /> <!-- reconhecida pelo HTTP 1.1 -->
<meta http-equiv="Pragma" content="public"> <!-- reconhecida por todas as versões do HTTP -->

<meta content="document" name="resource-type"> 
<meta content="ALL" name="robots">
<meta content="Global" name="distribution">
<meta content="General" name="rating"> 

<?php if($INI['system']['googleanalitics'] != "") { ?>

<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $INI['system']['googleanalitics'] ?>']);
_gaq.push(['_setCustomVar', 1,'cidade','SaoPaulo_D2581',2])
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script >

<?php  } ?>

<? if($_REQUEST['unsub']){ ?>
	<script>
    alert("Cancelamento de newsletter feito com sucesso!");
    </script>
<?}?>

<? //include_once("head_color.php");?>

<!-- Novo Layout em SEU_HOST\app\design\padrao\assets-->
<script type="text/javascript">
console.log("Carregando bibliotecas CSS em <? echo $ROOTPATH ;?>/include/head_html.php");
console.log("Caminho das CSSs: <?=$ROOTPATH?>/app/design/padrao/assets/ ");
console.log("CDNs carregadas em: <? echo $ROOTPATH ;?>/include/head_html.php");
console.log("Modificação de arquivo em : <?=$ROOTPATH?>/app/design/padrao/home.php ");
console.log("IDs de debugs adcionados em : <?=$ROOTPATH?>/app/design/padrao/home.php ");

</script>



</head>
<?php
	$navegador = getNavegador();
	if($navegador =="firefox")  { 
		$marginbot="484px";
		$margincontador="0px";
		$margincontadorpik="0px";
		$marginbandeiras="6px";
		$marginbandeiraspik="4px";
		$topdescontos="26px";
		$alturacadastro="350px";
         
	}  elseif($navegador=="ie" or $navegador=="other")  { 
		$marginbot="63px";
		$margincontador="0px";
		$margincontadorpik="0px";
		$marginbandeiraspik="7px";
		$marginbandeiras="1px";
		$topdescontos="1px";
		$alturacadastro="410px";
	}  else  {      
		$navegador =  "outros";
		$marginbot="484px";
		$margincontador="0px";
		$margincontadorpik="0px";
		$marginbandeiras="6px";
		$marginbandeiraspik="4px";
		$topdescontos="26px";
		$alturacadastro="350px";
	}
?>

