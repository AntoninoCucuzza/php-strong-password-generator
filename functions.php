<?php
session_start();

function rngPassword($length)
{

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $numbers = '0123456789';

    $symbols = '!@#$%^&*()_+-=[]{}|;:,.<>?`~';

    $allowed_char = '';

    if (isset($_GET["lettere"])) {
        $allowed_char .= $characters;
    }

    if (isset($_GET["numeri"])) {
        $allowed_char .= $numbers;
    }

    if (isset($_GET["simboli"])) {
        $allowed_char .= $symbols;
    }

    $password = '';

    while (strlen($password) < $length) {
        $random_char = $allowed_char[rand(0, strlen($allowed_char))];
        $password .= $random_char;
    }


    header('Location: ./redirect.php');

    return $_SESSION['password'] = $password;
}
