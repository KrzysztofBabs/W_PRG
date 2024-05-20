<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="inputString">Wprowadź ciąg liczb:</label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="Wyślij">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    function filtrujCiag($ciag) {
        $oczyszczonyCiag = preg_replace('/[\\\\\/:*?"<>|+\-.]/', '', $ciag);
        return $oczyszczonyCiag;
    }
    $oczyszczonyCiag = filtrujCiag($inputString);

    echo "<p>Oryginalny ciąg: " . htmlspecialchars($inputString) . "</p>";
    echo "<p>Oczyszczony ciąg: " . htmlspecialchars($oczyszczonyCiag) . "</p>";
}

?>

</body>
</html>
