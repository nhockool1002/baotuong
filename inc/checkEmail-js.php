<script type="text/javascript">
$(document).ready(function(){
  $("#inputEmail").blur(function(){
    var email = $('#inputEmail').val();
    $.get("function/checkemail.php",{email : email},function(data){
      if (data == 0){
        $("#kqEmail").html("     ✔ Hợp lệ");
        $("#kqEmail").css("color","green");
        $("#kqEmail").css("font-weight","bold");
      }
      else {
        $("#kqEmail").html("    ☹ Email đã đăng ký");
        $("#kqEmail").css("color","red");
        $("#kqEmail").css("font-weight","bold");
      }
    });
  });
});
</script>
