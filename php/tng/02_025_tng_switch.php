<?php

// switch 문
$rank = 4;
$award = "";
switch( $rank ){
	case 1:
		$award = "금상";
		break;
	case 2:
		$award = "은상";
		break;
	case 3:
		$award = "동상";
		break;
	case 4:
		$award = "장려상";
		break;
	default:
		$award = "노력상";
		break;
}

echo $award;



// if 문


if( $rank === 1 ){
	$award = "금상";
}
else if( $rank === 2 ){
	$award = "은상";
}
else if( $rank === 3 ){
	$award = "동상";
}
else if( $rank === 4 ){
	$award = "장려상";
}
else{
	$award = "노력상";
}


echo $award;

















?>