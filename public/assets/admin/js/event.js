/*
   CHECK DOI MK O ADMIN
 */
$(document).ready(function(){
   function readURL(input, next, i) {
      if (input.files && input.files[i]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $(next).append('<img src="' + e.target.result + '" alt="" height="100" width="100" class="img-thumbnail">');
         }
         reader.readAsDataURL(input.files[i]);
      }
   }
   $("input[name=provider_image]").change(function() {
      $(this).next().html('');
      readURL(this, '.image_provider', 0);
   });
   $("input[name=product_image]").change(function() {
      $(this).next().html('');
      readURL(this, '.image_product', 0);
   });
   $("input[name='product_images[]']").change(function() {
      $(this).next().html('');
      console.log(this.files);
      for (let i = 0; i < this.files.length; i++) {
         readURL(this, '.images_product', i);
      }
   });
   //
   // $('#provider_image').change(function () {
   //    var tt=$('#provider_image');
   //    alert(tt);
   //    html='<img src="' +tt.toDataURL("image/png") + '" height="100" width="100">';
   //    $('.image_provider').html(html);
   // });
});


$(document).ready(function(){
   $('.import_select_choose').change(function () {
      arr = $("select[name='product_id[]'] option:selected");
      html = '';
      var o=1;
      for (let i = 0; i < arr.length; i++) {
         html += '<tr>';
         html += '<td>' + o++ + '</td>';
         html += '<td>' + arr.eq(i).html() + '</td>';
         html += '<td><input type="text" data-type="currency" name="price[]" class="form-control import_price text-right"></td>';
         html += '<td><input type="number"  min="1" value="0" name="amount[]" class="form-control import_amount text-right" ></td>';
         html += '<td class="import_total text-right"></td>';
         html += '</tr>';
      }
      $('.body_import').html(html);
      changeTotal();
   });
   function changeTotal() {
      $('input[name="price[]"]').on('change', function() {
         price = $(this).val();
         total = parseInt(price) * parseInt($(this).parent().next().find('input[name="amount[]"]').val());
         $(this).parent().next().next().html((total + ""));
         updateTotal();

      });
      $('input[name="amount[]"]').on('change', function() {
         price = $(this).parent().prev().find('input[name="price[]"]').val();
         total = parseInt(price) * parseInt($(this).val());
         $(this).parent().next().html((total + ""));
         updateTotal();
      });
   }
   $('.import_cost').on('change', function() {
      sumTotal = parseInt($('.import_cost').val()) + parseInt($('.import_total_price').html());
      $('.import_total_last').html((sumTotal + ""));
   });
   function updateTotal() {
      arramount = $('input[name="amount[]"');
      arrtotal = $('.import_total');
      sumTotal = 0;
      sumAmount = 0;
      for (let i = 0; i < arramount.length; i++) {
         el1 = arrtotal.eq(i).html();
         sumTotal += parseInt(el1);
         el = arramount.eq(i).val();
         sumAmount += parseInt(el);
      }
      $('.import_total_price').html((sumTotal + "")+'&nbsp');
      $('.import_total_amount').html(sumAmount+'&nbsp');
      if($('.import_cost').val()){
         sumTotal += parseInt($('.import_cost').val());
      }
      $('.import_total_last').html((sumTotal + "")+'&nbsp');
   }
});


$(document).ready(function(){
   $('.import_select_choose').select2({
       tags: true,
       tokenSeparators: [',', ' ']
   });
}) ;

$('#change-password').change(function (){
   var status=!$(this).is(":checked");
   showChangePass(status);
});
$('#reset-edit-user').click(function (){
   $("#user_name").val("");
   $("#user_email").val("");
   showChangePass(true);
});
function showChangePass(status){
   $("#user_password").attr('readonly',status);
   $("#user_cf_password").attr('readonly',status);
   $("#user_password").val("");
   $("#user_cf_password").val("");
}


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
      $.ajax({
         type: "post",
         url: 'ajaxdistrict',
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

$(document).on('blur','.edit_shipping_fee',function(){
   var shipping_id = $(this).data('shipping_id');
   var fee_value = $(this).text();
   var _token = $('input[name="_token"]').val();
   $.ajax({
      url : 'admin/shipping/ajaxupdatefee',
      method: 'POST',
      data:{
         shipping_id:shipping_id, fee_value:fee_value, _token:_token
      },
      success:function(data){
         alert("Cap nhat thanh cong");
         // location.reload(data);
      }
   });

});


$(document).ready(function() {

   function readURL(input, next, i) {
      if (input.files && input.files[i]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $(next).append('<img src="' + e.target.result + '" alt="" class="img-thumbnail">');
         }
         reader.readAsDataURL(input.files[i]);
      }
   }

   $("input[name=product_image]").change(function() {
      console.log( $(this).next());
      $(this).next().html('');
      readURL(this, $(this).next(), 0);
   });
   $("input[name='product_images[]']").change(function() {
      console.log(this.files);
      for (let i = 0; i < this.files.length; i++) {
         readURL(this, $(this).next(), i);
      }

   });
});

function ChangeToSlug()
{
   var slug;
   //Lấy text từ thẻ input title
   slug = document.getElementById("slug").value;
   slug = slug.toLowerCase();
   //Đổi ký tự có dấu thành không dấu
   slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
   slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
   slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
   slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
   slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
   slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
   slug = slug.replace(/đ/gi, 'd');
   //Xóa các ký tự đặt biệt
   slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
   //Đổi khoảng trắng thành ký tự gạch ngang
   slug = slug.replace(/ /gi, "-");
   //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
   //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
   slug = slug.replace(/\-\-\-\-\-/gi, '-');
   slug = slug.replace(/\-\-\-\-/gi, '-');
   slug = slug.replace(/\-\-\-/gi, '-');
   slug = slug.replace(/\-\-/gi, '-');
   //Xóa các ký tự gạch ngang ở đầu và cuối
   slug = '@' + slug + '@';
   slug = slug.replace(/\@\-|\-\@|\@/gi, '');
   //In slug ra textbox có id “slug”
   document.getElementById('convert_slug').value = slug;
}


