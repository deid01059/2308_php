-- SELECT [컬럼명] FROM [테이블명];
-- 셀렉트 기본구문
SELECT * 
FROM employees;

SELECT * 
FROM dept_emp;
-- * 전체선택자    
SELECT first_name, last_name FROM employees;
-- 복수선택가능
SELECT emp_no, title FROM titles;

-- SELECT [컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- [쿼리조건] : 컬럼명 [기호] 조건값
SELECT * 
FROM employees 
WHERE emp_no <=10009;
-- <= : 작거나같다, < 작다 
-- >= : 크거나같다, > 크다  =같다
SELECT * FROM employees WHERE first_name ='Mary';  
-- 'text' 처럼 글씨는 '로 감싸준다 
SELECT * 
FROM employees 
WHERE birth_date >= 19500101;

-- and 연산자

SELECT * 
FROM employees 
WHERE birth_date <= 19700101
  AND birth_date >= 19650101;
  

SELECT *
FROM employees
WHERE first_name = 'mary'
  AND last_name = 'Piazza';

-- OR 연산자
SELECT *
FROM employees
WHERE first_name = 'mary'
  OR last_name = 'Piazza'; 
  


-- BETWEEN 연산자

SELECT *
FROM employees
WHERE emp_no >= 10005
  AND emp_no <= 10010;
-- 을
SELECT *
FROM employees
WHERE emp_no 
BETWEEN 10005 
AND 10010;
-- 로도 사용가능 함 하지만 속도가 위에 것이 더 빨라서 현업에서는 잘 안쓰기도 함  

-- IN 연산자

SELECT *
FROM employees
WHERE emp_no = 10005
	or emp_no = 10010;
-- 을
SELECT *
FROM employees
where emp_no
   in(10005,10010);
-- 로도 사용가능 함 하지만 속도가 위에 것이 더 빠름  

-- like 연산자
SELECT *
FROM employees
where first_name
 LIKE ('ge%');
-- like('text%') text 로 시작하는 모든값
-- like('%text') text 로 끝나는 모든값
-- like('%text%') text 가 중간인 모든값

SELECT *
FROM employees
where first_name
 LIKE ('___ge_');
-- 를 글자 수 만큼 원하는 위치에 넣어주면 그 글자수만큼  신경쓰지않고 검색해준다
 

-- ORDER BY로 정렬하여 조회 
SELECT * 
FROM employees
ORDER BY birth_date ASC;
-- ASC 오름차순 기본값
SELECT * 
FROM employees
ORDER BY birth_date DESC;
-- DESC 내림차순
SELECT * 
FROM employees
ORDER BY birth_date, first_name;
-- birth_date 먼저 정렬후 first_name 순으로 정렬
SELECT * 
FROM employees
ORDER BY last_name DESC, first_name , birth_date;
--  성 내림차순,  이름 오름차순, 생년월일 오름차순

-- DISTINCT로 중복되는 레코드 없이 조회
SELECT DISTINCT emp_no, salary
FROM salaries;

INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626)
COMMIT;

-- 5. 집계함수
SELECT sum(salary) FROM salaries;

SELECT *
FROM salaries
WHERE to_date <= 20230901;
-- 각 사원이 지급받고있는 현재 급여
SELECT SUM(salary)
FROM salaries
WHERE to_date <= 20230901;
-- SUM : 전체 합 

SELECT MAX(salary)
FROM salaries
WHERE to_date <= 20230901;
-- MAX : 최대값

SELECT MIN(salary)
FROM salaries
WHERE to_date <= 20230901;
-- MIN : 최소값

SELECT AVG(salary)
FROM salaries
WHERE to_date <= 20230901;
-- AVG : 평균

SELECT COUNT(emp_no)
FROM employees;
-- COUNT : 총 갯수

SELECT COUNT(emp_no)
FROM employees
WHERE first_name = 'MARY';
-- 이름이 mary인 사람수 

-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [HAVING 집계함수조건]

SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title ;
-- 현재 재직중인 직원들의 직급별 수 


SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE ('%staff%');
-- 현재재직중인 staff가 들어간 직원의 수
-- AS 는 컬럼명을 원하는 값으로 바꿔줌 위치는 컬럼 뒤에 작성

SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) AS full_name
FROM employees;
-- concat() : 문자열을 합쳐주는 함수

SELECT emp_no, birth_date, CONCAT(FIRST_NAME,' ',LAST_NAME) AS full_name
FROM employees
WHERE gender ='f'
ORDER BY full_name ASC;
-- 여자사원의 사번,생일,풀네임 출력 이름으로 오름차순


SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 10;
-- limit 로 출력갯수 제한하여조회
-- limit n : n개 만큼 출력
-- LIMIT n OFFSET n  : n번째부터 n개만큼 출력

SELECT *
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary desc
LIMIT 5;
-- 재직중인 직원 월급 상위5명

-- 서브쿼리 (subquery) : 쿼리안에 또다른 쿼리가 있는형태

SELECT*
FROM employees
WHERE emp_no=(
	SELECT emp_no
	FROM dept_manager
	where to_date >= 20230901
 	 AND dept_no = 'd002'
)
o;


SELECT emp_no, CONCAT(FIRST_NAME,' ',LAST_NAME) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary desc
	LIMIT 1
);


-- 서브쿼리결과 복수일때 사용방법

SELECT emp_no, CONCAT(FIRST_NAME,' ',LAST_NAME) AS full_name
FROM employees
WHERE emp_no in (
	SELECT emp_no 
	FROM dept_manager
	WHERE dept_no = 'd001'
);
-- d001 부서에 속한적있는 사원의 사번과 풀네임


SELECT emp_no, birth_date
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	from titles
	WHERE title = 'senior engineer'
	AND to_date >= 20230901
);


-- 다중열 서브쿼리

SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);
-- 현재 부서장인 사람의 소속부서 테이블의 모든 정보)



-- select절에 사용하는 서브쿼리

SELECT sal.salary, sal.from_date , (
	SELECT CONCAT(emp.first_name, ' ', emp.last_name)
	FROM employees AS emp
	WHERE sal.emp_no = emp.emp_no
) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();
-- 사원의 현재급여, 현재급여를 받기시작한 일자, 풀네임출력


-- FROM절에 오는 서브쿼리

SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'm'
) AS emp;