<?php include template("manage_anunciante_header"); ?>
 
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
								 Anúncios Finalizados ou Reprovados 
							<?php } else if($selector=='success') { ?>
								 Anúncios válidos, com período finalizado 
							<?php } else if($_REQUEST['acao']=='site') { ?>
								  Anúncios atuais no site  
							<?php } else { ?>
								 Todos os Anúncios 
							<?php }?>
							</h4> 
							
						</div> 
							<div style="padding: 10px;">
								<ul id="log_tools">
							
								<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/edit.php'"  id="run-button" class="input-btn" type="button">Adicionar Anúncio</button>
								<button style="border:none;"   onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/failure.php'"  id="run-button" class="input-btn" type="button">Anúncios cancelados</button>
								<button style="border:none;"  onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/index.php?acao=site'"  id="run-button" class="input-btn" type="button">Anúncios no site</button>
								<button style="border:none;"  onclick="javascript:location.href='<?=$ROOTPATH?>/adminanunciante/team/index.php'"  id="run-button" class="input-btn" type="button">Todos os anúncios</button>
								
								
								</ul>
							 </div>
					</div>  
					<?php 
					$saldo = get_saldo( $_SESSION['partner_id'] );
					$infoplano = get_info_plano($_SESSION['partner_id']) ;
					if($saldo > 0){
						 $max_string =   $infoplano." - Você ainda pode cadastrar $saldo anúncio(s)" ;
					}
					else if($saldo == 0 and $infoplano != ""){
						 $max_string = $infoplano." - O seu saldo de anúncios está esgotado." ;
					}
					else{
						$max_string = "Você não escolheu um plano ou ele ainda não foi aprovado." ;
					}
					
						
					?>  
					<div class="paginacaotop"><?php echo $pagestring; ?> <?=$max_string ?></div>				
				
					<div class="sect" style="clear:both;">
						<table id="orders-list" cellspacing="0" cellpadding="0" border="0" class="coupons-table">
						<form method="get">
						<tr>
						<th width="40">ID <input type="text"  name="idoferta"  id="idoferta" style="width: 50%; color:#303030;font-size:11px;"> </th>
						<th width="350">Anúncio <input type="text"  value="<?=$_REQUEST['team_title']?>" name="team_title"  id="team_title" style="width: 75%; color:#303030;font-size:11px;"></th>
					 
						<th width="40">Cliques  </th> 
						 <th width="40">Período</th> 
						<th width="60" nowrap>Preço</th>
						<th width="60" nowrap>Status</th>
						<th width="220">  
						<button style="width: 60px;" type="submit"><span>Buscar</span></button>
						<button style="width: 60px"  onclick="resetFilter()" type="button"><span>Limpar</span></button> 
						</th>
						</tr>
						</form>
						<?php if(is_array($teams)){foreach($teams AS $index=>$one) { 
								$bregistro =  true; 
								$cidade = $cities[$one['city_id']]['nome'];	 
								require("manage_team_controle.php"); 
								
						 ?>
						<?php $oldstate = $one['state']; ?>
						<?php $one['state'] = team_state($one); ?>
						<tr <?php echo $index%2?'class="normal"':'class="alt"'; ?> id="team-list-id-<?php echo $one['id']; ?>">
							<?if($INI['option']['box-anunciogratis']!="Y"){?><td><?php echo $one['id']; ?> <img alt="<?=$title?>" title="<?=$title?>" src="/media/css/i/<?=$bandeira?>" style="width: 22px;"> </td><? } ?>
							<td><?php echo $tituloanuncio ; ?></td> 
							<td><?php echo $one['clicados']; ?></td>  
						 
							<td nowrap><?php if($one['pago']=="sim"  or $one['pago']  =="s" or $one['anunciogratis']=="s"){ echo date('d/m/Y',  $one['begin_time'] );?> <br> <?php echo date('d/m/Y',  $one['end_time'] ); } else { echo " - "; }?></td> 
							<td nowrap><span class="money"><span class="money"><?php echo $currency; ?></span><?php echo moneyit3($one['team_price']); ?></td>
							<td nowrap><span class="money"> <?=$title?></td>
							<td class="op" nowrap>
							<?
							   if($one['pago']  !="sim"  and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo <=0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS E O USUARIO TEM SALDO  ?>
								<div style="float: left; margin-right: 2px;"><a href="/adminanunciante/team/pagamentopagseguro.php?id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento" title="Efetuar o pagamento" style="width: 28px;" src="/media/css/i/payment-card-icon.png"></a></div>
							 <? }  
							 
							   else if($one['pago']  !="sim" and $one['pago']  !="s" and  $one['anunciogratis']!="s"  and $saldo > 0 ){  // ANUNCIO NAO PAGO, NAO É DO TIPO GRATIS MAS O USUARIO SALDO, ELE PODE ATIVAR SE DESEJAR ?>
								 <div style="float: left; margin-right: 2px;"><a onclick="javascript:renovaranuncio('<?php echo $one['id']; ?>');" href="#"><img alt="Ativar este anúncio usando meu saldo de anúncios disponíveis" title="Ativar este anúncio usando meu saldo de anúncios disponíveis" style="width: 23px;" src="/media/css/i/check-mark-copy-icon.png"></a></div>
								<? } 
							 
							  else if($finalizacao and $saldo<=0 ){?> <div style="float: left; margin-right: 2px;"><a href="/adminanunciante/team/pagamentopagseguro.php?republica=true&id=<?php echo $one['id']; ?>"  ><img alt="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento." title="Efetuar o pagamento e republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a aprovação do pagamento" style="width: 28px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
							  <? } 
							 
							  else if($finalizacao and $saldo > 0 ){?> <div style="float: left; margin-right: 2px;"><a  onclick="javascript:republicaranuncio('<?php echo $one['id']; ?>');" href="#"  ><img alt="Republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a republicação." title="Republicar anúncio. Ele será republicado com o mesmo número de anúncio e você poderá editar após a republicação." style="width: 23px;" src="/media/css/i/Button-Refresh-icon.png"></a></div>
							  
							  <? } ?>
							
							<div style="float: left; margin-right: 2px;"><a  target="_blank" href="<?=$ROOTPATH?>/imovel/visualizacao/<?=$one['id']?>/"><img alt="Visualizar anúncio" title="Pré visualizar anúncio" src="/media/css/i/Monitoring.png" style="width: 22px;"></a></div>
							<div style="float: left; margin-right: 2px;"><a href="<?=$ROOTPATH?>/adminanunciante/team/edit.php?id=<?php echo $one['id']; ?>"><img alt="Editar anúncio" title="Editar anúncio" src="/media/css/i/editar.png" style="width: 22px;"></a></div>
						    <? if($one['desativado'] =="s"){?>
								<div style="float: left; margin-right: 2px;"><a onclick="javascript:resumo('<?php echo $one['id']; ?>');" href="#"    ><img alt="Continuar o anúncio" title="Continuar o anúncio" style="width: 17px;" src="/media/css/i/Play-1-Normal-icon.png"></a></div> 
							<?}
							else {?>
								<div style="float: left; margin-right: 2px;"><a onclick="javascript:pausar('<?php echo $one['id']; ?>');" href="#"    ><img alt="Pausar anúncio" title="Pausar anúncio" style="width: 17px;" src="/media/css/i/Stop-Normal-Red-icon.png"></a></div> 
							<?}?>
							
							</td>
						</tr>
						<?php }} ?>
						<?if(!$bregistro){?><tr><td colspan="15" style="text-align: center;">Nenhum registro encontrado.</tr><? } ?>
						<tr><td colspan="10"><?php echo $pagestring; ?></tr>
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
	window.open(url + '/adminanunciante/team/pdf.php?'+params, '_blank');
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
	window.open(url + '/adminanunciante/team/excel.php?'+params, '_blank');
}

function renovaranuncio(id){ 
 
	 //jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos renovando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=renovaranuncio&id="+id,
	function(data){ 
	//	jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function republicaranuncio(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos renovando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=republica&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function pausar(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos pausando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=pausar&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}
function resumo(id){ 
 
	// jQuery.colorbox({html:"<div class='msgsoft'><img src='<?=$PATHSKIN?>/images/ajax-loader2.gif'> Aguarde, estamos pausando este anúncio</div>"});
	 $.get(WEB_ROOT+"/ajax/manage.php?action=resumo&id="+id,
	function(data){ 
		//jQuery.colorbox({html:data});
		location.href  = '<?php echo $_SERVER["PHP_SELF"] ?>';
	});	 
}

 </script>
 