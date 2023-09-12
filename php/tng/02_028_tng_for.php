<?php
// 반복문을 이용해서 구구단 2단을 출력해주세요.

for($num = 1; $num <=9; $num ++) {
	$two_no = $num * 2;
	echo "2 X {$num} = {$two_no}" ,"\n";
}


// 반복물을 이용하여 1단에서 9단까지
for($i = 1; $i <=9; $i++ ){
	echo "{$i}단 \n";
	for($num = 1; $num <=9; $num ++) {
		echo "$i X $num = ", $num*$i,"\n";	
	}
}


// 1단 9단만 출력되게
for($i = 1; $i <=9; $i++ ){
	if($i > 1 && $i < 9){
		continue;
	}
	echo "{$i}단 \n";
	for($num = 1; $num <=9; $num ++) {
		echo "$i X $num = ", $num*$i,"\n";	
	}
}


// 홀수 단만 출력되게
for($i = 1; $i <=9; $i++ ){
	if( $i % 2 === 0 ){
		continue;
	}
	echo "{$i}단 \n";
	for($num = 1; $num <=9; $num ++) {
		echo "$i X $num = ", $num*$i,"\n";	
	}
}









?>