<?php

namespace lib;

class Validation {
    private static $arrErrorMsg = []; //발리데이션용 에러메세지 저장 프로퍼티

    // getter : 에러메세지 반환용 배열
    public static function getArrErrorMsg() {
        return self::$arrErrorMsg;
    }

    // settet : 에러메세지 저장용 메소드
    public static function setArrErrorMsg($msg) {
        self::$arrErrorMsg[] = $msg;
    }

    // 유효 체크 메소드
    public static function userChk(array $inputData) : bool {
        $patt_id = "/^[a-zA-Z0-9]{8,20}$/";
        $patt_pw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patt_name = "/^([a-zA-Z가-힣]){2,50}$/u";
        
        // 아이디체크
        if(array_key_exists("u_id",$inputData)){
            if(preg_match($patt_id, $inputData["u_id"], $match)===0){
                // id에러처리
                $msg = "아이디는 영어대소문자,숫자로 8~20자로 입력해주세요.";
                self::setArrErrorMsg($msg);
            }
        }

        // 비밀번호확인체크
        if(array_key_exists("u_pw_chk",$inputData)){
            if($inputData["u_pw"] !== $inputData["u_pw_chk"]){
                // 비밀번호 에러 처리
                $msg = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
                self::setArrErrorMsg($msg);
            }
        }
        // 비밀번호체크
        if(array_key_exists("u_pw",$inputData)){
            if(preg_match($patt_pw,$inputData["u_pw"], $match)===0){
                // pw에러처리
                $msg = "비밀번호는 영어대소문자,숫자,!,@로 8~20자로 입력해주세요.";
                self::setArrErrorMsg($msg);
            }
        }
        // 이름체크
        if(array_key_exists("u_name",$inputData)){
            if(preg_match($patt_name, $inputData["u_name"], $match)===0){
                // name에러처리
                $msg = "이름은 영어대소문자,한글 2~50자로 입력해주세요.";
                self::setArrErrorMsg($msg);
            }
        }

        // 리턴 처리
        if(count( self::$arrErrorMsg)>0){
            return false;
        }
        return true;
    }
}
