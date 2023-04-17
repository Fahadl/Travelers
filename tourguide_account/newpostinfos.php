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
            if (isset($_POST['submit'])) {
                $tourguide_id = $_SESSION['tourguide_id'];
                $title = $_POST['title'];
                $desc = $_POST['desc'];

                $target_dir = "postinfo_images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO postinfo VALUES (NULL, '$title','$desc', '$target_file', NOW(),$tourguide_id)";

                    $run = mysqli_query($con, $sql);

                    if ($run) {
                        echo '<div class="ok-msg">';
                        echo "<p>Your postinfo Published Successfully.</p>";
                        echo '</div>';
                        echo '<META HTTP-EQUIV="Refresh" Content="1; URL=mypostinfos.php">';
                        exit;
                    }
                }
            }

            ?>
            <form method="post" enctype="multipart/form-data">
                <table id="postinfoTable">
                    <caption>Write New Post</caption>

                    <tr>
                        <th>City name</th>
                        <td>
                            <input type="text" name="title" placeholder="Enter City" autofocus required>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th>Description</th>
                        <td>
                      <textarea type="desc" name="desc" rows="8" placeholder="Enter Post Description" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>Post Image</th>
                        <td>
                            <input type="file" name="image" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            &nbsp;

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value="Publish Post" id="submit">

                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
</body>

</html>