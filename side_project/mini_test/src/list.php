<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");







?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test">
    <title>메인페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
</body>
</html>