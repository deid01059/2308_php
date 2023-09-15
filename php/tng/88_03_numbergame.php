<?php

echo "********************************랜덤 숫자 맞추기 게임 입니다********************************\n";
echo "**********************1~100으로 설정되는 랜덤한 값의 숫자를 맞춰주세요***********************\n";
echo "*****************총 기회는 5번이고 5번의기회가 모두 소진될시 정답이 공개됩니다*****************\n\n";
echo "1 번째 도전\n\n";

$roof_no = 1;
$com_no = rand(1,100);
while(true){
	$user_no = trim(fgets(STDIN));
	if($roof_no <= 4 && $roof_no > 0){
		if($user_no>=1 && $user_no<= 100){
			if($com_no > $user_no){
				echo "컴퓨터의 숫자가 더 큽니다\n\n";
			}
			else if($com_no < $user_no){
				echo "컴퓨터의 숫자가 더 작습니다\n\n";				
			}
			else {
				echo "정답입니다!!!";
				break;
			}
			echo "\n",$roof_no+1," 번째 도전\n\n";
			}
			else{
				echo "잘못된 값을 입력하셨습니다\n";
				$roof_no--; 
			}
	}
	else if($roof_no > 4){
		echo "정답은 $com_no !!\n~~실패~~";
		break;
	}
	$roof_no++;
}












?>