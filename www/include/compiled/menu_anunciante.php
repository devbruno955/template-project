<script type="text/javascript">
$(function() {
  if ($.browser.msie && $.browser.version.substr(0,1)<7)
  {
	$('li').has('ul').mouseover(function(){
		$(this).children('ul').show();
		}).mouseout(function(){
		$(this).children('ul').hide();
		})
  }
});        
</script>

<ul id="menu">  
<li><a href="<?php echo $ROOTPATH; ?>"><?=utf8_encode("Home")?></a> </li> 
<li><a href="/adminanunciante/team/index.php"><?=utf8_encode("An�ncios")?></a>
	<ul> 
		<li>
			<a href="/adminanunciante/team/edit.php"><?=utf8_encode("Criar An�ncio")?> </a>       
			<a href="/adminanunciante/team/index.php"><?=utf8_encode("Consultar An�ncios")?> </a>    
		</li>
	</ul>
</li> 
<li><a href="/adminanunciante/team/propostas.php"><?=utf8_encode("Propostas Recebidas")?></a> </li> 
<li><a href="/adminanunciante/parceiro/edit.php"><?=utf8_encode("Meus Dados")?></a> </li>
 <!--<li><a href="#"><?=utf8_encode("Configura��es")?></a>
	<ul> 
		<li>
			<a href="/adminanunciante/user/delete.php"><?=utf8_encode("Excluir minha conta")?> </a>       
		</li>
	</ul>
</li> -->
 
</ul> 
