<?php
$file = 'linki.txt';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!empty($lines)) {
        echo "<ul>";
        foreach ($lines as $line) {
            list($url, $description) = explode(';', $line, 2);

            echo "<li><a href=\"$url\">$description</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Plik z linkami jest pusty.</p>";
    }
} else {
    echo "<p>Plik z linkami nie istnieje.</p>";
}
?>
