<?php

session_start();

if (!isset($_SESSION['loggedInUser'])) {
    header('Location: login.php');
    die();
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'netland';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $userId = $_SESSION["loggedInUser"];

        $stmt = $conn->prepare("UPDATE gebruikers SET username = :username, password = :password WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        echo "<p>Gebruiker bewerkt!</p>";
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
<header>
        <a href="index.php">home</a>
    </header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        * {
            background-color: grey;
            color: white;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Bewerk Gebruiker">
    </form>
</body>
</html>
