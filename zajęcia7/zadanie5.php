<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        button[type="submit"]{
            margin-top: 10px;
            margin-left: 50px;
            width: 200px;
            height: 30px;
        }
        input[type="number"]{
            height: 20px;
        }
        input[type="text"]{
            height: 20px;
        }

        body {
            background-color:rgb(173,216,230);
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .calculator {
            /*background-color: #fff;*/
            background: linear-gradient(to bottom, #ff758c, #ff7eb3);
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;

    </style>
</head>
<body>
<div class="calculator">
<h1>Kalkulator</h1>
<hr>
<h2>Prosty</h2>
<form name="formularz1" method="POST">
    <input type="number" name="pierwsza">
    <select name="operacja11">
        <option value=1 selected>Dodawanie</option>
        <option value=2>Odejmowanie</option>
        <option value=3>Mnożenie</option>
        <option value=4>Dzielenie</option>
    </select>
    <input type="number" name="druga">
    <br>
    <button type="submit">Oblicz</button>
</form>
<hr>
<h2>Zaawansowany</h2>
<form name="formularz2" method="POST">
    <input type="text" name="trzecia">
    <select name="operacja2">
        <option value=1 selected>Cosinus</option>
        <option value=2>Sinus</option>
        <option value=3>Tangens</option>
        <option value=4>Binarne na dziesiętne</option>
        <option value=5>Dziesiętne na binarne</option>
        <option value=6>Dziesiętne na szesnastkowe</option>
        <option value=7>Szesnastkowe na dziesiętne</option>
    </select>
    <br>
    <button type="submit">Oblicz</button>
</form>
</div>

<br>
<?php

if(isset($_POST['pierwsza'])){
    $a=$_POST['pierwsza'];
    $b=$_POST['druga'];
    $c=$_POST['operacja11'];

if($c == 4 && $b == 0) {
    echo "Nie można dzielić przez zero!";
    return;
} else {
    switch ($c) {
        case '1':
            $wynik = $a + $b;
            break;
        case '2':
            $wynik = $a - $b;
            break;
        case '3':
            $wynik = $a * $b;
            break;
        case '4':
            $wynik = $a / $b;
            break;
    }
}
    echo"<p>Wynik działania: $wynik</p>";
}

if(isset($_POST['trzecia'])){
    $d = $_POST['trzecia'];
    $x = $_POST['operacja2'];
    switch ($x) {
        case '1':
            $wynik = cos($d);
            break;
        case '2':
            $wynik = sin($d);
            break;
        case '3':
            $wynik = tan($d);
            break;
        case '4':
            $wynik = bindec($d);
            break;
        case '5':
            $wynik = decbin($d);
            break;
        case '6':
            $wynik = dechex($d);
            break;
        case '7':
            $wynik = hexdec($d);
            break;
    }
    echo"<p>Wynik operacji: $wynik</p>";
}


?>
</body>
</html>