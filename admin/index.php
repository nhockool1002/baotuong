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
      include("function/function.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
          $("#formaddproduct").submit(function(){
            // var lone = $("#pdimg")[0].files[0].name;
            // var lone1 = $("#pdimg")[0].files[0].type;
            // var lone2 = $("#pdimg")[0].files[0].size;
            // var lone2 = $("#pdimg")[0].files[0].tmp_name;
            // alert(lone2);
            var namepd = $("#pdname").val();
            if(namepd == ""){
              $("#error").html("Lỗi - Không điền tên sản phẩm");
              $("#error").css("font-weight","bold");
              $("#error").css("text-align","center");
              $("#error").css("color","red");
              $("#error").css("font-size","20px");
              $("#pdname").focus();
              return false;
            }

            var pddes = $("#pddes").val();
            if(pddes == ""){
              $("#error").html("Lỗi - Không điền mô tả sản phẩm");
              $("#error").css("font-weight","bold");
              $("#error").css("text-align","center");
              $("#error").css("color","red");
              $("#error").css("font-size","20px");
              $("#pddes").focus();
              return false;
            }

            var pdimg = $("#pdimg").val();
            if(pddes == NULL){
              $("#error").html("Lỗi - File Null");
              $("#error").css("font-weight","bold");
              $("#error").css("text-align","center");
              $("#error").css("color","red");
              $("#error").css("font-size","20px");
              $("#pdimg").focus();
              return false;
            }
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
            case 'addproduct':
              include("inc/addproduct.php");
              break;
        default:
          include("inc/pagewrapper.php");
      }
      ?>
    </div> <!-- END WRAPPER -->
  </body>
</html>
