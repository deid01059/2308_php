<?php

// 버블 정렬

// $arr = [5, 43, 51, 7, 16, 2, 9, 34];




// print_r($arr);


$arr = [6,2,4,5,1,11,23];
$num = count($arr);
$i = 1;
while (true) {
    if($num == 1){
        break;
    }
    $roof_no = 0;
        while (true) {        
            if ($arr[$roof_no] > $arr[$roof_no + 1]){
                $tmp = $arr[$roof_no];
                $arr[$roof_no] = $arr[$roof_no + 1];
                $arr[$roof_no + 1]= $tmp;
            }
            if ($roof_no === $num - 2) {
                break;
            }
            $roof_no++;
        }
    $i++;
    if ($i === $num) {
        break;
    }
}
print_r ($arr);













?>