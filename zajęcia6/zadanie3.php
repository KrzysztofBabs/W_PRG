<!DOCTYPE html>
<html>
<body>

<?php

$macierz1 = array();
for($i=2;$i<5;$i++){
    for($j=2;$j<5;$j++){
        $macierz1[$i][$j]=$i;
        echo $macierz1[$i][$j],", ";
        
    }
    echo "<br>";
}
echo "<br>";
    

$macierz2 = array();
for($i=2;$i<5;$i++){
    for($j=2;$j<5;$j++){
        $macierz2[$i][$j]=$j;
        echo $macierz2[$i][$j],", ";
        
    }
    echo "<br>";
}
echo "<br>";

for($i=2;$i<5;$i++){
    for($j=2;$j<5;$j++){
        $macierz1[$i][$j] = $macierz1[$i][$j] * $macierz2[$i][$j];
        echo $macierz1[$i][$j], ", ";


    }
    echo "<br>";

}

?>


</body>
</html>
