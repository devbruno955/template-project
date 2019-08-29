function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
} 


function doupdate(){

	if(validador()){
		$("#spinner-text").css("opacity", "0.2");
		$("#spinner-text2").css("opacity", "0.2");
		jQuery("#imgrec").show()
		jQuery("#imgrec2").show()
		document.forms[0].submit();
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



 function getEndereco() {
 
	// Se o campo CEP não estiver vazio
	if(jQuery.trim(jQuery("#imob_cep").val()) != ""){
		/* 
			Para conectar no serviço e executar o json, precisamos usar a função
			getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
			dataTypes não possibilitam esta interação entre domínios diferentes
			Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
			http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+J("#cep").val()
		*/
		jQuery.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+jQuery("#imob_cep").val(), function(){
			// o getScript dá um eval no script, então é só ler!
			//Se o resultado for igual a 1
			if(resultadoCEP["resultado"]){

				//resultadoCEP = JSON.parse(resultadoCEP);
			
				// troca o valor dos elementos
				jQuery("#imob_rua").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
				 	
				var cidade = unescape(resultadoCEP["cidade"]);
				
				var getUrl = window.location;
				var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
				URL = baseUrl+"/ajax/filtro_pesquisa.php";
				
				jQuery.ajax({
					url: URL,
					type: 'POST',
					data: { filtro: 'cidades_new', estado: resultadoCEP["uf"],cidade: cidade },
					success: function(r) {
						jQuery('#select_city_id').html(cidade);
						jQuery('#city_id').html(r);
					}
				});

				var cityid = jQuery('#city_id').find('option').filter(':selected').val();

				jQuery.ajax({
					url: URL,
					type: 'POST',
					data: { filtro: 'bairros', cidade: cityid, bairro: unescape(resultadoCEP["bairro"])},
					success: function(r) {
						jQuery('#imob_bairro_id').html(unescape(resultadoCEP["bairro"]));
						jQuery('#imob_bairro').html(r);
					}
				});
				 
				jQuery("#imob_estado").val(resultadoCEP["uf"]);
				jQuery("#select_imob_estado").html(resultadoCEP["uf"]);
			}else{
				alert("Endereço não encontrado");
			}
		});				
	}			
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
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length < 11) { //8 dígitos (fixo e cels antigos)
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
       v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
       v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
         //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
		 
  
    } else{ //9 dígitos (novos cels)
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
		v=v.replace(/(\d{0})(\d)/,"$1($2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
		v=v.replace(/(\d{2})(\d)/,"$1)$2")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        //v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{5})(\d)/,"$1-$2")
	 
 
    } 
    return v 
}