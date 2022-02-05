<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
                <div class="page-title">
                    <h2>Shopping Cart</h2>
                </div>
                <form method="post" action="checkout">
                <?php csrf_hash()?>
                <div class="table-responsive box-table-cart">
                        <fieldset>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <?= view('message/message') ?>
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">
                                        <input type="checkbox" class="checkbox_all_cart"  name="product[]" >
                                    </th>
                                    <th rowspan="1">&nbsp;</th>
                                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                                    <th rowspan="1"></th>
                                    <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                    <th class="a-center" rowspan="1">Qty</th>
                                    <th colspan="1" class="a-center">Subtotal</th>
                                    <th class="a-center" rowspan="1">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total_all=0?>
                                <?php foreach ($cart as $cartdetail) :?>
                                <tr class="first odd tr_cart">
                                    <td class="cart_product_id">
                                        <input type="checkbox" class="check_cart"  value="<?=$cartdetail['cart_detail_id']?>" name="product[]" >
                                    </td>
                                    <td class="image"><a class="product-image" title="Sample Product" href="product_detail.html"><img width="75" alt="Sample Product" src="uploads/product/<?=$cartdetail['product_image']?>"></a></td>
                                    <td><h2 class="product-name">
                                            <a href="product_detail.html">
                                                <?=$cartdetail['product_name']?> <br>
                                                <?=$cartdetail['classify_type']?>-<?=$cartdetail['classify_value']?>
                                            </a> </h2></td>
                                    <td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a></td>
                                    <td class="a-right"><span class="cart-price"> <span class="price"><?= number_format($cartdetail['product_price'],0,',','.').' '.'VNĐ' ?></span> </span></td>

                                    <td class="a-center movewishlist">
                                    <div class="pull-left">
                                        <div class="custom box-calculate-amount pull-left">
                                            <button  class="reduced down_amount items-count" data-classify_id="<?=$cartdetail['classify_id']?>" data-product_id="<?=$cartdetail['product_id']?>" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            <input maxlength="12" id="cart_amount" class="input-text qty cart_amount_<?=$cartdetail['product_id']?>_<?=$cartdetail['classify_id']?>" title="Qty" size="4" value="<?=$cartdetail['cart_detail_amount']?>" name="cart_amount">
                                            <button  class="increase up_amount items-count"  data-classify_id="<?=$cartdetail['classify_id']?>" data-product_id="<?=$cartdetail['product_id']?>" type="button"><i class="icon-plus">&nbsp;</i></button>
                                        </div>
                                    </div>
                                    </td>

                                    <td class="a-right cart_product_total">
                                        <span class="cart-price">
                                            <span class="cart-price-total cart-price-product_<?=$cartdetail['product_id']?>_<?=$cartdetail['classify_id']?>">
                                                <?= number_format($total=$cartdetail['product_price']*$cartdetail['cart_detail_amount'],0,',','.').' '.'VNĐ' ?>
                                                <input type="hidden" class="cart-total" value="<?=$total?>">

                                        </span> </span></td>
                                    <td class="a-center last"><a class="button remove-item" title="Remove item" href="delete-cart/<?=$cartdetail['product_id']?>"><span><span>Remove item</span></span></a></td>
                                    <?php $total_all+=$total ?>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr class="first last">
                                    <td class="a-right last" colspan="50"><a href="/">
                                        <button  class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></button></a>
                                        <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Clear Cart</span></span></button>
                                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Update Cart</span></span></button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </fieldset>
                </div>
                <!-- BEGIN CART COLLATERALS -->
                <div class="cart-collaterals row">
                    <div class="col-sm-4">
                        <div class="shipping">
                            <h3>Estimate Shipping and Tax</h3>
                            <div class="shipping-form">
                                <form id="shipping-zip-form" method="post" action="#estimatePost/">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <ul class="form-list">
                                        <li>
                                            <label for="region_id">State/Province</label>
                                            <div class="input-box">
                                                <select style="" title="State/Province" name="region_id" id="region_id"  class="required-entry validate-select">
                                                    <option value="">Please select region, state or province</option>
                                                    <option value="1" title="Alabama">Alabama</option>
                                                </select>
                                                <input type="text" style="display:none;" class="input-text required-entry" title="State/Province" value="" name="region" id="region">
                                            </div>
                                        </li>
                                        <li>
                                            <label for="postcode">Zip/Postal Code</label>
                                            <div class="input-box">
                                                <input type="text" value="" name="estimate_postcode" id="postcode" class="input-text validate-postcode">
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="buttons-set11">
                                        <button class="button get-quote" onClick="coShippingMethodForm.submit()" title="Get a Quote" type="button"><span>Get a Quote</span></button>
                                    </div>
                                    <!--buttons-set11-->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div class="discount">
                            <h3>Discount Codes</h3>
                            <form method="post" action="#couponPost/"  >
                                <label for="coupon_code">Enter your coupon code if you have one.</label>
                                <input type="hidden" value="0" id="remove-coupone" name="remove">
                                <input type="text" value="" name="coupon_code" id="coupon_code" class="input-text fullwidth">
                                <button value="Apply Coupon" onClick="discountForm.submit(false)" class="button coupon " title="Apply Coupon" type="button"><span>Apply Coupon</span></button>
                            </form>
                        </div>

                    </div>
                    <div class="totals col-sm-4">
                        <h3>Shopping Cart Total</h3>
                        <div class="inner">
                            <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">

                                <tfoot>
                                <tr>
                                    <td colspan="1" class="a-left" style=""><strong>Grand Total</strong></td>
                                    <td class="a-right" style=""><strong>
                                            <span class="total_cart"><?= number_format($total_all,0,',','.').' '.'VNĐ' ?>
                                            </span></strong></td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td colspan="1" class="a-left" style=""> Subtotal </td>
                                    <td class="a-right" style=""><span class="price"><?= number_format($total_all,0,',','.').' '.'VNĐ' ?></span></td>
                                </tr>
                                </tbody>
                            </table>
                            <ul class="checkout">
                                <li class="cart_to_checkout">
                                    <button onClick="" class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit"><span>Proceed to Checkout</span></button>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li><a title="Checkout with Multiple Addresses" href="#">Checkout with Multiple Addresses</a> </li>
                                <li>
                                    <br>
                                </li>
                            </ul>
                        </div>
                        <!--inner-->

                    </div>
                </div>
                </form>

                <!--cart-collaterals-->
                <div class="crosssel">
                    <div class="new_title center">
                        <h2>Based on your selection, you may be interested in the following items:</h2>
                    </div>
                    <div class="category-products">
                        <ul id="crosssell-products-list" class="products-grid first odd">
                            <?php foreach ($product as $pro) :?>
                                <li class="item col-md-3 col-sm-6 col-xs-12">
                                    <div class="item-inner">
                                        <div class="product-block">
                                            <div class="product-image"> <a href="product-detail/<?=$pro['product_id']?>">
                                                    <figure class="product-display">
                                                        <div class="sale-label sale-top-left">Sale</div>
                                                        <img src="uploads/product/<?=$pro['product_image']?>" class="lazyOwl product-mainpic" alt="product-image" style="display: block;"> <img class="product-secondpic" alt="product-image" src="uploads/product/<?=$pro['product_image']?>"> </figure>
                                                </a> </div>
                                            <div class="product-meta">
                                                <div class="product-action"> <a class="addcart" href="shopping_cart.html"> <i class="icon-shopping-cart">&nbsp;</i> Add to cart </a> <a class="wishlist" href="wishlist.html"> <i class="icon-heart">&nbsp;</i> </a> <a class="quickview" href="javascript:;"> <i class="icon-zoom">&nbsp;</i> </a> </div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a href="product_detail.html" title="Retis lapen casen"> <?=$pro['product_name']?> </a> </div>
                                                <div class="item-content">
                                                    <div class="item-price">
                                                        <div class="price-box"> <span class="regular-price"  > <span class="price"><?= number_format($pro['product_price'],0,',','.').' '.'VNĐ' ?></span> </span> </div>
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
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
