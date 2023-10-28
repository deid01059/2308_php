<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
require_once(ROOT."lib/lib_db.php");

$id = ""; 
$chk = ""; 
$flg = ""; 
$page = ""; 
$conn = null;
try {
    // 2. DB Connect
    // 2-1. connection 함수호출
    if(!my_db_conn($conn)){
        // 2-2 예외처리
        throw new Exception("DB Error : PDO instance");
    }
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $chk = isset($_POST["chk"]) ? $_POST["chk"] : "";
        $flg = isset($_POST["flg"]) ? $_POST["flg"] : "";
        $page = isset($_POST["page"]) ? $_POST["page"] : "";
        $arr_err_msg = [];
			//error 메세지
			if($id === ""){
				$arr_err_msg[] = "Parameter Error : ID";
			}
			if(count($arr_err_msg)>= 1){
				throw new Exception(implode("<br>",$arr_err_msg));
			}
        // 3-2-2.Transaction 시작
        $conn->beginTransaction();

        // 3-2-3. 게시글 정보 삭제
        $arr_param = [
            "id" => $id
        ];

        // 3-2-4. 예외 처리
        if(!db_delete_boards_id($conn, $arr_param)){
            throw new Exception("DB Error : Delete Boards id");
        }

        $conn->commit(); // commit
        header("Location: list.php/?page={$page}&chk={$chk}&flg={$flg}"); // 리스트 페이지로 이동 
        exit;
    }
catch(Exception $e) {
        $conn->rollback();
    echo $e->getMessage(); //에러 메세지 출력
    exit; // 처리종료
} finally{
    db_destroy_conn($conn);
}