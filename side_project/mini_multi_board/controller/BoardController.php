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

    // 보드 정보 API
    protected function detailGet(){
        $id = $_GET["id"];
        
        $arrBoardDetailInfo = [
            "id" => $id
        ];        
        
        // 모델 인스턴스
        $boardModel = new BM();
        $result = $boardModel->getBoardDetail($arrBoardDetailInfo);
        
        // 이미지 패스 재설정
        $result[0]["b_img"] = "/"._PATH_USERIMG.$result[0]["b_img"];
        
        // 유저체크(삭제버튼 표시용)
        $delFlg = (int)$result[0]["u_pk"] === (int)$_SESSION["u_pk"] ? "1" : "0";

        // 레스폰스 데이터 작성
        $arrTmp = [
            "errflg" => "0"
            ,"msg" => ""
            ,"data" => $result[0]
            ,"delflg" => $delFlg    
        ];
        $response = json_encode($arrTmp);

        // response 처리
        header('Content-type: application/json');
        echo $response;
        exit();
    }
    protected function delGet(){
        $id = $_GET["id"];
        $u_pk = $_SESSION["u_pk"];
        $b_type = $_GET["b_type"];
        $delListInfo = [
            "id" => $id
            ,"u_pk" => $u_pk
        ];       

        // 모델 인스턴스
        $boardModel = new BM();
        $boardModel->beginTransaction();
        $result = $boardModel->delList($delListInfo);
        if($result !== 1){
            $boardModel->rollBack();
        } else {
            $boardModel->commit();
        }
        $boardModel -> destroy();
        return "Location: /board/list?b_type=$b_type";
    }



}