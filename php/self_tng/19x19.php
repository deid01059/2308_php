<?php

// 19단까지 구구단 만들기 

// for( $num = 1; $num <= 19; $num++ ){
//     echo $num,"단\n";
//     for( $sec_num = 1; $sec_num <= 19; $sec_num++){
//         echo "$num x $sec_num =",$sec_num*$num,"\n";
//     }   
// }

// 홀수단은 생략


// for( $num = 1; $num <= 19; $num++ ){
//     if( $num % 2 === 1 ){
//         continue;
//     };
//     echo $num,"단\n";
//     for( $sec_num = 1; $sec_num <= 19; $sec_num++){
//         echo "$num x $sec_num =",$sec_num*$num,"\n";
//     }   
// }


// 짝수 곱하기는 생략

// for( $num = 1; $num <= 19; $num++ ){
//     echo $num,"단\n";
//     for( $sec_num = 1; $sec_num <= 19; $sec_num++){
//         if ($sec_num % 2 === 0 ){
//             continue;
//         }
//         echo "$num x $sec_num =",$sec_num*$num,"\n";
//     }   
// }






// 2에서 +3의 배수단들만 나타내고 그중 짝수번째 단은 홀수곱하기항목 생략

// for( $num = 2; $num <= 19; $num +=3 ){
//         echo $num,"단\n";
//     for( $sec_num = 1; $sec_num <= 19; $sec_num++){
	//             if( $sec_num % 2 === 1 && $num % 2 === 0){
//                 continue;
//             }
//         echo "$num X $sec_num =",$num*$sec_num,"\n";
//     }
// }





// 19단중 9단까지는 홀수번째곱하기 생략 10단 부터 짝수단 생략 그리고 짝수번째곱하기 생략

// for( $num = 1; $num <= 9; $num++ ){
//         echo $num,"단\n";
//         for( $sec_num = 1; $sec_num <= 19; $sec_num++){
//             if ($sec_num % 2 === 1 ){
//                 continue;
//             }
//             echo "$num x $sec_num =",$sec_num*$num,"\n";
//         }
// }  
// for( $num = 10; $num <= 19; $num++ ){
//     if ($num >= 10 && $num % 2 === 0){
//         continue;
//     }    
//     echo $num,"단\n";
//         for( $sec_num = 1; $sec_num <= 19; $sec_num++){
//             if ( $sec_num % 2 === 0){
//                 continue;
//             }    
//             echo "$num x $sec_num =",$sec_num*$num,"\n";
//         }
// }













?>