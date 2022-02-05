<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <ul>
                <li class="home"> <a href="index.html" title="Go to Home Page">Home</a><span>&raquo;</span></li>
                <li class=""> <a href="grid.html" title="Go to Home Page">Women</a><span>&raquo;</span></li>
                <li class="category13"><strong><?=$product[0]['category_name']?></strong></li>
            </ul>
        </div>
    </div>
</div>
<!-- End breadcrumbs -->
<!-- Two columns content -->
<div class="main-container col2-left-layout">
    <div class="main container">
        <div class="row">
            <section class="col-sm-9 col-sm-push-3">
                <div class="col-main">
                    <div class="category-title">
                        <h1>Tops &amp; Tees</h1>
                    </div>
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1">

                                    <!-- Item -->
                                    <div class="item"> <a href="#x"><img alt="women_banner" src="images/women_banner.png"></a>
                                        <div class="cat-img-title cat-bg cat-box">
                                            <h2 class="cat-heading">Category Banner</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                    <!-- End Item -->

                                    <!-- Item -->
                                    <div class="item"> <a href="#x"><img alt="women_banner" src="images/women_banner1.png"></a> </div>
                                    <!-- End Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="category-products">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="view-mode"> <span title="Grid" class="button button-active button-grid">Grid</span><a href="list.html" title="List" class="button button-list">List</a> </div>
                            </div>
                            <div id="sort-by">
                                <label class="left">Sort By: </label>
                                <ul>
                                    <li><a href="#">Position<span class="right-arrow"></span></a>
                                        <ul>
                                            <li><a href="#">Name</a></li>
                                            <li><a href="#">Price</a></li>
                                            <li><a href="#">Position</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <a class="button-asc left" href="#" title="Set Descending Direction"><span style="color:#999;font-size:11px;" class="glyphicon glyphicon-arrow-up"></span></a> </div>
                            <div class="pager">
                                <div id="limiter">
                                    <label>View: </label>
                                    <ul>
                                        <li><a href="#">15<span class="right-arrow"></span></a>
                                            <ul>
                                                <li><a href="#">20</a></li>
                                                <li><a href="#">30</a></li>
                                                <li><a href="#">35</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pages">
                                    <label>Page:</label>
                                    <ul class="pagination">
                                        <li><a href="#">&laquo;</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="products-grid">
                            <?php foreach ($product as $pro) :?>
                            <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-12">
                                <div class="item-inner">
                                    <div class="item-img">
                                        <div class="product-block">
                                            <div class="product-image"> <a href="product-detail/<?=$pro['product_id']?>">
                                                    <figure class="product-display">
                                                        <div class="new-label new-top-left">New</div>
                                                        <img src="uploads/product/<?=$pro['product_image']?>" class="lazyOwl product-mainpic" alt=" Sample Product" style="display: block;"> <img class="product-secondpic" alt=" Sample Product" src="uploads/product/<?=$pro['product_image']?>"> </figure>
                                                </a> </div>
                                            <div class="product-meta">
                                                <div class="product-action"> <a class="addcart" href="shopping_cart.html"> <i class="icon-shopping-cart">&nbsp;</i> Add to cart </a>

                                                    <a class="wishlist" href="wishlist.html"> <i class="icon-heart">&nbsp;</i> </a>

                                                    <a class="quickview" href="javascript:;"> <i class="icon-zoom">&nbsp;</i> </a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"> <a href=""product-detail/<?=$pro['product_id']?>"" title="Ut tincidunt tortor"><?=$pro['product_name']?></a> </div>
                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box">
<!--                                                        <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price" > $567.00 </span> </p>-->
                                                        <p class="special-price"> <span class="price-label">Special Price</span> <span class="price" ><?= number_format($pro['product_price'],0,',','.').' '.'VNĐ' ?> </span> </p>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:50%"></div>
                                                        </div>
                                                        <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- End Two columns content -->
