<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php

/* Estados são recuperados e preenchidos no select de busca. */
$estados = mysql_query('SELECT * FROM `estados`') or die(mysql_error());

/* Caso o parâmetro com o estado exista e for diferente de vazio, as cidades são recuperadas
   e o select é preenchido.
*/
//if(isset($_REQUEST['uf']) and !(empty($_REQUEST['uf']))) {	
	//$cidade = strip_tags($_REQUEST['uf']);
   // $cidade = 'MG';
	//$cidades = mysql_query("SELECT * FROM cidades WHERE uf =  '{$cidade}'") or die(mysql_error());
//}

/* Neste ponto é buscado os tipos de imóveis previamente cadastrados pelo administrador. */
$tipos = mysql_query("SELECT * FROM  tipoimoveis order by nome") or die(mysql_error());

?>	
<script>
	urlFiltro = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
	jQuery(function() {
		jQuery('#uf').bind('change', function(ev) {
			jQuery.ajax({
			   type: 'POST',
			   url: urlFiltro,
			   data: { filtro: 'cidades_home', estado: jQuery('#uf').val() },
			   beforeSend: function() {
					jQuery('#city').html('<option>Carregando...</option>');
				},
				success: function(r) {
					jQuery('#city').html(r);
				}
			});
			
		});
	});

	jQuery(function() {
		jQuery('#city').bind('change', function(ev) {
			jQuery.ajax({
			   type: 'POST',
			   url: urlFiltro,
			   data: { filtro: 'bairros_home', cidade: jQuery('#city').val() },
			   beforeSend: function() {
					jQuery('#location').html('<option>Carregando...</option>');
				},
				success: function(r) {
					jQuery('#location').html(r);
				}
			});
			
		});
	});
</script>  
<div class="buscaMobile">
	<form id="search-form">
		<div class="linkNavForm">
			<a data-id="show" href="#">
				Exibir busca
			</a>
		</div>
		<div class="rowForm">	
			<label>Finalidade</label>
			<select class="comprar" name="transacao" id="sl-transacao">
				<option value="comprar">Comprar</option>
				<option value="alugar">Alugar</option>
				<!--<option value="alugar-temporada">Alugar temporada</option>-->
				<option value="lancamentos">Lançamentos</option>
			</select>       
		</div>			
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Tipos de imóvel</label>
					<select class="tipoimovel" name="tipoimovel" id="sl-tipoimovel">
						<option value="">Tipos de imóvel</option>
						<?php
							while($row = mysql_fetch_assoc($tipos)) {
							
								$nome = utf8_decode(tratamento_string($row["nome"]));
						?>
						<option value="<?php echo $nome; ?>"><?php echo utf8_decode($row["nome"]); ?></option>
						<?php
							}
						?>
					</select>
				</div> 
			</section> 
		</div>		
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Quartos</label>
					<select class="quantidade_quartos" id="quantidade_quartos">
						<option value="0">Quartos</option>
						<option value="1-quarto">1 quarto</option>
						<option value="2-quartos">2 quartos</option>
						<option value="3-quartos">3 quartos</option>
						<option value="4-quartos">4 quartos</option>
						<option value="5-quartos">5+ quartos</option>
					</select>
				</div> 
			</section>  
		</div>			
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Vagas</label>
					<select class="quantidade_vagas" id="quantidade_vagas">
						<option value="0">Vagas</option>
						<option value="1-vaga">1 vaga</option>
						<option value="2-vagas">2 vagas</option>
						<option value="3-vagas">3 vagas</option>
						<option value="4-vagas">4 vagas</option>
						<option value="5-vagas">5+ vagas</option>
					</select>
				</div> 
			</section>  
		</div>			
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Estado</label>
					<select name="uf" id="uf" class="uf">
						<option value="">Todos os estados</option>
						<option value="AC">Acre</option>
						<option value="AL">Alagoas</option>
						<option value="AM">Amazonas</option>
						<option value="AP">Amapá</option>
						<option value="BA">Bahia</option>
						<option value="CE">Ceará</option>
						<option value="DF">Distrito Federal</option>
						<option value="ES">Espírito Santo</option>
						<option value="GO">Goiás</option>
						<option value="MA">Maranhão</option>
						<option value="MG">Minas Gerais</option>
						<option value="MS">Mato Grosso do Sul</option>
						<option value="MT">Mato Grosso</option>
						<option value="PA">Pará</option>
						<option value="PB">Paraíba</option>
						<option value="PE">Pernambuco</option>
						<option value="PI">Piauí</option>
						<option value="PR">Paraná</option>
						<option value="RJ">Rio de Janeiro</option>
						<option value="RN">Rio Grande do Norte</option>
						<option value="RO">Rondônia</option>
						<option value="RR">Roraima</option>
						<option value="RS">Rio Grande do Sul</option>
						<option value="SC">Santa Catarina</option>
						<option value="SE">Sergipe</option>
						<option value="SP">São Paulo</option>
						<option value="TO">Tocantins</option>
					</select>	
				</div> 
			</section>  
		</div>			
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Cidade</label>
					<select class="city" id="city">
						<option value="">Todas as cidades</option>
						<?php
							while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
								
								if ($_REQUEST['city_id'] == $row['id']) {
									echo "<option value='{$row['nome']}' selected>{$row['nome']}</option>";
								} 
								else {
									echo "<option value='{$row['nome']}'>{$row['nome']}</option>";
								}
							}
						?>
					</select>
				</div> 
			</section>  
		</div>	
		<div class="rowForm">	
			<section class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadmar">
				<div class="select select-large field-search select-transacao">                               
					<label>Bairro</label>
					<select class="location" id="location">
						<option value="">Todos os Bairros</option>
					</select>
				</div> 
			</section>  
		</div>			
		<div class="rowForm">	
			<input type="button" name="btnBuscar" id="search-imovel-mobile" value="Buscar" class="btnSubmit">
		</div>
	</form>
</div>