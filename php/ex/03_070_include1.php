<?php

// php 파일간 연결문(rink 같은느낌) 




// include : 해당 파일을 불러옵니다. 오류발생시 프로그램을 정지하지 않습니다.
include("./02_070_include2.php");

// require : 해당 파일을 불러옵니다. 오류발생시 프로그램을 정지합니다.
require("./02_070_include2.php");

// include_once : 해당 파일을 불러오고 중복으로 불러올시 중복값은 없애줍니다. 오류발생시 프로그램을 정지하지 않습니다.
include_once("./02_070_include2.php");

// require_once : 해당 파일을 불러오고 중복으로 불러올시 중복값은 없애줍니다. 오류발생시 프로그램을 정지합니다.
require_once("./02_070_include2.php");




echo "include 11111\n";











?>