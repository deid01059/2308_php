<?php


// 인덱스 배열

$arr = [1, 2, 3];


// 인덱스 배열 (멀티 타입 배열)

$arr1 = array(0, "a", 2, 3, 5); 
// 방법1

$arr2 = [0, "a", 2];
// 방법2


// 배열 값

var_dump($arr);

/* array(3) {       	(갯수)
	[0] =>				0번방
	int(1)				(값)
	[1] =>				1번방
	int(2)				(값)
	[2] =>				2번방
	int(3)				(값) 
} */



// 1번방만 가져오고싶을때 

var_dump($arr[1]);




// 연상 배열

$arr4 = [
	"name" => "홍길동"
	,"age" => 18
	,"gender" => "남자"	
];

	
// 다차원 배열

$arr5 = [
	[11,12,13]
	,[
		[211,212,213]
		,[221,222,223]
	]
	,[31,32,33]
];


// 223을 선택하고싶을때

var_dump($arr5[1][1][2]);
// 		큰틀에서 하나씩 줄여간다생각하면 편함



$arr6 = [
	"msg" => "ok"
	,"info" => [
		"name" => "홍길동"
		,"age" => 20
	]
];

//  age 값을 원할때

var_dump($arr6["info"]["age"]);




// unset() : 배열의 원소 삭제

$arr_week = ["sun", "mon", "delete", "tue", "wed"];
unset($arr_week[2]);
print_r($arr_week);




// 배열의 정렬 : asort(), arsort(), ksort(), krsort()


// 
$arr_asort = [
	"b"
	,"a"
	,"d"
	,"c"
];


// asort() : 배열의 값을 오름차순 정렬

asort($arr_asort);

print_r($arr_asort);



// arsort() : 배열의 값을 오름차순 정렬

arsort($arr_asort);

print_r($arr_asort);





// 
$arr_ksort = [
	"b" => "1"
	,"d" => "2"
	,"a" => "3"
	,"c" => "4"
];

// ksort() : 배열의 키를 오름차순 정렬

ksort($arr_ksort);

print_r($arr_ksort);


// krsort() : 배열의 키를 내림차순 정렬

krsort($arr_ksort);

print_r($arr_ksort);





// count() : 배열 혹은 그 외 것들의 사이즈를 반환하는 함수

echo count($arr_ksort);




// array_diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환

$arr_diff1 = [ 1, 2, 3];			//A
$arr_diff2 = [ 1, 4, 5];			//B
$arr_diff = array_diff($arr_diff1, $arr_diff2);
// 							A	,	B		
print_r($arr_diff);






// array_push() : 기존배열에 값을 추가하는 함수

// 값을 여러개 추가할때

$arr_push = [ 1, 2, 3 ];				
array_push($arr_push, 4, 5);

print_r($arr_push);



// 값을 한개만 추가할때

$arr_push1 = [ 1, 2, 3 ];				
$arr_push1[] = 4;

print_r($arr_push1);


// 연상배열 array_push

$arr_push2 =[
	"a" => 1
	,"b" => 2
];

$arr_push2["c"] = 3;

print_r($arr_push2);


?>