<?php

// 폴더(디렉토리)만들기
// mkdir("../tng/testdir", 777);





// 정상실행되는지테스트문
// if (mkdir("../tng/testdir", 777)){
// 	echo "정상";
// 	} else{
// 	echo "실패";
// 	}

// 폴더삭제
// rmdir("../tng/testdir");




// 파일 만들기or파일 열기
// $file = fopen("zz.txt", "a");
//            파일이름 ,"모드"
// 						"a" 쓰기권한
//                      "W" 싹다지움 내용
// 						"r" 읽기권한


// 파일 쓰기
// $f_write = fwrite($file, "짜장면\n");


// 파일읽기

// byte 단위 불러오기
// $line = fread($file, "6");
// echo $line;

// 줄단위 불러오기
// echo fgets($file);
// echo fgets($file);
// echo fgets($file);
// echo fgets($file);
// echo fgets($file);

// 전체불러오기
// while( $line = fgets($file) ){
// 	echo $line;
// }





// 정상실행되는지테스트문
// if(!$file) {
// 	echo "실행실패";
// }




// 파일 닫기
// if(!fclose($file)) {
// 	echo "파일안닫힘";
// }


// 파일 삭제
// unlink("zz.txt");













?>