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
<li><a href="/vipmin/misc/index.php">Painel</a>  </li>  
<li><a href="/vipmin/misc/index.php">Gerenciar</a>
	 <ul>
	 	<li>
			<a href="/vipmin/category/editcidades.php">Cadastrar Cidade </a>       
			<a href="/vipmin/category/indexcidades.php">Consultar Cidades </a>    
		</li> 
		<li> <a target="_blank" href="/index.php">Visualizar Site</a> </li> 
		<li> <a href="/vipmin/misc/feedback.php">Contatos</a> </li> 
		<li><a href="">Planos de Publicidade</a> 
			  <ul> 
			   <li>
				<a target="_blank"  href="http://www.vipcomsistemas.com.br/script/marketing/">Planos Avulsos</a>
				<a target="_blank" href="http://www.fazerlogomarca.com.br/pacotes-de-otimizacao-de-site-logo-banners-video-imagens-artes-personalizacao-redes-sociais-e-muito-mais-2/" >Combo Premium</a>  
			   </li>
			  </ul>
		 </li>			
	</ul>
</li>
	 
<li><a href="#">Layout</a>
	 <ul>
	<li> <a href="/vipmin/system/logo.php">Alterar Logo</a> </li> 
	<!-- <li> <a href="/vipmin/system/background.php">Alterar Background</a> </li>  -->
	<!-- <li> <a href="/vipmin/system/slide.php">Imagem da Home</a> </li> -->
	<!--  <li> <a href="/vipmin/system/banners.php">Banners Header </a> </li>  -->
	<li> <a href="/vipmin/system/bulletin.php">Banners</a> </li> 
	<li> <a href="/vipmin/system/cores.php">Alterar Cores</a> </li> 
	<li> <a href="/vipmin/system/imagens.php">Gerenciar Imagens</a></li>		 
	</ul>
 </li> 
<li><a href="/vipmin/team/index.php">Anúncios</a>
	<ul> 
		<li>
			<a href="/vipmin/team/edit.php">Criar Anúncio </a>       
			<a href="/vipmin/team/index.php">Consultar Anúncios </a>    
		</li>		
	 	<li>
			<a href="/vipmin/category/editcidades.php">Cadastrar Cidade </a>       
			<a href="/vipmin/category/indexcidades.php">Consultar Cidades </a>    
		</li> 
		<li>       
		 	<a href="/vipmin/category/tipoimoveis.php">Tipo de Imóveis </a>  
			<a href="/vipmin/category/editbairros.php">Cadastrar Bairro </a>       
			<a href="/vipmin/category/indexbairros.php">Consultar Bairros </a>    
		</li>
	 
	</ul>
</li>
 <li><a href="/vipmin/team/propostas.php">Propostas</a> </li>  
 <li><a href="/vipmin/order/index.php">Planos</a>
	<ul> 
		<li>
			<a href="/vipmin/order/index.php">Consultar Planos</a> 
			<!-- <a href="/vipmin/order/create.php">Criar Pedidos </a>     -->
		</li>
	</ul>
</li>  
<li><a href="/vipmin/user/index.php">Usuários</a>
	
<!--<li><a href="/vipmin/parceiro/index.php">Anunciantes</a>
	<ul> 
		<li>
			<a href="/vipmin/parceiro/edit.php">Novo Anunciante</a>
			<a href="/vipmin/parceiro/index.php">Consultar Anunciantes</a> 
		</li>
	</ul>
</li>-->
<li> <a href="/vipmin/category/index.php?zone=group">Categorias</a> </li>  
<li><a href="/vipmin/system/page.php">Páginas</a></li>  

<li><a href="/vipmin/system/index.php">Sistema</a>
 <ul>
 <li> <a target="_blank" href="http://www.youtube.com/user/suportevipcom">V&iacute;deos de Ajuda</a> </li>
	 <li> <a href="/vipmin/system/index.php">Informações Básicas</a> </li>
	<li> <a href="/vipmin/system/option.php">Configurações</a> </li>
	   
   <li><a href="/vipmin/system/redes.php?pg=redessociais">Redes Sociais</a></li>  
	<? if(file_exists(WWW_MOD."/anunciante.inc")){?><li> <a href="/vipmin/system/pay.php">Métodos de Pagamento</a> </li><? } ?>
	<li> <a href="/vipmin/system/email.php">Configurar E-mails</a> </li> 
	<li> <a href="/vipmin/misc/backup.php">Backup dos Dados</a> </li> 
	<li>  <a href="/vipmin/user/manager.php">Administrador</a> </li> 
</ul>
</li>
 
</ul> 
