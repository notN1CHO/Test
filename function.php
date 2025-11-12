<?php
session_start();


function generateNumber() {
    if (!isset($_SESSION['number'])) {
        $_SESSION['number'] = rand(1, 100);
        $_SESSION['attempts'] = 0;
    }
    return $_SESSION['number'];
}


function incrementCounter() {
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 0;
    }
    $_SESSION['attempts']++;
    return $_SESSION['attempts'];
}


function checkGuess($guess, $number) {
    if ($guess < $number) {
        return "Too low!";
    } elseif ($guess > $number) {
        return "Too high!";
    } else {
        return "Number is". $_SESSION['number']." Correct! You guessed in " . $_SESSION['attempts'] . " attempts.";
    }
}
?>
