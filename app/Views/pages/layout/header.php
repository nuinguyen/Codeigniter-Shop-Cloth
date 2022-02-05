<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-4 col-md-5">
                <!-- Header Logo -->
                <a class="logo" title="Magento Commerce" href="index.html"><img alt="Magento Commerce" src="images/logo.png"></a>
                <!-- End Header Logo -->
            </div>
            <div class=" col-lg-7 col-sm-8 col-md-7 col-xs-12">
                <div class="header-top">
                    <div class="welcome-msg hidden-xs">Welcome msg! </div>
                    <!-- Header Language -->
                    <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="images/english.png" alt="language"> English <span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/english.png" alt="language"> English </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/francais.png" alt="language"> French </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/german.png" alt="language"> German </a></li>
                        </ul>
                    </div>

                    <!-- End Header Language -->
                    <!-- Header Top Links -->
                    <style>

                    </style>
                    <div class="toplinks">
                        <div class="links">
                            <div class="top-cart-contain">
                                    <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                                        <a href="#">
                                            <span class="hidden-xs">
                                                 <?php if(session()->get('user_login')) {
                                    echo '<a href="#">
                                        '.session()->get('user_login')['user_name'].'
                                        </a>';
                                                 }else{
                                                     echo '<a href="login">Log In</a>';
                                                 } ?>
                                            </span>
                                        </a>
                                        </div>
                                    <div>
                                        <div style="display: none;width:150px;text-align: center" class="top-cart-content arrow_box">
                                            <div class="block-subtitle">Cai Dat</div>
                                            <ul id="cart-sidebar"  class="mini-products-list">
                                                <li class=""> <a href="product_detail.html" >Thong Tin</a>
                                                </li>
                                                <li class=""> <a href="my-order" >Don Hang</a>
                                                </li>
                                                <li class=""> <a href="logout" >Dang Xuat</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                            <div class="myaccount"><a title="My Account" href="login.html"><span class="hidden-xs">My Account</span></a></div>
                            <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><span class="hidden-xs">Wishlist</span></a></div>
                            <div class="demo"><a href="blog.html" title="Blog"><span class="hidden-xs">Blog</span></a></div>
                        </div>
                    </div>

                    <!-- End Header Top Links -->
                </div>
                <div class="cart_cur_block">
                    <!-- Header Currency -->
                    <div class="dropdown block-currency-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#"> Tien te <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> $ - Dollar </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> £ - Pound </a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> € - Euro </a></li>
                        </ul>
                    </div>
                    <!-- End Header Currency -->
                    <!-- Top Cart -->
                    <div class="top-cart-contain">
                        <div class="mini-cart">
                            <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="cart"><span class="hidden-xs">shopping cart (3)</span></a></div>
                            <div>
                                <div style="display: none;" class="top-cart-content arrow_box">
                                    <div class="block-subtitle">Các sản phẩm thêm gần đây</div>
                                    <ul id="cart-sidebar" class="mini-products-list">
                                        <?php foreach ($mini_cart as $cartdetail) :?>
                                        <li class="item odd"> <a href="product-detail/<?=$cartdetail['product_id']?>" title="Skater Dress In Leaf Print" class="product-image"><img src="uploads/product/<?=$cartdetail['product_image']?>" alt="Product image" width="55"></a>
                                            <div class="product-details"> <a href="#" title="Remove This Item" onClick="" class="btn-remove1">Remove This Item</a> <a class="btn-edit" title="Edit item" href="#">Edit item</a>
                                                <p class="product-name"><a href="product-detail/<?=$cartdetail['product_id']?>"><?=$cartdetail['product_name']?></a> </p>
                                                <strong><?=$cartdetail['cart_detail_amount']?></strong> x <span class="price"><?= number_format($cartdetail['product_price'],0,',','.').' '.'VNĐ' ?></span> </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
<!--                                    <div class="top-subtotal">Subtotal: <span class="price">$520.00</span></div>-->
                                    <div class="actions">
                                        <a href="cart"><button class="btn-checkout" type="button"><span>Checkout</span></button></a>
                                        <button class="view-cart" type="button"><span>View Cart</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Cart -->
                </div>
            </div>
        </div>
    </div>
</header>

