

J('document').ready(function(){
	
	/* Envio de formulário de busca da página inicial. */
	J("#search-imovel").click(function(){
		
		var comprar = J(".comprar").val();
		var tipo = J(".tipoimovel").val();
		var quartos = J(".quantidade_quartos").val();
		var vagas = J(".quantidade_vagas").val();
		var estado = J(".uf").val();
		var cidade = J("#city_id").val();
		var bairro = J("#location").val();
		var cep = J("#cep").val();
		var condominio = J("#condominio").val();
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
		
		if(estado == "" || estado == undefined || estado == "Carregando...") {
			estado = "todos-estados";
		}		
		
		if(cidade == "" || cidade == undefined || cidade == "Carregando...") {
			cidade = "todas-cidades";
		}		
		else {
			cidade = cidade.replace(" ", "-");
			cidade = cidade.toLowerCase();
		}	
		
		if(bairro == "" || bairro == undefined || bairro == "Carregando...") {
			bairro = "todos-bairros";
		}
		else {
			bairro = bairro.replace(" ", "-");
			bairro = bairro.toLowerCase();
		}		
		
		if(cep == "" || cep == undefined) {
			cep = "todos-cep";
		}
		else {
			cep = cep.replace(" ", "-");
		}	
		
		if(condominio == "" || condominio == undefined) {
			condominio = "com-e-sem-condominio";
		}
		else {
			condominio = condominio.replace(" ", "-");
		}
		
		url = URLWEB + "/" + comprar + "/" + tipo + "/" + quartos + "/" + vagas + "/" + bairro + "/" + cidade + "/" + estado + "/" + cep + "/" + condominio + "/";
		
		window.location.href = url;
		
	});
	
	/* Envio de formulário de busca do topo da página. */
	J("#search-imovel-top").click(function(){
		
		var comprar = J("#sl-tipoanuncio-top").val();
		var tipo = J("#sl-tipoimovel-top").val();
		var quartos = "";
		var vagas = "";
		var estado = "";
		var cidade = "";
		var bairro = J("#location-top").val();				
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
		else {			
			bairro = bairro.toLowerCase();			
			bairroS = bairro.replace(" ", "-");
		}
		
		urlT = URLWEB + "/" + comprar + "/" + tipo + "/" + quartos + "/" + vagas + "/" + bairroS + "/" + cidade + "/" + estado + "/";
		window.location.href = urlT;
		
	});
	
	/* Lista de bairros na busca do formulário na página inicial. */
	J(".CityChoose").click(function() {

		var cidade = J(this).attr('name');
		J("#location").val(cidade);
	});
});