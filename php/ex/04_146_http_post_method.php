<?php

// post Method
//  request 할때 데이터를 외부에서 볼 수가 없다

print_r($_POST);


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
    <form action="/04_146_http_post_method.php" method="post">
        <fieldset>        
            <label for="id">ID : </label> 
            <input type="text" id="id" name="id" maxlength="15" required placeholder="ID를 입력하세요">
            <br>
            <label for="pw">PW : </label> 
            <input type="password" id="pw" name="pw" maxlength="15" required placeholder="PW를 입력하세요">
            <button type="submit">전송</button>
        </fieldset>
    </form>
</body>
</html>