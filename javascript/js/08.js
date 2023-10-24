// -------------------
// 조건문 (if, switch)
// -------------------
if(조건) {
    // 처리
} else if(조건) {
    // 처리
} else {
    // 처리
}

let age = 30;
switch(age) {
    case 20:
        console.log("20대");
        // 처리
    case 30:
        console.log("30대");
        // 처리
        break;
    default:
        console.log("모르겠다.");
        break;
}

// ----------------------------------------------------------
// 반목문 ( while, do_while, for, foreach, for...in, for...of)
// ----------------------------------------------------------

// foreach : 배열만 사용가능
let arr= [1, 2, 3, 4];
arr.forEach(function( val, key ){
    console.log(`${key} : ${val}`);
});





// for...in : 모든 객체를 루프 가능, key에만 접근이 가능

let obj = {
    key1: 'val1'
    ,key2: 'val2'
}

for( let key in obj){
    console.log(key);
}

// for...in으로 벨류 가져오는법

for( let key in obj){
    console.log(obj[key]);
}



// for...of : 모든 iterable(순서가 정해진)객체를 루프 가능, value에만 접근이 가능(String, Array, Map, Set, TypeArray..)

let arr1= [1, 2, 3, 4];

for( let key of arr1){
    console.log(key);
}


// 정렬해주세요.
let sort_arr = [7, 5, 3, 6, 10, 1];

// // 기존 문법
let finish = sort_arr.sort(function(a, b){
        return a - b;
    });
    
// // 이렇게도가능
let finish = sort_arr.sort((a, b) => a - b);
// // 역순
let finish = sort_arr.sort((a, b) => b - a);
    


let con_arr = sort_arr.length

for(i=0; i < con_arr; i++){
    for(a=0; a < con_arr - i -1; a++){
        if(sort_arr[a] > sort_arr[a+1]){
            let con_box = sort_arr[a]
            sort_arr[a] = sort_arr[a+1]
            sort_arr[a+1] = con_box
        }
    }
}

console.log(sort_arr);