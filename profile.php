<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$userId = null;

// Sprawdzenie, czy `id` jest przekazane w URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
} else {
    // Jeśli `id` nie jest przekazane, ustaw `userId` na ID zalogowanego użytkownika
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
    if ($row = mysqli_fetch_assoc($query)) {
        $userId = $row['id'];
    }
}

// Pobranie danych użytkownika z bazy danych
if ($userId) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$userId'");
    $user = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Profile</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <h1>User Profile</h1>
        <?php
        if (isset($user)) {
            echo "<p>Name: ".$user['firstName']." ".$user['lastName']."</p>";
            echo "<p>Email: ".$user['email']."</p>";
            echo "<p>Game Name: ".$user['gameName']."</p>";
            echo "<p>Your Tag: ".$user['yourTag']."</p>";
        } else {
            echo "<p>User not found.</p>";
        }
        ?>
        <a href="homepage.php" class="btn-back">Back to Homepage</a>
    </div>
</body>
</html>
