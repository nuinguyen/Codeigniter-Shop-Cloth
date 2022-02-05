<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <aside class="col-left sidebar col-sm-3 wow bounceInUp animated">
                <div class="block block-progress">
                    <div class="block-title ">Your Checkout</div>
                    <div class="block-content">
                        <dl>
                            <dt class="complete"> Billing Address <span class="separator">|</span> <a onClick="checkout.gotoSection('billing'); return false;" href="#billing">Change</a> </dt>
                            <dd class="complete">
                                <address>
                                    swapna taru<br>
                                    Better Technology Labs.<br>
                                    23 North Main Stree<br>
                                    Windsor<br>
                                    Holtsville,  New York, 00501<br>
                                    United States<br>
                                    T: 5465465 <br>
                                    F: 466523
                                </address>
                            </dd>
                            <dt class="complete"> Shipping Address <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping');return false;" href="#payment">Change</a> </dt>
                            <dd class="complete">
                                <address>
                                    swapna taru<br>
                                    Better Technology Labs.<br>
                                    23 North Main Stree<br>
                                    Windsor<br>
                                    Holtsville,  New York, 00501<br>
                                    United States<br>
                                    T: 5465465 <br>
                                    F: 466523
                                </address>
                            </dd>
                            <dt class="complete"> Shipping Method <span class="separator">|</span> <a onClick="checkout.gotoSection('shipping_method'); return false;" href="#shipping_method">Change</a> </dt>
                            <dd class="complete"> Flat Rate - Fixed <br>
                                <span class="price">$15.00</span> </dd>
                            <dt> Payment Method </dt>
                            <dd class="complete"></dd>
                        </dl>
                    </div>
                </div>
            </aside>
            <section class="col-main col-sm-9">
                <div class="checkout-page">
                    <div class="page-title new_page_title">
                        <div class="col-sm-12">
                            <div class="actions">
                                <button type="button" class="button my_order_button" value="5" ><span>ALl</span></button>
                                <button type="button" class="button my_order_button" value="1" ><span>Cho Xac Nhna</span></button>
                                <button type="button" class="button my_order_button" value="2" ><span>Da lay hang</span></button>
                                <button type="button" class="button my_order_button" value="3" ><span>dang giao</span></button>
                                <button type="button" class="button my_order_button" value="4" ><span>giao thanh cong</span></button>
                                <button type="button" class="button my_order_button value="0"" ><span>Huy hang</span></button>
                        </div>
                        </div>
                    </div>
                    <div class="table-responsive box-table-my-order">
                        <fieldset>
                            <?php foreach ($order as $item ):?>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <?= view('message/message') ?>
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1"><?=$item['order_id']?></th>
                                    <th rowspan="1"><span class="nobr">Thoong tin</span></th>
                                    <th class="a-center" rowspan="1">
                                        <?php
                                        if($item['order_status']==0){
                                            echo'<label class="label label-danger"">Da huy</label>';
                                        }elseif($item['order_status']==1){
                                            echo'<span class="label label-default">Cho xac nhan</span>';
                                        }elseif($item['order_status']==2){
                                            echo'<span class="label label-warning">Cho lay hang</span>';
                                        }elseif($item['order_status']==3){
                                            echo'<span class="label label-primary">Dang gia</span>';
                                        }else{
                                            echo'<label class="label label-success">Da giao</label>';
                                        }
                                        ?>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order_detail as $item_detail ) :?>
                                        <?php if($item['order_id']==$item_detail['order_id'])
                                   echo '<tr class="first odd tr_cart">
                                        <td class="image"><img width="75" alt="Sample Product" src="uploads/product/'.$item_detail['product_image'].'"></td>
                                        <td class="a-right"><span class="cart-price"> <span class="price">
                                            '.$item_detail['product_name'].'<br>
                                            '.$item_detail['classify_type'].'- '.$item_detail['classify_value'].'<br>
                                            x'.$item_detail['order_detail_amount'].'
                                        </span> </span></td>
                                        <td class="a-right cart_product_total">
                                        <span class="cart-price">
                                            <span class="cart-price-total cart-price-product">
                                                '.$item_detail['product_price'].'
                                        </span> </span></td>
                                    </tr>'?>
                                <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                <tr class="first last">
                                    <?php if($item['order_status']==0){
                                        echo ' <td class="a-right last" colspan="50"><span><span>Ngay huy: '.$item['order_date'].'</span></span>';
                                    }elseif($item['order_status']==4){
                                        echo ' <td class="a-right last" colspan="50"><span><span>Ngay nhan: '.$item['order_date'].'</span></span>';
                                    }else{
                                        echo ' <td class="a-right last" colspan="50"><span><span>Ngay Dat: '.$item['order_date'].'</span></span>';
                                    } ?>
                                        <?php if($item['order_status']==1){
                                            echo ' <button id="empty_cart_button" class="button btn-empty cancel_order" title="Clear Cart" value="'.$item['order_id'].'" name="update_cart_action" type="button"><span><span>Huy Don</span></span></button>';
                                        }elseif($item['order_status']==4 || $item['order_status']==0){
                                            echo ' <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Mua Lai</span></span></button> ';
                                       }else{
                                            echo ' <button id="empty_cart_button" class="button btn-empty" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span><span>Da Nhan Hang</span></span></button>';
                                        } ?>
<!--                                        <button class="button btn-update" title="Update Cart" value="update_qty" name="update_cart_action" type="submit"><span><span>Update Cart</span></span></button>-->
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            <?php endforeach; ?>
                        </fieldset>
                    </div>
            </section>
        </div>
    </div>
</div>