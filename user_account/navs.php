<?php $user_id = $_SESSION['user_id']; ?><div class="nav">
    <ul >
      <li><a href="index.php">Welcome <?php echo $_SESSION['fullname'] ?>. </a></li>
      <li><a href="mypostinfos.php">View All Tour guides</a></li>
      <li><a href="search.php">Search </a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
</div>