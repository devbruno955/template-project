<section class="container listaProdutosPopulares">
  <div class="row">

    <div class="col-md-12 text-left">
      <h4 class="negrito Roboto RobotoBold">Popular Products</h4>
    </div>

    <?php
    $where[] = "1=1";
    $limitemaisvendidos = 4;
    $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
    $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

    if($teams ){
      foreach ($teams as $team) {
        $link 			= getLinkOferta($team);
        $imagem 		= getimagemoferta($team);
        $categoria = $Categoria->getCategoria($team['group_id']) ;
        $nomecategoria =  $categoria['name'];
        $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
        $precopor 		= number_format($team['team_price'], 2, ',', '.');
        $precode		= number_format($team['market_price'], 2, ',', '.');
        $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
        $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

        ?>
        <div class="col-md-3 text-left produtoPopular">

            <div class="produtoTab">
              <div class="xs-product-header media woocommerce xs-wishlist ">
                <div class="star-rating animated faster fadeInDown">
                  <span style="width:100%"></span>
                  </div>

                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-2333">
                  <div class="yith-wcwl-add-button show" style="display:block">
                    <a href="/marketo/furniture/?add_to_wishlist=2333" class="add_to_wishlist animated faster fadeInDown">
                      <i class="far fa-heart"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div class="produtoTabImg">
                  <a href="#">
                      <img src="<?=$imagem?>"
                      data-lazy-src="<?=$imagem?>"
                      alt="<?=$titulo?>" class="lazyloaded" data-was-processed="true">
                  </a>
              </div>

              <a href="#">
                <div class="produtoTabInfo">
                    <p><?=$nomecategoria?></p>
                    <h5><?=$titulo?></h5>
                    <?php
                    if($team['market_price'] != "0.01" && $team['market_price'] != "0.00") {
            if($team['market_price'] != $team['team_price']) {
                    ?>
                    <span class="precoSpan precoAntigo">R$<?=$precode?></span>
                    <?php }} ?>
                    <span class="precoSpan">R$<?=$precopor?></span>
                </div>
              </a>

              <div class="produtoTabHover animated fadeInUp faster clearfix">
                <div class="xs-addcart woocommerce text-center">
                  <a href="https://wp.xpeedstudio.com/marketo/furniture/product/heavy-duty-antis/" data-quantity="1" class="button add_to_cart_button">
                    <i class="fas fa-shopping-basket"></i> Select options
                  </a>
                </div>
              </div>
            </div>

        </div>
        <?php
      }
    }

    ?>



  </div>
</section>
