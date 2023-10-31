<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105test/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s을 입력해주세요.");
require_once(ROOT."lib/lib_db.php");

// POST로 request가 왔을 때 처리 
$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 확인
$arr_err_msg= []; //에러 메세지 저장용
$flg = "";
$content = "";
$to_date = "";
$ten_flg = "";

$Year = date("Y");

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









if($http_method === "POST"){
    try {
        $flg = isset($_POST["flg"]) ? trim($_POST["flg"]) : "";
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; //content 셋팅

        if($flg === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "수행기한");
        }       
        if($content === ""){
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }
        
        if($flg === "0"){
            $to_date = ($Year + 1)."0101";
            $ten_flg = "0";
        } else if($flg === "1"){
            $to_date = ($Year + 10)."0101";
            $ten_flg = "1";
        }

        if(count($arr_err_msg) === 0){
            // DB 접속
            if(!my_db_conn($conn)){
                // DB Instance Error
                throw new Exception("DB Error : PDO Instance");
            }
            $conn->beginTransaction(); // 트랜잭션 시작
            
            $arr_param = [
                "ten_flg" => $ten_flg
                ,"content" => $content
                ,"to_date" => $to_date
            ];

            // insert
            if(!db_insert_boards($conn, $arr_param)) {
                // DB Insert 에러
                throw new Exception("DB Error : Insert Boards");
            }

            $conn->commit(); // 모든 처리 완료시 커밋

            // 리스트 페이지로 이동
            header("Location: list.php/?flg=$flg");
            exit;
        }
    } catch(Exception $e) {
        if($conn !== null){
            $conn->rollBack();
        }
        echo $e->getMessage(); //예외발생 메세지 출력  //v002 del
        exit; //처리종료
    } finally {
        db_destroy_conn($conn); // DB 파기
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105test/src/css/style.css">
    <title>작성 페이지</title>
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
                <div class="sub_grid_item insert_flex_side">  
                    <div>
                        현재시간
                        <div id="insert_time"></div>
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
                <div class="sub_grid_item ">       
                    <form action="/1105test/src/insert.php" method="post" class="insert_flex">
                        <select name="flg" class="insert-select">
                            <option value="0">1년</option>
                            <option value="1">10년</option>
                        </select>    
                        <textarea class="insert-area" name="content" id="content" cols="30" rows="10" maxlength="50" spellcheck="false"><?php echo $content ?></textarea>
                        <section>
                            <button type="submit" class="insert_btn">작성</button>
                            <a href="/1105test/src/list.php" class="insert_can">취소</a>      
                        </section>
                    </form> 
                </div>
                <!-- sub3 우측 -->
                <div class="sub_grid_item insert_flex_side1 insert_right">
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
    <script src="/1105test/src/js/1105.js"></script>
</body>
</html>