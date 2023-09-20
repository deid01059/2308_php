<?php

// 현업 소스코드 관리

// *******************************
// 파일명   : 04_107_fnc_db_connect.php
// 기능     : DB 연동 관련 함수
// 버전     : v001 new Choi.JH 230918
//             v002 dbconn 설정 변경 Choi.JH 230918
// *******************************

// -------------------------------
// 함수명   : my_db_conn
// 기능     : DB Connect
// 파라미터 : PDO  &$conn
// 리턴     : boolen
// -------------------------------


function my_db_conn( &$conn ) {
    $db_host    = "localhost"; // host
    $db_user    = "root"; // user
    $db_pw      = "php504"; // password
    $db_name = "mini_board"; // DB name
    $db_charset = "utf8mb4"; // charset
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

try {
    $db_options = [
        // DB의 prepared Statement 기능을 사용하도록 설정
        PDO::ATTR_EMULATE_PREPARES      => false
        // PDO Exception을 Throws하도록 설정
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        // 연상배열로 Fetch를 하도록 설정
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];

    // PDO Class로 DB 연동
    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
    return true;
    }catch (Exception $e){
        $conn = null;
        return false;
    }
}


// -------------------------------
// 함수명   : db_destroy_conn
// 기능     : DB Destroy
// 파라미터 : PDO  &$conn
// 리턴     : 없음
// -------------------------------


function db_destroy_conn($conn){
    $conn = null;
}


// -------------------------------
// 함수명   : db_select_boards_paging
// 기능     : boards paging 조회
// 파라미터 : PDO  &$conn
// 리턴     : Array /false
// -------------------------------
function db_select_boards_paging(&$conn){
    try {
        $sql =
        " SELECT "
        ." id "
        ." ,head "
        ." ,create_date "
        ." FROM "
        ." boards "
        ." ORDER BY "
        ." id DESC "
        ;

        $arr_ps = [];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchALL();
        return $result; //정상
    } catch(Exception $e){
        return false; //예외발생
    }
}

















?>