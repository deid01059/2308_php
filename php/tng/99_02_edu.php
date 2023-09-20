<?php


// 함수 선언 : 함수를 만들어 두는 것
// function my_sum($num1, $num2) {
//     $sum = $num1 + $num2 ;
//     return $sum;
// }


// // 함수 호출 : 미리 만들어둔 함수를 부르는 것

// $result = my_sum(2, 5);
// print_r($result);



// function my_min($a,$b,$c) {
//     $sum = $a - $b - $c;
//     return $sum;
// }

// $num1 = 15; 
// $num2 = 10;
// $num3 = 3;


// $resert = my_min($num1,$num2,$num3);

// echo $resert


// 가변파라미터

// function my_all_sum(...$numbers){
//         $sum = 0;
//     foreach($numbers as $item){
//         $sum = $sum + $item;
//     }
//     return $sum;
// }
// $sum_1 = my_all_sum(2,4,56);
// echo $sum_1;



// 레퍼런스 파라미터
// function my_ref ($val, &$ref){  //function my_ref (파라미터)
//     $val = "myref";
//     $ref = "myref";
// }

// $str1 = "str1";
// $str2 = "str2";

// my_ref($str1, $str2); // my_ref(아규먼트)

// echo "str1 : {$str1}\n";
// echo "str2 : {$str2}\n";




print_r(true);
echo "\n";
var_dump(true);

?>