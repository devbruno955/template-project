<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="coupons"> 
    <div id="content" class="coupons-box clear mainwide">
		<div class="box clear"> 
            <div class="box-content">
				<div class="option_box">
					<div class="top-heading group"> 
						<div class="left_float">
							<h4> 
							<?php if($selector=='failure'){?>
								 Anúncios Canceladas 
							<?php } else if($selector=='success') { ?>
								 Anúncios válidas, com período finalizado 
							<?php } else if($_REQUEST['acao']=='site') { ?>
								  Anúncios atuais no site  
							<?php } else { ?>
								 Todos os Anúncios 
							<?php }?>
							</h4> 
							
						</div> 
						<ul id="log_tools">
						
							  <button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/relatorioimoveis.php'"  id="run-button" class="input-btn" type="button">Relatório de imóveis</button> 
							<!-- <button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/relatorio.php'"  id="run-button" class="input-btn" type="button">Relatório de acessos</button>-->
							<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/edit.php'"  id="run-button" class="input-btn" type="button">Adicionar Anúncio</button>  
							<button style="border:none;"  onclick="javascript:location.href='<?=$ROOTPATH?>/vipmin/team/index.php'"  id="run-button" class="input-btn" type="button">Todos os anúncios</button>
							
						 </ul>
								
					</div> 
					<div class="paginacaotop"><?php echo $pagestring; ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="40">Código <input type="text"  name="imob_codigo"  id="imob_codigo" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="150">Anúncio <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 75%; color:#303030;font-size:11px;"></th>
						 	<th width="40">Clicados  </th>
						<th width="40">Destaque 		
						<select name="ehdestaque" id="ehdestaque"> 
							<option value=""></option>
							<option  <? if($_REQUEST['ehdestaque']=="Y"){ echo " selected "; } ?> value="Y">Sim</option>
							<option  <? if($_REQUEST['ehdestaque']=="N"){ echo " selected "; } ?> value="N">Não</option>
						 
						</select>  </th>
					
						<!--  <th width="40">Cliques  </th>
						<th width="120"> Cidade </th> -->
						<th width="60" nowrap><select id="partner_id" name="partner_id" class="f-input"   style="width:95%;height:23px;font-weight:normal;font-size:11px;"> <option value="">Todos os anunciantes</option><?php echo Utility::Option($partners, $_REQUEST['partner_id']); ?></select> </th>
						<th width="90">Estado
						<select name="imob_estado" id="imob_estado"> 
							<option value=""></option>
							<?php
								$sql = "SELECT DISTINCT uf FROM cidades";
								$estados = mysql_query($sql) or die(mysql_error());
								while ($row = mysql_fetch_array($estados, MYSQL_ASSOC)) {
									if ($_REQUEST['imob_estado'] == $row['uf']) {
										$tmp_estado = $row['uf'];
										echo "<option value='{$row['uf']}' selected>{$row['uf']}</option>";
									} else {
										echo "<option value='{$row['uf']}'>{$row['uf']}</option>";		
									}
								}
							?>
						</select> 
						</th> 
						<th width="40">Período</th> 
						<th width="40" nowrap>Preço</th>
						<th width="10" nowrap>Status</th>
						<th width="20" nowrap>Finalidade
							<!-- 
							<select name="imob_finalidade" id="imob_finalidade"> 
							<option value=""></option>
							<option <? if($_REQUEST['imob_finalidade']=="0"){ echo " selected "; } ?> value="0">Vender</option>
							<option <? if($_REQUEST['imob_finalidade']=="1"){ echo " selected "; } ?> value="1">Alugar</option>
						 
						</select> 
						-->
						</th>
						<th width="50">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button>
						<!-- 
						<button style="width: 60px"  onclick="gerarPDF()" type="button"><span>PDF</span></button>
						<button style="width: 60px" onclick="gerarExcel()" type="button"><span>Excel</span></button>
						-->
						</th>
						</tr>
						</form>
						<?php if(is_array($teams)){foreach($teams AS $index=>$one) { 
								$bregistro =  true; 
								$cidade = $cities[$one['city_id']]['nome'];	 
								require("manage_team_controle.php"); 
								
								$ehdestaque="Não";
								$stydest='';
								if($one['ehdestaque']=="Y"){
									$ehdestaque="Sim";
									$stydest='style="background:green"';
								}	
								
								$imob_finalidade="<span style='color:#fff'>Vender</span>"; 
								if($one['imob_finalidade']=="1"){
									$imob_finalidade="<span style='color:orange'>Alugar</span>"; 
								}								
								if($one['imob_finalidade']=="2"){
									$imob_finalidade="<span style='color:orange'>Alugar temporada</span>"; 
								}								
								if($one['imob_finalidade']=="3"){
									$imob_finalidade="<span style='color:orange'>Lançamentos</span>"; 
								}
						 ?>
						<?php $oldstate = $one['state']; ?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<td><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td>
							<td><?php echo $one['imob_codigo']; ?></td> 
							<td><?php echo $tituloanuncio; ?></td> 
							  <td><?php echo $one['clicados']; ?></td> 
							  <td <?=$stydest?>><?php echo $ehdestaque; ?></td> 
							<!-- <td nowrap><?php echo $cidade ; ?> </td> -->
							<td nowrap> <?php echo $partner[$one['partner_id']]['title']; ?></td> 
							<td nowrap> <?php echo $one['imob_estado']; ?></td> 
							<td nowrap><?php if($one['pago']=="sim" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></td> 
							<td nowrap><span class="money"> <span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
							<td nowrap>  <?=$title?></td>
							<td nowrap><span class="money"> <?php echo $imob_finalidade; ?></td>
							<td class="op" nowrap>
							<div style="float: left; margin-right: 2px;"><a  target="_blank" href="<?=$ROOTPATH?>/imovel/visualizacao/<?=$one['id']?>/"><img alt="Visualizar anúncio" title="Visualizar anúncio" src="/media/css/i/Monitoring.ico" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="<?=$ROOTPATH?>/vipmin/team/edit.php?id=<?php echo $one['id']; ?>"><img alt="Editar anúncio" title="Editar anúncio" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="<?=$ROOTPATH?>/ajax/manage.php?action=teamremove&id=<?php echo $one['id']; ?>" class="ajaxlink" ask="Você tem certeza que deseja apagar este anúncio?" ><img alt="Excluir" title="Excluir" style="width: 17px;" src="/media/css/i/excluir.png"></a></div>
							   
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado.</tr><? } ?>
						<tr><td colspan="15"><?php echo $pagestring; ?></tr>
						</table>
					</div>
				</div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->



 <script> 
 function resetFilter(){
	location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
 }
 </script>
    <script>
  function msg(){
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Deletando este Anúncio...</div>"});
	}  
  function processar(){
		jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Processando, aguarde...</div>"});
	}
	
	
function gerarPDF(){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>

	if($('#idoferta').val() != ''){
		var idoferta = $('#idoferta').val();
	}else{
		var idoferta = 'undefined';
	}

	if($('#team_title').val() != ''){
		var team_title = $('#team_title').val();
	}else{
		var team_title = 'undefined';
	}

	if($('#team_type option:selected').val() != ''){
		var team_type = $('#team_type option:selected').val();
	}else{
		var team_type = 'undefined';
	}

	if($('#city_id option:selected').val() != ''){
		var city_id = $('#city_id option:selected').val();
	}else{
		var city_id = 'undefined';
	}

	if($('#partner_id option:selected').val() != ''){
		var partner_id = $('#partner_id option:selected').val();
	}else{
		var partner_id = 'undefined';
	}

	var params = 'team_type='+team_type+'&team_title='+team_title+'&city_id='+city_id+'&partner_id='+partner_id;
	window.open(url + '/vipmin/team/pdf.php?'+params, '_blank');
}

function gerarExcel(){
	var url = <?php echo "'" . $INI['system']['wwwprefix'] . "';"; ?>

	if($('#idoferta').val() != ''){
		var idoferta = $('#idoferta').val();
	}else{
		var idoferta = 'undefined';
	}

	if($('#team_title').val() != ''){
		var team_title = $('#team_title').val();
	}else{
		var team_title = 'undefined';
	}

	if($('#team_type option:selected').val() != ''){
		var team_type = $('#team_type option:selected').val();
	}else{
		var team_type = 'undefined';
	}

	if($('#city_id option:selected').val() != ''){
		var city_id = $('#city_id option:selected').val();
	}else{
		var city_id = 'undefined';
	}

	if($('#partner_id option:selected').val() != ''){
		var partner_id = $('#partner_id option:selected').val();
	}else{
		var partner_id = 'undefined';
	}

	var params = 'team_type='+team_type+'&team_title='+team_title+'&city_id='+city_id+'&partner_id='+partner_id;
	window.open(url + '/vipmin/team/excel.php?'+params, '_blank');
}
 </script>
 