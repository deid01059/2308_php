
// 시작버튼 연결
const BTN = document.querySelector('.btn1')
// 버튼 클릭시 시작
BTN.addEventListener('click', start);


function start(){
    // 메세지 출력
    alert('안녕하세요 \n숨어있는 div를 찾아보세요');
    function msg(){
        alert('두근두근');
    }
    // html이랑 연결
    const DIV = document.querySelector('div')
    // 마우스올라갈시 msg메세지 출력
    DIV.addEventListener('mouseenter', msg);
    // 클릭시 total 실행
    DIV.addEventListener('click', total);
    function total() {
    // class hidden 삭제
    DIV.classList.remove('hidden');
    // 메세지출력
    alert('들켰다!');
    // 마우스올라갈시 msg메세지 출력하는 기능 삭제
    DIV.removeEventListener('mouseenter', msg);
    
    // 클릭시 hide호출및 total정지
    DIV.addEventListener('click', hide);
    DIV.removeEventListener('click', total);    
        
        function hide() {
            // 메세지출력
            alert('다시 숨는다.');
            // class hidden 삭제
            DIV.classList.add('hidden');
            // 마우스올라갈시 msg메세지 재생성
            DIV.addEventListener('mouseenter', msg);
            
            // 랜덤좌표 생성후 위치이동
            let f_n = Math.floor(Math.random() * window.innerWidth);
            let l_n = Math.floor(Math.random() * window.innerHeight);
            DIV.style.marginLeft= f_n+'px';
            DIV.style.marginTop= l_n+'px';
            
            // 클릭시 hide 정지 밑 total재생성
            DIV.removeEventListener('click', hide);
            DIV.addEventListener('click', total);
        }   
    }
};




