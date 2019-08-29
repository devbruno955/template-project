var idusuario="";

function isNumberKey(Key)
	{
	   var charCode = (Key.which) ? Key.which : event.keyCode
	   if (charCode > 47 && charCode < 58 || charCode == 8)
		  return true;
	   return false;
	}

function float2moeda(num) {

   x = 0;

   if(num<0) {
      num = Math.abs(num);
      x = 1;
   }
   if(isNaN(num)) num = "0";
      cents = Math.floor((num*100+0.5)%100);

   num = Math.floor((num*100+0.5)/100).toString();

   if(cents < 10) cents = "0" + cents;
      for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
         num = num.substring(0,num.length-(4*i+3))+'.'
               +num.substring(num.length-(4*i+3));
   ret = num + ',' + cents;
   if (x == 1) ret = ' - ' + ret;return ret;

}



function loginajax(email, senha){
	   
	if(email == ""){
			jQuery("#loadingcontato").hide();
			alert("Informe o seu email cadastrado em nosso site")
			document.getElementById("emailshare").focus();
			 
			return;
		}
		if(senha== ""){
			jQuery("#loadingcontato").hide();
			alert("Informe a sua senha cadastrada em nosso site.")
			document.getElementById("passwordshare").focus(); 
			return;
		}
	    
         jQuery("#loadingcontato").show();

		jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/autenticacao/login.php",
			   data: "acao=loginimportacontato&email="+email+"&password="+senha,
			   success: function(msg){
			   if(jQuery.trim(msg)=="0"){
					jQuery("#loadingcontato").hide();
				   alert("usuário ou senha inválidos, por favor, verifique os seus dados e tente novamente.");
			   }
				if(jQuery.trim(msg)=="01"){
				   jQuery("#loadingcontato").hide();
				   alert("Nós ainda não recebemos a sua validação de email, por favor, entre no seu email de cadastro e clique no link de confirmação.");
			   }
			    
				if(jQuery.trim(msg)==""){
                        alert("Login realizado com sucesso. Agora infome o seu email e senha de alguma rede social como orkut, facebook, twitter, Badoo, Linkedin ou seu email e senha do gmail ou yahoo. ")
					   jQuery.ajax({
					   type: "POST",
					   cache: false,
					   async: true,
					   url: URLWEB+"/util/OpenInviter/convidar.php",
					   data: "",
					   success: function(msg){
					 	     jQuery("#loadingcontato").hide();
							 jQuery("#naologado").html(msg); 
						
					 }
				});
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
	
function CheckEnter(Key)
	{
		var charCode = (Key.which) ? Key.which : event.keyCode
		if (charCode > 9 && charCode < 14)
			return false;
		return true;
	}
			
function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}

function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? tecla.which : tecla.keyCode;

	if (whichCode == 13) return true; // Tecla Enter
	if (whichCode == 8) return true; // Tecla Delete
	key = String.fromCharCode(whichCode); // Pegando o valor digitado
	if (strCheck.indexOf(key) == -1) return false; // Valor inválido (não inteiro)
	len = campo.value.length;
	for(i = 0; i < len; i++)
	if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_decimal)) break;
	aux = '';
	for(; i < len; i++)
	if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) campo.value = '';
	if (len == 1) campo.value = '0'+ separador_decimal + '0' + aux;
	if (len == 2) campo.value = '0'+ separador_decimal + aux;

	if (len > 2) {
		aux2 = '';

		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += separador_milhar;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}

		campo.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
		campo.value += aux2.charAt(i);
		campo.value += separador_decimal + aux.substr(len - 2, len);
	}

	return false;
}
	
var cidade;
var cidade="";
function envianewsletter(email,cidade){
 
	if(email == "" || email == "Insira seu e-mail"){

		alert("Você esqueceu de informar o seu email !")
		document.getElementById("emailnewshome").focus();
		return;
	}
  
	jQuery("#loadingcontatoheader").html("<img src="+URLWEB+"/skin/padrao/images/ajax-loader6.gif> <font color=#fff> Cadastrando. Aguarde...</font>");
		
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if( jQuery.trim(msg)=="1"){
		    	jQuery("#loadingcontatoheader").html("");
				 alert("Obrigado ! Seu email foi cadastrado com sucesso!");
			}  
		   else {
			    jQuery("#loadingcontatoheader").html("");
                alert(msg)
				}
			 }
		 });
}

function enviaproposta(){
 
	idoferta = jQuery("#idoferta_proposta").val();
	nome_proposta = jQuery("#nome_proposta").val();
	email_proposta = jQuery("#email_proposta").val();
	ddd_proposta = jQuery("#ddd_proposta").val();
	telefone_proposta = jQuery("#telefone_proposta").val();
	proposta = jQuery("#proposta").val(); 
	 
	if(idoferta == ""){

		alert("Ocorreu um erro inesperado. Por favor, volte mais tarde.")
		return;
	}
	if(nome_proposta == "" || nome_proposta == "Seu Nome"){

		alert("Você esqueceu de informar o seu nome")
		document.getElementById("nome_proposta").focus();
		return;
	}

	if(email_proposta == "" || email_proposta == "Seu Email"){

		alert("Você esqueceu de informar o seu email")
		document.getElementById("email_proposta").focus();
		return;
	}
	if(proposta == "" || proposta == "Sua mensagem"){

		alert("Informe alguma mensagem !")
		document.getElementById("proposta").focus();
		return;
	}
  
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Enviando sua proposta, por favor, aguarde...</font>"});
	
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: true,
		   url: URLWEB+"/enviaproposta.php",
		   data: "idoferta="+idoferta+"&nome_proposta="+nome_proposta+"&email_proposta="+email_proposta+"&ddd_proposta="+ddd_proposta+"&telefone_proposta="+telefone_proposta+"&proposta="+proposta ,
		   success: function(msg){
		   
		   if( jQuery.trim(msg)==""){
		    	jQuery.colorbox({html:"<font color='black' size='10'>Proposta enviada com sucesso! </font>"});
			}  
		   else {
			   jQuery.colorbox({html:"<font color='black' size='10'>"+msg+"</font>"});
				}
			 }
		 });
}
 



function envianewsletterhome(email,cidade){

	 
	if(email == "" || email == "Insira seu e-mail"){
		alert("Você esqueceu de informar o seu email !")
		document.getElementById("emailnewshome").focus();
		return;
	}
	  
	if(cidade == ""){
		alert("Nos informe a cidade no qual deseja receber as ofertas.")
		document.getElementById("websites3").focus();
		return;
	}
	  
   jQuery("#loadingcontato").html("<img style=margin-left:50px; src="+URLWEB+"/skin/padrao/images/ajax-loader.gif> Cadastrando em nossa newsletter...");
		
	 
	jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if(msg=="1"){
			    jQuery("#loadingcontato").html("");
				alert( "Cadastro realizado com sucesso. Vamos redirecionar para a cidade escolhida. Aproveite e compre já o seu ingresso reembolsável !" );
				Dialog.okCallback();
			    location.href=URLWEB+"/index.php?idcidade="+cidade;
				 
		   }  
		   else {
			  alert( msg );
			  jQuery("#loadingcontato").html("");
			  Dialog.okCallback();
			 
		   }
			    
		   }
		 });
}
 

function voltaimportarcontatos(){
	   
	 jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/util/OpenInviter/convidar.php",
		   data: "",
		   success: function(msg){
			   jQuery("#conteudo").html(msg); 
	   }
	});
}
 
  function showLoader(){
    jQuery('.search-background').fadeIn(200);
  }
  function hideLoader(){
    jQuery('.search-background').fadeOut(200);
  };

  function clicamenu( idcategoria){

	 showLoader();
    
    jQuery("#paging_button li").css({'background-color' : ''});
    jQuery(this).css({'background-color' : '#D8543A'});

    jQuery("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    //jQuery("#numeropaginas").html("");
    jQuery("#paging_button").load(URLWEB+"/include/paginacao.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    
    return;

	}

	
	
  function atualiza_click(idoferta){
      
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/atualiza_click.php?idoferta="+idoferta,
			   data: "",
			   success: function(msg){  
				 //  jQuery(window.document.location).attr('href',site);
		   }
		});
	
	}  

	function atualiza_pageview(idoferta){
 
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/atualiza_pageview.php?idoferta="+idoferta,
			   data: "",
			   success: function(msg){  
				  // jQuery(window.document.location).attr('href',site);
		   }
		});
	
	}
  
function cadastra_pedido(){
		 
		quantidade 		= jQuery("#quantidade_pedido").val();
		valorpedido 	= jQuery("#valorpedido").val();
		valor_unitario 	= jQuery("#valor_unitario").val(); 
		gateway 		= jQuery("#gateway").val();  
		idoferta 		= jQuery("#idoferta").val();
		
		if(idusuario==""){
			idusuario 		= jQuery("#idusuario").val();
		}
		if(idusuario==""){
			idusuario  = LOGINUID
		}
	 
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/get_num_pedido.php?city_id="+CITY_ID+"&utm="+jQuery("#utm").val()+"&idoferta="+idoferta+"&idusuario="+idusuario+"&quantidade="+quantidade+"&valorpedido="+valorpedido+"&valor_unitario="+valor_unitario+"&gateway="+gateway,
			   data: "",
			   success: function(idpedido){  
			   //alert(idpedido) ;
			   if(idpedido==""){
					alert("Não foi possível criar este pedido, por favor, entre em contato conosco!")
					return;
			   } 
			   jQuery("#idpedido").val(idpedido);  
			   
				preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido)
		
				if(jQuery("#utm").val()==0){
					  jQuery("#"+gateway).submit();
				}
		   }
		});

} 
function preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido){
 
//***************** formulario pagseguro
	 
   jQuery("#item_id_1").val(idpedido);
   jQuery("#item_descr_1").val(jQuery("#titulo").val());
   jQuery("#item_quant_1").val(quantidade);
   jQuery("#item_valor_1").val(valor_unitario);
   jQuery("#ref_transacao").val(idpedido);
   jQuery("#reference").val(idpedido);
   
//***************** formulario pagamento digital
	 
   jQuery("#id_pedido").val(idpedido);
   jQuery("#produto_codigo_1").val(idpedido);
   jQuery("#produto_descricao_1").val(jQuery("#titulo").val()); 
   jQuery("#produto_qtde_1").val(quantidade); 
   jQuery("#produto_valor_1").val(valor_unitario); 

 
//***************** formulario paypall
	valor_paypal = valorpedido.replace(",","."); 
	 
   jQuery("#item_number").val(idpedido);
   jQuery("#item_name").val(jQuery("#titulo").val()); 
   jQuery("#amount").val(valor_paypal); 
   
//***************** formulario moip
	 
	valor_moip = valorpedido.replace(",","");
	valor_moip = valor_moip.replace(".","");
 
	
   jQuery("#id_transacao").val(idpedido);
   jQuery("#descricao").val(jQuery("#titulo").val());
   jQuery("#nome").val(jQuery("#titulo").val()); 
   jQuery("#valor").val(valor_moip); 
   
//***************** formulario dinheiro mail
	 
   jQuery("#transaction_id").val(idpedido);
   jQuery("#item_name_1").val(jQuery("#titulo").val());
   jQuery("#item_quantity_1").val(quantidade); 
   jQuery("#item_ammount_1").val(valor_unitario); 
   
//***************** formulario mercado pago
	 
   jQuery("#item_id").val(idpedido);
   jQuery("#name").val(jQuery("#titulo").val()); 
   jQuery("#price").val(valorpedido); 

} 
 
function set_utm(){ 
		jQuery("#utm").val(1);
		//cadastra_pedido()
}
function enviapag(){  
 
	if(idusuario!=""){
			LOGINUID = idusuario
	}
	 
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos realizando o seu pedido. Por favor, aguarde...</font>"});
				
	// faz tratamentos antes da compra.
	jQuery.get(URLWEB+"/include/funcoes.php?acao=verifica_regras_pre_compra&idoferta="+jQuery("#idoferta").val()+"&idusuario="+LOGINUID,
	  function(data){
		  if(jQuery.trim(data)==""){ 
				jQuery("#utm").val(0);
				jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Você está sendo redirecionado para efetuar o pagamento em um ambiente seguro.</font>"});
				cadastra_pedido()
		 }  
		  else{
			  jQuery.colorbox({html:"<font color='red' size='10'>"+data+"</font>"});
			  verifica_logado();
		  }
	   });
}

/*
function atualizapagamentoanuncio(){
	
	 $.get(www+"/include/funcoes.php?acao=atualizapagamentoanuncio&idpedido="+idPedido+"&valor="+Valor+"&idplano="+jQuery('#idplano').val()+"&team_id="+team_id+"&status_pagamento="+Status+"&mensagem="+Erro,
	 
	  function(data){
		  if(jQuery.trim(data)==""){ 
				//jQuery('#idpagamento').val(data)
		 }  
		  else{
			alert("Houve um erro ao atualizar o seu pedido para pago. Por favor, entre em contato conosco.");
			location.href = www+"/adminanunciante/";
		  }
	   });
	
}
*/
function enviacart(idoferta){  
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Registrando sua opção. Aguarde...</font>"});
				
	 jQuery("#idoferta").val(idoferta);
	 jQuery("#dadospedido").attr("action",URLWEB+"/carrinho/"+idoferta);
 	 jQuery('#dadospedido').submit();
}	

function ordenarBusca(ord){  
	  
	jQuery("#ordena").val(ord);
	 
	  
	 jQuery('<input>')  
	.attr('type', 'hidden').attr('name', 'ordena').attr('value', ord)  
	.appendTo('#formpesquisa3');  

	jQuery('#formpesquisa3').submit(); 
	 
	//location.href=URLWEB+"/index.php?ordena="+ord;
}
function buscaanunciosrevenda(idparceiro){  
	    
	 jQuery('<input>').attr('type', 'hidden').attr('name', 'idparceiro').attr('value', idparceiro).appendTo('#formparceiro');  

	jQuery('#formparceiro').submit();
}

function pesquisa(){  
	
	if(jQuery("#cppesquisa").val()=="" || jQuery("#cppesquisa").val()=="O que está procurando ?"){
		alert("Por favor, informe algo para que possamos procurar pra você.");
		return;
	}
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos fazendo a pesquisa. Aguarde...</font>"});
				
	jQuery('#formpesquisa').submit();
}

function abreboxOfertasPacote(conteudo){
	jQuery.colorbox({html:conteudo});
}

function verreserva(){  
   
   inicioperiodo 	= jQuery("#inicioperiodo").val();
   fimperiodo 		= jQuery("#fimperiodo").val(); 
   hosadulto 		= jQuery("#hosadulto").val(); 
   hoscrianca 		= jQuery("#hoscrianca").val(); 
   idanuncio 		= jQuery("#idanuncio").val(); 
   /*
   if(hosadulto=="" || hosadulto=="0"){
		 jQuery("#hosadulto").val(1)
   }  */
   
   //jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Verificando valores e disponibilidade, por favor aguarde ....</font>"});
	jQuery("#reservaloading").html("Verificando disponibilidade...");			
  jQuery.ajax({
		   type: "POST",
		   cache: false,
		   async: true,
		   url: URLWEB+"/include/funcoes.php?acao=verreserva&inicioperiodo="+inicioperiodo+"&fimperiodo="+fimperiodo+"&idanuncio="+idanuncio+"&hoscrianca="+hoscrianca+"&hosadulto="+hosadulto,
		   data: "",
		   success: function(msg){   
			   if(jQuery.trim(msg).indexOf("diasindisponivel") == -1){  //DISPONIVEL
					jQuery("#statusreserva").val("1");   
			}  
			  else{ //IDISPONIVEL  
				  jQuery("#statusreserva").val("0");   
			  }
			jQuery("#ajaxretornodisp").html(msg);  
			jQuery.colorbox.close();
			jQuery("#reservaloading").html("");	
	   }
	});
    
}
		   