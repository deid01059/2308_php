<?php

// 총합구해주는거

// function my_allsum(...$num){
// 	$sum=0;
// 	foreach ($num as $num_1) {
// 		$sum += $num_1;
// 	}
// 	return $sum;
// }

// echo my_allsum(1,25,3,214,1,6);




// 입력한 수 를 기준으로 가우스수열합을 보여줌
// function my_allsum($num){
// 	$sum = 0;
// 		for($i=$num; $i >= 1; $i--) {
// 			$sum += $i;	
// 		}
// 	return $sum;
// }
// echo my_allsum(4);



// 숫자로 이루어진 문자열을 하나 받습니다
// 이 문자열의 모든숫자를 더해주세요
// 예) "3421"일결우, 3+4+2+1 = 10 이 리턴되는 함수

// 방법 1

// $str = "34215";
// function my_allsum(string $str){
// 	$len = mb_strlen($str);
// 	$sum = 0;
// 	for ($idx = 0; $idx <= $len -1; $idx++) {
// 		$sum += (int)mb_substr($str, $idx, 1);
// 	}
// 	return $sum;
// }
		

// 방법 2
// $str = "34285";
// function my_allsum(string $str){
// 	$sum = 0;
// 	$arr = str_split($str);
// 	return array_sum($arr);
// }
// echo my_allsum($str)




?>