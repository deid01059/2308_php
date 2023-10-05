<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_test/src/css/mini_test.css">
    <title>작성페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <main class="frame menu SMN_effect-13">
        <p>뭐....그렇게 됐수다</p>
        <p>미안하오</p>
        <br>
        <p>Code : <?php echo $err_msg ?></p>
        <br>
        <a href="/mini_test/src/list.php">메인으로이동</a>
    </main>
</body>
</html>