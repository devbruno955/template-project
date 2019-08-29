<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
	<?php require_once(DIR_BLOCO."/header.php"); 										// HEADER TEMPLATE
	?>
  <body>

	  <div id="overlayCategories" class="overlayCategories"></div> 		<!-- OVERLAY (EFEITO FUNDO PRETO) -->

	  <?php require_once(DIR_BLOCO."/pesquisaM.php"); 							// PESQUISA VERSAO MOBILE
		?>

    <?php require_once(DIR_BLOCO."/menu.php"); 										// MENU
		?>

		<?php require_once(DIR_BLOCO."/menuM.php"); 									// MENU MOBILE
		?>

		<?php require_once(DIR_BLOCO."/sliderHeader.php"); 						// SLIDER HEADER (PRIMEIRO)
		?>

		<?php require_once(DIR_BLOCO."/banners.php"); 								// BANNERS (2)
		?>

		<?php require_once(DIR_BLOCO."/listaProdutos.php"); 					// TAB DE PRODUTOS
		?>

		<?php require_once(DIR_BLOCO."/listaInfoIcons.php"); 					// LISTA DE INFORMAÇÕES DA LOJA (COM ICONES)
		?>

		<?php require_once(DIR_BLOCO."/sliderMiddle.php"); 						// SLIDER MIDDLE (SEGUNDO)
		?>

		<?php require_once(DIR_BLOCO."/listaProdutosCarousel.php"); 	// TAB DE PRODUTOS EM CAROUSEL
		?>

		<?php require_once(DIR_BLOCO."/categorias.php"); 							// CATEGORIAS
		?>

		<?php require_once(DIR_BLOCO."/listaProdutosPopulares.php"); 	// LISTA DE PRODUTOS POPULARES
		?>

		<?php require_once(DIR_BLOCO."/noticias.php"); 								// NOTICIAS
		?>

		<?php require_once(DIR_BLOCO."/referencias.php"); 						// REFERENCIAS
		?>

		<?php require_once(DIR_BLOCO."/newsletter.php"); 							// NEWSLETTER (CAPTURAR EMAIL)
		?>

		<?php require_once(DIR_BLOCO."/mapaSiteFooter.php"); 					// MAPA DO SITE
		?>

		<?php require_once(DIR_BLOCO."/footer.php"); 									// FOOT>
		?>

		<!-- CARRINHO DE COMPRAS -->
		<div id="cart-model" class="cart-model">
        <div id="cart" class="cart">
          <div class="header-cart">
            <h4>Shopping Cart</h4>
            <a id="closeCart" href="#">
              <span class="close-cart">
                <i class="fas fa-times"></i>
              </span>
            </a>
          </div>
          <div class="content-cart">
            <p>No products in the cart.</p>
          </div>
        </div>
    </div>


    <!-- SCRIPTS .JS DEPOIS HEADER !-->
    <script src="<?=DIR_TEMPLATE_F?>/js/bootstrap.min.js"></script>
    <script src="<?=DIR_TEMPLATE_F?>/js/owl.carousel.min.js"></script>
    <script src="<?=DIR_TEMPLATE_F?>/js/main.js" charset="utf-8"></script>


  </body>
</html>
