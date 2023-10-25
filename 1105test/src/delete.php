<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id = ""; // 빈 문자열로 초기화
$conn = null; //null로 초기화
$arr_err_msg= []; //빈 배열로 초기화
$content = "";//빈 문자열로 초기화
$http_method = $_SERVER["REQUEST_METHOD"]; //method확인
try {
    // 2. DB Connect
    // 2-1. connection 함수호출
    if(!my_db_conn($conn)){
        // 2-2 예외처리
        throw new Exception("DB Error : PDO instance");
    }
    if($http_method === "GET"){
     
        $id = isset($_GET["id"]) ? $_GET["id"] : ""; //파라미터 획득
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        $arr_err_msg= [];
        if($id === ""){
            $arr_err_msg[] = "Parameter Error : ID"; //에러 메세지를 배열에 추가
        }
        if($page === ""){
            $arr_err_msg[] = "Parameter Error : Page";
        }
        if(count($arr_err_msg)>= 1){
            throw new Exception(implode("<br>",$arr_err_msg)); //하나 이상의 에러메세지 처리
        }
        // 3-1-2. 게시글 정보 획득
        $arr_param = [ //연관배열
            "id" => $id //id = 키 $id =값
        ];
        $result = db_select_boards_id($conn, $arr_param);

        // 3-1-3. 예외 처리
        if($result === false){
            throw new Exception("DB Error : Select id");
        } else if(!(count($result) === 1)){
            throw new Exception("DB Error : Select id count");
        }
        $item = $result[0];
        $chk_date1 = $item["chk_date"];
        $chk_date = isset($chk_date1)? $chk_date1 : "미수행 상태";
    } else {
        // 3-2-1.파라미터에서 id 획득
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
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
        header("Location: list.php"); // 리스트 페이지로 이동 
        exit;
    }
} catch(Exception $e) {
    if($http_method === "POST"){
        $conn->rollback();
    }
    echo $e->getMessage(); //에러 메세지 출력
    exit; // 처리종료
} finally{
    db_destroy_conn($conn);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>삭제페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <div>
        <?php echo $chk_date; ?>
        <?php echo $item["write_date"]; ?>
        <?php echo $item["content"]; ?>
        <?php echo $item["to_date"]; ?>
    </div>
    <section class="delete_section">
        <form action="/1105test/src/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit"> 
                확인
            </button>
            <a href="/1105test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?> ">
                취소
            </a>
        </form>
    </section>
</body>
</html>