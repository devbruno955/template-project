
/* Validação dos formulários de contato da página de produtos. */
jQuery('document').ready(function() {
	
	//jQuery('.telefone').mask("(99) 99999-9999");
	//jQuery('#telefone2').mask("(99) 99999-9999");
	
	/* Validação do formulário da lateral. */
	jQuery('#btn-enviarContatoLateral').click(function(){		
		
		var buttom = jQuery(this).attr('data-type');
		var nome = jQuery('#name').val();
		var email = jQuery('#emaillateral').val();
		var telefone = jQuery('#telefone1').val();
		var mensagem = jQuery('#mensagem').val();
		
		/* Verificação e validação das informações. */
		if(nome == "") {
			window.alert("Informe um nome válido!");
			return false;
		}
		
		if(email == "") {
			window.alert("Informe um email válido!");
			return false;
		}
		
		if(telefone == "") {
			window.alert("Informe um número de telefone válido!");
			return false;
		}
		
		if(mensagem == "") {
			window.alert("Informe uma mensagem válida!");
			return false;
		}
		
		/* Os parâmetros são montados para ser enviados via Ajax. */
		if(nome != "" && email != "" && telefone != "" && mensagem != "") {
			Params = "&nome=" + nome + "&email=" + email + "&telefone=" + telefone + "&mensagem=" + mensagem;
			J(this).SubmitContact(Params, buttom);
		}
		
		jQuery('#name').val("");
		jQuery('#emaillateral').val("");
		jQuery('#telefone1').val("");
		jQuery('#mensagem').val("");
	});	
	
	/* Validação do formulário na parte inferior. */
	jQuery('#btn-enviarContatoInferior').click(function(){		
		
		var buttom = jQuery(this).attr('data-type');
		var nome2 = jQuery('#name2').val();
		var email2 = jQuery('#email2').val();
		var telefone2 = jQuery('#telefone2').val();
		var mensagem2 = jQuery('#mensagem2').val();

		/* Verificação e validação das informações. */
		if(nome2 == "") {
			window.alert("Informe um nome válido!");
			return false;
		}
		
		if(email2 == "") {
			window.alert("Informe um email válido!");
			return false;
		}
		
		if(telefone2 == "") {
			window.alert("Informe um número de telefone válido!");
			return false;
		}
		
		if(mensagem2 == "") {
			window.alert("Informe uma mensagem válida!");
			return false;
		}
		
		/* Os parâmetros são montados para ser enviados via Ajax. */
		if(nome2 != "" && email2 != "" && telefone2 != "" && mensagem2 != "") {
			Params = "&nome=" + nome2 + "&email=" + email2 + "&telefone=" + telefone2 + "&mensagem=" + mensagem2;
			J(this).SubmitContact(Params, buttom);
		}
		
		jQuery('#name2').val("");
		jQuery('#email2').val("");
		jQuery('#telefone2').val("");
		jQuery('#mensagem2').val("");		
	});
	
	/* Requisição Ajax para o envio da proposta. */
	J.fn.SubmitContact = function(Params, buttom){		
		jQuery.ajax({
			url: URLWEB + "/ajax/SubmitContact.php",
			type: 'post',
			data: "acao=EnviarContato" + "&id=" + idOffer + Params,
			beforeSend: function() {
				if(buttom == "left") {
					J('.box-contato').css('display', 'none');
					J('.LoadingImageContact').css('display', 'block');
				}
				else {
					J('.contato2').css('display', 'none');
					J('.LoadingImageContact2').css('display', 'block');				
				}
			},
			success: function(retorno){
				if(retorno){
					if(buttom == "left") {
						J('.box-contato').css('display', 'block');
						J('.LoadingImageContact').css('display', 'none');
						J('.MsgRetorno').html(retorno);
						J('.MsgRetorno').css('display', 'block');
					}
					else {
						J('.contato2').css('display', 'block');
						J('.LoadingImageContact2').css('display', 'none');
						J('.MsgRetorno2').html(retorno);
						J('.MsgRetorno2').css('display', 'block');					
					}
				}  	  
			}
		});			
	}
});