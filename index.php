<?php

session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
      include("inc/connect.php");
      include("inc/header.php");
      include("inc/checkUsername-js.php");
      include("inc/checkPassword-js.php");
      include("inc/checkEmail-js.php");
      include("inc/scrolltop.php");
    ?>
  </head>
  <body>
    <?php
        include("inc/top-menu.php");
        include("inc/banner-top.php");
        include("inc/menu-primary.php");
        include("inc/status-member.php");
        if(isset($_GET["page"]))
        {
          $id = $_GET["page"];
        }
        else $id = "";
        switch ($id) {
          case 'reg':
            include ROOT."/inc/register.php";
            break;
          case 'login':
            include ROOT."/inc/login.php";
          case 'contact':
            include ROOT."/inc/contact.php";
            break;
          default:
            include("inc/content.php");
        }

     ?>
  </body>
  <hr>
  <footer>
    <?php
        include("inc/footer.php");
     ?>
  </footer>
  <div id="top-up"><i class="fa fa-arrow-circle-o-up"></i></div>
</html>
<?php
ob_end_flush(); ?>
