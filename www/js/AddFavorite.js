
/* O anúncio escolhido é adicionado na lista de favoritos, que fica
   ativo enquanto estiver no site.
 */
J('document').ready(function(){
	
	/* Adiciona o anúncio nos favoritos. */
	J('.btn-favorito, .btn-favorito-active').click(function() {
		
		var IdAnuncio = J(this).attr('data-id');
		J(this).AddFavorite(IdAnuncio);
	});

	J.fn.AddFavorite = function(IdAnuncio){			
		
		var id = IdAnuncio;
		var urlFilterSearch = URLWEB + "/ajax/AddFavorite.php";
		
		if(id != "") {
		
			/* Caso o ID tenha sido enviado corretamente, é enviado uma requisição Ajax. */
			jQuery.ajax({
			   type: 'POST',
			   url: urlFilterSearch,
			   data: "action=AddFavorite&id=" + id,
			   beforeSend: function() {
					jQuery('.ul-resultado').css('display', 'none');
					jQuery('.LoadingImage').css('display', 'block');
				},
				success: function(r) {
					jQuery('.ul-resultado').css('display', 'block');
					jQuery('.LoadingImage').css('display', 'none');
					if(r == 1){
						jQuery('#btn'+id).removeClass('btn-favorito');
						jQuery('#btn'+id).addClass('btn-favorito-active');
						jQuery('#img'+id).attr('src', URLWEB+'/skin/padrao/images/heart.png');

						window.alert("Anúncio adicionado com sucesso!");
					}else{
						jQuery('#btn'+id).removeClass('btn-favorito-active');
						jQuery('#btn'+id).addClass('btn-favorito');
						jQuery('#img'+id).attr('src', URLWEB+'/skin/padrao/images/heart-grey.png');
						window.alert("Anúncio removido dos favoritos com sucesso!");
					}
				}
			});
		}
		else {
			
			/* Caso o ID não tenha sido enviado corretamente. */
			window.alert("Ocorreu um erro inesperado. Tente novamente mais tarde.");
			return false;
		}
	}
});