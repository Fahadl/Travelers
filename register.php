<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My postingo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row text-center">
            <h1>Welcome To Travelers</h1>
 <?php
include "connect.php";
if(isset($_POST['submit'])) {
	$type = $_POST['type'];
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

    $sql="INSERT INTO $type VALUES (NULL, '$fullname','$email', '$username', '$password')";

    $run = mysqli_query($con,$sql);

    if($run){
        echo '<div class="ok-msg">';
        echo "<p>$type Account saved successfully.</p>";
        echo '</div>';
        echo '<META HTTP-EQUIV="Refresh" Content="1; URL=index.php">';    
        exit;
    } 

}

?>           
            <form method="post">
                <table id="loginTable">
                    <caption>Register New Account</caption>
                    <tr>
                        <td colspan="2">
                            <img src="images/Tlogo.jpg" class="logo">
                        </td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>
                            <select name="type">
                                <option value="tourguide">Tour guide</option>
                                <option value="user">Tourist</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td>
                            <input type="text" name="fullname" placeholder="Enter Full Name" autofocus required>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" name="email" placeholder="Enter Email" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username" required>
                        </td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td>
                            <input type="password" name="password"  placeholder="Enter Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Register Account" id="submit">
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <p align="center">Have Account? <a href="index.php">Login</a></p></td>
                    </tr>
                </table>
            </form>
        </div>
      </div>
    
      
  </body>
</html>