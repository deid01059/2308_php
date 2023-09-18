<?php

require_once("../ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);

$sql =
" INSERT INTO "
    ." employees ( "
	." emp_no "
	." ,birth_date "
	." ,first_name "
	." ,last_name "
	." ,gender "
	." ,hire_date "
    ." ) "
." VALUES ( "
    ." :emp_no "
    ." ,:emp_birth_date "
    ." ,:emp_first_name "
    ." ,:emp_last_name "
    ." ,:emp_gender "
    ." ,:emp_hire_date "
    ." ); ";

$arr_ps = [
    ":emp_no" => 500001
    ,":emp_birth_date" => 19981023
    ,":emp_first_name" => "junghoon"
    ,":emp_last_name" => "choi"
    ,":emp_gender" => "M"
    ,":emp_hire_date" => "20230918"
];

$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$conn -> commit();

var_dump($result);

$conn = null;


?>