<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
require_once(ROOT."lib/lib_db.php");

// POST로 request가 왔을 때 처리 
$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= []; //에러 메세지 저장용
$flg = "";
$content = "";
$to_date = "";
$ten_flg = "";

$Year = date("Y");
if($http_method === "POST"){
    try {
        $flg = isset($_POST["flg"]) ? trim($_POST["flg"]) : "";
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content 셋팅

        if($flg === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "수행기한");
        }       
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }
        
        if($flg === "0"){
            $to_date = ($Year + 1)."0101";
            $ten_flg = "0";
        } else if($flg === "1"){
            $to_date = ($Year + 10)."0101";
            $ten_flg = "1";
        }

        if(count($arr_err_msg) === 0){
            // DB 접속
            if(!my_db_conn($conn)){
                // DB Instance Error
                throw new Exception("DB Error : PDO Instance");
            }
            $conn->beginTransaction(); // 트랜잭션 시작
            
            $arr_param = [
                "ten_flg" => $ten_flg
                ,"content" => $content
                ,"to_date" => $to_date
            ];

            // insert
            if(!db_insert_boards($conn, $arr_param)) {
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
        echo $e->getMessage(); //예외발생 메세지 출력  //v002 del
        exit; //처리종료
    } finally {
        db_destroy_conn($conn); // DB 파기
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>작성 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <?php
        foreach($arr_err_msg as $val){
    ?> 
        <p class="error_p"><?php echo $val ?></p>
    <?php        
        }
    ?>
    <form action="/1105test/src/insert.php" method="post">
        <select name="flg">
            <option value="0">1년</option>
            <option value="1">10년</option>
        </select>    
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
        <section>
            <button type="submit">작성</button>
            <a href="/1105test/src/list.php">취소</a>      
        </section>
    </form> 
</body>
</html>