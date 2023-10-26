// 1.버튼을 클릭시 아래내용의 알러트가 나옵니다.
// "안녕하세요"
// "숨어있는 div를 찾아보세요"
const BTN = document.querySelector('button')

BTN.addEventListener('click', () => {
    alert('안녕하세요 \n숨어있는 div를 찾아보세요');
});
// 2-1 특정영역에 마우스포인터가 진입하면 아래내용의 알러트가 나옵니다.
    // 두근두근

function msg(){
    alert('두근두근');
}

const DIV = document.querySelector('div')
DIV.addEventListener('mouseenter', msg);




function total() {
    DIV.classList.remove('hidden');
    alert('들켰다!');
    DIV.removeEventListener('click', total);
    
    function hide() {
        let f_n = Math.ceil(Math.random() * 2000);
        let l_n = Math.ceil(Math.random() * 1000);
        alert('다시 숨는다.');
        DIV.classList.add('hidden');
        DIV.removeEventListener('click', hide);
        DIV.addEventListener('click', total);
        DIV.addEventListener('mouseenter', msg);
        DIV.style.marginLeft= f_n+'px';
        DIV.style.marginTop= l_n+'px';
    }
    DIV.addEventListener('click', hide);
    DIV.removeEventListener('mouseenter', msg);
}
DIV.addEventListener('click', total);


