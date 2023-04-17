<?php session_start();
include "../connect.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fullname'] ?> Tourguide</title>
    <link href="../css/bootstrap2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <?php include "navs.php"; ?>
<?php 
    $postinfo_id = $_GET['postinfo_id'];
	$tourguide_id = $_SESSION['tourguide_id'];
	$query1 = "SELECT * FROM postinfo WHERE tourguide_id=$tourguide_id AND postinfo_id=$postinfo_id  Order BY postinfo_id DESC";

	$result1 = mysqli_query($con, $query1);
	$count = mysqli_num_rows($result1);
	if($count == 0) {
		echo '<div class="error-msg">';
			echo "<p>No postinfo Here</p>";
		echo '</div>';
		
	} else {
?>

	<?php
	$i =1;
	while($row1 = mysqli_fetch_array($result1)) {
        
        
		echo '<table id="onepostinfo" border="0" style="width:700px;">';
			 echo '<tr>';   
                echo '<td align="left"><a href="editpostinfo.php?postinfo_id=' . $row1['postinfo_id'] . '">Edit</a> <a href="deletepostinfo.php?postinfo_id=' . $row1['postinfo_id'] . '">Delete</a></td>';
			echo '</tr>';
             echo '<tr style="height:35px;">';   
                echo '<td><h3>' . $row1['title'] . '</h3></td>';
                echo '<td width="100">' . $row1['publish_date'] . '</td>';
			echo '</tr>';
            echo '<tr>';
                echo '<td colspan="2">';
                echo '<img src="' . $row1['image'] . '" style="width:98%; height:300px;">';
                echo '</td>';
            echo '</tr>';
            echo '<tr valign="top">';   
                echo '<td><blockquote>' . $row1['description'] . '</blockquote></td>';
			echo '</tr>';
           
		echo '</table>';
	}
		}
	?>	  
<!-- <hr> -->

<div class="well rating">
    <h3 align="center">Tourists Rating</h3>
<?php
    
    $query6 = "SELECT * FROM rating WHERE postinfo_id=$postinfo_id order by rating_id desc";
    $result6= mysqli_query($con, $query6);
    $count6 = mysqli_num_rows($result6);
    if($count6 == 0) {
        echo "<p style='text-align:center; color:red'>No Tourists Rating</p>";
    } else {
        while($row6 = mysqli_fetch_array($result6)){
            $rated_user_id = $row6['user_id'];
             $query4 = "SELECT * FROM user WHERE user_id=$rated_user_id ";
             $result4 = mysqli_query($con, $query4);
             $row4 = mysqli_fetch_array($result4);
            
            echo '<div class="oneRate">';
                echo '<p><i><b>Rated By: ' . $row4['fullname'] . '</b></i> => ';
                $to = $row6['rating'];
                for ($i = 1; $i<=5; $i++) {
                    if($i<=$to) {
                        echo "<img src='../images/filledStar.png'>";
                    } else {
                        echo "<img src='../images/emptyStar.png'>";
                    }
                }
                echo '</p>';
            echo '</div>';
        }
        
    }
?>
</div> 

 <hr> 

<?php 
    $postinfo_id = $_GET['postinfo_id'];
	$query3 = "SELECT * FROM comment WHERE postinfo_id=$postinfo_id  Order BY comment_id DESC";

	$result3 = mysqli_query($con, $query3);
	$count3 = mysqli_num_rows($result3);
	if($count3 == 0) {
        echo '<h3 align="center">User Comments</h3>';
		echo '<div class="error-msg">';
			echo "<p>No Comments Here</p>";
		echo '</div>';
		
	} else {
?> 

        <h3 align="center">Tourists Comments - <?php echo $count3; ?></h3>      
	<?php
	while($row3 = mysqli_fetch_array($result3)) {

		echo '<table id="onepostinfo" border="0" style="width:700px;">';
            
            echo '<tr style="height:35px;">';
                echo '<td width="120" valign="top" align="center"><img src="../images/comment.png" style="height:30px;width:30px;">';
                 echo '<p style="color:#95a5a6; font-size:15px;">' . $row3['comment_date'] . '</p>';
                echo '</td>';
                 echo '<td valign="top"><p align="justify" style="color:#34495e">' . $row3['comment'] . '</p>';
                $comment_user_id = $row3['user_id'];
                 $query4 = "SELECT * FROM user WHERE user_id=$comment_user_id ";
	             $result4 = mysqli_query($con, $query4);
                 $row4 = mysqli_fetch_array($result4);
                echo '<span style="float:right"><i><b>Comment By: ' . $row4['fullname'] . '</b></i></span>';
                    if(!is_null($row3['tourguide_replay'])) {
                        echo "<div style='margin-left: 30px;'>";
                            echo "<small><i>tourguide Replay</i></small>";
                            echo "<blockquote class='small'>" . $row3['tourguide_replay'] . "</blockquote>";
                        echo '</div>';
                    } else {
                        ?> 

<form method="post" action="addReplay.php">
<table id="postinfoTable" style="min-width:98%">
    <tr valign="top">
        <td>
            <textarea type="comment" name="comment" rows="2" placeholder="Enter Reply" required id="replayText"></textarea>
            <input type="hidden" name="comment_id" value="<?php  echo $row3['comment_id'] ?>">
            <input type="hidden" name="postinfo_id" value="<?php  echo $row3['postinfo_id'] ?>">
        </td>
    </tr>
    
    <tr>
        <td align="center">
     <input type="submit" name="submit" value="Reply Now!" id="submit" style="max-width:120px;height:20px; float:right">
        </td>
    </tr>

</table>
</form>
                        <?php
                    }
                echo '</td>';
               
            echo '</tr>';
           
            
           
		echo '</table>';
	}
		}
	?>	
<hr>
</div>
      </div> -->
  </body>
</html>