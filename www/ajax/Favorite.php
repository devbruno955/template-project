<?php

include ('../app.php');

/* Caso o usu�rio tenha utilizado o formul�rio de busca. */
if(isset($_POST["anuncio"]) and !(empty($_POST["anuncio"]))) {
	
	/* Linhas retornadas de uma query. */
	$row = 0;
	/* N�mero de an�ncios encontrados. */
	$i = 0;
	
	/* Valida��es dos par�metros enviados. */
	$anuncio = (int) strip_tags($_POST["anuncio"]);
	
	if(!(empty($_SESSION["IdAnuncio"]))) {
		
		$row = 1;
	}		
	
	/* Caso tenha retornado algum resultado da consulta utilizando os filtros. */
	if($row >= 1) {
		
		/* Caso o $anuncio seja igual a 2, ent�o se trata dos an�ncios nos favoritos. */
		foreach($_SESSION["IdAnuncio"] as $IdAnuncio => $idOffer) {
			
			$sql = "select * from team where id = " . $idOffer;
			$busca = mysql_query($sql);
			
			/* Imprime os an�ncios, de acordo com o que se encontra armazenado na sess�o. */
			while($anuncios = mysql_fetch_assoc($busca)) {
			
				$i ++;
				
				/* Tratamento da imagem do im�vel. */
				if(empty($anuncios['img0'])) {
					$imagem = $PATHSKIN . "/images/produto-sem-foto.jpg";
				}
				else {
					$imagem = $ROOTPATH . "/media/" . $anuncios['img0'];
				}	

				/* Tratamento do n�mero de quartos do im�vel. */
				if(empty($anuncios['imob_quartos']) || $anuncios['imob_quartos'] == 0) {
					
					$quartos = "--";
				}
				else {
					
					$quartos = $anuncios['imob_quartos'];
				}							
				
				/* Tratamento do n�mero de vagas do im�vel. */
				if(empty($anuncios['imob_vagas']) || $anuncios['imob_vagas'] == 0) {
					
					$vagas = "--";
				}
				else {
					
					$vagas = $anuncios['imob_vagas'];
				}

				/* Tratamento do c�digo do im�vel. */
				if(empty($anuncios['imob_codigo'])) {
					
					$codigo = "--";
				}
				else {
					
					$codigo = $anuncios['imob_codigo'];
				}							
				
				/* Tratamento do n�mero de su�tes do im�vel. */
				if(empty($anuncios['imob_suite']) || $anuncios['imob_suite'] == 0) {
					
					$suite = "--";
				}
				else {
					
					$suite = $anuncios['imob_suite'];
				}							
				
				/* Tratamento do n�mero de banheiros do im�vel. */
				if(empty($anuncios['imob_banheiro']) || $anuncios['imob_banheiro'] == 0) {
					
					$banheiro = "--";
				}
				else {
					
					$banheiro = $anuncios['imob_banheiro'];
				}							
				
				/* Tratamento da �rea do im�vel. */
				if(empty($anuncios['imob_area']) || $anuncios['imob_area'] == 0) {
					
					$area = "--";
				}
				else {
					
					$area = $anuncios['imob_area'];
				}
				
				/* Prepara��o da url do an�ncio. */
				$UrlAnuncio = UrlAnuncio($anuncios['id']);

?>
<li class="imovel-venda ">
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar nopadmar-hover"> 
		<a href="<?php echo $UrlAnuncio; ?>">
			<div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 box-foto" style="padding: 5px; border: 4px solid #FFF;">
				<img src="<?php echo $imagem; ?>">
			</div> 
		</a> 
			<ul class="ul-label hide">  
				<li style="padding: 5px;">&nbsp;</li>
			</ul> 
			<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8 nopadmar box-dados"> 
				<a href="<?php echo $UrlAnuncio; ?>">
					<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<h4 class="tipo-imovel"><?php echo $anuncios['title']; ?></h4> 
						<h5><?php echo $bairro['nome']; ?></h5> 
						<p><?php echo displaySubStringWithStrip($anuncios['summary'], 200); ?></p> 
						<ul class="ul-caracteristica"> 
							<li>   
								<h4 class="numero"><?php echo $quartos; ?></h4>  
								<h5>quartos</h5> 
							</li>   
							<li>     
								<h4 class="numero"><?php echo $suite; ?></h4>
								<h5><?php echo utf8_encode("su�te"); ?></h5> 
							</li> 
							<li>     
								<h4 class="numero"><?php echo $banheiro; ?></h4>
								<h5>banho</h5> 
							</li>  
							<li>    
								<h4 class="numero"><?php echo $vagas; ?></h4> 
								<h5>vaga</h5>
							</li>    
						</ul>   
					</div> 
				</a>
				<div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 box-valor">   
					<h2 class="cor-F9683D valor">R$ <?php echo number_format($anuncios['team_price'] , 2, ',', '.'); ?></h2> 
					<?php if($anuncios['imob_financiamento'] == 1) { ?>
					<span class="label label-primary">aceita financiamento</span>
					<?php } ?>
					<input type="hidden" value="14962" class="hd_id">    
					<h5 class="codigo"><?php echo utf8_encode("c�digo:"); ?><strong><?php echo $codigo; ?></strong></h5>  
					<h6 class="area"><?php echo $area; ?><?php echo utf8_encode("m�"); ?></h6>    
					<button class="btn btn-detalhe btn-laranja" data-url="<?php echo $UrlAnuncio; ?>">Detalhe</button> 

					<?php
						if(!in_array($anuncios["id"], $_SESSION["IdAnuncio"])){
					?>
						<button onclick="J(this).AddFavorite(<?php echo $anuncios["id"]; ?>);" data-id="<?php echo $anuncios["id"]; ?>" id="btn<?php echo $anuncios["id"]; ?>" class="btn btn-favorito"><i class="fa fa-heart"></i></button>
					<?php
						}else{
					?> 		
						<button onclick="J(this).AddFavorite(<?php echo $anuncios["id"]; ?>);" data-id="<?php echo $anuncios["id"]; ?>" id="btn<?php echo $anuncios["id"]; ?>" class="btn btn-favorito-active"><i class="fa fa-heart"></i></button>
					<?php
						}
					?>					
				</div> 
			</div> 
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nomar" style="height:1px;">  
		<hr style="margin-bottom: 0!important; margin-top: 0!important;"> 
		</div>
	</div>  
</li>
<?php	
			}
		}
	}
	else {

?>
<li class="imovel-venda result-none">
	<img src="<?php echo $PATHSKIN; ?>/images/home.png">
	<p class="text-resul-none"><?php echo utf8_encode("N�o encontramos nenhum an�ncio nos favoritos."); ?><p>
</li>
<?php	
	}
}

?>

<script>
	jQuery('document').ready(function(){
		
		jQuery('#breadcrumb-quantidade').html(<?php echo $i; ?>);
		
		/* Redireciona usu�rio para a p�gina do an�ncio. */
		J('.btn-detalhe').click(function() {
			
			var UrlAnuncio = J(this).attr('data-url');
			location.href = UrlAnuncio;
		});	
	});
	
</script>