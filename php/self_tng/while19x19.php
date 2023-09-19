<?php

$i=1;
while(true){
    echo "$i 단\n";
    $a = 1;
    while(true){
        $sum = $i * $a;
        echo "$i x $a = $sum\n";
        $a++;
        if($a == 20){
            break;
        }
    }
    $i++;
    if($i == 20){
        break;
    }
}





























?>