<section class="container listaProdutosCarousel">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-4 tituloProdutosBody" style="border-bottom: 1px solid #efefef;">
        <h4 class="corPreta Roboto RobotoBold">New Arrivals</h4>
    </div>
    <div class="col-12 col-sm-12 col-md-8 menuProdutosBody">
        <ul class="nav nav-list justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" id="sell-tab-carousel" data-toggle="tab" href="#sell-carousel" role="tab" aria-controls="sell-carousel" aria-selected="true">On Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="hot-tab-carousel" data-toggle="tab" href="#hot-carousel" role="tab" aria-controls="hot-carousel" aria-selected="false">Hot Sell</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="trend-tab-carousel" data-toggle="tab" href="#trend-carousel" role="tab" aria-controls="trend-carousel" aria-selected="false">Trend</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="best-tab-carousel" data-toggle="tab" href="#best-carousel" role="tab" aria-controls="best-carousel" aria-selected="false">Best Sell</a>
            </li>
        </ul>
    </div>

    <div class="col-md-12">
      <div class="tab-content" id="listaProdutosTab">
          <div class="tab-pane animated fadeIn show active" id="sell-carousel" role="tabpanel" aria-labelledby="sell-carousel-tab"> <!-- ON SELL PRODUTOS -->

              <div class="owl-carousel">
                <?php
                $where[] = "1=1";
                $limitemaisvendidos = 8;
                $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
                $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

                if($teams ){
                  foreach ($teams as $team) {
                    $link 			= getLinkOferta($team);
                    $imagem 		= getimagemoferta($team);
                    $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                    $precopor 		= number_format($team['team_price'], 2, ',', '.');
                    $precode		= number_format($team['market_price'], 2, ',', '.');
                    $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                    $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

                    ?>

                <div class="text-left">

                  <div class="produtoTabCarousel">
                    <div class="produtoTabImgCarousel">
                        <a href="#">
                            <img width="100%" height="100%" src="<?=$imagem?>"
                            data-lazy-src="<?=$imagem?>"
                            alt="<?=$titulo?>" class="lazyloaded" data-was-processed="true">
                        </a>
                    </div>

                    <div class="produtoTabInfoCarousel">
                        <h5><?=$titulo?></h5>
                        <span class="precoSpan">R$<?=$precopor?></span>
                    </div>

                  </div>

                </div>

                <?php
                  }
                }
                ?>

              </div>

          </div>

          <div class="tab-pane animated fadeIn" id="hot-carousel" role="tabpanel" aria-labelledby="hot-carousel-tab"> <!-- HOT SELL PRODUTOS -->
            <div class="owl-carousel">
              <?php
              $where[] = "1=1";
              $limitemaisvendidos = 8;
              $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
              $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

              if($teams ){
                foreach ($teams as $team) {
                  $link 			= getLinkOferta($team);
                  $imagem 		= getimagemoferta($team);
                  $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                  $precopor 		= number_format($team['team_price'], 2, ',', '.');
                  $precode		= number_format($team['market_price'], 2, ',', '.');
                  $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                  $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

                  ?>

              <div class="text-left">

                <div class="produtoTabCarousel">
                  <div class="produtoTabImgCarousel">
                      <a href="#">
                          <img width="100%" height="100%" src="<?=$imagem?>"
                          data-lazy-src="<?=$imagem?>"
                          alt="<?=$titulo?>" class="lazyloaded" data-was-processed="true">
                      </a>
                  </div>

                  <div class="produtoTabInfoCarousel">
                      <h5><?=$titulo?></h5>
                      <span class="precoSpan">R$<?=$precopor?></span>
                  </div>

                </div>

              </div>

              <?php
                }
              }
              ?>

            </div>
          </div>

          <div class="tab-pane animated fadeIn" id="trend-carousel" role="tabpanel" aria-labelledby="trend-carousel-tab"> <!-- TREND PRODUTOS -->

              <div class="owl-carousel">
                <?php
                $where[] = "1=1";
                $limitemaisvendidos = 8;
                $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
                $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

                if($teams ){
                  foreach ($teams as $team) {
                    $link 			= getLinkOferta($team);
                    $imagem 		= getimagemoferta($team);
                    $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                    $precopor 		= number_format($team['team_price'], 2, ',', '.');
                    $precode		= number_format($team['market_price'], 2, ',', '.');
                    $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                    $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

                    ?>

                <div class="text-left">

                  <div class="produtoTabCarousel">
                    <div class="produtoTabImgCarousel">
                        <a href="#">
                            <img width="100%" height="100%" src="<?=$imagem?>"
                            data-lazy-src="<?=$imagem?>"
                            alt="<?=$titulo?>" class="lazyloaded" data-was-processed="true">
                        </a>
                    </div>

                    <div class="produtoTabInfoCarousel">
                        <h5><?=$titulo?></h5>
                        <span class="precoSpan">R$<?=$precopor?></span>
                    </div>

                  </div>

                </div>

                <?php
                  }
                }
                ?>

              </div>

          </div>

          <div class="tab-pane animated fadeIn" id="best-carousel" role="tabpanel" aria-labelledby="best-carousel-tab"> <!-- BEST SELL PRODUTOS -->

            <div class="owl-carousel">
              <?php
              $where[] = "1=1";
              $limitemaisvendidos = 8;
              $order = " order by contadorpedidos DESC, id limit $limitemaisvendidos";
              $teams = DB::LimitQuery('team', array('condition' => $where, 'order' => "$order", ));

              if($teams ){
                foreach ($teams as $team) {
                  $link 			= getLinkOferta($team);
                  $imagem 		= getimagemoferta($team);
                  $titulo 		= utf8_decode(displaySubStringWithStrip($team[title],130));
                  $precopor 		= number_format($team['team_price'], 2, ',', '.');
                  $precode		= number_format($team['market_price'], 2, ',', '.');
                  $economia 		= number_format($team['market_price'] - $team['team_price'],2, ',', '.');
                  $porcentagem  	= round(100 - $team['team_price']/$team['market_price']*100,0);

                  ?>

              <div class="text-left">

                <div class="produtoTabCarousel">
                  <div class="produtoTabImgCarousel">
                      <a href="#">
                          <img width="100%" height="100%" src="<?=$imagem?>"
                          data-lazy-src="<?=$imagem?>"
                          alt="<?=$titulo?>" class="lazyloaded" data-was-processed="true">
                      </a>
                  </div>

                  <div class="produtoTabInfoCarousel">
                      <h5><?=$titulo?></h5>
                      <span class="precoSpan">R$<?=$precopor?></span>
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
