<header class="xs-header header-shadow">

  <!-- PRIMEIRA PARTE HEADER -->
    <div class="xs-navBar fundoLaranja">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-4 xs-order-1 flex-middle">
            <div class="xs-logo-wraper">
              <a class="xs_default_logo" href="https://wp.xpeedstudio.com/marketo/furniture/">
                <img src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/10/logo.png" alt="furniture" class="lazyloading" data-was-processed="true">
              </a>
            </div>
          </div>

          <div class="col-lg-6 col-sm-3 xs-order-3 xs-menus-group">
            <form class="xs-navbar-search xs-navbar-search-wrapper" action="https://wp.xpeedstudio.com/marketo/furniture/" method="get" id="header_form">
              <div class="input-group">
                <input type="search" name="searchItem" id="searchItemDesk" class="form-control" placeholder="Find your product">
                <div class="xs-category-select-wraper"> <i class="xs-spin"></i>
                  <div class="select">
                    <div id="selectCategoriesDesk" class="select-styled corPreta negrito selectCategoriesDesk">
                      <span id="selectCategoriesDesk" rel="0">Todas Categorias</span> <i id="selectCategoriesDesk" class="fa fa-angle-down selectCategoriesDesk" style="position:absolute;right:15px;"></i>
                    </div>

                    <ul id="selectCategoriesOptionsDesk" class="select-options">
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

                <div class="input-group-btn">
                  <input type="hidden" id="search-param" name="post_type" value="product">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>

            <div class="ajax-search" id="resSearchItemDesk">
              <ul></ul>
              <div class="verMais">
                <a href="https://wp.xpeedstudio.com/marketo/furniture?s=a&amp;post_type=product"> Ver Mais</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-sm-5 xs-order-2 xs-wishlist-group">
            <div class="xs-wish-list-item">
              <span class="xs-wish-list">
                <a href="https://wp.xpeedstudio.com/marketo/furniture/wishlist/" class="xs-single-wishList">
              <span class="xs-item-count negrito">0</span>
              <i class="icon icon-heart"></i>
              </a>
            </span>
            <div class="xs-miniCart-dropdown">
              <a id="cartLink" href="#" class="xs-single-wishList offset-cart-menu">
                <span class="xs-item-count fundoPreto corBranca negrito">0</span>
                <i class="icon icon-bag"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <!-- FIM SEGUNDA PARTE -->

  <!-- SEGUNDA PARTE HEADER -->
    <div class="xs-navDown navDown-v7" >
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-none d-md-none d-lg-block borderSeparador">
            <div class="cd-dropdown-wrapper xs-vartical-menu">
              <a id="allCategories" class="cd-dropdown-trigger negrito" href="#"> <i class="fa fa-list-ul"></i> All Categories <i class="fas fa-angle-down"></i></a>
              <div id="allCategoriesDropdown" class="all-categories-dropdown">
                <ul class="menu-categories">
                  <li class="hasSubMenuMosaicoRight">
                    <a href="#"><i class="fas fa-desktop"></i> Accessories <i class="fas fa-chevron-right"></i></a>
                    <div class="right-mosaico hidden animated fadeIn">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4 mosaico-accessories">
                            <div>
                              <h6>Accessories</h6>
                              <ul>
                                <li><a href="#">Samsung TV</a></li>
                                <li><a href="#">Mobile</a></li>
                                <li><a href="#">Laptop</a></li>
                                <li><a href="#">Headphone</a></li>
                                <li><a href="#">Camera</a></li>
                              </ul>
                            </div>

                            <div>
                              <h6>Tops</h6>
                              <ul>
                                <li><a href="#">Samsung TV</a></li>
                                <li><a href="#">Mobile</a></li>
                                <li><a href="#">Laptop</a></li>
                                <li><a href="#">Headphone</a></li>
                                <li><a href="#">Camera</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div>
                              <h6>Bottoms</h6>
                              <ul>
                                <li><a href="#">Speaker</a></li>
                                <li><a href="#">Portable</a></li>
                                <li><a href="#">Google Glass</a></li>
                                <li><a href="#">Drone</a></li>
                                <li><a href="#">Bluetooth</a></li>
                              </ul>
                            </div>

                            <div>
                              <h6>Hot Categories</h6>
                              <ul>
                                <li><a href="#">Speaker</a></li>
                                <li><a href="#">Portable</a></li>
                                <li><a href="#">Google Glass</a></li>
                                <li><a href="#">Drone</a></li>
                                <li><a href="#">Bluetooth</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div>
                              <h6>Bottoms</h6>
                              <ul>
                                <li><a href="#">Watch</a></li>
                                <li><a href="#">Speaker</a></li>
                                <li><a href="#">Projector</a></li>
                                <li><a href="#">Gamepad</a></li>
                                <li><a href="#">3d Glass</a></li>
                              </ul>
                            </div>

                            <div>
                              <h6>Outwear</h6>
                              <ul>
                                <li><a href="#">Watch</a></li>
                                <li><a href="#">Speaker</a></li>
                                <li><a href="#">Projector</a></li>
                                <li><a href="#">Gamepad</a></li>
                                <li><a href="#">3d Glass</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="hasSubMenuMosaicoRight">
                    <a href="#"><i class="fas fa-chair"></i> Furniture <i class="fas fa-chevron-right"></i></a>
                    <div class="right-mosaico hidden animated fadeIn">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4 mosaico-accessories">
                            <div class="text-center">
                              <img width="247" height="150" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/1-6.jpg"
                              data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/1-6.jpg"
                              alt="" data-was-processed="true">
                              <p><a href="#">World Class Sofa</a></p>
                            </div>

                            <div class="text-center">
                              <img width="247" height="150" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/3-3.jpg"
                              data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/3-3.jpg"
                              alt="" data-was-processed="true">
                              <p><a href="#">Laptop Bags & Cases</a></p>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="text-center">
                              <img width="247" height="150" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-3.jpg"
                              data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-3.jpg"
                              alt="" data-was-processed="true">
                              <p><a href="#">Wireless Speaker</a></p>
                            </div>

                            <div class="text-center">
                              <img width="247" height="150" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-3-1.jpg"
                              data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-3-1.jpg"
                              alt="" data-was-processed="true">
                              <p><a href="#">4K Monitor</a></p>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="text-center">
                              <img width="247" height="150" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-6.jpg"
                              data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-6.jpg"
                              alt="" data-was-processed="true">
                              <p><a href="#">Table Lamp Camera</a></p>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="hasSubMenuMosaicoRight">
                    <a href="#"><i class="far fa-star"></i> Smart chair <i class="fas fa-chevron-right"></i></a>
                    <div class="right-mosaico hidden animated fadeIn">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/2-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/2-71x70.jpg"
                                alt="Xpeed Wall Mat" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">World Class Sofa</h6>
                                <p class="precoSpan">$110.00 - $240.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2013/06/1-1-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2013/06/1-1-71x70.jpg"
                                alt="3D Glass" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">3D Glass</h6>
                                <p class="precoSpan">$20,000.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex"
                                src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-1-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/Untitled-1-71x70.jpg"
                                alt="Mini 3D Glass" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Mini 3D Glass</h6>
                                <p class="precoSpan">$220.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-5-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-5-71x70.jpg"
                                alt="Golden Bluetooth" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Golden Bluetooth</h6>
                                <p class="precoSpan">$1,500.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex " src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                alt="Apple iPhone 6s" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Apple iPhone 6s</h6>
                                <p class="precoSpan">$2,800.00 - $3,400.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/2-71x70.jpg"
                                alt="Bluetooth Gamepad" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Bluetooth Gamepad</h6>
                                <p class="precoSpan">$199.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex "
                                src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                alt="Bluetooth Speaker" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Bluetooth Speaker</h6>
                                <p class="precoSpan">$4,000.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex"
                                src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/1-2-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/05/1-2-71x70.jpg"
                                alt="Gaming Headphones" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Gaming Headphones</h6>
                                <p class="precoSpan">$42.00</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 mosaico-accessories">
                            <div class="mosaico-produto">
                              <div class="mosaico-produtoImg">
                                <img class="d-flex" src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                data-lazy-src="https://wp.xpeedstudio.com/marketo/furniture/wp-content/uploads/sites/17/2018/08/3-1-71x70.jpg"
                                alt="Apple iPhone 6s" data-was-processed="true">
                              </div>
                              <div class="mosaico-produtoInfo">
                                <h6 class="negrito">Apple iPhone 6s</h6>
                                <p class="precoSpan">$299.00</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li><a href="#"><i class="far fa-paper-plane"></i> Room Accessories</a></li>
                  <li><a href="#"><i class="fas fa-hand-holding-usd"></i> Kitchenware</a></li>
                  <li><a href="#"><i class="fas fa-tablet-alt"></i> Home Decoration</a></li>
                  <li><a href="#"><i class="fas fa-microphone-slash"></i> Innovative Furniture</a></li>
                </ul>
              </div>
            </div>

          </div>

          <div class="col-md-6">
            <nav class="xs-menus xs_nav-landscape ">
              <div class="nav-header">
                <div class="nav-toggle"></div>
              </div>
              <div class="nav-menus-wrapper" style="transition-property: none;">
                <span class="nav-menus-wrapper-close-button">✕</span>
                <span class="nav-menus-wrapper-close-button">✕</span>
                <div class=" ">
                  <ul id="main-menu" class="nav-menu lg-menu">
                    <li id="menu-item-478">
                      <a title="Home" href="#">Home</a>
                    </li>
                    <li id="menu-item-558" class="hasSubMenu">
                      <a title="Pages" href="#">Pages <span class="submenu-indicator"><span class="submenu-indicator-chevron"></span></span></a>
                      <ul role="menu" class="nav-dropdown animated fadeIn" style="right: 0px; display: none;">
                        <li id="menu-item-1091" class="menu-item-1091">
                          <a title="About Us" href="https://wp.xpeedstudio.com/marketo/furniture/about-us/">About Us</a>
                        </li>
                        <li id="menu-item-1133" class="menu-item-1133">
                          <a title="Contact" href="https://wp.xpeedstudio.com/marketo/furniture/contact/">Contact</a>
                        </li>
                        <li id="menu-item-1135" class="menu-item-1135">
                          <a title="FAQ" href="https://wp.xpeedstudio.com/marketo/furniture/faq/">FAQ</a>
                        </li>
                        <li id="menu-item-1134" class="menu-item-1134">
                          <a title="Terms and Conditions" href="https://wp.xpeedstudio.com/marketo/furniture/terms-and-conditions/">Terms and Conditions</a>
                        </li>
                        <li id="menu-item-563" class=" menu-item-563 hasSubMenuRight">
                          <a title="Products" href="#">Products <i class="fas fa-chevron-right" style="font-size:0.6rem;position:absolute;right:10px;top:19px;"></i></a>
                          <ul role="menu animated fadeIn">
                            <li id="menu-item-1164" class="menu-item-1164">
                              <a title="Product Category" href="https://wp.xpeedstudio.com/marketo/furniture/product-category/">Product Category</a>
                            </li>
                            <li id="menu-item-1167" class="menu-item-1167">
                              <a title="Product Category V2" href="https://wp.xpeedstudio.com/marketo/furniture/product-category-v2/">Product Category V2</a>
                            </li>
                            <li id="menu-item-568" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-568">
                              <a title="Product Details" href="https://wp.xpeedstudio.com/marketo/furniture/product/xpeed-laptop/">Product Details</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li id="menu-item-2102" class="hasSubMenu">
                      <a title="Shop" href="#">Shop <span class="submenu-indicator"><span class="submenu-indicator-chevron"></span></span></a>
                      <ul role="menu" class="nav-dropdown animated fadeIn" style="right: 0px; display: none;">
                        <li id="menu-item-572" class="menu-item-572">
                          <a title="Shop" href="https://wp.xpeedstudio.com/marketo/furniture/shop/">Shop</a>
                        </li>
                        <li id="menu-item-570" class="menu-item-570">
                          <a title="Wishlist" href="https://wp.xpeedstudio.com/marketo/furniture/wishlist/">Wishlist</a>
                        </li>
                      </ul>
                    </li>
                    <li id="menu-item-576" class="hasSubMenu">
                      <a title="Blog" href="#">Blog <span class="submenu-indicator"><span class="submenu-indicator-chevron"></span></span></a>
                      <ul role="menu" class="nav-dropdown animated fadeIn" style="right: 0px; display: none;">
                        <li id="menu-item-575" class="menu-item-575">
                          <a title="Blog" href="https://wp.xpeedstudio.com/marketo/furniture/blog/">Blog</a>
                        </li>
                        <li id="menu-item-1161" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1161">
                          <a title="Blog Single" href="https://wp.xpeedstudio.com/marketo/furniture/seating-collection-inspiration-is-not-enough-for-people-2/">Blog Single</a>
                        </li>
                      </ul>
                    </li>
                    <li id="menu-item-1212" class="hasSubMenuMosaico">
                      <a title="Gallery" href="#">Gallery <span class="submenu-indicator"><span class="submenu-indicator-chevron"></span></span></i></a>
                      <div class="menu-mosaico animated fadeIn">
                        <div class="container">
                          <div class="row">
                            <div class="col-md-3">
                              <h6 class="corPreta">Theme Category</h6>
                              <p class="paragrafoMosaico">Pages that every website needs.</p>
                              <ul class="listaMosaico">
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Camera</a></li>
                                <li><a href="#">Headphone</a></li>
                                <li><a href="#">Gamepad</a></li>
                                <li><a href="#">Laptop</a></li>
                                <li><a href="#">Mobile</a></li>
                              </ul>
                            </div>
                            <div class="col-md-3">
                              <h6 class="corPreta">Theme Elements</h6>
                              <p class="paragrafoMosaico">Pages that every website needs.</p>
                              <ul class="listaMosaico">
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Product Details</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Product Category</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Blog Single</a></li>
                              </ul>
                            </div>
                            <div class="col-md-3">
                              <h6 class="corPreta">Theme Pages</h6>
                              <p class="paragrafoMosaico">Pages that every website needs.</p>
                              <ul class="listaMosaico">
                                <li><a href="#">My account</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Tems and Conditions</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Product Category V2</a></li>
                              </ul>
                            </div>
                            <div class="col-md-3">
                              <h6 class="corPreta">Theme Elements</h6>
                              <p class="paragrafoMosaico">Pages that every website needs.</p>
                              <p>
                                The Apple Watch, with its inbuilt speaker
                                and microphone, gives you the freedom
                                to call your friends directly from your
                                wrist. This splash-resistant.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>
              <div class="nav-overlay-panel">
              </div>
              <div class="nav-overlay-panel">
              </div>
            </nav>
          </div>

          <div class="col-lg-3 col-lg-3 d-none d-md-none d-lg-block">
            <a href="#" class="btn btn-outline-primary btn-lg btn-BlackFriday">
              <strong>BLACK FRIDAY</strong> Get 45% Off!
            </a>
          </div>
        </div>
      </div>
    </div>
  <!-- FIM SEGUNDA PARTE -->

</header>
