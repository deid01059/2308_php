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

let test;

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

        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = data.data.b_content;
        CREATE.innerHTML = "작성날짜 : "+data.data.created_at;
        UPDATE.innerHTML = "수정날짜 : "+data.data.updated_at;
        IMG.setAttribute('src',data.data.b_img)

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