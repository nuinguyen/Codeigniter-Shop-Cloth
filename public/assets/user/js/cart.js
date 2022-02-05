$(document).ready(function() {
    load_total();
    // ALL_TOTAL
    function load_total() {
        sum = 0;
        listChecked = $('.tr_cart input[name="product[]"]:checked');
        if (listChecked.length > 0) {
            $.each(listChecked, function (index) {
                itemValue = listChecked.eq(index).parent().parent();
                sum+=parseInt(itemValue.children('.cart_product_total').children('.cart-price').children('.cart-price-total').children('.cart-total').attr('value'));
            });
            $('.total_cart').html( (sum +'').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ' );
            $('.cart_to_checkout').html('<button class="button btn-proceed-checkout" title="Proceed to Checkout" type="submit"><span>Proceed to Checkout</span></button>');
        } else {
            $('.total_cart').html((sum +'').replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + ' VNĐ' );
            $('.cart_to_checkout').html(' <h3 style="color: red" >Vui lòng chọn sản phẩm để đặt hàng</h3>');
        }
    }
    ///
    $('.checkbox_all_cart').change(function () {
        if(this.checked){
            // $(this).addClass('checked');
            $('.cart_product_id input').each(function (){
                $(this).prop("checked",true);
            });
        }else{
            // $(this).removeClass('checked');
            $('.cart_product_id input').each(function (){
                $(this).prop("checked",false);
            });
        }
        load_total();
    });
    // UP DDWN AMOUNT
    $('.down_amount').click(function () {
        var product_id = $(this).data('product_id');
        var classify_id = $(this).data('classify_id');
        var cart_amount = $('.cart_amount_'+product_id+'_'+classify_id).val();
        var _token = $('input[name="_token"]').val();
        cart_amount = parseInt(cart_amount) -  1;
        $(this).parents(".box-calculate-amount").find('#cart_amount').attr('value',cart_amount);
        $.ajax({
            type: 'post',
            url: 'update-amount-cart',
            data: {product_id: product_id, classify_id:classify_id,cart_amount: cart_amount, _token: _token},
            success: function (data) {
                $('.cart-price-product_'+product_id+'_'+classify_id).html(data);
                load_total();

            }
        });
    });
    $('.up_amount').click(function () {
        var product_id = $(this).data('product_id');
        var classify_id = $(this).data('classify_id');
        var cart_amount = $('.cart_amount_'+product_id+'_'+classify_id).val();
        var _token = $('input[name="_token"]').val();
        cart_amount = parseInt(cart_amount) +  1;
        $(this).parents(".box-calculate-amount").find('#cart_amount').attr('value',cart_amount);
        $.ajax({
            type: 'post',
            url: 'update-amount-cart',
            data: {product_id: product_id, classify_id:classify_id,cart_amount: cart_amount, _token: _token},
            success: function (data) {
                $('.cart-price-product_'+product_id+'_'+classify_id).html(data);
                load_total();
            }
        });
    });
    // Click check tung SP
    $('.check_cart').click(function () {
        load_total();
    });
});
