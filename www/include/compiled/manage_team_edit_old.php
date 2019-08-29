<?php include template("manage_header");?>
<?php require("ini.php");
 
 ?> 



<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="/vipmin/team/edit.php?id=<?php echo $team['id']; ?>" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?php echo $team['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="admineditou" value="1" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações gerais <?=$team['id']?></h4></div>
							<div class="the-button" style="width:543px;"> 
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<input type="hidden" value="" id="idpacote" name="idpacote">
								<input type="hidden" name="mostrarseguranca" id="mostrarseguranca" value="1" >   
								<div style="float:left;"><button onclick="doupdate();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Salvar</div></button></div>
								<!-- <div style="float:left;"><button  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/category/index.php?zone=group'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Cadastrar categorias</div></button></div>--> 
								<div style="float:left;"><button  onclick="javascript:location.href='index.php'"  id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Listar Anúncios</div></button></div>
								
							</div> 
					</div> 
				 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
								<!--
									<div class="report-head">Título: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="sort_order" name="title" value="<?php echo $team['title'] ? $team['title'] : ''; ?>"> &nbsp;<img class="tTip" title="Informe o título que aparecerá¡ para o imóvel" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
								-->
									<div id="parceirobk">
										<div class="report-head">Anunciante ou Imobiliária<span class="cpanel-date-hint">Deixe em branco caso não tenha.</span></div>
										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="partner_id" id="partner_id" onchange="$('#select_partner_id').text($('#partner_id').find('option').filter(':selected').text())"> 
												<option value="">Informe o anunciante</option>
												<?php echo Utility::Option($partners, $team['partner_id']); ?>
											</select>
											<div name="select_partner_id" id="select_partner_id" class="cjt-wrapped-select-skin">Informe o anunciante</div>
											<div class="cjt-wrapped-select-icon"></div>
										</div>  
									</div>
									 				
									<div style="clear:both;"class="report-head">Este é um dos anúncios em destaque <span class="cpanel-date-hint"><a href="javascript:buscafoto('ehdestaque.jpg');">clique aqui para ver</a> </span>  </div>
									<div class="group">
										<input style="width:20px;" type="radio"  <? if($team['ehdestaque'] =="Y" ){echo "checked='checked'";}?>   value="Y"    id="ehdestaque" name="ehdestaque"> Sim  &nbsp;<img style="cursor:help" class="tTip" title="O sistema irá buscar aleatoriamente todos os anúncios que você colocou para aparecer em destaque para mostrar 3 anúncios por vêz." src="<?=$ROOTPATH?>/media/css/i/info.png">
										<input style="width:20px;" type="radio" <? if($team['ehdestaque'] =="N" or $team['ehdestaque'] ==""){echo "checked='checked'";}?>  value="N" id="ehdestaque"  name="ehdestaque" > Não  &nbsp; 
									 </div>	
								  
								   <!--
									<div style="clear:both;"class="report-head">Imagem para este destaque <span class="cpanel-date-hint"> Dimensão sugerida: 220px x 152px</span></div>
									-->
									<div class="group" style="display:none;">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="imgdestaque"  id="imgdestaque" class="format_input ckeditor"   value="<?php  $team['imgdestaque'] ; ?>" />   <?php if($team['imgdestaque']){?><br><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['imgdestaque']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'imgdestaque');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>   
									 
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
								 
									<div class="report-head">Ordenação: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="sort_order" onKeyPress="return SomenteNumero(event);"  name="sort_order" value="<?php echo $team['sort_order'] ? $team['sort_order'] : 0; ?>"> &nbsp;<img class="tTip" title="Informe a ordem de posicionamento deste anúncio no site. Anúncios com número de ordem maior ficam em primeiro lugar. ( coluna da direita )" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									 
									 <div style="float:left; width:100%;">
									     <div class="report-head">Publicação: <span class="cpanel-date-hint"></span></div>
										<input style="width:20px;" type="radio" <?=$status1?> value="1" name="status"> Ativa    &nbsp;<img class="tTip" title="Os anúncios só serão publicados no site se estiverem Pagos e com o status Ativa" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">   
										<input style="width:20px;" type="radio" <?=$status0?> value="0" name="status"> Aguardando Moderação
										<input style="width:20px;" type="radio" <?=$status2?> value="2" name="status"> Reprovada
									 </div> 
									 
									 <div style="float:left; width:100%;">
									     <div class="report-head">Status Pagamento: <span class="cpanel-date-hint"></span></div>
										<input style="width:20px;" type="radio" <? if($team['pago']=="sim"){ echo "checked=checked"; }?> value="sim" name="pago"> Pago   &nbsp;<img class="tTip" title="Os anúncios só serão publicados no site se estiverem Pagos e com o status Ativo" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">     
										<input style="width:20px;" type="radio" <? if($team['anunciogratis']=="s" and $team['pago']!="sim"){ echo "checked=checked"; }?> value="anunciogratis" name="pago"> Grátis   &nbsp;<img class="tTip" title="Quando você altera um anúncio para grátis, ele irá ser publicado logo após você alterar o campo Publicação para Ativa " style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">     
										<input style="width:20px;" type="radio" <? if($team['pago']!="sim" and $team['anunciogratis']!="s"){ echo "checked=checked"; }?>   value="" name="pago"> Pendente 
									 </div>
										 
								 </div>
								<!-- =============================  fim coluna direita  =====================================-->
							</div> 
						</div>
					</div>
				</div>
				
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Imóvel</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									<div id="c_categoria">
									<div class="report-head">Código de referência: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_codigo" name="imob_codigo" value="<?php echo $team['imob_codigo']; ?>"> &nbsp;<img class="tTip" title="Informe o código de referência para o imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>
									
									<!--<div style="clear:both;"class="report-head">CEP:</div>
									<div class="group">
										<input onblur="getEndereco();" type="text" maxlength="8" onKeyPress="return SomenteNumero(event);"  id="imob_cep"  name="imob_cep" value="<?php echo $team['imob_cep'] ? $team['imob_cep'] : ""; ?>"> &nbsp;<img class="tTip" title="Informe o CEP onde está localizado o imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>-->
									
									<div class="report-head">Estado: <span class="cpanel-date-hint"></span></div>
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
									 
									<div class="report-head">Cidade:</div>
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
										
										<!--<input type="text" id="city_id_input"  name="city_id" value="<?php echo $team['city_id'] ? $team['city_id'] : ""; ?>"> -->
									</div> 
									
									<div style="clear:both;"class="report-head">Bairro: </div>
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
										
										<!--<input type="text" id="imob_bairro"  name="imob_bairro" value="<?php echo $team['imob_bairro'] ? $team['imob_bairro'] : ""; ?>">--> 
									</div>

									<div style="clear:both;"class="report-head">Logradouro:</div>
									<div class="group">
										<input type="text" id="imob_rua"  name="imob_rua" value="<?php echo $team['imob_rua'] ? $team['imob_rua'] : ""; ?>"> 
									</div>
									
									<div style="clear:both;"class="report-head">Número:</div>
									<div class="group">
										<input type="text" id="imob_numero" onKeyPress="return SomenteNumero(event);"  name="imob_numero" value="<?php echo $team['imob_numero'] ? $team['imob_numero'] : ""; ?>"> 
									</div>									

									<div id="c_categoria">
										<div class="report-head">Finalidade: </div>
										<div class="group">
											<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
											<select  name="imob_finalidade" id="imob_finalidade" onchange="$('#select_imob_finalidade').text($('#imob_finalidade').find('option').filter(':selected').text())"> 
												<option value=""></option>
												<option value='0' <?php if ($team['imob_finalidade'] == '0') { echo "selected"; $tmp_finalidade = 'Venda';}?>>Venda</option>
												<option value='1' <?php if ($team['imob_finalidade'] == '1') { echo "selected"; $tmp_finalidade = 'Aluguel';}?>>Aluguel</option>
												<option value='2' <?php if ($team['imob_finalidade'] == '2') { echo "selected"; $tmp_finalidade = 'Alugar temporada';}?>>Alugar temporada</option>
												<option value='3' <?php if ($team['imob_finalidade'] == '3') { echo "selected"; $tmp_finalidade = 'Lançamentos';}?>>Lançamentos</option>
											</select>
											<div name="select_imob_finalidade" id="select_imob_finalidade" class="cjt-wrapped-select-skin"><?php if (isset($tmp_finalidade)) { echo $tmp_finalidade; } else { echo "Informe a finalidade"; } ?></div>
											<div class="cjt-wrapped-select-icon"></div>
											</div> &nbsp;<img class="tTip" title="Informe a finalidade do cadastro do imóvel no sistema." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
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
								<div class="ends"> 	
								<div class="report-head">Tipo: <span class="cpanel-date-hint"></span></div>
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
									<div style="clear:both;"class="report-head">Qtde. Quartos:</div>
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
									
									<div style="clear:both;"class="report-head">Qtde. Vagas:</div>
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
									<div class="report-head">Área total (m²): <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_area" onKeyPress="return SomenteNumero(event);"  name="imob_area" value="<?php echo $team['imob_area'] ? $team['imob_area'] : 0; ?>"> &nbsp;<img class="tTip" title="Informe a área total do imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>										
									<div class="report-head">Área privativa (m²): <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_area_p" onKeyPress="return SomenteNumero(event);"  name="imob_area_p" value="<?php echo $team['imob_area_p'] ? $team['imob_area_p'] : 0; ?>"> &nbsp;<img class="tTip" title="Informe a área privativa do imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>	
									<div class="report-head">IPTU: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_iptu" name="imob_iptu" value="<?php echo $team['imob_iptu']; ?>"> &nbsp;<img class="tTip" title="Informe o valor do IPTU caso exista." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>									
									<div class="report-head">Condomínio: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_condominio" name="imob_condominio" value="<?php echo $team['imob_condominio']; ?>"> &nbsp;<img class="tTip" title="Informe o valor do condomínio caso exista." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>									
									<div class="report-head">Suíte: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_suite" name="imob_suite" value="<?php echo $team['imob_suite']; ?>"> &nbsp;<img class="tTip" title="Informe o número de suítes caso o imóvel possua." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>									
									<div class="report-head">Banheiro: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="text" id="imob_banheiro" name="imob_banheiro" value="<?php echo $team['imob_banheiro']; ?>"> &nbsp;<img class="tTip" title="Informe o número de banheiros no imóvel." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div>	 
									</div> 
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
						<div class="left_float"><h4>Características do Imóvel</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									<div class="report-head">Imóvel: <span class="cpanel-date-hint"></span></div>
									<div class="group">
									    <input type="checkbox" name="adicionais[]" value="ArCondicionado" <?php if(in_array("ArCondicionado", $addArray)) echo "checked"; ?>> Ar Condicionado<br/>
                                        <input type="checkbox" name="adicionais[]" value="ArmarioCozinha" <?php if(in_array("ArmarioCozinha", $addArray)) echo "checked"; ?>> Armário de Cozinha<br/>
                                        <input type="checkbox" name="adicionais[]" value="ArmarioEmbutido" <?php if(in_array("ArmarioEmbutido", $addArray)) echo "checked"; ?>> Armário Embutido<br/>
                                        <input type="checkbox" name="adicionais[]" value="BanheiroIndependente" <?php if(in_array("BanheiroIndependente", $addArray)) echo "checked"; ?>> Banheiro Independente<br/>
                                        <input type="checkbox" name="adicionais[]" value="Canil" <?php if(in_array("Canil", $addArray)) echo "checked"; ?>> Canil<br/>
                                        <input type="checkbox" name="adicionais[]" value="Churrasqueira" <?php if(in_array("Churrasqueira", $addArray)) echo "checked"; ?>> Churrasqueira<br/>
                                        <input type="checkbox" name="adicionais[]" value="ConexaoInternet" <?php if(in_array("ConexaoInternet", $addArray)) echo "checked"; ?>> Conexão com a internet<br/>
                                        <input type="checkbox" name="adicionais[]" value="CozinhaMontada" <?php if(in_array("CozinhaMontada", $addArray)) echo "checked"; ?>> Cozinha Montada<br/>
                                        <input type="checkbox" name="adicionais[]" value="DependenciaEmpregada" <?php if(in_array("DependenciaEmpregada", $addArray)) echo "checked"; ?>> Dependência de Empregada<br/>
                                        <input type="checkbox" name="adicionais[]" value="Despensa" <?php if(in_array("Despensa", $addArray)) echo "checked"; ?>> Despensa<br/>
                                        <input type="checkbox" name="adicionais[]" value="EnergiaSolar" <?php if(in_array("EnergiaSolar", $addArray)) echo "checked"; ?>> Energia Solar<br/>
                                        <input type="checkbox" name="adicionais[]" value="EspacoGourmet" <?php if(in_array("EspacoGourmet", $addArray)) echo "checked"; ?>> Espaço Gourmet<br/>
                                        <input type="checkbox" name="adicionais[]" value="FrenteParaMar" <?php if(in_array("FrenteParaMar", $addArray)) echo "checked"; ?>> Frente para o mar<br/>
                                        <input type="checkbox" name="adicionais[]" value="GaragemCoberta" <?php if(in_array("GaragemCoberta", $addArray)) echo "checked"; ?>> Garagem coberta<br/>
                                        <input type="checkbox" name="adicionais[]" value="GaragemIndependente" <?php if(in_array("GaragemIndependente", $addArray)) echo "checked"; ?>> Garagem indenpendete<br/>
                                        <input type="checkbox" name="adicionais[]" value="Hidromassagem" <?php if(in_array("Hidromassagem", $addArray)) echo "checked"; ?>> Hidromassagem<br/>
                                        <input type="checkbox" name="adicionais[]" value="Hidrometro" <?php if(in_array("Hidrometro", $addArray)) echo "checked"; ?>> Hidrômetro Individual<br/>
                                        <input type="checkbox" name="adicionais[]" value="IsolamentoAcustico" <?php if(in_array("IsolamentoAcustico", $addArray)) echo "checked"; ?>> Isolamento Acústico<br/>
                                        <input type="checkbox" name="adicionais[]" value="JanelaIsolamentoAcustico" <?php if(in_array("JanelaIsolamentoAcustico", $addArray)) echo "checked"; ?>> Janelas com isolamento acústico<br/>
                                        <input type="checkbox" name="adicionais[]" value="Lavabo" <?php if(in_array("Lavabo", $addArray)) echo "checked"; ?>> Lavabo<br/>
                                        <input type="checkbox" name="adicionais[]" value="Lavanderia" <?php if(in_array("Lavanderia", $addArray)) echo "checked"; ?>> Lavanderia<br/>
                                        <input type="checkbox" name="adicionais[]" value="Piscina" <?php if(in_array("Piscina", $addArray)) echo "checked"; ?>> Piscina<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaPeteca" <?php if(in_array("QdaPeteca", $addArray)) echo "checked"; ?>> Quadra de peteca<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaSquash" <?php if(in_array("QdaSquash", $addArray)) echo "checked"; ?>> Quadra de Squash<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaTenis" <?php if(in_array("QdaTenis", $addArray)) echo "checked"; ?>> Quadra de Tennis<br/>
                                        <input type="checkbox" name="adicionais[]" value="QdaPoliesportiva" <?php if(in_array("QdaPoliesportiva", $addArray)) echo "checked"; ?>> Quadra Poliesportiva<br/>
                                        <input type="checkbox" name="adicionais[]" value="QuartoEmpregada" <?php if(in_array("QuartoEmpregada", $addArray)) echo "checked"; ?>> Quarto de empregada<br/>
                                        <input type="checkbox" name="adicionais[]" value="Sauna" <?php if(in_array("Sauna", $addArray)) echo "checked"; ?>> Sauna<br/>
                                        <input type="checkbox" name="adicionais[]" value="TVACabo" <?php if(in_array("TVACabo", $addArray)) echo "checked"; ?>> TV à Cabo<br/>
                                        <input type="checkbox" name="adicionais[]" value="Varanda" <?php if(in_array("Varanda", $addArray)) echo "checked"; ?>> Varanda<br/>
                                        <input type="checkbox" name="adicionais[]" value="VistaDefinitiva" <?php if(in_array("VistaDefinitiva", $addArray)) echo "checked"; ?>> Vista Definitiva<br/>
                                        <input type="checkbox" name="adicionais[]" value="AndarInteiro" <?php if(in_array("AndarInteiro", $addArray)) echo "checked"; ?>> Andar Inteiro<br/>
                                        <input type="checkbox" name="adicionais[]" value="AreaPrivativa" <?php if(in_array("AreaPrivativa", $addArray)) echo "checked"; ?>> Área Privativa<br/>
                                    </div>
									
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
                                
									<div class="report-head">Condomínio: <span class="cpanel-date-hint"></span></div>
        							<div class="group">
									    <input type="checkbox" name="adicionais[]" value="EstacVisitas" <?php if(in_array("EstacVisitas", $addArray)) echo "checked"; ?>> Estac. para Visitas<br/>
                                        <input type="checkbox" name="adicionais[]" value="ArCondCentral" <?php if(in_array("ArCondCentral", $addArray)) echo "checked"; ?>> Ar Cond. Central<br/>
                                        <input type="checkbox" name="adicionais[]" value="AreaVerde" <?php if(in_array("AreaVerde", $addArray)) echo "checked"; ?>> Área Verde<br/>
                                        <input type="checkbox" name="adicionais[]" value="Bicicletario" <?php if(in_array("Bicicletario", $addArray)) echo "checked"; ?>> Bicicletário<br/>
                                        <input type="checkbox" name="adicionais[]" value="CampoFutebol" <?php if(in_array("CampoFutebol", $addArray)) echo "checked"; ?>> Campo de Futebol<br/>
                                        <input type="checkbox" name="adicionais[]" value="Heliponto" <?php if(in_array("Heliponto", $addArray)) echo "checked"; ?>> Heliponto<br/>
                                        <input type="checkbox" name="adicionais[]" value="Interfone" <?php if(in_array("Interfone", $addArray)) echo "checked"; ?>> Interfone<br/>
                                        <input type="checkbox" name="adicionais[]" value="LavanderiaColetiva" <?php if(in_array("LavanderiaColetiva", $addArray)) echo "checked"; ?>> Lavanderia Coletiva<br/>
                                        <input type="checkbox" name="adicionais[]" value="Playground" <?php if(in_array("Playground", $addArray)) echo "checked"; ?>> Playground<br/>
                                        <input type="checkbox" name="adicionais[]" value="Restaurante" <?php if(in_array("Restaurante", $addArray)) echo "checked"; ?>> Restaurante<br/>
                                        <input type="checkbox" name="adicionais[]" value="SaladeGinastica" <?php if(in_array("SaladeGinastica", $addArray)) echo "checked"; ?>> Sala de Ginástica<br/>
                                        <input type="checkbox" name="adicionais[]" value="SalaoDeFesta" <?php if(in_array("SalaoDeFesta", $addArray)) echo "checked"; ?>> Salão de Festa<br/>
                                        <input type="checkbox" name="adicionais[]" value="SalaoDeJogos" <?php if(in_array("SalaoDeJogos", $addArray)) echo "checked"; ?>> Salão de Jogos<br/>
                                    </div>
                                    
                                    <div class="report-head">Segurança: <span class="cpanel-date-hint"></span></div>
        							<div class="group">
									    <input type="checkbox" name="adicionais[]" value="BloqueioElevador" <?php if(in_array("BloqueioElevador", $addArray)) echo "checked"; ?>> Bloqueio de Elevador<br/>
                                        <input type="checkbox" name="adicionais[]" value="CercaEletrica" <?php if(in_array("CercaEletrica", $addArray)) echo "checked"; ?>> Cerca Elétrica<br/>
                                        <input type="checkbox" name="adicionais[]" value="CircuitoInternoTV" <?php if(in_array("CircuitoInternoTV", $addArray)) echo "checked"; ?>> Circuito Interno de TV<br/>
                                        <input type="checkbox" name="adicionais[]" value="ElevadorComSenha" <?php if(in_array("ElevadorComSenha", $addArray)) echo "checked"; ?>> Elevador com Senha<br/>
                                        <input type="checkbox" name="adicionais[]" value="GuaritaPortaria" <?php if(in_array("GuaritaPortaria", $addArray)) echo "checked"; ?>> Guarita na Portaria<br/>
                                        <input type="checkbox" name="adicionais[]" value="Porteiro12Horas" <?php if(in_array("Porteiro12Horas", $addArray)) echo "checked"; ?>> Porteiro 12 Horas<br/>
                                        <input type="checkbox" name="adicionais[]" value="Porteiro24Horas" <?php if(in_array("Porteiro24Horas", $addArray)) echo "checked"; ?>> Porteiro 24 Horas<br/>
                                        <input type="checkbox" name="adicionais[]" value="SegurancaInterna" <?php if(in_array("SegurancaInterna", $addArray)) echo "checked"; ?>> Segurança Interna<br/>
                                        <input type="checkbox" name="adicionais[]" value="SegurancaNaRua" <?php if(in_array("SegurancaNaRua", $addArray)) echo "checked"; ?>> Segurança na Rua<br/>
                                        <input type="checkbox" name="adicionais[]" value="SegurancaPatrimonial" <?php if(in_array("SegurancaPatrimonial", $addArray)) echo "checked"; ?>> Segurança Patrimonial<br/>
                                    </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
				
				<!-- FIM INFORMAÃ‡Ã•ES DO IMOVEL -->
				
				
				<!-- ********************************************* ABA Controle de Estoque e periodo --> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Controle de Período</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
									 <div class="report-head">Data início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['begin_time']); ?>" name="begin_time" id="begin_time" class="format_input ckeditor"  maxlength="10"  value="<?php echo date('d/m/Y', $team['begin_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].begin_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div>
									
									<div class="report-head">Hora início: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" id="begin_time2"  name="begin_time2"  value="<?php echo  $team['begin_time2'] ; ?>"  class="format_input ckeditor"  maxlength="10"  />
									</div> 
									
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
									  
									<div class="report-head">Data fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text"  xd="<?php echo date('d/m/Y', $team['end_time']); ?>" name="end_time" id="end_time" class="format_input ckeditor"  maxlength="10"  value="<?php echo date('d/m/Y', $team['end_time']); ?>"/>
										 <img  style="cursor:pointer;" onclick="javascript:displayCalendar(document.forms[0].end_time,'dd/mm/yyyy',this);" alt="select date" src="<?=$ROOTPATH?>/media/css/i/calendar.png"> 
									</div> 
								 
									<div class="report-head">Hora fim: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input style="width:40%;" type="text" name="end_time2" id="end_time2"   value="<?php echo  $team['end_time2'] ; ?>"  class="format_input ckeditor"  maxlength="10"  />
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
						<div class="left_float"><h4>Informações de Preço</h4></div>
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">   
									<div id="c_valores">
										<div style="clear:both;"class="report-head">Valor: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="team_price"  id="team_price" class="format_input ckeditor"   value="<?php echo  $team['team_price'] ; ?>"  />  <img style="cursor:help" class="tTip" title="Valor do imóvel" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 										
										<div style="clear:both;margin-top:10px;"class="report-head">Aceita financiamento: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input style="width:20px;" type="radio" <?php if($team['imob_financiamento'] == 1) { ?> checked="checked" <?php } ?> value="1" name="imob_financiamento"> Sim      
											<input style="width:20px;" type="radio" <?php if($team['imob_financiamento'] == 0) { ?> checked="checked" <?php } ?> value="0" name="imob_financiamento"> Não
										</div> 	
									</div>
								  
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
									<div class="ends">  
										<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;">
										   <span class="report-label">Mostrar Preço:</span>  
											<input style="width:20px;" type="radio" <?=$mostrarprecosim?> value="1" name="mostrarpreco"> Sim      
											<input style="width:20px;" type="radio" <?=$mostrarpreconao?> value="0" name="mostrarpreco"> Não
										 </div>
										<div style="clear:both;margin-top:10px;"class="report-head">Aceita permuta: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input style="width:20px;" type="radio" <?php if($team['imob_permuta'] == 1) { ?> checked="checked" <?php } ?> value="1" class="input_imob_permuta" name="imob_permuta"> Sim      
											<input style="width:20px;" type="radio" <?php if($team['imob_permuta'] == 0) { ?> checked="checked" <?php } ?> value="0" class="input_imob_permuta" name="imob_permuta"> Não
										</div> 												
										<div style="clear:both;margin-top:10px;"class="report-head">Informações da permuta: &nbsp;<img class="tTip" title="Informe o que aceita como permuta, valor, porcentagem e demais informações." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"><span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="obs_permuta" id="obs_permuta" value="<?php echo $team['obs_permuta']; ?>">											
										</div> 	
								   </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>	
					
					
				<div id="campostipoveiculo"></div>
				 
				 <!-- ********************************************* ABA Fotos --> 
				<div class="option_box">
					<div class="top-heading group"> <div class="left_float"><h4>Imagens: Dimensão ideal: 592px (largura) x 502px (altura) -  - <a href="https://resizeyourimage.com/PT/#transform=&page_no=1&no_of_pages=1&filename=2.jpg&selection_top=65&selection_left=97&selection_width=777&selection_height=518&zoom=1620&demomode=true" target="_blank">Clique aqui e reduza o tamanho online</a></h4> </div> </div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">  
									<div style="clear:both;"class="report-head">Foto 1:  <span class="cpanel-date-hint"><span id="dimensao"></span>    
									</div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image"  id="upload_image" class="format_input ckeditor"  value="<?php  $team['upload_image'] ; ?>" />  <?php if($team['image']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['image']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image');" ><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>
									 </div> 
									<div style="clear:both;"class="report-head">Foto 2: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image1"  id="upload_image1" class="format_input ckeditor"   value="<?php  $team['upload_image1'] ; ?>" />   <?php if($team['image1']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['image1']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image1');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?> 
									</div> 
									<div style="clear:both;"class="report-head">Foto 3: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image2"  id="upload_image2" class="format_input ckeditor"   value="<?php  $team['upload_image2'] ; ?>" />   <?php if($team['image2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['image2']); ?>&nbsp;&nbsp;<a href="javascript:delimagem(<?php echo $team['id']; ?>, 'image2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 4: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image1"  id="gal_upload_image1" class="format_input ckeditor"   value="<?php  $team['gal_upload_image1'] ; ?>" />   <?php if($team['gal_image1']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image1']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image1');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 5:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image2"  id="gal_upload_image5" class="format_input ckeditor"   value="<?php  $team['gal_upload_image2'] ; ?>" /> <?php if($team['gal_image2']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image2']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image2');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
									</div> 
									<div style="clear:both;"class="report-head">Foto 6: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image3"  id="gal_upload_image6" class="format_input ckeditor"   value="<?php  $team['gal_upload_image3'] ; ?>" />   <?php if($team['gal_image3']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image3']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image3');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 			
									<div style="clear:both;"class="report-head">Foto 7: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image4"  id="gal_upload_image7" class="format_input ckeditor"   value="<?php  $team['gal_upload_image4'] ; ?>" />   <?php if($team['gal_image4']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image4']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image4');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 			
									<div style="clear:both;"class="report-head">Foto 8: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image5"  id="gal_upload_image8" class="format_input ckeditor"   value="<?php  $team['gal_upload_image5'] ; ?>" />   <?php if($team['gal_image5']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image5']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image5');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 				
									<div style="clear:both;"class="report-head">Foto 9: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image6"  id="gal_upload_image9" class="format_input ckeditor"   value="<?php  $team['gal_upload_image6'] ; ?>" />   <?php if($team['gal_image6']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image6']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image6');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 				
									<div style="clear:both;"class="report-head">Foto 10: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image7"  id="gal_upload_image10" class="format_input ckeditor"   value="<?php  $team['gal_upload_image7'] ; ?>" />   <?php if($team['gal_image7']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image7']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image7');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 
								 
								</div>
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
									<div style="clear:both;"class="report-head">Foto 11: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image8"  id="gal_upload_image11" class="format_input ckeditor"   value="<?php  $team['gal_upload_image8'] ; ?>" />   <?php if($team['gal_image8']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image8']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image8');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 12:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image9"  id="gal_upload_image12" class="format_input ckeditor"   value="<?php  $team['gal_upload_image9'] ; ?>" /> <?php if($team['gal_image9']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image9']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image9');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
									</div> 
									<div style="clear:both;"class="report-head">Foto 13: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image10"  id="gal_upload_image13" class="format_input ckeditor"   value="<?php  $team['gal_upload_image10'] ; ?>" />   <?php if($team['gal_image10']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image10']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image10');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 									
									<div style="clear:both;"class="report-head">Foto 14: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image11"  id="gal_upload_image14" class="format_input ckeditor"   value="<?php  $team['gal_upload_image11'] ; ?>" />   <?php if($team['gal_image11']){?> <br><span style="clear:both;" class="cpanel-date-hint"><?php echo team_image($team['gal_image11']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image11');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div> 
									<div style="clear:both;"class="report-head">Foto 15:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image12"  id="gal_upload_image15" class="format_input ckeditor"   value="<?php  $team['gal_upload_image12'] ; ?>" /> <?php if($team['gal_image12']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image12']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image12');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
									</div> 
									<div style="clear:both;"class="report-head">Foto 16: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image13"  id="gal_upload_image16" class="format_input ckeditor"   value="<?php  $team['gal_upload_image13'] ; ?>" />   <?php if($team['gal_image13']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image13']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image13');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 									
									<div style="clear:both;"class="report-head">Foto 17:  <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image15"  id="gal_upload_image18" class="format_input ckeditor"   value="<?php  $team['gal_upload_image15'] ; ?>" /> <?php if($team['gal_image15']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image15']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image15');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span> <?php }?>   
									</div> 
									<div style="clear:both;"class="report-head">Foto 18: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image16"  id="gal_upload_image19" class="format_input ckeditor"   value="<?php  $team['gal_upload_image16'] ; ?>" />   <?php if($team['gal_image16']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image16']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image16');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 									
									<div style="clear:both;"class="report-head">Foto 19: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image17"  id="gal_upload_image20" class="format_input ckeditor"   value="<?php  $team['gal_upload_image17'] ; ?>" />   <?php if($team['gal_image17']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image17']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image17');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 									
									<div style="clear:both;"class="report-head">Foto 20: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="gal_upload_image18"  id="gal_upload_image21" class="format_input ckeditor"   value="<?php  $team['gal_upload_image18'] ; ?>" />   <?php if($team['gal_image18']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['gal_image18']); ?>&nbsp;&nbsp;<a  href="javascript:delimagem(<?php echo $team['id']; ?>, 'gal_image18');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a></span><?php }?>
									</div> 
							  
								 </div> 
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					
				
					<div class="option_box" id="abapagamento" style="display:;">
					<div class="option_box" id="abapagamento"  >
						<div class="top-heading group">
							<div class="left_float"><h4>Cole abaixo a URL de um vídeo no YouTube sobre este Imóvel ou sua apresentação profissional</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group">
									<div class="starts">   
										<div id="c_valores">
											<div style="clear:both;"class="report-head">URL do vídeo atual <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="video1"  id="video1" class="format_input ckeditor"   value="<?php echo $team['video1']; ?>" />   
												<?php if($team['video1'] != ""){?>
													<a href="<?=$team['video1']?>" target="_blank"><?=$team['video1']?></a>
												<?php } ?>
											</div>  	
										</div> 
									</div>
										<div class="ends">  
											<!--
											<div style="clear:both;"class="report-head">Vídeo 02 <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="video2"  id="video2" class="format_input ckeditor"   value="" />   <?php if($team['video2']){?><br><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['video2']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'imgdestaque');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
											</div> 
											-->
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
								<div class="starts">  
								
									<div style="clear:both;"class="report-head">Detalhe: <span class="cpanel-date-hint">Dimensão exata: 720px x 273px.</span>&nbsp;<img class="tTip" title="Opcionalmente, vocÃª pode fazer o upload da imagem redimensionada manualmente por vocÃª para este bloco. Note que se vocÃª fizer este upload, o sistema irá ignorar o redimensionamento automático para esse bloco e usar a sua imagem. Dimensão exata para a lateral: 720px x 273px." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div>
									<div class="group">
										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="estatica_detalhe"  id="estatica_detalhe" class="format_input ckeditor"   value="<?php  $team['estatica_detalhe'] ; ?>" />   <?php if($team['estatica_detalhe']){?><br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($team['estatica_detalhe']); ?>&nbsp;&nbsp;<a href="#" onclick="delimagem(<?php echo $team['id']; ?>, 'estatica_detalhe');"><img style="width: 13px;" src="<?=$ROOTPATH?>/media/css/i/excluir.png" /> </a> </span><?php }?>
									</div>
								 
								 
								</div> 
								<div class="ends"> 
								
								 
								 </div> 
								</div> 
							</div> 
						</div>
					</div>
					-->
					 
					 <!-- ********************************************* ABA Descrição da oferta --> 
					<div class="option_box">
						<div class="top-heading group"> <div class="left_float"><h4>Informações Adicionais</h4> </div> &nbsp;<img class="tTip" title="Escreva abaixo os diferenciais do veículo. Ex: IPVA pago, Documentação ok, Chave reserva, Veículo revisado, etc.." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 
						 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group"> 
									<div class="text_area">  
									<textarea cols="45" rows="5" name="summary" style="width:100%" id="summary" class="format_input ckeditor" ><?php echo htmlspecialchars($team['summary']); ?></textarea>
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
							<div class="the-button">
								<input type="hidden" value="" id="vea_caracter" name="vea_caracter">
								<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
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
</div> 
<script>
var www = jQuery("#www").val();
   
 
$("#end_time").mask("99/99/9999");
$("#begin_time").mask("99/99/9999");
$("#end_time2").mask("99:99");
$("#begin_time2").mask("99:99");
//$("#imob_cep").mask("99999-999");
 
$('#team_price').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#imob_iptu').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: '.'
});
$('#imob_condominio').priceFormat({
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
     	alert("Imagem apagada com sucesso. Após finalizar a edição do anúncio clique no botão salvar para efetivar a exclusão desta imagem. ");
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

		campoobg("imob_estado");
		alert("Por favor, informe o estado onde se encontra o imóvel.");
		jQuery("#imob_estado").focus();
		return false;
	}   	
	
	if( jQuery("#city_id").val()==""){

		campoobg("city_id");
		alert("Por favor, informe a cidade onde se encontra o imóvel.");
		jQuery("#city_id").focus();
		return false;
	}	
	
	
	if( jQuery("#partner_id").val()==""){

		campoobg("partner_id");
		alert("Por favor, informe o anunciante.");
		jQuery("#partner_id").focus();
		return false;
	}	
	
	 /*ehdestaque  = $("input[name='ehdestaque']:checked").val();
	 imgdestaque_bd  = '<?=$team['imgdestaque']?>';
 
    if(ehdestaque=="Y"){ 
			if( jQuery("#imgdestaque").val() =="" & imgdestaque_bd==""){
			alert("Se você marcou este anúncio para ser destaque, então você deve fazer o upload da imagem no campo 'Imagem para este destaque'");
			campoobg("imgdestaque");
			jQuery("#imgdestaque").focus();
			return false;
		}
		
	}*/
	
	if( jQuery("#imob_finalidade").val()==""){

		campoobg("imob_finalidade");
		alert("Por favor, informe a finalidade do imóvel.");
		jQuery("#imob_finalidade").focus();
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
	
	if( jQuery("#imob_tipo").val()==""){

		campoobg("imob_tipo");
		alert("Por favor, informe o tipo do imóvel.");
		jQuery("#imob_tipo").focus();
		return false;
	}	
	
	
	if( jQuery("#team_price").val()==""){

		campoobg("team_price");
		alert("Por favor, informe o valor do imóvel.");
		jQuery("#team_price").focus();
		return false;
	}
	
 	 upload_image_bd  = '<?=$team['image']?>';
	  
	 if( jQuery("#upload_image").val() =="" & upload_image_bd ==""){
		
		alert("Por favor, faça upload da primeira foto ao menos.");
		campoobg("upload_image");
		jQuery("#upload_image").focus();
		return false;
	 }
	 
	return true;	
}

 

</script>  


<script>
	
	function buscafoto(foto){
		jQuery(document).ready(function(){
			jQuery.colorbox({
				href: WEB_ROOT + '/media/css/i/'+foto
			});
		});
		}
 
 </script>
 