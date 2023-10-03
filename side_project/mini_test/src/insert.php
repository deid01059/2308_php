<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

// POST로 request가 왔을 때 처리 
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
if($http_method === "POST"){
    try {
        $arr_post = $_POST;    
        $conn = null; // DB Connection 변수
        
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
    } catch(Exception $e) {
        $conn->rollBack();
        echo $e->getMessage(); // Exception 메세지 출력
        exit;
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
        <main class="insert_main">
            <fieldset class="insert_fieldset">
            <div>
                <label class="insert_head_label" for="title">제목</label>
                <input class="insert_head" type="text" name="title" id="title" required>
            <br>
                <label class="insert_content_label" for="content">내용</label>
                <textarea class="insert_content" name="content" id="content" cols="30" rows="10" required></textarea>
            </div>
            <br>
          <button class="insert_submit_btn" type="submit">작성</button>
            <a class="insert_cancle_btn" href="/mini_test/src/list.php">취소</a>      
            </fieldset>
        </main>
    </form> 
</body>
</html>