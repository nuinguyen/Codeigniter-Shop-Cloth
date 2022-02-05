<!-- end breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ul>
                <li class="home"> <a href="index.html" title="Go to Home Page">Home</a><span>&raquo;</span></li>
                <li class=""> <a href="grid.html" title="Go to Home Page">Women</a><span>&raquo;</span></li>
                <li class="category13"><strong> <?=$product['product_name']?> </strong></li>
            </ul>
        </div>
    </div>
</div>
<!-- end breadcrumbs -->
<!-- main-container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="row">
                <div class="product-view">
                    <div class="product-essential">
<!--                        <form action="add-cart" method="post" id="product_addtocart_form">-->
                            <div class="product-img-box col-sm-4 col-xs-12">
                                <div class="new-label new-top-left"> New </div>
                                <input type="hidden" id="product_id" name="product_id" value="<?=$product['product_id']?>">
<!--                                <div class="product-image">-->
<!--                                    <div class="large-image"> <a href="products-images/product4.jpg" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img alt="product-image" src="uploads/product/--><?//=$product['product_image']?><!--"> </a> </div>-->
<!--                                    <div class="flexslider flexslider-thumb">-->
<!--                                        <ul class="previews-list slides">-->
<!--                                            <li><a href='products-images/product6.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product6.jpg' "><img src="uploads/product/--><?//=$product['product_image']?><!--" alt="Thumbnail 1"/></a></li>-->
<!--                                            <li><a href='products-images/product10.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product10.jpg' "><img src="uploads/product/--><?//=$product['product_image']?><!--" alt="Thumbnail 2"/></a></li>-->
<!--                                            <li><a href='products-images/product3.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product3.jpg' "><img src="uploads/product/--><?//=$product['product_image']?><!--" alt="Thumbnail 1"/></a></li>-->
<!--                                            <li><a href='products-images/product4.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product4.jpg' "><img src="uploads/product/--><?//=$product['product_image']?><!--" alt="Thumbnail 2"/></a></li>-->
<!--                                            <li><a href='products-images/product5.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'products-images/product5.jpg' "><img src="uploads/product/--><?//=$product['product_image']?><!--" alt="Thumbnail 2"/></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <style type="text/css">
                                    /*.lSSlideOuter .lSPager.lSGallery img {*/
                                    /*    display: block;*/
                                    /*    height: 100px;*/
                                    /*    max-width: 100%;*/
                                    /*}*/
                                    li.active {
                                        border: 2px solid #FE980F;
                                    }
                                </style>
                                <div class="demo">
                                    <ul id="lightSlider">
                                        <?php foreach ($album as $item) : ?>
                                        <li data-thumb="uploads/album/<?=$item['album_image']?>">
                                            <img width="100%"  src="uploads/album/<?=$item['album_image']?>" />
                                        </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                                <!-- end: more-images -->
                                <div class="clear"></div>
                            </div>
                            <div class="product-shop col-sm-8 col-xs-12">
<!--                                <div class="product-next-prev"> <a href="#" class="product-next"><span></span></a> <a href="#" class="product-prev"><span></span></a> </div>-->
                                <div class="product-name">
                                    <h1><?=$product['product_name']?></h1>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:60%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                                </div>
                                <div class="short-description">
                                    <h2>Quick Overview</h2>
                                    <p><?=$product['product_summary']?></p>
                                </div>
                                <p class="availability in-stock">Availability: <span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">
<!--                                        <p class="old-price"> <span class="price-label">Regular Price:</span> <span id="old-price-48" class="price"> $315.99 </span> </p>-->
                                        <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> <?= number_format($product['product_price'],0,',','.').' '.'VNĐ' ?> </span> </p>
                                    </div>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="qty">SIZE:</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="pull-left">
                                                    <div class="custom pull-left box_product_classify">
                                                        <?php foreach ($classify as $class) :?>
                                                        <button name="tick_classify" class="button tick_classify" value="<?=$class['classify_id']?>">
                                                            <?=$class['classify_type']?> - <?=$class['classify_value']?>
                                                        </button>
                                                        <?php endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="qty">Quantity:</label>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="pull-left">
                                                    <div class="custom box-amount pull-left">
                                                        <button  class="reduced down_amount_pro items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                                        <input type="text" class="input-text qty" title="Qty"  value="1" maxlength="12" id="cart_detail_amount" name="cart_detail_amount">
                                                        <button class="increase up_amount_pro items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="semail-addto-box">
                                                <button class="button btn-cart add_to_cart" title="Add to Cart" >
                                                    <span><i class="icon-basket"></i> Add to Cart</span>
                                                </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="email-addto-box">
                                        <ul class="add-to-links">
                                            <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                                            <li><span class="separator">|</span> <a class="link-compare" href="compare.html"><span>Add to Compare</span></a></li>
                                        </ul>
                                        <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                                    </div>
                                </div>
                            </div>
<!--                        </form>-->
                    </div>
                    <div class="product-collateral">
                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                            <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Chi tiet </a> </li>
                            <li><a href="#product_tabs_tags" data-toggle="tab">Tags</a></li>
                            <li> <a href="#product_tabs_custom" data-toggle="tab">Custom Tab</a> </li>
                        </ul>

                        <div id="productTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="product_tabs_description">
                                <p><?=$product['product_desc']?></p>
                            </div>
                            <div class="tab-pane fade" id="product_tabs_tags">
                                    <!--tags-->
                                    <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                            </div>
                            <div class="tab-pane fade" id="product_tabs_custom">
                                <div class="product-tabs-content-inner clearfix">
                                    <p><strong>Lorem Ipsum</strong><span>&nbsp;
                      Publishing software like Aldus PageMaker including versions of Lorem
                      Ipsum.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-12">
                        <div class="box-additional">
                            <div class="upsell-pro wow bounceInUp animated">
                                <div class="slider-items-products">
                                    <div class="new_title center">
                                        <h2>San Pham Lien Quan</h2>
                                    </div>
                                    <div id="upsell-products-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4">
                                            <?php foreach ($related_product as $related) :?>
                                            <div class="item">
                                                <div class="item-inner">
                                                    <div class="product-block">
                                                        <div class="product-image"> <a href="product-detail/<?=$related['product_id']?>">
                                                                <figure class="product-display">
                                                                    <div class="sale-label sale-top-left">Sale</div>
                                                                    <img src="uploads/product/<?=$related['product_image']?>" class="lazyOwl product-mainpic" alt="product-image" style="display: block;"> <img class="product-secondpic" alt="product-image" src="uploads/product/<?=$related['product_image']?>"> </figure>
                                                            </a> </div>
                                                        <div class="product-meta">
                                                            <div class="product-action"> <a class="addcart" href="product-detail/<?=$related['product_id']?>"> <i class="icon-shopping-cart">&nbsp;</i> Add to cart </a> <a class="wishlist" href="wishlist.html"> <i class="icon-heart">&nbsp;</i> </a> <a href="quick_view.html" class="quickview"> <i class="icon-zoom">&nbsp;</i> </a> </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a href="#" title="Retis lapen casen"> <?= $related['product_name']?> </a> </div>
                                                            <div class="item-content">
                                                                <div class="item-price">
                                                                    <div class="price-box"> <span class="regular-price" > <span class="price"><?= number_format($related['product_price'],0,',','.').' '.'VNĐ' ?></span> </span> </div>
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
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End main-container -->