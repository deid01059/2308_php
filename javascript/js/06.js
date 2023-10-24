// ---------------
// 기본 데이터 타입
// ---------------

// 숫자(number)
let num = 1;

// 문자열(string)
let str = "string";

// 불린언(boolean)
let boo = true;

// null()
let nu = null;

// undefined
let und;

// symbol : 고유한 ID를 가진 데이터 타입

let symbol_1 = "symnol";
let symbol_2 = "symnol";
// (symbol_1 === symbol_2) = true


let symbol1 = Symbol("symnol");
let symbol2 = Symbol("symnol");
// (symbol1 === symbol2) = false
// (symbol1 == symbol2) = false
// 고유한 ID를 가지기에 값이 같아도 다른것으로 인식한다



// 객체 타입


// Object

let obj = {
    food1:"탕수육"
    ,food2:"짜장면"
    ,food3:"라조기"
    ,eat: function(){
        console.log("먹자");
    }
    ,list: {
        list1: "리스트1"
        ,list2: "리스트2"
    }
}
// obj[food1]로 해도 "탕수육" 값을 얻을수 있으나 .을 통해 편하게 가능
// obj.food1 = "탕수육"
// obj.eat() = eat함수 실행
// obj.list.list1 = "리스트1"


// self 테스트
let me = {
    name: "정훈"
    ,gender: "남자"
    ,age: 26
    ,hobby: "영화감상"
    ,motto: function(){
        console.log("불행한 부자보다 행복한 거지가 되자");
    }
    ,school: {
        middle: "계성중"
        ,high: "계성고"
    }

}


// Array

let arr = [1,2,3];
// php와 동일 arr[0] = 1
// Array 길이 알아내는법 : arr.length = 3 


// Date


// Math
// 그 외에 기본 데이터 타입을 제외한 모든 것