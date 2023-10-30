// 1. async & await 란?
// 비동기처리를 좀더 가독성 좋고 편하게 쓰기위해 promise를 사용했는대,
// promise 또한 체이닝이 게속 될경우 코드가 납잡해 질수 있어  async & await 가 도입 되었습니다.
// async & await는 promise 를 기반으로 동작합니다.
function PRO3(str,ms) {
    return new Promise(function(resolve){
        setTimeout(()=>{
            console.log(str);
            resolve();
        },ms);
    });
}

// 얘랑
PRO3('A',3000)
.then(()=>PRO3('B', 2000))
.then(()=>PRO3('C', 1000));

// 얘랑 동작 똑같음
PRO3('A',3000)
.then(()=>{
    PRO3('B', 2000)
    .then(()=>PRO3('C',1000))
})


async function test(){
    await PRO3('a',5000);
    await PRO3('b',4000);

}


// 병렬처리 하는 방법 :Promise.all() 이용
function PRO4(str,ms){
    return new Promise( function(resolve){
        setTimeout(()=>{
            resolve(str);
        }, ms);
    });
}

async function test2() {
    return Promise.all([PRO4('A',5000),PRO4('B',4000)])
        .then( () => console.log('처리완료'));
}

// 몇초걸렸는지 확인하는법
const NOW = new Date();
test2()
.then( data => {
    console.log(data);
    const NOW2 = new Date();
    console.log(NOW2 - NOW);
});