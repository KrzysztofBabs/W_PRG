<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="inputString">Wprowadź dowolny ciąg znaków:</label>
    <input type="text" id="inputString" name="inputString" required>
    <br><br>
    <label for="action">Wybierz akcję:</label>
    <select id="action" name="action" required>
        <option value="switch">Odwroc ciag znaków</option>
        <option value="upper">Zmiana na wielkie litery</option>
        <option value="lower">Zmiana na małe litery</option>
        <option value="count">Ilosc znakow</option>
        <option value="trim">Usun biale znaki z poczatku i konca ciagu</option>
    </select>
    <br><br>
    <input type="submit" value="Wykonaj">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $action = $_POST['action'];

    function reverseString($string) {
        return strrev($string);
    }
    function convertToUpper($string) {
        return strtoupper($string);
    }
    function convertToLower($string) {
        return strtolower($string);
    }
    function countCharacters($string) {
        return strlen($string);
    }
    function trimString($string) {
        return trim($string);
    }
    switch ($action) {
        case "switch":
            $result = reverseString($inputString);
            break;
        case 'upper':
            $result = convertToUpper($inputString);
            break;
        case 'lower':
            $result = convertToLower($inputString);
            break;
        case 'count':
            $result = countCharacters($inputString);
            break;
        case 'trim':
            $result = trimString($inputString);
            break;
        default:
            $result = $inputString;
            break;
    }
    echo "<p>Oryginalny ciąg: " . htmlspecialchars($inputString) . "</p>";
    echo "<p>Wynik operacji: " . htmlspecialchars($result) . "</p>";

}
?>

</body>
</html>
