// 1. DOM (Document Object Model)이란? - 교제 P.679 그림 참조
// - 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// - DOM API를 통해서 HTML의 구조나 ㅐ용 또는 스타일등을 동적으로 조작가능


// 2. 요소 선택

//  2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'orange';
TITLE.style.fontSize = '3rem';
const SUBTITLE = document.getElementById('subtitle');
SUBTITLE.style.backgroundColor = '#F5F5DC';

// 2-2. 태그명으로 요소를 선택 (해당 요소들을 컬랙션 객체로 가져온다.)
const H2 = document.getElementsByTagName('h2');
H2[1].style.color = 'red';

//  2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

NONE[1].style.color = 'green';

// 2-4. css 선택자를 사용해 요소를 찾는 메소드
// querySelector() : 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

// querySelector() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');



// 3.요소 조작

// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>'; // 출력값 : <p>탕수육</p>

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두제거
TITLE.innerHTML = '<p>탕수육</p>'; // 출력값 : 탕수육

// setAttribute('','') : 요소에 속성을 추가
const TEXT = document.querySelector('#intxt');
TEXT.setAttribute('placeholder','셋어트리뷰트로 삽입');
// **몇몇 속성들은 DOM객체에서 바로 설정 가능
// ex) TEXT.placeholder = ,TEXT.classList =  등등  

// removeAttribute('','') : 요소에 속성을 제거
TEXT.removeAttribute('placeholder');



// 4. 요소 스타일링

// style : 인라인으로 스타일추가

TITLE.style.color = 'red';



// classList : 클래스 추가 또는 삭제

// add추가
TITLE.classList.add('class1','class2','class3');

// remove삭제
TITLE.classList.remove('class1','class2','class3');





// 5. 새로운 요소 생성



// 요소만들기



// createElement() : 태그생성
const LI = document.createElement('li');

// 태그에내용작성
LI.innerHTML = '이건새로만든 LI';



// 삽입할 부모요소 접근
const UL = document.querySelector('.ul');

// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI);

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('ul li:nth-child(3)');

UL.insertBefore(LI, SPACE);


// 해당 요소 지우는법
LI.remove;




// test

// 1. 사과게임 위에 장기를 넣어주세요.


const LI_T = document.createElement('li');
LI_T.innerHTML = '장기';
const TEST = document.querySelector('ul li:nth-child(5)');
UL.insertBefore(LI_T, TEST);

// 2.어메이징브릭에 베이지배경색을 넣어주세요

const TEST2 = document.querySelector('ul li:nth-last-child(1)');
TEST2.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색 글씨 홀수는 파랑색 글씨로 만들어 주세요

const TEST3 = document.querySelectorAll('ul li');

for(let i=0; i<=TEST3.length; i++){
    if(i % 2 === 0){
        TEST3[i].style.color = 'red';
    } else if(i % 2 === 1){
        TEST3[i].style.color = 'blue';
    }       
}
