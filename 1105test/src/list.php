<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null;
$content = "";
$to_date="";
$flg = 0;

$today = date("Y-m-d");
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
    
    $flg = isset($_GET["flg"]) ? $_GET["flg"] : 0;
    $page_num = isset($_GET["page"]) ? $_GET["page"] : 1;

    // 게시글 카운트 조회
    $arr_param = [
        "flg" => $flg
    ];
    
    // 게시글 카운트
    $boards_cnt = db_select_lists_cnt($conn, $arr_param);
    if($boards_cnt === false) {
        throw new Exception("DB Error : SELECT Count"); // 강제 예외 발생 : DB SELECT Count
    }
    
    $max_page_num = ceil($boards_cnt / $list_cnt); // 최대페이지 수
    $offset = ($page_num - 1)* $list_cnt; //오프셋계산
    
    // DB 조회시 사용할 데이터 배열
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
        , "flg" => $flg
    ];

    // 게시글 리스트 조회 
    $result  = db_select_lists_paging($conn, $arr_param);
    if($result === false){
        throw new Exception("DB Error : SELECT boards"); // 강제 예외 발생 : SELECT boards
    }

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
    <div class="list_container center margin">
    <a href="/1105test/src/insert.php">글작성</a>
    <br>
    <?php
        if($flg === "1"){ 
    ?>
        <a href="/1105test/src/list.php/?flg=0">1년리스트 보기</a>
    <?php
        } else {
    ?>
        <a href="/1105test/src/list.php/?flg=1">10년리스트 보기</a>
    <?php
        }
    ?>
        <?php 
            foreach ($result as $item) {
        ?>
        <div class=list_div>
            <div>
                <?php echo $item["id"]; ?>
            </div>
            <a href="/1105test/src/chk_flg.php/?id=<?php echo $item["id"]; ?>&flg=<?php echo $flg ?>&page=<?php echo $page_num ?>">
                수행완료처리
            </a>
            <a class="list_content" href="/1105test/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num ?>">
                <?php echo $item["content"]; ?>
            </a>
            <div>
                <?php echo $item["write_date"]; ?>
                ~
                <?php echo $item["to_date"]; ?>
            </div>
        </div>
        <?php
            }
        ?>
        <section><!-- 제작 : 정훈 -->
            <?php
                if($boards_cnt > 17){
            ?> 
            <a href="/1105test/src/list.php/?page=1&flg=<?php echo $flg ?>"><<</a>
            <?php
                }
            ?>      
            <?php
                if($boards_cnt > 4){
            ?>                  
            <a href="/1105test/src/list.php/?page=<?php echo $prev_page_num ?>&flg=<?php echo $flg ?>"><</a>
            <?php
                }
            ?>
            <?php
                if($boards_cnt < 17){
                    for ($i = 1; $i <= $max_page_num; $i++) {
                        $class = ($i == $page_num) ? "" : "";
            ?>
            <?php
                        if($boards_cnt > 4){
            ?>
                        <a class="a <?php echo $class; ?> " href="/1105test/src/list.php/?page=<?php echo $i ?>&flg=<?php echo $flg ?>"><?php echo $i ?></a>        
            <?php
                        }
                    }
                }
                else if($boards_cnt >= 17){
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
                        $class = ($i == $page_num) ? "" : "";
                        ?>
                        
                        <a class="page_btn <?php echo $class; ?> " href="/1105test/src/list.php/?page=<?php echo $i ?>&flg=<?php echo $flg ?>"><?php echo $i ?></a>
            <?php
                    }
                }             
            ?>
            <?php
                if($boards_cnt > 4){
            ?>     
            <a  href="/1105test/src/list.php/?page=<?php echo $next_page_num ?>&flg=<?php echo $flg ?>">></a>
            <?php
                }
            ?>
            <?php
                if($boards_cnt > 17){
            ?> 
            <a  id="minmax_btn" href="/1105test/src/list.php/?page=<?php echo $max_page_num ?>&flg=<?php echo $flg ?>">>></a>                    
            <?php
                }
            ?>
        </section>
    </div>
</body>
</html>