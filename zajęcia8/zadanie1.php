<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="String">Wprowadź ciąg znaków:</label>
    <input type="text" id="String" name="String" required>
    <input type="submit" value="Wyślij">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $String = $_POST['String'];

    $uppercaseString = strtoupper($String);
    echo "<p>Ciąg dużymi literami: $uppercaseString</p>";

    $lowercaseString = strtolower($String);
    echo "<p>Ciąg małymi literami: $lowercaseString</p>";

    $ucfirstString = ucfirst($lowercaseString);
    echo "<p>Pierwsza litera ciągu dużą literą: $ucfirstString</p>";

    $ucwordsString = ucwords($lowercaseString);
    echo "<p>Wszystkie pierwsze litery każdego ze słów dużą literą: $ucwordsString</p>";
}

?>

</body>
</html>
