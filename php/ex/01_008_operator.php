<?php
// 1.산술연산자

echo "더하기 : 1 + 1 = ", 1 + 1,"\n";
echo "빼기 : 1 - 1 = ", 1 - 1,"\n";
echo "곱하기 : 2 x 3 = ", 2 * 3,"\n";
echo "나누기 : 2 ÷ 3 = ", 2 / 3,"\n";
echo "나머지 : 2 % 3 = ", 2 % 3,"\n";
echo (10 - 5) * 8 / 10,"\n";



// 2. 증가/감소(증감) 연산자

$num1 = 8;

$num1++;
echo $num1,"\n";
// ++ : +1 해주는 증가 연산자

$num1--;
echo $num1,"\n";
// -- : -1 해주는 증가 연산자

echo $num1,"\n";
echo ++$num1,"\n";
// 전위연산자 : +1을 한후 $num 출력

echo $num1++,"\n";
echo $num1,"\n";
// 후위연산자 : $num 출력후 +1값을 적용


// 3. 산술 대입 연산자
$num = 5;

$num = $num + 2; 
// 를
$num += 2;
// 로도 나타낼수 있다 

$num += 2;
$num -= 2;
$num *= 2;
$num /= 2;
$num %= 2;

echo $num,"\n";



// 4. 비교 연산자
$num = 1;
$str = '1';

var_dump( 1 > 1 );
// (false)

var_dump( 1 > 0 );
// (true)

var_dump( 1 >= 0 );
// (true)

var_dump( 1 <= 0 );
// (false)



var_dump($num == $str);
// == : 값의 형태만 비교 = 불완전비교
// (true)

var_dump($num === $str);
// === : 값의 데이터 타입까지 비교 = 완전비교
// (false)



// !는 결과반전

var_dump($num != $str);
// != : 값의 데이터 타입까지 비교 = 불완전비교
// (false)

var_dump($num !== $str);
// !== : 값의 데이터 타입까지 비교 = 완전비교
// (true)


// 5. 논리 연산자



// and 연산자

// &&=and같은 느낌 둘다맞아야함

var_dump( 1 === 1 && 2===2 );
// (true)

var_dump( 1 === 1 && 2===1 );
// (false)



// or 연산자

// ||=or 같은느낌 하나만 맞아도됨

var_dump( 1 === 1 || 2===2 );
// (true)

var_dump( 1 === 1 || 2===1 );
// (true)

var_dump( 1 === 2 || 2===1 );
// (false)




// not 연산자

// !(ex)= 결과반대

var_dump( !(1 === 1) );
// (false)












?>