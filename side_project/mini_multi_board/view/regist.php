<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>회원가입페이지</title>
</head>
<body class="vh-100 vw-100">
    <?php require_once("view/inc/header.php"); ?>

    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 400px;" action="/user/regist" method="POST">
        <div id="errorMsg" class="form-text text-danger">
            <?php echo count($this->arrErrorMsg) > 0 ? implode("<br>",$this->arrErrorMsg) : "" ?>
        </div>
            <div class="mb-3">
                <label for="u_id" class="form-label">ID</label>
                <input type="text" class="form-control" id="u_id" name="u_id" minlength="8" maxlength="20" value="<?php isset($_POST["u_id"])? $_POST["u_id"]:"" ?>">
            </div>
            <button type="button" onclick="chkId(); return false" id="id_chk" class="btn btn-secondary mb-2">아이디확인</button>
            <span id="idChkMsg"></span>
            <div class="mb-3">
                <label for="u_pw" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="u_pw" name="u_pw" minlength="8" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="u_pw_chk" class="form-label">비밀번호확인</label>
                <input type="password" class="form-control" id="u_pw_chk" name="u_pw_chk" minlength="8" maxlength="20">
            </div>
            <div class="mb-3">
                <label for="u_pw" class="form-label">이름</label>
                <input type="text" class="form-control" id="u_name" name="u_name" minlength="2" maxlength="50" value="<?php isset($_POST["u_name"])? $_POST["u_name"]:"" ?>">
            </div>
            <a href="/user/login" class="btn btn-secondary">취소</a>
            <button type="button" id="s_btn" class="btn btn-dark float-end">가입</button>
        </form>
    </main>

    <footer class="fixed-bottom bg-dark text-light text-center p-3">
        저작권
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/view/js/common.js"></script>
</body>
</html>