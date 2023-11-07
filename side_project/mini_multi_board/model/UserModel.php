<?php

namespace model;

class UserModel extends ParentsModel {
    // login 시도
    public function getUserInfo($arrUserInfo, $pwFlg = false){
        $sql = 
        " SELECT "
        ."      * "
        ." FROM "
        ."      user "
        ." WHERE "
        ."      u_id = :u_id ";

        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
        ];

        // PW 추가처리
        if($pwFlg) {
            $sql .= " AND u_pw = :u_pw";
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        }
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e){
            echo "UserModel->gettUserInfo Error : ".$e->getMessage();
            exit();
        }
    }
    //  유저정보인서트
    public function addUserInfo($arrAddUser){
        $sql =
            " INSERT INTO user ( "
            ."      u_id "
            ."      ,u_pw "
            ."      ,u_name"
            ." ) "
            ." VALUES ( "
            ."      :u_id "
            ."      ,:u_pw "
            ."      ,:u_name "
            ." ) "
            ;
        $prepare = [
            ":u_id" => $arrAddUser["u_id"]
            ,":u_pw" => $arrAddUser["u_pw"]
            ,":u_name" => $arrAddUser["u_name"]
        ];

        try{
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result; 
        } catch(Exception $e) {
            echo "UserModel->addUserInfo Error : ".$e->getMessage();
            exit();
        }
    }

}