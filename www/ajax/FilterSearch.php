<?php


include ('../app.php');

/* Caso o usuário tenha utilizado o formulário de busca. */
if(isset($_POST["search"]) and $_POST["search"] == "FiltroBusca") {
	
	/* Validações dos parâmetros enviados. */
	/* Filtro tipo de anúncio. */
	if(isset($_POST["anuncio"])) {

		$anuncio = strip_tags($_POST["anuncio"]);
		
		switch($anuncio) {
			case 'comprar':
				$anuncio = 0;
			break;			
			case 'alugar':
				$anuncio = 1;
			break;			
			case 'alugar-temporada':
				$anuncio = 2;
			break;			
			case 'lancamentos':
				$anuncio = 3;
			break;			
			case 'favoritos':
				$anuncio = 4;
			break;
			case 'finalidade_todos':
				$anuncio = 5;
			break;
			default:
				$anuncio = 5;
			break;
		}
		
		if($anuncio >= 0 && $anuncio <= 3) {
			$anuncioSql = " imob_finalidade = " . $anuncio;
		}
		else {
			$anuncioSql = " imob_finalidade is not null ";
		}
	}
	else {
		$anuncioSql = " imob_finalidade is not null ";
	}	 

	$estado = strip_tags($_POST["uf"]);
	/* Filtro cidade. */
	if(isset($_POST["city"]) and !(empty($_POST["city"]))) {
		
		$cidade = $_POST['city'];

		if(!(empty($cidade))) {

			if(!empty($cidade) ){
				$cidadeSql = " imob_cidade LIKE '%" . $cidade . "%' and  ";
			}
		}
		else {
			$cidadeSql = " imob_cidade is not null and  ";
		}
	}
	else {
		$cidadeSql = " imob_cidade is not null and  ";
	}	
	/* Filtro nome de estado. */
	if(isset($_POST["uf"]) and !(empty($_POST["uf"]))) {
		if(!(empty($estado))) {
			$estadoSql = " imob_estado like '%" . $estado . "%' ";
		}
		else {
			$estadoSql = " imob_estado is not null ";
		}
	}
	else {
		$estadoSql = " imob_estado is not null ";
	}	
	/* Filtro nome do bairro. */
	if(isset($_POST["bairro"]) and !(empty($_POST["bairro"]))) {
		$bairro = strip_tags($_POST["bairro"]);
		if(!(empty($bairro))) {		
			$bairroSql = " imob_bairro = " . $bairro;			
		}
		else {
			$bairroSql = " imob_bairro is not null ";
		}
	}
	else {
		$bairroSql = " imob_bairro is not null ";
	}	
	/* Filtro tipo de imóvel. */
	if(isset($_POST["tipo"]) and !(empty($_POST["tipo"]))) {
		$tipo = strip_tags($_POST["tipo"]);
		if(!(empty($tipo))) {
			/* Busca a ID do tipo de imóvel escolhido na busca. */
			$sql = "select id from tipoimoveis where nome = '" . $tipo . "'";
			$rs = mysql_query($sql);
			$tipo_id = mysql_fetch_assoc($rs);
			$tipoSql = " imob_tipo = '" . $tipo_id['id'] . "' ";
		}
		else {
			$tipoSql = " imob_tipo is not null ";
		}
	}
	else {
		$tipoSql = " imob_tipo is not null ";
	}
/* Filtro imobiliaria. */
	if(isset($_POST["partner"]) and !(empty($_POST["partner"]))) {
		$partner = (int) strip_tags($_POST["partner"]);
		if($partner != 0 || !(empty($partner))) {
			$partnerSql = " partner_id = '" . $partner . "' ";
		}
		else {
			$partnerSql = " partner_id is not null ";
		}
	}
	else {
		$vagasSql = " imob_vagas is not null ";
	}		
	/* Filtro número de quartos. */
	if(isset($_POST["quartos"]) and !(empty($_POST["quartos"]))) {
		$quartos = (int) strip_tags($_POST["quartos"]);
		if($quartos != 0 || !(empty($quartos))) {
			
			if($quartos == 5) {				
				$quartosSql = " imob_quartos >= " . $quartos . " ";
			}
			else {
				$quartosSql = " imob_quartos = " . $quartos . " ";
			}
		}
		else {
			$quartosSql = " imob_quartos is not null ";
		}
	}
	else {
		$quartosSql = " imob_quartos is not null ";
	}
	/* Filtro número de vagas. */
	if(isset($_POST["vagas"]) and !(empty($_POST["vagas"]))) {
		$vagas = (int) strip_tags($_POST["vagas"]);
		if($vagas != 0 || !(empty($vagas))) {
			$vagasSql = " imob_vagas = '" . $vagas . "'";
		}
		else {
			$vagasSql = " imob_vagas is not null ";
		}
	}
	else {
		$vagasSql = " imob_vagas is not null ";
	}	
	/* Filtro número de banheiros. */
	if(isset($_POST["banheiro"]) and !(empty($_POST["banheiro"]))) {
		$banheiro = (int) strip_tags($_POST["banheiro"]);
		if($banheiro != 0 || !(empty($banheiro))) {
			$banheiroSql = " imob_banheiro = '" . $banheiro . "'";
		}
		else {
			$banheiroSql = " imob_banheiro is not null ";
		}
	}
	else {
		$banheiroSql = " imob_banheiro is not null ";
	}	
	/* Filtro número de suítes. */
	if(isset($_POST["suite"]) and !(empty($_POST["suite"]))) {
		$suite = (int) strip_tags($_POST["suite"]);
		if($suite != 0 || !(empty($suite))) {
			$suiteSql = " imob_suite = '" . $suite . "'";
		}
		else {
			$suiteSql = " imob_suite is not null ";
		}
	}
	else {
		$suiteSql = " imob_suite is not null ";
	}	
	/* Filtro tamanho mínimo de área. */
	if(isset($_POST["AreaMin"]) and !(empty($_POST["AreaMin"]))) {
		$AreaMin = (int) strip_tags($_POST["AreaMin"]);
		if($AreaMin != 0 || !(empty($AreaMin))) {
			$AreaMinSql = " imob_area >= " . $AreaMin . "";
		}
		else {
			$AreaMinSql = " imob_area is not null ";
		}
	}
	else {
		$AreaMinSql = " imob_area is not null ";
	}	
	/* Filtro tamanho máximo de área. */
	if(isset($_POST["AreaMax"]) and !(empty($_POST["AreaMax"]))) {
		$AreaMax = (int) strip_tags($_POST["AreaMax"]);
		if($AreaMax != 0 || !(empty($AreaMax))) {
			$AreaMaxSql = " imob_area <= " . $AreaMax . "";
		}
		else {
			$AreaMaxSql = " imob_area is not null ";
		}
	}
	else {
		$AreaMaxSql = " imob_area is not null ";
	}	
	/* Filtro preço mínimo. */
	if(isset($_POST["PrecoMin"]) and !(empty($_POST["PrecoMin"]))) {
		$PrecoMin = strip_tags($_POST["PrecoMin"]);
		if($PrecoMin != 0 || !(empty($PrecoMin))) {
			$PrecoMin = str_replace("R$ ", "", str_replace(",", ".", str_replace(".", "", $PrecoMin)));
			$PrecoMinSql = " team_price >= '" . $PrecoMin . "'";
		}
		else {
			$PrecoMinSql = " team_price is not null ";
		}
	}
	else {
		$PrecoMinSql = " team_price is not null ";
	}	
	
	/* Filtro preço máximo. */
	if(isset($_POST["condominio"]) and !(empty(condominio))) {
		
		$condominio = strip_tags($_POST["condominio"]);
		
		if($condominio == "com-e-sem-condominio") { 
			$condominioSql = " (imob_condominio > 0.00 or imob_condominio = 0.00) ";
		}		
		else if($condominio == "com-condominio") { 
			$condominioSql = " imob_condominio > 0.00 ";
		}
		else { 
			$condominioSql = " imob_condominio = 0.00 ";
		}
	}
	
	/* Ordenação dos resultados. */
	if(isset($_POST["ordenar"]) and !(empty($_POST["ordenar"]))) {
		$ordenar = strip_tags($_POST["ordenar"]);
		if(!(empty($ordenar))) {
			if($ordenar == "asc") {
				$OrdenarSql = " team_price ASC ";
			}
			else {
				$OrdenarSql = " team_price DESC ";
			}
		}
		else {
			$OrdenarSql = " create_time ASC ";
		}
	}
	else {
		$OrdenarSql = " create_time ASC ";
	}
	/* Caso, apenas se não for buscar anúncios nos favoritos. */
	if($anuncio != 4) {
		$Condition = "( begin_time < '" . time() . "' and end_time > '" . time() . "' ) and ( status is null or status = 1 ) and ( desativado is null or desativado !='s' ) and ( pago = 'sim' or anunciogratis = 's' )";
		/* SQL para buscar anúncios de acordo com os parâmetros enviados. */
	  	$sql = "select * from team where " . $Condition . " and " . $PrecoMaxSql . $PrecoMinSql . " and " . $anuncioSql . " and " . $tipoSql . " and " . $partnerSql . " and ". $suiteSql . " and " . $banheiroSql . " and " . $quartosSql . " and " . $vagasSql . " and " . $bairroSql . " and " . $cidadeSql . " " . $estadoSql . " and " . $AreaMaxSql . " and " . $AreaMinSql . " and " . $condominioSql . " order by " . $OrdenarSql;
		$busca = mysql_query($sql);
		$row = mysql_num_rows($busca);
	}
	/* Caso a SQL não retorne resultados. */
	if(empty($row)) {
		$row = 0;
	}
?>
	<script>
		jQuery('document').ready(function(){
			jQuery('#breadcrumb-quantidade').html(<?php echo $row; ?>);
		});
	</script>
<?php
	/* Caso tenha retornado algum resultado da consulta utilizando os filtros. */
	if($row >= 1) {
		while($anuncios = mysql_fetch_assoc($busca)) {
			/* Tratamento da imagem do imóvel. */
			if(empty($anuncios['img0'])) {
				$imagem = $PATHSKIN . "/images/produto-sem-foto.jpg";
			}
			else {
				$imagem = $ROOTPATH . "/media/" . $anuncios['img0'];
			}	
			/* Tratamento do número de quartos do imóvel. */
			if(empty($anuncios['imob_quartos']) || $anuncios['imob_quartos'] == 0) {
				$quartos = "--";
			}
			else {
				$quartos = $anuncios['imob_quartos'];
			}							
			/* Tratamento do número de vagas do imóvel. */
			if(empty($anuncios['imob_vagas']) || $anuncios['imob_vagas'] == 0) {
				$vagas = "--";
			}
			else {
				$vagas = $anuncios['imob_vagas'];
			}
			/* Tratamento do código do imóvel. */
			if(empty($anuncios['imob_codigo'])) {
				$codigo = "--";
			}
			else {
				$codigo = $anuncios['imob_codigo'];
			}							
			/* Tratamento do número de suítes do imóvel. */
			if(empty($anuncios['imob_suite']) || $anuncios['imob_suite'] == 0) {
				$suite = "--";
			}
			else {
				$suite = $anuncios['imob_suite'];
			}							
			/* Tratamento do número de banheiros do imóvel. */
			if(empty($anuncios['imob_banheiro']) || $anuncios['imob_banheiro'] == 0) {
				$banheiro = "--";
			}
			else {
				$banheiro = $anuncios['imob_banheiro'];
			}							
			/* Tratamento da área do imóvel. */
			if(empty($anuncios['imob_area']) || $anuncios['imob_area'] == 0) {
				$area = "--";
			}
			else {
				$area = $anuncios['imob_area'];
			}
			/* Preparação da url do anúncio. */
			$UrlAnuncio = UrlAnuncio($anuncios['id']);
?>
<script>
	J('document').ready(function(){
		/* Redireciona usuário para a página do anúncio. */
		J('.btn-detalhe').click(function() {
			var UrlAnuncio = J(this).attr('data-url');
			location.href = UrlAnuncio;
		});		
	});
</script>
	<li class="imovel-venda ">
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar nopadmar-hover"> 

			<div class="col col-xs-12 col-sm-12 col-md-4 col-lg-4 box-foto" style="padding: 5px; border: 4px solid #FFF;">
				<a href="<?php echo $UrlAnuncio; ?>">
					<img src="<?php echo $imagem; ?>">
				</a>
			</div>  
				<ul class="ul-label hide">  
					<li style="padding: 5px;">&nbsp;</li>
				</ul> 
				<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8 nopadmar box-dados"> 
					<a href="<?php echo $UrlAnuncio; ?>">
						<div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<h4 class="tipo-imovel"><?php echo $anuncios['title']; ?></h4> 
							<p><?php echo displaySubStringWithStrip($anuncios['summary'], 200); ?></p> 
							<ul class="ul-caracteristica"> 
								<li>   
									<h4 class="numero"><?php echo $quartos; ?></h4>  
									<h5>quartos</h5> 
								</li>   
								<li>     
									<h4 class="numero"><?php echo $suite; ?></h4>
									<h5><?php echo utf8_encode("suíte"); ?></h5> 
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
						<h5 class="codigo"><?php echo utf8_encode("código:"); ?><strong><?php echo $codigo; ?></strong></h5>  
						<h6 class="area"><?php echo $area; ?><?php echo utf8_encode("m²"); ?></h6>    
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
</a>
<?php	
		}
	}
	else {
?>
<li class="imovel-venda result-none">
	<img src="<?php echo $PATHSKIN; ?>/images/home.png">
	<p class="text-resul-none"><?php echo utf8_encode("Não encontramos nenhum anúncio com os dados informados."); ?><p>
</li>
<?php	
	}
}
?>