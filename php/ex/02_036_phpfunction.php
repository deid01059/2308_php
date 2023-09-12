<?php

// trim() : 문자열의 공백을 없애주는 함수
echo trim(" sdsd ");
// rtrim , ltrim 으로 오른쪽 왼쪽 변환가능




// strtoupper : 대문자로 변환

echo strtoupper("addda");

// strtolower : 소문자로 변환

echo strtolower("AADDVV");




// strlen() : 문자열의 길이를 반환

echo strlen("aaa");




// ** 한글은 1개당 3byte라 mb_strlen() 으로 써야함 **

echo mb_strlen("가나다");
// 왠만하면 mb_strlen()을 쓰자




// str_replace() : 특정문자를 치환해주는 함수

echo str_replace("key: ", "", "key: 423fsajkfasfa");




// substr() : 문자열을 자르는 함수

echo substr("abcdefg", 2, 4);
//               2번방부터 4개까지




// mb_substr() : 멀티바이트 문자열을 자르는 함수

echo mb_substr("가나다라마바사", 2, 4);




// strpos() : 문자열에서 특정문자의 위치를 반환하는 함수

echo strpos("abcdefg" , "d"); 




// isset() : 변수의 존재를 확인하는 함수

$str = "";
var_dump( isset($str) );




// empty() : 변수의 값이 비어있는지 확인하는 함수

$str1 = null;
var_dump( empty($str1) );




// time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수

echo time();




// date() : 원하는 형식으로 시간을 표시해주는 함수

echo date("Y-m-d-H:i:s");



 

?>