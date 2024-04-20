<!DOCTYPE html>
<html>
<body>



<?php

$a="The quick brown fox jumps over the lazy dog.";
$a=strtoupper(str_replace(" ","",$a));

    for($i=0;$i<26;$i++){
        $alfabet[$i]=0;
    }

for($i=0;$i<strlen($a);$i++){
    $b=ord($a[$i])-65;
    $alfabet[$b]=1;
}

for($i=0; $i<26; $i++){
    if($alfabet[$i] == 0){
        echo "nie jest";
        return;
    }
}
echo "jest";


?>


</body>
</html>