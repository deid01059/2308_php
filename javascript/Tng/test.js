

// 두수를 받아서 더한값을 리턴해주는 함수
function add(a,b){
    return a + b;

}
add(2,5);

// 콜백함수 :
function myCallBack(fnc){
    fnc()
}
myCallBack(test)


function test(){
    console.log('callbacktest')
}
console.log(test)








// 함수를 3개 만들어 주세요.
// PHP를 출력하는 함수
// 504를 출력하는 함수
// 풀스택을 출력하는 함수

function one(){
    console.log('PHP')
}
function two(){
    console.log('504')
}
function three(){
    console.log('풀스택')
}

setTimeout(one, 3000);
setTimeout(two, 5000);
myCallBack(three);
three();

let today = new Date();
document.write(today);

let year = today.getFullYear();
let month = (today.getMonth()+1);
let day = today.getDate();
let hour = today.getHours();
let min = today.getMinutes();  
let sec = today.getSeconds();  
let msec = today.getMilliseconds();

document.write(
   '<br>'+ year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + sec
)

let btn = document.querySelector('#btn');
btn.addEventListener('click',naver1);

let btn1 = document.querySelector('#btn2');
btn1.addEventListener('click',()=> location.href = 'http:\/\/www.naver.net');

let btn2 = document.querySelector('#btn1');
btn2.addEventListener('click',naver);




function naver() {
    winopen = open('http:\/\/www.naver.net', '', 'width=500 height=500');    
}
function naver1() {
    location.href = 'http:\/\/www.naver.net';  
}
