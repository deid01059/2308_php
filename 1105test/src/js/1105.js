function start(id){
    let flg = confirm("정말 삭제하시겠습니까??");
    if ( flg ){ 
        document.list_del+id.submit();
    }else{   //취소  
        return false;
    }
}


let time = document.querySelector('#insert_time');
function nowtime(){
    let now = new Date();
    time.innerHTML = now.toLocaleTimeString();
}
nowtime();
setInterval(nowtime, 1000);