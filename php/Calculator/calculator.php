<!DOCTYPE html>
<html>

<head>
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 10px;
            max-width: 300px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        button {
            flex-grow: 1;
            margin: 2 5px;
            padding: 10px;
            border-width: 10px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            opacity: 0.8;
        }

        .add { background-color: green;
        }
        .subtract { background-color: red;
        }
        .multiply { background-color: blue;
        }
        .divide { background-color: orange;
        }
        .modulo { background-color: purple;
        }

    </style>
</head>

<body>
    <div class="calculator">
        <h1>Rekenmachine</h1>
        <form method="post" action="">
            <div class="form">
                Getal 1: <input type="text" name="getal1" value="<?= isset($_POST['getal1']) ? htmlspecialchars($_POST['getal1']) : '' ?>">
            </div>
            <div class="form">
                Getal 2: <input type="text" name="getal2" value="<?= isset($_POST['getal2']) ? htmlspecialchars($_POST['getal2']) : '' ?>">
            </div>

            <div class="buttons">
                <button type="submit" name="operator" value="+" class="add">Add</button>
                <button type="submit" name="operator" value="-" class="subtract">Subtract</button>
                <button type="submit" name="operator" value="*" class="multiply">Multiply</button>
                <button type="submit" name="operator" value="/" class="divide">Divide</button>
                <button type="submit" name="operator" value="%" class="modulo">Modulo</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $getal1 = $_POST['getal1'];
            $getal2 = $_POST['getal2'];
            $operator = $_POST['operator'];

            if (!is_numeric($getal1) || !is_numeric($getal2)) {
                echo "Beide ingevoerde waarden moeten getallen zijn.<br>";
            } else {
                switch ($operator) {
                    case '+':
                        $resultaat = $getal1 + $getal2;
                        break;
                    case '-':
                        $resultaat = $getal1 - $getal2;
                        break;
                    case '*':
                        $resultaat = $getal1 * $getal2;
                        break;
                    case '/':
                        if ($getal2 == 0) {
                            echo "Bij delen mag het tweede getal niet 0 zijn.<br>";
                        } else {
                            $resultaat = $getal1 / $getal2;
                        }
                        break;
                    case '%':
                        if ($getal2 == 0) {
                            echo "Bij de modulo operatie mag het tweede getal niet 0 zijn.<br>";
                        } else {
                            $resultaat = fmod($getal1, $getal2);
                        }
                        break;
                    default:
                        echo "Ongeldige operator, Gebruik +, -, *, / of %.";
                }

                if (isset($resultaat)) {
                    echo "<div class='form-group'>Resultaat: $resultaat</div>";
                }
            }
        }
        ?>
    </div>
</body>

</html>
