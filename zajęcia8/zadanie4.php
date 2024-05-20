
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label for="inputString">Wprowadź ciąg znakow:</label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="Wyślij">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputString = $_POST['inputString'];
    $samogloski = 'aeiouAEIOU';
    $licznik = 0;
    for($i = 0;$i<strlen($inputString);$i++){
        if(strpos($samogloski, $inputString[$i]) !== false) {
            $licznik++;
        }
    }
    echo "<p> ciag: $inputString </p>";
    echo "<p>Ilość samogłosek w ciągu: $licznik</p>";
}

?>

</body>
</html>

