$(document).ready(function() {
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop:true,
        slideMargin: 0,
        thumbItem: 3
    });
});

$(document).ready(function () {
    $('.my_order_button').click(function () {
        var order_method = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: 'ajax-order-status',
            data: {
                _token:_token,
                order_method: order_method
            },
            success:function(data){
                $('.box-table-my-order').html(data);
            }
        });
    });
    $('.cancel_order').click(function () {
        var order_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "post",
            url: 'cancel-order',
            data: {
                _token:_token,
                order_id: order_id
            },
            success:function(data){
                location.reload(data);
            }
        });
    });

});
    // AJAX XU LY TINH THANH QUAN HIEN XA OHUONG
$(document).ready(function(){
    $('.choose_address').change(function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
        //   alert(_token);
        if(action=='city'){
            result = 'district';
        }else{
            result = 'village';
        }
        // alert(result);
        $.ajax({
            type: "post",
            url: 'ajax_address',
            data: {
                _token:_token,
                ma_id: ma_id,
                action:action
            },
            success:function(data){
                $('#'+result).html(data);
            }
        });
    });
});
    // TÍnh phi van chueyn khi CHECKOUT

    $(document).ready(function (){
        $('.calculate_fee').change(function () {
            var city_id=$('#city').val();
            var district_id=$('#district').val();
            var village_id=$('#village').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type:"post",
                url:'ajaxcalculatefee',
                data:{
                    _token:_token,
                    city_id: city_id,
                    district_id:district_id,
                    village_id:village_id
                },
                success:function (data) {
                    $('#checkout_shipping_fee').html(data);
                }
            });
        });
    });

    /// Click Buton CLASSIFY'
    $(document).ready(function (){
        $('.down_amount_pro').click(function () {
            var cart_amount = $('#cart_detail_amount').val();
            cart_amount = cart_amount - 1;
            $(this).parents(".box-amount").find('#cart_detail_amount').attr('value', cart_amount);
        });
        $('.up_amount_pro').click(function () {
            var cart_amount = $('#cart_detail_amount').val();
            cart_amount = parseInt(cart_amount) + 1;
            $(this).parents(".box-amount").find('#cart_detail_amount').attr('value', cart_amount);
        });

        unactive=$('.box_product_classify').children('.tick_classify');
        function untick() {
            if (unactive.length > 0) {
                $.each(unactive, function (index) {
                    itemValue = unactive.eq(index).css({"color": "black", "border": "2px solid black"});
                });
            }
        }
        $('.tick_classify').on('click', function() {
            untick();
            $('.tick_classify').removeClass('active');
            $(this).addClass('active');
            $('.box_product_classify').children('.active').css({"color":"red","border":"2px solid red"});
        });
        $('.add_to_cart').on('click',function (){
            active = $('.box_product_classify').children('.active');
            if( active.length >0){
                var product_id = $('#product_id').val();
                var cart_detail_amount = $('#cart_detail_amount').val();
                var _token = $('input[name="_token"]').val();
                var classify_id = $('.box_product_classify').children('.active').attr('value');
                $.ajax({
                    type: "post",
                    url: 'add-cart',
                    data:{
                        product_id:product_id,
                        classify_id:classify_id,
                        cart_detail_amount:cart_detail_amount,
                        _token:_token
                    },
                    success:function(data){
                        alert("Them thanh cong");
                        // location.reload(data);
                    }
                });
            }else{
                $('.alert_classify').html('Vui lòng thêm phân loại!').css({"color":"red"});
            }
        });
    });
