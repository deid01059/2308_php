<?php
    // print_r($_SERVER);
    print_r($_GET);
    print_r($_POST);












?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/99_03_edu.php" method="post">
        <label for="id">id</label>
        <input type="text" name="ID" id="id">
        <br>
        <label for="pw">pw</label>
        <input type="password" name="PW" id="pw">
        <input type="hidden" name="name" value="미어캣">
        <br>
        <button type="submit">전송</button>
    </form>
</body>
</html>