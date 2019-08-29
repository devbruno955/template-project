<html>

<?php require_once("head_html.php"); header ('Content-type: text/html; charset=UTF-8'); ?>
 
 <script>
J(document).ready(function(){
	  
	 <? if($navegador == "other" ||  $navegador == "ie"){ ?>
		J(".tk_logar").colorbox({inline:true, href:"#inline_logar",width:"600px",height:"240px"}); 
		J(".tk_cadastrar").colorbox({inline:true, href:"#inline_cadastrar",width:"950px",height:"710px"}); 
		J(".tk_altera_endereco").colorbox({inline:true, href:"#inline_altera_endereco",width:"950px",height:"430px"}); 
		J(".tk_altera_cobranca").colorbox({inline:true, href:"#inline_altera_cobranca",width:"950px",height:"430px"}); 
		J(".tk_esquecisenha").colorbox({inline:true, href:"#inline_esquecisenha",width:"450px",height:"210px"});  
		J(".importarcontatos").colorbox();
		J(".linkyoutube").colorbox({iframe:true, innerWidth:425, innerHeight:344}); 
	 <? } 

    else {?>
	
	J(".tk_logar").colorbox({inline:true, href:"#inline_logar",width:"600px",height:"230px"}); //width:"50%",
	J(".tk_cadastrar").colorbox({inline:true, href:"#inline_cadastrar"}); //width:"80%", 
	J(".tk_altera_endereco").colorbox({inline:true, href:"#inline_altera_endereco"}); //width:"80%", 
	J(".tk_altera_cobranca").colorbox({inline:true, href:"#inline_altera_cobranca"}); //width:"80%", 
	J(".tk_esquecisenha").colorbox({inline:true, href:"#inline_esquecisenha"}); //width:"35%",
    J(".importarcontatos").colorbox();
	J(".linkyoutube").colorbox({iframe:true, innerWidth:425, innerHeight:344}); 
	<? } ?>
  
});
/*
J('document').ready(function(){
	J('.imagem-tab').click(function() {
		J("#videos").hide();
		J("#fotos").show();			
	});	
	J('.video-tab').click(function() {
		J("#fotos").hide();
		J("#videos").show();			
	});	
});
*/
</script>
<?php
 $from = $INI['mail']['from'];	
 $site = $INI['system']['sitename'];	
?>

<?php if ($_REQUEST['pg']){ ?>
	<script>
	J(document).ready(function(){
		J.colorbox({html:"<div style='text-align:center; heigth:300px;margin-top:3px;'><img width='300' src='"+URLWEB+"/include/logo/logo.png'></div><br><span style='margin-left:26px;font-size:13px;color:#303030'>O seu pagamento está sendo processado. Obrigado !</span>"});
    });
    </script>
    
<? }  
 
if(($_REQUEST['acao']=="needlogin" or $_REQUEST['acao']=="cadastro") and !$login_user_id){?>
	
	<script>
	J(document).ready(function(){
		J.colorbox({
			inline:true, href:"#inline_cadastrar",width:"970px",height:"630px"
		});
	});
	</script>

<? }
else{
	if( $INI['option']['popup_ativo'] == "Y"){
	
		$urlpop =  $ROOTPATH."/app/design/padrao/autentica.php";
		if( $INI['option']['tipopopup'] == "news"){ 
			$urlpop =  $ROOTPATH."/app/design/padrao/cadastra_email_home.php";
		}
		if(!$login_user_id){ 
			if(!isset($_COOKIE["pgcadastraemail"])){ 
				 if( $INI['option']['email_home_cookie_time'] ==""){    
					setcookie("pgcadastraemail","1", time()+60*12,"/");
				}else{
					$email_home_cookie_time =  $INI['option']['email_home_cookie_time'];
					setcookie("pgcadastraemail","1", time()+ $email_home_cookie_time,"/");
				} ?>
				
			<script>
			J(document).ready(function(){
				J.colorbox({
				<? if($INI['option']['tipopopup'] !="news"){?>
						href:"<?=$urlpop?>",width:"950px",height:"600px"
					<?} else {?>
						href:"<?=$urlpop?>" 
					<? } ?>
				});
			});
			</script>
			
			<? }
		 }
	}
}
?>
