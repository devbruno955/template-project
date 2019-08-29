$(document).ready(function(){
  function animateHide(element, animationName) {
      const node = document.querySelector(element)
      node.classList.add('animated', animationName)

      function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        $(element).hide();
    }

    node.addEventListener('animationend', handleAnimationEnd)
  }

  function animateShow(element, animationName) {
      const node = document.querySelector(element)

      node.classList.add('animated', animationName)
      $(element).show();
  }

  function animateShowOver(element, animationName) {
      const node = document.querySelector(element)

      node.classList.add('animated-overlay', animationName)
      $(element).show();
  }

  $('.owl-carousel').owlCarousel({
    loop:true,
    lazyLoad: true,
    margin:10,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        761: {
            items:2
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
    });

  $('#selectCategoriesDesk').click(function(){

    if($("#selectCategoriesOptionsDesk").is(":visible"))
      $('#selectCategoriesOptionsDesk').hide();
    else
      $('#selectCategoriesOptionsDesk').show();

  });

  $('#selectCategories').click(function(){

    if($("#selectCategoriesOptions").is(":visible"))
      $('#selectCategoriesOptions').hide();
    else
      $('#selectCategoriesOptions').show();

  });

  $("#cartLink").click(function(){

    if($(".cart-model").is(":visible")){
      animateHide("#cart-model", "fadeOut");
      animateHide("#cart", "bounceOutRight");
    }else{
      animateShow("#cart-model", "fadeIn");
      animateShow("#cart", "bounceInRight");
    }

  });

  $("#cartLinkMob").click(function(){
    console.log($(".cart-model").is(":visible"));
    if($(".cart-model").is(":visible")){
      animateHide("#cart-model", "fadeOut");
      animateHide("#cart", "bounceOutRight");
    }else{
      animateShow("#cart-model", "fadeIn");
      animateShow("#cart", "bounceInRight");
    }

  });

  $("#closeCart").click(function(){
        animateHide("#cart-model", "fadeOut");
        animateHide("#cart", "bounceOutRight");
  });


  $("#allCategories").click(function(){
    //console.log($("#allCategoriesDropdown").is(":visible"));

    if($("#allCategoriesDropdown").is(":visible")){
      animateHide("#overlayCategories", "fadeOut");
      animateHide('#allCategoriesDropdown', 'bounceOutDown');
    }else{
      animateShow("#overlayCategories", "fadeIn");
      animateShow('#allCategoriesDropdown', 'bounceInUp');
    }

  })

  $( "#searchItem" ).keyup(function( e ) {
    if(e.target.value !== '')
      $("#resSearchItem").show();
    else
      $("#resSearchItem").hide();
  });

  $( "#searchItemDesk" ).keyup(function( e ) {
    if(e.target.value !== ''){
      $.ajax({
  			url: "/ajax/SearchTopNew.php",
  			type: 'post',
  			data: "query=" + e.target.value + "&type=team&cat=" + ($("#selectCategoriesDesk span").attr('rel')),
  			success: function(retorno){
  				if(retorno){
            $(".ajax-search").show();
  					//alert(retorno);
  					$('.ajax-search ul').html(retorno);
  				}
  			}
  		});
    }
    else{
      $("#resSearchItemDesk").hide();
    }
  });

  $( "#searchItem" ).keyup(function( e ) {
    if(e.target.value !== ''){
      $.ajax({
  			url: "/ajax/SearchTopNew.php",
  			type: 'post',
  			data: "query=" + e.target.value + "&type=team&cat=" + ($("#selectCategoriesDesk span").attr('rel')),
  			success: function(retorno){
  				if(retorno){
            $(".ajax-search").show();
  					//alert(retorno);
  					$('.ajax-search ul').html(retorno);
  				}
  			}
  		});
    }
    else{
      $("#resSearchItem").hide();
    }
  });


  $( "#selectCategoriesOptionsDesk li" ).click(function( e ){
    $("#selectCategoriesDesk span").html(e.target.innerText) ;
    $("#selectCategoriesDesk span").attr('rel', $(e.target).attr('rel'));
  });

  $( "#searchLinkMob" ).click(function( e ) {
    console.log($("#searchMobile").is(":visible"));
    if($("#searchMobile").is(":visible"))
      animateHide("#searchMobile", "bounceOutDown");
    else
      animateShow("#searchMobile", "bounceInUp");

  });

  $( "#closeMenuMob" ).click(function(){
      $('#overlay-mobile').hide();
      $('#menu-mobile').hide();
  })

  $( "#overlay-mobile" ).click(function(){
      $('#overlay-mobile').hide();
      $('#menu-mobile').hide();
  })

  $( "#openMenuMob" ).click(function(){

    if($("#menu-mobile").is(":visible")){
      $('#overlay-mobile').hide();
      $('#menu-mobile').hide();
    }else{
      $('#overlay-mobile').show();
      $('#menu-mobile').show();
    }

  })


  $( "#newsletterEmailBtn" ).click( function() {
    email = $("#newsletterEmail").val();
  	nome = $("#newsletterEmail").val();

  	if(nome == "" || nome == "Seu nome"){

  		alert("Informe o seu nome")
  		document.getElementById("newsletterEmail").focus();
  		return;
  	}
  	if(email == "" || email == "Seu e-mail"){

  		alert("Informe o seu email")
  		document.getElementById("newsletterEmail").focus();
  		return;
  	}

  	$.ajax({
  		   type: "POST",
  		   cache: false,
  		   async: false,
  		   url: "/newsletter.php",
  		   data: "email="+email+"&nome="+nome,
  		   success: function(msg){

  		   if( jQuery.trim(msg)=="1"){
  				 alert("Obrigado ! Seu email foi cadastrado com sucesso!");
  			}
  		   else {
          alert(msg)
  				}
  			 }
  		 });
  })

  $(document).on('click', function (e) {

    if($("#allCategoriesDropdown").is(":visible")){
      if(e.target.id == 'overlayCategories'){
        animateHide('#overlayCategories', 'fadeOut');
        animateHide('#allCategoriesDropdown', 'bounceOutDown');
      }
    }

    if( $(".ajax-search").is(":visible") )
      $(".ajax-search").hide();

    if( (e.target.id != 'selectCategories') && (e.target.id != 'selectCategoriesOptions') )
      $('#selectCategoriesOptions').hide();

    if( (e.target.id != 'selectCategoriesDesk') && (e.target.id != 'selectCategoriesOptionsDesk') )
      $('#selectCategoriesOptionsDesk').hide();

    if( (e.target.id == 'cart-model') ){
      animateHide("#cart-model", "fadeOut");
      animateHide("#cart", "bounceOutRight");
    }

      console.log(e.target.id);
  });

});
