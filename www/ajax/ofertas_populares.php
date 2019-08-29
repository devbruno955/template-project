<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<?php
  
$BlocosOfertas = new BlocosOfertas();

if (!$city) $city = get_city();
if (!$city) $city = array_shift($hotcities); 

$order = " order by `sort_order` DESC, `id` DESC ";
if( $INI['option']['rand_popular'] == "Y"){
	$order =  "order by rand()";
}
if(!empty($_POST['ordena'])){
	$order =  "order by ".$_POST['ordena'];
}
 
$nmimagem = "popular";
if( $INI['option']['tpvulc'] == "2"){
	$stylethree_up_op 	=  "width:99%";
	$styletitle			=  "font-size:14px";
	$stylesubtitle	 	=  "font-size:12px";
	$styletimer_op	 	=  "right:19px";
	$nmimagem 			= "popular";
} 
 
$contador = 0;
   
$idcategoria = trim($_REQUEST['idcategoria']);
 
if(!empty($_POST['cppesquisa'])){
	 $cppesquisa = trim($_POST['cppesquisa']);
}
else if(!empty($_POST['cppesquisagrava'])){
	 $cppesquisa = trim($_POST['cppesquisagrava']);
} 

if($cppesquisa =="O que está procurando ?"){
	unset($cppesquisa);
}


if(!empty($cppesquisa )){
	$procura = retira_acentos($cppesquisa);
	$condition = array(  
		"begin_time < '".time()."'",
		"end_time > '".time()."'",
		"title like '%".$procura."%' or summary like '%".$procura."%'",
		"city_id in (0,".$city['id'].")",
		"status is null or status = 1",
		"pago = 'sim' or anunciogratis = 's'",
		
	);
}
else if (!empty($_POST['filtros'])) {
	$condition = array();
	if (isset($_POST['tipo']))
		if ($_POST['tipo'] != '')
			$condition[] = "car_tipo = '{$_POST['tipo']}'";
	if (isset($_POST['car_fabricante']))
		if ($_POST['car_fabricante'] != '')
			$condition[] = "car_fabricante = '{$_POST['car_fabricante']}'";
	if (isset($_POST['car_modelo']))
		if ($_POST['car_modelo'] != '')
			$condition[] = "car_modelo = '{$_POST['car_modelo']}'";
	if (isset($_POST['car_ano_de']))
		if ($_POST['car_ano_de'] != '')
			$condition[] = "car_ano >= {$_POST['car_ano_de']}";
	if (isset($_POST['car_ano_ate']))
		if ($_POST['car_ano_ate'] != '')
			$condition[] = "car_ano <= {$_POST['car_ano_de']}";
	if (isset($_POST['team_price_inicio']))
		if ($_POST['team_price_inicio'] != '')
			$condition[] = "team_price >= {$_POST['car_ano_de']}";
	if (isset($_POST['team_price_final']))
		if ($_POST['team_price_final'] != '')
			$condition[] = "team_price <= {$_POST['car_ano_de']}";
	//CODIGO DA CIDADE
	$condition[] = "city_id in (0,{$city['id']})";
}
else { 
	if($idcategoria){
		$condition = array( 
			"group_id = ".$idcategoria, 
			"begin_time < '".time()."'",
			"end_time > '".time()."'",
			"city_id in (0,".$city['id'].")",
			"status is null or status = 1",
			"pago = 'sim' or anunciogratis = 's'",
		);
	}
	else{
		$condition = array( 
			"begin_time < '".time()."'",
			"end_time > '".time()."'",
			"city_id in (0,".$city['id'].")",
			"status is null or status = 1",
			"pago = 'sim' or anunciogratis = 's'",
		);
	}
}
	
$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$teams = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => "$order",
	'size' => $pagesize,
	'offset' => $offset,
)); 
 
$stordenacao = "cpordenacaofx";
if($navegador != "firefox"){
		$stordenacao = "cpordenacaoie";
}
 ?>
 <style>
 .clear {
	clear:both;
 }
 
 .radioCarro {
	background: transparent url("http://imgs2.vrum.com.br/fu_radiobutton.gif") no-repeat scroll 0 0;
	width: 150px;
	display: inline-block;
	height: 30px;
	color: white;
	font-size: 16px;
	line-height: 22px;
	padding-left: 5px;
	margin-left: 13px;
 }
 
 .radioCarro input {
	width: 20px;
	margin-top: -3px;
}

.select_filtro {
	margin-left: 13px;
	width: 150px;
	height: 50px;
	display: inline-block;
	color: black;
}

.select_filtro select {
	width: 150px;
	margin-top: 3px;
}

#formularioCarro input[type='submit'] { 
	width: 100px;
	margin-left: 230px;
}
 </style>
 <div class="blocoCarro">
	<form method="post" action="" name="formularioCarro" id="formularioCarro">
	 <input type="hidden" name="filtros" value="true">
	 <label class="radioCarro">
		<input type="radio" name="tipo" value="Carro" checked="checked"> Carro
	 </label>
	 <label class="radioCarro">
		<input type="radio" name="tipo" value="Moto"> Moto
	 </label>
	 <label class="radioCarro">
		<input type="radio" name="tipo" value="Caminhão"> Caminhão
	 </label>
	 <label class="radioCarro">
		<input type="radio" name="tipo" value="Naútico"> Naútico
	 </label>
	 <div class="clear"></div>
	 <label for="car_fabricante" class="select_filtro">
		Fabricante
		<select name="car_fabricante" id="select_car_fabricante">
		<option value=""></option>
		<?php
		$fabricantes = mysql_query("SELECT DISTINCT car_fabricante from team where car_fabricante != '';");
		while ($fab = mysql_fetch_array($fabricantes, MYSQL_ASSOC)) {
		echo "<option value='{$fab['car_fabricante']}'>{$fab['car_fabricante']}</option>";
		}
		?>
		</select>		
	 </label>
	 <label for="car_modelo" class="select_filtro">
		Modelo
		<select name="car_modelo" id="select_car_modelo">
		<option value=""></option>
		</select>		
	 </label>
	 <label for="car_ano_de" class="select_filtro">
		Ano Inicial:
		<select name="car_ano_de" id="select_car_ano_inicio">
		<option value=""></option>
		</select>		
	 </label>
	 <label for="car_ano_ate" class="select_filtro">
		Ano Final:
		<select name="car_ano_ate" id="select_car_ano_fim">
		<option value=""></option>
		</select>		
	 </label>
	 <div class="clear"></div>
	 <label for="car_ano_ate" class="select_filtro">
		Preço Inicial:
		<select name="team_price_inicio" id="select_car_price_final">
		<option value=""></option>
		<?php
			for ($i=1000;$i<=30000;$i=$i+1000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
			for ($i=40000;$i<=100000;$i=$i+10000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
			for ($i=150000;$i<=1000000;$i=$i+100000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
		?>
		</select>		
	 </label>
	 <label for="car_ano_ate" class="select_filtro">
		Preço Final:
		<select name="team_price_final" id="select_car_price_inicio">
		<option value=""></option>
		<?php
			for ($i=1000;$i<=30000;$i=$i+1000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
			for ($i=40000;$i<=100000;$i=$i+10000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
			for ($i=150000;$i<=1000000;$i=$i+100000) {
				$valor = number_format($i, 2);
				echo "<option value='{$valor}'>{$valor}</option>";
			}
		?>
		</select>		
	 </label>
	 <input type="submit" value="Filtrar" />
	</form>
 </div>
 <script>
jQuery(document).ready(function() {
	jQuery('#select_car_fabricante').bind('change', function(ev) {
		ev.preventDefault();
		if (jQuery(this).val() != '')
			buscaFiltros('modelo');
	});
	jQuery('#select_car_modelo').bind('change', function(ev) {
		ev.preventDefault();
		if (jQuery(this).val() != '') {
			buscaFiltros('ano');
		}
	});
	jQuery('#select_car_fabricante').bind('click', function(ev) {
	if (jQuery(this).html() == '')
		buscaFiltros('fabricante');
	});
	jQuery('.radioCarro').bind('click', function(ev) {
		buscaFiltros('fabricante');
	});
	buscaFiltros('fabricante');
});
	function buscaFiltros(filtro) {
		jQuery.ajax({
			url:  "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php",
			type: "POST",
			data: {
				filtro: filtro,
				tipo: jQuery('#formularioCarro input[type=radio]:checked').val(),
				fabricante: jQuery('#select_car_fabricante').val(),
				modelo: jQuery('#select_car_modelo').val(),
				ano_inicial: jQuery('#select_car_ano_inicial').val(),
				ano_final: jQuery('#select_car_ano_final').val()
			},
			beforeSend: function() {
				if (filtro == 'modelo')
					jQuery('#select_car_modelo').html("<option>Carregando...</option>");
				if (filtro == 'ano') {
					jQuery('#select_car_ano_inicio').html("<option>Carregando...</option>");
					jQuery('#select_car_ano_fim').html("<option>Carregando...</option>");
				}
				if (filtro == 'fabricante')
					jQuery('#select_car_fabricante').html("<option>Carregando...</option>");
			},
			success: function(r) {
				if (filtro == 'modelo')
					jQuery('#select_car_modelo').html(r);
				if (filtro == 'ano') {
					jQuery('#select_car_ano_inicio').html(r);
					jQuery('#select_car_ano_fim').html(r);
				}
				if (filtro == 'fabricante')
					jQuery('#select_car_fabricante').html(r);
			}
		});
	}
</script>
<?php
if (isset($_POST['filtros'])) {
?>

<div class="secaotitulo popular">
	<div style="font-size: 15px;color:#fff; float:left; width: 100%;">
	<?php
	if (isset($_POST['car_fabricante']))
		if ($_POST['car_fabricante'] != '')
		echo "Fabricante: {$_POST['car_fabricante']} |";
	if (isset($_POST['car_modelo']))
		if ($_POST['car_modelo'] != '')
		echo "Modelo: {$_POST['car_modelo']} |";
	if (isset($_POST['car_ano_de']) && isset($_POST['car_ano_ate']))
		if ($_POST['car_ano_de'] != '' && $_POST['car_ano_ate'] != '')
		echo "De: {$_POST['car_ano_de']} Até: {$_POST['car_ano_ate']}|";
	if (isset($_POST['car_ano_de']))
		if ($_POST['car_ano_de'] != '' && $_POST['car_ano_ate'] == '')
		echo "De: {$_POST['car_ano_de']} |";
	if (isset($_POST['car_ano_ate']))
		if ($_POST['car_ano_ate'] != '' && $_POST['car_ano_de'] == '')
		echo "Até: {$_POST['car_ano_ate']} |";
	if (isset($_POST['team_price_inicio']) && isset($_POST['team_price_final']))
		if ($_POST['team_price_inicio'] != '' && $_POST['team_price_final'] != '')
		echo "À partir de: {$_POST['team_price_inicio']} até {$_POST['team_price_final']} |";
	if (isset($_POST['team_price_inicio']))
		if ($_POST['team_price_inicio'] != '' && $_POST['team_price_final'] == '')
		echo "À partir de: {$_POST['team_price_inicio']} |";
	if (isset($_POST['team_price_final']))
		if ($_POST['team_price_final'] != '' && $_POST['team_price_inicio'] == '')
		echo "Até {$_POST['team_price_final']}";
	?>
	</div>
</div>
<div class='clear'></div>

<?php
}
?>

<div class="secaotitulo popular">
	<div style="font-size: 15px;color:#fff; float:left; width: 100%;">Você está em: <span><?geraBreadcrumb();?></span>
			 <div class="<?=$stordenacao?>"><select onchange="ordenarBusca(this.value);" id="ordenacao" name="ordenacao">
				<option value="">Ordenação</option>
				<option value="sort_order DESC, id DESC" <? if ($_POST['ordena']=="sort_order DESC, id DESC"){ echo "selected";} ?>>Padrão</option>
				<option value="id DESC" <? if ($_POST['ordena']=="id DESC"){ echo "selected";} ?>>Mais recentes</option>
				<option value="id ASC" <? if ($_POST['ordena']=="id ASC"){ echo "selected";} ?>>Mais antigos</option>
				<option value="team_price ASC" <? if ($_POST['ordena']=="team_price ASC"){ echo "selected";} ?>>Menor Preço</option>
				<option value="team_price DESC" <? if ($_POST['ordena']=="team_price DESC"){ echo "selected";} ?>>Maior Preço</option>
				<option value="visualizado DESC" <? if ($_POST['ordena']=="visualizado DESC"){ echo "selected";} ?>>Mais Visualizados</option> 												
			</select></div>
			
	</div>
</div>
<?
if($count==0){?>

	<? if(empty($cppesquisa )){?>
		<div style="font-size: 13px; margin-left: 18px; color:#303030;">Não encontramos anúncios para esta pesquisa. </div>
	<? } else {?>
		<div style="font-size: 13px; margin-left: 18px; color:#303030;">A pesquisa pela palavra "<b><?=$cppesquisa?></b>" não retornou nenhum anúncio. </div>
	<? } ?>
<?}
else{?>
	<div style="font-size: 13px; margin-left: 18px; color:#303030;"><?php echo $pagestring; ?>  </div>
	<?				
	foreach ($teams as $team) {
		
			$BlocosOfertas->getDados($team); 
			 $categoria  = Table::Fetch('category',$team['group_id']);
	?>
		<div class="three_up_op" style="<?=$stylethree_up_op ?>">
			<div class="deal clearfix"> 
			  <div class="image">
				<div class="inner">
				<? if(!$BlocosOfertas->oferta_cancelada and !$BlocosOfertas->oferta_esgotada){?> 
					<a title="<?=$BlocosOfertas->tituloferta?>" href="<?php echo $BlocosOfertas->linkoferta ?>"><img src="<?=getImagem($team,$nmimagem)?>" title="<?=$BlocosOfertas->tituloferta?>" alt="<?=$BlocosOfertas->tituloferta?>"></a>
				<? } else {?> 
					<div style="cursor:not-allowed;"> <img src="<?=getImagem($team,$nmimagem)?>" title="<?=$BlocosOfertas->tituloferta?>" alt="<?=$BlocosOfertas->tituloferta?>"> </div>
				<?}?>
				</div>
			  </div>
			  <div class="info" style="vertical-align:none;height:165px;">
				<div class="title" style="<?=$styletitle ?>">
				  <div class="price-tag"></div>
				  <?php echo $BlocosOfertas->tituloferta;?>. <? if(!$_REQUEST['idcategoria']){?><br><br><div style="font-size: 12px; float: right;">Veja mais em  <a title="<?=utf8_decode($l['name'])?>" href="<?=$ROOTPATH?>/index.php?idcategoria=<?=$categoria['id']?>"> <?=utf8_decode($categoria['name'])?></a></div> <? } ?>
				</div>
				<? if($BlocosOfertas->mostrarpreco=="1"){?>
				<div class="subtitle" style="<?=$stylesubtitle ?>"> 
					 <b style="color:black;font-size:19px;">R$ <?=$BlocosOfertas->preco?> </b>
					  
				</div>
				<? } ?>
				<? 
				if( $BlocosOfertas->oferta_esgotada ){?> 
					<div class="view-deal-button">
					  <div class="button encerrado" style="cursor:not-allowed;">Esgotada</div>
					</div>
				<? }
				else if(!$BlocosOfertas->oferta_cancelada){?>
					<div class="view-deal-button" style="margin-top: 11px;">
					  <a title="<?=$BlocosOfertas->tituloferta?>" class="button small" href="<?php echo $BlocosOfertas->linkoferta  ?>">Detalhes</a>
					</div>
				<? }
				else{?>  
					 <div class="view-deal-button">
					  <div class="button encerrado">Encerrada</div>
					</div>
				<? } ?>
			  </div>
			</div>
		</div> 
		
		<script>atualiza_pageview('<?=$team['id']?>');</script>
		
	 <? } ?> 
	  <div style="font-size: 13px; margin-left: 18px; color:#303030;"><?php echo $pagestring; ?> </div>
<? } ?>

<form method="POST" id="formpesquisa3" name="formpesquisa3">
	<input type="hidden" name="cppesquisagrava" id="cppesquisagrava" value="<?=$cppesquisa?>">
 
</form>
								
	