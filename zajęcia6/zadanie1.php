<!DOCTYPE html>
<html>
<body>



<?php

$poczatek = 3; 
$koniec = 31;

function czy_pierwsza($liczba){
    if($liczba==1){
        return false;
    }
    if($liczba==2)
    return true;
    
    for($i=2;$i<$liczba;$i++){
        if($liczba%$i==0){
            return false;
        }
    }
    return true;
}

    for($i=$poczatek; $i <= $koniec; $i++){
        if(czy_pierwsza($i)) {
            echo $i . ", ";
        }
    }

?>


</body>
</html>
