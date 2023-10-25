// random() : 0 이상 1미만의 랜덤한 수를 리턴

// 1~10 까지 출력
Math.ceil(Math.random() * 10);

// 증명
console.log("루프시작")
for(let i = 0; i < 1000000; i++){
    let ran = Math.ceil(Math.random() * 10);
    if(ran < 1 || ran > 10){
        console.log("이상한숫자");
    }
}
console.log("루프끝")


// 소수점처리방법

// 올림
Math.ceil(3.5)
// 반올림
Math.round(3.5)
// 버림
Math.floor(3.5)


// min(),max() :파라미터 중 가장 (큰, 작은)값을 리턴
Math.min(1,2,3,4) // 1
Math.max(1,2,3,4) // 4

let arr = [1,2,3,4,5]
Math.min(...arr) // 1
Math.max(...arr) // 5