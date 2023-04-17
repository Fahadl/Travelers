<?php session_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fullname'] ?> Tourist </title>
    <link href="../css/bootstrap2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <?php include "navs.php"; ?>
             <?php
                session_destroy();
                echo '<div class="ok-msg">';
                echo "<p>You're Logging Out Successfully.</p>";
                echo '</div>';
                echo '<META HTTP-EQUIV="Refresh" Content="1; URL=../index.php">';    
                exit;

            ?>           
        </div>
      </div>
  </body>
</html>