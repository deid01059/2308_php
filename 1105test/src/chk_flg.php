<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
require_once(ROOT . "lib/lib_db.php");

// 기본값 셋팅
$conn = null;
$id = "";
$chk_flg = "";
$chk_date = "";
$page = "";

try {
    // DB 접속
    if (!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); // 강제예외발생 : DB Instance
    }
    $id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
    $flg = isset($_GET["flg"]) ? $_GET["flg"] : ""; // chk_flg 셋팅
    $page = isset($_GET["page"]) ? $_GET["page"] : ""; // fage 셋팅

    $conn->beginTransaction(); // 트랜잭션 시작

    $arr_param = [
        "id" => $id
        ,"flg"=>$flg
    ];
    if (!db_update_chk_date($conn, $arr_param)) {
        throw new Exception("DB Error : Update_chk_flg");
    }
    $conn->commit(); // commit
    header("Location: /1105test/src/list.php/?page={$page}"); // 디테일 페이지로 이동
    exit;
} catch (Exception $e) {
    $conn->rollback(); // rollback
    echo $e->getMessage(); // Exception 메세지 출력
    exit; // 처리종료
} finally {
    db_destroy_conn($conn); // DB파기
}
?>