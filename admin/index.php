<?php
  ob_start();
  session_start();
  include ("config.php");
  include ADROOT."/function/func.php";
  spl_autoload_register("loadClass");
  $obj = new Db();
  if(isset($_SESSION['user']) && $_SESSION['user']== 'admin'){
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      include("inc/header.php");
      include("function/function.php");
    ?>
    <!-- <script type="text/javascript">
      $(document).ready(function(){
        $(".list-cat-pr").click(function(){
          var id = $(this).data('id');
          $.get("function/getallpdwithid.php",{id : id, num : num},function(data){
            console.log(data);
            $("#sanphamid").html("Sản Phẩm Theo Danh Mục");
            $("#showPR").html(data);
          })
        });
      });
    </script> -->
    <script>
      $(document).ready(function() {
        $("#adminpanellogout").click(function(){
          $.get("function/logout.php",function(){
            console.log("LOGOUT!");
            setTimeout(function(){
                       window.location = 'index.php';
                  }, 0);
          })
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
          case 'prolist':
            include("inc/prolist.php");
            break;
          case 'addproduct':
            include("inc/addproduct.php");
            break;
          case 'editproduct':
              include("inc/editproduct.php");
              break;
          case 'adddiscount':
              include("inc/adddiscount.php");
              break;
          case 'discountlist':
              include("inc/discountlist.php");
              break;
          case 'editdiscount':
              include("inc/editdiscount.php");
              break;
        default:
          include("inc/pagewrapper.php");
      }
      ?>
    </div> <!-- END WRAPPER -->
  </body>
</html>
<?php
}
else {
  include("inc/header.php");
  include("function/function.php");
?>
  <center><img src="../img/logo-large.png" width="300px">  </center><br>
<div class="alert alert-danger text-sm-center" role="alert">
  <center><strong>Chú ý!</strong> trang này dành cho admin, vui lòng <a href="../index.php?page=login" class="alert-link"> đăng nhập </a> để sử dụng toàn bộ chức năng.</center>
</div>
<?php }
ob_end_flush(); ?>
