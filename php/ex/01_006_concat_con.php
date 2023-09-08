<?php 

$str1 = "안녕";
$str2 = "하세요";

$str3 = $str1.$str2;
// 	. 을통해 연결시킨다

echo $str3,"\n";

$str4 = "문자";
$num1 = 1;

$str5 = $str4.$num1;
// 	문자와 숫자도 가능

echo $str5,"\n";



// 상수 : 절대 변하지 않는 값


define("NUM",100);
// ** 상수는 반드시 대문자로 작성할걸

define("STR","스트링타입");
// 	글자도가능

define("STR1","스트링타입"." ".NUM);
// 연결도 가능

echo NUM,"\n",STR,"\n",STR1;


?>