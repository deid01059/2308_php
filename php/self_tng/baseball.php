<?php

$base_no_1 = rand(1,9);
$base_no_2 = rand(1,9);
$base_no_3 = rand(1,9);


while(true){
    $str = 0;
    $user_no = trim(fgets(STDIN));
    $com = [$base_no_1,$base_no_2,$base_no_3];
    if($str <= 2){    
        if($com[0] == $user_no[0]){
            $str + 1;
        }
        else if($com[1] == $user_no[1]){
            $str + 1;
        }
        else if($com[2] == $user_no[2]){
            $str + 1;
        }
        
    }
    if($str == 3){
        echo "$str 스트라이크!!! 아웃 you win";
        break;
    }    
    echo "$str 스트라이크 $ball 볼";










}




print_r($com);


















?>