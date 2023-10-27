// 타이머 함수


// 1. setTimeout(콜백함수 , 시간(ms)) : 일정시간이 흐른 후에 콜백 함수를 실행

// 콘솔에 1초 뒤에 A, 2초뒤에 B, 3초뒤에 C가 출력되도록 프로그램을 만들어 주세요

// 내가만든것
for(let i = 1; i <= 3; i++){
    let arr = ['A','B','C']
    setTimeout(() => console.log(arr[i-1]), (i*1000));
}


// 선생님 방법
function my_print(chr, ms){
    setTimeout(() => console.log(chr), ms);
}
my_print('A',1000);
my_print('B',2000);
my_print('C',3000);



//2. clearTimeout(해당 setTimeout객체) : 타이머를 삭제

let myset = setTimeout(() => console.log("TEST"), 4000);
clearTimeout(myset);


// 3. setInterval( 콜백함수, 시간(ms)) : 일정시간마다 반복
let myInter = setInterval(()=>console.log('민경씨 자지마'), 1000);


// 4.clearInterval(해당 setInterval객체) : 인터벌 삭제
clearInterval(myInter);


// test 
// 화면을 로드하고 5초뒤에 '두두둥장' 이라는 매우 큰 글씨가 나타나게 해주세요
// html에 <div>


// 내방식
const C_DIV = document.createElement('div')
document.body.appendChild(C_DIV);
let div = document.querySelector('div')
setTimeout(() => {
    div.style.fontSize ='400px'
    div.style.color ='red'
    div.style.fontWeight ='900'
    div.innerHTML='두두둥장'
}, 5000);


// 선생님방식
setTimeout(myaddh1,5000);

function myaddh1(){
    const H1 = document.createElement('h1');
    H1.innerHTML = '두두둥장'
    document.body.appendChild(H1);
}