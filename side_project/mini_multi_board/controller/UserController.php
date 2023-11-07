<?php

namespace controller;

use model\UserModel as UM;
class UserController extends ParentsController{
    // 로그인
    protected function loginGet(){
        return "view/login.php";
    }

    
    // 로그인처리
    protected function loginPost(){
        // ID,PW 설정(DB에서 사용할 데이터 가공)
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"];
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        $modelUser = new UM();
        $resultUserInfo = $modelUser->getUserInfo($arrInput, true);

        // 유저 유무 체크
        if(count($resultUserInfo) === 0){
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
            // 로그인 페이지로 리턴
            return "view/login.php";
        }
        
        // 세션에 id 저장
        $_SESSION["u_pk"] = $resultUserInfo[0]["id"];
        
        return "Location: /board/list?b_type=0";
    }
    // 로그아웃처리
    protected function logoutGet(){
        session_unset();
        session_destroy();

        // 로그인 페이지 리턴
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동
    protected function registGet(){
        return "view/regist"._EXTENSION_PHP;
    }

    // 회원가입 처리
    protected function registPost(){
        $u_id = $_POST["u_id"];
        $u_pw = $_POST["u_pw"];
        $u_pw_chk = $_POST["u_pw_chk"];
        $u_name = $_POST["u_name"];

        $patt_id = "/^[a-zA-Z0-9]{8,20}$/";
        $patt_pw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patt_name = "/^([a-zA-Z가-힣]){2,50}$/u";
        if($u_pw !== $u_pw_chk){
            // 비밀번호 에러 처리
            $this->arrErrorMsg[] = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
        }

        if(preg_match($patt_id, $u_id, $match)===0){
            // id에러처리
            $this->arrErrorMsg[] = "아이디는 영어대소문자,숫자로 8~20자로 입력해주세요.";
        }
        if(preg_match($patt_pw, $u_pw, $match)===0){
            // pw에러처리
            $this->arrErrorMsg[] = "비밀번호는 영어대소문자,숫자,!,@로 8~20자로 입력해주세요.";
        }
        if(preg_match($patt_name, $u_name, $match)===0){
            // name에러처리
            $this->arrErrorMsg[] = "이름은 영어대소문자,한글 2~50자로 입력해주세요.";
        }

        // TODO : 아이디 중복 체크 필요

        // 유형성 체크 실패시
        if(count($this->arrErrorMsg)>0){
            return "view/regist.php";
            exit();
        }

        $arrAddUserInfo = [
            "u_id" => $u_id
            ,"u_pw" => $this->encryptionPassword($u_pw)
            ,"u_name" => $u_name
        ];
        
        $userModel = new UM();
        $userModel->beginTransaction();
        $result = $userModel->addUserInfo($arrAddUserInfo);

        if($result !== true){
            $userModel->rollBack();
        }else {
            $userModel->commit();
        }
        $userModel->destroy();

        return "Location: /user/login";
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw){
        return base64_encode($pw);
    }

}