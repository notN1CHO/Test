<?php
session_start();
include 'function.php';

$number = generateNumber();
$message = "";

if (isset($_POST['guess'])) {
    $guess = (int)$_POST['guess'];
    incrementCounter();
    $message = checkGuess($guess, $number);

    if ($guess == $number) {
        unset($_SESSION['number']);
        unset($_SESSION['attempts']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guess the Number</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="number"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #74ebd5;
            border-radius: 5px;
            margin-bottom: 15px;
            width: 200px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background: #74ebd5;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #4bc0c8;
        }

        p {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Guess the Number Game</h1>
    <form method="POST" action="">
        <input type="number" name="guess" placeholder="Enter a number" required>
        <button type="submit">Guess</button>
        <?php if($message != ""): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
