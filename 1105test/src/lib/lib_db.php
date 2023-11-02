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
    $db_name = "bcd"; // DB name
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
// 함수명   : db_select_lists_paging
// 기능     : 리스트 조회 밑 페이징
// 파라미터 : PDO  &$conn
// 리턴     : 없음
// -------------------------------
function db_select_lists_paging(&$conn, &$arr_param){
    $chk = $arr_param["chk"]==="1" ? " NOT NULL " : " NULL ";
    $date = $arr_param["date"]==="1" ? " > " : " <= ";
        $sql =
        " SELECT "
        ."      id "
        ."      ,write_date "
        ."      ,content " 
        ."      ,to_date "
        ."      ,chk_date"
        ." FROM "
        ."      lists " 
        ." WHERE "
        ."      del_date IS NULL "
        ." AND "
        ."      chk_date IS " . $chk
        ." AND "
        ."      ten_flg = :flg "
        ." AND "
        ."      :now ".$date." to_date "
        ." ORDER BY "
        ."      id DESC "
        ."      LIMIT :list_cnt "  
        ."      OFFSET :offset "
        ;
        $arr_ps = [
            ":list_cnt" => $arr_param["list_cnt"]
            ,":offset" => $arr_param["offset"]
            ,":flg" => $arr_param["flg"]
            ,":now" => $arr_param["now"]
        ];
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchALL();
        return $result; //정상
    } catch(Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생
    }
}


// -------------------------------
// 함수명   : db_select_boards_cnt
// 기능     : DB insert
// 파라미터 : PDO       &$conn
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : int / false
// -------------------------------

function db_select_lists_cnt( &$conn, &$arr_param ){
    $chk = $arr_param["chk"]==="1" ? " NOT NULL " : " NULL ";
    $date = $arr_param["date"]==="1" ? " > " : " <= ";
        $sql =
        " SELECT "
        ."      count(id) as cnt "
        ." FROM "
        ."      lists "
        ." WHERE "
        ."      del_date IS NULL "
        ." AND "
        ."      chk_date IS " . $chk
        ." AND "
        ."      ten_flg = :flg "
        ." AND "
        ."      :now ".$date." to_date "
        ;
        $arr_ps = [
            ":flg" => $arr_param["flg"]
            ,":now" => $arr_param["now"]
        ];

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchALL();

        return (int)$result[0]["cnt"]; //정상 : 쿼리 결과 리턴
    } catch(Exception $e){
        echo $e->getMessage(); // Exception 메세지 출력
        return false; //예외발생 : false리턴
    }
}


//  ---------------------------------------------
//  함수명 db_select_boards_id
//  기능 : 디테일 데이터 조회
//  파라미터 : pdo &$conn
//			&$arr_param 	
// -----------------------------------------------
function db_select_boards_id( &$conn, &$arr_param) {
    $sql =
    " SELECT "
    ."      content "
    ."      ,write_date"
    ."      ,chk_date"
    ."      ,to_date "
    ."      ,up_date "
    ." FROM "
    ."      lists "
    ." WHERE "
    ."      id = :id "
    ." AND "
    ."      del_date is NULL "
    ;
    $arr_ps = [
    ":id" => $arr_param["id"]
    ];
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage(); //예외 메세지 출력
    } 
}


// --------------------------------
// 함수명    : db_update_boards_id
// 기능      : boards 레코드 작성
// 파라미터  : PDO    &$conn
//            Array    &$arr_param 쿼리 작성용 배열
// 리턴      : boolean
// --------------------------------

function db_update_boards_id(&$conn, &$arr_param) {
    $sql = 
        " UPDATE "
        ."      lists "
        ." SET "
        ."      content = :content "
        ."      ,up_date = NOW() "
        ." WHERE "
        ."      id = :id "
        ;

        $arr_ps = [
            ":id" => $arr_param["id"]
            ,":content" => $arr_param["content"]
        ];

        try {
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute($arr_param);
            return $result;

        } catch (Exception $e) {
            echo $e->getMessage(); // Exception 메세지 출력
            return false; // 예외발생 : false
        }
}

//  ---------------------------------------------
//  함수명 db_delete_boards_id
//  기능 : 특정 id의 레코드 삭제처리
//  파라미터 : pdo &$conn
//			&$arr_param 	
// -----------------------------------------------


function db_delete_boards_id(&$conn, &$arr_param) {
	$sql =
	" UPDATE lists"
	." SET "
	." 		del_date = now() "
	." WHERE "
	." 		id = :id "
	;

	$arr_ps = [
		":id" => $arr_param["id"]
	];

	try {
		$stmt = $conn->prepare($sql);
		$result = $stmt->execute($arr_ps);
		return $result;
	} catch (Exception $e) {
		echo $e->getMessage();
		return false;
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
        ." lists( "
        ."      content "
        ."      ,to_date "
        ."      ,ten_flg "
        ." ) "
        ." VALUES ( "
        ."      :content "
        ."      ,:to_date "
        ."      ,:ten_flg "
        ." ) "
        ;
    $arr_ps = [
        ":content" => $arr_param["content"]
        ,":to_date" => $arr_param["to_date"]
        ,":ten_flg" => $arr_param["ten_flg"]
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
// 함수명   : db_update_chk_date
// 기능     : 수행완료된거 chk_date  NOW() 변경
// 파라미터 : PDO       &$conn 
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : boolean
//-------------------------------

function db_update_chk_date(&$conn, &$arr_param) {
    $test = $arr_param["flg"]==="0" ? " NOW() " : " NULL ";
    $sql =
        " UPDATE "
        ."      lists "
        ." SET " 
        ."      chk_date = " . $test
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
// 함수명   : db_update_chk_date1
// 기능     : 수행완료된거 chk_date NULL 변경
// 파라미터 : PDO       &$conn 
//           Array      &arr_param 쿼리 작성용 배열
// 리턴     : boolean
//-------------------------------

// function db_update_chk_date1(&$conn, &$arr_param) {
//     $sql =
//         " UPDATE "
//         ."      lists "
//         ." SET "
//         ."      chk_date = NULL "
//         ." WHERE "
//         ."      id = :id "
//     ;

//     $arr_ps = [
//         ":id" => $arr_param["id"]
//     ];

//     try {
//         $stmt = $conn->prepare($sql);
//         $result = $stmt->execute($arr_ps);
//         return $result;  // 정상 : 쿼리 결과 리턴
//     } catch (Exception $e) {
//         echo $e->getMessage(); // Exception 메세지 출력
//         return false; // 예외발생 : false 리턴
//     }
// }
















?>