<?php session_start();
include "../connect.php";?>
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

	$tourguide_id = $_SESSION['tourguide_id'];
	$query1 = "SELECT * FROM postinfo WHERE tourguide_id=$tourguide_id  Order BY postinfo_id DESC";

	$result1 = mysqli_query($con, $query1);
	$count = mysqli_num_rows($result1);
	if($count == 0) {
		echo '<div class="error-msg">';
			echo "<p>No Posts Here</p>";
		echo '</div>';
		
	} else {
?>

	<?php
	$i =1;
	while($row1 = mysqli_fetch_array($result1)) {
		echo '<table id="onepostinfo" border="0 ">';
			echo '<tr>';
                echo '<td rowspan="5" width="170">';
                echo '<img src="' . $row1['image'] . '">';
                echo '</td>';
            echo '</tr>';
             echo '<tr style="height:35px;">';   
                echo '<td><h3>' . $row1['title'] . '</h3></td>';
			echo '</tr>';
            echo '<tr valign="top">';   
                echo '<td>' . $row1['description'] . '</td>';
			echo '</tr>';
            echo '<tr>';   
                echo '<td>' . $row1['publish_date'] . '</td>';
			echo '</tr>';
            echo '<tr>';   
                echo '<td><a href="postinfoDetails.php?postinfo_id=' . $row1['postinfo_id'] . '">Details</a> <a href="editpostinfo.php?postinfo_id=' . $row1['postinfo_id'] . '">Edit</a> <a href="deletepostinfo.php?postinfo_id=' . $row1['postinfo_id'] . '">Delete</a></td>';
			echo '</tr>';
		echo '</table>';
	}
		}
	?>	  

</div>
      </div>
  </body>
</html>