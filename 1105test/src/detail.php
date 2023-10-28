<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id = "";
$conn = null;
$page = "";
$flg = "";
$chk = "";

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
    $chk_date1 = $item["chk_date"];
    $chk_date = isset($chk_date1)? $chk_date1 : "미수행 상태";
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
                <div class="sub_grid_item">               
                </div>

                <!-- sub2 메인 -->
                <div class="sub_grid_item">
                    <div>
                        <?php echo $chk_date; ?>
                        <?php echo $item["write_date"]; ?>
                        <?php echo $item["content"]; ?>
                        <?php echo $item["to_date"]; ?>
                        <?php echo $up_date; ?>
                    </div>
                    <section>
                        <a href="/1105test/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>">수정</a>
                        <a href="/1105test/src/list.php/?page=<?php echo $page ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>">나가기</a>
                    </section>
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item">
                </div>
            </div>
        </div>
        <!-- 4번그리드 왼쪽여백 -->
        <div class="grid_item">        
        </div>
        
        <!-- 5번그리드 footer -->
        <div class="grid_item">
        </div>
    </div>
</body>
</html>