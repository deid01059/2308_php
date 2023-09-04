-- 데이터 타입 변환 함수


-- CAST ( 값, 데이터형식 )
SELECT cast(1234 AS CHAR(4));

-- CONVERT( 값, 데이터형식 )
SELECT CONVERT(1234, CHAR(4));
--    **  둘다 같은 기능을 합니다. **


-- 제어 흐름 함수
-- IF(수식, 참일때, 거짓일때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT e.emp_no, IF(e.gender = 'm', '남자', '여자' )AS gender
FROM employees e;



-- IFNULL(수식1, 수식2) : 수식 1이 NULL이면 수식2를 반환하고
-- 						   수식 1이 NULL이 아니면 수식1을 반환
SELECT IFNULL(,);

-- NULLIF(수식1,수식2) : 수식1과 2가 같으면 NULL을 반환하고
--                       다르면 수식 1을 반환합니다.


SELECT NULLIF(1,1);
SELECT NULLIF(1,2);