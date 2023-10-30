function start(id){
    let flg = confirm("정말 삭제하시겠습니까??");
    if ( flg ){ 
        document.list_del+id.submit();
    }else{   //취소  
        return false;
    }
}