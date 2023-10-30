// 동기처리
console.log('A');
console.log('B');
console.log('C');

// 비동기처리
console.log('A');
setTimeout(()=>{
    console.log('B');
},1000);
console.log('C');

const NOW = new Date();
let l1 = new Date();

function my_setTimeout(callback,ms){
    while(l1 - NOW <= ms){
        l1 = new Date();
    }
    callback()
}



// A는 3초로셋팅 3초후 처리후, B는 2초로셋팅 2초후, 처리 C는 1초로셋팅 1초후처리 로 찍고싶을때

// 기존방법
setTimeout(()=>{
    console.log('A')
},3000)

setTimeout(()=>{
    console.log('B')
},2000)

setTimeout(()=>{
    console.log('C')
},1000)
// CBA 순으로 찍힌다 셋팅값을 변경을 해줘야 우리가 원하는 방식이된다 


// 비동기처리를 동기처리로 하고싶을때(콜백지옥 : 콜백함수를 이용하여 비동기처리를 동기처리하도록 만들때 나타나는 소스코드의 납잡한 현상)

setTimeout(() => {
    console.log('A')
    setTimeout(() => {
        console.log('B')
        setTimeout(() => {
            console.log('C')
        }, 1000);
    }, 2000);
}, 3000);

// 3초후 a 처리후, 2초후 b 처리후, 1초후 c 로 셋팅값대로 정상작동한다 

