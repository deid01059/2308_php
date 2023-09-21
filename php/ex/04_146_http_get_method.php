<?php

// GET Method

// https://www.google.com/search?q=%EC%B9%A8%EC%B0%A9%EB%A7%A8
//(프로토콜)   (도메인)           (쿼리스트링 = 파라미터)

// http://localhost/mini_board/src/list.php/?page=2&num=10
//(프로토콜)(도메인)        (패스)           (쿼리스트링 = 파라미터)



// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙

// 도메인 : 접속하고자 하는 서버의 ip 또는 별칭

// 패스 : 실행 시키고자 하는 처리의 주소

// 쿼리스트링(파라미터) : GET Method로 통신할 때 유저가 보내주는 데이터 
// (?page=2&num=10)부분
// (page = key) = (2 = val) & (num = key) = (10 = val) -> 배열로 나타냄

print_r($_GET);



?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/04_146_http_get_method.php/?page=1&bnum=10">test</a>    
</body>
</html>
