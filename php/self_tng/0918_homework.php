<?php

require_once("../ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);


// 1번
// $sql =
// " INSERT INTO "
//     ." employees ( "
// 	." emp_no "
// 	." ,birth_date "
// 	." ,first_name "
// 	." ,last_name "
// 	." ,gender "
// 	." ,hire_date "
//     ." ) "
// ." VALUES ( "
//     ." :emp_no "
//     ." ,:emp_birth_date "
//     ." ,:emp_first_name "
//     ." ,:emp_last_name "
//     ." ,:emp_gender "
//     ." ,:emp_hire_date "
//     ." ); ";

// $arr_ps = [
//     ":emp_no" => 500001
//     ,":emp_birth_date" => 19981023
//     ,":emp_first_name" => "junghoon"
//     ,":emp_last_name" => "choi"
//     ,":emp_gender" => "M"
//     ,":emp_hire_date" => "20230918"
// ];
// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);

// $conn -> commit();

// var_dump($result);

// $conn = null;



// 2번 
// $sql = 
//     " UPDATE "
//     ." employees "
//     ." SET "
//     ." first_name = :first_name "
//     ." , "
//     ." last_name = :last_name "
//     ." WHERE emp_no = :emp_no; ";
        
// $arr_ps = [
//     ":first_name" => "dully"
//     ,":last_name" => "hoi"
//     ,":emp_no" => 500001
//     ];
// $stmt = $conn->prepare($sql);
// $result = $stmt->execute($arr_ps);

// $conn -> commit();

// var_dump($result);

// $conn = null;


// 3번 문제
// $sql = " SELECT " 
//         ."   * "
//         ." FROM "
//         ." employees "
//         ." WHERE "
//         ." emp_no = :emp_no "
//         ;

// // prepared Statement 셋팅
// $arr_ps = [
//     ":emp_no" => 500001
// ];


// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $resert = $stmt->fetchall();

// print_r($resert);

// $conn = null;


// 4번
$sql = " DELETE "
        ." FROM " 
        ." employees "
        ." WHERE "
        ."  emp_no = :emp_no; "
        ;
$arr_ps = [
    ":emp_no" => "500001"
];

$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount();
var_dump($res_cnt);
if($res_cnt >= 2){
    $conn -> rollBack();
}else{
$conn -> commit(); 
}
$conn = null; 



?>