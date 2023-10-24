<?php

// -------------------------------
// 함수명   : my_db_conn
// 기능     : DB Connect
// 파라미터 : PDO    &$conn
//           Array  &$arr_param
// 리턴     : boolen
// -------------------------------


function my_db_conn( &$conn ) {
    $db_host    = "localhost"; // host
    $db_user    = "root"; // user
    $db_pw      = "php504"; // password
    $db_name = "chimhaha"; // DB name
    $db_charset = "utf8mb4"; // charset
    $db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

try {
    $db_options = [
        // DB의 prepared Statement 기능을 사용하도록 설정
        PDO::ATTR_EMULATE_PREPARES      => false
        // PDO Exception을 Throws하도록 설정
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        // 연상배열로 Fetch를 하도록 설정
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];

    // PDO Class로 DB 연동
    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
    return true;
    }catch (Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        $conn = null;
        return false;
    }
}


// -------------------------------
// 함수명   : db_destroy_conn
// 기능     : DB Destroy
// 파라미터 : PDO  &$conn
// 리턴     : 없음
// -------------------------------

// DB 파기
function db_destroy_conn(&$conn){
    $conn = null;
}


// -------------------------------
// 함수명   : db_select_boards_paging
// 기능     : boards paging 조회
// 파라미터 : PDO  &$conn
// 리턴     : Array /false
// -------------------------------
function db_select_boards_paging(&$conn, &$arr_param){
    try {
        $sql =
        " SELECT "
        ."      id "
    ."          ,title "
        ."      ,write_date "
        ." FROM "
                ." board "
        ." WHERE "
        ."      delete_flg = '0' " 
        ." ORDER BY "
        ."      id DESC "
        ."      LIMIT :list_cnt " 
        ."      OFFSET :offset "
        ;

        $arr_ps = [
            ":list_cnt" => $arr_param["list_cnt"]
            ,":offset" => $arr_param["offset"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchALL();
        return $result; //정상
    } catch(Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생
    }
}


function db_select_boards_cnt( &$conn ){
        $sql =
        " SELECT "
        ."      count(id) as cnt "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      delete_flg = '0' "
        ;
    try {
        $stmt = $conn->query($sql);
        $result = $stmt->fetchALL();

        return (int)$result[0]["cnt"]; //정상 : 쿼리 결과 리턴
    } catch(Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생 : false리턴
    }


}




// -------------------------------
// 함수명   : db_insert_boards
// 기능     : DB Destroy
// 파라미터 : PDO       &$conn
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : bool / false
// -------------------------------
function db_insert_boards(&$conn, &$arr_param){
    $sql =
        " INSERT INTO " 
        ." board( "
        ."      title "
        ."      ,content "
        ." ) "
        ." VALUES ( "
        ."      :title "
        ."      ,:content "
        ." ) "
        ;
    $arr_ps = [
        ":title" => $arr_param["title"]
        ,":content" => $arr_param["content"]
    ];

    try{
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result; // 정상 : 쿼리 결과 리턴
    } catch(Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외발생 : flase 리턴
    }


}

// -------------------------------
// 함수명   : db_select_boards_id
// 기능     : select_boards_id
// 파라미터 : PDO       &$conn &$arr_apram
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : array / false
// -------------------------------


function db_select_boards_id(&$conn, &$arr_param){
    $sql =
        " SELECT "
        ."    id "
        ."     ,title "
        ."     ,content "
        ."     ,write_date "
        ." FROM "
        ."     board "
        ." WHERE "
        ."     id = :id "
        ." AND "
        ."      delete_flg = '0' "
        ;
    $arr_ps = [
        ":id" => $arr_param["id"]
    ];
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchALL();
        return $result; // 정상 : 쿼리결과 리턴
    } catch (Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false;
    }  
}



// -------------------------------
// 함수명   : db_update_boards_id
// 기능     : boards 레코드 수정
// 파라미터 : PDO       &$conn 
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : boolean
// -------------------------------

function db_update_boards_id(&$conn, &$arr_param){
    $sql =
        " UPDATE " 
        ."      board "
        ." SET "
        ."      title = :title "
        ."      ,content = :content "
        ." WHERE "
        ."      id = :id; "
        ;
    $arr_ps = [
        ":title" => $arr_param["title"]
        ,":content" => $arr_param["content"]
        ,":id" => $arr_param["id"]
    ];   
    try{
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result; // 정상 : 쿼리 결과 리턴
    } catch(Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외발생 : flase 리턴
    }

}


// -------------------------------
// 함수명   : db_delete_boards_id
// 기능     : 특정 id의 레코드 삭제처리
// 파라미터 : PDO       &$conn 
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : boolean
// -------------------------------

function db_delete_boards_id(&$conn, &$arr_param) {
    $sql =
        " UPDATE "
        ."      board "
        ." SET "
        ."      delete_date = NOW() "
        ."      ,delete_flg = '1' "
        ." WHERE "
        ."      id = :id "
    ;

    $arr_ps = [
        ":id" => $arr_param["id"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        
        return $result;  // 정상 : 쿼리 결과 리턴
    } catch (Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외발생 : false 리턴
    }
}

// -------------------------------
// 함수명   : db_search_boards_title
// 기능     : search_boards_id
// 파라미터 : PDO       &$conn &$arr_apram
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : array / false
// -------------------------------

function db_search_boards_title(&$conn, &$arr_param)
{
    $sql =
    " SELECT "
    . "     id "
    . "     ,title "
    . "     ,content "
    . "     ,write_date "
    . " FROM "
    . "     board "
    . " WHERE "
    . "     title "
    . " LIKE "
    . " :title "
    . " AND "
    . "      delete_flg = '0' "
    ." ORDER BY "
    ."      id DESC "
    ." LIMIT :list_cnt " 
    ." OFFSET :offset ";

    $arr_ps = [
        "title"  => $arr_param["title"],
        ":list_cnt" => $arr_param["list_cnt"],
        ":offset" => $arr_param["offset"]
    ];
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result; // 정상 : 쿼리 결과 리턴
    } catch (Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false;
    }
}

// -------------------------------
// 함수명   : db_search_boards_cnt
// 기능     : 검색한 보드 카운트
// 파라미터 : PDO       &$conn
//           Array      &$arr_param
// 리턴     : int / false
// -------------------------------

function db_search_boards_cnt(&$conn, &$arr_param)
{
    $sql =
        " SELECT "
        . "      count(id) as cnt "
        . " FROM "
        . "      board "
        . " WHERE "
        . "     title "
        . " LIKE "
        . " :title "
        . " AND "
        . "      delete_flg = '0' "
        ;
        $arr_ps = [
            "title"  => $arr_param["title"]
        ];

        
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();

        return (int)$result[0]["cnt"]; // 정상 : 쿼리 결과 리턴
    } catch (Exception $e) {
        echo $e->getMessage(); // Exception 메세지 출력
        return false; // 예외 발생 : false 리턴
    }
}







?>