<?php session_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fullname'] ?> Tour guide</title>
    <link href="../css/bootstrap2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <?php include "navs.php"; ?>
             <?php
if(isset($_GET['postinfo_id'])) {
    $tourguide_id = $_SESSION['tourguide_id'];
    $postinfo_id = $_GET['postinfo_id'];
    $sql="DELETE FROM postinfo WHERE postinfo_id=$postinfo_id AND tourguide_id=$tourguide_id";

    $run = mysqli_query($con,$sql);

    if($run){
        echo '<div class="ok-msg">';
        echo "<p>Your postinfo Deleted Successfully.</p>";
        echo '</div>';
        echo '<META HTTP-EQUIV="Refresh" Content="1; URL=mypostinfos.php">';    
        exit;
    }

}

?>           
        </div>
      </div>
  </body>
</html>