<?php
session_start();

if (isset($_SESSION["loggedInUser"])) {
    header("Location: index.php");
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

        $stmt = $conn->prepare("SELECT id FROM gebruikers WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["loggedInUser"] = $result["id"];
            header("Location: index.php");
            exit();
        } else {
            $error = "Ongeldige gebruikersnaam of wachtwoord combinatie.";
        }
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
    <title>Netland Admin Panel</title>
    <style>
        .error {
            color: red;
        }
    </style>

</head>

<body>
    <header>
        <a href="edit.php">settings</a>
        <a href="insert.php">create account</a>
    </header>
    <h2>Netland Admin Panel</h2>
    <?php if (isset($error)) {
        echo "<p>$error</p>";
    } ?>
    <form method="post" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required><br>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>
