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
				   alert("usu�rio ou senha inv�lidos, por favor, verifique os seus dados e tente novamente.");
			   }
				if(jQuery.trim(msg)=="01"){
				   jQuery("#loadingcontato").hide();
				   alert("N�s ainda n�o recebemos a sua valida��o de email, por favor, entre no seu email de cadastro e clique no link de confirma��o.");
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
	if (strCheck.indexOf(key) == -1) return false; // Valor inv�lido (n�o inteiro)
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

		alert("Voc� esqueceu de informar o seu email !")
		document.getElementById("emailnewshome").focus();
		return;
	}
  
	jQuery("#loadingcontatoheader").html("<img src="+URLWEB+"/skin/padrao/images/ajax-loader6.gif> <font color=#fff> Cadastrando. Aguarde...</font>");
		
	J.ajax({
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
 
	idoferta = J("#idoferta_proposta").val();
	nome_proposta = J("#nome_proposta").val();
	email_proposta = J("#email_proposta").val();
	ddd_proposta = J("#ddd_proposta").val();
	telefone_proposta = J("#telefone_proposta").val();
	proposta = J("#proposta").val(); 
	 
	if(idoferta == ""){

		alert("Ocorreu um erro inesperado. Por favor, volte mais tarde.")
		return;
	}
	if(nome_proposta == "" || nome_proposta == "Seu Nome"){

		alert("Voc� esqueceu de informar o seu nome")
		document.getElementById("nome_proposta").focus();
		return;
	}

	if(email_proposta == "" || email_proposta == "Seu Email"){

		alert("Voc� esqueceu de informar o seu email")
		document.getElementById("email_proposta").focus();
		return;
	}
	if(proposta == "" || proposta == "Sua mensagem"){

		alert("Informe alguma mensagem !")
		document.getElementById("proposta").focus();
		return;
	}
  
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Enviando sua proposta, por favor, aguarde...</font>"});
	
	J.ajax({
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
		alert("Voc� esqueceu de informar o seu email !")
		document.getElementById("emailnewshome").focus();
		return;
	}
	  
	if(cidade == ""){
		alert("Nos informe a cidade no qual deseja receber as ofertas.")
		document.getElementById("websites3").focus();
		return;
	}
	  
   jQuery("#loadingcontato").html("<img style=margin-left:50px; src="+URLWEB+"/skin/padrao/images/ajax-loader.gif> Cadastrando em nossa newsletter...");
		
	 
	J.ajax({
		   type: "POST",
		   cache: false,
		   async: false,
		   url: URLWEB+"/newsletter.php",
		   data: "email="+email+"&city_id="+cidade,
		   success: function(msg){
		   
		   if(msg=="1"){
			    jQuery("#loadingcontato").html("");
				alert( "Cadastro realizado com sucesso. Vamos redirecionar para a cidade escolhida. Aproveite e compre j� o seu ingresso reembols�vel !" );
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
    J('.search-background').fadeIn(200);
  }
  function hideLoader(){
    J('.search-background').fadeOut(200);
  };

  function clicamenu( idcategoria){

	 showLoader();
    
    J("#paging_button li").css({'background-color' : ''});
    J(this).css({'background-color' : '#D8543A'});

    J("#pgofertas").load(URLWEB+"/include/paginacao_post.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    //J("#numeropaginas").html("");
    J("#paging_button").load(URLWEB+"/include/paginacao.php?idcategoria="+idcategoria+"&page=1", hideLoader);
    
    return;

	}

	J(window).unload(function() {
	 
	 // alert(1)
	});
	
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
		 
		quantidade 		= J("#quantidade_pedido").val();
		valorpedido 	= J("#valorpedido").val();
		valor_unitario 	= J("#valor_unitario").val(); 
		gateway 		= J("#gateway").val();  
		idoferta 		= J("#idoferta").val();
		
		if(idusuario==""){
			idusuario 		= J("#idusuario").val();
		}
		if(idusuario==""){
			idusuario  = LOGINUID
		}
	 
	  jQuery.ajax({
			   type: "POST",
			   cache: false,
			   async: true,
			   url: URLWEB+"/include/get_num_pedido.php?city_id="+CITY_ID+"&utm="+J("#utm").val()+"&idoferta="+idoferta+"&idusuario="+idusuario+"&quantidade="+quantidade+"&valorpedido="+valorpedido+"&valor_unitario="+valor_unitario+"&gateway="+gateway,
			   data: "",
			   success: function(idpedido){  
			   //alert(idpedido) ;
			   if(idpedido==""){
					alert("N�o foi poss�vel criar este pedido, por favor, entre em contato conosco!")
					return;
			   } 
			   J("#idpedido").val(idpedido);  
			   
				preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido)
		
				if(J("#utm").val()==0){
					  J("#"+gateway).submit();
				}
		   }
		});

} 
function preenche_formularios(quantidade,valorpedido,valor_unitario,idoferta,idpedido){
 
//***************** formulario pagseguro
	 
   J("#item_id_1").val(idpedido);
   J("#item_descr_1").val(J("#titulo").val());
   J("#item_quant_1").val(quantidade);
   J("#item_valor_1").val(valor_unitario);
   J("#ref_transacao").val(idpedido);
   J("#reference").val(idpedido);
   
//***************** formulario pagamento digital
	 
   J("#id_pedido").val(idpedido);
   J("#produto_codigo_1").val(idpedido);
   J("#produto_descricao_1").val(J("#titulo").val()); 
   J("#produto_qtde_1").val(quantidade); 
   J("#produto_valor_1").val(valor_unitario); 

 
//***************** formulario paypall
	valor_paypal = valorpedido.replace(",","."); 
	 
   J("#item_number").val(idpedido);
   J("#item_name").val(J("#titulo").val()); 
   J("#amount").val(valor_paypal); 
   
//***************** formulario moip
	 
	valor_moip = valorpedido.replace(",","");
	valor_moip = valor_moip.replace(".","");
 
	
   J("#id_transacao").val(idpedido);
   J("#descricao").val(J("#titulo").val());
   J("#nome").val(J("#titulo").val()); 
   J("#valor").val(valor_moip); 
   
//***************** formulario dinheiro mail
	 
   J("#transaction_id").val(idpedido);
   J("#item_name_1").val(J("#titulo").val());
   J("#item_quantity_1").val(quantidade); 
   J("#item_ammount_1").val(valor_unitario); 
   
//***************** formulario mercado pago
	 
   J("#item_id").val(idpedido);
   J("#name").val(J("#titulo").val()); 
   J("#price").val(valorpedido); 

} 
 
function set_utm(){ 
		J("#utm").val(1);
		//cadastra_pedido()
}
function enviapag(){  
 
	if(idusuario!=""){
			LOGINUID = idusuario
	}
	 
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos realizando o seu pedido. Por favor, aguarde...</font>"});
				
	// faz tratamentos antes da compra.
	J.get(URLWEB+"/include/funcoes.php?acao=verifica_regras_pre_compra&idoferta="+J("#idoferta").val()+"&idusuario="+LOGINUID,
	  function(data){
		  if(jQuery.trim(data)==""){ 
				J("#utm").val(0);
				jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Voc� est� sendo redirecionado para efetuar o pagamento em um ambiente seguro.</font>"});
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
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Registrando sua op��o. Aguarde...</font>"});
				
	 J("#idoferta").val(idoferta);
	 J("#dadospedido").attr("action",URLWEB+"/carrinho/"+idoferta);
 	 J('#dadospedido').submit();
}	

function ordenarBusca(ord){  
	  
	J("#ordena").val(ord);
	 
	  
	 J('<input>')  
	.attr('type', 'hidden').attr('name', 'ordena').attr('value', ord)  
	.appendTo('#formpesquisa3');  

	J('#formpesquisa3').submit(); 
	 
	//location.href=URLWEB+"/index.php?ordena="+ord;
}
function buscaanunciosrevenda(idparceiro){  
	    
	 J('<input>').attr('type', 'hidden').attr('name', 'idparceiro').attr('value', idparceiro).appendTo('#formparceiro');  

	J('#formparceiro').submit();
}

function pesquisa(){  
	
	if(J("#cppesquisa").val()=="" || J("#cppesquisa").val()=="O que est� procurando ?"){
		alert("Por favor, informe algo para que possamos procurar pra voc�.");
		return;
	}
	
	jQuery.colorbox({html:"<img src="+URLWEB+"/skin/padrao/images/ajax-loader2.gif> <font color='black' size='10'>Estamos fazendo a pesquisa. Aguarde...</font>"});
				
	J('#formpesquisa').submit();
}

function abreboxOfertasPacote(conteudo){
	J.colorbox({html:conteudo});
}

function mascaraTelefone(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
 
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
 
function telDig(v){
 
    //Remove tudo o que n�o � d�gito
    v=v.replace(/\D/g,"")
 
    if (v.length < 11) { //8 d�gitos (fixo e cels antigos)
 
        //Coloca um ponto entre o terceiro e o quarto d�gitos
       v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto d�gitos
        //de novo (para o segundo bloco de n�meros)
       v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
         //Coloca um h�fen depois do bloco de quatro d�gitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
		 
  
    } else{ //9 d�gitos (novos cels)
 
        //Coloca um ponto entre o terceiro e o quarto d�gitos
		v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto d�gitos
        //de novo (para o segundo bloco de n�meros)
		v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
        //Coloca uma barra entre o oitavo e o nono d�gitos
        //v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um h�fen depois do bloco de quatro d�gitos
        v=v.replace(/(\d{5})(\d)/,"$1-$2")
	 
 
    } 
    return v 
}
		   
function utf8_decode (strData) { 

  var tmpArr = []
  var i = 0
  var c1 = 0
  var seqlen = 0

  strData += ''

  while (i < strData.length) {
    c1 = strData.charCodeAt(i) & 0xFF
    seqlen = 0

    // http://en.wikipedia.org/wiki/UTF-8#Codepage_layout
    if (c1 <= 0xBF) {
      c1 = (c1 & 0x7F)
      seqlen = 1
    } else if (c1 <= 0xDF) {
      c1 = (c1 & 0x1F)
      seqlen = 2
    } else if (c1 <= 0xEF) {
      c1 = (c1 & 0x0F)
      seqlen = 3
    } else {
      c1 = (c1 & 0x07)
      seqlen = 4
    }

    for (var ai = 1; ai < seqlen; ++ai) {
      c1 = ((c1 << 0x06) | (strData.charCodeAt(ai + i) & 0x3F))
    }

    if (seqlen === 4) {
      c1 -= 0x10000
      tmpArr.push(String.fromCharCode(0xD800 | ((c1 >> 10) & 0x3FF)))
      tmpArr.push(String.fromCharCode(0xDC00 | (c1 & 0x3FF)))
    } else {
      tmpArr.push(String.fromCharCode(c1))
    }

    i += seqlen
  }

  return tmpArr.join('')
}

function utf8_encode (argString) { 

  if (argString === null || typeof argString === 'undefined') {
    return ''
  }

  // .replace(/\r\n/g, "\n").replace(/\r/g, "\n");
  var string = (argString + '')
  var utftext = ''
  var start
  var end
  var stringl = 0

  start = end = 0
  stringl = string.length
  for (var n = 0; n < stringl; n++) {
    var c1 = string.charCodeAt(n)
    var enc = null

    if (c1 < 128) {
      end++
    } else if (c1 > 127 && c1 < 2048) {
      enc = String.fromCharCode(
        (c1 >> 6) | 192, (c1 & 63) | 128
      )
    } else if ((c1 & 0xF800) !== 0xD800) {
      enc = String.fromCharCode(
        (c1 >> 12) | 224, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      )
    } else {
      // surrogate pairs
      if ((c1 & 0xFC00) !== 0xD800) {
        throw new RangeError('Unmatched trail surrogate at ' + n)
      }
      var c2 = string.charCodeAt(++n)
      if ((c2 & 0xFC00) !== 0xDC00) {
        throw new RangeError('Unmatched lead surrogate at ' + (n - 1))
      }
      c1 = ((c1 & 0x3FF) << 10) + (c2 & 0x3FF) + 0x10000
      enc = String.fromCharCode(
        (c1 >> 18) | 240, ((c1 >> 12) & 63) | 128, ((c1 >> 6) & 63) | 128, (c1 & 63) | 128
      )
    }
    if (enc !== null) {
      if (end > start) {
        utftext += string.slice(start, end)
      }
      utftext += enc
      start = end = n + 1
    }
  }

  if (end > start) {
    utftext += string.slice(start, stringl)
  }

  return utftext
}