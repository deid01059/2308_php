<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id = ""; // 변수에 공백값을줘서 변수사용시 오류 발생 제거

try {
    // id 확인
    if(!isset($_GET["id"]) || $_GET["id"] === "") {
        throw new Exception("Parameter Error : No id"); // 강제 예외 발생 : Parameter Error
    }
    $id = $_GET["id"]; // id 셋팅
    $page = $_GET["page"]; // page 셋팅

    //DB 연결
    if(!my_db_conn($conn)){
        throw new Exception("DB Error : PDO Instance");
    }

    // 게시글 데이터 조회
    $arr_param = [
        "id" => $id
    ];
    $result = db_select_boards_id($conn, $arr_param);
    
    // 게시글 조회 예외처리
    if($result === false){
        //게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id,");
    } 
    elseif(!(count($result) === 1)){
        //게시글 조회 카운터 에러
        throw new Exception("DB Error : PDO Select_id count,".count($result));
    }
    $item=$result[0];
}catch (Exception $e) {
    echo $e->getMessage(); // 예외 메세지 출력
    exit; // 처리종료
} finally{
    db_destroy_conn($conn); //DB파기
}



?>







<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>상세페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>  
        <table class="table frame">
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
    <section>
    <a class=page_btn href="/mini_test/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page;?>">수정</a>
    <a class=page_btn href="/mini_test/src/list.php/?page=<?php echo $page;?>">취소</a>
    <a class=page_btn href="/mini_test/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page;?>">삭제</a>
    </section>
</body>
</html>