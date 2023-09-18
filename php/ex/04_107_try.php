<?php


require_once("./04_107_fnc_db_connect.php");


// // try-catch문 : 예외처리를 하기위한 문법
// try{
//     // 우리가 실행하고 싶은 소스코드를 작성
// }
// catch( Exception $e ){
//     // 예외가 발생 했을 때 실행되는 소스코드를 작성
// }
// finally{
//     // 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드를 작성
// }



$conn = null;

try{
$conn = null;
my_db_conn($conn);


// SQL 작성
echo "트라이";
$sql = " SELEC " 
        ."   * "
        ." FROM "
        ." employees "
        ." WHERE "
        ." emp_no = :emp_no "
        ;

// prepared Statement 셋팅
$arr_ps = [
    ":emp_no" => 10004
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$resert = $stmt->fetchall();

print_r($resert);

} catch(Exception $e) {
    echo "예외발생 : {$e ->getMessage()}";
} finally {

db_destroy_conn($conn);
echo "파이널리";
}



















?>