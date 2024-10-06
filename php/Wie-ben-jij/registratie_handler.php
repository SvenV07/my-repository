<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevestigingspagina</title>
</head>

<body>
    <h1>Bedankt voor je registratie!</h1>
    <p>Je ingevulde informatie:</p>

    <p><strong>Naam:</strong> <?php echo htmlspecialchars($_POST['naam']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_POST['email']); ?></p>
    <p><strong>Leeftijd:</strong> <?php echo htmlspecialchars($_POST['leeftijd']); ?></p>
</body>

</html>