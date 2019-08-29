

jQuery('document').ready(function(){
	
	/* Envio de formulário de busca da página inicial. */
	jQuery("#search-imovel-mobile").click(function(){
		
		var comprar = jQuery(".comprar").val();
		var tipo = jQuery(".tipoimovel").val();
		var quartos = jQuery(".quantidade_quartos").val();
		var vagas = jQuery(".quantidade_vagas").val();
		var estado = jQuery(".uf").val();
		var cidade = jQuery(".city").val();
		var bairro = jQuery("#location").val();
		var url;
		
		if(comprar == "" || comprar == undefined) {
			comprar = "comprar";
		}
		
		if(tipo == "" || tipo == undefined) {
			tipo = "todos-tipos";
		}
		
		if(quartos == "" || quartos == 0 || quartos == undefined) {
			quartos = "varios-quartos";
		}		
		
		if(vagas == "" || vagas == 0 || vagas == undefined) {
			vagas = "varias-vagas";
		}		
		
		if(estado == "" || estado == undefined) {
			estado = "todos-estados";
		}		
		
		if(cidade == "" || cidade == undefined) {
			cidade = "todas-cidades";
		}		
		
		if(bairro == "" || bairro == undefined) {
			bairro = "todos-bairros";
		}
		else {
			bairro = bairro.replace(" ", "-");
			bairro = bairro.toLowerCase();
		}		
		
		
		url = URLWEB + "/" + comprar + "/" + tipo + "/" + quartos + "/" + vagas + "/" + bairro + "/" + cidade + "/" + estado + "/";
		console.log(url);
		window.location.href = url;
		
	});
	
	/* Envio de formulário de busca do topo da página. */
	jQuery("#search-imovel-top").click(function(){
		
		var comprar = jQuery("#sl-tipoanuncio-top").val();
		var tipo = jQuery("#sl-tipoimovel-top").val();
		var quartos = "";
		var vagas = "";
		var estado = "";
		var cidade = "";
		var bairro = jQuery("#location-top").val();				
		var bairroS;
		var urlT;
		
		if(comprar == "" || comprar == undefined) {
			comprar = "comprar";
		}
		
		if(tipo == "" || tipo == undefined) {
			tipo = "todos-tipos";
		}
		
		if(quartos == "" || quartos == 0 || quartos == undefined) {
			quartos = "varios-quartos";
		}		
		
		if(vagas == "" || vagas == 0 || vagas == undefined) {
			vagas = "varias-vagas";
		}		
		
		if(estado == "" || estado == undefined) {
			estado = "todos-estados";
		}		
		
		if(cidade == "" || cidade == undefined) {
			cidade = "todas-cidades";
		}		
		
		if(bairro == "" || bairro == undefined) {
			bairro = "todos-bairros";
		}
		else {			bairro = bairro.toLowerCase();			
			bairroS = bairro.replace(" ", "-");
		}
		
		urlT = URLWEB + "/" + comprar + "/" + tipo + "/" + quartos + "/" + vagas + "/" + bairroS + "/" + cidade + "/" + estado + "/";
		window.location.href = urlT;
		
	});
	
	/* Lista de bairros na busca do formulário na página inicial. */
	jQuery(".CityChoose").click(function() {

		var cidade = jQuery(this).attr('name');
		jQuery("#location").val(cidade);
	});
});