<div style="display:none;" class="tips"><?=__FILE__?></div>

<?php   
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/app.php');
?>
 
<div style='display:none'>

	<!-- DIV PARA LOGAR -->
	<div id='inline_logar' style='background:#fff; padding:10px; width:490px !important ;height:120px;'>
			<form method="POST" id="formauth" style="">
				<div style="float: left; margin-right:5px;">
					 <div style="margin-bottom: 5px;"><span style="color:#303030;font-size:12px;">Email</span></div>
					 <input type="text" style="width:246px;font-size:12px;color:#303030;height:25px;" value="Insira seu e-mail" onblur="if(this.value=='') this.value='Insira seu e-mail'" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" id="email" name="email">
				</div>
				<div style="float: left;margin-right:5px;">
					<div style="margin-bottom: 5px;"><span style="color:#303030;font-size:12px;">Senha</span></div>
					<input type="password" style="width:190px;font-size:12px;color:#303030;height:25px;"  id="password" name="password">
				</div>
				<div style="float: left; padding-top: 20px;">
					<a class="link-1" style="" href="javascript:entrar();"><em><b>Entrar</b></em></a>
				</div>
			 
			   <div id="loading" style="clear: both;color:#303030;font-size:12px;"> </div>



			    <div style="margin-top: 10px; float: left; clear: both; ">
					<a href="#" style="color:#000 !important;font-size:12px;"  class="tk_esquecisenha cboxElement"> Esqueci minha senha </a> | <a href="#" style="color:#000 !important;font-size:12px;"  class="tk_cadastrar cboxElement"> Quero me cadastrar </a>
			    </div>
			</form> 
			 
	</div>

	<!-- DIV PARA CADASTRAR -->
	<div id='inline_cadastrar' style='padding:10px; background:#fff;height:390px; width:870px !important'>
	
	  <img style="position: absolute; max-width: 270px; right: 0px; margin-top: 135px;" src="<?=$ROOTPATH?>/skin/padrao/images/imagemcadastro.jpg" title="Receba por email nossas ofertas de compra coletiva de até 90% de desconto" alt="Receba por email nossas ofertas de compra coletiva de até 90% de desconto"> 
		<div style="float:left;width:300px;">
		<h2 style="font-size:25px;">Crie seu cadastro</h2>
		</div>
	 
			   
		 <form style="clear: both;" id="formcad" name="formcad"  METHOD="POST" action="autenticacao/login.php">
		   
			<div id="loading" style="display:none;clear: both;color:#303030;font-size:12px;"><img style="margin-left:100px;float: left;" src="<?=$PATHSKIN?>/images/ajax-loader2.gif"> <div style="margin-left:20px;" id="txt"></div> </div>
			 
			<div style="float: left;clear: both;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Nome Completo*</span></div>
					 <input style="width:316px;font-size:12px;color:#303030;margin-right:10px;" name="username" type="text"  id="username" onFocus="if(this.value =='Insira seu nome' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu nome'" value="Insira seu nome"  />
			</div>
			<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Email*</span></div>
					<input style="width:238px;font-size:12px;color:#303030;" name="emailcadastro"  type="text"  id="emailcadastro" onFocus="if(this.value =='Insira seu e-mail' ) this.value=''" onBlur="if(this.value=='') this.value='Insira seu e-mail'" value="Insira seu e-mail"  />
			</div> 
			<div>
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">CPF / CNPJ*</span></div>
					 <input  onkeypress='mascaraMutuario(this,cpfCnpj)' style="width:583px;font-size:12px;color:#303030;"  name="cpf" type="text"   id="cpf" />
			 </div>
			 <!-- =============================
			
			<div style="float: left;clear: both;">
					 <div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Diga onde nos conheceu</span></div>
					 <input style="width:316px;font-size:12px;color:#303030;margin-right:10px;"  name="local"   type="text" id="local"    />
			 </div>
		
		    <div>
			<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Eu sou</span></div>
			    <input style="width:20px;" type="radio"  checked value="Particular" id="tipoanunciante"  name="tipoanunciante" > <span style="font-family:verdana;color:#303030;font-size:12px;">Propriet&aacute;rio  </span>
				<input style="width:20px;" type="radio"  value="Imobiliaria" id="tipoanunciante"  name="tipoanunciante"> <span style="font-family:verdana;color:#303030;font-size:12px;">Corretor de Im&oacute;veis     </span>
			   
			</div>
			=====================================-->
			
			<div style="float: left;clear: both;" >
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">CEP (apenas n&uacute;meros)*</span></div>
				 <input style="width:316px;font-size:12px;color:#303030;margin-right:10px;"  onKeyPress="return SomenteNumero(event);" name="cep"  onblur="getEndereco();" type="text" id="cep"  class="cep_cadastro"  />
			 </div>


<!-- =============================


			<div style="float: left;clear: both;" >
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Endere&ccedil;o PROFISSIONAL (ou informe apenas o seu Estado e Cidade)</span></div>
				 <input style="font-size:12px;color:#303030;"  name="endereco"   type="text" id="endereco"    />
			</div>
			
			 <div style="float: left;clear: both;" >
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">N&uacute;mero</span></div>
				 <input style="width:56px;font-size:12px;color:#303030;margin-right:10px;"  name="numero"   type="text" id="numero"    />
			 </div> 
			 <div style="float: left;" >
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Complemento</span></div>
				 <input style="width:231px;font-size:12px;color:#303030;margin-right:10px;"  name="complemento"   type="text" id="complemento"    />
			 </div>
			<div style="float: left;width: 450px;">
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Bairro</span></div>
				 <input style="width:238px;font-size:12px;color:#303030;"  name="bairro"   type="text" id="bairro"    />
			</div>
			

=====================================-->


			<div style="float: left;" >
				<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Estado*</span></div>
				 
			
				 <select  name="estado" id="estado" style="height: 30px;border: 1px solid #eee;width: 200px;-moz-appearance: menulist;">
					<option value=""></option>
					<option value="AC">Acre</option>
					<option value="AL">Alagoas</option>
					<option value="AP">Amap&aacute;</option>
					<option value="AM">Amazonas</option>
					<option value="BA">Bahia</option>
					<option value="CE">Cear&aacute;</option>
					<option value="DF">Distrito Federal</option>
					<option value="ES">Esp&iacute;rito Santo</option>
					<option value="GO">Goi&aacute;s</option>
					<option value="MA">Maranh&atilde;o</option>
					<option value="MT">Mato Grosso</option>
					<option value="MS">Mato Grosso do Sul</option>
					<option value="MG">Minas Gerais</option>
					<option value="PA">Par&aacute;</option>
					<option value="PB">Para&iacute;ba</option>
					<option value="PR">Paran&aacute;</option>
					<option value="PE">Pernambuco</option>
					<option value="PI">Piau&iacute;</option>
					<option value="RJ">Rio de Janeiro</option>
					<option value="RN">Rio Grande do Norte</option>
					<option value="RS">Rio Grande do Sul</option>
					<option value="RO">Rond&ocirc;nia</option>
					<option value="RR">Roraima</option>
					<option value="SC">Santa Catarina</option>
					<option value="SP">S&atilde;o Paulo</option>
					<option value="SE">Sergipe</option>
					<option value="TO">Tocantins</option>
				</select>
			</div> 





			<div style="float: left;width: 90%;">
			<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Cidade*</span></div>
				 <input style="width:308px;font-size:12px;color:#303030;margin-right:10px;"  name="cidadeusuario"   type="text" id="cidadeusuario"    />
			 </div>



			 <div style="float: left;width: 90%;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Celular/WhatsApp* Ex: (11) 98765-4321</span></div>
					 <input onkeypress='mascaraTelefone(this,telDig)' style="width:216px;font-size:12px;color:#303030;margin-right:10px;" name="telefone" type="text" id="telefone" class="telefone" maxlength="14" />
			 </div>
			  <!--<div style="float: left;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Whatsapp Ex: (31) 33333-1234</span></div>
					 <input onkeypress='mascaraTelefone(this,telDig)' style="width:216px;font-size:12px;color:#303030;margin-right:10px;" name="whatsapp" type="text" id="whatsapp" class="whatsapp" maxlength="14" />
			 </div>-->
			 <div style="float: left;">
					<div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Senha*</span></div>
					 <input style="width:153px;font-size:12px;color:#303030;margin-right:10px;" name="passwordcad" type="password" id="passwordcad"  />
			 </div>
			<div style="float: left;">
				  <div style="margin-bottom: 5px;"><span style="font-family:verdana;color:#303030;font-size:12px;">Redigite a senha*</span></div>
				  <input style="width:155px;font-size:12px;color:#303030;" name="password2"  type="password"  id="password2"   />
			</div>





			<div style="float: left;clear: both;">
				  <div > 



					<input style="width:20px;" type="checkbox" class="cinput" id="receberofertas" checked name="receberofertas"/> <span style="font-family:verdana;color:#303030;font-size:12px;"> Cadastrar na Newsletter</span>
				  </div> 
			</div>
			
			   
		
			<div style="padding-top: 20px;float: left;margin-right:23px; ">
				<a class="link-1" style="" href="javascript:cadastropop();"><em><b>Cadastrar</b></em></a>
			</div>
			
			<!--<div style="margin-top: 20px;width:218px;margin-left:0px;float: left;">
				<a href="#" style="font-family:verdana;color:#000 !important;font-size:12px;" class="tk_logar cboxElement">Já sou cadastrado, quero logar</a>
			</div>-->
			<? if($INI['option']['termosobrigatorio']=="Y"){ ?>
				<div style="color: #303030; font-size: 12px; float: right; width: 399px; margin-top: 20px; margin-right: 214px;">
					<input style="width:10px;" type="checkbox" value="1" name="aceitardb2" id="aceitardb2"> Aceito as Pol&iacute;ticas de Privacidade e Cookies. <a style="color:#000 !important;" target="_blank" href="<?=$ROOTPATH?>/page/about_privacy/Politicas%20de%20Privacidade">Clique Aqui para Ler.</a>
				</div>
			<? } ?> 
	  </div>
	 
	  
	<!-- DIV PARA ESQUECI SENHA -->
	 
	 <div id='inline_esquecisenha' style='background:#fff; height:110px; padding:10px; width:345px !important'>
		<div>
			<form method="POST" id="formauth" style="width: 345px !important">
				<div style="float: left; width: 235px;">
						<div style="margin-bottom: 5px;"><span style="color:#303030;font-size:12px;">E-mail</span></div>
						<input type="text" value="Insira seu e-mail" onblur="if(this.value=='') this.value='Insira seu e-mail'" onfocus="if(this.value =='Insira seu e-mail' ) this.value=''" id="email" 	style="width:200px;font-size:12px;color:#303030;margin-right:10px;"	name="email">
				 </div>
				<div style="float: left; padding-top: 20px; width: 88px;">
					<a class="link-1" style="" href="javascript:enviar();"><em><b>Enviar</b></em></a>
				</div>
				<div id="loading" style="clear: both;color:#303030;font-size:12px;"> </div> 
				 
				<div style="margin-top: 10px; float: left; clear: both; width: 70px;,">
					<a href="#" style="color:#303030;font-size:12px;" class="tk_logar cboxElement">voltar</a>
				</div>
			</form>
		</div>
   </div> 
  
</div>

	
<script language="javascript">
// post logar
function entrar(){
		 
	if(J("#email").val() == "" ||  J("#email").val() == "Insira seu e-mail"){ 
		alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("email").focus();
		return;
	}
	 
	if(J("#password").val() == ""){ 
		alert("Por favor, informe sua senha.");
		jQuery("#loading").html("");
		document.getElementById("password").focus();
		return;
	}
 
  // jQuery("#loading").html("<img style=margin-left:80px; src=<?=$PATHSKIN?>/images/ajax-loader2.gif> <span style=margin-top:10px;color:blue;font-size:12px;> Estamos validando seus dados...</span>");
	 	
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=logintoupup&email="+J("#email").val()+"&password="+J("#password").val(),
		   success: function(user_id){
			
		   idusuario = jQuery.trim(user_id);
		   if(jQuery.trim(idusuario)=="00"){
		     
				 alert(utf8_decode("Não foi possível fazer o seu login. Por favor, verifique os seus dados."));
				 jQuery("#loading").html("");
			 } 
		   else { 
			   
			  if(J("#utm").val()=="1"){
				  if(J("#tipooferta").val()=="participe"){
					participar(1);
				  }else{
					 enviapag() ;
				  }
			 }
			  else{
                 //jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Login realizada com sucesso."});
				 location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php?<?php echo $_SERVER["QUERY_STRING"] ?>';
			  }	
		   }		  
		}
	});
}

//post esqueci senha
function enviar(){
	  
	if(J("#email").val() == "" ||  J("#email").val() == "Insira seu e-mail" ){
	    alert("Por favor, informe seu email.");
		jQuery("#loading").html("");
		document.getElementById("email").focus();
		return;
	}
	 
  //jQuery("#loading").html("<img style=margin-left:50px; src=<?=$PATHSKIN?>/images/ajax-loader2.gif> Estamos validando seu email...");
  
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/repass.php",
		   data: "email="+J("#email").val(),
		   success: function(retorno){
		   
		   if(jQuery.trim(retorno)==""){  
				alert("Sua senha foi enviada com sucesso para o seu email")
				//jQuery("#loading").html("Sua senha foi enviada com sucesso para o seu email");
				//location.href  = '<?php echo $INI['system']['wwwprefix']?>';
			 } 
		   else {
			 
			  	alert(retorno);
				jQuery("#loading").html("");
		   }
		}
	});
}
 
 //cadastro
 var idusuario;
  var tipoanunciante;
 function cadastropop(){
	 
   	var cpf="";
    var cnpj="";
    var errocnpj	=	true;
    var errocpf		=	true;

	<? if($INI['option']['termosobrigatorio']=="Y"){ ?>
		var aceitar='';
	  
		aceitar = jQuery("input[type=checkbox][name=aceitardb2]:checked").val()
	  
		if( aceitar != "on" & aceitar != "1") {
				alert(utf8_decode("Você precisa aceitar a política de privacidade para realizar o seu cadastro"));
				return;
		}
	<? } ?>
	
    jQuery("#loading").hide();
	 
	if(jQuery("#username").val() == "Insira seu nome"){
	    alert("Por favor, informe seu nome.");
		jQuery("#loading").hide();
		document.getElementById("username").focus();
		return;
	}
		
	if(jQuery("#emailcadastro").val() == "Insira seu e-mail"){
	    alert("Por favor, informe seu email.");
		jQuery("#loading").hide();
		document.getElementById("emailcadastro").focus();
		return;
	}
 
	 if(jQuery("#cpf").val() == "Insira seu cpf"){
		alert("Informe o seu cpf.")
		document.getElementById("cpf").focus();
		return;
	}	
	
	cpf = jQuery("#cpf").val();

	cpf_valida =  cpf.replace("-","");
	cpf_valida =  cpf_valida.replace(".","");
	cpf_valida =  cpf_valida.replace(".","");
 
	if( !validaCPF(cpf_valida)){   
		  if(validaCNPJ( cpf )){ // é usado o mesmo campo para cpf e cnpj
				tipopessoa = "CNPJ";
				errocnpj = false;
		  } 
	}
	else{ 
		errocpf= false;
		tipopessoa = "CPF";
		
	}	
	
	if( errocpf==true & errocnpj==true){
		 alert("Erro no CPF ou CNPJ. Por favor, verifique e tente novamente.")
		 document.getElementById("cpf").focus();
		 return; 
	}		
	
	/*
	if(J("#websites3").val() == ""){
	 
		alert("Por favor, escolha a cidade de interesse das ofertas");
		jQuery("#loading").hide();
		document.getElementById("websites3").focus();
		return;
	}	*/
	
  // dados de enredeço
	 
	if(jQuery("#cep").val() == ""){

		alert("Por favor, informe seu cep.");
		jQuery("#loading").hide();
		document.getElementById("cep").focus();
		return;
	}
	/* if(jQuery("#endereco").val() == ""){

		alert("Por favor, informe seu endereco.");
		jQuery("#loading").hide();
		document.getElementById("endereco").focus();
		return;
	} 
	if(jQuery("#numero").val() == ""){

		alert("Por favor, informe o número.");
		jQuery("#loading").hide();
		document.getElementById("numero").focus();
		return;
	}
	if(jQuery("#bairro").val() == ""){

		alert("Por favor, informe seu bairro.");
		jQuery("#loading").hide();
		document.getElementById("bairro").focus();
		return;
	}*/
	if(jQuery("#cidadeusuario").val() == ""){

		alert("Por favor, informe sua cidade.");
		jQuery("#loading").hide();
		document.getElementById("cidadeusuario").focus();
		return;
	}
	if(jQuery("#estado").val() == ""){

		alert("Por favor, informe seu estado.");
		jQuery("#loading").hide();
		document.getElementById("estado").focus();
		return;
	}
	/*
	if(J("#ddd").val() == ""){

		alert("Por favor, informe o seu DDD.");
		jQuery("#loading").hide();
		document.getElementById("ddd").focus();
		return;
	}	
	 */
	if(jQuery("#telefone").val() == ""){

		alert("Por favor, informe seu telefone.");
		jQuery("#loading").hide();
		document.getElementById("telefone").focus();
		return;
	}
	if(jQuery("#passwordcad").val() == ""){
	    alert("Por favor, informe sua senha.");
		jQuery("#loading").hide();
		document.getElementById("passwordcad").focus();
		return;
	}
	
	if(jQuery("#password2").val() == ""){

		alert("Por favor, redigite sua senha.");
		jQuery("#loading").hide();
		document.getElementById("password2").focus();
		return;
	}
	
	if(jQuery("#password2").val() != jQuery("#passwordcad").val() ){
	    alert(utf8_decode("Por favor, revise suas senhas, elas não conferem."));
		jQuery("#loading").hide();
		document.getElementById("password2").focus();
		return;
	}
	
   var checkreceber="";
	jQuery(".cinput:checked").each(function(){
		checkreceber = ' [' + this.value + '] ';
	});
 
	cpf = jQuery("#cpf").val();
 
 
 tipoanunciante = jQuery("input[name=tipoanunciante]:checked").val();
 
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=cadastro&telefone="+jQuery("#telefone").val()+"&whatsapp="+jQuery("#whatsapp").val()+"&numero="+jQuery("#numero").val()+"&cidadeusuario="+jQuery("#cidadeusuario").val()+"&cep="+jQuery("#cep").val()+"&endereco="+jQuery("#endereco").val()+"&estado="+jQuery("#estado").val()+"&complemento="+jQuery("#complemento").val()+"&bairro="+jQuery("#bairro").val()+"&cpf="+cpf+"&tipoanunciante="+tipoanunciante+"&receberofertas="+checkreceber+"&username="+jQuery("#username").val()+"&passwordcad="+jQuery("#passwordcad").val()+"&emailcadastro="+jQuery("#emailcadastro").val()+"&local="+jQuery("#local").val()+"&password2="+jQuery("#password2").val(),
		   success: function(user_id){
		 
		   flag =  user_id.indexOf("Falha");
		 
			if(flag!=-1){ 
				 alert(user_id);
				jQuery("#loading").hide();
			} 
			else {  
			  jQuery("#idusuario").val(user_id);
			  idusuario = jQuery.trim(user_id);
			    if(jQuery("#utm").val()=="1"){
					  if(jQuery("#tipooferta").val()=="participe"){
						participar(1);
					  }else{
						 enviapag() ;
					  }
				}
				  else{
				  
					alert("Parab\u00e9ns! Clique em Anunciar Im\u00f3vel.");
					location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php?<?php echo $_SERVER["QUERY_STRING"] ?>';
				  	  // jQuery.colorbox({html:"<img src=http://bomclass.com.br/skin/padrao/images/ajax-loader2.gif> <p style='font-size:13px; color:#000;'>Realizamos seu cadastro com sucesso...</p>"});
					  // location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php?<?php echo $_SERVER["QUERY_STRING"] ?>';
				  }	 	
			 }
		}
	});	
}

function validaCPF(cpf)
	{ 
		if (cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999" || cpf.length < 11)
			return false;

		var a = [];
		var b = new Number;
		var c = 11;
		for (i=0; i<11; i++)
			{
				a[i] = cpf.charAt(i);
				if (i < 9) b += (a[i] * --c);
			}
		if ((x = b % 11) < 2)
			{ 
				a[9] = 0 
			} 
		else 
			{ 
				a[9] = 11-x 
			}
		b = 0;

		c = 11;
		for (y=0; y<10; y++) 
			b += (a[y] *  c--); 
		if ((x = b % 11) < 2) 
			{
				a[10] = 0; 
			} 
		else 
			{ 
				a[10] = 11-x; 
			}
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]))
			{
				return false;
			} 
			
		return true;
	}

function validaCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^0-9]/g,'');
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
 
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
 
function cpfCnpj(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length < 14) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		 
  
    } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
	 
 
    } 
    return v 
}

 

function getEndereco() {
 
		// Se o campo CEP não estiver vazio
		if(jQuery.trim(jQuery("#cep").val()) != ""){
			/* 
				Para conectar no serviço e executar o json, precisamos usar a função
				getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
				dataTypes não possibilitam esta interação entre domínios diferentes
				Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
				http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
			*/
			jQuery.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+jQuery("#cep").val(), function(){
				// o getScript dá um eval no script, então é só ler!
				//Se o resultado for igual a 1
				if(resultadoCEP["resultado"]){
					// troca o valor dos elementos
					jQuery("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
					jQuery("#bairro").val(unescape(resultadoCEP["bairro"]));
					jQuery("#cidadeusuario").val(unescape(resultadoCEP["cidade"]));
					jQuery("#estado").val(unescape(resultadoCEP["uf"]));
				}else{
					alert("Endereço não encontrado");
				}
			});				
		}			
}

 
	
jQuery(document).ready(function(){
  // J("#date").mask("99/99/9999");
    
   //jQuery("#telefone").mask("(99) 9999-9999");
   // J("#entrega_telefone").mask("(99)99999-9999");
	//jQuery(".cep_cadastro").mask("99-999.999");
   //J("#ssn").mask("999-99-9999");
   
   //jQuery("#estado").mask("aa");
  // J("#ddd").mask("99");
});



 

/*
jQuery('#inline_logar input').bind('keypress', function(e) {
        if(e.keyCode==13){
		entrar();
	}
});
jQuery('#inline_cadastrar input').bind('keypress', function(e) {
        if(e.keyCode==13){
			cadastropop();
	}
});
jQuery('#inline_esquecisenha input').bind('keypress', function(e) {
        if(e.keyCode==13){
			enviar();
	}
});*/

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}


</script>
											
	 