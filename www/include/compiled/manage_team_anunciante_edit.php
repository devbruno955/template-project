<?php include template("manage_anunciante_header"); ?>
<?php require("ini.php");
 $idparceiro = $_SESSION['partner_id'];
?>
<!-- 
 
-->
<style>
	.cjt-wrapped-select,
	.option_contents INPUT[type="text"]	{
		width: 100%;
	}
	#type-select-cjt-wrapped-select .cjt-wrapped-select-skin,
	#type-select-cjt-wrapped-select select {
		height: 34px;
	}
	.report-head {
		margin-top: 10px;
		font-size: 13px;
	}
	.label {
		color: #586061 !important;
		padding: 0 !important;
		margin: 0 !important;
		font-size: 13px !important;
		font-weight: bold !important;
	}
	#run-button {
		height: 35px;
		overflow: visible;
		margin-bottom: 15px;
		font-weight: bold;
		text-transform: uppercase;
	}
	#type-select-cjt-wrapped-select .cjt-wrapped-select-skin, 
	#type-select-cjt-wrapped-select select {
		border-radius: 4px;
	}
</style>
<div id="leader" class="container-fluid">
	<div id="content" class="clear mainwide row">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="/adminanunciante/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="the-button col-md-12 col-xs-12 col-sm-12">  
							<input type="hidden" value="<?=$team['pago']?>" readonly="readonly" id="pago" name="pago">
							<input type="hidden" name="partner_id" id="partner_id" value="<?=$idparceiro?>" >  
							<input type="hidden" name="mostrarseguranca" id="mostrarseguranca" value="1" >   
							<button onclick="doupdate();" id="run-button" class="btn btn-success" type="button">
								<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;">
									<img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;">
								</div>
								Salvar 
							</button>
							<button  onclick="javascript:location.href='index.php'"  id="run-button" class="btn btn-primary" type="button">
								<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;">
									<img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;">
								</div>
								Listar meus Anúncios 
							</button>
						</div> 
					</div>  
				</div>
				<div class="option_box">
					<div class="top-heading group">
						<div class="col-md-6 col-xs-12 col-sm-12" style="padding-top: 6px; padding-left: 0px;">
							<h4>
								<center> <h4>FORMULÁRIO DE ANÚNCIO   </h4> <h4>(Ao terminar clique em SALVAR)</h4>   </center>  <!-- =============================(Anúncio <?=$team['id']?>) =====================================-->
							</h4>



<h4>1. Informações Básicas</h4>


						</div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts col-md-6 col-xs-12 col-sm-12">
									<div id="c_categoria">
									<div class="report-head">Código de Referência <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Você pode criar um Código de Referência para este Imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input class="form-control ckeditor" type="text" class="form-control ckeditor"   id="imob_codigo" name="imob_codigo" value="<?php echo $team['imob_codigo']; ?>"> 
									</div>										
									<!--<div style="clear:both;"class="report-head">CEP: &nbsp;<img class="tTip" title="Informe o CEP onde está localizado o imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input class="form-control ckeditor" onblur="getEndereco();" type="text" class="form-control ckeditor"   maxlength="8" onKeyPress="return SomenteNumero(event);"  id="imob_cep"  name="imob_cep" value="<?php echo $team['imob_cep'] ? $team['imob_cep'] : ""; ?>"> 
									</div>-->
									<div class="report-head">Estado <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select name="imob_estado" id="imob_estado" onchange="$('#select_imob_estado').text($('#imob_estado').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												$sql = "SELECT DISTINCT uf FROM estados";
												$estados = mysql_query($sql) or die(mysql_error());
												while ($row = mysql_fetch_array($estados, MYSQL_ASSOC)) {
													if ($team['imob_estado'] == $row['uf']) {
														$tmp_estado = $row['uf'];
														echo "<option value='{$row['uf']}' selected>{$row['uf']}</option>";
													} else {
														echo "<option value='{$row['uf']}'>{$row['uf']}</option>";		
													}
												}
											?>
										</select> 
										<script>
											URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
											jQuery(function() {
												jQuery('#imob_estado').bind('change', function(ev) {
													jQuery.ajax({
														url: URL,
														type: 'POST',
														data: { filtro: 'cidadesAdmin', estado: jQuery('#imob_estado').val() },
														beforeSend: function() {
															jQuery('#select_city_id').html('Carregando...');
															jQuery('#city_id').html('<option>Carregando...</option>');
														},
														success: function(r) {
															jQuery('#select_city_id').html('Selecione uma cidade');
															jQuery('#city_id').html(r);
														}
													});
												});
											});
										</script>
										<div name="select_imob_estado" id="select_imob_estado" class="cjt-wrapped-select-skin"><?php if (isset($tmp_estado)) echo $tmp_estado; else echo "Selecione um estado"; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									<div class="report-head">Cidade</div>
									<div class="group">
										
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="city_id" id="city_id" onchange="$('#select_city_id').text($('#city_id').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												if ($team['imob_estado'] != '') {
													$SQL = "SELECT * FROM cidades WHERE uf = '{$team['imob_estado']}'";
													$cidades = mysql_query($SQL) or die(mysql_error());
													while ($row = mysql_fetch_array($cidades, MYSQL_ASSOC)) {
														if ($team['city_id'] == $row['id']) {
															$tmp_cidade = $row['nome'];
															echo "<option value='{$row['id']}' selected>{$row['nome']}</option>";
														} else {
															echo "<option value='{$row['id']}'>{$row['nome']}</option>";
														}
													}
												}
											?>
										</select>
										<script>
											URL = "<?php echo $ROOTPATH; ?>/ajax/filtro_pesquisa.php";
											jQuery(function() {
												jQuery('#city_id').bind('change', function(ev) {
													jQuery.ajax({
														url: URL,
														type: 'POST',
														data: { filtro: 'bairros', cidade: jQuery('#city_id').val() },
														beforeSend: function() {
															jQuery('#imob_bairro_id').html('Carregando...');
															jQuery('#imob_bairro').html('<option>Carregando...</option>');
														},
														success: function(r) {
															jQuery('#imob_bairro_id').html('Selecione um bairro');
															jQuery('#imob_bairro').html(r);
														}
													});
												});
											});
										</script>
										<div name="select_city_id" id="select_city_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_cidade)) echo $tmp_cidade; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
										
										<!--<input type="text" class="form-control ckeditor"   id="city_id_input"  name="city_id" value="<?php echo $team['city_id'] ? $team['city_id'] : ""; ?>"> -->
									</div> 
									<div style="clear:both;"class="report-head">Bairro </div>
									<div class="group">
										
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="imob_bairro" id="imob_bairro" onchange="$('#imob_bairro_id').text($('#imob_bairro').find('option').filter(':selected').text())"> 
											<option value="">Escolha um bairro</option>
											<?php
												if ($team['city_id'] != '') {
													 $sql = "SELECT * FROM bairros WHERE cidade = '{$team['city_id']}'";
													 $bairros = mysql_query($sql) or die(mysql_error());
													 while ($row = mysql_fetch_array($bairros, MYSQL_ASSOC)) {
													 	if ($team['imob_bairro'] == $row['id']) {
													 		$tmp_bairro = $row['nome'];
													 		echo "<option value='{$row['id']}' selected>{$row['nome']}</option>";
													 	} else {
													 		echo "<option value='{$row['id']}'>{$row['nome']}</option>";
													 	}
													 }
												}
											?>
										</select> 
										<div name="imob_bairro_id" id="imob_bairro_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_bairro)) echo $tmp_bairro; else echo ""; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
										
										<!--<input type="text" class="form-control ckeditor"   id="imob_bairro"  name="imob_bairro" value="<?php echo $team['imob_bairro'] ? $team['imob_bairro'] : ""; ?>">--> 
									</div>
									<div style="clear:both;"class="report-head">Logradouro </div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_rua"  name="imob_rua" value="<?php echo $team['imob_rua'] ? $team['imob_rua'] : ""; ?>"> 
									</div>
									<div style="clear:both;"class="report-head">Número</div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_numero" onKeyPress="return SomenteNumero(event);"  name="imob_numero" value="<?php echo $team['imob_numero'] ? $team['imob_numero'] : ""; ?>"> 
									</div>									
									<div id="c_categoria">
										<div class="report-head">Finalidade </div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="imob_finalidade" id="imob_finalidade" onchange="$('#select_imob_finalidade').text($('#imob_finalidade').find('option').filter(':selected').text())"> 
												<option value=""></option>
												<option value='0' <?php if ($team['imob_finalidade'] == '0') { echo "selected"; $tmp_finalidade = 'Venda';}?>>Venda</option>
												<option value='1' <?php if ($team['imob_finalidade'] == '1') { echo "selected"; $tmp_finalidade = 'Aluguel';}?>>Aluguel</option>
											
												<option value='3' <?php if ($team['imob_finalidade'] == '3') { echo "selected"; $tmp_finalidade = 'Lançamentos';}?>>Lançamentos</option>
											</select>
											<div name="select_imob_finalidade" id="select_imob_finalidade" class="cjt-wrapped-select-skin"><?php if (isset($tmp_finalidade)) { echo $tmp_finalidade; } else { echo "Informe a finalidade"; } ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div>  
										</div> 
									</div> 
								<div class="report-head">Tipo <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
												<select  name="imob_tipo" id="imob_tipo" onchange="$('#select_imob_tipo').text($('#imob_tipo').find('option').filter(':selected').text());"> 
													<option value=""></option>
													<?php
														$sql = "SELECT * FROM tipoimoveis order by nome ASC";
														$tipoimoveis = mysql_query($sql) or die(mysql_error());
														while ($row = mysql_fetch_array($tipoimoveis, MYSQL_ASSOC)) {
															if ($team['imob_tipo'] == $row['id']) { 
																echo "<option value='{$row['id']}' selected>{$row['nome']}</option>";
																$nome=$row['nome'];
															} else {
																echo "<option value='{$row['id']}'>{$row['nome']}</option>";		
															}
														}
													?>
												</select>
												<div name="select_imob_tipo" id="select_imob_tipo" class="cjt-wrapped-select-skin"><?php if (isset($team['imob_tipo'])) echo $nome; else echo "Informe o tipo de imóvel"; ?></div>
												<div class="cjt-wrapped-select-icon"></div>
												</div> 
											</div> 
										</div>
									<style>
									.clear { clear: both; }
									.adicioneNovo {
										font-size: 11px;
										display: block;
										margin-top: 5px;
									}
									</style>
									<div class="clear"></div> 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends col-md-6 col-xs-12 col-sm-12"> 
									<div style="clear:both;"class="report-head">Quartos</div>
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="imob_quartos" id="imob_quartos" onchange="$('#imob_quartos_id').text($('#imob_quartos').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												for($i=1; $i<=10; $i++) {
													if ($i == $team['imob_quartos']) {
													$tmp_quartos = $i;
														echo "<option value='{$i}' selected>{$i}</option>";
													} else {
														echo "<option value='{$i}'>{$i}</option>";
													} 
												}
											?>
										</select> 
										<div name="imob_quartos_id" id="imob_quartos_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_quartos)) echo $tmp_quartos; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div> 
									<div style="clear:both;"class="report-head">Vagas de Garagem</div> 
									<div class="group">
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
										<select  name="imob_vagas" id="imob_vagas" onchange="$('#imob_vagas_id').text($('#imob_vagas').find('option').filter(':selected').text())"> 
											<option value=""></option>
											<?php
												for($i=1; $i<=10; $i++) {
													if ($i == $team['imob_vagas']) {
														$tmp_vagas = $i;
														echo "<option value='{$i}' selected>{$i}</option>";
													} else {
														echo "<option value='{$i}'>{$i}</option>";
													}
												} 
											?>
										</select> 
										<div name="imob_vagas_id" id="imob_vagas_id" class="cjt-wrapped-select-skin"><?php if (isset($tmp_vagas)) echo $tmp_vagas; ?></div>
										<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div>  
									<div class="report-head">Área Total (m²) <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe a área total deste Imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_area" onKeyPress="return SomenteNumero(event);"  name="imob_area" value="<?php echo $team['imob_area'] ? $team['imob_area'] : 0; ?>"> 
									</div>	
									<div class="report-head">Área Privativa (m²) <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe a área privativa deste Imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_area_p" onKeyPress="return SomenteNumero(event);"  name="imob_area_p" value="<?php echo $team['imob_area_p'] ? $team['imob_area_p'] : 0; ?>"> 
									</div>	
									<div class="report-head">IPTU <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe o valor do IPTU caso exista." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_iptu" name="imob_iptu" value="<?php echo $team['imob_iptu']; ?>"> 
									</div>	
									<div class="report-head">Condomínio <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe o valor do condomínio caso exista." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_condominio" name="imob_condominio" value="<?php echo $team['imob_condominio']; ?>"> 
									</div>	
									<div class="report-head">Suítes <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe o número de suítes caso este Imóvel possua." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_suite" name="imob_suite" value="<?php echo $team['imob_suite']; ?>"> 
									</div>									
									<div class="report-head">Banheiros <span class="cpanel-date-hint"></span>&nbsp;<img class="tTip" title="Informe o número de banheiros neste Imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"></div>
									<div class="group">
										<input type="text" class="form-control ckeditor"   id="imob_banheiro" name="imob_banheiro" value="<?php echo $team['imob_banheiro']; ?>"> 
									</div>	
								 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
                    <!-- ********************************************* CARCACTERISTICAS DO IMOVEL --> 
    			<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>2. Mais Especificações (opcional)</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts col-md-6 col-xs-12 col-sm-12">
									<div class="report-head">Singularidades <span class="cpanel-date-hint"></span></div>
									<div class="group">
<!-- ============================= <input type="checkbox" name="adicionais[]" value="AndarInteiro" <?php if(in_array("AndarInteiro", $addArray)) echo "checked"; ?>> Andar Inteiro<br/>  
									    <input type="checkbox" name="adicionais[]" value="ArCondicionado" <?php if(in_array("ArCondicionado", $addArray)) echo "checked"; ?>> Ar Condicionado<br/>
                                        <input type="checkbox" name="adicionais[]" value="ArmarioCozinha" <?php if(in_array("ArmarioCozinha", $addArray)) echo "checked"; ?>> Armário de Cozinha<br/>
                                        <input type="checkbox" name="adicionais[]" value="ArmarioEmbutido" <?php if(in_array("ArmarioEmbutido", $addArray)) echo "checked"; ?>> Armário Embutido<br/>
                                        <input type="checkbox" name="adicionais[]" value="BanheiroIndependente" <?php if(in_array("BanheiroIndependente", $addArray)) echo "checked"; ?>> Banheiro Independente<br/>
                                        <input type="checkbox" name="adicionais[]" value="Canil" <?php if(in_array("Canil", $addArray)) echo "checked"; ?>> Canil<br/>

                                        <input type="checkbox" name="adicionais[]" value="Churrasqueira" <?php if(in_array("Churrasqueira", $addArray)) echo "checked"; ?>> Churrasqueira<br/>
                                        <input type="checkbox" name="adicionais[]" value="ConexaoInternet" <?php if(in_array("ConexaoInternet", $addArray)) echo "checked"; ?>> Conexão com Internet<br/>
                                        <input type="checkbox" name="adicionais[]" value="CozinhaMontada" <?php if(in_array("CozinhaMontada", $addArray)) echo "checked"; ?>> Cozinha Planejada<br/> =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="DependenciaEmpregada" <?php if(in_array("DependenciaEmpregada", $addArray)) echo "checked"; ?>> Dependência de Empregada<br/>
                                        <!-- ============================= <input type="checkbox" name="adicionais[]" value="Despensa" <?php if(in_array("Despensa", $addArray)) echo "checked"; ?>> Despensa<br/> 
 
                                        <input type="checkbox" name="adicionais[]" value="EnergiaSolar" <?php if(in_array("EnergiaSolar", $addArray)) echo "checked"; ?>> Energia Solar<br/> =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="EspacoGourmet" <?php if(in_array("EspacoGourmet", $addArray)) echo "checked"; ?>> Espaço Gourmet<br/>
                                        <!-- =============================<input type="checkbox" name="adicionais[]" value="FrenteParaMar" <?php if(in_array("FrenteParaMar", $addArray)) echo "checked"; ?>> Frente para o Mar<br/>
                                        <input type="checkbox" name="adicionais[]" value="GaragemCoberta" <?php if(in_array("GaragemCoberta", $addArray)) echo "checked"; ?>> Garagem Coberta<br/>
                                        <input type="checkbox" name="adicionais[]" value="GaragemIndependente" <?php if(in_array("GaragemIndependente", $addArray)) echo "checked"; ?>> Garagem Independente<br/>
                                        <input type="checkbox" name="adicionais[]" value="Hidromassagem" <?php if(in_array("Hidromassagem", $addArray)) echo "checked"; ?>> Hidromassagem<br/> =====================================-->
 
                                       <!-- ============================= <input type="checkbox" name="adicionais[]" value="Hidrometro" <?php if(in_array("Hidrometro", $addArray)) echo "checked"; ?>> Hidrômetro Individual<br/>
                                        
                                        <input type="checkbox" name="adicionais[]" value="JanelaIsolamentoAcustico" <?php if(in_array("JanelaIsolamentoAcustico", $addArray)) echo "checked"; ?>> Janelas com Isolamento Acústico<br/> =====================================-->
                                        <!-- =============================<input type="checkbox" name="adicionais[]" value="Lavabo" <?php if(in_array("Lavabo", $addArray)) echo "checked"; ?>> Lavabo<br/>
                                        <input type="checkbox" name="adicionais[]" value="Lavanderia" <?php if(in_array("Lavanderia", $addArray)) echo "checked"; ?>> Lavanderia<br/> =====================================-->

<!-- ============================= <input type="checkbox" name="adicionais[]" value="IsolamentoAcustico" <?php if(in_array("IsolamentoAcustico", $addArray)) echo "checked"; ?>> Paredes com Isolamento Acústico<br/> =====================================-->

                                        <input type="checkbox" name="adicionais[]" value="Piscina" <?php if(in_array("Piscina", $addArray)) echo "checked"; ?>> Piscina<br/>
                                        
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="QuartoEmpregada" <?php if(in_array("QuartoEmpregada", $addArray)) echo "checked"; ?>> Quarto de Empregada<br/> // =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="Sauna" <?php if(in_array("Sauna", $addArray)) echo "checked"; ?>> Sacada Envidraçada<br/>
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="TVACabo" <?php if(in_array("TVACabo", $addArray)) echo "checked"; ?>> TV à Cabo<br/> // =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="Varanda" <?php if(in_array("Varanda", $addArray)) echo "checked"; ?>> Varanda<br/>
                                       <!-- =============================  <input type="checkbox" name="adicionais[]" value="VistaDefinitiva" <?php if(in_array("VistaDefinitiva", $addArray)) echo "checked"; ?>> Vista Ampla<br/>=====================================-->
                                        
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="AreaPrivativa" <?php if(in_array("AreaPrivativa", $addArray)) echo "checked"; ?>> Área Privativa<br/> // =====================================-->
                                    </div>
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends col-md-6 col-xs-12 col-sm-12"> 
									<div class="report-head">Condomínio <span class="cpanel-date-hint"></span></div>
        							<div class="group">
									   
                                        
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="AreaVerde" <?php if(in_array("AreaVerde", $addArray)) echo "checked"; ?>> Área Verde<br/> 
                                        <input type="checkbox" name="adicionais[]" value="Bicicletario" <?php if(in_array("Bicicletario", $addArray)) echo "checked"; ?>> Bicicletário<br/> =====================================-->
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="CampoFutebol" <?php if(in_array("CampoFutebol", $addArray)) echo "checked"; ?>> Campo de Futebol<br/> =====================================-->
 <!-- =============================
<input type="checkbox" name="adicionais[]" value="EstacVisitas" <?php if(in_array("EstacVisitas", $addArray)) echo "checked"; ?>> Estacionamento para Visitas<br/>
                                        <input type="checkbox" name="adicionais[]" value="Heliponto" <?php if(in_array("Heliponto", $addArray)) echo "checked"; ?>> Heliponto<br/> =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="Interfone" <?php if(in_array("Interfone", $addArray)) echo "checked"; ?>> Interfone<br/>
 <!-- =============================                                       <input type="checkbox" name="adicionais[]" value="LavanderiaColetiva" <?php if(in_array("LavanderiaColetiva", $addArray)) echo "checked"; ?>> Lavanderia Coletiva<br/>

<input type="checkbox" name="adicionais[]" value="ArCondCentral" <?php if(in_array("ArCondCentral", $addArray)) echo "checked"; ?>> Piscina Coletiva<br/>
                                        <input type="checkbox" name="adicionais[]" value="Playground" <?php if(in_array("Playground", $addArray)) echo "checked"; ?>> Playground<br/> =====================================-->


<!-- ============================= <input type="checkbox" name="adicionais[]" value="QdaPeteca" <?php if(in_array("QdaPeteca", $addArray)) echo "checked"; ?>> Quadra de Peteca<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaSquash" <?php if(in_array("QdaSquash", $addArray)) echo "checked"; ?>> Quadra de Squash<br/> 
                                        <input type="checkbox" name="adicionais[]" value="QdaTenis" <?php if(in_array("QdaTenis", $addArray)) echo "checked"; ?>> Quadra de Tênis<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaPoliesportiva" <?php if(in_array("QdaPoliesportiva", $addArray)) echo "checked"; ?>> Quadra Poliesportiva<br/> =====================================-->
                                        <!-- ============================= <input type="checkbox" name="adicionais[]" value="Restaurante" <?php if(in_array("Restaurante", $addArray)) echo "checked"; ?>> Restaurante<br/> =====================================-->
                                        
<input type="checkbox" name="adicionais[]" value="SalaoDeFesta" <?php if(in_array("SalaoDeFesta", $addArray)) echo "checked"; ?>> Salão de Festa<br/>

<input type="checkbox" name="adicionais[]" value="SaladeGinastica" <?php if(in_array("SaladeGinastica", $addArray)) echo "checked"; ?>> Sala de Ginástica<br/>
                                        
                                        <!-- ============================= <input type="checkbox" name="adicionais[]" value="SalaoDeJogos" <?php if(in_array("SalaoDeJogos", $addArray)) echo "checked"; ?>> Salão de Jogos<br/> =====================================--> 
                                    </div>
                                    
<!-- =============================
<div class="report-head">Segurança <span class="cpanel-date-hint"></span></div>
        							<div class="group">
									    <!-- ============================= // <input type="checkbox" name="adicionais[]" value="BloqueioElevador" <?php if(in_array("BloqueioElevador", $addArray)) echo "checked"; ?>> Bloqueio de Elevador<br/> // 
                                        <input type="checkbox" name="adicionais[]" value="CercaEletrica" <?php if(in_array("CercaEletrica", $addArray)) echo "checked"; ?>> Cerca Elétrica<br/> 
                                        <input type="checkbox" name="adicionais[]" value="CircuitoInternoTV" <?php if(in_array("CircuitoInternoTV", $addArray)) echo "checked"; ?>> Circuito Interno de TV<br/> =====================================-->
                                        <!-- ============================= <input type="checkbox" name="adicionais[]" value="ElevadorComSenha" <?php if(in_array("ElevadorComSenha", $addArray)) echo "checked"; ?>> Elevador com Senha<br/>
                                         // <input type="checkbox" name="adicionais[]" value="GuaritaPortaria" <?php if(in_array("GuaritaPortaria", $addArray)) echo "checked"; ?>> Guarita na Portaria<br/> // 
                                        <input type="checkbox" name="adicionais[]" value="Porteiro12Horas" <?php if(in_array("Porteiro12Horas", $addArray)) echo "checked"; ?>> Porteiro 12 Horas<br/> =====================================-->
                                        <input type="checkbox" name="adicionais[]" value="Porteiro24Horas" <?php if(in_array("Porteiro24Horas", $addArray)) echo "checked"; ?>> Porteiro <br/>
                                        <!-- ============================= // <input type="checkbox" name="adicionais[]" value="SegurancaInterna" <?php if(in_array("SegurancaInterna", $addArray)) echo "checked"; ?>> Segurança Interna<br/> // 
                                        <input type="checkbox" name="adicionais[]" value="SegurancaNaRua" <?php if(in_array("SegurancaNaRua", $addArray)) echo "checked"; ?>> Segurança na Rua<br/>                                        <input type="checkbox" name="adicionais[]" value="SegurancaPatrimonial" <?php if(in_array("SegurancaPatrimonial", $addArray)) echo "checked"; ?>> Segurança Patrimonial<br/> =====================================-->
 
                                    </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>



					</div>
				<!-- FIM INFORMAÃ‡Ã•ES DO IMOVEL -->
				<!-- ********************************************* ABA Controle de Estoque e periodo --> 
				<div class="option_box" style="display:none;">
					<div class="top-heading group">
						<div class="left_float"><h4>Controle de Período</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts col-md-6 col-xs-12 col-sm-12">
									 <div class="report-head">Data início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input  type="text" class="form-control ckeditor"    xd="<?php echo date('d/m/Y', $team['begin_time']); ?>" name="begin_time" id="begin_time" class="format_input ckeditor"  maxlength="10"  value="<?php echo date('d/m/Y', $team['begin_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].begin_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div>
									<div class="report-head">Hora início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input  type="text" class="form-control ckeditor"   id="begin_time2"  name="begin_time2"  value="<?php echo  $team['begin_time2'] ; ?>"  class="format_input ckeditor"  maxlength="10"  />
									</div> 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends col-md-6 col-xs-12 col-sm-12"> 
									<div class="report-head">Data fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input  type="text" class="form-control ckeditor"    xd="<?php echo date('d/m/Y', $team['end_time']); ?>" name="end_time" id="end_time" class="format_input ckeditor"  maxlength="10"  value="<?php echo date('d/m/Y', $team['end_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].end_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div> 
									<div class="report-head">Hora fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input  type="text" class="form-control ckeditor"   name="end_time2" id="end_time2"   value="<?php echo  $team['end_time2'] ; ?>"  class="format_input ckeditor"  maxlength="10"  />
									</div> 
								 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					<!-- ********************************************* ABA InformaçÃµes de preço e pagamento --> 
				<div class="option_box" id="abapagamento">
					<div class="top-heading group">
						<div class="left_float"><h4>3. Perfil Econômico</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts col-md-6 col-xs-12 col-sm-12">   
									<div id="c_valores">
										<div style="clear:both;"class="report-head">Preço (Inclua os pontos e a vírgula. Exemplo: 1.234.567,89) <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" class="form-control ckeditor"   name="team_price"  id="team_price" class="format_input ckeditor"   value="<?php echo moneyit3($team['team_price']) ; ?>"  />    
										</div> 	
										<div style="clear:both;margin-top:10px;"class="report-head">Aceita Financiamento? <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input style="width:20px;" type="radio" <?php if($team['imob_financiamento'] == 1) { ?> checked="checked" <?php } ?> value="1" name="imob_financiamento"> Sim      
											<input style="width:20px;" type="radio" <?php if($team['imob_financiamento'] == 0) { ?> checked="checked" <?php } ?> value="0" name="imob_financiamento"> Não
										</div> 											
									</div>
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
									<div class="ends col-md-6 col-xs-12 col-sm-12">  
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">




										   <div style="clear:both;"class="report-head"> Mostrar o Preço no Anúncio? <span class="cpanel-date-hint"></span></div>  




											<input style="width:20px;" type="radio" <?=$mostrarprecosim?> value="1" name="mostrarpreco"> Sim      
											<input style="width:20px;" type="radio" <?=$mostrarpreconao?> value="0" name="mostrarpreco"> Não
										 </div>
										<!--<div style="clear:both;margin-top:10px;"class="report-head">Aceita permuta: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input style="width:20px;" type="radio" <?php if($team['imob_permuta'] == 1) { ?> checked="checked" <?php } ?> value="1" class="input_imob_permuta" name="imob_permuta"> Sim      
											<input style="width:20px;" type="radio" <?php if($team['imob_permuta'] == 0) { ?> checked="checked" <?php } ?> value="0" class="input_imob_permuta" name="imob_permuta"> Não
										</div> 		
										<div style="clear:both;margin-top:10px;"class="report-head">Informações da permuta: &nbsp;<img class="tTip" title="Informe o que aceita como permuta, valor, porcentagem e demais informações." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"><span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" class="form-control ckeditor"   name="obs_permuta" id="obs_permuta" value="<?php echo $team['obs_permuta']; ?>">											
										</div> -->	
								   </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>	
				<div id="campostipoveiculo"></div>
				  <!-- ********************************************* ABA Fotos --> 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>4. Fotos   </h4> <h4> Formato ideal: 900 pixels (largura) por 600 pixels (altura)</h4> <h4>Redimensione todas as fotos no site: <a target="_blank" href="https://www.iloveimg.com/pt">iloveimg.com</a></h4></div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts col-md-6 col-xs-12 col-sm-12">  
									<div style="clear:both;"class="report-head">Foto 1  <span class="cpanel-date-hint"><span id="dimensao"></span>    
									</div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img0"  id="img0" class="format_input ckeditor"  value="<?php  $team['img0'] ; ?>" />  <?php if($team['img0']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img0']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'img0');" ><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>
										<?php
											if($team['img0']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img0']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 
									<div style="clear:both;"class="report-head">Foto 2 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img1"  id="img1" class="format_input ckeditor"   value="<?php  $team['img1'] ; ?>" />   <?php if($team['img1']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['img1']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'img1');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?> 
										<?php
											if($team['img1']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img1']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 
									<div style="clear:both;"class="report-head">Foto 3 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img2"  id="img2" class="format_input ckeditor"   value="<?php  $team['img2'] ; ?>" />   <?php if($team['img2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img2']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'img2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
										<?php
											if($team['img2']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img2']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 4 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img3"  id="img3" class="format_input ckeditor"   value="<?php  $team['img3'] ; ?>" />   <?php if($team['img3']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['img3']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img3');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
										<?php
											if($team['img3']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img3']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 
									<div style="clear:both;"class="report-head">Foto 5  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img4"  id="img4" class="format_input ckeditor"   value="<?php  $team['img4'] ; ?>" /> <?php if($team['img4']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img4']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img4');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
										<?php
											if($team['img4']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img4']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 6 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img5"  id="img5" class="format_input ckeditor"   value="<?php  $team['img5'] ; ?>" />   <?php if($team['img5']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img5']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img5');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img5']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img5']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 			
									<div style="clear:both;"class="report-head">Foto 7 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img6"  id="img6" class="format_input ckeditor"   value="<?php  $team['img6'] ; ?>" />   <?php if($team['img6']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img6']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img6');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img6']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img6']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 			
									<div style="clear:both;"class="report-head">Foto 8 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img7"  id="img7" class="format_input ckeditor"   value="<?php  $team['img7'] ; ?>" />   <?php if($team['img7']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img7']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img7');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img7']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img7']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 				
									<div style="clear:both;"class="report-head">Foto 9 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img8"  id="img8" class="format_input ckeditor"   value="<?php  $team['img8'] ; ?>" />   <?php if($team['img8']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img8']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img8');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img8']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img8']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 				
									<div style="clear:both;"class="report-head">Foto 10 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img9"  id="img9" class="format_input ckeditor"   value="<?php  $team['img9'] ; ?>" />   <?php if($team['img9']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img9']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img9');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img9']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img9']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends col-md-6 col-xs-12 col-sm-12"> 
									<div style="clear:both;"class="report-head">Foto 11 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img10"  id="img10" class="format_input ckeditor"   value="<?php  $team['img10'] ; ?>" />   <?php if($team['img10']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['img10']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img10');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
										<?php
											if($team['img10']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img10']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 12  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img11"  id="img11" class="format_input ckeditor"   value="<?php  $team['img11'] ; ?>" /> <?php if($team['img11']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img11']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img11');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
										<?php
											if($team['img11']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img11']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 13 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img12"  id="img12" class="format_input ckeditor"   value="<?php  $team['img12'] ; ?>" />   <?php if($team['img12']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img12']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img12');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img12']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img12']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 									
									<div style="clear:both;"class="report-head">Foto 14 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img13"  id="img13" class="format_input ckeditor"   value="<?php  $team['img13'] ; ?>" />   <?php if($team['img13']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['img13']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img13');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
										<?php
											if($team['img13']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img13']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 15  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img14"  id="img14" class="format_input ckeditor"   value="<?php  $team['img14'] ; ?>" /> <?php if($team['img14']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img14']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img14');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
										<?php
											if($team['img14']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img14']; ?>" style="max-width:100px;">
										<?php } ?>									
									</div> 
									<div style="clear:both;"class="report-head">Foto 16 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img15"  id="img15" class="format_input ckeditor"   value="<?php  $team['img15'] ; ?>" />   <?php if($team['img15']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img15']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img15');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img15']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img15']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 									
									<div style="clear:both;"class="report-head">Foto 17  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img16"  id="img16" class="format_input ckeditor"   value="<?php  $team['img16'] ; ?>" /> <?php if($team['img16']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img16']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img16');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
										<?php
											if($team['img16']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img16']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
									<div style="clear:both;"class="report-head">Foto 18 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img17"  id="img17" class="format_input ckeditor"   value="<?php  $team['img17'] ; ?>" />   <?php if($team['img17']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img17']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img17');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img17']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img17']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 									
									<div style="clear:both;"class="report-head">Foto 19 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img18"  id="img18" class="format_input ckeditor"   value="<?php  $team['img18'] ; ?>" />   <?php if($team['img18']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img18']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img18');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img18']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img18']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 									
									<div style="clear:both;"class="report-head">Foto 20 <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="img19"  id="img19" class="format_input ckeditor"   value="<?php  $team['img19'] ; ?>" />   <?php if($team['img19']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['img19']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'img19');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
										<?php
											if($team['img19']) {
										?>
										<br />
										<img src="<?php echo $ROOTPATH; ?>/media/<?php echo $team['img19']; ?>" style="max-width:100px;">
										<?php } ?>										
									</div> 
								 </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					<div class="option_box" id="abapagamento"  >
						<div class="top-heading group">
							<div class="left_float"><h4>5. Vídeo (opcional)</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group">
										<div class="starts col-md-6 col-xs-12 col-sm-12">   
										<div id="c_valores">
											<div style="clear:both;"class="report-head">Insira a URL do vídeo no YouTube (Inicia com https://youtu.be/)  <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="video1"  id="video1" class="format_input ckeditor" value="<?php echo $team['video1']; ?>" /> 
											</div>  
										
										</div> 
									</div>
										<div class="ends col-md-6 col-xs-12 col-sm-12">  
											<?php if($team['video1'] != ""){?>
													<a href="<?=$team['video1']?>" target="_blank"><?=$team['video1']?></a>
													<br>
													<iframe width="500" height="300" src="https://www.youtube.com/embed/<?php echo getVideo($team['video1']); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
												<?php } ?>
									   </div> 
									</div>
							</div> 
						</div>
					</div>						
				<!-- ********************************************* ABA Foto Auxiliar --> 
				<!--
				<div class="option_box" id="c_estaticas">
					<div class="top-heading group"> <div class="left_float"><h4>Imagem ( Não redimensiona - Opcional )</h4> </div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group"> 
								<div class="starts col-md-6 col-xs-12 col-sm-12">  
									<div style="clear:both;"class="report-head">Detalhe: <span class="cpanel-date-hint">Dimensão exata: 720px x 273px.</span>&nbsp;<img class="tTip" title="Opcionalmente, vocÃª pode fazer o upload da imagem redimensionada manualmente por vocÃª para este bloco. Note que se vocÃª fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 720px x 273px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 95%;" name="estatica_detalhe"  id="estatica_detalhe" class="format_input ckeditor"   value="<?php  $team['estatica_detalhe'] ; ?>" />   <?php if($team['estatica_detalhe']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['estatica_detalhe']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_detalhe');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>
								</div> 
								<div class="ends col-md-6 col-xs-12 col-sm-12"> 
								 </div> 
								</div> 
							</div> 
						</div>
					</div>
					-->
					 <!-- ********************************************* ABA Descrição da oferta --> 
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4> 6. Descreva o imóvel</h4> </div> &nbsp;<img class="tTip" title="O objetivo aqui é encantar o cliente em potencial. Descreva os principais benefícios e as qualidades deste Imóvel; fale sobre a sua localização (perto de escolas, mercados, transporte público, vias de acesso, etc.), documentação, etc. Leve o cliente a imaginar como será a vida após fechar negócio neste Imóvel. Ative o lado emotivo e estimule a imaginação do cliente. Seu principal foco está no cliente e não na venda. Sucesso! Equipe Imópolis.com" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="summary" style="width:100%" id="summary" class="format_input" ><?php echo htmlspecialchars($team['summary']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div>	 
					<!-- ********************************************* ABA Regulamento da oferta  
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Regulamento da Oferta</h4> </div> &nbsp;<img class="tTip" title="DICA: Se vocÃª está copiando esta descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formataçÃµes indevidas. Uma vez que isto pode danificar o seu site." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="notice" style="width:100%" id="notice" class="format_input ckeditor" ><?php echo htmlspecialchars($team['notice']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div> 	
					<!-- ********************************************* ABA Mais informaçÃµes da oferta 
					<div class="option_box"  style="display:none;" id="maisinfo">
						<div class="top-heading group"> <div class="left_float"><h4>Mais informaçÃµes no final do pedido</h4> </div>   </div> 
						 <div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="maisinformacoes" style="width:100%" id="maisinformacoes" class="format_input ckeditor" ><?php echo htmlspecialchars($team['maisinformacoes']); ?></textarea>
									</div> 
								</div> 
							</div> 
						</div>
					</div> 	
					-->
				</div> 
				<div class="option_box"> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">
							<div class="the-button col-md-12 col-xs-12 col-sm-12">
								<input type="hidden" value="" id="vea_caracter" name="vea_caracter">
								<button onclick="doupdate();" id="run-button" class="btn btn-success" type="button">
									<div id="spinner" style="width: 83px; display: block;"> <img name="imgrec2" id="imgrec2" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
									<div id="spinner-text2">Salvar</div>
								</button>
							</div> 
						</div>
					</div>
				</div> 
				</form>
                </div>
            </div> 
        </div>
	</div> 
</div>

<!-- Mensagens de alerta-->
<div id="msgestado" title="Atenção!" style="display:none">
    <p>Por favor, informe o endereço.</p>
</div>	


<!-- Mensagens de alerta-->



<script>
var www = jQuery("#www").val();
$("#end_time").mask("99/99/9999");
$("#begin_time").mask("99/99/9999");
$("#end_time2").mask("99:99");
$("#begin_time2").mask("99:99");
 $("#imob_cep").mask("99999-999");
$('#team_price').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#preco_comissao').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#bonuslimite').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#imob_condominio').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#valorfrete').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
if( jQuery("#id").val() ==""){
	// $('#posicionamento').val(4);  
}
else{ 
	$('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text());
	$('#select_city_id').text($('#city_id').find('option').filter(':selected').text());
	$('#select_group_id').text($('#group_id').find('option').filter(':selected').text());
	$('#estadoveiculo_id').text($('#estadoveiculo').find('option').filter(':selected').text());
}
 $('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text());
window.x_init_hook_teamchangetype = function(){
	X.team.changetype("{$team['team_type']}");
};
window.x_init_hook_page = function() {
	X.team.imageremovecall = function(v) {
		jQuery('#team_image_'+v).remove();
	};
	X.team.imageremove = function(id, v) {
		return !X.get(WEB_ROOT + '/ajax/misc.php?action=imageremove&id='+id+'&v='+v);
	};
};
function doupdate(){
	if(validador()){
		$("#spinner-text").css("opacity", "0.2");
		$("#spinner-text2").css("opacity", "0.2");
		jQuery("#imgrec").show()
		jQuery("#imgrec2").show()
		 var vea_caracter = '';  
		jQuery(".cinput:checked").each(function(){ 
			if(this.checked) {  
				if(this.name=="caracteristicas"){
					vea_caracter = vea_caracter  + this.value+ ','; 
				} 
			}
		}); 
		jQuery("#vea_caracter").val(vea_caracter);
		document.forms[0].submit();
	}
}
function campoobg(campo){
	$("#"+campo).css("background", "#F9DAB7");
}
function verposicionamento(){
   if(jQuery("#posicionamento").val() == "6"){ // posicionalmento 6 = super banner
		jQuery("#dimensao").html("Dimensão ideal no super banner: 944px de largura por 256px de altura")	 
   } 
   else{
		jQuery("#dimensao").html("Dimensão ideal na página detalhe: 720px de largura por 273px de altura.");
	}
}
function delimagem(idoferta,campo){
$.get(WEB_ROOT+"/vipmin/delgal.php?id="+idoferta+"&gal="+campo,
   function(data){
      if(jQuery.trim(data)==""){
     	alert("A foto será apagada. Clique no botão SALVAR para concluir a exclusão desta foto. ");
	  }  
	  else{
		  alert(data)
	  }
   });
}
function limpacampos(){		 
	$("input[type=text]").each(function(){ 
		$("#"+this.id).css("background", "#fff");
	}); 
	$("#upload_image").css("background", "#fff");
}
function validador(){
	limpacampos();
		if( jQuery("#imob_estado").val()==""){
		 jQuery(function () {            
	        jQuery("#msgestado").dialog();
	    });
		return false;
	}   	
	if( jQuery("#city_id").val()==""){
		campoobg("city_id");
		alert("Por favor, informe a cidade onde se encontra o imóvel.");
		jQuery("#city_id").focus();
		return false;
	}	
	if(jQuery('.input_imob_permuta:checked').val() == 1) {
		if(jQuery('#obs_permuta').val() == "") {
			campoobg("obs_permuta");
			alert("Por favor, informe o campo sobre informações da permuta.");
			jQuery("#city_id").focus();
			return false;		
		}
	}
	if( jQuery("#imob_finalidade").val()==""){
		campoobg("city_id");
		alert("Por favor, informe a finalidade do imóvel.");
		jQuery("#city_id").focus();
		return false;
	}	
	if( jQuery("#imob_tipo").val()==""){
		campoobg("city_id");
		alert("Por favor, informe o tipo do imóvel.");
		jQuery("#city_id").focus();
		return false;
	}	
	if( jQuery("#team_price").val()==""){
		campoobg("team_price");
		alert("Por favor, informe o valor do imóvel.");
		jQuery("#team_price").focus();
		return false;
	}
	if( jQuery("#id").val() ==""){
	 	<?php if ($status_oferta == 1 and $pago=="sim") {
			if ($INI['option']['moderacaoanuncios']=="N") { ?> 
				alert("Fotos carregando! Outra página será aberta ao final. Aguarde.");
		<?php } else { ?>
			alert("Seu anúncio será moderado e então publicado. Este processo pode durar até 24 horas. Obrigado.");		
		<? }
		} else {
			if($pago=="sim" and $INI['option']['moderacaoanuncios']=="Y"){?>
				alert("Seu anúncio será moderado e então publicado. Este processo pode durar até 24 horas. Obrigado.");	
			<? }
			else{ ?>
					alert("Fotos carregando! Outra página será aberta ao final. Aguarde.");
			<? } ?>
		<? } ?>
	 }
	return true;	
}
 function finalizaanuncio(idcliente,idPedido,gratis){
	if(gratis!="s"){
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
	}
	else{
		Valor =  jQuery('#valoranuncio').val();
	 $.get(www+"/include/funcoes.php?acao=finalizaanuncio&partner_id="+idcliente+"&idpedido="+idPedido+"&valor="+Valor+"&idplano="+jQuery('#idplano').val()+"&team_id="+team_id ,
	  function(data){
		  if(jQuery.trim(data)!=""){ 
				alert(data)
		 }
		 else{
			$.colorbox({html:"<font color='black' size='2'> Anúncio finalizado com sucesso!</font>"});
			 location.href = www+"/adminanunciante/";
		}
	   });  
	}
}  
</script>   