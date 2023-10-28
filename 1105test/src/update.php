<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id = ""; // 변수에 값을 담기 위해 공백으로 설정
$page = "";
$conn = null; // conn 초기화 // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= []; //에러메세지용 변수를 배열로 넣어줌
$flg = "";
$chk = "";

try {
    // DB 연결
        if(!my_db_conn($conn)) {
        // DB Instance 에러
            throw new Exception("DB Error : PDO Instance");
        }    

    // GET Method의 경우
    if($http_method === "GET") {
        
        // 파라미터 획득
        $id = isset($_GET["id"]) ? trim($_GET["id"]) :""; // id 셋팅
        $page = isset($_GET["page"]) ? trim($_GET["page"]) : ""; // page 셋팅
        $flg = isset($_GET["flg"]) ? trim($_GET["flg"]) : ""; // flg 셋팅
        $chk = isset($_GET["chk"]) ? trim($_GET["chk"]) : ""; // chk 셋팅
        
        
        if($id === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
        }       
        if($page === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }

        
    } else {
         // POST Method의 경우
        // 게시글 수정을 위해 파라미터 셋팅
        // content 수정칸에 스페이스바 공백을 넣으면 에러 뜨게하고 막아둔 것은 
        // 이대로 입력 돼 버리면 유저가 눌러서 수정을 할수도 삭제도 할 수 없고 
        // 오늘의 할일을 적는 것이기 때문에 빈 값으로 수정되면 안된다.
         
        $id = isset($_POST["id"]) ? trim($_POST["id"]) :""; // id 셋팅
        $page = isset($_POST["page"]) ? trim($_POST["page"]) : ""; // page 셋팅
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content셋팅
        if($id === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
        }       
        if($page === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }
        if(count($arr_err_msg) === 0){
            $arr_param = [
                "id" => $id
                ,"content" => $content
            ];
            // 게시글 수정 처리
            $conn->beginTransaction(); // 트랜잭션 시작

            if(!db_update_boards_id($conn, $arr_param)) { 
                throw new Exception("DB Error : Update_boards_id");
            }
            $conn->commit(); // commit
            header("Location: detail.php/?id={$id}&page={$page}"); // detail 페이지로 이동
            exit;
        }
    }

      // 게시글 데이터 조회를 위한 파라미터 셋팅
      $arr_param = [
        "id" => $id
    ];

    // 게시글 데이터 조회
    $result = db_select_boards_id($conn, $arr_param);

    // 게시글 조회 예외처리
    if($result === false) {
        // 게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");
    } else if(count($result) !== 1) {
        // 게시글 조회 count 에러
        throw new Exception("DB ERROR : PDO Select_id Count,".count($result));
    }
    $item = $result[0];
    $chk_date1 = $item["chk_date"];
    $chk_date = isset($chk_date1)? $chk_date1 : "미수행 상태";

} catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollBack(); // rollback
    }
    echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리종료

} finally {
    db_destroy_conn($conn);
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>디테일페이지</title>
</head>
<body>
    <div class="main_frame center">
        <!-- 1번그리드 header -->
        <div class="grid_item">        
            <?php
                require_once(FILE_HEADER);
                ?>
        </div>
        <!-- 2번 그리드 왼쪽여백 -->
        <div class="grid_item">        
        </div>
        
        <!-- 3번그리드 main , sub그리드  -->
        <div class="grid_item">
            <div class="sub_frame">
                <!-- sub1 좌측 -->
                <div class="sub_grid_item">               
                </div>

                <!-- sub2 메인 -->
                <div class="sub_grid_item">
                    <form action="/1105test/src/update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="page" value="<?php echo $page ?>"> 
                        <?php
                            foreach($arr_err_msg as $val){
                        ?> 
                            <?php echo $val ?>
                        <?php        
                            }
                        ?>
                        <?php echo $chk_date; ?>
                        <?php echo $item["write_date"]; ?>
                        <textarea name="content" id="content" cols="30" rows="2" maxlength="30" required><?php echo $item["content"] ?></textarea>
                        <?php echo $item["to_date"]; ?>
                        <div>
                            <button type="submit">완료</button>
                            <a class="update_a "href="/1105test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>">취소</a>
                        </div>
                    </form>
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item">
                </div>
            </div>
        </div>
        <!-- 4번그리드 왼쪽여백 -->
        <div class="grid_item">        
        </div>
        
        <!-- 5번그리드 footer -->
        <div class="grid_item">
        </div>
    </div>
</body>
</html>