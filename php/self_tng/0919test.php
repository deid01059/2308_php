<?php

$arr = [
    [
        "emp_no" =>10001
        ,"gender" =>"F"
    ]
    ,
    [
        "emp_no" =>10002
        ,"gender" =>"M"
    ]
];

foreach($arr as $key =>$item){
    if($item["gender"] === "M"){
    echo $item["emp_no"];
    }
}
?>