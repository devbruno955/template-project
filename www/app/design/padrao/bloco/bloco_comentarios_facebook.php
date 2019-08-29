<div style="display:none;" class="tips"><?=__FILE__?></div>
<? 
$url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
//$url = "http://www.vipcomsistemas.com.br";
?>
 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8&appId=351378074874730";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	 
<div class="fb-comments" data-href="<?=$url?>" data-width="100%" data-numposts="5"></div>

 