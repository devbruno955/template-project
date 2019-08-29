<?php include template("manage_anunciante_header");?>

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

				<form id="login-user-form" method="post" action="/adminanunciante/parceiro/edit.php?id=<?php echo $partner['id']; ?>" enctype="multipart/form-data" class="validator">

				<input type="hidden" name="id" value="<?php echo $partner['id']; ?>" />

				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 

				<div class="option_box">

					<div class="top-heading group">

						<div class="left_float"><h4>Informações Anunciante # <?=$partner['id']?></h4></div>

							<div class="the-button">

								<input type="hidden" value="remote" id="deliverytype" name="deliverytype">

								<button onclick="jQuery('#login-user-form').submit();" id="run-button" class="input-btn" type="button">

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

								<!-- 

									<div style="clear:both;"class="report-head">Apelido: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="username"  maxlength="152" id="username" class="format_input" value="<?php echo $partner['username'] ?>" />  <img style="cursor:help" class="tTip" title="Login usado pelo parceiro ao entrar na área do parceiro em http://dominio.com.br/lojista." src="<?=$ROOTPATH?>/media/css/i/info.png"> 

									</div> 	

									<div style="clear:both;"class="report-head">Senha: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="password"  maxlength="152" id="password" class="format_input" />  <img style="cursor:help" class="tTip" title="Senha usado pelo parceiro ao entrar na área do parceiro em http://dominio.com.br/lojista. Deixe em branco para não alterar" src="<?=$ROOTPATH?>/media/css/i/info.png"> 

									</div> 	

									-->

									<div style="clear:both;"class="report-head">Tipo de anunciante <span class="cpanel-date-hint">Particular ou Imobiliária</span></div>

									<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">

										<select  name="tipo" id="tipo" onchange="$('#tipo_id').text($('#tipo').find('option').filter(':selected').text())"> 

											<option value="">selecione</option>

											

											<option value="Imobiliaria" <?php if ($partner['tipo'] =="Imobiliaria" ) { echo "selected"; } ?> >Imobiliária</option>

											

											<option value="Particular" <?php if ($partner['tipo'] =="Particular" ) { echo "selected"; } ?> >Particular</option>

											 

										</select> 

										<div name="tipo_id" id="tipo_id" class="cjt-wrapped-select-skin"><?php if (isset($partner['tipo'])) echo $partner['tipo']; else echo "-- selecione --"; ?></div>

										<div class="cjt-wrapped-select-icon"></div>

									</div> 

									

									<div class="report-head">Nome: <span class="cpanel-date-hint"> Seu nome ou de sua Imobiliária</span></div>

									<div class="group">

										<input type="text" id="title" name="title" value="<?php echo  $partner['title'] ; ?>"> &nbsp;<img class="tTip" title="Este nome será mostrado na página de cada anúncio que você publicar." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">

									</div>

									

									<div style="clear:both;"class="report-head">Email: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="contact"  maxlength="152" id="contact" class="format_input" value="<?php echo $partner['contact'] ?>"  />  <img style="cursor:help" class="tTip" title="Email de contato" src="<?=$ROOTPATH?>/media/css/i/info.png"> 

									</div>  

										<div style="clear:both;"class="report-head">Senha: <span class="cpanel-date-hint"></span>A área do anunciante é <a target="_blank" href="<?=$ROOTPATH?>/adminanunciante"><?=$ROOTPATH?>/adminanunciante</a></div>

										<div class="group">

											<input type="text" name="password"  maxlength="152" id="password" class="format_input" />  <img style="cursor:help" class="tTip" title="Esta senha é usada para logar na área do anunciante. Deixe em branco para não alterar" src="<?=$ROOTPATH?>/media/css/i/info.png"> 

										</div>  

										<!-- 

										<div style="float:left; width:100%; ">

											 <div class="report-head">Quantidade Máx. Anúncios <span class="cpanel-date-hint">Período padrão: 30 dias  <img style="cursor:help" class="tTip" title="Se este anunciante não comprou nenhum plano e se você informar 10 anuncios neste campo, então os 10 anúncios terão um período de 30 dias. Regra vale até que ele compre um plano. Ao comprar um plano, o período será do plano." src="<?=$ROOTPATH?>/media/css/i/info.png"></span></div>

											 <?php 

												$max_ilimitado = '';

												$max_cada = ' checked';

												$mx_limitado = '';

												$max_anuncios_tmp = 10;

												if ($partner['max_anuncios'] > 0) {

													$max_limitado = ' checked';

													$max_cada = '';

													$max_anuncios_tmp = $partner['max_anuncios'];

												}

												if ($partner['max_anuncios'] == '0') {

													$max_ilimitado = ' checked';	

													$max_cada = '';

												}

											?> 

											<input style="width:20px;" type="radio" value="0" name="max_anuncios"<?php echo $max_ilimitado; ?>> Ilimitados

											<input style="width:20px;" type="radio" value="-1" name="max_anuncios"<?php echo $max_cada; ?>> Pago por Anúncio

											<input style="width:20px;" type="radio" value="1" name="max_anuncios"<?php echo $max_limitado; ?>> <input type='text' name='qtd_max_anuncios' value='<?php echo $max_anuncios_tmp; ?>' maxlength="3" style='width: 30px;'> anúncios limitados 

										</div> 

										-->

								</div>

								<!-- =============================   fim coluna esquerda   =====================================-->

								<!-- =============================   coluna direita   =====================================-->

								<div class="ends"> 	 			 

								 

									<div class="report-head">Página na Internet: <span class="cpanel-date-hint">com http://</span></div>

									<div class="group">

										<input type="text" id="homepage" name="homepage" value="<?php echo  $partner['homepage'] ; ?>"> &nbsp;<img class="tTip" title="Endereço do seu Site, Canal ou Blog" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png">

									</div> 

									<!--

									<div class="report-head">Telefone: <span class="cpanel-date-hint">Ex:(31) 3333-1234</span></div>

									<div class="group">

										<input type="text" id="phone" name="phone" value="<?php echo  $partner['phone'] ; ?>">   

									</div>

									

									<div class="report-head">Celular: <span class="cpanel-date-hint">Ex:(31) 99432-1234</span></div>

									<div class="group">

										<input type="text" id="entrega_telefone" name="entrega_telefone" value="<?php echo  $partner['entrega_telefone'] ; ?>">   

									</div>-->

									

									<div class="report-head">Celular: <span class="cpanel-date-hint"> Ex:(31) 3333-1234</span></div>

									<div class="group">

										<input type="text" id="mobile" name="mobile" value="<?php echo  $partner['mobile'] ; ?>">

									</div> 		

									

									<div class="report-head">CPF ou CNPJ: <span class="cpanel-date-hint"> </span></div>

									<div class="group">

 

										<input type="text" id="cpf" name="cpf" value="<?php echo  $partner['cpf'] ; ?>">

									</div> 	 

								 </div>

								<!-- =============================  fim coluna direita  =====================================-->

							</div> 

						</div>

					</div>

				</div>

				<!-- ********************************************* ABA Endereço do parceiro --> 

				<div class="option_box">

					<div class="top-heading group">

						<div class="left_float"><h4>Informe seu Endereço PROFISSIONAL ou apenas sua Cidade e Estado: </h4></div>

					</div> 

					<div id="container_box">

						<div id="option_contents" class="option_contents">  

							<div class="form-contain group">

								<!-- =============================   coluna esquerda   =====================================-->

								<div class="starts">

								 

									<div style="clear:both;"class="report-head">Endereço: <span class="cpanel-date-hint">Ex: Avenida Paulista</span></div>

									<div class="group">

										<input type="text" name="address"  id="address" class="format_input"  value="<?php echo $partner['address'] ; ?>"   />  <img style="cursor:help" class="tTip" title="ATENÇÃO: Informe apenas seu Endereço PROFISSIONAL. Este endereço será visível em todos seus anúncios. Deixe em branco se preferir." src="<?=$ROOTPATH?>/media/css/i/info.png"> 

									</div>  	

									

									<div style="clear:both;"class="report-head">Número: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="numero"  id="numero" class="format_input"  value="<?php echo $partner['numero'] ; ?>"    /> 

									</div>  

									 	

									<div style="clear:both;"class="report-head">Complemento: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="chavesms"  id="chavesms" class="format_input"  value="<?php echo $partner['chavesms'] ; ?>"  />  <img style="cursor:help" class="tTip" title="Informe detalhes do seu Endereço Profissional. Ex: Bloco B; Sala 401; Loja 5, etc..." src="<?=$ROOTPATH?>/media/css/i/info.png"> 

									</div> 	

									

									<div style="clear:both;"class="report-head">Bairro: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="bairro"  id="bairro" class="format_input"  value="<?php echo $partner['bairro'] ; ?>"    />     

									</div> 	 

								</div>

								<!-- ============================= // fim coluna esquerda // =====================================-->

								<!-- ============================= // coluna direita // =====================================-->

								<div class="ends"> 

									

									<div style="clear:both;"class="report-head">Cidade: <span class="cpanel-date-hint"></span></div>

									<div class="group">

										<input type="text" name="cidade"  id="cidade" class="format_input"  value="<?php echo $partner['cidade'] ; ?>"   />     

									</div>  

									<div style="clear:both;"class="report-head">CEP: <span class="cpanel-date-hint">Apenas do Endereço Profissional, se não possuir deixe em branco.</span></div>

									<div class="group">

										<input type="text" name="cep" onKeyPress="return SomenteNumero(event);"  maxlength="8" id="cep" class="format_input"  value="<?php echo $partner['cep'] ; ?>"   />     

									</div>  

									<div class="group">

										<div class="report-head">Estado: <span class="cpanel-date-hint"></span></div>

										<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">

											<select  name="estado" id="estado" onchange="$('#select_estado').text($('#estado').find('option').filter(':selected').text())"> 

													<option <? if($partner['estado'] == "AC" ){ echo "selected"; }?> value="AC">AC</option>  

													<option <? if($partner['estado'] == "AL" ){ echo "selected"; }?> value="AL">AL</option>  

													<option <? if($partner['estado'] == "AM" ){ echo "selected"; }?> value="AM">AM</option>  

													<option <? if($partner['estado'] == "AP" ){ echo "selected"; }?> value="AP">AP</option>  

													<option <? if($partner['estado'] == "BA" ){ echo "selected"; }?> value="BA">BA</option>  

													<option <? if($partner['estado'] == "CE" ){ echo "selected"; }?> value="CE">CE</option>  

													<option <? if($partner['estado'] == "DF" ){ echo "selected"; }?> value="DF">DF</option>  

													<option <? if($partner['estado'] == "ES" ){ echo "selected"; }?> value="ES">ES</option>  

													<option <? if($partner['estado'] == "GO" ){ echo "selected"; }?> value="GO">GO</option>  

													<option <? if($partner['estado'] == "MA" ){ echo "selected"; }?> value="MA">MA</option>  

													<option <? if($partner['estado'] == "MG" ){ echo "selected"; }?> value="MG">MG</option>  

													<option <? if($partner['estado'] == "MS" ){ echo "selected"; }?> value="MS">MS</option>  

													<option <? if($partner['estado'] == "MT" ){ echo "selected"; }?> value="MT">MT</option>  

													<option <? if($partner['estado'] == "PA" ){ echo "selected"; }?> value="PA">PA</option>  

													<option <? if($partner['estado'] == "PB" ){ echo "selected"; }?> value="PB">PB</option>  

													<option <? if($partner['estado'] == "PE" ){ echo "selected"; }?> value="PE">PE</option>  

													<option <? if($partner['estado'] == "PI" ){ echo "selected"; }?> value="PI">PI</option>  

													<option <? if($partner['estado'] == "PR" ){ echo "selected"; }?> value="PR">PR</option>  

													<option <? if($partner['estado'] == "RJ" ){ echo "selected"; }?> value="RJ">RJ</option>  

													<option <? if($partner['estado'] == "RN" ){ echo "selected"; }?> value="RN">RN</option>  

													<option <? if($partner['estado'] == "RO" ){ echo "selected"; }?> value="RO">RO</option>  

													<option <? if($partner['estado'] == "RR" ){ echo "selected"; }?> value="RR">RR</option>  

													<option <? if($partner['estado'] == "RS" ){ echo "selected"; }?> value="RS">RS</option>  

													<option <? if($partner['estado'] == "SC" ){ echo "selected"; }?> value="SC">SC</option>  

													<option <? if($partner['estado'] == "SE" ){ echo "selected"; }?> value="SE">SE</option>  

													<option <? if($partner['estado'] == "SP" ){ echo "selected"; }?> value="SP">SP</option>  

													<option <? if($partner['estado'] == "TO" ){ echo "selected"; }?> value="TO">TO</option> 

											</select> 

											<div name="select_estado" id="select_estado" class="cjt-wrapped-select-skin">Informe o estado parceiro</div>

											<div class="cjt-wrapped-select-icon"></div>

										</div>

									</div>

									

									<!--<div class="report-head">Logo: <span class="cpanel-date-hint"> Dimensão exata: 197px de largura por 64px de altura</span></div>

									<div class="group">

										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image"  id="upload_image" class="format_input"  /><?php if($partner['image']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($partner['image']); ?> </span> <?php }?>

									</div>

										

									<div class="report-head">Faixada da Imobiliária: <span class="cpanel-date-hint"> 309px de largura x 251px de altura </span></div>

									<div class="group">

										<input type="file" style="border: 1px solid #C1D0D3; color: #666666; width: 86%;" name="upload_image1"  id="upload_image1" class="format_input"  /><?php if($partner['image1']){?> <br><span style="clear:both;" class="cpanel-date-hint"> <?php echo team_image($partner['image1']); ?> </span> <?php }?>

									</div>-->

									

								 </div>

								</div>

								<!-- ============================= // fim coluna direita // =====================================-->

							</div> 

						</div>

					</div>

					

					 

				     

					 <!-- ********************************************* ABA Descrição do parceiro --> 

					<div class="option_box">

						<div class="top-heading group"> <div class="left_float"><h4>Sua Descrição (opcional)</h4> </div> &nbsp;<img class="tTip" title="DICA: Se você está copiando uma descrição de algum site ou documento, recomendamos primeiro copiar e colar no bloco de notas, logo em seguida, copie do bloco de notas e cole aqui no editor. Isto irá retirar todas as formatações indevidas." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 

						 

						<div id="container_box">

							<div id="option_contents" class="option_contents">  

								<div class="form-contain group"> 

									<div class="text_area">  

									<textarea cols="45" rows="5" name="descricao" style="width:100%" id="descricao" class="format_input" ><?php echo htmlspecialchars($partner['descricao']); ?></textarea>

									</div> 

								</div> 

							</div> 

						</div>

					</div>	 

					

					<!-- ********************************************* ABA Mais informações --> 

					<div class="option_box">

						<div class="top-heading group"> <div class="left_float"><h4>Outras Informações (opcional)</h4> </div> &nbsp;<img class="tTip" title="Informação apenas para controle interno. Não aparece no site" style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> </div> 

						 <div id="container_box">

							<div id="option_contents" class="option_contents">  

								<div class="form-contain group"> 

									<div class="text_area">  

									<textarea cols="45" rows="5" name="other" style="width:100%" id="other" class="format_input" ><?php echo htmlspecialchars($partner['other']); ?></textarea>

									</div> 

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

 

	 	

if( jQuery("#id").val() ==""){

	//$('#buyonce').val('N'); 

	//$('#select_buyonce').text("É possível comprar mais de uma oferta ou promoção")	

 

}

else{ 

	$('#select_estado').text($('#estado').find('option').filter(':selected').text());

	 

}

  

function validador(){

	

	limpacampos(); 

 

  	if( jQuery("#contact").val()==""){



		campoobg("contact");

		alert("Por favor, informe o email de contato.");

		jQuery("#contact").focus();

		return false;

	}	

	if( jQuery("#title").val()==""){



		campoobg("title");

		alert("Por favor, informe o nome do parceiro.");

		jQuery("#title").focus();

		return false;

	}

  

	return true;	

}

 

  jQuery(document).ready(function(){ 

    

   //jQuery("#phone").mask("(99)9999-9999"); 

  // jQuery("#mobile").mask("(99)9999-9999");  

   jQuery("#cep").mask("99999999");

});



</script>   