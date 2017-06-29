<script>
$(document).ready(function() {
  $("#inputPassword").blur(function(){
    var sao = $("#inputPassword").val();
    var vay = $("#inputPasswords").val();
    $.get("function/checkpassword.php",{sao : sao , vay : vay},function(data){
      if (data == 0){
        $("#kqPasswords").html("     ✔ Hợp lệ");
        $("#kqPassword").html("     ✔ Hợp lệ");
        $("#kqPasswords").css("color","green");
        $("#kqPassword").css("color","green");
        $("#kqPasswords").css("font-weight","bold");
        $("#kqPassword").css("font-weight","bold");
      }
      else {
        $("#kqPasswords").html("    ☹ Không giống nhau");
        $("#kqPassword").html("    ☹ Không giống nhau");
        $("#kqPasswords").css("color","red");
        $("#kqPassword").css("color","red");
        $("#kqPasswords").css("font-weight","bold");
        $("#kqPassword").css("font-weight","bold");
      }
    });
  });
});
</script>
