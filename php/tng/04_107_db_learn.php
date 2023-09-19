<?php

//1 db_conn 이라는 함수를 만들어주세요.
//      1-1 기능 : db설정 및 pdo객체 생성


function db_conn( &$conn ) {
$db_host    = "localhost"; 
$db_user    = "root";
$db_pw      = "php504"; 
$db_name = "employees"; 
$db_charset = "utf8mb4";
$db_dns     = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;


$db_options = [
    PDO::ATTR_EMULATE_PREPARES      => false
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
];

$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}


// 2. 사원별 현재 급여가 80000이상인 사람 조회하기


$conn = null;
db_conn($conn);
$sql = 
" select "
." sal.salary "
." ,sal.emp_no "
." from "
." salaries sal "
." where "
." to_date >= now() "
." and "
." salary >= :sal "
;
$arr_ps = [
    ":sal" => 80000
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$resert = $stmt->fetchall();

// print_r($resert);

$conn = null;


// 3. 조회한 데이터를 루프하면서 급여가 100,000이상인 사원 번호 출력해 주세요.
$cnt = 0;
foreach($resert as $key =>$item){
    if($item["salary"] >= 100000){
        echo $item["emp_no"],"\n";
        $cnt++;
    }
}


echo $cnt;





?>