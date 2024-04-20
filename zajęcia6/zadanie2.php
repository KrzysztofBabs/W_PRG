<!DOCTYPE html>
<html>
<body>



<?php

$sumaA;

function x($a, $r, $n){
    $sumaA = ((2*$a + (($n-1)*$r))*$n)/2;
    return  $sumaA;
}

echo "suma ciagu arytmetycznego to: ". x(2,3,4);

$sumaG=0;
$wyraz;
$a1=1;
$q=2;
$N=4;

for($i=0;$i<$N;$i++){
    $wyraz=$a1;
    $sumaG=$sumaG+$wyraz;
    $a1=$wyraz*$q;
    
 
}
echo "<br>";
echo "suma wyrazow ciagu geometrycznego to: ";
echo $sumaG;




?>


</body>
</html>