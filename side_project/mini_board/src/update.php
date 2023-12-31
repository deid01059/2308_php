<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null; // DB 연결용 변수
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; //id 셋팅
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; //id 셋팅
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인

try {
    // DB 접속
    if(!my_db_conn($conn)){
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); //강제예외발생 : DB Insrance
    }

    if($http_method === "GET"){
        //GET Method의 경우
        //게시글 데이터 조회를 위한 파라미터 셋팅
        $arr_param = [
            "id" => $id
        ]; 
        $result = db_select_boards_id($conn, $arr_param);
        // 게시글 조회 예외처리
        if($result === false){
            //게시글 조회 에러
            throw new Exception("DB Error : PDO Select_id");
        } 
        elseif(!(count($result) === 1)){
            //게시글 조회 count 에러
            throw new Exception("DB Error : PDO Select_id count, ".count($result));
        }
        // 이차원 배열을 쓰기 편하게 하기위해서
        $item=$result[0];
    } else {
        // POST Method의 경우
        // 게시글 수정을 위해 파라미터 셋팅
        $arr_param =[
            "id" => $id
            ,"head" => $_POST["head"]
            ,"content" => $_POST["content"]
        ];

        // 게시글 수정 처리
        $conn->beginTransaction(); // 트랜잭션 시작

        if(!db_update_boards_id($conn, $arr_param)){
            throw new Exception("DB Error : Update_boards_id");
        }
        $conn->commit(); // commit
        header("Location: detail.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
        exit;
    }
} catch(Exception $e) {
    if($http_method === "POST"){
        $conn->rollback(); // rollback
    }
    echo $e->getMessage(); //예외발생 메세지 출력
    exit; //처리종료
} finally {
    db_destroy_conn($conn);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>수정페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <div class="detail_container"> 
        <form action="/mini_board/src/update.php" method="post">       
            <table class="detail_table">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <tr>
                    <th>글번호</th>
                    <td><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td><input type="text" name="head" value="<?php echo $item["head"]?>"></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td><textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]?></textarea></td>
                </tr>
            </table>   
            <button type="submit">확인</button>
            <a class=page_btn href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page;?>">취소</a>
        </form> 
    </div>
    <section>

</body>
</html>