// const BTN_DETAIL = document.querySelector('#btnDetail')
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose')
// BTN_DETAIL.addEventListener('click', ()=>{
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.remove('displayNone');
// })
// BTN_MODAL_CLOSE.addEventListener('click', ()=>{
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.add('displayNone');
// })


// 상세 모달 제어
function openDetail(id){
    const URL = '/board/detail?id='+id
    fetch(URL)
    .then(response => response.json())
    .then(data => {
        const TITLE = document.querySelector('#b_title');
        const CONTENT = document.querySelector('#b_content');
        const IMG = document.querySelector('#b_img');
        const CREATE = document.querySelector('#created_at');
        const UPDATE = document.querySelector('#updated_at');
        const BTN_DEL = document.querySelector('#btnDel');


        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = data.data.b_content;
        CREATE.innerHTML = "작성날짜 : "+data.data.created_at;
        UPDATE.innerHTML = "수정날짜 : "+data.data.updated_at;
        IMG.setAttribute('src',data.data.b_img)
        BTN_DEL.setAttribute('href','/board/del?id='+data.data.id+'&b_type='+data.data.b_type)
        // 삭제버튼 제어
        if(data.delflg === "1") {
            BTN_DEL.classList.add('show');
            BTN_DEL.classList.remove('d-none');
        } else {
            BTN_DEL.classList.add('d-none');
            BTN_DEL.classList.remove('show');
        }
        

        openModal();
    })
    .catch( error => console.log(error) )


}

function openModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('show');
    MODAL.style = ('display: block; background-color:rgba(0,0,0,0.7);');
}

// 모달 닫기 함수
function closeModal(){
    const MODAL = document.querySelector('#modalDetail')
    MODAL.classList.remove('show');
    MODAL.style = ('display: none;');
}


// 아이디중복체크
function chkId(){
    const ID_CHK_MSG = document.querySelector('#idChkMsg');
    ID_CHK_MSG.innerHTML = '';
    const ID = document.querySelector('#u_id');
    const URL = '/user/idchk';
    // POST로 fetch하는 방법
    // 새로운 폼객체 생성
    const formData = new FormData();
    formData.append("u_id", ID.value)
    const HEADER = {
        method: 'POST'
        ,body: formData
    };
    fetch(URL,HEADER)
    .then(response => response.json())
    .then(data => {
            if(data.errflg === "0"){
                ID_CHK_MSG.innerHTML = "사용가능한 아이디 입니다";
                ID_CHK_MSG.classList = 'text-success';
                const S_BTN = document.querySelector('#s_btn');
                S_BTN.setAttribute('type','submit');
            } else {
                ID_CHK_MSG.innerHTML = "사용할수 없는 아이디입니다";
                ID_CHK_MSG.classList = 'text-danger';
                const B_BTN = document.querySelector('#s_btn');
                B_BTN.setAttribute('type','button');
            }
        }
    )
    .catch( error => console.log(error) )
}





