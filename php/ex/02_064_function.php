<?php

// 두 숫자를 받아서 더해주는 함수를 만들어 봅시다
// 리턴이 없는 함수
function my_sum($a, $b) {
	echo $a + $b;
}
// 함수호출
my_sum(5, 4);


// 리턴이 있는 함수
function my_sum2($a, $b){
	return $a + $b;
}

echo my_sum2(1,2);



// 두수를 받아서 - * / %를 리턴하는 함수를 만들어 주세요

function my_mns($a, $b){
	return $a - $b;
}

echo my_mns(4,2);




function my_mtp($a, $b){
	return $a * $b;
}

echo my_mtp(4,2);




function my_dvs($a, $b){
	return $a / $b;
}

echo my_dvs(8,2);




function my_rmd($a, $b){
	return $a % $b;
}

echo my_rmd(5,2);




// 파라미터의 기본값이 설정되어있는 함수

function my_sum3($a, $b = 5, $c =2) {
	return $a + $b;
}

echo my_sum3(3,2,6);
// 입력하면 기본값이 적용안됨

echo my_sum3(3);
// 입력안하면 기본값으로 적용

echo my_sum3(3,2);
// 일부기본값도 가능




// 가변 파라미터

// php 5.6이상에서 가능

function my_args_param(...$items){
	echo $items[1];
}

my_args_param("a","b","c");




// php-5.5 이하에서 사용방법 

function my_args_param1() {
	$items = func_get_args();
	print_r($items);
}

my_args_param1("a", "b", "c");




// 재귀함수

function my_recursion($i) {
	if($i === 1){
		return 1;
	}
	return $i + my_recursion($i -1);
}
echo my_recursion(10);













?>