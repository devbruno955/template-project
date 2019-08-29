<div id="searchMobile" class="container-fluid">
  <div class="row">

    <div class="col-lg-6 col-12 col-sm-12 col-12">
            <form class="xs-navbar-search xs-navbar-search-wrapper" action="https://wp.xpeedstudio.com/marketo/furniture/" method="get" id="header_form">
              <div class="input-group">
                <input type="search" name="searchItem" id="searchItem" class="form-control" placeholder="Find your product">
                <div class="xs-category-select-wraper"> <i class="xs-spin"></i>
                  <div class="select">
                    <div id="selectCategories" class="select-styled corPreta negrito"><span rel="0">Todas Categorias</span> <i class="fa fa-angle-down" style="position:absolute;right:15px;"></i></div>

                    <ul id="selectCategoriesOptions" class="select-options" style="display: none;">
                      <?php
              				$SqlCategory = "select * from category where display = 'Y' order by sort_order desc, id";
              				$RsCategory = mysql_query($SqlCategory);

              				?>
                        <li rel="0">Todas Categorias</li>
                      <?php while($OptionCategory = mysql_fetch_assoc($RsCategory)) { ?>
          							<li rel="<?php echo $OptionCategory['id']; ?>"><?php echo utf8_decode($OptionCategory['name']); ?></option>
          						<?php } ?>
                    </ul>
                  </div>
                </div>

                <div class="input-group-btn group-searchItem">
                  <input type="hidden" id="search-param" name="post_type" value="product">
                  <button type="submit" class="btn btn-primary btn-searchItem"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>

            <div class="ajax-search" id="resSearchItem">
              <ul>
              </ul>
              <div class="verMais">
                <a href="https://wp.xpeedstudio.com/marketo/furniture?s=a&amp;post_type=product"> Ver Mais</a>
              </div>
            </div>
          </div>

  </div>
</div>
