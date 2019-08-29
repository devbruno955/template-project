J('document').ready(function(){
	
	var place = "";
	var city = "";
	var state = "";
	var address = "";
	
	/* Assim que o usuário soltar a tecla, o valor é capturado. Se diferente
	de vazio, é disparado uma requisição Ajax.
	*/
	J('#location').keyup(function(){

		place = J(this).val();
		
		if(place != ""){
			
			J('.ListPlace').css('display', 'none');
			J(this).SearchTeam(place);
		}
		else
		{
			J('.ListPlace').css('display', 'none');
		}
	});

	J('.CityChoose').click(function(){

		address = J(this).attr('name');		
		J('#location').val("");
		J('#location').val(address);
		J('.ListPlace').css('display', 'none');
	});
	
	J.fn.SetCity = function(place){
		
		if(place != "") {
			J("#location").val("");
			J("#location").val(place);
			J(".ListPlace").css('display', 'none');
		}
		else {
			window.alert("Ocorreu um erro inesperado. Tente novamente mais tarde!");
			return false;
		}
	}
	
	/* Requisição Ajax busca sugestões de anúncios de acordo com o buscado pelo cliente. */
	J.fn.SearchTeam = function(place){
	
		city = J('#city').val();
		state = J('#uf').val();
		
		jQuery.ajax({
			url: URLWEB + "/ajax/SearchPlace.php",
			type: 'post',
			data: "place=" + place + "&city=" + city + "&state=" + state + "&type=search-place",
			success: function(retorno){
				if(retorno){
					J('.ListPlace').css('display', 'block');
					J('.ListPlace').html(retorno);
				}  	  
			}
		});			
	}
});