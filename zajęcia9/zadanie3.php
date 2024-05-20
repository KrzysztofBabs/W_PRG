<?php

$file = 'licznik.txt';
if (!file_exists($file)) {
    file_put_contents($file, "1");
    $visitCount = 1;
} else {
    $visitCount = (int)file_get_contents($file);
    $visitCount++;
    file_put_contents($file, $visitCount);
}


echo "<p>Liczba odwiedzin: $visitCount</p>";
?>

