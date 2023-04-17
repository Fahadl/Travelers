<?php session_start();
include "../connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['fullname'] ?> Tourist</title>
    <link href="../css/bootstrap2.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
      <div class="container">
        <div class="row">
            <?php include "navs.php"; ?>
                <table id="mainTable" border="1" align="left" style="max-width:250px;background-color:#EEE; border:1px solid #A1A1A1">
                    
                    <tr>
                        <th colspan="2">Welcome Tourist </th>
                        
                    </tr>
                    <tr>
                        <th>Fullname</th>
                        <td>
                           <?php echo $_SESSION['fullname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                           <?php echo $_SESSION['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>
                           <?php echo $_SESSION['username']; ?>
                        </td>
                    </tr>
                    
                </table>
        </div>
      </div>
  </body>
</html>