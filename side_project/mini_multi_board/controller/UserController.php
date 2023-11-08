<?php

namespace controller;

use model\UserModel as UM;
use lib\Validation as Vd;
class UserController extends ParentsController{
    // 로그인
    protected function loginGet(){
        return "view/login.php";
    }

    
    // 로그인처리
    protected function loginPost(){
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
        ];
        // 유효성체크
        if(!Vd::userChk($inputData)){
            $this->arrErrorMsg = Vd::getArrErrorMsg();
            return "view/login.php";
            exit();
        }
        // ID,PW 설정(DB에서 사용할 데이터 가공)
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"];
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        
        $userModel = new UM();
        $resultUserInfo = $userModel->getUserInfo($arrInput, true);

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
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
            ,"u_name" => $_POST["u_name"]
        ];

        $arrAddUserInfo = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
            ,"u_name" => $_POST["u_name"]
        ];
        
        // 유형성 체크 실패시
        if(!Vd::userChk($inputData)){
            $this->arrErrorMsg = Vd::getArrErrorMsg();
            return "view/regist.php";
            exit();
        }
        // TODO : 아이디 중복 체크 필요


        // 인서트처리
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

    // 아이디 중복확인
    protected function idChkPost(){
        $errorFlg ="0";
        $errorMsg = "";
        // 유효성체크배열
        $inputData = [
            "u_id" => $_POST["u_id"]
        ];
        // 유형성 체크 실패시
        if(!Vd::userChk($inputData)){
            $errorFlg ="1";
            $errorMsg = Vd::getArrErrorMsg()[0];
        }
        // 모델인스턴스후 검색시작
        $userModel = new UM();
        $resultUserInfo = $userModel->getUserInfo($inputData);
        $userModel -> destroy();
        
        // 레스폰스 데이터 작성
        if(count($resultUserInfo) > 0){
            $errorFlg = "1";
            $errorMsg = "이미 존재하는 아이디입니다.";
        }

        $arrChk = [
            "errflg" => $errorFlg
            ,"msg" => $errorMsg
        ];
        $response = json_encode($arrChk);
        // response 처리
        header('Content-type: application/json');
        echo $response;
        exit();

    }

    // 비밀번호 암호화
    private function encryptionPassword($pw){
        return base64_encode($pw);
    }

}