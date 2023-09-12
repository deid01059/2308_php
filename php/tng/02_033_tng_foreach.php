<?php

// 각각의 id만 출력해 주세요


$arr = [
	[
		"id" => "meerkat1"
		,"pw" => "php504"
	]
	,
	[
		"id" => "meerkat2"
		,"pw" => "php504"
	]
	,
	[
		"id" => "meerkat3"
		,"pw" => "php504"
	]
];

echo "ID List \n";
foreach ($arr as $item){
	echo $item["id"],"\n";
}












?>