<?php
session_start();

// دالة باش نولد رقم بين 1 و 100
function generateNumber() {
    if (!isset($_SESSION['number'])) {
        $_SESSION['number'] = rand(1, 100);
        $_SESSION['attempts'] = 0;
    }
    return $_SESSION['number'];
}

// دالة باش نحسب المحاولات
function incrementCounter() {
    if (!isset($_SESSION['attempts'])) {
        $_SESSION['attempts'] = 0;
    }
    $_SESSION['attempts']++;
    return $_SESSION['attempts'];
}

// دالة باش نتحقق من التخمين
function checkGuess($guess, $number) {
    if ($guess < $number) {
        return "Too low!";
    } elseif ($guess > $number) {
        return "Too high!";
    } else {
        return "Correct! You guessed in " . $_SESSION['attempts'] . " attempts.";
    }
}
?>
