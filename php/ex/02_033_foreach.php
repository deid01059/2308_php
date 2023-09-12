<?php

// foreach : 배열의 길이만큼 루프하는 문법


// 기존 for로 구할때
$arr = [1,2,3];

for($i =0; $i <= count($arr)-1; $i++){
	echo $arr[$i],"\n";
}
	

// foreach 문
$arr1 = [
	"현희" => "불고기"
	,"호철" => "김치"
	,"희야" => "못정함"
];

foreach ($arr1 as $key => $val){
	echo "{$key} : {$val}\n";
}


// 키값이 필요없을때

foreach ($arr1 as  $val){
	echo "{$val}\n";
}


























?>