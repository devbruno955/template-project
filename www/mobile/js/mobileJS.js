
jQuery('document').ready(function(){
	
	jQuery('.navigation a').click(function() {		
		jQuery('.navigationMobile').toggleClass('hidden');
	});	
	
	jQuery('.rowForm').hide();
	
	jQuery(".rslides").responsiveSlides({
		manualControls: '#slider3-pager',
	});
	
	//jQuery('#txtTel').mask('(99) 9999-9999');
	
	jQuery('.linkNavForm a').click(function(){
		
		var data = jQuery(this).attr('data-id');
		
		if(data == 'show') {
			jQuery('.rowForm').show();
			jQuery(this).attr('data-id', 'hidden');
			jQuery(this).html("Ocultar busca");
		}
		else {
			jQuery('.rowForm').hide();
			jQuery(this).attr('data-id', 'show');	
			jQuery(this).html("Exibir busca");			
		}	
	});	
});