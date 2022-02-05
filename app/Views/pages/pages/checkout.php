

<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <form action="purchase" method="post">

                <div class="cart">
                    <div class="page-title">
                        <h2>Checkout</h2>
                    </div>
                    <div class="table-responsive">
                        <form method="post" action="#updatePost/">
                            <div class="profile-checkout">
                                <h4>Thông tin</h4>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5><?=$user['user_name']?> </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="shipping">
                                            <div class="col-sm-6">
                                                <div class="discount">
                                                    <ul class="form-list ">
                                                        <li>
                                                            <label>Ho ten <span class="required">*</span></label>
                                                            <br />
                                                            <input type="text" title="Street Address" name="receiver_name" id="receiver_name" value="" class="input-text required-entry" />
                                                        </li>
                                                        <li>
                                                            <label>So DIen thoai <span class="required">*</span></label>
                                                            <br />
                                                            <input type="text" title="Street Address" name="receiver_phone" id="receiver_phone" value="" class="input-text required-entry" />
                                                        </li>
                                                        <li>
                                                            <label>Address <span class="required">*</span></label>
                                                            <br />
                                                            <input type="text" title="Street Address" name="way_name" id="way_name" value="" class="input-text required-entry" />
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="shipping-form">
                                                    <!--                                            <form id="shipping-zip-form" method="post" action="#estimatePost/">-->
                                                    <ul class="form-list ">
                                                        <li>
                                                            <label class="required" for="country"><em>*</em>Quoc gia</label>
                                                            <div class="input-box">
                                                                <select title="Country" class="validate-select choose_address" id="city" name="city">
                                                                    <option value="">Thanh Pho</option>
                                                                    <?php foreach ($city as $tp) :?>
                                                                        <option value="<?=$tp['city_id']?>"><?=$tp['city_name']?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="region_id">Quan/Huyen</label>
                                                            <div class="input-box">
                                                                <select style="" title="State/Province" name="district" id="district"  class="required-entry validate-select choose_address">
                                                                    <option value="">Quan/Huyen</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="region_id">Xa/Phuong</label>
                                                            <div class="input-box">
                                                                <select style="" title="State/Province" name="village" id="village"  class="required-entry validate-select calculate_fee" >
                                                                    <option value="">Phuong/Xa</option>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <!--buttons-set11-->
                                                    <!--                                            </form>-->
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <ul class="form-list ">
                                                    <li class="">
                                                        <label>Ghi chu<em class="required">*</em></label>
                                                        <br>
                                                        <div style="float:none" class="">
                                                            <textarea style="width: 95%;" name="receiver_note" class="required-entry input-text" cols="23" rows="3"></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="table-responsive">

                        <fieldset>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <?= view('message/message') ?>
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">STT</th>
                                    <th rowspan="1">&nbsp;</th>
                                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                                    <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                    <th class="a-center" rowspan="1">Qty</th>
                                    <th colspan="1" class="a-center">Subtotal</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr class="first last">
                                    <td class="a-right last" colspan="50"></td>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php $total_all=0?>
                                <?php foreach ($checkout as $key => $checkout_product) :?>
                                    <tr class="first odd">
                                        <input type="hidden"   value="<?=$checkout_product['product_id']?>" name="product_id[]" >
                                        <td><?=$key+1?></td>
                                        <td class="image">
                                            <a class="product-image" title="Sample Product" href="product_detail.html">
                                                <img width="75" alt="Sample Product" src="uploads/product/<?=$checkout_product['product_image']?>">
                                            </a>
                                        </td>
                                        <td><h2 class="product-name">
                                                <a href="product_detail.html">
                                                    <?=$checkout_product['product_name']?><br>
                                                    <?=$checkout_product['classify_type']?>- <?=$checkout_product['classify_value']?>
                                                </a>
                                            </h2></td>
                                        <td class="a-right"><span class="cart-price"> <span class="price">
                                        <?= number_format($checkout_product['product_price'],0,',','.').' '.'VNĐ' ?></span> </span>
                                        </td>
                                        <td> <?=$checkout_product['cart_detail_amount']?></td>
                                        <td class="a-right movewishlist"><span class="cart-price"> <span class="price">
                                        <?= number_format($total=$checkout_product['product_price']*$checkout_product['cart_detail_amount'],0,',','.').' '.'VNĐ' ?></span> </span>
                                        </td>
                                        <?php $total_all+=$total ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
                    <!-- BEGIN CART COLLATERALS -->
                    <div class="cart-collaterals row">
                        <div class="col-sm-4">
                            <div class="shipping">
                                <h3>Hinh thuc thanh toan</h3>
                                <div class="shipping-form">
                                    <form id="shipping-zip-form" method="post" action="#estimatePost/">
                                        <p>nhap phuong thuc thanh toan ban mong muon.</p>
                                        <ul class="form-list">
                                            <li>
                                                <!--                                        <label class="required" for="country"><em>*</em>Country</label>-->
                                                <div class="input-box">
                                                    <select  class="validate-select" id="order_method" name="order_method">
                                                        <option value="">Chon phuong thuc thanh toan</option>
                                                        <option value="1">Khi nhan hang</option>
                                                        <option value="2">The ngan hang</option>
                                                    </select>
                                                </div>
                                            </li>
                                        </ul>
                                        <!--buttons-set11-->
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="discount">
                                <h3>MÃ GIẢM GIÁ</h3>
                                <form method="post" action="#couponPost/"  >
                                    <label for="coupon_code">Nhập mã phiếu giảm giá của bạn nếu bạn có.</label>
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
                                        <td class="a-right" style=""><strong><span class="price">$77.38</span></strong></td>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td colspan="1" class="a-left" style=""> Subtotal </td>
                                        <td class="a-right" style=""><span class="price"><?= number_format($total_all,0,',','.').' '.'VNĐ' ?></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1" class="a-left" style=""> Phi Van chuyen </td>
                                        <td class="a-right" id="checkout_shipping_fee" style="">
                                            <span class="price"></span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>
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
                </div>
            </form>
        </div>
    </div>
</section>
