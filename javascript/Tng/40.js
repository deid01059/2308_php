

const BTN = document.querySelector('.btn1')

BTN.addEventListener('click', start);






function start(){
    alert('안녕하세요 \n숨어있는 div를 찾아보세요');
    function msg(){
        alert('두근두근');
    }
    const DIV = document.querySelector('div')
    DIV.addEventListener('mouseenter', msg);
    function total() {
    DIV.classList.remove('hidden');
    alert('들켰다!');
    DIV.removeEventListener('mouseenter', msg);
    
    DIV.addEventListener('click', hide);
    DIV.removeEventListener('click', total);    
        
        function hide() {
            alert('다시 숨는다.');
            DIV.classList.add('hidden');
            DIV.addEventListener('mouseenter', msg);
            
            let f_n = Math.floor(Math.random() * window.innerWidth);
            let l_n = Math.floor(Math.random() * window.innerHeight);
            DIV.style.marginLeft= f_n+'px';
            DIV.style.marginTop= l_n+'px';
            
            DIV.removeEventListener('click', hide);
            DIV.addEventListener('click', total);
        }   
    }
    DIV.addEventListener('click', total);
};
// DIV.addEventListener('click', ()=>{
//     if()
//     alert('들켰다!')
//     DIV.classList.remove('hidden')
//     DIV.removeEventListener('mouseenter', msg)
// });




