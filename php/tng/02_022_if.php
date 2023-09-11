<?php


$num = 59;

// 점수별 안내메세지 

if( $num >= 100 ){
	echo "당신의 점수는 {$num}점 입니다. <A+>";
}
else if( $num >= 90 ){
	echo "당신의 점수는 {$num}점 입니다. <A>";
}
else if( $num >= 80 ){
	echo "당신의 점수는 {$num}점 입니다. <B>";
}
else if( $num >= 70 ){
	echo "당신의 점수는 {$num}점 입니다. <C>";
}
else if( $num >= 60 ){
	echo "당신의 점수는 {$num}점 입니다. <D>";
}
else{
	echo "당신의 점수는 {$num}점 입니다. <F>";
	
}




// 글씨를 바꿀상황을 대비

// 방법1
$num = 59;

if( $num >= 100 ){
	$grade = "A+";
}
else if( $num >= 90 ){
	$grade = "A";
}
else if( $num >= 80 ){
	$grade = "B";
}
else if( $num >= 70 ){
	$grade = "C";
}
else if( $num >= 60 ){
	$grade = "D";
}
else{
	$grade = "F";
}

$str = "당신의 점수는 {$num}점 입니다. <{$grade}>";

echo $str;


// 방법 2

$num = 59;
$grade = "";
$answer = "당신의 점수는 %u점 입니다 <%s>";

if( $num >= 100 ){
	$grade = "A+";
}
else if( $num >= 90 ){
	$grade = "A";
}
else if( $num >= 80 ){
	$grade = "B";
}
else if( $num >= 70 ){
	$grade = "C";
}
else if( $num >= 60 ){
	$grade = "D";
}
else{
	$grade = "F";
}

$str = sprintf($answer,$num ,$grade );

echo $str;



// 0~100외의 숫자일경우 다른메세지전송

$num = 59;

if( $num >= 0 && $num <= 100){
	if( $num === 100 ){
		$grade = "A+";
	}
	else if( $num >= 90 ){
		$grade = "A";
	}
	else if( $num >= 80 ){
		$grade = "B";
	}
	else if( $num >= 70 ){
		$grade = "C";
	}
	else if( $num >= 60 ){
		$grade = "D";
	}
	else if( $num >= 0 ){
		$grade = "F";
	};
	
	$str = "당신의 점수는 {$num}점 입니다. <{$grade}>";
	
	echo $str;

}
else {
	echo "잘못된 값을 입력했습니다";
}


?>