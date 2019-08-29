<?php include template("manage_header");?>
<?php require("ini.php");?> 

<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				 <form id="login-user-form" method="post" action="/vipmin/category/editbairros.php?id=<?php echo $category['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Bairro <?php echo $category['nome']; ?></h4></div>
							<div class="the-button">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
									<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
									<div id="spinner-text">Salvar</div>
								</button>
							</div> 
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents"> 
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts"> 	
								
									<div id="c_categoria">
										<div class="report-head">Estado: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="uf" id="uf" onchange="$('#select_uf').text($('#uf').find('option').filter(':selected').text());verifica_tipo(this.value)"> 
												<option value=""></option>
												<?php
													$tmp_estado = '';
													$sql = "SELECT DISTINCT uf FROM cidades ORDER BY uf ASC";
													$cidades = mysql_query($sql);
													while ($c = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
														if ($category['uf'] == $c['uf']) {
															$tmp_estado = $c['uf'];
															echo "<option value='{$c['uf']}' selected>{$c['uf']}</option>";
														} else {
															echo "<option value='{$c['uf']}'>{$c['uf']}</option>";
														}
													}
												?>
											</select>
											<script>
											URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
											jQuery(function() {
												jQuery('#uf').bind('change', function(ev) {
													jQuery.ajax({
														url: URL,
														type: 'POST',
														data: { filtro: 'cidades', estado: jQuery('#uf').val() },
														beforeSend: function() {
															jQuery('#select_cidade').html('Carregando...');
															jQuery('#cidade').html('<option>Carregando...</option>');
														},
														success: function(r) {
															jQuery('#select_cidade').html('Selecione uma cidade');
															jQuery('#cidade').html(r);
														}
													});
												});
											});
											</script>
											<div name="select_uf" id="select_uf" class="cjt-wrapped-select-skin"><?php if ($tmp_estado != '') echo $tmp_estado; else echo "Informe o estado"; ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> 
										</div> 
									</div>
								
									<div id="c_categoria">
										<div class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="cidade" id="cidade" onchange="$('#select_cidade').text($('#cidade').find('option').filter(':selected').text());"> 
												<option value=""></option>
												<?php
												if ($tmp_estado != '') {
													$sql = "SELECT * FROM `cidades`";
													$cidades = mysql_query($sql);
													while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
														if ($row['id'] == $category['cidade']) {
															$tmp_cidade = $row['nome'];
															echo "<option value='{$row['id']}' selected>Código '".$row['id']." - ".$row['nome']."</option>";
														} else {
															echo "<option value='{$row['id']}'>ID ".$row['id']." - ".$row['nome']."</option>";
														}
													}
												}
												?>
											</select>
											<div name="select_cidade" id="select_cidade" class="cjt-wrapped-select-skin"><?php if ($tmp_estado != '') echo $tmp_cidade; ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> 
										</div> 
									</div>
									
									<div style="clear:both;"class="report-head">Bairro: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" name="nome"  maxlength="152" id="nome" class="format_input" value="<?php echo $category['nome'] ?>" /> 
									</div>
									
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends"> 	 			 
							 	</div>
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div> 
            </div> 
        </div>
	</div> 
</div>
</div> 
<script>
 
function validador(){
 
	limpacampos(); 

	if( jQuery("#name").val()==""){

		campoobg("name");
		alert("Por favor, informe o nome da <?php echo $tipo; ?>");
		jQuery("#name").focus();
		return false;
	} 
	return true;	
}
 

 if( jQuery("#id").val() ==""){
 
}
else{ 
 
	$('#select_idpai').text($('#idpai').find('option').filter(':selected').text());
}


</script>   