<?php

// for문
// for( 시작; 조건; 증가/증감 연산자) {
//  반복하고싶은처리
//]

for($i = 0; $i <=2; $i++) {
	echo $i ,"\n";
}




// break : for문을 종료하고 빠져나오는 문법;

for($i = 0; $i <=2; $i++) {
	echo "안녕하세요\n";
	break;
}



// continue : continue 아래에 있는 처리를 실행하지 않고 다음 루프로 진행

for($i = 0; $i <=2; $i++) {
	if($i === 1){
		continue;
	}
	echo $i,"\n";
}


// 이중 루프
for($i = 0; $i <= 1; $i++){
	for($z = 9; $z >=8; $z--){
		echo "{$i},,,,,{$z}\n";
	}
}






?>