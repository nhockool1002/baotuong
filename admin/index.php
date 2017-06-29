<?php
  session_start();
  include ("config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      include("inc/header.php");
    ?>
    <SCRIPT LANGUAGE="JavaScript">
    function confirmAction() {
      return confirm("Bạn có thực sự muốn thay đổi !")
    }
    </SCRIPT>
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
          })
        }
      });
    })
    </script>

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
  </head>
  <body>

    <div id="wrapper"> <!-- START WRAPPER -->
      <?php
      include("inc/navigation.php");
      if(isset($_GET["page"])){
        $id = $_GET["page"];
      }
      else $id = "";
      switch ($id) {
          case 'catlist':
            include("inc/catlist.php");
            break;
          case 'addcat':
            include("inc/addcat.php");
            break;
        default:
          include("inc/pagewrapper.php");
      }
      ?>
    </div> <!-- END WRAPPER -->
  </body>
</html>
