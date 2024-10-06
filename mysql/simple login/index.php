<?php

session_start();

if (!isset($_SESSION["loggedInUser"])) {
    header("Location: login.php");
    die();
}

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'netland';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userId = $_SESSION["loggedInUser"];

    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE id = :id");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beveiligde Pagina</title>
    <style>
        * {
            background-color: grey;
            color: white;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
    <h2>Welkom op de homepage</h2>
    <p>Je bent succesvol ingelogd als <?php echo htmlspecialchars($user['username']); ?></p>
    <form method="post" action="logout.php">
        <input type="submit" value="Uitloggen">
    </form>
</body>

</html>

