<section class="container listaProdutosBody">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-4 tituloProdutosBody" style="border-bottom: 1px solid #efefef;">
        <h4 class="corPreta Roboto RobotoBold">New Arrivals</h4>
    </div>
    <div class="col-12 col-sm-12 col-md-8 menuProdutosBody" style="border-bottom: 1px solid #efefef;">
        <ul class="nav nav-list justify-content-end">
            <li class="nav-item produtosBody">
              <a class="nav-link active" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="true">On Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="hot-tab" data-toggle="tab" href="#hot" role="tab" aria-controls="hot" aria-selected="false">Hot Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="trend-tab" data-toggle="tab" href="#trend" role="tab" aria-controls="trend" aria-selected="false">Trend</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="best-tab" data-toggle="tab" href="#best" role="tab" aria-controls="best" aria-selected="false">Best Sell</a>
            </li>
        </ul>
    </div>

    <div class="col-md-12">
      <div class="tab-content" id="listaProdutosTab">
          <div class="tab-pane fade show active" id="sell" role="tabpanel" aria-labelledby="sell-tab"> <!-- ON SELL PRODUTOS -->
              <div class="row">

                <?php
                $where[] = "1=1";
                $limitemaisvendidos = 4;
                $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
                $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

                if($teams ){
                  foreach ($teams as $team) {
                    $link 			= getLinkOferta($team);
                    $categoria = $Categoria->getCategoria($team['group_id']) ;
                  	$nomecategoria =  $categoria['name'];
                    $imagem 		= getimagemoferta($team);
                    $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                    $precopor 		= number_format($team['team_price'], 2, ',', '.');
                    $precode		= number_format($team['market_price'], 2, ',', '.');
                    $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                    $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

                ?>
                <div class="col-md-3 text-left produtoItem">

                  <div class="produtoTab">
                    <div class="xs-product-header media woocommerce xs-wishlist ">
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
                            <img width="100%" height="100%" src="<?=$imagem?>"
                            data-lazy-src="<?=$imagem?>"
                            alt="Heavy Duty Antis" class="lazyloaded" data-was-processed="true">
                        </a>
                    </div>

                    <div class="produtoTabInfo">
                        <p class="categoriaProduto"><?=$nomecategoria?></p>
                        <h5 class="tituloProduto"><a href="#"><?=$titulo?></a></h5>
                        <span class="precoSpan"><?=$precopor?></span>
                    </div>

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
          </div>

          <div class="tab-pane fade" id="hot" role="tabpanel" aria-labelledby="hot-tab"> <!-- HOT SELL PRODUTOS -->
            <div class="row">

              <?php
              $where[] = "1=1";
              $limitemaisvendidos = 4;
              $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
              $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

              if($teams ){
                foreach ($teams as $team) {
                  $link 			= getLinkOferta($team);
                  $categoria = $Categoria->getCategoria($team['group_id']) ;
                  $nomecategoria =  $categoria['name'];
                  $imagem 		= getimagemoferta($team);
                  $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                  $precopor 		= number_format($team['team_price'], 2, ',', '.');
                  $precode		= number_format($team['market_price'], 2, ',', '.');
                  $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                  $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

              ?>
              <div class="col-md-3 text-left produtoItem">

                <div class="produtoTab">
                  <div class="xs-product-header media woocommerce xs-wishlist ">
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
                          <img width="100%" height="100%" src="<?=$imagem?>"
                          data-lazy-src="<?=$imagem?>"
                          alt="Heavy Duty Antis" class="lazyloaded" data-was-processed="true">
                      </a>
                  </div>

                  <div class="produtoTabInfo">
                      <p class="categoriaProduto"><?=$nomecategoria?></p>
                      <h5 class="tituloProduto"><a href="#"><?=$titulo?></a></h5>
                      <span class="precoSpan"><?=$precopor?></span>
                  </div>

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
          </div>

          <div class="tab-pane fade" id="trend" role="tabpanel" aria-labelledby="trend-tab"> <!-- TREND PRODUTOS -->
            <div class="row">

              <?php
              $where[] = "1=1";
              $limitemaisvendidos = 4;
              $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
              $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

              if($teams ){
                foreach ($teams as $team) {
                  $link 			= getLinkOferta($team);
                  $categoria = $Categoria->getCategoria($team['group_id']) ;
                  $nomecategoria =  $categoria['name'];
                  $imagem 		= getimagemoferta($team);
                  $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                  $precopor 		= number_format($team['team_price'], 2, ',', '.');
                  $precode		= number_format($team['market_price'], 2, ',', '.');
                  $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                  $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

              ?>
              <div class="col-md-3 text-left produtoItem">

                <div class="produtoTab">
                  <div class="xs-product-header media woocommerce xs-wishlist ">
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
                          <img width="100%" height="100%" src="<?=$imagem?>"
                          data-lazy-src="<?=$imagem?>"
                          alt="Heavy Duty Antis" class="lazyloaded" data-was-processed="true">
                      </a>
                  </div>

                  <div class="produtoTabInfo">
                      <p class="categoriaProduto"><?=$nomecategoria?></p>
                      <h5 class="tituloProduto"><a href="#"><?=$titulo?></a></h5>
                      <span class="precoSpan"><?=$precopor?></span>
                  </div>

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
          </div>

          <div class="tab-pane fade" id="best" role="tabpanel" aria-labelledby="best-tab"> <!-- BEST SELL PRODUTOS -->
            <div class="row">

              <?php
              $where[] = "1=1";
              $limitemaisvendidos = 4;
              $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
              $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

              if($teams ){
                foreach ($teams as $team) {
                  $link 			= getLinkOferta($team);
                  $categoria = $Categoria->getCategoria($team['group_id']) ;
                  $nomecategoria =  $categoria['name'];
                  $imagem 		= getimagemoferta($team);
                  $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                  $precopor 		= number_format($team['team_price'], 2, ',', '.');
                  $precode		= number_format($team['market_price'], 2, ',', '.');
                  $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                  $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

              ?>
              <div class="col-md-3 text-left produtoItem">

                <div class="produtoTab">
                  <div class="xs-product-header media woocommerce xs-wishlist ">
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
                          <img width="100%" height="100%" src="<?=$imagem?>"
                          data-lazy-src="<?=$imagem?>"
                          alt="Heavy Duty Antis" class="lazyloaded" data-was-processed="true">
                      </a>
                  </div>

                  <div class="produtoTabInfo">
                      <p class="categoriaProduto"><?=$nomecategoria?></p>
                      <h5 class="tituloProduto"><a href="#"><?=$titulo?></a></h5>
                      <span class="precoSpan"><?=$precopor?></span>
                  </div>

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
          </div>
        </div>
    </div>
  </div>
</section>
