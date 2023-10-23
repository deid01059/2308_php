<?php

// $arr = [
//     "a","b","c","d","e"
// ];

// for문
// for($i=0; $i<count($arr); $i++){
//     for($i2=0; $i2<=$i; $i2++){
//         echo $arr[$i2];
//     }
//     echo "\n";
// }


// while문
// $i=0;
// $i2=count($arr)-1;
// while(true){
//     $arr_no=0;
//     $i++;
//     while(true){
//         echo $arr[$arr_no];
//         $arr_no++;
//         if($i <= $arr_no){
//             break;
//         }
//     }
//     echo "\n";
//     if($i > $i2){
//         break;
//     }
// }
// while(true){
//     $arr_no=0;
//     $i2--;
//     while(true){
//         echo $arr[$arr_no];
//         $arr_no++;
//         if($i2 < $arr_no){
//             break;
//         }
//     }
//     echo "\n";
//     if($i2 === 0){
//         break;
//     }
// }

// 19.txt 폴더로 넣는법
// $file = fopen("19.txt", "a");

//     $f_num = 0;
//     while(true){
//         $s_num = 0;
//         $f_num++;
//         while (true){
//             $s_num++;
//             $sum = $f_num * $s_num;
//             fputs($file,$f_num."X".$s_num."=".$sum."\n");
//             if($s_num >= 19){
//                 break;
//             }    
//         }
//         if($f_num >= 19){
//             break;
//         }    
//     }

// ?>