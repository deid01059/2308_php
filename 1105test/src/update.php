<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
require_once(ROOT."lib/lib_db.php");

$id = ""; // 변수에 값을 담기 위해 공백으로 설정
$page = "";
$conn = null; // conn 초기화 // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= []; //에러메세지용 변수를 배열로 넣어줌
$flg = "";
$chk = "";



$msg = [
    "도전 없이는 성취도 없다. - Benjamin Franklin"
    ,"오직 도전을 통해 자신이 무엇을 할 수 있는지 알 수 있다. - Marie Curie"
    ,"우리가 정복한 것은 산이 아니라 우리 자신이다. - Sir Edmund Hillary "
    ,"불가능한 것을 도전하면 가능성의 세계로 이끄는 문이 열린다. - Joel Brown"
    ,"인생은 계속해서 도전하는 것이다. 도전을 멈추면 성장도 멈춘다. - John Maxwell"
    ,"만약 도전이 너무 커 보인다면, 그것은 네게 완벽한 도전이다. - Dean Karnazes"
    ,"믿음이 부족하기 때문에 도전하길 두려워하는 바, 나는 스스로를 믿는다. - Muhammad Ali"
    ,"시도 했는가? 실패했는가? 괜찮다. 다시 시도하라 다시 실패하라. 더 나은 실패를 하라 - Samuel Beckett"
    ,"대면한다고 해서 모든 것이 바뀔 수는 없지만, 맞서 대면하지 않으면 아무것도 바꿀 수 없다. - James Arthur Baldwin"
    ,"가장 큰 위험은 위험없는 삶이다. - Stephen Richards Covey"
];
$rand_num= rand(0,9);

try {
    // DB 연결
        if(!my_db_conn($conn)) {
        // DB Instance 에러
            throw new Exception("DB Error : PDO Instance");
        }    

    // GET Method의 경우
    if($http_method === "GET") {
        
        // 파라미터 획득
        $id = isset($_GET["id"]) ? trim($_GET["id"]) :""; // id 셋팅
        $page = isset($_GET["page"]) ? trim($_GET["page"]) : ""; // page 셋팅
        $flg = isset($_GET["flg"]) ? trim($_GET["flg"]) : ""; // flg 셋팅
        $chk = isset($_GET["chk"]) ? trim($_GET["chk"]) : ""; // chk 셋팅
        $date = isset($_GET["date"]) ? trim($_GET["date"]) : ""; // date 셋팅
        
        
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
        // 게시글 수정을 위해 파라미터 셋팅
        // content 수정칸에 스페이스바 공백을 넣으면 에러 뜨게하고 막아둔 것은 
        // 이대로 입력 돼 버리면 유저가 눌러서 수정을 할수도 삭제도 할 수 없고 
        // 오늘의 할일을 적는 것이기 때문에 빈 값으로 수정되면 안된다.
         
        $id = isset($_POST["id"]) ? trim($_POST["id"]) :""; // id 셋팅
        $page = isset($_POST["page"]) ? trim($_POST["page"]) : ""; // page 셋팅
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content셋팅
        if($id === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
        }       
        if($page === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }
        if(count($arr_err_msg) === 0){
            if($flg === ""){
                $flg = "0";
            }
            if($chk === ""){
                $chk = "0";
            }
            $arr_param = [
                "id" => $id
                ,"content" => $content
            ];

            // 게시글 수정 처리
            $conn->beginTransaction(); // 트랜잭션 시작

            if(!db_update_boards_id($conn, $arr_param)) { 
                throw new Exception("DB Error : Update_boards_id");
            }
            $conn->commit(); // commit
            header("Location: detail.php/?id={$id}&page={$page}&chk={$chk}&flg={$flg}"); // detail 페이지로 이동
            exit;
        }
    }

      // 게시글 데이터 조회를 위한 파라미터 셋팅
      $arr_param = [
        "id" => $id
    ];

    // 게시글 데이터 조회
    $result = db_select_boards_id($conn, $arr_param);

    // 게시글 조회 예외처리
    if($result === false) {
        // 게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");
    } else if(count($result) !== 1) {
        // 게시글 조회 count 에러
        throw new Exception("DB ERROR : PDO Select_id Count,".count($result));
    }
    $item = $result[0];
    $chk_date1 = $item["chk_date"];
    $chk_date = isset($chk_date1)? $chk_date1 : "미수행 상태";

} catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollBack(); // rollback
    }
    echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리종료

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
                <!-- sub1 좌측 -->
                <div class="sub_grid_item update_flex_side">  
                    <div>
                        <div>     
                            -현재상태-
                        </div>
                        <?php echo $chk_date; ?>
                    </div>
                    <?php
                        foreach($arr_err_msg as $val){
                    ?> 
                        <p class="error_p"><?php echo $val ?></p>
                    <?php        
                        }
                    ?>             
                </div>

                <!-- sub2 메인 -->
                <div class="sub_grid_item">
                    <form action="/1105test/src/update.php" method="post" class="update_flex">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="hidden" name="page" value="<?php echo $page ?>"> 
                        <div class="update_date_msg">
                            시작일 : <?php echo $item["write_date"]; ?>
                                <div>~</div>
                            종료일 : <?php echo $item["to_date"]; ?>
                        </div>
                        <textarea class="update_area" name="content" id="content" cols="30" rows="2" maxlength="30" required spellcheck="false"><?php echo $item["content"] ?></textarea>
                        <div>
                            <button class="update_btn" type="submit">완료</button>
                            <a class="update_can" href="/1105test/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>&flg=<?php echo $flg ?>&chk=<?php echo $chk ?>&date=<?php echo $date ?>">취소</a>
                        </div>
                    </form>
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item update_flex_side1 update_right">
                    <?php echo $msg[$rand_num]; ?>
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