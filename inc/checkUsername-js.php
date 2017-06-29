<script type="text/javascript">
$(document).ready(function(){
  $("#inputUsername").blur(function(){
    var username = $("#inputUsername").val();
    $.get("function/checkusername.php",{username : username},function(data){
      if (data == 0){
        $("#kqUsername").html("     ✔ Hợp lệ");
        $("#kqUsername").css("color","green");
        $("#kqUsername").css("font-weight","bold");
      }
      else {
        $("#kqUsername").html("    ☹ Tài khoản đã đăng ký");
        $("#kqUsername").css("color","red");
        $("#kqUsername").css("font-weight","bold");
      }
    });
  });
});
</script>
