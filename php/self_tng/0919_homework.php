<?php
require_once("../ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);

$sql = " SELECT "
        ." * "
        ." FROM "
        ." employees emp "
        ." WHERE emp.emp_no "
        ." NOT IN "
        ." ( SELECT ti.emp_no FROM titles ti); "
        ;

// prepared Statement 셋팅
$arr_ps = [
];


$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$resert = $stmt->fetchall();

print_r($resert);


$sql = " INSERT INTO "
." titles ( "
." emp_no "
." ,title "
." ,from_date "
." ,to_date "
." ) "
." VALUES ( "
." :emp_no "
." ,:title "
." ,now() "
." ,:to_date "
." ); ";

$a = 0;
foreach($resert as $item){
    $a = $item["emp_no"];

    $arr_ps = [
        ":emp_no" => $a
        ,":title" => "green"
        ,":to_date" => 99990101
    ];
    
    $stmt = $conn->prepare($sql);
    $result1 = $stmt->execute($arr_ps);
    
    var_dump($result1);
    
    $conn -> commit();
}

print_r($a)
// $arr_ps = [
//     ":emp_no" => $a
//     ,":title" => "green"
//     ,":to_date" => 99990101
// ];

// $stmt = $conn->prepare($sql);
// $result1 = $stmt->execute($arr_ps);

// $conn -> commit();

// var_dump($result1);

// $conn = null;


















?>