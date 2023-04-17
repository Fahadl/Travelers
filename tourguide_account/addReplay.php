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
if(isset($_POST['submit'])) {
	$comment = $_POST['comment'];
	$postinfo_id = $_POST['postinfo_id'];
	$comment_id = $_POST['comment_id'];
	
    $sql="UPDATE comment SET tourguide_replay = '$comment' WHERE postinfo_id=$postinfo_id AND comment_id=$comment_id";

    $run = mysqli_query($con,$sql);

    if($run){
        echo '<div class="ok-msg">';
        echo "<p>Your Replay Published Successfully.</p>";
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