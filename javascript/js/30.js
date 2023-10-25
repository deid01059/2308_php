// Date

// 오늘날짜
let now = new Date();
// Wed Oct 25 2023 13:00:38 GMT+0900 (한국 표준시)

// 특정날자를 가져오고싶을때
let s_date = new Date('2023-09-30 00:00:00');


// getFullYear() : 연도만 가져오는 메소드
let year = now.getFullYear()
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드 (+1을 해줘야 현재 월로됨)
let month = now.getMonth() + 1;
console.log(now.getMonth() +1);

// getDate() : 일을 가져오는 메소드
let date = now.getDate();
console.log(now.getDate());

// getDay : 요일을 가져오는 메소드( 0(일) ~ 6(토) )
console.log(now.getDay());

// getHours() : 시를 가져오는 메소드
console.log(now.getHours());

// getMinutes() : 분을 가져오는 메소드
console.log(now.getMinutes());

// getSeconds() : 초를 가져오는 메소드
console.log(now.getSeconds());

// getMilliseconds() : 초를 가져오는 메소드
console.log(now.getMilliseconds());

// getTime() : 1970/01/01 기준으로 얼마나 지났는지 밀리초단위로 가져옴





// 현재 년월일
let now_date = year+"년"+month+"월"+date+"일"

// 요일별
let day = now.getDay()
let k_day = "";
switch (day) {
    case 1:
        k_day = "월요일";
        break;
    case 2:
        k_day = "화요일";
        break;
    case 3:
        k_day = "수요일";
        break;
    case 4:
        k_day = "목요일";
        break;
    case 5:
        k_day = "금요일";
        break;
    case 6:
        k_day = "토요일";
        break;
    default:
        k_day = "일요일";
        break;
}


// 날짜 와 날짜사이의 기간 구하기

now2 = new Date(year,month-1,date,0,0,0,0);
let tofrom = Math.floor(( now2 - s_date ) / 86400000);