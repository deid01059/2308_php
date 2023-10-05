<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");// 파라미터 에러메세지
require_once(ROOT."lib/lib_db.php");

$conn = null; // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= [];

try {
    // DB 접속
    if(!my_db_conn($conn)){
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); //강제예외발생 : DB Insrance
    }
    //GET Method의 경우
    if($http_method === "GET"){        
        $id = isset($_GET["id"]) ? $_GET["id"] : ""; //id셋팅
        $page = isset($_GET["page"]) ? $_GET["page"] : ""; //page셋팅

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
        $id = isset($_POST["id"]) ? $_POST["id"] : ""; //id셋팅
        $page = isset($_POST["page"]) ? $_POST["page"] : ""; //page셋팅
        $title = isset($_POST["title"]) ? $_POST["title"] : ""; //title셋팅
        $content = isset($_POST["content"]) ? $_POST["content"] : ""; //content셋팅

        if($id === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
        }       
        if($page === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }

        if($title === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "title");
        }       
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "content");
        }
        if(count($arr_err_msg) === 0){
        // 게시글 수정을 위해 파라미터 셋팅
        $arr_param =[
            "id" => $id
            ,"title" => $title
            ,"content" => $content
        ];

        // 게시글 수정 처리
        $conn->beginTransaction(); // 트랜잭션 시작

        if(!db_update_boards_id($conn, $arr_param)){
            throw new Exception("DB Error : Update_boards_id");
        }
        $conn->commit(); // commit
        header("Location: /mini_test/src/detail.php/?id={$id}&page={$page}"); // 디테일 페이지로 이동
        exit;
        }
    }
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
} catch(Exception $e) {
    if($http_method === "POST"){
        $conn->rollback(); // rollback
    }
    header("Location: /mini_test/src/error.php/?err_msg={$e->getMessage()}");
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
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>수정페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <div class="update"> 
        <form action="/mini_test/src/update.php" method="post">       
            <table class="table frame">
            <?php
                foreach($arr_err_msg as $val){
            ?> 
                <p class="error_p"><?php echo $val ?></p>
            <?php        
                }
            ?>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <tr>
                    <th class="th">글번호</th>
                    <td class="update_id"><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <th class="th">제목</th>
                    <td><input class="update_title" type="text" name="title" value="<?php echo $item["title"]?>"></td>
                </tr>
                <tr>
                    <th class="th">내용</th>
                    <td><textarea class="update_content" name="content" id="content" cols="30" rows="10"><?php echo $item["content"]?></textarea></td>
                </tr>
            </table>   
            <button type="submit" class="insert_submit_btn">확인</button>
            <a class="insert_cancle_btn" href="/mini_test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page;?>">취소</a>
        </form> 
    </div>

</body>
</html>