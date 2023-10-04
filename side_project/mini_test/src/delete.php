<?php
// 설정 정보
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

try {
    // 2. DB Connect
    // 2-1. connection 함수호출
    $conn=null; // PDO 객체변수
    if(!my_db_conn($conn)){
        // 2-2 예외처리
        throw new Exception("DB Error : PDO instance");
    }
    // Method 획득
    $http_method = $_SERVER["REQUEST_METHOD"]; 

    if($http_method === "GET"){
        // 3-1. GET일 경우 (상세 페이지의 삭제 버튼 클릭)
        // 3-1-1. 파라미터에서 id 획득
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        $arr_err_msg = [];
        if($id === ""){
            $arr_err_msg[] = "parameter Error : id";
        }
        if($page === ""){
            $arr_err_msg[] = "parameter Error : page";
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        // 3-1-2. 게시글 정보 획득
        $arr_param = [
            "id" => $id
        ];
        $result = db_select_boards_id($conn, $arr_param);

        // 3-1-3. 예외 처리
        if($result === false){
            throw new Exception("DB Error : Select id");
        } else if(!(count($result) === 1)){
            throw new Exception("DB Error : Select id count");
        }
        $item = $result[0];
    } else {
        // 3-2. POST일 경울 (삭제 페이지의 동의 버튼 클릭)
        // 3-2-1.파라미터에서 id 획득
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $arr_err_msg = [];
        if($id === ""){
            $arr_err_msg[] = "parameter Error : id";
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>", $arr_err_msg));
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
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>삭제페이지</title>
</head>
<body class="delete_body">
    <?php
        require_once(FILE_HEADER);
    ?>
    <main>
        <table class="table frame">
            <caption class="delete_msg">
                삭제하면 영구적으로 복구 할 수 없습니다.
                <br>
                정말로 삭제하시겠습니까?
                <br><br>
            </caption>
            <tr class="table_content">
                <th class="th">글번호</th>
                <td class="detail_td"><?php echo $item["id"]; ?></td>
            </tr>
            <tr class="table_content">
                <th class="th">제목</th>
                <td class="detail_td">
                    <div>
                        <?php echo $item["title"]; ?>
                    </div>
                </td class="detail_td">
            </tr>
            <tr class="table_content">
                <th class="th">내용</th>
                <td class="detail_td"><textarea disabled cols=80 rows=10 style='overflow:visible'><?php echo $item["content"]; ?></textarea></td>
            </tr>
            <tr class="table_content">
                <th class="th">작성일자</th>
                <td class="detail_td"><?php echo $item["write_date"]; ?></td>
            </tr>
        </table>    
    </main>
    <section>
        <form action="/mini_test/src/delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button class="insert_submit_btn" type="submit">동의</button>
            <a class="insert_cancle_btn" href="/mini_test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page;?>">취소</a>
        </form>
    </section>
</body>
</html>