<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$tablica = array(1,2,3,4,5,6,7,8,9,10,11,12,13,19,20);
$n=5;
if($n<0 || $n>= count($tablica)){
    echo "BŁĄD";
    return;
}
for($i=0;$i<count($tablica);$i++){
    if($i == $n){
        $b=$tablica[$i];
        $tablica[$i] = "$";
    }
    elseif($i > $n){
        $c=$tablica[$i];
        $tablica[$i]=$b;
        $b=$c;
    }
    echo $tablica[$i],"<br>";

}
echo $b;


?>
</body>
</html>
