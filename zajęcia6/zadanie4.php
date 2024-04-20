<!DOCTYPE html>
<html>
<body>



<?php

$a= "22222233333";

function Ssuma($a){
        $suma=0;
        for($i=0;$i<strlen($a);$i++){
            $suma=$suma+$a[$i];
        }
        return $suma;
    }
    
    $b=Ssuma($a);
$c=strval($b);
while($b>=10){
    echo $b,"<br>";
    $b=Ssuma($c);
    $c=strval($b);
}

echo $b;



?>


</body>
</html>
