<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
      <p style="font-size:50px; font-weight:bold;">
       Hello  <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
       :)
      </p>
      <a href="logout.php" class="btn-logout">Logout</a>
      <br><br>
      <a href="swagger-ui.php">API Documentation (Swagger)</a>
      <br><br>
      <a href="profile.php">Your Profile</a>
      <br><br>
      <form method="get" action="search.php" style="text-align: center;">
    <input type="text" name="gameName" placeholder="Enter Game Name" required>
    <input type="submit" value="Search">
</form>
    </div>
</body>
</html>
