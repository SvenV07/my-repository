<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum registratie</title>
</head>

<body>
    <h1>Forum registratie</h1>
    <form action="bevestigingspagina.php" method="post">
        <label for="naam">Naam:</label>
        <input type="text" placeholder="Naam" name="naam">

        <label for="email">Email:</label>
        <input type="email" placeholder="Email" name="email">

        <label for="leeftijd">Leeftijd:</label>
        <input type="number" placeholder="Leeftijd" name="leeftijd">

        <input type="submit" value="Verzenden">
    </form>
</body>

</html>