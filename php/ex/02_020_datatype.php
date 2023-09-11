<?php

// int : 숫자
$num = 1;

// string : 문자열
$str = "sssss" ;

// array : 배열
$arr = [1, 2, 3];

// double : 실수
$double = 2.015;

// boolean : 논리(참/거짓)
$bool = false;

//  NULL
$obj = null;

// gettype() : 변수의 타입을 리턴
echo gettype($str);



$num1 = 1;
$str1 = '1';

echo $num1 + $str1;
// 자동으로 형변환 되어 수식이 적용됨


$num1 = 1;
$str1 = '1';


// 형변환 : 변수앞에 (데이터 타입)$num
echo gettype((int)$str1);


?>