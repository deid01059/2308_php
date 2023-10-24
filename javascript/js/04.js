// console.log("반갑습니다. js파일입니다");


// ----------------------
// 변수 (var, let ,const)
// ----------------------


// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프

// // 중복 선언 가능

// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);


// // 재할당

// var u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);


// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프

// // 중복선언 불가능

// let u_name = "홍길동";
// console.log(u_name);
// let u_name1 = "갑순이";
// console.log(u_name);


// // 재할당

// let u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name);


//const : 중복 선언 불가, 재할당 불가능, 블록레벨 스코프 

// // 중복 선언 불가

// const AGE = 19;
// console.log(AGE);
// const AGE = 20;
// console.log(AGE);


// // 재할당 불가

// const AGE = 19;
// console.log(AGE);
// AGE = 20;
// console.log(AGE);




// ----------
// 스코프
// ----------

// 전역 스코프 : 어디서든 가능
let gender = "M";

// 함수 레벨 스코프 : 함수안에서 작용 test() 값 "test1"
function test(){
    let test1 = "test1";
    console.log(test1);
}

// 만약

function test(){
    let test1 = "test1";
}
console.log(test1);   

//  일 경우 test1값 호출 불가능


// 블록 레벨 스코프 : {}안에서만 작용 test() 값 "test1"

function test(){
    let test1 = "test1";
    if(true){
        let test1 = "test2";
    }
    console.log(test1);
}

// 만약

function test(){
    if(true){
        let test1 = "test2";
    }
    console.log(test1);
}
// 일 경우에는 test1 값 호출 불가능


// ------------------
// 호이스팅 (hoisting)
// ------------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것
// (인터프리터 : 프로그래밍 언어의 소스코드를 바로 실행하는 컴퓨터 프로그램 또는 환경)
// 코드가 실해되기 전에 변수와 함수를 최상단에 끌어 올려지는것


// 함수 =  정상 호출 가능

console.log(htest1());
function htest1(){
    return "htest1 함수입니다"
}


// var : 에러는 안나고 정상실행후 값을 찾을수 없다고 뜸

console.log(hvar);
var hvar = "var로 선언";


// let : console.log(hvar)에서 에러발생후 처리종료

console.log(hvar);
var hvar = "var로 선언";



