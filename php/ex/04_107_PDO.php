<?php

$db_host    = "localhost"; // host
$db_user    = "root"; // user
$db_pw      = "php504"; // password
$db_name = "employees"; // DB name
$db_charset = "utf8mb4"; // charset
$db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

$db_options = [
    // DB의 prepared Statement 기능을 사용하도록 설정
    PDO::ATTR_EMULATE_PREPARES      => false
    // PDO Exception을 Throws하도록 설정
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    // 연상배열로 Fetch를 하도록 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

// PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);





// sql 작성
// sql 작성 시 " ex " 처럼 앞뒤로 한칸씩 공백을 넣어주기
// $sql = " SELECT " 
//         ."   * "
//         ." FROM "
//         ." employees "
//         ." WHERE "
//         ." emp_no = :emp_no "
//         ;

// prepared Statement 셋팅
// $arr_ps = [
//     ":emp_no" => 10004
// ];

prepared Statement 생성
$stmt = $obj_conn->prepare($sql);
$stmt->execute($arr_ps); // 쿼리 실행
$result = $stmt->fetchAll(); // 쿼리 결과를 fetch

// print_r($result)


// $sql = " SELECT "
//     ." sal.salary "
//     ." ,emp.emp_no " 
//     ." ,emp.birth_Date "
//     ." FROM "
//     ." employees emp "
//     ." JOIN "
//     ." salaries sal "
//     ." ON "
//     ." emp.emp_no = sal.emp_no "
//     ." AND to_date >= NOW() "
//     ." WHERE "
//     ." emp.emp_no IN(:emp_no,:emp_no1) "
// ;

// $arr_ps = [
//     ":emp_no" => 10001
//     ,":emp_no1" => 10002
// ];

// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchAll(); // 쿼리 결과를 fetch

// print_r($result)


// insert
// 부서번호가 "d010", 부서명이 "php504"데이터 issert 


// $sql =
// " INSERT INTO "
//     ." departments ( "
// 	." dept_no "
// 	." ,dept_name "
//     ." ) "
// ." VALUES ( "
//     ." :dept_no1 "
//     ." ,:dept_name1 "
//     ." ); ";

// $arr_ps = [
//     ":dept_no1" => "d010"
//     ,":dept_name1" => "php504"
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn -> commit();

// var_dump($result);

// $obj_conn = null;


// 부서번호가 "d010"데이터 delete 

// $sql = " DELETE "
//         ." FROM " 
//         ." departments "
//         ." WHERE "
//         ."  dept_no = :dept_no1; "
//         ;
// $arr_ps = [
//     ":dept_no1" => "d010"
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $res_cnt = $stmt->rowCount(); //영향받는열 몇개인지 확인
// var_dump($res_cnt);
// if($res_cnt >= 2){
//     $obj_conn -> rollBack();
// }else{
// $obj_conn -> commit(); // 커밋
// }
// $obj_conn = null; //DB 파기


?>