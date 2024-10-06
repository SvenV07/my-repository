<?php

session_start();

$words = ["mousepad", "cookie", "repeatedly", "firehazard", "crowbar", "clover", "scaffold", "doorpost", "sunglasses", "pencilsharpener", "tvstand"];

// Function to choose a random word from the list
function chooserandomword()
{
    global $words; // Access the global list of words
    return $words[array_rand($words)];
}

// Initialize game state if it's not already set or if the 'again' or 'reset' button was pressed
if (!isset($_SESSION['word']) || isset($_POST['again']) || isset($_POST['reset'])) {
    $_SESSION['word'] = "";
    $_SESSION['ChosenLetters'] = [];
    $_SESSION['chancesLeft'] = 10; // Set initial number of attempts
}

// Set the word if the form to choose a word was submitted
if (isset($_POST['submitword'])) {
    // use a random word from the list
    if ($_POST['submitword'] === "randomWord") { 
        // strtolower to avoid uppercase words chosen by the user not working
        $_SESSION['word'] = strtolower(chooserandomword());
    // Set the word the user made up
    } else {
        $_SESSION['word'] = strtolower($_POST['word']);
    }
}

// Process the clicked letter
if (isset($_POST['submitLetter'])) {
    $letter = strtolower($_POST['letter']);
    if (!in_array($letter, $_SESSION['ChosenLetters'])) {
        $_SESSION['ChosenLetters'][] = $letter; // Add the clicked letter to a list of all the letters that have been chosen before
        if (strpos($_SESSION['word'], $letter) === false) {
            $_SESSION['chancesLeft']--; // Decrement the number of attempts if the guess was incorrect
        }
    }
}

// Determine if the game has ended
$gameEnd = true;
foreach (str_split($_SESSION['word']) as $letter) {
    if (!in_array($letter, $_SESSION['ChosenLetters'])) {
        $gameEnd = false; // Game continues if there are still unguessed letters
        break;
    }
}
// Game ends if no guesses left
if ($_SESSION['chancesLeft'] === 0) {
    $gameEnd = true; // Game ends if no attempts are left
}

// Array of images for the hangman stages
$images = [
    "stage1.png",
    "stage2.png",
    "stage3.png",
    "stage4.png",
    "stage5.png",
    "stage6.png",
    "stage7.png",
    "stage8.png",
    "stage9.png",
    "stage10.png",
    "stage11.png"
];
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hangman</title>
    <style>
        .hangman img {
            max-width: 60vh;
            height: auto;
            border: 3px, black, solid;
        }
        body {
            background-color: rgb(195, 201, 212);
        }
    </style>
</head>

<body>

    <h1>hangman</h1>
    <!-- holds the word the player is trying to guess -->
    <?php if ($_SESSION['word'] === "") : ?>
        <!-- Form -->
        <form method="post">
            <!-- no other characters than letters in the form -->
            <input type="text" name="word" id="wordInput" pattern="[A-Za-z]+" placeholder="Voer een word in">
            <button type="submit" name="submitword" value="choose this word" onclick="document.getElementById('wordInput').required = true;">choose this word</button>
            <button type="submit" name="submitword" value="randomWord" onclick="document.getElementById('wordInput').required = false;">random word</button>
        </form>
    <?php else : ?>
        <?php
        // turn the underscores into the letters that are guessed right and unguessed still as underscores
        $rightGuesses = [];
        // split up the word in segments
        foreach (str_split($_SESSION['word']) as $letter) {
            if (in_array($letter, $_SESSION['ChosenLetters'])) {
                $rightGuesses[] = $letter;
            } else {
                $rightGuesses[] = "_";
            }
        }
        ?>

        <!-- display the underscores and letters -->
        <?php if (!empty($rightGuesses)) : ?>
            <p>
                word:
                <?php echo implode(" ", $rightGuesses); ?>
            </p>
        <?php endif; ?>

        <p>
            <!-- Display remaining attempts -->
            mistakes left: <?php echo $_SESSION['chancesLeft'];  ?>
        </p>

        <div class="hangman">
            <?php
            // calculate what image to use
            $afbeeldingIndex = 10 - $_SESSION['chancesLeft'];
            $afbeelding = $images[$afbeeldingIndex];
            ?>
            <img src="<?php echo $afbeelding; ?>" alt="hangman">
        </div>

        <?php if ($gameEnd) : ?>
            <!-- Display game over message -->
            <p>
                <?php if ($_SESSION['chancesLeft'] === 0) : ?>
                    you're out of guesses, the right word was: <?php echo ($_SESSION['word']); ?>
                <?php else : ?>
                    you did it!, you guessed the right word: <?php echo ($_SESSION['word']); ?>
                <?php endif; ?>
                <br>
                <form method="post">
                    <button type="submit" name="again">play again</button>
                    <button type="submit" name="reset">Reset Game</button>
                </form>
            </p>
        <?php else : ?>
            <!-- Form to submit a letter -->
            <form method="post">
                <div>
                    <?php
                    // Display buttons for each letter in the alphabet
                    foreach (range('a', 'z') as $letter) {
                        if (in_array($letter, $_SESSION['ChosenLetters'])) {
                            echo "<button type='submit' name='letter' value='$letter' disabled>$letter</button> ";
                        } else {
                            echo "<button type='submit' name='letter' value='$letter'>$letter</button> ";
                        }
                    }
                    ?>
                </div>
                <input type="hidden" name="submitLetter" value="1">
            </form>
            <form method="post">
                <button type="submit" name="reset">Reset Game</button>
            </form>
        <?php endif; ?>

    <?php endif; ?>
</body>

</html>
