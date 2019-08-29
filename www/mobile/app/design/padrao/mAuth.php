<?php  
	require_once("include/head.php"); 
?> 

<div style="display:none;" class="tips"><?=__FILE__?></div> 

<!-- Responsivo -->
<div class="containerM">
	<? require_once(DIR_BLOCO_M . "/header.php"); ?>   
	<div class="row">
		<div class="divFormAuth">
			<h2>Faça o login ou cadastre-se abaixo.</h2>
			<div class="titleForm">
				<p>Efetue o login</p>
			</div>
			<div class="productsPage">
				<div class="formAuth">
					<form>
						<div class="formContent">
							<label>
								Email de acesso:
							</label>
							<input id="emailM" type="email" maxlength="50" name="email" placeholder="Email de acesso" autocomplete="off">
						</div>
						<div class="formContent">
							<label>
								Senha de acesso:
							</label>
							<input id="passwordM" type="password" maxlength="50" name="password" placeholder="Senha de acesso" autocomplete="off">
						</div>					
						<div class="formContent">
							<div class="formButton">
								 <a href="#" id="formAuthLogin" onclick="entrar();">Entrar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>		
			<div class="titleForm">
				<p>Cadastre-se. É rápido e fácil.</p>
			</div>
			<div class="productsPage">
				<div class="formAuth">
					<form>
						<div class="formContent">
							<label>
								Nome completo:
							</label>
							<input id="username" type="text" maxlength="50" name="username" placeholder="Nome completo" autocomplete="off">
						</div>	

						<div id="msgusername" title="Atenção!" style="display:none">
						    <p>Por favor, informe o seu nome completo.</p>
						</div>

						<div class="formContent">
							<label>
								Email:
							</label>
							<input id="emailcadastro" type="email" name="emailcadastro" placeholder="Email" autocomplete="off">
						</div>		

						<div id="msgemail" title="Atenção!" style="display:none">
						    <p>Por favor, informe o seu e-mail.</p>
						</div>	

						<div class="formContent">
							<label>
								CPF/CNPJ:
							</label>
							<input id="cpf" onkeypress="mascaraMutuario(this,cpfCnpj)" type="text" name="cpf" placeholder="CPF/CNPJ" autocomplete="off">
						</div>

						<div id="msgcpf" title="Atenção!" style="display:none">
						    <p>CPF inválido.</p>
						</div>
						<div id="msgvalidcpf" title="Atenção!" style="display:none">
						    <p>Por favor, informe um CPF válido.</p>
						</div>

						<div class="formContent">
							<label>
								Onde nos conheceu?
							</label>
							<input id="local" type="text" name="local" maxlength="50">
						</div>							
						<div class="formContent">
							<label>
								Eu sou
							</label>
							<select name="websites3" id="websites3">
								<option value="Particular">Particular</option>
								<option value="Imobiliaria">Imobiliária</option>
							</select>
						</div>	
						<div id="msgwebsite" title="Atenção!" style="display:none">
						    <p>Por favor, informe o tipo de usuário.</p>
						</div>																			
						<div class="formContent">
							<label>
								CEP:
							</label>
							<br />
							<input maxlength="8" onblur="getEndereco();" onkeypress="return SomenteNumero(event);" id="cep" type="text" name="cep" placeholder="CEP" autocomplete="off">
						</div>
						<div id="msgcep" title="Atenção!" style="display:none">
						    <p>Por favor, informe o CEP.</p>
						</div>	
						<div class="formContent">
							<label>
								Endereço profissional:
							</label>
							<input id="endereco" type="text" name="endereco" placeholder="Endereço completo" autocomplete="off">
						</div>	
						<div id="msgendereco" title="Atenção!" style="display:none">
						    <p>Por favor, informe o endereço.</p>
						</div>	
						<div class="formContent">
							<label>
								Nº:
							</label>
							<br />
							<input onkeypress="return SomenteNumero(event);" id="numero" type="text" name="numero" placeholder="Número" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Complemento:
							</label>
							<input id="complemento" type="text" name="complemento" placeholder="Complemento" autocomplete="off">
						</div>	
						<div class="formContent">
							<label>
								Bairro:
							</label>
							<br />
							<input id="bairro" type="text" name="bairro" placeholder="Bairro" autocomplete="off">
						</div>	
						<div id="msgbairro" title="Atenção!" style="display:none">
						    <p>Por favor, informe o Bairro.</p>
						</div>	
						<div class="formContent">
							<label>
								Cidade:
							</label>
							<input id="cidadeusuario" type="text" name="cidadeusuario" placeholder="Cidade" autocomplete="off">
						</div>	
						<div id="msgcep" title="Atenção!" style="display:none">
						    <p>Por favor, informe a cidade.</p>
						</div>							
						<div class="formContent">
							<label>
								Estado:
							</label>
							<br />
							<select name="estado" id="estado">
								<option value=""></option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
						</div>																										
						<div id="msgestado" title="Atenção!" style="display:none">
						    <p>Por favor, informe o estado.</p>
						</div>					
						<div class="formContent">
							<label>
								Celular/WhatsApp com DDD:
							</label>
							<input id="telefone" type="text" maxlength="11" name="telefone" placeholder="" autocomplete="off">
						</div>
						<div id="msgtelefone" title="Atenção!" style="display:none">
						    <p>Por favor, informe o telefone.</p>
						</div>							
						<div class="formContent">
							<label>
								Senha de acesso:
							</label>
							<input id="passwordcad" type="password" maxlength="50" name="passwordcad" placeholder="Senha de acesso" autocomplete="off">
						</div>	
						<div id="msgpassord" title="Atenção!" style="display:none">
						    <p>Por favor, informe a senha.</p>
						</div>	
						<div class="formContent">
							<label>
								Redigite a senha:
							</label>
							<input id="password2" type="password" name="password2" placeholder="Digite a senha novamente" autocomplete="off">
						</div>	
						<div id="msgpassord2" title="Atenção!" style="display:none">
						    <p>Por favor, confirme a senha.</p>
						</div>		
						<div id="msgpassordconfirm" title="Atenção!" style="display:none">
						    <p>As senhas não são iguais.</p>
						</div>	
						<? if($INI['option']['termosobrigatorio']=="Y"){ ?>
						<div >
							<input style="width:10px;" type="checkbox" value="1" name="aceitardb2" id="aceitardb2"> Aceito as Pol&iacute;ticas de Privacidade e Cookies. <a style="color:#000 !important;" href="<?=$ROOTPATH?>/page/about_privacy/Politicas%20de%20Privacidade">Clique para ler</a>
						</div>
					<? } ?> 	
					<div id="msgterms" title="Atenção!" style="display:none">
						    <p>Você precisa aceitar a política de privacidade para realizar o seu cadastro.</p>
						</div>														
						<div class="formContent">
							<div class="formButton">
								 <a href="javascript:cadastropop();" id="formAuthRegister">Enviar</a>  						  							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<? require_once(DIR_BLOCO_M . "/rodapeM.php"); ?>
	</div>
</div>

	<div id="msgemaillogin" title="Atenção!" style="display:none">
	    <p>Por favor, informe seu email.</p>
	</div>

	<div id="msgpswlogin" title="Atenção!" style="display:none">
	    <p>Por favor, informe sua senha.</p>
	</div>

	<div id="msgfaillogin" title="Atenção!" style="display:none">
	    <p>Não foi possível fazer o seu login. Por favor, verifique os seus dados.</p>
	</div>

	<div id="msgsuccesslogin" title="Atenção!" style="display:none">
	    <p>Login realizado com sussesso!</p>
	</div>

	<div id="msgsuccesscad" title="Atenção!" style="display:none">
	    <p>Realizamos seu cadastro com sucesso!</p>
	</div>


<script>

function vertipoanunciante(){

	var tipoanunciante = $("#tipoanunciante").val();
 
	if(tipoanunciante=="Particular"){
		$('.tipoparticular').each(function() {
			 $(this).css('display','block');
			 $('.tipoagencia').each(function() {
				$(this).css('display','none');
			 });
			 
		});
	}
	else{
		$('.tipoagencia').each(function() {
			 $(this).css('display','block');
			 $('.tipoparticular').each(function() {
				$(this).css('display','none');
			  });
		});
	}
}

// logar
function entrar(){
		 
	if(jQuery("#emailM").val() == "" ||  jQuery("#emailM").val() == "Insira seu e-mail"){ 
		
		 $(function () {            
	        $("#msgemaillogin").dialog();
	    });
		return;
	}
	 
	if(jQuery("#passwordM").val() == ""){ 
		 $(function () {            
	        $("#msgpswlogin").dialog();
	    });
		return;
	}
 
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=logintoupup&email="+jQuery("#emailM").val()+"&password="+jQuery("#passwordM").val(),
		   success: function(user_id){
			
		   idusuario = jQuery.trim(user_id);
		   if(jQuery.trim(idusuario)=="00"){

				$(function () {            
			        $("#msgfaillogin").dialog();
			    });
			 } 
		   else { 
			   
			  if(jQuery("#utm").val()=="1"){
				  if(jQuery("#tipooferta").val()=="participe"){
					participar(1);
				  }else{
					 enviapag() ;
				  }
			 }
			  else{
                  $(function () {            
				        $("#msgsuccesslogin").dialog();
				    });
				 location.href  = '<?php echo $INI['system']['wwwprefix']?>';
			  }	
		   }		  
		}
	});
}



 //cadastro
 var idusuario;
 function cadastropop(){

 		
	
    var cpf="";

    jQuery("#loading").hide();
	 
	if($("#username").val() == ""){
	     $(function () {            
	        $("#msgusername").dialog();
	    });
		return;
	}
		
	if($("#emailcadastro").val() == ""){
	    $(function () {            
	        $("#msgemail").dialog();
	    });
		return;
	}
 
	 if($("#cpf").val() == ""){
		$(function () {            
	        $("#msgcpf").dialog();
	    });
		return;
	}	
	
	cpf = $("#cpf").val();
	cpf =  cpf.replace("-","");
	cpf =  cpf.replace(".","");
	cpf =  cpf.replace(".","");
 
	if(!validaCPF(cpf)){
		$(function () {            
	        $("#msgvalidcpf").dialog();
	    });
		return;
	}	  
	if($("#websites3").val() == ""){
	 
		$(function () {            
	        $("#msgwebsite").dialog();
	    });
		return;
	}	
	
  // dados de enredeço
	 
	if($("#cep").val() == ""){

		$(function () {            
	        $("#msgcep").dialog();
	    });
		return;
	}
	/*if($("#endereco").val() == ""){

		$(function () {            
	        $("#msgendereco").dialog();
	    });
		return;
	} 
	if($("#numero").val() == ""){

		$(function () {            
	        $("#msgnumero").dialog();
	    });
		return;
	}
	if($("#bairro").val() == ""){

		$(function () {            
	        $("#msgbairro").dialog();
	    });
		return;
	}
	if($("#cidadeusuario").val() == ""){

		$(function () {            
	        $("#msgcidade").dialog();
	    });
		return;
	}*/
	if($("#estado").val() == ""){
		$(function () {            
	        $("#msgestado").dialog();
	    });
		return;
	}	
	/*if($("#ddd").val() == ""){
		$(function () {            
	        $("#msgddd").dialog();
	    });
		return;
	}*/
	if($("#telefone").val() == ""){

		$(function () {            
	        $("#msgtelefone").dialog();
	    });
		return;
	}
	if($("#passwordcad").val() == ""){
	   $(function () {            
	        $("#msgpassord").dialog();
	    });
		return;
	}
	
	if($("#password2").val() == ""){

		$(function () {            
	        $("#msgpassord2").dialog();
	    });
		return;
	}
	
	if($("#password2").val() != $("#passwordcad").val() ){
	    $(function () {            
	        $("#msgpassordconfirm").dialog();
	    });
		return;
	}

	<? if($INI['option']['termosobrigatorio']=="Y"){ ?>
		var aceitar='';
	  
		aceitar = jQuery("input[type=checkbox][name=aceitardb2]:checked").val()
	  
		if( aceitar != "on" & aceitar != "1") {
			$(function () {            
		        $("#msgterms").dialog();
		    });
			return;
		}
	<? } ?>
	
  var checkreceber="";
	$(".cinput:checked").each(function(){
 
		checkreceber = ' [' + this.value + '] ';
	});
 
		cpf = $("#cpf").val();
 
	$.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: "<?php echo $INI['system']['wwwprefix']?>/autenticacao/login.php",
		   data: "acao=cadastro&telefone="+$("#telefone").val()+"&numero="+$("#numero").val()+"&cidadeusuario="+$("#cidadeusuario").val()+"&cep="+$("#cep").val()+"&endereco="+$("#endereco").val()+"&estado="+$("#estado").val()+"&complemento="+$("#complemento").val()+"&bairro="+$("#bairro").val()+"&cpf="+cpf+"&receberofertas="+checkreceber+"&username="+$("#username").val()+"&passwordcad="+$("#passwordcad").val()+"&emailcadastro="+$("#emailcadastro").val()+"&websites3="+$("#websites3").val()+"&local="+$("#local").val()+"&password2="+$("#password2").val(),
		   success: function(user_id){
		 
		   flag =  user_id.indexOf("Falha");
		 
			if(flag!=-1){ 
				alert(user_id);
				jQuery("#loading").hide();
			} 
			else {  
			  $("#idusuario").val(user_id);
			  idusuario = jQuery.trim(user_id);
			    if($("#utm").val()=="1"){
					  if($("#tipooferta").val()=="participe"){
						participar(1);
					  }else{
						 enviapag() ;
					  }
				}
				  else{
				  		$(function () {            
					        $("#msgsuccesscad").dialog();
					    });
					   
					   location.href  = '<?php echo $INI['system']['wwwprefix']?>/index.php<?php echo '' ?>';
				  }	 	
			 }
		}
	});	
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
	if($.trim($("#cep").val()) != ""){
		/* 
			Para conectar no serviço e executar o json, precisamos usar a função
			getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
			dataTypes não possibilitam esta interação entre domínios diferentes
			Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
			http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
		
		$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
			// o getScript dá um eval no script, então é só ler!
			//Se o resultado for igual a 1
			if(resultadoCEP["resultado"]){
				// troca o valor dos elementos
				$("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
				$("#bairro").val(unescape(resultadoCEP["bairro"]));
				//J("#cidadeusuario").val(unescape(resultadoCEP["cidade"]));
				//J("#estado").val(unescape(resultadoCEP["uf"])); 
				var cidade = unescape(resultadoCEP["cidade"]);
				var CidadeUsuario = removerAcentos(cidade);
				$("#cidadeusuario").val(unescape(CidadeUsuario));
				$("#estado").val(unescape(resultadoCEP["uf"]));
				
			}else{
				alert("Endereço não encontrado");
			}
		});		*/

		var url = "https://www.tkstore.com.br/services/cep/"+J("#cep").val();	

		$.get(url, function(data, status){
			 var resultadoCEP  = JSON.parse(data);
	         //alert(resultadoCEP['resultado']);

	         if(resultadoCEP["resultado"]){
				// troca o valor dos elementos

				var tipologradouro = "";
				var logradouro = "";

				if(typeof resultadoCEP["tipo_logradouro"] != 'object'){
					var tipologradouro = resultadoCEP["tipo_logradouro"];
				}

				if(typeof resultadoCEP["logradouro"] != 'object'){
					var logradouro = resultadoCEP["logradouro"];
				}

				J("#endereco").val(unescape(tipologradouro)+"  "+unescape(logradouro));
				
				if(typeof resultadoCEP["bairro"] != 'object'){
					J("#bairro").val(unescape(resultadoCEP["bairro"]));
				}else{
					J("#bairro").val("");
				}
				
				if(typeof resultadoCEP["cidade"] != 'object'){
					var cidade = unescape(resultadoCEP["cidade"]);
					var CidadeUsuario = removerAcentos(cidade);
					J("#cidadeusuario").val(CidadeUsuario);
				}
				J("#estado").val(unescape(resultadoCEP["uf"]));
			}else{
				alert("Endereço não encontrado");
			}

	    });		
	}			
}
</script>