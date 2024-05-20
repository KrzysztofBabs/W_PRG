<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="inputNumber">Wprowadź liczbę zmiennoprzecinkową:</label>
    <input type="text" id="inputNumber" name="inputNumber" required>
    <input type="submit" value="Wyślij">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputNumber = $_POST['inputNumber'];
    if (strpos($inputNumber, ',') !== false) {
        $czesci = explode(',', $inputNumber);
        if (isset($czesci[1])) {
            $ilosc = strlen($czesci[1]);
            echo "<p> Podana liczba to: $inputNumber </p>";
            echo "<p>Ilość cyfr po przecinku: $ilosc</p>";
        } else {
            echo "<p> Podana liczba to: $inputNumber </p>";
            echo "<p>Podana liczba nie zawiera części ułamkowej.</p>";
        }
    } else {
        echo "<p> Podana liczba to: $inputNumber </p>";
        echo "<p>Podana liczba nie zawiera przecinka.</p>";
    }
}
?>
</body>
</html>