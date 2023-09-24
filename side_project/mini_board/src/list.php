<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null; // DB connection 변수

$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화
try {
    // DB 접속
    if(!my_db_conn($conn)){
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); //강제예외발생 : DB Insrance
    }
    // -------------
    // 페이징 처리
    // -------------
    $boards_cnt = db_select_boards_cnt($conn);
    if($boards_cnt === false) {
        throw new Exception("DB Error : SELECT Count"); // 강제 예외 발생 : DB SELECT Count
    }

    $max_page_num = ceil($boards_cnt / $list_cnt); // 최대페이지 수
    
    if(isset($_GET["page"])){
        $page_num = $_GET["page"]; // 유저가 보내온 페이지 셋팅
    }
    
    $offset = ($page_num - 1)* $list_cnt; //오프셋계산
    
    // 이전버튼
    $prev_page_num = $page_num - 1;
    if($prev_page_num === 0){
        $prev_page_num = 1;
    }
    
    // 다음버튼
    $next_page_num = $page_num + 1;
    if($next_page_num > $max_page_num){
        $next_page_num = $max_page_num;
    }
    
    // DB 조회시 사용할 데이터 배열
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];
    
    
    
    // 게시글 리스트 조회 
    $result  = db_select_boards_paging($conn, $arr_param);
    if(!$result){
        throw new Exception("DB Error : SELECT boards"); // 강제 예외 발생 : SELECT boards
    }

} catch(Exception $e) {
    echo $e->getMessage(); //예외발생 메세지 출력
    exit; //처리종료
} finally {
    db_destroy_conn($conn); //DB파기
}










?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>리스트 페이지 입니다</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <main>        
        <table class="list_table">
            <td class="insert_button"><a class=insert_board href="/mini_board/src/insert.php">글작성</a></td>
            <colgroup>
                <col width="15%">
                <col width="50%">
                <col width="25%">
            </colgroup>
            <tr class="table_title">
                <th>번호</th>
                <th>제목</th>
                <th>작성일자</th>
            </tr>
            <?php
            // 리스트를 생성
            foreach($result as $item){
            ?>        
            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td><a class="boards_title" href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>"><?php echo $item["head"]; ?></a></td>          
                <td><?php echo $item["create_date"]; ?></td>              
            </tr>
            <?php    
            }
            ?>
           
        </table>
        <section>
            <a class="page_btn" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
            <?php
                $a = isset($_GET["page"]) ? $_GET["page"] : 1;
                $min_page = max($a - 2, 1); 
                $max_page = min($a + 2, $max_page_num);
                for ($i = $min_page; $i <= $max_page; $i++) {
                    $class = ($i == $a) ? "page_btn now_page" : "page_btn";
                    // 현재 페이지와 $i를 비교하여 현재 페이지에 해당하는 버튼에 강조 스타일을 적용
            ?>
                <a class="<?php echo $class; ?> list_page_no_btn" href="/mini_board/src/list.php/?page=<?php echo $i ?>"><?php echo $i ?></a>
            <?php
                    }
               
            ?>
            <a class="page_btn" href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
        </section>
    </main>
</body>
</html>