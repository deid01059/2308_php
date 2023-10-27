// 내가한 방식

function time(){
    // 지금호출
    let now = new Date();
    // 시분초 조회
    let hour1 = now.getHours();
    let min = now.getMinutes();
    let sec = now.getSeconds();
    // 빈 변수 설정
    let uk = 0;
    let usa = 0;
    let hour = 0;
    let ampm = ""
    let zero= ''
    let zero_h= ''
    let zero_m= ''
    // 영국시간 셋팅
    if(hour1 - 8 < 0){
        uk = hour1+4
    }else{
        uk = hour1-8
    }
    // 미국시간셋팅
    if(hour1 - 13 < 0){
        usa = hour1+11
    }else{
        usa = hour1 - 13
    }
    // 한국 오전오후체크
    if(hour1 >=13){
        ampm = '오후';
        hour = hour1-12;
    }else{
        ampm = '오전';
    }
    // 영국 오전오후체크
    if( uk >=13){
        ampm_uk = '오후';
        hour_uk = uk-12;
    }else{
        hour_uk = uk
        ampm_uk = '오전';
    }
    // 미국 오전오후체크
    if(usa >=13){
        ampm_usa = '오후';
        hour_usa = usa-12;
    }else{
        ampm_usa = '오전';
        hour_usa = usa
    }
    // 시분초 1자리일시 앞에 0붙이는 작업
    if(sec <= 9){
        zero= '0'
    }else{
        zero= ''
    }
    if(hour <= 9){
        zero_h = '0'
    }else{
        zero_h = ''
    }
    if(min <= 9){
        zero_m = '0'
    }else{
        zero_m = ''
    }
    // html div연결
    let div = document.querySelector('.div')
    let div1 = document.querySelector('.div1')
    let div2 = document.querySelector('.div2')
    // 각나라별셋팅
    div.innerHTML= '한국 현재 시각 '+ ampm +" "+ zero_h + hour + ':' + zero_m + min + ':' + zero + sec;
    div1.innerHTML= '영국 현재 시각 '+ ampm_uk +" "+ zero_h + hour_uk + ':' + zero_m + min + ':' + zero + sec;
    div2.innerHTML= '미국 현재 시각 '+ ampm_usa +" "+ zero_h + hour_usa + ':' + zero_m + min + ':' + zero + sec;
}
// 함수호출후 인터벌0.1초
time()
let go = setInterval(time, 1000);
// html button 연결
const BTN = document.querySelector(".btn")
const BTN1 = document.querySelector(".btn1")
// 인터벌 멈추는 함수
function stop(){
    clearInterval(go);
}
// 인터벌 재시작 함수
function keepgo(){
    time()
    go = setInterval(time, 1000);
}
// 각 버튼 클릭시 정지 재시작
BTN.addEventListener('click', stop);
BTN1.addEventListener('click', keepgo);




// 위에서 오후,오전 시 분 초 미친듯이 계산해주는거
// 이거하나로 해결가능
// let god = now.toLocaleTimeString();
// console.log(god);

// 오전(후) 00:00:00
// ex) 오후 4:53:40