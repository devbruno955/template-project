
/* Assim que os valores escolhidos pelo usuário são escolhidos,
   é montado a url e atualizado no campoe de endereço do browser.	
*/
J('document').ready(function() {

	/* Valor com todos os parâmtros enviados via URL. */
	var path = window.location.pathname;
	var dir = path.split("/"); 
	
	/* O array é invertido, assim é capturado apenas os parâmetros que
	   serão utilizados	na busca.
	*/
	var param_url = dir.reverse();
	var value;
	var estado, cidade, bairro, vagas, quartos, tipos, anuncio, anuncioUrl;
	var title;
	var Params = "";
	var requisicao = "";
	
	/* Espaços em branco são retirados para que o número de parâmetros esteja correto. */
	for(value in param_url) {
		if(param_url[value] == "") {
			param_url.splice(value, 1);
		}
	}	

	/* Parâmetros enviados via URL. Caso seja utilizado o filtro, os parâmetros são sobrescrevido. */
	/*
	if(param_url[0] != "") {
		
		Params = "&partner=" + param_url[0];
	}
	*/
	
	if(param_url[0] != "") {
		Params = "&condominio=" + param_url[0];		
	}	
	
	if(param_url[1] != "") {
		Params = "&cep=" + param_url[1];		
	}	
	
	if(param_url[2] != "") {
		Params = "&uf=" + param_url[2];
	}
	
	if(param_url[3] != "") {
		Params = "&city=" + param_url[3];
	}
	
	if(param_url[4] != "") {
		Params = "&bairro=" + param_url[4];
	}
	
	if(param_url[5] != "") {
		Params = "&banheiro=" + param_url[5];
	}
	
	if(param_url[6] != "") {
		Params = "&quartos=" + param_url[6];
	}
	
	if(param_url[7] != "") {
		Params = "&tipo=" + param_url[7];
	} 
	
	if(param_url[8] != "") {
		
		if(param_url[8] == "comprar") {
			anuncioUrl = 0;
		}
		else if(param_url[8] == "alugar") {
			anuncioUrl = 1;
		}	
		else if(param_url[8] == "finalidade_todos") {
			anuncioUrl = "";
		}
		else {
			anuncioUrl = 2;
		}
		
		Params = "&anuncio=" + anuncioUrl;
	}

	/* Parceiro do imovél. */
	J('#partner_imovel').change(function(){

		var partner = J(this).FormatString(J(this).val());

		if(partner == "" || partner == undefined) {
			partner = "todos-cep";
		}
		
		Params = "";
		Params = Params + "&partner=" + partner;
		//param_url[5] = tipo;					
		//param_url[1] = J(this).FormatString(partner);
		
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + J(this).FormatString(partner) + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);
			
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});		
		
		
	/* Estado. */
	J('#uf').change(function(){
	
		var uf = J(this).val();
		
		Params = "";		
		Params = Params + "&uf=" + uf + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J("#tipo_imovel").val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J('#quantidade_quartos').val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		param_url[2] = uf.replace(" ", "-").toLowerCase();
		param_url[3] = "todas-cidades";
		param_url[4] = "todos-bairros";
		   
        var ufname = J('#uf option:selected').text();
		
		J("#breadcrumb-top-tipo").html("Buscando imóveis em " + ufname);
		J("#breadcrumb-top-transacao").html("");
		
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);
				
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Cidade. */
	J('#city_id').change(function(){
	
		var city = J(this).val();	
        var cityname = J('#city option:selected').text();	
        var ufname = J('#uf option:selected').text();
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + city + "&bairro=" + J('#location').val() + "&tipo=" + J("#tipo_imovel").val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J('#quantidade_quartos').val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		if(city == "") {
			param_url[3] = "todas-cidades";
		}
		else {
			param_url[3] = city.replace(" ", "-").toLowerCase();
		}
		 
		J("#breadcrumb-top-tipo").html("Buscando imóveis na cidade de ");
		J("#breadcrumb-top-transacao").html(cityname+ " ( "+ufname+" )");
		
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);
		
		city = city.substr(0,1).toUpperCase() + city.substr(1);
		city = city.replace("-", " ");
		J(".choose-city").html(city);
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Bairro. */
	J('#location').change(function(e){
	
		var bairro = J(this).val();		
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + bairro + "&tipo=" + J("#tipo_imovel").val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J('#quantidade_quartos').val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		if(bairro == "") {
			param_url[4] = "todos-bairros";
		}
		else {
			param_url[4] = bairro.replace(" ", "-").toLowerCase();
		}

		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);

		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Banheiro. */
	J('#quantidade_banhos').change(function(){
	
		var banheiro = J(this).val();		
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J("#tipo_imovel").val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J('#quantidade_quartos').val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + banheiro + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Quartos. */
	J('#quantidade_quartos').change(function(){
	
		var quartos = J(this).val();		
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J("#tipo_imovel").val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + quartos + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		param_url[6] = quartos;
		
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);	
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});
	
	
	/* Tipo de imovél. */
	J('#tipo_imovel').change(function(){
	
		var tipo = J(this).val();		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + tipo + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		param_url[7] = J(this).FormatString(tipo);
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);
			
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});		
	
	
	/* Vagas. */
	J('#quantidade_vagas').change(function(){
	
		var vagas = J(this).val();		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + vagas + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		param_url[5] = vagas;
		
		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);	
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Suítes. */
	J('#quantidade_suites').change(function(){
	
		var suite = J(this).val();		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + suite + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Suítes. */
	J('#condominio_filter_s').change(function(){
	
		var condominio = J(this).val();		

		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);	
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[8] + "&condominio=" + condominio;
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});

	/* Preço minímo. */
	J('#precoMin').keyup(function(e){

		var key = e.keyCode;
		
		/* Caso tenha sido a tecla enter que tenha sido pressionada. */
		if(key == 13) {	
			var PrecoMin = J(this).val();		
			Params = "";
			Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
			
			/* Requisição ajax é disparada. */
			J(this).SearchOffer(Params);
		}
	});	
	
	/* Preço máximo. */
	J('#precoMax').keyup(function(e){
	
		var key = e.keyCode;
		
		/* Caso tenha sido a tecla enter que tenha sido pressionada. */
		if(key == 13) {		
			var PrecoMax = J(this).val();		
			Params = "";
			Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + PrecoMax + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
			
			/* Requisição ajax é disparada. */
			J(this).SearchOffer(Params);
		}
	});
	
	/* Área miníma. */
	J('#areaMin').keyup(function(e){

		var key = e.keyCode;
		
		/* Caso tenha sido a tecla enter que tenha sido pressionada. */
		if(key == 13) {		
			var AreaMin = J(this).val();		
			Params = "";
			Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + AreaMin + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
			
			/* Requisição ajax é disparada. */
			J(this).SearchOffer(Params);
		}
	});	
	
	/* Área máxima. */
	J('#areaMax').keyup(function(e){

		var key = e.keyCode;
		
		/* Caso tenha sido a tecla enter que tenha sido pressionada. */
		if(key == 13) {		
			var AreaMax = J(this).val();		
			Params = "";
			Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + AreaMax + "&anuncio=" + param_url[7] + "&condominio=" + param_url[0];
			
			/* Requisição ajax é disparada. */
			J(this).SearchOffer(Params);
		}
	});	
	
	/* Tipo de anúncio. */
	J('.TipoAnuncio').click(function(){

		var anuncio = J(this).attr('aria-controls');
		anuncio = anuncio.split("#");
		
		Params = "";
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#areaMax').val() + "&anuncio=" + anuncio[0] + "&condominio=" + param_url[0];
		param_url[8] = anuncio[0];
		 
		J('#presentation-tag-comprar').removeClass('active');
		J('#presentation-tag-alugar').removeClass('active');
		J('#presentation-tag-favoritos').removeClass('active');
		J('#presentation-tag-todos').removeClass('active');
		J('#presentation-tag-lancamento').removeClass('active');
		J('#presentation-tag-temporada').removeClass('active');
		J('#presentation-tag-' + anuncio[0]).addClass('active');		
		
		/* A variável requisicao, se assegura para qual endereço enviar
		   a requisição Ajax.
		*/
		if(anuncio[0] == "favoritos") {
			requisicao = "favoritos";
		}
		else {
			requisicao = "";
		}

		/* A nova URL é montada e alterada no endereço do browser. */
		var urlN = URLWEB + "/" + param_url[8] + "/" + param_url[7] + "/" + param_url[6] + "/" + param_url[5] + "/" + param_url[4] + "/" + param_url[3] + "/" + param_url[2] + "/" + param_url[1] + "/" + param_url[0] + "/";
		window.history.replaceState(urlN, title, urlN);	

		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});	
	
	/* Ordenação. */
	J('#btn-ordenacao-por-valor').click(function(){

		var ordenar = J(this).attr('data-ordenar');
		
		if(ordenar == "asc") {
			J(this).attr('data-ordenar', 'desc');
			J("#ordenacao-por-valor").html("Ordenar do maior para o menor valor");
		}
		else {
			J(this).attr('data-ordenar', 'asc');
			J("#ordenacao-por-valor").html("Ordenar do menor para o maior valor");
		}
		
		Params = Params + "&uf=" + J('#uf').val() + "&city=" + J('#city_id').val() + "&bairro=" + J('#location').val() + "&tipo=" + J('#tipo_imovel').val() + "&partner=" + J('#partner_imovel').val() + "&quartos=" + J("#quantidade_quartos").val() + "&vagas=" + J('#quantidade_vagas').val() + "&banheiro=" + J('#quantidade_banhos').val() + "&suite=" + J('#quantidade_suites').val() + "&PrecoMin=" + J('#precoMin').val() + "&PrecoMax=" + J('#precoMax').val() + "&AreaMin=" + J('#areaMin').val() + "&AreaMax=" + J('#AreaMax').val() + "&anuncio=" + param_url[7] + "&ordenar=" + ordenar + "&condominio=" + param_url[0];
		
		/* Requisição ajax é disparada. */
		J(this).SearchOffer(Params);
	});
	
	/* Função que trata strings retirando os acentos. */
	J.fn.FormatString = function(string){			
		string = string.replace("Á",'a');
		string = string.replace("É",'e');
		string = string.replace("Í",'i');
		string = string.replace("Ó",'o');
		string = string.replace("Ú",'u');
		//string = encodeURIComponent(string);
		return string;
	}
	
	/* Função que trata requisição ajax. */
	J.fn.SearchOffer = function(Params){
		
		if(requisicao != "favoritos") {
			var urlFilterSearch = URLWEB + "/ajax/FilterSearch.php";
		}
		else {
			var urlFilterSearch = URLWEB + "/ajax/Favorite.php";
		}
		//alert(Params);
		if(Params != "") {
			jQuery.ajax({
			   type: 'POST',
			   url: urlFilterSearch,
			   data: "search=FiltroBusca" + Params,
			   beforeSend: function() {
					jQuery('.ul-resultado').css('display', 'none');
					jQuery('.LoadingImage').css('display', 'block');
				},
				success: function(r) {
					jQuery('.ul-resultado').html(r);
					jQuery('.ul-resultado').css('display', 'block');
					jQuery('.LoadingImage').css('display', 'none');
				}
			});
		}
	}
});