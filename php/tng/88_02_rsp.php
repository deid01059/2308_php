<?php

// echo "\n\n		가위 바위 보 게임입니다\n";
// echo "\n			-rule-\n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n\n	 나가시려면 yes를 입력해주시면 됩니다.\n";
// $blk = "============================================================\n\n";

// $foot1 ="	그만하시려면 yes를 입력해주시면 됩니다.\n\n";
// $foot2 ="	가위는 s 바위는 r 보는 p를 적어주세요. \n";
// $foot ="$foot1$foot2";
// while(true){
//     $main = trim(fgets(STDIN));
//     if ($main == "r") {
//         $i = ["바위"];
//     } 
//     else if ($main == "s") {
//         $i = ["가위"];
//     }
//     else if ($main == "p") {
//         $i = ["보"];
//     }
//     else if ($main == "yes") {
//         $i = ["end"];
//     }
//     $c = rand(1, 3);
//     if ($i === ["바위"]) {
//         if ($c == 1) {
//             echo "$blk			!!!바위!!!\n\n		컴퓨터가 바위를 냈습니다. *무승부*\n\n$blk$foot";
//         } else if ($c == 2) {
//             echo "$blk			!!!바위!!!\n\n		컴퓨터가 가위를 냈습니다. *승리*\n\n$blk$foot";
//         } else if ($c == 3) {
//             echo "$blk			!!!바위!!!\n\n		컴퓨터가 보를 냈습니다. *패배*\n\n$blk$foot";
//         }
//     } 
//     else if ($i === ["가위"]) {
//         if ($c == 1) {
//             echo "$blk			!!!가위!!!\n\n		컴퓨터가 바위를 냈습니다. *패배*\n\n$blk$foot";
//         } else if ($c == 2) {
//             echo "$blk			!!!가위!!!\n\n		컴퓨터가 가위를 냈습니다. *무승부*\n\n$blk$foot";
//         } else if ($c == 3) {
//             echo "$blk			!!!가위!!!\n\n		컴퓨터가 보를 냈습니다. *승리*\n\n$blk$foot";
//         }
//     }
//     else if ($i === ["보"]) {
//         if ($c == 1) {
//             echo "$blk			!!!보!!!\n\n		컴퓨터가 바위를 냈습니다. *승리*\n\n$blk$foot";
//         } else if ($c == 2) {	
//             echo "$blk			!!!보!!!\n\n		컴퓨터가 가위를 냈습니다. *패배*\n\n$blk$foot";
//         } else if ($c == 3) {
//             echo "$blk			!!!보!!!\n\n		컴퓨터가 보를 냈습니다. *무승부*\n\n$blk$foot";
//         }
//     }
//     else if ($i === ["end"]) {
// 	    break;
//     }
//     else {
// 	    echo "잘못된 값을 입력하셨습니다\n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n그만하시려면 yes를 입력해주시면 됩니다.";
//     }
// }


// 짧게하는법

// echo "\n\n		가위 바위 보 게임입니다\n";
// echo "\n			-rule-\n가위는 s 바위는 r 보는 p 를 입력해주시면 게임이 진행됩니다.\n\n	 나가시려면 yes를 입력해주시면 됩니다.\n";
// $player_answer = trim(fgets(STDIN));
// $msg = "============================================================\n\n 			!!!{$player_answer}!!!\n\n		컴퓨터가 {$com_answer_rand}를 냈습니다. *%s*\n\n============================================================\n\n	그만하시려면 yes를 입력해주시면 됩니다.\n\n	가위는 s 바위는 r 보는 p를 적어주세요. \n";


// $com_answer = ["r","s","p"];
// // $com_answer_key = array_rand($com_answer);
// // $com_answer_value = $com_answer[$com_answer_key];
// $rand_1 = rand(0,2);
// $com_answer_rand = $com_answer[$rand_1];
// while(true){
//         if($player_answer == $com_answer_rand)
//         {
//             echo $msg
//         }





    }



























?>