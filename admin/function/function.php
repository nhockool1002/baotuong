<!-- Confirm Function -->
 <SCRIPT LANGUAGE="JavaScript">
 function confirmAction() {
   return confirm("Bạn có thực sự muốn thay đổi !")
 }
 </SCRIPT>

<!-- AJAX Get Info Category -->
<script type="text/javascript">
$(document).ready(function() { // Vì js này nằm trên đoạn html, nên phải đợi ready rồi mới add event click vào
  $(".updatecat").click(function() {
  var id = $(this).data('id');
  $.get("function/getcat.php",{id : id},function(data){
    var obj = JSON.parse(data);
    $("#catid-edit").val(obj.catid);
    $("#catname-edit").val(obj.catname);
    $("#catname-none-edit").val(obj.catname_none);
    $("#cat-status").html("Điền dữ liệu mới vào Form và nhấn lưu lại");
    $("#cat-status").css("color","red");
    $("#cat-status").css("text-align","center");
    $("#cat-status").css("font-weight","bold");
    $("#kqCATID").html("Dữ liệu này không thể thay đổi");
    $("#kqCATID").css("color","red");
    $("#kqCATID").css("text-align","left");
    $("#kqCATID").css("font-weight","bold");
  })
  });
})
</script>

<!-- AJAX Add Category -->
<script>
    $(document).ready(function() {
      $("#addcat-button").click(function() {
        var addcatname = $("#addcat-name").val();
        var addcatnoname = $("#addcat-noname").val();
        console.log(addcatname);
        console.log(addcatnoname);
        $.get("function/addnewcat.php",{addcatname : addcatname, addcatnoname : addcatnoname},function(data){
          if (data == 1) {
            $("#addcat-status").html("Có dữ liệu bị trùng vui lòng kiểm tra lại");
            $("#addcat-status").css("font-weight","bold");
          }
          else {
            $("#addcat-status").html("Đã thêm danh mục mới");
            $("#addcat-status").css("font-weight","bold");
            setTimeout(function(){
                       window.location = 'index.php?page=addcat';
                  }, 50);
          }
        });
      });
    });
</script>

<!-- DELETE DISCOUNT AJAX -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".discount-del").click(function(){
      var id = $(this).data("id");
      console.log(id);
      var answer = confirm ("Bạn có chắc chắn muốn xóa khuyến mãi này không ?");
      if (answer)
      {
        $.get("function/deldiscount.php",{id : id},function(data){
            if (data==1) {
              setTimeout(function(){
                         window.location = 'index.php?page=discountlist';
                    }, 0);
            }
            else alert("Không xóa được khuyến mãi !");
        });
      }
    });
  });
</script>

<!-- AJAX Delete Category -->
<script type="text/javascript">
$(document).ready(function() { // Vì js này nằm trên đoạn html, nên phải đợi ready rồi mới add event click vào
  $(".delcat").click(function() {
  var id = $(this).data('id');
  var answer = confirm ("Bạn có chắc chắn muốn xóa danh mục này không ?");
    if (answer)
    {
      $.get("function/delcat.php",{id : id},function(data){
          if (data==1) {
            setTimeout(function(){
                       window.location = 'index.php?page=catlist';
                  }, 0);
          }
          else alert("Không xóa được danh mục !");
      });
    }
  });
})
</script>

<!-- AJAX Edit Category -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#cat-update").click(function(){
      var id = $("#catid-edit").val();
      var name = $("#catname-edit").val();
      var nonename = $("#catname-none-edit").val();
      $.get("function/update-cat.php",{id : id, name : name, nonename : nonename},function(data){
        if(data == 1){
          $("#cat-status").html("Changed");
          $("#cat-status").css("color","green");
          $("#cat-status").css("text-align","center");
          $("#cat-status").css("font-weight","bold");
          setTimeout(function(){
                     window.location = 'index.php?page=catlist';
                }, 50);
        }
        else{
          $("#cat-status").html("SML");
          $("#cat-status").css("color","red");
          $("#cat-status").css("text-align","center");
          $("#cat-status").css("font-weight","bold");
        }
      });
    });
  });

</script>

<!-- AJAX CHECK NAME CATEGORY -->
<script>
    $(document).ready(function() {
      $("#addcat-name").blur(function() {
        var catname = $(this).val()
        $.get("function/checkcatname.php",{catname : catname},function(data){
          if(data ==1){
            $("#checkname").html("Đã tồn tại");
          }else {
            $("#checkname").html("Hợp lệ");
          }
        });
      });
    });
</script>
<script>
    $(document).ready(function() {
      $("#addcat-noname").blur(function() {
        var noname = $(this).val()
        $.get("function/checknoname.php",{noname : noname},function(data){
          if(data ==1){
            $("#checknoname").html("Đã tồn tại");
          }else {
            $("#checknoname").html("Hợp lệ");
          }
        });
      });
    });
</script>
<!-- Checking Discount ID AJAX -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#id-discount").keyup(function(){
      var code = $("#id-discount").val();
      $.get("function/check-discount-code.php",{code:code}, function(data){
        console.log(code);
        console.log(data);
        if(data == 1){
          $("#trk-id").css("font-weight","bold");
          $("#trk-id").css("text-align","left");
          $("#trk-id").css("color","red");
          $("#trk-id").css("font-size","12px");
          $("#trk-id").css("border","red");
          $("#trk-id").html("Discount Code này đã tồn tại vui lòng nhập mã khác");
        }else {
          $("#trk-id").css("font-weight","bold");
          $("#trk-id").css("text-align","left");
          $("#trk-id").css("color","green");
          $("#trk-id").css("font-size","12px");
          $("#trk-id").html("Bạn có thể dùng Discount Code này !");
        }
    });
  });
  });
</script>

<!-- Discount Checked Form AJAX -->
<script>
  $(document).ready(function() {
    $("#formdiscount").submit(function(){
      $("#error-discount").css("font-weight","bold");
      $("#error-discount").css("text-align","center");
      $("#error-discount").css("color","red");
      $("#error-discount").css("font-size","15px");
      var code = $("#id-discount").val();
      var content = $("#ct-discount").val();
      var sdiscount = $("#start-discount").val();
      var ediscount = $("#end-discount").val();
      if(code == ""){
        $("#error-discount").html("Mã khuyến mãi không được để trống.");
        $("#id-discount").focus();
        return false;
      }
      if(content == ""){
        $("#error-discount").html("Nội dung khuyến mãi không được để trống.");
        $("#ct-discount").focus();
        return false;
      }
      if(sdiscount == ""){
        $("#error-discount").html("Ngày bắt đầu khuyến mãi chưa nhập.");
        $("#start-discount").focus();
        return false;
      }
      if(ediscount == ""){
        $("#error-discount").html("Ngày kết thúc khuyến mãi chưa nhập.");
        $("#end-discount").focus();
        return false;
      }
      return true;
    });
  });
</script>
<!-- Validate Add Product -->
<script type="text/javascript">
    $(document).ready(function(){
      $("#formaddproduct").submit(function(){
        $("#error").css("font-weight","bold");
        $("#error").css("text-align","center");
        $("#error").css("color","red");
        $("#error").css("font-size","15px");
        // var lone = $("#pdimg")[0].files[0].name;
        // var lone1 = $("#pdimg")[0].files[0].type;
        // var lone2 = $("#pdimg")[0].files[0].size;
        // alert(lone2);
        var namepd = $("#pdname").val();
        if(namepd == ""){
          $("#error").html("Lỗi - Không điền tên sản phẩm");
          $("#pdname").focus();
          return false;
        }

        if(!isNaN(namepd)){
          $("#error").html("Lỗi - Tên sẩn phẩm không phải là số");
          $("#namepd").focus();
          return false;
        }

        var pddes = $("#pddes").val();
        if(pddes == ""){
          $("#error").html("Lỗi - Không điền mô tả sản phẩm");
          $("#pddes").focus();
          return false;
        }

        var pdprice = $("#pdprice").val();
        if(pdprice == ""){
          $("#error").html("Lỗi - Chưa nhập giá sản phẩm");
          $("#pdprice").focus();
          return false;
        }

        if(isNaN(pdprice)){
          $("#error").html("Lỗi - Giá tiền nhập không phải là số");
          $("#pdprice").focus();
          return false;
        }

        var pdcat = $("#pdcat").val();
        if(pdcat == 0){
          $("#error").html("Lỗi - Chưa chọn danh mục sản phẩm");
          $("#pdcat").focus();
          return false;
        }
        var pdimg = $("#pdimg").val();
        if(pdimg == ""){
          $("#error").html("Lỗi - Chưa chọn hình đại diện");
          $("#pdimg").focus();
          return false;
        }

        var imgtype = $("#pdimg")[0].files[0].type;
        if(imgtype != 'image/jpeg' && imgtype != 'image/png' && imgtype != 'image/gif' && imgtype != 'image/bmp'){
          $("#error").html("Lỗi - Hình không đúng định dạng");
          $("#pdimg").focus();
          return false;
        }

        return true;
      });
    });
</script>

<!-- AJAX EDIT PRODUCT -->
<script type="text/javascript">
    $(document).ready(function(){
      $("#eformaddproduct").submit(function(){
        $("#eerror").css("font-weight","bold");
        $("#eerror").css("text-align","center");
        $("#eerror").css("color","red");
        $("#eerror").css("font-size","15px");
        // var lone = $("#pdimg")[0].files[0].name;
        // var lone1 = $("#pdimg")[0].files[0].type;
        // var lone2 = $("#pdimg")[0].files[0].size;
        // alert(lone2);
        var namepd = $("#epdname").val();
        if(namepd == ""){
          $("#eerror").html("Lỗi - Không được để trống tên");
          $("#epdname").focus();
          return false;
        }

        if(!isNaN(namepd)){
          $("#eerror").html("Lỗi - Tên sẩn phẩm không phải là số");
          $("#epdname").focus();
          return false;
        }

        var epddes = $("#epddes").val();
        if(epddes == ""){
          $("#eerror").html("Lỗi - Không điền mô tả sản phẩm");
          $("#epddes").focus();
          return false;
        }

        var epdprice = $("#epdprice").val();
        if(epdprice == ""){
          $("#eerror").html("Lỗi - Chưa nhập giá sản phẩm");
          $("#epdprice").focus();
          return false;
        }

        if(isNaN(epdprice)){
          $("#eerror").html("Lỗi - Giá tiền nhập không phải là số");
          $("#epdprice").focus();
          return false;
        }

        var epdcat = $("#epdcat").val();
        if(epdcat == 0){
          $("#eerror").html("Lỗi - Chưa chọn danh mục sản phẩm");
          $("#epdcat").focus();
          return false;
        }

        if(("#inlineRadio1ss").prop('checked','true')){
        var epdimg = $("#epdimg").val();
        if(epdimg == ""){
          $("#eerror").html("Lỗi - Chưa chọn hình đại diện");
          $("#epdimg").focus();
          return false;
        }


        var imgtype = $("#pdimg")[0].files[0].type;
        if(imgtype != 'image/jpeg' && imgtype != 'image/png' && imgtype != 'image/gif' && imgtype != 'image/bmp'){
          $("#error").html("Lỗi - Hình không đúng định dạng");
          $("#pdimg").focus();
          return false;
        }
      }
        return true;
      });
    });
</script>
