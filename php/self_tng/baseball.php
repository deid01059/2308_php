<?php

$base_no_1 = rand(1,9);
$base_no_2 = rand(1,9);
$base_no_3 = rand(1,9);


while(true){
    $str = " %u 스트라이크";
    $bal = " %u 볼";

    $user_no = trim(fgets(STDIN));
    $com = [$base_no_1,$base_no_2,$base_no_3];
        if($com[0] == $user_no[0]){
            $str + 1;
        }
        if($com[1] == $user_no[1]){
            $str + 1;
        }
        if($com[1] == $user_no[1]){
            $str + 1;
        }
        else if($com[0] == $user_no[0]){
            $str + 1;
        }











}




print_r($com);


















?>