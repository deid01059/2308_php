// 함수

// 함수생성

// 함수 선언식 : 호이스팅의 영향을 받는다.
function fnc_sum( a, b ) {
    return a + b;
}

// 함수 표현식 : 호이스팅의 영향을 받지 않는다.
let fnc1 = function( a, b ) {
    return a + b;
}
// 익명함수 : 이름이 없는 함수
// 바로 위 상태 function( a, b ) 부분에서 보듯이 이름이 없음


// 콜백함수 : 다시 호출되는 함수,

function fnc_callback( call ){
    call();
}

fnc_callback(function() {
    console.log('익명함수')
})


// 배열객체의 sort의 경우 예시
sort_arr.sort(function(a, b){
    return a - b
});
// 가
function sort(call){
    let num = call();
    if (num<0){
        // 처리
    }
}
// 이런식으로 되있다 생각하면 편안


// Function 생성자 함수
let tt = Function('a', 'b', 'return a + b;')




// 화살표 함수(Arrow Function)
let f1 = function() {
    return "f1";
}
// 화살표
let f2 = () => "f2";





// 파라미터가 1개인 경우
let f3 = function(a){
    return a + "입니다.";
}
// 화살표
let f4 = a => a + "입니다.";




// 파라미터가 2개 이상인 경우
let f5 =function(a, b){
    return a + b;
}
// 화살표
let f6=(a, b) => a + b;





// 복잡한함수
let f7 = function(a, b) {
    if(a > b){
        return 'a가 큼'
    }
    if(a < b){
        return 'b가 큼'
    }
}
// 화살표
let f8 = (a,b) =>{
    if(a > b){
        return 'a가 큼'
    }
    if(a < b){
        return 'b가 큼'
    }
}