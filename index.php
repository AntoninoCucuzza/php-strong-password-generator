<?php
$length = $_GET["length"];

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
    return $password;
}

$password = rngPassword($length);
var_dump($password);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-strong-password-generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container pt-5">
        <h1 class="text-center text-secondary">Strong Password Generator</h1>
        <h2 class="text-center">genera un password sicura</h2>

        <div class="banner p-3 my-3">
            la tua password e: <?= $password ?>
        </div>

        <div class="content ">

            <form action="" class="row p-3" method="GET">

                <div class="left col-6 d-flex flex-column">
                    <h4 class="mb-3">Lunghezza password:</h4>
                    <h4>Consenti ripetizioni di uno o piu caratteri:</h4>

                    <div class="mt-auto">
                        <button type="submit"> invia </button>
                        <button type="reset"> annulla </button>
                    </div>
                </div>

                <div class="right col-6">
                    <input type="number" name="length" class="form-control w-50" id="length" required> <!-- min="8" max="64"  -->

                    <div class="wrapper_radio d-flex flex-column my-3">
                        <div class=" form-check">
                            <input checked class="form-check-input" type="radio" id="si" name="doppioni" value="1">
                            <label for="si">Si</label>
                        </div>

                        <div>
                            <input class="form-check-input" type="radio" id="no" name="doppioni" value="0">
                            <label for="no">No</label>
                        </div>

                    </div>

                    <div class=" wrapper_box d-flex flex-column ">
                        <div class="form-check">
                            <input checked class="form-check-input" type="checkbox" id="lettere" name="lettere" value="characters">
                            <label for="lettere">Lettere</label>
                        </div>

                        <div class="form-check">
                            <input checked class="form-check-input" type="checkbox" id="numeri" name="numeri" value="numbers">
                            <label for="numeri">Numeri</label>
                        </div>

                        <div class="form-check">
                            <input checked class="form-check-input" type="checkbox" id="simboli" name="simboli" value="symbols">
                            <label for="simboli">Simboli</label>
                        </div>


                    </div>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>