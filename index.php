<?php session_start(); ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Travelers</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row text-center">
            <h1>Welcome To Travelers</h1>
 <?php 
include "connect.php";
if(isset($_POST['submit'])){
	$type = $_POST['type'];
	$username=$_POST['username'];
	$password= $_POST['password'];
	if($type == 'tourguide') {
		 $sql="SELECT * FROM tourguide WHERE username='$username' and password='$password' ";
		$run = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run);
		$count = mysqli_num_rows($run);
		if($count==1)
		{
			$_SESSION['tourguide_id'] = $row['tourguide_id'];
			$_SESSION['fullname'] = $row['fullname'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			echo "<img src='images/ok.png' class='success' />";
			 echo '<META HTTP-EQUIV="Refresh" Content="2; URL=tourguide_account/index.php">';    
			 exit;
		} else if($count==0) {
			$err = 'That is wrong username or password';
			echo "<div class='error-msg'>";
				echo $err;
			echo "</div>";
		}
	} 
	else if($type == 'user') {
		$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
		$run = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run);
		$count = mysqli_num_rows($run);
		if($count==1)
		{
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['fullname'] = $row['fullname'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			echo "<img src='images/ok.png' class='success' />";
			 echo '<META HTTP-EQUIV="Refresh" Content="1; URL=user_account/index.php">';    
			 exit;
		} else if($count==0) {
			$err = 'That is wrong username or password';
			echo "<div class='error-msg'>";
				echo $err;
			echo "</div>";
		}
	}
}
	?>           
            <form method="post">
                <table id="loginTable">
                    <caption>Login</caption>
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
                        <th>Username</th>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username" autofocus required>
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
                            <input type="submit" name="submit" value="Login" id="submit">
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> <p align="center">Don't Have Account? <a href="register.php">Register</a></p></td>
                    </tr>
                </table>
            </form>
        </div>
      </div>
    
      
  </body>
</html>