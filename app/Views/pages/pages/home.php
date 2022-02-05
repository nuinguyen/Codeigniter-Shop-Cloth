
<!-- Slider -->
<div class="slider-section">
    <div class="container">
        <div class="row">
            <aside class="cat-block pro-block col-xs-12 col-sm-12 col-md-5">
                <div class="pro1-block">
                    <ul class="top-cat-box">
                        <li>
                            <div> <img  alt="women image" src="images/women-img.png"> </div>
                            <h2>Women</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur. </p>
                            <a href="#">Buy Now</a> </li>
                        <li>
                            <div> <img  alt="men image" src="images/men-img.png"> </div>
                            <h2>Men</h2>
                            <p>Consectetur adipiscing elit. </p>
                            <a href="#">Buy Now</a> </li>
                        <li>
                            <div> <img  alt="electronics image" src="images/electronics-img.png"> </div>
                            <h2>Electronics</h2>
                            <p>Voluptatem accusantium doloremque</p>
                            <a href="#">Buy Now</a> </li>
                        <li>
                            <div> <img  alt="furniture image" src="images/furniture-img.png"> </div>
                            <h2>Furniture</h2>
                            <p>eaque ipsa quae ab illo inventore </p>
                            <a href="#">Buy Now</a> </li>
                    </ul>
                </div>
                <!-- //showcase-right -->
            </aside>
            <div class="slider-intro col-lg-7 col-sm-12 col-md-7">
                <div class="the-slideshow slideshow-wrapper">
                    <ul style="overflow: hidden;" class="slideshow">
                        <li class="slide">
                            <p><a href="#"> <img src="images/banner-img.jpg" alt="banner-img"></a></p>
                            <div class="caption light1 top-right">
                                <div class="caption-inner">
                                    <p class="heading">Women Collection 2014</p>
                                    <p class="heading1">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <p class="intro-btn"><a  href="#" title="Click to see all features">Shop Now</a> </p>
                                </div>
                            </div>
                        </li>
                        <li class="slide">
                            <p><a href="#"> <img src="images/banner-img1.jpg" alt="banner-img"></a></p>
                            <div class="caption light1 top-right">
                                <div class="caption-inner">
                                    <h2 class="heading">You like this theme?</h2>
                                    <p class="heading1">Pellentesque habitant morbi tristique senectus </p>
                                    <p class="intro-btn"><a  href="#" title="Click to see all features">Buy Now</a> </p>
                                </div>
                            </div>
                        </li>
                        <li class="slide">
                            <p><a title="#" href="#"> <img src="images/banner-img2.jpg" alt="banner-img"> </a></p>
                            <div class="caption light1 top-right">
                                <div class="caption-inner">
                                    <p class="heading">Responsive Layout</p>
                                    <p class="intro-btn"><a  href="#" title="Click to see all features">Buy Now</a> </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a href="#" id="home-slides-prev" class="backward browse-button">previous</a> <a href="#" id="home-slides-next" class="forward browse-button">next</a>
                    <div id="home-slides-pager" class="tab-pager tab-pager-img tab-pager-ring-lgray"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Slider -->
<!-- offer banner section -->
<div class="offer-banner-section">
    <div class="container">
        <div class="row">
            <div class="newsletter-wrap">
                <div class="newsletter">
                    <form action="#" method="post" id="newsletter-validate-detail">
                        <div>
                            <h4><span>Amaze newsletter</span></h4>
                            <input type="text" name="email" id="newsletter1" title="Sign up for our newsletter" class="input-text required-entry validate-email" placeholder="Enter your email address">
                            <button type="submit" title="Subscribe" class="subscribe"><span>Subscribe</span></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="col"><img src="images/offer-banner1.png" alt="offer banner"></div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="col"><img src="images/offer-banner2.png" alt="offer banner"></div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12">
                <div class="col"><img src="images/offer-banner3.png" alt="offer banner"></div>
            </div>
            <div class="col-lg-3 col-sm-3 col-xs-12 last">
                <div class="col"><img src="images/offer-banner4.png" alt="offer banner"></div>
            </div>
        </div>
    </div>
</div>
<!-- end banner section -->
<div class="service-section">
    <div class="container">
        <div class="row">
            <div id="store-messages">
                <div class="col-md-4 col-xs-12 col-sm-4"><i class="icon-refresh">&nbsp;</i>
                    <div class="message"> <span><strong>Return &amp; Exchange</strong> in 3 working days </span>Lorem ipsum dolor sit amet, consectetur adipiscing. </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4"><i class="icon-truck">&nbsp;</i>
                    <div class="message"><span><strong>Free Shipping</strong> order over $99</span>Lorem ipsum dolor sit amet, consectetur adipiscing. </div>
                </div>
                <div class="col-md-4 col-xs-12 col-sm-4"><i class="icon-discount">&nbsp;</i>
                    <div class="message"><span><strong>50% Off</strong> on all products</span>Lorem ipsum dolor sit amet, consectetur adipiscing. </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main container -->
<section class="main-container col1-layout home-content-container">
    <div class="container">
        <div class="std">

            <?php foreach ($category as $cate) : ?>

            <div class="best-seller-pro wow bounceInUp animated">
                <div class="slider-items-products">
                    <div class="new_title center">
                        <h2><?=$cate['category_name']?></h2>
                    </div>
                    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">

                            <?php foreach ($product as $pro) : ?>
                            <?php if($pro['category_id']==$cate['category_id']){ ?>
                            <div class="item">
                                <div class="item-inner">
                                    <div class="product-block">
                                        <div class="product-image"> <a href="product-detail/<?=$pro['product_id']?>">
                                                <figure class="product-display">
                                                    <div class="sale-label sale-top-left">Sale</div>
                                                    <img src="uploads/product/<?=$pro['product_image']?>" class="lazyOwl product-mainpic" alt="product-image" style="display: block;"> <img class="product-secondpic" alt="product-image" src="uploads/product/<?=$pro['product_image']?>"> </figure>
                                            </a> </div>
                                        <div class="product-meta">
                                            <div class="product-action"> <a class="addcart" href="shopping_cart.html"> <i class="icon-shopping-cart">&nbsp;</i> Add to cart </a> <a class="wishlist" href="wishlist.html"> <i class="icon-heart">&nbsp;</i> </a> <a href="quick_view.html" class="quickview"> <i class="icon-zoom">&nbsp;</i> </a> </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a href="product_detail.html" title="Retis lapen casen"><?=$pro['product_name']?></a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box"> <span class="regular-price"> <span class="price"><?= number_format($pro['product_price'],0,',','.').' '.'VNĐ' ?></span> </span> </div>
                                                </div>
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <?php } ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Slider -->
            <!-- End Featured Slider -->
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- End main container -->
<!-- Latest Blog -->
<section class="latest-blog container">
    <div class="blog_post">
        <div class="blog-title">
            <h2><span>Latest Blog</span></h2>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="blog-img"> <img src="images/blog-img1.jpg" alt="blog image">
                <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
            </div>
            <h2><a href="blog_detail.html">Pellentesque habitant morbi</a> </h2>
            <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="blog-img"> <img src="images/blog-img2.jpg" alt="blog image">
                <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
            </div>
            <h2><a href="blog_detail.html">Pellentesque habitant morbi</a> </h2>
            <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="blog-img"> <img src="images/blog-img3.jpg" alt="blog image">
                <div class="mask"> <a class="info" href="blog_detail.html">Read More</a> </div>
            </div>
            <h2><a href="blog_detail.html">Pellentesque habitant morbi</a> </h2>
            <div class="post-date"><i class="icon-calendar"></i> Apr 10, 2014</div>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce sit  ... </p>
        </div>
    </div>
</section>
<!-- End Latest Blog -->
