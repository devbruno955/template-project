<?php include template("manage_header"); 
	?>

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
				<form id="nform" id="nform"  method="post" action="/vipmin/order/edit.php" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="id" name="id" value="<?=$planos_publicacao['id']; ?>" />
				<input type="hidden" name="guarantee" value="Y" />
				<input type="hidden" name="system" value="Y" /> 
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Informações do Plano <?=$planos_publicacao['id']?></h4></div>
							<div class="the-button">
								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">
								<button onclick="doupdate();" id="run-button" class="input-btn" type="button">
									<div name="spinner-top" id="spinner-top" style="width: 83px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div>
									<div id="spinner-text"  >Salvar</div>
								</button>
							</div> 
					</div> 
					<div id="container_box">
						<div id="option_contents" class="option_contents"> 
						
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">
								   
									<div class="report-head">Nome do Plano: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="15" name='nome' id='nome' value='<?=$planos_publicacao['nome']?>' />
										<img class="tTip" title="Note que este título deve ser pequeno o suficiente para caber dentro do box de planos" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									<? if(file_exists(WWW_MOD."/pacotes.inc") ){?>
										<div class="report-head">Qtde de Anúncios: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type='text' maxlength="15" onKeyPress="return SomenteNumero(event);"  name='qtdeanuncio' id='qtdeanuncio' value='<?=$planos_publicacao['qtdeanuncio']?>' />
											<img class="tTip" title="É quantidade de anúncios que o cliente poderá fazer pagando este plano. Quando o cliente publicar todos os anúncios do plano, ele deverá escolher um novo plano. Informe uma sequencia de sete 9 ex: 9999999 para anúncios ilimitados" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										</div> 
 	
									<? } ?>
									
									<div class="report-head">Dias de Publicação: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' onKeyPress="return SomenteNumero(event);"  maxlength="15" name='dias' id='dias' value='<?=$planos_publicacao['dias']?>' />
										<img class="tTip" title="É quantidade de dias que o anúncio do internauta ficará online no site. Para anúncios até vender, informe uma sequencia de sete 9 ex: 9999999" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									</div> 
									
									<div class="report-head">Valor do Plano: <span class="cpanel-date-hint"></span></div>
									<div class="group">
										<input type='text' maxlength="25" name='valor' id='valor' value='<?=$planos_publicacao['valor']?>' />
									 </div> 
									
								</div>
								<!-- =============================   fim coluna esquerda   =====================================-->
								<!-- =============================   coluna direita   =====================================-->
								<div class="ends">
								
									<div class="report-head">Anúncios do plano em destaque: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<div style="float:left; width:100%; margin-top: 15px;margin-bottom:11px;border-bottom:1px solid #EBECEE">
											<span class="report-head"> </span> <span class="cpanel-date-hint"></span>
											<input style="width:20px;" type="radio"  <? if($planos_publicacao['ehdestaque'] =="Y"   ){echo "checked='checked'";}?>  value="Y" name="ehdestaque"> Sim  	<img class="tTip" title="Ativando este campo, todos os usuários que pagarem este plano, terão seus anúncios aparecendo na home no bloco 'Anúncios em Destaque' aleatoriamente. Você pode aumentar o número de destaques em Sistema->Informações básicas" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
										
											<input style="width:20px;" type="radio" <? if($planos_publicacao['ehdestaque']=="N" or $planos_publicacao['ehdestaque']=="" ){echo "checked='checked'";}?>  value="N" name="ehdestaque" > Não
											</div>
									</div>
									
								 <div class="report-head">Ativo <span class="cpanel-date-hint"></span></div>
								 	 
										<input style="width:20px;" type="radio" <? if($planos_publicacao['ativo']=="s"){ echo "checked=checked"; }?> value="s" name="ativo"> Sim       
										<input style="width:20px;" type="radio" <? if($planos_publicacao['ativo']=="n"){ echo "checked=checked"; }?> value="n" name="ativo"> Não    
									 
									   <div></div>
									<div class="report-head">Texto do Plano: : <span class="cpanel-date-hint">Se precisar, insira códigos HTML </span></div>
									<div class="group">
										<input type='text'  name='texto' id='texto' value='<?=$planos_publicacao['texto']?>' />
										<img class="tTip" title="Este texto irá aparecer para o usuário no momento da escolha dos planos. Note que este texto deve ser pequeno o suficiente para caber dentro do box de planos." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">
									 </div> 
									 
								 </div>
								<!-- =============================  fim coluna direita  =====================================-->
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
function validador(){
		return true;
}
</script>   