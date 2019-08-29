<div style="display:none;height:36px;" class="tips"><?=__FILE__?></div> 
<style>
.txtpartner{
	color: #243737;
	font-family: arial;
	font-size: 14px;
	line-height: 21px;
	background:#f4f4f4;
	height:245px;
}
</style>
<?php

$sql = "ALTER TABLE  `team` ADD  `desativado` varchar(1) NULL  ";
$rs = @mysql_query($sql);  
  
$idparceiro = $_REQUEST['idparceiro'] ;

$BlocosOfertas = new BlocosOfertas();

if (!$city) $city = get_city();
if (!$city) $city = array_shift($hotcities); 

$order = " order by `sort_order` DESC, `id` DESC ";
if( $INI['option']['rand_popular'] == "Y"){
	$order =  "order by rand()";
}
if(!empty($_REQUEST['ordena'])){
	$order =  "order by ".$_REQUEST['ordena'];
}
 
$nmimagem = "popular"; 
$stylethree_up_op 	=  "width:99%";
$styletitle			=  "font-size:14px";
$stylesubtitle	 	=  "font-size:12px";
$styletimer_op	 	=  "right:19px";
$nmimagem 			= "popular";
  
$contador = 0;
   
$idcategoria = trim($_REQUEST['idcategoria']);
 
if(!empty($_REQUEST['cppesquisa'])){
	 $cppesquisa = trim($_REQUEST['cppesquisa']);
}
else if(!empty($_REQUEST['cppesquisagrava'])){
	 $cppesquisa = trim($_REQUEST['cppesquisagrava']);
} 

if($cppesquisa =="O que está procurando ?"){
	unset($cppesquisa);
}

$condition = array();

if(!empty($cppesquisa )){
	$procura = retira_acentos($cppesquisa);
	$condition = array(  
		"begin_time < '".time()."'",
		"end_time > '".time()."'",
		"title like '%".$procura."%' or summary like '%".$procura."%'",
		"status is null or status = 1",
		"desativado is null or desativado !='s'",
		"pago = 'sim' or anunciogratis = 's'",
		
	);
} 
else if (!empty($_REQUEST['filtros']) or ( !empty($_REQUEST['uf']) and $_REQUEST['uf'] !="TODOS")) {
	//CONDITION DOS FILTROS
	$vez = 'imob_estado';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'city_id';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'imob_bairro';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'imob_quartos';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'imob_vagas';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'imob_finalidade';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
	$vez = 'imob_tipo';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "{$vez} = '{$_REQUEST[$vez]}'";
		
	//PRECOS
	$vez = 'preco_inicial';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "team_price >= '{$_REQUEST[$vez]}'";
		
	$vez = 'preco_final';
	if (isset($_REQUEST[$vez]) && $_REQUEST[$vez] != '')
		$condition[] = "team_price <= '{$_REQUEST[$vez]}'";
    
    //FIM DOS FILTROS
    
	//CODIGO DA CIDADE
	$condition[] = "status is null or status = 1";
	$condition[] = "pago = 'sim' or anunciogratis = 's'";
	$condition[] = "begin_time < '".time()."'";
	$condition[] = "end_time > '".time()."'";
}
else {  
	$condition = array(  
		"begin_time < '".time()."'",
		"end_time > '".time()."'",
		"status is null or status = 1",
		"desativado is null or desativado !='s'",
		"pago = 'sim' or anunciogratis = 's'",
	);
	
	if($idcategoria){
		$condition[] = "group_id = $idcategoria";
		unset($idcategoria);
	}
	if($idparceiro){
			$condition[] = "partner_id = $idparceiro";
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
if($navegador == "other" ||  $navegador == "ie"){
		$stordenacao = "cpordenacaoie";
}
 if(!empty($idparceiro)){
	$displayn = "display:none;";
 }
 
 ?>
 <div class="blocoCarro" style="clear:both; <?=$displayn?>">
	<form method="GET" action="<?=$ROOTPATH?>/index.php?busca=true" name="formularioCarro" id="formularioCarro">
	 <input type="hidden" name="filtros" value="true">
	 
	<? if(!file_exists(WWW_MOD."/tipo.inc")){?>
		 <label class="radioCarro">
			<input class="inoutfiltros" type="radio" name="imob_tipo" value="0" <?php if((isset($_REQUEST['imob_tipo']) && $_REQUEST['imob_tipo'] == '0') || !isset($_REQUEST['imob_tipo']) || $_REQUEST['imob_tipo'] == '') echo "checked='checked'"; ?>> Residencial
		 </label>
		 <label class="radioCarro">
			<input class="inoutfiltros" type="radio" name="imob_tipo" value="1" <?php if(isset($_REQUEST['imob_tipo']) && $_REQUEST['imob_tipo'] == '1') echo "checked='checked'"; ?>> Comercial
		 </label>
		 <label class="radioCarro">
			<input class="inoutfiltros" type="radio" name="imob_tipo" value="2" <?php if(isset($_REQUEST['imob_tipo']) && $_REQUEST['imob_tipo'] == '2') echo "checked='checked'"; ?>> Industrial
		 </label>
		 <label class="radioCarro">
			<input class="inoutfiltros" type="radio" name="imob_tipo" value="3" <?php if(isset($_REQUEST['imob_tipo']) && $_REQUEST['imob_tipo'] == '3') echo "checked='checked'"; ?>> Rural
		 </label>
	 <? } ?>
	 <div class="clear"></div>
     
     <label class="radioim">
    	<input class="inoutfiltros" type="radio" name="imob_finalidade" value="0" <?php if((isset($_REQUEST['imob_finalidade']) && $_REQUEST['imob_finalidade'] == '0') || !isset($_REQUEST['imob_finalidade']) || $_REQUEST['imob_finalidade'] == '') echo "checked='checked'"; ?>> Venda
	 </label>
	 <label class="radioim">
		<input class="inoutfiltros" type="radio" name="imob_finalidade" value="1" <?php if(isset($_REQUEST['imob_finalidade']) && $_REQUEST['imob_finalidade'] == '1') echo "checked='checked'"; ?>> Aluguel
	 </label>
	 <label class="radioim">
    	<input class="inoutfiltros" type="radio" name="imob_finalidade" value="2" <?php if(isset($_REQUEST['imob_finalidade']) && $_REQUEST['imob_finalidade'] == '2') echo "checked='checked'"; ?>> Temporada
	 </label>
	 
	 <div class="clear"></div>
     	
	
	<? if(file_exists(WWW_MOD."/tipo.inc")){?>
		
	   <label for="imob_tipoimoveis" class="select_filtro">
		Tipo:
		<select name="imob_tipo" id="imob_tipo" class="ui-select"> 
		<?php 
            $tipoimoveis = mysql_query("SELECT * FROM `tipoimoveis` order by nome");
            while($row = mysql_fetch_array($tipoimoveis, MYSQL_ASSOC)) {
				if($row['nome']==""){ 
					  echo "<option value='' selected></option>";
				}
				else{
					if ($_REQUEST['imob_tipo'] == $row['id']) {
						echo "<option value='{$row['id']}' selected>".utf8_decode($row['nome'])."</option>";

					} else {
						echo "<option value='{$row['id']}'>".utf8_decode($row['nome'])."</option>";
					}
                }
            }
		 
		?>
		</select>		
	 </label>
	<? } ?>
     
	 <label for="imob_estado" class="select_filtro">
		Estado
		<select name="uf" id="select_uf" class="ui-select">
		<option value="">Todos os Estados</option>
		<?php
			$estados = mysql_query('SELECT * FROM `estados`') or die(mysql_error());
            while ($row = mysql_fetch_array($estados,  MYSQL_ASSOC)) {
                if (isset($_REQUEST['uf']) && $_REQUEST['uf'] == $row['uf']) {
                    echo "<option value='{$row['uf']}' selected>".utf8_decode($row['nome'])."</option>";
                } else { 
                    echo "<option value='{$row['uf']}'>".utf8_decode($row['nome'])."</option>";
                }
            }
		?>
		</select>		
	 </label>
  
     <script>
        urlFiltro = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
        jQuery(function() {
            jQuery('#select_uf').bind('change', function(ev) {
                jQuery.ajax({
                   type: 'POST',
                   url: urlFiltro,
                   data: { filtro: 'cidades', estado: jQuery('#select_uf').val() },
                   beforeSend: function() {
						jQuery('#select_city_id').html('<option>Carregando...</option>');
						jQuery('#select_imob_bairro').html('<option></option>');
					},
                    success: function(r) {
						jQuery('#select_city_id').html(r);
					}
                });
                
            });
        });
     </script> 
	 
	 <label for="city_id" class="select_filtro">
		Cidade
		<select name="city_id" id="select_city_id" class="ui-select">
		<option></option>
	    <?php
        if (isset($_REQUEST['imob_estado']) && $_REQUEST['imob_estado'] != '') {
            $cidades = mysql_query("SELECT * FROM cidades WHERE uf =  '{$_REQUEST['imob_estado']}'");
            while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
                if ($_REQUEST['city_id'] == $row['id']) {
                    echo "<option value='{$row['id']}' selected>{$row['nome']}</option>";
                } else {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            }
        }
        ?>
		</select>		
	 </label>
     
    <script>
    		URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
    		jQuery(function() {
    			jQuery('#select_city_id').bind('change', function(ev) {
    				jQuery.ajax({
    					url: URL,
    					type: 'POST',
    					data: { filtro: 'bairros', cidade: jQuery('#select_city_id').val() },
    					beforeSend: function() {
    						jQuery('#select_imob_bairro').html('<option>Carregando...</option>');
    					},
    					success: function(r) {
    						jQuery('#select_imob_bairro').html(r);
    					}
    				});
    			});
    		});
    </script>
     
	 <label for="imob_bairro" class="select_filtro">
		Bairro:
		<select name="imob_bairro" id="select_imob_bairro" class="ui-select">
		<option value=""></option>
		<?php
		if (isset($_REQUEST['city_id']) && $_REQUEST['city_id'] != '') {
            $bairros = mysql_query("SELECT * FROM `bairros` WHERE cidade = '{$_REQUEST['city_id']}' order by nome");
            while($row = mysql_fetch_array($bairros, MYSQL_ASSOC)) {
                if ($_REQUEST['imob_bairro'] == $row['id']) {
                    echo "<option value='{$row['id']}' selected>".utf8_decode($row['nome'])."</option>";
                } else {
                    echo "<option value='{$row['id']}'>".utf8_decode($row['nome'])."</option>";
                }
            }
		}
		?>
		</select>		
	 </label>
	  
	 <label for="imob_quartos" class="select_filtro">
		Quartos:
		<select name="imob_quartos" id="select_imob_quartos" class="ui-select">
		<option value=""></option>
		<?php
		for($i=1; $i<=10; $i++) {
			if ($i == $_REQUEST['imob_quartos']) {
				$tmp_vagas = $i;
				echo "<option value='{$i}' selected>{$i}</option>";
			} else {
				echo "<option value='{$i}'>{$i}</option>";
			}
		}
		?>
		</select>		
	 </label>
	 
	 
	 <label for="imob_vagas" class="select_filtro">
		Vagas Garagem:
		<select name="imob_vagas" id="select_imob_vagas" class="ui-select">
		<option value=""></option>
		<?php
		for($i=1; $i<=10; $i++) {
			if ($i == $_REQUEST['imob_vagas']) {
				$tmp_vagas = $i;
				echo "<option value='{$i}' selected>{$i}</option>";
			} else {
				echo "<option value='{$i}'>{$i}</option>";
			}
		}
		?>
		</select>		
	 </label> 
     
	 <div style="float:left;">
		 <label for="preco_inicial" class="select_filtro">
			<?php echo utf8_decode("PreÃ§o Inicial:"); ?>
			<select name="preco_inicial" id="select_preco_inicial" class="ui-select">
			<option value=""></option>
			<?php
				for ($i=1000;$i<=30000;$i=$i+1000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_inicial']) && $_REQUEST['preco_inicial'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=40000;$i<=100000;$i=$i+10000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_inicial']) && $_REQUEST['preco_inicial'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=150000;$i<=1000000;$i=$i+100000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_inicial']) && $_REQUEST['preco_inicial'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=1000000;$i<=10000000;$i=$i+1000000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_inicial']) && $_REQUEST['preco_inicial'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
			?>
			</select>		
		 </label>
		 <label for="preco_final" class="select_filtro">
			<?php echo utf8_decode("PreÃ§o Final:")?>
			<select name="preco_final" id="select_preco_final" class="ui-select">
			<option value=""></option>
			<?php
				for ($i=1000;$i<=30000;$i=$i+1000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_final']) && $_REQUEST['preco_final'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=40000;$i<=100000;$i=$i+10000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_final']) && $_REQUEST['preco_final'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=150000;$i<=1000000;$i=$i+100000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_final']) && $_REQUEST['preco_final'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
				for ($i=1000000;$i<=10000000;$i=$i+1000000) {
					$valor = number_format($i, 2);
					$valorl = str_replace(',','#',$valor);
					$valorl = str_replace('.',',',$valorl);
					$valorl = str_replace('#','.',$valorl);
					$sem = str_replace(',','',$valor);
					if (isset($_REQUEST['preco_final']) && $_REQUEST['preco_final'] == $sem)
						echo "<option value='{$sem}' selected='selected'>{$valorl}</option>";
					else
						echo "<option value='{$sem}'>{$valorl}</option>";
				}
			?>
			</select>		
		 </label> 
	 </div>
	 <div class="btfilt" style="width: 180px;">
		<div class="busca" style="width:180px;">
			<input type="submit" value="BUSCAR" id="submit" name="submit" class="button" style="width: 125px; height: 39px; font-size: 19px;">
		</div>
	</div>
	
	</form>
 </div>
<?php
	 
if ($_REQUEST['car_fabricante'] or $_REQUEST['car_modelo'] or $_REQUEST['car_ano_ate'] or $_REQUEST['car_ano_de'] or $_REQUEST['team_price_final'] or $_REQUEST['team_price_inicio']) {
 
?>

<div class="secaotitulo popular" style="clear:both;">
	<div style="font-size: 15px;color:#fff; float:left; width: 100%;"></div>
</div>
<div class='clear'></div>

<?php
} 

if(empty($idparceiro)){
	if(!isset($_REQUEST['busca'])){
		require_once(DIR_BLOCO."/bloco_anuncios_destaques.php"); 
		require_once(DIR_BLOCO."/bloco_noticias_destaques.php"); 
	}
}
 
if($count==0){
	if(empty($idparceiro)){ ?>

	<? if(empty($cppesquisa)){?>
		<div style="font-size: 13px; margin-left: 18px; color:#303030;">Não encontramos imóveis para esta pesquisa. </div>
	<? } else {?>
		<div style="font-size: 13px; margin-left: 18px; color:#303030;">A pesquisa pela palavra "<b><?=$cppesquisa?></b>" não retornou nenhum imóvel. </div>
	<? } 
	}
 }
else{ 
	require(DIR_BLOCO."/bloco_banners_meio.php"); 
	if(!empty($idparceiro)){ 
	
		$partner  = Table::Fetch('partner',$idparceiro );
		
		$total = Table::Count('team', array(
			'partner_id' => $idparceiro,
		));
	 
		if($partner['image1']!=""){?>
			<div style="float:left;margin-right:10px;padding-left:17px;"> <img style="max-width: 300px;"src='<?php echo $ROOTPATH."/media/".$partner['image1'];?>'> </div> 
			<div class="txtpartner"> 
			<div style="font-size: 29px; padding: 15px;"><?=utf8_decode($partner['title'])?></div>
			<p><span style="color:#000;"><B>Endereço:</B></span> <?=utf8_decode($partner['address'])?> </p>
			<p><span style="color:#000;"><B>Bairro:</B></span> <?=utf8_decode($partner['bairro'])?></p>
			<p><span style="color:#000;"><B>Cidade:</B></span><?=utf8_decode($partner['cidade'])?></p>
			<p><span style="color:#000;"><B>Telefone:</B></span> <?=$partner['mobile']?></p>
			
			<div style="margin-top: 55px;">
			<? if($partner['homepage'] != ""){?> <p><span style="color:#000;"><B>Site:</B></span> <a style="text-decoration:none;color:#6395d4;" target="_blank" href="<?=$partner['homepage']?>"><?=$partner['homepage']?></a> </p><? } ?>
			 <p><span style="color:#000;"><B>Veículos em nosso estoque:</B></span> <?=$total?></p></div>
			</div>
		<? } ?>
	
	<? } ?> 
	<div class="secaotitulo popular" style="clear:both;margin-top:11px;">
			  <div style="font-size: 15px;color:#fff; float:left; width: 100%;"><div style="float:left">Refine a busca do seu veículo pelos filtros acima</div>

			<div class="<?=$stordenacao?>"><select onchange="ordenarBusca(this.value);" id="ordenacao" name="ordenacao">
				<option value="">Ordenação</option>
				<option value="sort_order DESC, id DESC" <? if ($_REQUEST['ordena']=="sort_order DESC, id DESC"){ echo "selected";} ?>>Padrão</option>
				<option value="id DESC" <? if ($_REQUEST['ordena']=="id DESC"){ echo "selected";} ?>>Mais recentes</option>
				<option value="id ASC" <? if ($_REQUEST['ordena']=="id ASC"){ echo "selected";} ?>>Mais antigos</option>
				<option value="team_price ASC" <? if ($_REQUEST['ordena']=="team_price ASC"){ echo "selected";} ?>>Menor Preço</option>
				<option value="team_price DESC" <? if ($_REQUEST['ordena']=="team_price DESC"){ echo "selected";} ?>>Maior Preço</option>
				<option value="clicados DESC" <? if ($_REQUEST['ordena']=="visualizados DESC"){ echo "selected";} ?>>Mais Visualizados</option> 												
			</select></div> 

		</div>
	</div> 

	<div class="bcpagina"><?php echo $pagestring; ?>  </div>
	<br style="clear:both;">
	<?				
	foreach ($teams as $team) {
		
			$BlocosOfertas->getDados($team); 
			$categoria  = Table::Fetch('category',$team['group_id']);
			$titulo = utf8_decode(buscaTituloAnuncio($team)); 
			$partner = Table::Fetch('partner', $team['partner_id']);
			require(DIR_BLOCO."/bloco_anuncios_home_vert.php"); 
		?>		
		
		<script>atualiza_pageview('<?=$team['id']?>');</script>
		
	 <? } ?> 
	  <br style="clear:both;">
	 <div class="bcpagina"><?php echo $pagestring; ?>  </div>
<? } ?>

<form method="POST" id="formparceiro" name="formparceiro"></form>

<form method="GET" id="formpesquisa3" name="formpesquisa3">
	<input type="hidden" name="cppesquisagrava" id="cppesquisagrava" value="<?=$cppesquisa?>">
	<input type="hidden" name="idparceiro" id="idparceiro" value="<?=$idparceiro?>"> 
	 
	<?php
	
	if (isset($_REQUEST['filtros'])) {
		//echo "<input type='hidden' name='filtros' value='true' />".PHP_EOL;
		//if (isset($_POST['tipo']))
		//	if ($_POST['tipo'] != '') 
			//	echo "<input type='hidden' name='tipo' value='{$_POST['tipo']}' />".PHP_EOL;
	//}
	
		foreach($_REQUEST as $key=>$value)
		{ 
		if($key=="submit"){
			continue;
		}
		  echo "<input type='hidden' name='$key' value='$value' />";
		}
	}
	?>
</form>
								
	