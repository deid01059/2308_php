<?php
require_once("../ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);

try{
    $sql_sel = " SELECT "
            ." emp.emp_no "
            ." FROM "
            ." employees emp "
            ." WHERE NOT EXISTS "
            ." ( "
            ." SELECT 1 "
            ." FROM "
            ." titles ti "
            ." WHERE "
            ." emp.emp_no = ti.emp_no "
            ." ); "
            ;

    // prepared Statement 셋팅
    $arr_ps = [
    ];


    $stmt = $conn->prepare($sql_sel);
    $stmt->execute($arr_ps);
    $resert = $stmt->fetchall();

    print_r($resert);

    $sql_in = " INSERT INTO "
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
        ." ,99990101 "
        ." ); "
        ;
    foreach($resert as $item){
        $arr_ps = [
                ":emp_no" => $item["emp_no"]
                ,":title" => "green"
        ];
        $stmt = $conn->prepare($sql_in);
        $result = $stmt->execute($arr_ps);
        if(!$resert){
            throw new Exception("insert error");
        }
    }    
    $conn->commit();
    echo "insert SUCCESS";
} catch(Exception $e){
    $conn->rollback();
} finally {
    $conn = null;
}

















?>