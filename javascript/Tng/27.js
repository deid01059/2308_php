// 원본은 보존하면서 오름차순 정렬해주세요.
const ARR = [6,3,5,8,92,3,7,5,100,80,40];


let arr_test = Array.from(ARR);
arr_test.sort((a,b)=>a-b);

// 이렇게도 가능 
let arr_test_a = Array.from(ARR).sort((a,b)=>a-b);

// 짝수와 홀수를 분리해서 각각 새로운 배열을 만들어 주세요.()(다하면 함수로도 만들어보세요)

const ARR1 = [5,7,3,4,5,1,2];

let arr_test1 = ARR1.filter(num => num % 2 === 1);
let arr_test2 = ARR1.filter(num => num % 2 === 0);

let flg = "홀"


function test( arr, flg ){
    if(a === "홀"){
        return arr.filter(num => num % 2 === 1);
    } else if(a === "짝"){
        return arr.filter(num => num % 2 === 0);
    }
}

console.log(test(a))
// 다음 문자열에서 구분문자를 '.'에서 ''(공백) 으로 변경해 주세요. (구글 검색 활용 추천)
const STR1 = "php504.meer.kat";

// 방법1
let str = STR1.replaceAll('.', ' ');

// 방법2
let str1 = STR1.split('.').join(' ');

// 방법3
let str2 = STR1.replace(/\./g,' ');