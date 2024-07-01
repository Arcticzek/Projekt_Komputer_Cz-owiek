<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$gameName = "";

if (isset($_GET['gameName'])) {
    $gameName = $_GET['gameName'];
    // Używamy prepare statements dla bezpieczeństwa
    $stmt = $conn->prepare("SELECT * FROM users WHERE gameName LIKE ?");
    $likeParam = "%" . $gameName . "%";
    $stmt->bind_param("s", $likeParam);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search Results</title>
</head>
<body>
    <div style="text-align:center; padding:15%;">
        <h1>Search Results</h1>
        <?php
        if (isset($result) && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div>";
                echo "<p><strong>".$row['firstName']." ".$row['lastName']."</strong></p>";
                echo "<p>Game Name: ".$row['gameName']."</p>";
                echo "<p>Game Tag: ".$row['yourTag']."</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found.</p>";
        }
        ?>
        <a href="homepage.php" class="btn-back">Back to Homepage</a>
    </div>
</body>
</html>
