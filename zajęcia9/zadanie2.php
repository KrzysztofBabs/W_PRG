<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Operacje na katalogach</title>
</head>
<body>
<form method="post" action="zadanie2.php">
    <label for="path">Ścieżka:</label>
    <input type="text" id="path" name="path" required>
    <br>
    <label for="directory">Nazwa katalogu:</label>
    <input type="text" id="directory" name="directory" required>
    <br>
    <label for="operation">Rodzaj operacji:</label>
    <select id="operation" name="operation">
        <option value="read">Odczyt</option>
        <option value="create">Stwórz</option>
        <option value="delete">Usuń</option>
    </select>
    <br>
    <input type="submit" value="Wyślij">
</form>
</body>
</html>


<?php

function manageDirectory($path, $directory, $operation = 'read') {
    if(substr($path, -1) !== '/'){
        $path .= '/';
    }
    $fullPath = $path . $directory;
    switch ($operation) {
        case 'create':
            if (!file_exists($fullPath)) {
                if (mkdir($fullPath, 0777, true)) {
                    return "Katalog '$directory' został stworzony w ścieżce '$path'.";
                } else {
                    return "Nie udało się stworzyć katalogu '$directory' w ścieżce '$path'.";
                }
            } else {
                return "Katalog '$directory' już istnieje w ścieżce '$path'.";
            }
        case 'delete':
            if (file_exists($fullPath)) {
                if (is_dir($fullPath) && count(scandir($fullPath)) == 2){
                    if (rmdir($fullPath)) {
                        return "Katalog '$directory' został usunięty z ścieżki '$path'.";
                    } else {
                        return "Nie udało się usunąć katalogu '$directory' z ścieżki '$path'.";
                    }
                } else {
                    return "Katalog '$directory' nie jest pusty lub nie jest katalogiem.";
                }
            } else {
                return "Katalog '$directory' nie istnieje w ścieżce '$path'.";
            }

        case 'read':
        default:
            if (file_exists($fullPath) && is_dir($fullPath)) {
                $items = scandir($fullPath);
                $items = array_diff($items, array('.', '..'));
                if (empty($items)) {
                    return "Katalog '$directory' w ścieżce '$path' jest pusty.";
                } else {
                    return "Zawartość katalogu '$directory' w ścieżce '$path': <br>" . implode('<br>', $items);
                }
            } else {
                return "Katalog '$directory' nie istnieje w ścieżce '$path'.";
            }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = $_POST['path'];
    $directory = $_POST['directory'];
    $operation = $_POST['operation'];

    $result = manageDirectory($path, $directory, $operation);
    echo $result;
}
?>

