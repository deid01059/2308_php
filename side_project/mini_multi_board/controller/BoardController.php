<?php

namespace controller;

use model\BoardModel as BM;

class BoardController extends ParentsController{
    protected $arrBoardInfo;
    protected $titleBoardName;
    protected $boardType;

    // 리스트 페이지
    protected function listGet(){

        // 파라미터셋팅
        $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";

        $arrBoardInfo = [
            "b_type" => $b_type
        ];

        // 페이지의 재목 셋팅
        foreach($this->arrBoardNameInfo as $item){
            if($item["b_type"] === $b_type){
                $this->titleBoardName = $item["b_name"];
                $this->boardType = $item["b_type"];
                break;
            }
        }

        // 모델 인스턴스
        $boardModel = new BM();

        // 보드 리스트 획득 getBoardList 호출
        $this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo);

        return "view/list.php";
    }

    // 보드 인서트 작업
    protected function addPost(){
        // 작성 데이터 생성      
        $b_type  = $_POST["b_type"];
        $b_title = $_POST["b_title"];
        $b_content = $_POST["b_content"];
        $u_pk = $_SESSION["u_pk"];
        $b_img = $_FILES["b_img"]["name"];
        
        $arrBoardInsert = [
            "b_type" => $b_type
            ,"b_title" => $b_title
            ,"b_content" => $b_content
            ,"b_img" => $b_img
            ,"u_pk" => $u_pk
        ];
        // 이미지 파일 저장
        move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);
        
        // 인서트처리
        $boardModel = new BM();
        $boardModel->beginTransaction();       

        // 보드 리스트 획득 getBoardList 호출
        $result = $boardModel->boardInsert($arrBoardInsert);
    
        if($result !== true){
            $boardModel->rollBack();
        } else {
            $boardModel->commit();
        }

        // 모델파기
        $boardModel->destroy();
        return "Location: /board/list?b_type=".$b_type;
    }
}