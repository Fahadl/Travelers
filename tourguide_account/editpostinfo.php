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
             $tourguide_id = $_SESSION['tourguide_id'];
if(isset($_POST['submit'])) {
   $postinfo_id = $_GET['postinfo_id'];
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	
    $target_dir = "postinfo_images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { 
       
        $sql="UPDATE postinfo SET title='$title',description='$desc', image='$target_file' WHERE tourguide_id=$tourguide_id AND postinfo_id=$postinfo_id";

        $run = mysqli_query($con,$sql);

        if($run){
            echo '<div class="ok-msg">';
            echo "<p>Your postinfo Updated Successfully.</p>";
            echo '</div>';
            echo '<META HTTP-EQUIV="Refresh" Content="1; URL=mypostinfos.php">';    
            exit;
        } 
    }
    

}

?>
<?php
    $postinfo_id = $_GET['postinfo_id'];
    $query1 = "SELECT * FROM postinfo WHERE tourguide_id=$tourguide_id  AND postinfo_id=$postinfo_id";
	$result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
?>
            <form method="post" enctype="multipart/form-data">
                <table id="postinfoTable">
                    <caption>Edit postinfo</caption>
                    
                    <tr>
                        <th>postinfo Title</th>
                        <td>
                            <input type="text" name="title" placeholder="Enter postinfo Title" value="<?php echo $row1['title'] ?>" autofocus required>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Description</th>
                        <td>
                            <textarea type="desc" name="desc" rows="8" placeholder="Enter postinfo Description" required><?php echo $row1['description'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>postinfo Image</th>
                        <td>
                            <input type="file" name="image" accept="image/*" required style="height:34px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            &nbsp;
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Edit postinfo" id="submit">
                           
                        </td>
                    </tr>
                    
                </table>
            </form>
        </div>
      </div>
  </body>
</html>