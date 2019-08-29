<?php include template("manage_header");?>
 
<div id="bdw" class="bdw">

<div id="bd" class="cf">

<div id="partner">

	<div id="content" class="clear mainwide">

        <div class="clear box">
  
            <div class="box-content">

			<div class="option_box">
				<div class="top-heading group"> <div class="left_float"><h4>Redes Sociais</h4></div> </div> 
						 

					<div class="sect">

						<form method="post"> 

						<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Blocos de Compartilhamento  </h4></div>
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
										<div style="clear:both;"class="report-head">Twitter: <span class="cpanel-date-hint">Incluir endereço com http://</span></div>
										<div class="group">
											<input type="text" name="other[twitter]"  id="other[twitter]" class="format_input" value="<?php echo $INI['other']['twitter']; ?>" />  <img style="cursor:help" class="tTip" title="Nome do seu perfil no Twitter " src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
											<div class="report-head">Facebook: <span class="cpanel-date-hint">Incluir endereço com http://</span></div>
										<div class="group">
											<input type="text" name="other[facebook]"  id="other[facebook]" class="format_input" value="<?php echo $INI['other']['facebook']; ?>" />  <img style="cursor:help" class="tTip" title="Endereço do seu perfil no Facebook " src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										<div class="report-head">Google+: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="other[googleplus]"  id="other[googleplus]" class="format_input" value="<?php echo $INI['other']['googleplus']; ?>" />  <img style="cursor:help" class="tTip" title="Endereço do seu perfil no Orkut " src="<?= $ROOTPATH ?>/media/css/i/info.png"> 
										</div>  
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">
										 <div class="report-head">Instagram: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="other[instagram]"  id="other[instagram]" class="format_input" value="<?php echo $INI['other']['instagram']; ?>" />  <img style="cursor:help" class="tTip" title="Endereço do seu perfil no Orkut " src="<?= $ROOTPATH ?>/media/css/i/info.png"> 
										</div> 
										 <div class="report-head">Youtube: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="other[youtube]"  id="other[youtube]" class="format_input" value="<?php echo $INI['other']['youtube']; ?>" />  <img style="cursor:help" class="tTip" title="Endereço do seu perfil no Orkut " src="<?= $ROOTPATH ?>/media/css/i/info.png"> 
										</div> 
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div>

						

						

					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Botão Curtir</h4></div>
						</div> 
						<div id="container_box">
							<div id="option_contents" class="option_contents">  
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts">								
										<div id="c_vendas">	
											<div style="clear:both;"class="report-head">Bloco Facebook: <span class="cpanel-date-hint"><a href="http://www.facebook.com/pages/create.php" target="_blank">crie uma pagina agora</a></span></div>
											<div class="group">
												<input type="text" name="other[box-facebook]"  id="other[box-facebook]" class="format_input" value="<?php echo $INI['other']['box-facebook']; ?>" />  <img style="cursor:help" class="tTip" title="Incluir o endereço da sua pagina no Facebook, ex.: <b>http://www.facebook.com/pages/Tkstore-Desenvolvimento-de-loja-virtual/197184830309643</b>

	Caso não tenha uma pagina, crie uma pagina agora" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
											</div> 
										</div>					 
									</div>
									<!-- ============================= // fim coluna esquerda // =====================================-->
									<!-- ============================= // coluna direita // =====================================-->
									<div class="ends"> 
										<!--<div style="clear:both;"class="report-head">Botão Recomendar: <span class="cpanel-date-hint">Ex: http://www.sistemacomprascoletivas.com.br</span></div>
											<div class="group">
												<input type="text" name="other[botao-recomendar]"  id="other[botao-recomendar]" class="format_input" value="<?php echo $INI['other']['botao-recomendar']; ?>" />  <img style="cursor:help" class="tTip" title="Endereço do site para recomendar" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
											</div>-->
									 </div>
								</div>
								<!-- ============================= // fim coluna direita // =====================================-->
							</div> 
						</div>
					</div>
					


					<div class="option_box">

						<div class="top-heading group">

							<div class="left_float"><h4>Comentários do Facebook</h4></div>

						</div> 

						<div id="container_box">

							<div id="option_contents" class="option_contents"> 
								<div class="form-contain group">
									<!-- =============================   coluna esquerda   =====================================-->
									<div class="starts">
										<div style="clear:both;"class="report-head">Admin_id: <span class="cpanel-date-hint">É necessário criar uma app para usar os comentários do facebook, <a target="_blank" href="http://developers.facebook.com/setup/">clique aqui</a></span></div>
										<div class="group">
											<input type="text" name="other[admin_id]"  id="other[admin_id]" class="format_input" value="<?php echo $INI['other']['admin_id']; ?>" />  <img style="cursor:help" class="tTip" title="Algo como: <b>127097849026839</b> (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar os comentários." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>  
										<div style="clear:both;"class="report-head"><span class="cpanel-date-hint">Quando finalizar o cadastro, veja a imagem para identificar o seu app_id e admin_id <a target="_blank" href="/media/css/i/ajuda_app.jpg"> clique aqui</a>.</span></div>
										<div style="clear:both;"class="report-head"><span class="cpanel-date-hint"> <a target="_blank" href="/configuracao_plugin_facebook.docx"> Tutorial completo de configuração</a></span></div>
									 </div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									 <div class="ends">
										<div class="report-head">App_id: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="other[app_id]"  id="other[app_id]" class="format_input" value="<?php echo $INI['other']['app_id']; ?>" />  <img style="cursor:help" class="tTip" title="Algo como: <b>356647589346334</b> (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar os comentários." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>  
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div>
  
						<div class="option_box" style="display:none;">

						<div class="top-heading group">

							<div class="left_float"><h4>Login e Permissões de Escrita no Mural do Facebook</h4></div>

						</div> 

						<div id="container_box">

							<div id="option_contents" class="option_contents"> 

								<div class="form-contain group">

									<!-- =============================   coluna esquerda   =====================================-->

									<div class="starts">
										<div style="clear:both;"class="report-head">Secret: <span class="cpanel-date-hint">É necessário criar uma outra app para usar os comentários do facebook, <a target="_blank" href="http://developers.facebook.com/setup/">clique aqui</a></span></div>
										<div class="group">
											<input type="text" name="other[admin_id_login]"  id="other[admin_id_login]" class="format_input" value="<?php echo $INI['other']['admin_id_login']; ?>" />  <img style="cursor:help" class="tTip" title="Algo como: <b>127097849026839</b> (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar o login com facebook. Obs. Deve ser uma app para os comentários e outra app para o longin do facebook" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
										<div style="clear:both;"class="report-head"><span class="cpanel-date-hint">Quando finalizar o cadastro, veja a imagem para identificar o seu app_id e admin_id <a target="_blank" href="/media/css/i/ajuda_app.jpg"> clique aqui</a>.</span></div>
										<div style="clear:both;"class="report-head"><span class="cpanel-date-hint"> <a target="_blank" href="/configuracao_plugin_facebook.docx"> Tutorial completo de configuração</a></span></div>
									
									 </div>

									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends">
										<div class="report-head">App_id: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="other[app_id_login]"  id="other[app_id_login]" class="format_input" value="<?php echo $INI['other']['app_id_login']; ?>" />  <img style="cursor:help" class="tTip" title="Diferente do App_id dos comentários. Algo como: <b>356647589346334</b> (Atenção: Não é o seu profile e nem sua página do facebook). Deixe em branco para não usar o login com facebook." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div> 
									  </div>
									<!-- =============================  fim coluna direita  =====================================-->
								</div> 
							</div>
						</div>
					</div>

						<input type="hidden" size="30" name="pg" value="<?php echo $_REQUEST['pg'] ?>"/>

						<!-- cores --> 
						
						<input type="hidden" size="30" name="other[colormenusuperior]" value="<?=$INI['other']['colormenusuperior']; ?>"/>
               			<input type="hidden" size="30" name="other[colormenusuperiorhover]" value="<?=$INI['other']['colormenusuperiorhover']; ?>"/>
               			<input type="hidden" size="30" name="other[colormenusuperiorborder]" value="<?=$INI['other']['colormenusuperiorborder']; ?>"/>
               			<input type="hidden" size="30" name="other[background_titulo_destaque]" value="<?=$INI['other']['background_titulo_destaque']; ?>"/> 
               			<input type="hidden" size="30" name="other[botaodetalhe]" value="<?=$INI['other']['botaodetalhe']; ?>"/> 
               			<input type="hidden" size="30" name="other[botaodetalhehover]" value="<?=$INI['other']['botaodetalhehover']; ?>"/> 
               			<input type="hidden" size="30" name="other[colortitulocidade]" value="<?=$INI['other']['colortitulocidade']; ?>"/>
               			<input type="hidden" size="30" name="other[coloremailofertas]" value="<?=$INI['other']['coloremailofertas']; ?>"/>
               			<input type="hidden" size="30" name="other[colorfundocidades]" value="<?=$INI['other']['colorfundocidades']; ?>"/>
               			<input type="hidden" size="30" name="other[colortextoh3]" value="<?=$INI['other']['colortextoh3']; ?>"/>
               			<input type="hidden" size="30" name="other[color_destaque_titulo]" value="<?=$INI['other']['color_destaque_titulo']; ?>"/>
               			<input type="hidden" size="30" name="other[color_destaque_titulo_txt]" value="<?=$INI['other']['color_destaque_titulo_txt']; ?>"/>
               			<input type="hidden" size="30" name="other[color_destaque_botao]" value="<?=$INI['other']['color_destaque_botao']; ?>"/>
               			<input type="hidden" size="30" name="other[color_detalhe_oferta_home]" value="<?=$INI['other']['color_detalhe_oferta_home']; ?>"/>
               			<input type="hidden" size="30" name="other[color_detalhe_oferta_home_txt]" value="<?=$INI['other']['color_detalhe_oferta_home_txt']; ?>"/>
               			<input type="hidden" size="30" name="other[oferta_valor]" value="<?=$INI['other']['oferta_valor']; ?>"/>
               			<input type="hidden" size="30" name="other[color_qtd_vendido]" value="<?=$INI['other']['color_qtd_vendido']; ?>"/>
               			<input type="hidden" size="30" name="other[color_contadornovo]" value="<?=$INI['other']['color_contadornovo']; ?>"/>
               			<input type="hidden" size="30" name="other[color_fundo_meio_rodape]" value="<?=$INI['other']['color_fundo_meio_rodape']; ?>"/> 
               			<input type="hidden" size="30" name="other[cor_letra_topo]" value="<?=$INI['other']['cor_letra_topo']; ?>"/> 
               			<input type="hidden" size="30" name="other[rodapedetalhe]" value="<?=$INI['other']['rodapedetalhe']; ?>"/>  
               			<input type="hidden" size="30" name="other[color_fundo_laterais_rodape]" value="<?=$INI['other']['color_fundo_laterais_rodape']; ?>"/>  
               			<input type="hidden" size="30" name="other[background_titulos]" value="<?=$INI['other']['background_titulos']; ?>"/>  
               			<input type="hidden" size="30" name="other[background_oferta_nacional]" value="<?=$INI['other']['background_oferta_nacional']; ?>"/>  
               			<input type="hidden" size="30" name="other[fundooferta]" value="<?=$INI['other']['fundooferta']; ?>"/>  
               			<input type="hidden" size="30" name="other[topodetalhe]" value="<?=$INI['other']['topodetalhe']; ?>"/> 
						
						

						</form>

					</div>

				</div>
            </div>

            <div class="box-bottom"></div>

        </div>

	</div>



<div id="sidebar">

</div>



</div>

</div> <!-- bd end -->

</div> <!-- bdw end -->



 <script>

	function validador(){

		return true;

	}

</script>

<?php 



?>

