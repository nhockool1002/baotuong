<?php
  ob_start();
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
<?php
ob_end_flush(); ?>
