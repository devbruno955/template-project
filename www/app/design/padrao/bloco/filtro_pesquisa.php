<?php

/* Estados são recuperados e preenchidos no select de busca. */
$estados = mysql_query('SELECT * FROM `estados`') or die(mysql_error());

/* Caso o parâmetro com o estado exista e for diferente de vazio, as cidades são recuperadas
   e o select é preenchido.
*/
if(isset($_REQUEST['uf']) and !(empty($_REQUEST['uf']))) {	
	$cidade = strip_tags($_REQUEST['uf']);
	$cidades = mysql_query("SELECT * FROM cidades WHERE uf =  '{$cidade}'") or die(mysql_error());
}

/* Neste ponto é buscado os tipos de imóveis previamente cadastrados pelo administrador. */
$tipos = mysql_query("SELECT * FROM  tipoimoveis order by nome") or die(mysql_error());

/* Neste ponto são buscados os anunciantes do tipo imobiliária. */
$partner = mysql_query("SELECT * FROM  partner WHERE tipo = 'Imobiliaria' AND enable = 'Y' order by title") or die(mysql_error());

if(!(empty($_REQUEST['cidade'])) && $_REQUEST['cidade'] != "todas-cidades") {
	$cidade_filtro = utf8_decode(str_replace("-", " ", strip_tags($_REQUEST['cidade'])));  
}
else {
	$cidade_filtro = "";
}

if(!(empty($_REQUEST['bairro'])) && $_REQUEST['bairro'] != "todos-bairros") {
	$bairro_filtro = getBairro($_REQUEST['bairro']); 
}	
else {
	$bairro_filtro = "";
}
?>
<div style="display:none;" class="tips"><?=__FILE__?></div> 
<link href="<?php echo $PATHSKIN; ?>/css/bootstrap-chosen.css" rel="stylesheet" type="text/css" />
<!--<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>-->
<script src="<?php echo $ROOTPATH; ?>/js/chosen.jquery.min.js"></script>
<script>
	urlFiltro = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
	
	jQuery(function() {

		/* Inicializa o plugin. */
		jQuery('.chosen-select').chosen();
		jQuery('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		
		jQuery('.chosen-select').on('change', function(evt, params) {
			
			var type = jQuery(this).attr('id');
			var selectedValue = params.selected;
			
			/* Busca as cidades de acordo com o estado escolhido. */
			if(type == 'uf') {
				jQuery.ajax({
				   type: 'POST',
				   url: urlFiltro,
				   data: { filtro: 'cidades_anuncios', estado: jQuery('#uf').val() },
				   beforeSend: function() {
						jQuery('#city_id').html('<option>Carregando...</option>');
					},
					success: function(r) {
						jQuery('#city_id').html(r);
						jQuery('#city_id').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
						
						jQuery('#location').html("<option value=''>Todos os bairros</option>");
						jQuery('#location').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
					}
				});			
			}
			
			if(type == 'city_id') {
				jQuery.ajax({
				   type: 'POST',
				   url: urlFiltro,
				   data: { filtro: 'bairros_anuncios', cidade: jQuery('#city_id').val() },
				   beforeSend: function() {
						jQuery('#location').html('<option>Carregando...</option>');
					},
					success: function(r) {
						jQuery('#location').html(r);
						jQuery('#location').find('option:first-child').prop('selected', true).end().trigger('chosen:updated');
					}
				});			
			}
		});
	});
</script>
<script type="text/javascript" src="<?php echo $ROOTPATH; ?>/media/js/jquery.price_format.1.7.min.js"></script>
<script>		
	jQuery('document').ready(function(){
		
		jQuery('#precoMin').priceFormat({
			prefix: 'R$ ',
			centsSeparator: ',',
			thousandsSeparator: '.'
		});		
		
		jQuery('#precoMax').priceFormat({
			prefix: 'R$ ',
			centsSeparator: ',',
			thousandsSeparator: '.'
		});
	});
</script> 
<style>
	.select select {
		width: 250px;
		margin-left: 9px;
	}
	.chosen-container.chosen-container-single.chosen-container-active,
	.chosen-container.chosen-container-single {
		margin-left: 10px !important;
	}
	.chosen-container-single .chosen-search input[type="text"] {
		width: 89%;
	}	
	#tipo_imovel_chosen {
		width: 92% !important;
	}
</style>
<div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3 filtro-resultado">
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-title">
		<h3>FILTRAR SUA PESQUISA</h3>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar box-filtro">
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 box-tags b-filtrar">
			<div class="" id="tag-estado">
				<h5>Estado:</h5>
				<label class="select"> 
					<select id="uf" name="uf" class="chosen-select filtro-busca">
						<option value="">Todos os estados</option>
						<?php
							while ($row = mysql_fetch_array($estados,  MYSQL_ASSOC)) {
								
								if ( $_REQUEST['uf'] == $row['uf'] or $_GET["estado"] == $row['uf']) {
									echo "<option value='{$row['uf']}' selected>".utf8_decode($row['nome'])."</option>";
								} 
								else { 
									echo "<option value='{$row['uf']}'>".utf8_decode($row['nome'])."</option>";
								}
							}
						?>
					</select>
					<i class="seta"></i>
				</label>
			</div>
			<div class="" id="tag-cidade">
				<h5>Cidade:</h5>
				<label class="select">						
					<select id="city_id" name="city" class="chosen-select filtro-busca" data-placeholder="Todas as cidades">
						<?php
							$estado = strip_tags($_GET['estado']);
							$cidade = strip_tags($_GET['cidade']);
							$bairro = strip_tags($bairro_filtro);
							
							$cidades_anuncios = mysql_query("select imob_cidade from team where imob_estado = '" . $estado . "' and ( status is null or status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' and imob_cidade is not null group by imob_cidade");		
							
							if (mysql_num_rows($cidades_anuncios) <= 0) {
								
								echo "<option value='0'>Todas as cidades</option>";
							} 
							else {
								
								echo "<option value=''>Todas as cidades</option>";
								
								while ($row = mysql_fetch_array($cidades_anuncios, MYSQL_ASSOC)) {			
									
									$cidade_aux = removeAcentos2(utf8_decode(str_replace(" ", "-", $row['imob_cidade'])));
									$selected = "";
									$selected = strtolower($cidade_aux) == strtolower($cidade) ? "selected='selected'" : "";
									echo "<option " . $selected . " value='" . utf8_decode($row['imob_cidade']) . "'>" . utf8_decode($row['imob_cidade']) . "</option>";		
								}
							}	
						?>
					</select>
				</label>
			</div>				
			<div class="" id="tag-cidade">
				<h5>Bairro:</h5>
				<label class="select">
					<select id="location" name="location" class="chosen-select filtro-busca" data-placeholder="Todos os bairros">
					<?php
						$bairros = mysql_query("select imob_bairro from team where (imob_cidade = '" . str_replace("-", " ", $cidade) . "' or imob_cidade = '" . $cidade . "') and ( status is null or status = 1 ) and (pago = 'sim' or anunciogratis = 's') and begin_time < '".time()."' and end_time > '".time()."' and imob_bairro is not null group by imob_bairro");
						
						if (mysql_num_rows($bairros) <= 0) {
							
							echo "<option value=''>Todos os bairros</option>";
						} 
						else {
							
							echo "<option value=''>Todos os bairros</option>";
							
							while($row = mysql_fetch_array($bairros, MYSQL_ASSOC)) {
								
								$bairro_aux = getBairro($row['imob_bairro']);
								$selected = "";
								$selected = strtolower($bairro_aux) == strtolower($bairro) ? "selected='selected'" : "";
									
								echo "<option " . $selected . " value='" . utf8_decode($row['imob_bairro']) . "'>" . $bairro_aux . "</option>";
							}
						}
					?>
					</select>
					<i class="seta"></i>
				</label>
			</div>
		</div>
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 b-filtrar">
			<hr>
		</div>
		<div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 sky-form-columns b-filtrar">
			<form method="post" action="post" class="sky-form" id="form-filtro">
					<h5>Tipo do imóvel:</h5>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label class="select">
							<select id="tipo_imovel" class="chosen-select filtro-busca">
								<option value="">Tipo de Imóvel</option>
								<?php
									while($row = mysql_fetch_assoc($tipos)) {
									
										$nome = utf8_decode(tratamento_string($row["nome"]));
								?>
								<option value="<?php echo $nome ?>"><?php echo utf8_decode($row["nome"]); ?></option>
								<?php
									}
								?>
							</select>
							<i></i>
						</label>
					</section>
					<!--<h5>Imobiliárias:</h5>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label class="select">
							<select style="width:250px;" id="partner_imovel" class="filtro-busca">
								<option value="">Imobiliárias</option>
								<?php
									while($row2 = mysql_fetch_assoc($partner)) {
									
										$idimob = $row2["id"];
								?>
								<option value="<?php echo $idimob ?>"><?php echo utf8_decode($row2["title"]); ?></option>
								<?php
									}
								?>
							</select>
							<i></i>
						</label>
					</section>	-->				
					<h5>Condomínio:</h5>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<label class="select">
							<select style="width:250px;"  data-placeholder="Condomínio" id="condominio_filter_s" name="condominio" class="chosen-select uf">
								<option value="">Condomínio</option>
								<option value="com-condominio">Com condomínio</option>
								<option value="sem-condominio">Sem condomínio</option>
								<option value="com-e-sem-condominio">Com e sem condomínio</option>
							</select>	
							<i></i>
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5>Quartos:</h5>
						<label class="select">
							<select style="width:85px;" id="quantidade_quartos" class="filtro-busca">
								<option value="0">-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
							<i class="seta"></i>
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5>Vagas:</h5>
						<label class="select">
							<select style="width:85px;" id="quantidade_vagas" class="filtro-busca">
								<option value="0">-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
							<i class="seta"></i>
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 ultimo">
						<h5>Banheiros:</h5>
						<label class="select">
							<select style="width:85px;" id="quantidade_banhos" class="filtro-busca">
								<option value="0">-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
							<i class="seta"></i>
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 ultimo">
						<h5>Suítes:</h5>
						<label class="select">
							<select style="width:85px;" id="quantidade_suites" class="filtro-busca">
								<option value="0">-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5+</option>
							</select>
							<i class="seta"></i>
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 hr">
						<hr>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h5 style="margin-left:25px;">Valor do imóvel:</h5>
						<label class="input">
							<input style="width: 230px;margin: 0 auto;" type="text" placeholder="R$ mínimo" name="valor-min" id="precoMin" class="filtro-busca" maxlength="14" autocomplete="off">
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 ultimo">
						<label class="input">
							<input style="width: 230px;margin: 0 auto;" type="text" placeholder="R$ máximo" name="valor-max" id="precoMax" class="filtro-busca" maxlength="14" autocomplete="off">
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 hr">
						<hr>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5 style="margin-left:25px;">Área:</h5>
						<label class="input">
							<input style="width: 230px;margin-left: 20px;" type="text" placeholder="área mín." onKeyPress="return SomenteNumero(event);" maxlength="5" name="area-min" id="areaMin" class="filtro-busca">
						</label>
					</section>
					<section class="col col-xs-12 col-sm-12 col-md-6 col-lg-6 ultimo">
						<label class="input">
							<input style="width: 230px;margin-left: 20px;" type="text" placeholder="área max." onKeyPress="return SomenteNumero(event);" maxlength="5" name="area-max" id="areaMax" class="filtro-busca">
						</label>
					</section>
			</form>
		</div>
	</div>
</div>