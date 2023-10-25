let arr = [1,2,3,4,5];


// push() 메소드 : 배열에 값을 추가

arr.push(6);


// splice() 메소드 : 배열에 요소를 삭제 또는 교체 


// 삭제
arr.splice(2,1); //배열의 arr[2]에 1개 삭제 (n번방부터,n개 삭제)

// 추가
arr.splice(2,0,10); // 배열의 arr[2]에 삭제x 10 추가 (n번방부터,n개 삭제,n을 추가)

// 수정
arr.splice(2,1,'aaa');// 배열의 arr[2]에 1개 삭제 'aaa' 추가 (n번방부터,n개 삭제,n을 추가)

// 여러개추가
arr.splice(2,0, 10, 11, 12, 13); // 배열의 arr[2]에 삭제x 10추가 11추가 12추가 13추가 (n번방부터, n개 삭제, n을 추가, n을 추가, n을 추가, n을 추가)

// indexof() : 배열에서 특정 요소를 찾는데 사용
arr.indexOf(5); //배열에서 값이 5인 것의 방위치 현재는 = 4;


// lastIndexof() : 배열에서 특정요소중 가장 마지막에 위치한 요소를 찾는데 사용
arr2 = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];

arr2.lastIndexOf(1);//배열에서 값이 5인 것의 마지막 방위치 현재는 = 2;





// pop() : 배열의 가장 마지막 요소를 삭제하고 삭제한 요소의 값을 리턴
let i_pop = arr2.pop();



// sort() : 배열을 정렬
arr3 = [5,4,6,7,3,2];
let arr_sort = arr3.sort(function(a,b){
    return a - b;
});

// 화살표

// 오름차순
arr3.sort((a,b)=>a-b);
// 내림차순
arr3.sort((a,b)=>b-a);


// 원본데이터와 별도로 새로 배열을 만드는 방법(Value Copy 방식)
let arr4 = arr3;
let arr5 = Array.from(arr3);


// includes() : 배열의 특정요소를 가지고 있는지 판별 (리턴 boolean)
arr6 = ["치킨","육회비빔밥","비앤나"]

let boo_includers = arr6.includes("치킨"); // boo_includers = true
let boo_includers1 = arr6.includes("짜장면"); // boo_includers1 = false


// join() : 배열의 모든요소를 연결해서 하나의 문자열을 리턴
arr6.join();
// '치킨,육회,비빔밥' 으로 리턴
arr6.join("");
// '치킨육회비빔밥' 으로 리턴
arr6.join(" / ");
// '치킨 / 육회 / 비빔밥' 으로 리턴



// map() : 배열의 모든 요소에 대해서 주어진 함수를 적용한 결과를 모아 새배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];


// ex) 모든 요소의 값 * 2의 결과를 배열로 얻고싶을때
let arr_map = arr.map(num => num * 2);

// 3의 배수 '짝'
let arr_map1 = arr.map(num =>{
    if(num % 3 === 0){
        return '짝'
    } else {
        return num;
    }
});

// some() : 주어진 함수를 만족하는 요소가 하나라도 있는지 판별 (retrun boolean) 

rr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

let boo_some = arr.some(num => num === 9); //true
let boo_some1 = arr.some(num => num === 10); //false



// every() : 주어진 함수를 만족하는 요소가 모두 만족하는지 판별 (retrun boolean) 
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

let boo_every = arr.every(num => num <= 9); //true
let boo_every1 = arr.every(num => num <= 5); //false



// filter() : 배열의 요소 중에 주어진 함수에 만족한 요소만 모아서 새로운 배열을 리턴
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

let boo_filter = arr.filter(num => num % 3 === 0); // boo_filter = [3,6,9];



