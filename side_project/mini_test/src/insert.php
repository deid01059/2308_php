<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");// 파라미터 에러메세지
require_once(ROOT."lib/lib_db.php");

// POST로 request가 왔을 때 처리 
$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= []; //에러 메세지 저장용
$title = "";
$content = "";

if($http_method === "POST"){
    try {
        $arr_post = $_POST;    
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; //title 셋팅
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content 셋팅

        if($title === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
        }       
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }
        
        if(count($arr_err_msg) === 0){
            // DB 접속
            if(!my_db_conn($conn)){
                // DB Instance Error
                throw new Exception("DB Error : PDO Instance");
            }
            $conn->beginTransaction(); // 트랜잭션 시작

            // insert
            if(!db_insert_boards($conn, $arr_post)) {
                // DB Insert 에러
                throw new Exception("DB Error : Insert Boards");
            }

            $conn->commit(); // 모든 처리 완료시 커밋

            // 리스트 페이지로 이동
            header("Location: list.php");
            exit;
        }
    } catch(Exception $e) {
        if($conn !== null){
            $conn->rollBack();
        }
        header("Location: error.php/?err_msg={$e->getMessage()}");
        exit; //처리종료
    } finally {
        db_destroy_conn($conn); // DB 파기
    }

}


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>작성페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <form action="/mini_test/src/insert.php" method="post">
        <main class="frame">
        <?php
        foreach($arr_err_msg as $val){
    ?> 
        <p class="error_p"><?php echo $val ?></p>
    <?php        
        }
    ?>
            <fieldset>
            <div>
                <label for="title">제목</label>
                <input class="insert_input" type="text" name="title" id="title" value="<?php echo $title ?>">      
            <br>
                <label class="" for="content">내용</label>
                <textarea class="insert_text_area" name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
            </div>
            <br>
                <button class="insert_submit_btn" type="submit">작성</button>
                <a class="insert_cancle_btn" href="/mini_test/src/list.php">취소</a>      
            </fieldset>
        </main>
    </form> 
</body>
</html>