<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$conn = null;
$content = "";
$to_date="";
$flg = 0;
$chk = "";

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
    
    $page_num = isset($_GET["page"]) ? $_GET["page"] : "1";
    $flg = isset($_GET["flg"]) ? $_GET["flg"] : "0";
    $chk = isset($_GET["chk"]) ? $_GET["chk"] : "0";
    $date = isset($_GET["date"]) ? $_GET["date"] : "0";
    // if($flg === ""){
    //     $flg = "0";
    // }
    // if($chk === ""){
    //     $chk = "0";
    // }

    if($date==="1"){
        $date_i="0";
        $date_m="현재진행중";
    }else{
        $date_i="1";
        $date_m="지난버킷들";
    };

    // 게시글 카운트 조회
    $arr_param = [
        "flg" => $flg
        , "chk" => $chk
        , "date" => $date
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
        , "chk" => $chk
        , "date" => $date
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

    if($chk==="1"){
        $chk_i="0";
        $m="미수행버킷";
    }else{
        $chk_i ="1";
        $m="수행버킷";
    }
    if($date === "1"){
        if($flg === "1"){       
            $flg_msg= "과거 10년 버킷의 ";
        } else {    
            $flg_msg="과거 1년의 ";
        }    
    }else{
        if($flg === "1"){       
            $flg_msg= "10년 버킷의 ";
        } else {    
            $flg_msg="올해의 ";
        }    
    }   
    if($chk === "1"){     
        $chk_msg  = "수행완료 리스트";
    } else {    
        $chk_msg  = "미수행 리스트";
    }
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
    <div class="main_frame center">
        <!-- 1번그리드 header -->
        <div class="grid_item">        
            <?php
                require_once(FILE_HEADER);
                ?>
        </div>
        <!-- 2번 그리드 왼쪽여백 -->
        <div class="grid_item">        
        </div>
        
        <!-- 3번그리드 main , sub그리드  -->
        <div class="grid_item">
            <div class="sub_frame">
                <!-- sub1 좌측 -->
                <div class="sub_grid_item flex list_table_side">               
                    <?php
                        if($flg === "1"){ 
                    ?>
                        <a href="/1105test/src/list.php/?flg=0&chk=<?php echo $chk ?>&date=<?php echo $date ?>">1년 버킷</a>
                    <?php
                        } else {
                    ?>
                        <a href="/1105test/src/list.php/?flg=1&chk=<?php echo $chk ?>&date=<?php echo $date ?>" >10년 버킷</a>
                    <?php
                        }
                    ?>
                    <a href="/1105test/src/insert.php" data-hover="글작성">글작성</a>
                </div>

                <!-- sub2 메인 -->
                <div class="sub_grid_item list_content_flex list_table_center">
                    <div>
                        <div class="list_div_header">
                            <?php echo $flg_msg.$chk_msg ?>
                        </div>
                        <div class="list_div" id="list_div_header">
                            <div>
                                <div>
                                    ID
                                </div>
                                <div>
                                    수행일자
                                </div>      
                            </div>
                            <div>                  
                                내용
                            </div>
                            <div>
                                <div>
                                기한
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if(!$result){
                    ?>
                        <span class="list_sel_none">등록된 리스트가 없습니다.</span>
                    <?php
                        } else { 
                    ?>        
                    <?php
                            foreach ($result as $item) {
                    ?>
                    <div class=list_div>
                        <div>
                            <div>
                                <?php echo $item["id"]; ?>
                            </div>
                            <?php 
                                if($date === "1"){
                                    if($chk === "1"){       
                            ?>  
                                <div>
                                    <span>
                                        <?php echo $item["chk_date"] ?>
                                    </span>              
                                </div>
                            <?php
                                } else {
                            ?>
                                <div>
                                    <span>
                                        미수행
                                    </span> 
                                </div>
                            <?php
                                }
                            ?>
                            <?php
                            } else {
                                if($chk === "1"){       
                            ?>  
                                <div>
                                    <span>
                                        <?php echo $item["chk_date"] ?>
                                    </span>              
                                </div>
                            <?php
                                } else {
                            ?>
                                <div>
                                    <a href="/1105test/src/chk_flg.php/?id=<?php echo $item["id"]; ?>&flg=<?php echo $flg ?>&page=<?php echo $page_num ?>&chk=0>&chk_flg=0&date=<?php echo $date ?>">
                                        수행처리
                                    </a>
                                </div>
                            <?php
                                }}
                            ?>  
                            </div>
                        <div>                  
                            <a class="list_content" href="/1105test/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>">
                                <?php echo $item["content"]; ?>
                            </a>
                        </div>
                        <div>
                            <div>
                                <?php echo $item["write_date"]."\n"; ?>
                                ~
                                <?php echo "\n".$item["to_date"]; ?>
                            </div>
                            <form action="/1105test/src/delete.php" method="post" name="list_del<?php echo $item["id"]; ?>">
                                <input type="hidden" name="id" value="<?php echo $item["id"]; ?>">
                                <input type="hidden" name="chk" value="<?php echo $chk; ?>">
                                <input type="hidden" name="page" value="<?php echo $page_num; ?>">
                                <input type="hidden" name="flg" value="<?php echo $flg; ?>">
                                <input type="hidden" name="date" value="<?php echo $date; ?>">
                                <button class="list_del_btn center" onclick="return start(<?php echo $item["id"]; ?>)"> 
                                    <img class="list_del_img" src="/1105test/src/img/trash_can.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                        }}
                    ?>
                    <section class="list_page_num">
                        <?php
                            if($boards_cnt > 21){
                        ?> 
                        <a href="/1105test/src/list.php/?page=1&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>"><<</a>
                        <?php
                            }
                        ?>      
                        <a href="/1105test/src/list.php/?page=<?php echo $prev_page_num ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>"><</a>
                        <?php
                            if($boards_cnt < 21){
                                for ($i = 1; $i <= max($max_page_num,1); $i++) {
                                    $class = ($i == $page_num) ? "list_now_page" : "";
                                    if($boards_cnt < 5){
                                        $i = 1;
                                    }    
                        ?>
                                    <a class=" <?php echo $class; ?> " href="/1105test/src/list.php/?page=<?php echo $i ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>"><?php echo $i ?></a>        
                        <?php
                                }
                            }
                            else if($boards_cnt >= 21){
                                for ($i = $min_page; $i <= $max_page; $i++) {
                                    $class = ($i == $page_num) ? "list_now_page" : "";
                                    ?>
                                    
                                    <a class="page_btn <?php echo $class; ?> " href="/1105test/src/list.php/?page=<?php echo $i ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>"><?php echo $i ?></a>
                        <?php
                                }
                            }             
                        ?>
                        <a  href="/1105test/src/list.php/?page=<?php echo $next_page_num ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>">></a>
                        <?php
                            if($boards_cnt > 21){
                        ?> 
                        <a href="/1105test/src/list.php/?page=<?php echo $max_page_num ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>">>></a>                    
                        <?php
                            }
                        ?>
                    </section>
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item list_table_side flex">
                    <a href="/1105test/src/list.php/?page=1&flg=<?php echo $flg ?>&chk=<?php echo $chk_i ?>&date=<?php echo $date ?>">
                        <?php echo $m ?>
                    </a>
                    <a href="/1105test/src/list.php/?page=1&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date_i ?>">
                        <?php echo $date_m ?>
                    </a>
                </div>
            </div>
        </div>
        <!-- 4번그리드 왼쪽여백 -->
        <div class="grid_item">        
        </div>
    </div>
    <script src="/1105test/src/js/1105.js"></script>
</body>
</html>