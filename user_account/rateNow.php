<?php session_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fullname'] ?> tourguide</title>
    <link href="../css/bootstrap2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <?php include "navs.php"; ?>
<?php
if(isset($_GET['rate'])) {
	$rate = $_GET['rate'];
	$postinfo_id = $_GET['postinfo_id'];
	$user_id = $_GET['user_id'];
	
    $sql="INSERT INTO rating VALUES(NULL, $rate, $user_id, $postinfo_id)";

    $run = mysqli_query($con,$sql);

    if($run){
        echo '<div class="ok-msg">';
        echo "<p>Your Rating Published Successfully.</p>";
        echo '</div>';
        echo '<META HTTP-EQUIV="Refresh" Content="1; URL=postinfoDetails.php?postinfo_id=' . $postinfo_id . '">';    
        exit;
    } 
}
?>  
        </div>
      </div>
  </body>
</html>