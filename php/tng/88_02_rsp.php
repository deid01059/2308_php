<?php

// $main = fgets(STDIN);
// $main = "r";

// echo "가위 바위 보 게임입니다\n";
// echo "\nrule\n \n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n";
// if($main = "r"){
// 	$i=[0];
// }
// else if($main = "s"){
// 	$i=[1];
// }
// else if($main = "p"){
// 	$i=[2];
// }

// $i = ["바위","가위","보"];

// $c = rand(1,3);

// if($i === [0]){
// 	if($c == 1){
// 		echo "!!!바위!!!\n
// 		컴퓨터가 바위를 냈습니다. 무승부\n";
// 	}
// 	else if($c == 2){
// 		echo "!!!바위!!!\n
// 		컴퓨터가 가위를 냈습니다. 승리\n";
// 	}
// 	else if($c == 3){
// 		echo "!!!바위!!!\n
// 		컴퓨터가 보를 냈습니다. 패배\n";
// 	}
// }
// else if($i === [1]){
// 	if($c == 1){
// 		echo "!!!가위!!!\n
// 		컴퓨터가 바위를 냈습니다. 패배\n";
// 	}
// 	else if($c == 2){
// 		echo "!!!가위!!!\n
// 		컴퓨터가 가위를 냈습니다. 무승부\n";
// 	}
// 	else if($c == 3){
// 		echo "!!!가위!!!\n
// 		컴퓨터가 보를 냈습니다. 승리\n";
// 	}
// }
// else if($i === [2]){
// 	if($c == 1){
// 		echo "!!!보!!!\n
// 		컴퓨터가 바위를 냈습니다. 승리\n";
// 	}
// 	else if($c == 2){		
// 		echo "!!!보!!!\n
// 		컴퓨터가 가위를 냈습니다. 패배\n";
// 	}
// 	else if($c == 3){
// 		echo "!!!보!!!\n
// 		컴퓨터가 보를 냈습니다. 무승부\n";
// 	}
// }




echo "\n\n		가위 바위 보 게임입니다\n";
echo "\n			-rule-\n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n\n	 나가시려면 yes를 입력해주시면 됩니다.\n";
$blk = "============================================================\n\n";
$foot2 ="	가위는 s 바위는 r 보는 p를 적어주세요. \n";
$foot1 ="	그만하시려면 yes를 입력해주시면 됩니다.\n\n";
while(true){
    $main = trim(fgets(STDIN));
    if ($main == "r") {
        $i = ["바위"];
    } 
    else if ($main == "s") {
        $i = ["가위"];
    }
    else if ($main == "p") {
        $i = ["보"];
    }
    else if ($main == "yes") {
        $i = ["end"];
    }
    $c = rand(1, 3);
    if ($i === ["바위"]) {
        if ($c == 1) {
            echo "$blk			!!!바위!!!\n\n		컴퓨터가 바위를 냈습니다. *무승부*\n\n$blk-$foot1-$foot2";
        } else if ($c == 2) {
            echo "$blk			!!!바위!!!\n\n		컴퓨터가 가위를 냈습니다. *승리*\n\n$blk-$foot1-$foot2";
        } else if ($c == 3) {
            echo "$blk			!!!바위!!!\n\n		컴퓨터가 보를 냈습니다. *패배*\n\n$blk-$foot1-$foot2";
        }
    } 
    else if ($i === ["가위"]) {
        if ($c == 1) {
            echo "$blk			!!!가위!!!\n\n		컴퓨터가 바위를 냈습니다. *패배*\n\n$blk-$foot1-$foot2";
        } else if ($c == 2) {
            echo "$blk			!!!가위!!!\n\n		컴퓨터가 가위를 냈습니다. *무승부*\n\n$blk-$foot1-$foot2";
        } else if ($c == 3) {
            echo "$blk			!!!가위!!!\n\n		컴퓨터가 보를 냈습니다. *승리*\n\n$blk-$foot1-$foot2";
        }
    }
    else if ($i === ["보"]) {
        if ($c == 1) {
            echo "$blk			!!!보!!!\n\n		컴퓨터가 바위를 냈습니다. *승리*\n\n$blk-$foot1-$foot2";
        } else if ($c == 2) {	
            echo "$blk			!!!보!!!\n\n		컴퓨터가 가위를 냈습니다. *패배*\n\n$blk-$foot1-$foot2";
        } else if ($c == 3) {
            echo "$blk			!!!보!!!\n\n		컴퓨터가 보를 냈습니다. *무승부*\n\n$blk-$foot1-$foot2";
        }
    }
    else if ($i === ["end"]) {
	    break;
    }
    else {
	    echo "잘못된 값을 입력하셨습니다\n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n그만하시려면 yes를 입력해주시면 됩니다.";
    }
}

?>