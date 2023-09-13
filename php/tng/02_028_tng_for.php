<?php
// 반복문을 이용해서 구구단 2단을 출력해주세요.

// for($num = 1; $num <=9; $num ++) {
// 	$two_no = $num * 2;
// 	echo "2 X {$num} = {$two_no}" ,"\n";
// }


// 반복물을 이용하여 1단에서 9단까지
// for($i = 1; $i <=9; $i++ ){
// 	echo "{$i}단 \n";
// 	for($num = 1; $num <=9; $num ++) {
// 		echo "$i X $num = ", $num*$i,"\n";	
// 	}
// }


// 1단 9단만 출력되게
// for($i = 1; $i <=9; $i++ ){
// 	if($i > 1 && $i < 9){
// 		continue;
// 	}
// 	echo "{$i}단 \n";
// 	for($num = 1; $num <=9; $num ++) {
// 		echo "$i X $num = ", $num*$i,"\n";	
// 	}
// }


// 홀수 단만 출력되게
// for($i = 1; $i <=9; $i++ ){
// 	if( $i % 2 === 0 ){
// 		continue;
// 	}
// 	echo "{$i}단 \n";
// 	for($num = 1; $num <=9; $num ++) {
// 		echo "$i X $num = ", $num*$i,"\n";	
// 	}
// }


// $i = 10;
// for ($star = 1; $star <= $i; $star++ ){	
// 	echo str_repeat("*",$star) ,"\n";
// }


// 1번 정렬
// $i = 8;
// for ($int_line = 1; $int_line <= $i; $int_line++ ){	
// 	for ($star = 1; $star <= $int_line; $star++ ){
// 	echo "*";
// 	}
// 	echo "\n";
// }


// 2번 역정렬
// $my_int = 8;
// for ($int_line = 1; $int_line <= $my_int; $int_line++ ){	
// 	for ($blk = $my_int-$int_line; $blk >= 1; $blk-- ){
// 	echo " ";
// 	}
// 	for ($star = 1; $star <= $int_line-1; $star++ ){
// 		echo "*";
// 		}
// 	echo "\n";
// }


// 3번 삼각형

// $i = 8;
// for ($line = 1; $line <= $i; $line++ ){	
// 	for ($blk = $i-$line; $blk >= 1; $blk-- ){
// 	echo " ";
// 	}
// 	for ($star = 1; $star <= $line*2-1; $star++ ){
// 		echo "*";
// 	}
// 	echo "\n";
// }




// 4번 마름모

// $i = 7;
// for ($line = 1; $line <= $i; $line++ ){	
// 	for ($blk = $i-$line; $blk >= 1; $blk-- ){
// 	echo " ";
// 	}
// 	for ($star = 1; $star <= $line*2-1; $star++ ){
// 		echo "*";
// 	}
// 	echo "\n";
// }
// for ($line = 1; $line <= $i-1;  $line++ ){	
// 	for ( $blk = 1; $blk <= $line; $blk++ ){
// 		echo " ";
// 	}
// 	for ($star = ($i-$line)*2-1; $star >= 1; $star-- ){
// 		echo "*";
// 	}
// 	echo "\n";
// }




?>