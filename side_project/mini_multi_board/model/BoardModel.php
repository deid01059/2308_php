<?php

namespace model;

class BoardModel extends ParentsModel{
    // 리스트조회
    public function getBoardList($arrBoardInfo){
        $sql = 
        " SELECT "
        ."      id "
        ."      ,u_pk "
        ."      ,b_title "
        ."      ,b_content "
        ."      ,b_img "
        ."      ,created_at "
        ."      ,updated_at "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      b_type = :b_type "
        ." AND "
        ."      deleted_at IS NULL "
        ." ORDER BY "
        ."      id desc "
        ;

        $prepare = [
            ":b_type" => $arrBoardInfo["b_type"]
        ];
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e){
            echo "BoardModel->getBoarList Error : ".$e->getMessage();
            exit();
        }
    }

    // 작성
    public function boardInsert($arrBoardInsert){
        $sql =
            " INSERT INTO board ( "
            ."      b_type "
            ."      ,b_title "
            ."      ,b_content "
            ."      ,b_img "
            ."      ,u_pk "
            ." ) "
            ." VALUES ( "
            ."      :b_type "
            ."      ,:b_title "
            ."      ,:b_content "
            ."      ,:b_img "
            ."      ,:u_pk "
            ." ) "
            ;
        $prepare = [
            ":b_type" => $arrBoardInsert["b_type"]
            ,":b_content" => $arrBoardInsert["b_content"]
            ,":b_title" => $arrBoardInsert["b_title"]
            ,":b_img" => $arrBoardInsert["b_img"]
            ,":u_pk" => $arrBoardInsert["u_pk"]
        ];

        try{
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result; 
        } catch(Exception $e) {
            echo "BoardModel->BoardInsert Error : ".$e->getMessage();
            exit();
        }
    }

    // 디테일 조회
    public function getBoardDetail($arrBoardDetailInfo){
        $sql = 
        " SELECT "
        ."      id "
        ."      ,u_pk "
        ."      ,b_title "
        ."      ,b_content "
        ."      ,b_img "
        ."      ,created_at "
        ."      ,updated_at "
        ." FROM "
        ."      board "
        ." WHERE "
        ."      id = :id "
        ;

        $prepare = [
            ":id" => $arrBoardDetailInfo["id"]
        ];
        try{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        }catch(Exception $e){
            echo "BoardModel->getBoardDetail Error : ".$e->getMessage();
            exit();
        }
    }
}   