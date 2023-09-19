<?php

// session : 데이터를 웹 서버에 저장, 쿠키보다 보안성과 속도도 빠름
// *** 주의사항 ***
// 개인정보, 민감한 정보들은 되도록 저장하지 말아야 한다.


// session 시작
session_name("login"); //특정세션명으로 시작하는법
session_start();

// session 생성
$_SESSION["green"] = "php" ;
$_SESSION["green2"] = "java" ;


// 특정 session 삭제
unset($_SESSION["green"]);


print_r($_SESSION);


?>