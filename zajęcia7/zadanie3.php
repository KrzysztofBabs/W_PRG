<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$a=1;
$b=7;
$c=12;
$d=18;

$tablica=array();
for($i=$a;$i<=$b;$i++){
    $tablica[$i]=$c;
    $c++;

}
print_r ($tablica);

//echo "<br>";
//$ciagLiczb = implode(", ", $tablica);
//echo $ciagLiczb;


?>
</body>
</html>