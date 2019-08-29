<?php include template("manage_header");?>

<?
$option_layout= array(
	""=>"Layout Padrão",
	"multi"=>"Layout Multiofertas"
);

?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="partner">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_system('index'); ?></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content"> 
                <div class="sect">
                    <form method="post">
					<div class="option_box">
						<div class="top-heading group">
							<div class="left_float"><h4>Informações Básicas</h4></div>
								<div class="the-button"> 
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
										<div style="clear:both;"class="report-head">Nome: <span class="cpanel-date-hint">Ex: Ofertas Mania</span></div>
										<div class="group">
											<input type="text" name="system[sitename]" class="format_input" value="<?php echo $INI['system']['sitename']; ?>" /> 
										</div>
										<div style="clear:both;"class="report-head">Subtítulo: <span class="cpanel-date-hint">Ex: Compra Coletiva</span></div>
										<div class="group">
											<input type="text" name="system[sitetitle]" class="format_input" value="<?php echo $INI['system']['sitetitle']; ?>" /> 
										</div>	
										 	
										<div style="clear:both;"class="report-head">Google Analítics: <span class="cpanel-date-hint">Ex: UI-762HFDJDS</span></div>
										<div class="group">
											<input type="text" name="system[googleanalitics]" class="format_input" value="<?php echo $INI['system']['googleanalitics']; ?>" />  &nbsp;<img class="tTip" title="Caso não tenha uma conta, cadastre grátis em http://www.google.com/analytics." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>
										 
									</div>
									<!-- =============================   fim coluna esquerda   =====================================-->
									<!-- =============================   coluna direita   =====================================-->
									<div class="ends"> 	 			 
								 
										  	
										<div style="clear:both;"class="report-head">Palavras chaves: <span class="cpanel-date-hint">Ex: site de ofertas, cupom de desconto</span></div>
										<div class="group">
											<input type="text" name="system[seochaves]" class="format_input" value="<?php echo $INI['system']['seochaves']; ?>" /> 
										</div>		
										<div style="clear:both;"class="report-head">Descrição do seu site: <span class="cpanel-date-hint"></span></div>
										<div class="group">
											<input type="text" name="system[seodescricao]" class="format_input" value="<?php echo $INI['system']['seodescricao']; ?>" />  &nbsp;<img class="tTip" title="Esse é o campo mais importante para os motores de busca. Informe uma breve descrição do seu site. Seja objetivo." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>		
										
										<div style="clear:both;"class="report-head">Quantidade de anúncios destaques na home<span class="cpanel-date-hint">Múltiplos de 5. Somente anúncios destaques</span></div>
										<div class="group">
											<input type="text" name="system[qtde_anuncios_destaque_home]" onKeyPress="return SomenteNumero(event);" class="format_input" value="<?php echo $INI['system']['qtde_anuncios_destaque_home']; ?>" />  &nbsp;<img class="tTip" title="Não irá adiantar colocar 20 neste campo se existem apenas 10 anúncios com o status de destaque. Neste caso, edite o anúncio e altere para destaque. Ordenação aleatória. Deve estar pago ou ser grátis e ativo." style="cursor:help" id="Search_ToolTip" src="<?=$ROOTPATH?>/media/css/i/info.png"> 
										</div>	
										
									 </div>
									<!-- =============================  fim coluna direita  =====================================-->
									
								</div> 
								<div id="container_box">
									<div id="option_contents" class="option_contents">  
									<div class="pcu">
										<span class="cpanel-date-hint"  style="margin-right: 5px; color:#303030;">Texto dos blocos da página principal</span>  
									</div>
										<div class="form-contain group"> 
											<div class="group">  
												<input style="width:40.5%" type="text" name="system[txt1]" class="format_input" value="<?php echo $INI['system']['txt1']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt2]" class="format_input" value="<?php echo $INI['system']['txt2']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt3]" class="format_input" value="<?php echo $INI['system']['txt3']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt4]" class="format_input" value="<?php echo $INI['system']['txt4']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt5]" class="format_input" value="<?php echo $INI['system']['txt5']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt6]" class="format_input" value="<?php echo $INI['system']['txt6']; ?>" />  
												<input style="width:40.5%" type="text" name="system[txt7]" class="format_input" value="<?php echo $INI['system']['txt7']; ?>" />  
											 	<input style="width:40.5%" type="text" name="system[txt8]" class="format_input" value="<?php echo $INI['system']['txt8']; ?>" />  
											 	<input style="width:40.5%" type="text" name="system[txt9]" class="format_input" value="<?php echo $INI['system']['txt9']; ?>" />  
											 	</div> 
										</div> 
									</div> 
								</div>		
								
								<div id="container_box">
									<div id="option_contents" class="option_contents">  
									<div class="pcu">
										<span class="cpanel-date-hint"  style="margin-right: 5px; color:#303030;">Texto da página de pagamento. Códigos HTML são aceitos</span>  <img style="cursor:help" class="tTip" title="Informe neste campo qualquer mensagem ou texto que gostaria, como telefones de contato, dados bancários, etc..." src="<?=$ROOTPATH?>/media/css/i/info.png"> 
									</div>
										<div class="form-contain group"> 
											<div class="text_area">  
											<textarea cols="45" rows="5" name="system[textopagamento]" style="width:100%" class="format_input" ><?php echo htmlspecialchars($INI['system']['textopagamento']); ?></textarea>
											</div> 
										</div> 
									</div> 
								</div>
							</div>
						</div>
					</div> 
					
					<input type="text" style="display:none;" name="system[currency]" class="number" value="R$"/>
					<input type="text"  style="display:none;" name="system[currencyname]" class="number" value="BRL"/> 
					<input type="text" style="display:none;"  name="system[timezone]" class="texto-time-zone" value="<?php echo $INI['system']['timezone']; ?>"/> 
					<input type="text" style="display:none;" name="system[partnerdown]" class="number" value="<?php echo abs(intval($INI['system']['partnerdown'])); ?>"/> 
					<input type="text" style="display:none;" name="system[conduser]" class="number" value="<?php echo abs(intval($INI['system']['conduser'])); ?>"/> 
						 
				
                    </form>
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
 
