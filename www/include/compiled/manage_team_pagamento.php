<?php include template("manage_anunciante_header"); ?>
<?php require("ini.php"); ?>

<?php  
if($idnovo){
	$idanuncio = $idnovo;
}
else{
	$idanuncio = $team['id'];
}
	 
	$idparceiro = $_SESSION['partner_id'];
 
	$partner = Table::Fetch('partner', $idparceiro);
	if(estapago($idanuncio)){?>
		<script>
			alert('Atenção, este anúncio já está pago !');
			location.href = '<?=$INI['system']['wwwprefix']."/adminanunciante";?>'
		</script>
	<?}
 ?> 

<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/tiny_mce.js"></script> 
<script type="text/javascript" src="/media/js/tinymce_pt/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script> 
<script src="/media/js/include_tinymce.js" type="text/javascript"></script> 
<!-- comentar quando for para produção-->
<script type="text/javascript" src="<?=$ROOTPATH?>/include/moip/MoipWidget-v2.js"></script>
<!-- -->

<!--
	Descomentar quando for para produção
<script type="text/javascript" src="http://www.moip.com.br/ws/transparente/MoipWidget.js"></script>
-->

<script type="text/javascript" src="<?=$ROOTPATH?>/include/moip/moip.js"></script>

<style>
	report-head { 
    font-size: 13px;  
}

 </style>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="leader">
	<div id="content" class="clear mainwide">
        <div class="clear box"> 
            <div class="box-content">
                <div class="sect">
				<form id="nform" id="nform"  method="post" action="" enctype="multipart/form-data" class="validator">
				<input type="hidden" id="idpagamento" name="idpagamento" value="<?php echo get_id_pagamento(); ?>" />
				<input type="hidden" id="idplano" name="idplano" value="" /> 
				
				<!-- para o pagamento moip -->
				<input type="hidden" name="www" id="www"  value="<?=$INI['system']['wwwprefix']?>" /> 
				<input type="hidden" name="nomeCliente" id="nomeCliente"  value="<?=$partner['title']?>" /> 
				<input type="hidden" name="telefoneCliente" id="telefoneCliente"  value="<?=$partner['mobile']?>" /> 
				<input type="hidden" name="CPFCliente" id="CPFCliente"  value="<?=$partner['cpf']?>" /> 
				 
				<div id="contentmoip"></div>
				<!-- para o pagamento moip -->
				
				<div class="option_box">
					<div class="top-heading group">
						<div class="left_float"><h4>Planos e Formas de Pagamento </h4></div>
						 	 
					</div> 
				 
					 <div id="container_box">
						<div id="option_contents" class="option_contents">  
							<div class="form-contain group">
								<!-- =============================   coluna esquerda   =====================================-->
								<div class="starts">  
										 <div style="clear:both;"class="report-head">Escolha o seu Plano <span class="cpanel-date-hint"></span></div>
										  
										  <div style="margin:10px 10px 15px 15px;">
											<?
												$sql = "select * from planos_publicacao where ativo = 's' order by id";
												$rs = mysql_query($sql);
												while($dados = mysql_fetch_assoc($rs)){ 
											 ?> 
												<div style="margin-right:6px;padding-top: 3px;margin-top:6px;" class="fundoRadioDestaque">
												
													<input type="radio" precoplano="<?=$dados['valor']?>" onclick="javascript:mostravalor();" value="<?=$dados['id']?>##<?=$dados['valor']?>##<?=$dados['gratis']?>" id="planos_publicacao" name="planos_publicacao"> <span class="CorDestaque"><?=$dados['nome']?></span>
											 
													 <div class="descricaoDestaque">
														<ul class="listaDestaques">
															<?=$dados['texto']?>
														</ul>
													 </div>
													 <p align="left" style="font-size:10px;margin-left:auto;margin-right:auto;text-align:center;"> 
												  R$ <input type="text" readonly="readonly" style="width:50px; font-weight:bold; color:#cc0000; font-size:16px; border:#d8d8d8; background: transparent;" value="<?=$dados['valor']?>" name="inptDestaque1" id="inptDestaque1">
												  </p>
												</div>
											
											<? } ?> 
										</div>
						 
								</div>
							 
								<!-- ============================= // fim coluna esquerda // =====================================-->
								<!-- ============================= // coluna direita // =====================================-->
								<div class="ends"> 
								  
								  <div class="seu_estoque box pagamento">
										
										<div class="botaogratis" style="display:none;">  
											<div style="margin-top:7px;">
												 <button onclick="fecharanuncio();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 203px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Finalizar Anúncio</div></button>
											 </div>
										</div> 
										
									  <div class="termo_uso">  
									  	<div style="clear:both;"class="report-head">Bandeira  do cartão: <span class="cpanel-date-hint"></span></div>
											<div style="float:left; width:100%; margin-bottom:11px;">
											   
												<input style="width:20px;" type="radio" value="Visa" name="bandeira"  > &nbsp;  <img  alt="Visa" title="Visa" src="<?=$ROOTPATH?>/media/css/i/payment-card-icon.png"> 
												<input style="width:20px;" type="radio" value="Mastercard" name="bandeira"  > &nbsp;  <img alt="Mastercard" title="Mastercard" src="<?=$ROOTPATH?>/media/css/i/mastercard-icon.png"> 
												<input style="width:20px;" type="radio" value="Diners" name="bandeira"  > &nbsp;  <img   alt="Diners" title="Diners" src="<?=$ROOTPATH?>/media/css/i/diners-icon.png"> 
												<input style="width:20px;" type="radio" value="AmericanExpress" name="bandeira"  > &nbsp;  <img alt="American Express" title="American Express" src="<?=$ROOTPATH?>/media/css/i/american-express-icon.png"> 
											 </div> 
											
											<div style="clear:both;"class="report-head">Valor do anúncio: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="valoranuncio" readonly="readonly" id="valoranuncio" class="format_input" value="" />  <img style="cursor:help" class="tTip" title=" " src="<?=$ROOTPATH?>/media/css/i/info.png"> 
											</div>	
											
											<div class="report-head">Número de Parcelas: <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<div class="cjt-wrapped-select" id="type-select-cjt-wrapped-select">
												<select name="parcelas" id='parcelas' onchange="$('#select_parcelas').text($('#parcelas').find('option').filter(':selected').text())">
													 
												 </select>
												<div name="select_parcelas" id="select_parcelas" class="cjt-wrapped-select-skin">-- Informe o número de parcelas -- </div>
												<div class="cjt-wrapped-select-icon"></div>
												</div>  
											</div> 
									  
											<div style="clear:both;"class="report-head">Nº do cartão: <span class="cpanel-date-hint">Apenas Números</span></div>
											<div class="group">
												<input type="text" name="numerocartao" onKeyPress="return SomenteNumero(event);" maxlength="16"  id="numerocartao" class="format_input"   />   
											</div>		
											
											<div style="clear:both;"class="report-head">Data de validade: <span class="cpanel-date-hint">Ex: 21/01</span></div>
											<div class="group">
												<input type="text" name="validadecartao"   id="validadecartao" class="format_input"  /> 
											</div>
									 				
													
											<div style="clear:both;"class="report-head">Cód. de segurança <span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="segurancacartao" onKeyPress="return SomenteNumero(event);" maxlength="4"  id="segurancacartao" class="format_input"   />  
											</div>	
											
											<div style="clear:both;"class="report-head">Nome impresso no cartão<span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="nomecartao"   id="nomecartao" class="format_input"   />   
											</div>
											
											<div style="clear:both;"class="report-head">Data de nascimento<span class="cpanel-date-hint"></span></div>
											<div class="group">
												<input type="text" name="data_nascimento"  id="data_nascimento" class="format_input"   />    
											</div>
										
											<div style="margin-top:7px;">
												  
												<button onclick="realizarpagamento();" id="run-button" class="input-btn" type="button"><div name="spinner-top" id="spinner-top" style="width: 203px; display: block;"><img name="imgrec" id="imgrec" src="<?=$ROOTPATH?>/media/css/i/lendo.gif" style="display: none;"></div><div id="spinner-text"  >Realizar Pagamento</div></button>
												
											</div>
										</div>
										 
										 
									</div> 
								  
								</div>
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
  
var www = jQuery("#www").val();
var team_id = '<?php echo $idanuncio; ?>';
var gratis="";
function mostravalor(){
	 plano  = $("input[name='planos_publicacao']:checked").val();
 
	 planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2];
	     
	$("#valoranuncio").val(valor);
	$("#idplano").val(idplano);
	
	if(gratis=="s"){
		 
		 $('.termo_uso').fadeOut('slow', function() {
		   $('.termo_uso').hide()
		 }); 
		 
		 $('.botaogratis').fadeIn('slow', function() {
		 $('.botaogratis').show()
		 });
		 
	}
	else{
		
		$('.botaogratis').fadeOut('slow', function() {
		   $('.botaogratis').hide()
		 }); 
		 
		 $('.termo_uso').fadeIn('slow', function() {
		 $('.termo_uso').show()
		 });
		 
		buscaParcelas(valor);
	}
}

function buscaParcelas(valor){
 
		var mySelect = document.getElementById('parcelas');
		mySelect.options.length = 0;

		 $('#parcelas').append($('<option></option>').val(1).html(1)); 
		if(valor/2 >= 5) { $('#parcelas').append($('<option></option>').val(2).html(2));}
		if(valor/3 >= 5) { $('#parcelas').append($('<option></option>').val(3).html(3));}
		if(valor/4 >= 5) { $('#parcelas').append($('<option></option>').val(4).html(4));}
		if(valor/5 >= 5) { $('#parcelas').append($('<option></option>').val(5).html(5));}
		if(valor/6 >= 5) { $('#parcelas').append($('<option></option>').val(6).html(6));}
		if(valor/7 >= 5) { $('#parcelas').append($('<option></option>').val(7).html(7));}
		if(valor/8 >= 5) { $('#parcelas').append($('<option></option>').val(8).html(8));}
		if(valor/9 >= 5) { $('#parcelas').append($('<option></option>').val(9).html(9));}
		if(valor/10 >= 5) { $('#parcelas').append($('<option></option>').val(10).html(10));}
		if(valor/11 >= 5) { $('#parcelas').append($('<option></option>').val(11).html(11));}
		if(valor/12 >= 5) { $('#parcelas').append($('<option></option>').val(12).html(12));} 
		
		$('#select_parcelas').text($('#parcelas').find('option').filter(':selected').text());

/*
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: www+"/include/funcoes.php?acao=buscaParcelas&valor="+valor,
			   data: "",
			   success: function(opcoes){  
				   jQuery("#opcoesparcelas").html(opcoes );
				}
		});
*/
}
   
$("#validadecartao").mask("99/99"); 
$("#data_nascimento").mask("99/99/9999"); 
 
 
function realizarpagamento(){

	if(validador()){
		$("#spinner-text").css("opacity", "0.2");
		$("#spinner-text2").css("opacity", "0.2");
		 
		idpagamento =  jQuery('#idpagamento').val()
		  
		processaPagamento('<?php echo $idparceiro; ?>',idpagamento, '');
	}
}

function fecharanuncio(){
	
	plano  = $("input[name='planos_publicacao']:checked").val();
  
	planoarr = plano.split('##');
	 
	 idplano = planoarr[0];
	 valor = planoarr[1];
	 gratis = planoarr[2];
	 
		if(gratis=="s"){
			idpagamento =  jQuery('#idpagamento').val();
			finalizaanuncio('<?php echo $idparceiro; ?>',idpagamento,gratis);
		}
		else{
			alert('Este anúncio não é grátis. Por favor, escolha um plano grátis.');
		}
	 
}

function campoobg(campo){
 
	$("#"+campo).css("background", "#F9DAB7");
 
}
 
function limpacampos(){		 
	$("input[type=text]").each(function(){ 
		$("#"+this.id).css("background", "#fff");
	}); 
	$("#upload_image").css("background", "#fff");
	
}

function validador(){
	 
		
	limpacampos();
	
		bandeira 		= jQuery('input[name=bandeira]:radio:checked').val();
        parcelas   		= jQuery('#parcelas').val();
        numero   		= jQuery('#numerocartao').val();
        validade 		= jQuery('#validadecartao').val();
        cvv      		= jQuery('#segurancacartao').val();
        nome     		= jQuery('#nomecartao').val();
        dataNascimento 	= jQuery('input[name=data_nascimento]').val();
        parcelas 		= jQuery('select[name=parcelas]').val();
		Valor		 	=  jQuery('#valoranuncio').val();
		
		if(Valor==""){
			campoobg("valoranuncio");
			alert("Por favor, escolha um plano para o anúncio");
			jQuery("#valoranuncio").focus();
			return false;
		}
		
		if(!bandeira){
			campoobg("bandeira");
			alert("Por favor, informe a bandeira do cartão");
			jQuery("#bandeira").focus();
			return false;
		}
		
		if(parcelas==""){
			campoobg("parcelas");
			alert("Por favor, informe o número de parcelas");
			jQuery("#parcelas").focus();
			return false;
		}	
		
		if(numero==""){
			campoobg("numerocartao");
			alert("Por favor, informe o número do cartão");
			jQuery("#numerocartao").focus();
			return false;
		}
		
		
		if (numero.length < 13)
		{
			campoobg("numerocartao");
			alert("Número de cartão inválido.");
			jQuery("#numerocartao").focus();
			return false;
		}
		if (numero.length > 19)
		{
			campoobg("numerocartao");
			alert("Número de cartão inválido.");
			jQuery("#numerocartao").focus();
			return false;
		}
		
		if(validade==""){
			campoobg("validadecartao");
			alert("Por favor, informe a data de validade do cartão");
			jQuery("#validadecartao").focus();
			return false;
		}	
  
		if(cvv==""){
			campoobg("segurancacartao");
			alert("Por favor, informe o código de segurança do cartão");
			jQuery("#segurancacartao").focus();
			return false;
		}
		
			
		if(bandeira=="Visa" || bandeira=="Mastercard" || bandeira=="Diners"){
			if (cvv.length != 3)
			{
				campoobg("segurancacartao");
				alert("Código de segurança para essa bandeira é de 3 números.");
				jQuery("#segurancacartao").focus();
				return false;
			}
		}	
		
		if(bandeira=="AmericanExpress"){
			if (cvv.length != 4)
			{
				campoobg("segurancacartao");
				alert("Código de segurança para essa bandeira é de 4 números.");
				jQuery("#segurancacartao").focus();
				return false;
			}
		}
		
		if(nome==""){
			campoobg("nomecartao");
			alert("Por favor, informe o nome impresso no cartão");
			jQuery("#nomecartao").focus();
			return false;
		}	
		
		if(dataNascimento==""){
			campoobg("data_nascimento");
			alert("Por favor, informe a data de nascimento do titular do cartão");
			jQuery("#data_nascimento").focus();
			return false;
		}
		 
	return true;	
}

	function isNumberKey(Key)
	{
       var charCode = (Key.which) ? Key.which : event.keyCode
       if (charCode > 47 && charCode < 58 || charCode == 8)
          return true;
       return false;
    }


	function isCardDate(valor)
	{
		ano = new Date();
		hoje = ano.getFullYear();
		h = String(hoje).substr(2,2);
		m = Number(valor.substr(0,2));
		a = Number(valor.substr(3,2));
		if((isNaN(m))||(isNaN(a))||(m<1)||(m>12)||(a<Number(h)-1)||(a>Number(h)+10))
		    return false;
        else
		    return true;
	}
 

</script>   