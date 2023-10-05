<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
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
    
    // 삼항연산자로 작성
    $page_num = isset($_GET["page"]) ? $_GET["page"] : 1;
    
    
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
    if($result === false){
        throw new Exception("DB Error : SELECT boards"); // 강제 예외 발생 : SELECT boards
    }

} catch(Exception $e) {
    // echo $e->getMessage(); //예외발생 메세지 출력  //v002 del
    header("Location: error.php/?err_msg={$e->getMessage()}");
    exit; //처리종료
} finally {
    db_destroy_conn($conn); //DB파기
}









?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>메인페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
<main>
    <div class="main_top frame">
        <form action="/mini_test/src/search.php" method="get">
            <input type="text" name="title" required>
            <input type="hidden" name="page" value="1">
            <button type="submit" class="btn">검색</button>
        </form>
        <td class="button_1"><a class=insert_board_a href="/mini_test/src/insert.php">글작성</a></td>
    </div>
    <table class="table frame">
        <colgroup>
            <col width="15%">
            <col width="50%">
            <col width="25%">
        </colgroup>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성일자</th>
        </tr>
        <?php
        // 리스트를 생성
        foreach($result as $item){
        ?>        
        <tr class="table_content">
            <td class="td_id"><?php echo $item["id"]; ?></td>
            <td class="td_title"><a class="boards_title" href="/mini_test/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>"><?php echo $item["title"]; ?></a></td>          
            <td class="td_date"><?php echo $item["write_date"]; ?></td>              
        </tr>
        <?php    
        }
        ?>        
    </table>
    <section class="menu SMN_effect-13">
        <a class="page_btn" id="minmax_btn" href="/mini_test/src/list.php/?page=1"><<</a>
        <a class="page_btn" href="/mini_test/src/list.php/?page=<?php echo $prev_page_num ?>"><</a>
        <?php
            if($boards_cnt < 21){
                for ($i = 1; $i <= $max_page_num; $i++) {
                    // 삼항연산자 : 조건 ? 참일때처리 : 거짓일때처리
                    $class = ($i == $page_num) ? "now_page" : "";
        ?>
                    <a class="page_btn <?php echo $class; ?> " href="/mini_test/src/list.php/?page=<?php echo $i ?>"><?php echo $i ?></a>        
        <?php
                }
            }
            else if($boards_cnt >= 21){
            $min_page = max($page_num - 2, 1); 
            $max_page = min($page_num + 2, $max_page_num);
                if($min_page === 1){
                    $min_page = 1;
                    $max_page = 5;
                } 
                else if($max_page === $max_page_num){
                    $min_page = $max_page_num-4;
                    $max_page = $max_page_num;
                } 
                for ($i = $min_page; $i <= $max_page; $i++) {
                    // 삼항연산자 : 조건 ? 참일때처리 : 거짓일때처리
                    $class = ($i == $page_num) ? "now_page" : "";
                    // 현재 페이지와 $i를 비교하여 현재 페이지에 해당하는 버튼에 강조 스타일을 적용
        ?>
        <a class="page_btn <?php echo $class; ?> " href="/mini_test/src/list.php/?page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php
                }}             
        ?>
        <a class="page_btn" href="/mini_test/src/list.php/?page=<?php echo $next_page_num ?>">></a>      
        <a class="page_btn" id="minmax_btn" href="/mini_test/src/list.php/?page=<?php echo $max_page_num ?>">>></a>
    </section>
</main>
</body>
</html>