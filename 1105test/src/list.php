<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null;
$content = "";
$to_date="";
$y = 0;


$today = date("Y-m-d");
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try {
    // DB 접속
    if(!my_db_conn($conn)){
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); //강제예외발생 : DB Insrance
    }
    $to_year = isset($_GET["to_year"]) ? $_GET["to_year"] : 1;

    
    if($to_year === "10"){
        $to_date = '2034-01-01';
    } else {
        $to_date = date('Y-01-01', strtotime('+'.$to_year.' year'));
    }
    // 게시글 리스트 조회 
    $result  = db_select_lists($conn, $arr_param);
    if($result === false){
        throw new Exception("DB Error : SELECT boards"); // 강제 예외 발생 : SELECT boards
    }


} catch(Exception $e) {
    echo $e->getMessage(); //예외발생 메세지 출력  //v002 del
    exit; //처리종료
} finally {
    db_destroy_conn($conn); //DB파기
}









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>리스트페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <div class="container">
    <?php 
        foreach ($result as $item) {
    ?>
        <a class="list_content" href="/1105test/src/detail.php/?id=<?php echo $item["id"]; ?>&to_year=<?php echo $to_year ?>">
            <?php echo $item["content"]; ?>
        </a>
        <div>
            <?php echo $item["write_date"]; ?>
            ~
            <?php echo $item["to_date"]; ?>
        </div>
    <?php
        }
    ?>
    </div>
</body>
</html>