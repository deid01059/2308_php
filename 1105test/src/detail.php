<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id = "";
$conn = null;
$page = "";
$flg = "";
$chk = "";
$date = "";

try {
    if(isset($_GET["id"])){
        $id=$_GET["id"]; //id 셋팅
	} else {
        throw new Exception("Parameter ERROR : NO id"); //강제 예외 발생
	}
    if(isset($_GET["page"])){
        $page=$_GET["page"]; //id 셋팅
	} else {
        throw new Exception("Parameter ERROR : NO page"); //강제 예외 발생
	}
    if(isset($_GET["chk"])){
        $chk=$_GET["chk"]; //id 셋팅
	} else {
        throw new Exception("Parameter ERROR : NO chk"); //강제 예외 발생
	}
    if(isset($_GET["flg"])){
        $flg=$_GET["flg"]; //id 셋팅
	} else {
        throw new Exception("Parameter ERROR : NO flg"); //강제 예외 발생
	}
    if(isset($_GET["date"])){
        $date=$_GET["date"]; //id 셋팅
	} else {
        throw new Exception("Parameter ERROR : NO date"); //강제 예외 발생
	}
    // DB 접속
    if(!my_db_conn($conn)){
        // DB Instance 에러
        throw new Exception("DB Error : PDO instance"); //강제예외발생 : DB Insrance
    }
    $arr_param = [
		"id" => $id
	];
	$result=db_select_boards_id($conn, $arr_param);
    if(!$result) {
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)){
		throw new Exception("DB Error : PDO Select_id count," .count($result));
	}
    $item=$result[0];


    $from = new DateTime($item["write_date"]);
    $to = new DateTime($item["to_date"]);
    $total = $from -> diff( $to ) -> days;

    $to_ = strtotime($to->format('Y-m-d H:i:s'));
    $from_ = strtotime($from->format('Y-m-d H:i:s'));
    if($chk ==="1"){
        $total = "!!!수행완료!!!";
    }else{  
        if($to_>$from_){
            $total = "남은기한 : ".$from -> diff( $to ) -> days." 일";
        }
        else if($to_ === $from_){
            $total = "D-DAY";
        }
        if($to_<$from_){
            $total = "수행실패...";
    }
    }
    $chk_date1 = $item["chk_date"];
    $chk_date = isset($chk_date1)? $chk_date1 : "미수행 버킷 입니다";
    $up_date1 = $item["up_date"];
    $up_date = isset($up_date1)? $up_date1 : "없음";
} catch (Exception $e) {
	echo $e->getMessage(); //예외 메세지 출력
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
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>디테일페이지</title>
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
                <!-- sub1 좌상단 -->
                <div class="sub_grid_item detail_flex_side">      
                    <section>
                        <?php
                            if($to_<$from_){
                        ?>  
                            <div>
                                현재시간
                                <div id="insert_time"></div>
                            </div>
                        <?php
                            } else {
                            if($chk_date === "미수행 버킷 입니다"){
                        ?>
                            <a href="/1105test/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>" class="detail_a">
                                수정
                            </a>
                        <?php
                            } else {
                        ?>
                            <a href="/1105test/src/chk_flg.php/?id=<?php echo $id; ?>&flg=<?php echo $flg ?>&page=<?php echo $page ?>&chk=0&chk_flg=1" class="detail_a">
                                미수행으로 변경
                            </a>
                        <?
                            }}
                        ?>
  
                    </section>         
                </div>

                <!-- sub2 메인 -->
                <div class="sub_grid_item detail_flex">
                        <div>
                            수행일 : <?php echo $chk_date; ?>
                        </div>
                        <div>
                            작성일 : <?php echo $item["write_date"]; ?>
                        </div>
                        <div>
                            내용 : <?php echo $item["content"]; ?>
                        </div>
                        <div>
                            기한 : <?php echo $item["to_date"]; ?>
                            <p>
                                <?php echo $total ?>
                            </p>
                        </div>          
                        <a href="/1105test/src/list.php/?page=<?php echo $page ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>" class="detail_a">나가기</a>
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item detail_flex_side">
                    수정날짜
                    <span>
                        <?php echo "\n".$up_date; ?>
                    </span>
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