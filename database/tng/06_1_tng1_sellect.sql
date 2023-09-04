-- 오전테스트

SELECT *
FROM titles;
-- 1번 직책테이블의 모든 정보를 조회해주세요


SELECT DISTINCT emp_no
FROM salaries
WHERE salary <= 60000;
-- 2번 급여가 60000이하인 사원의 사번을 조회해 주세요


SELECT DISTINCT emp_no
FROM salaries
WHERE salary >= 60000
AND salary <= 70000;
-- 3번 급여가 60000에서 70000인 사원의 사번을 조회해주세요


SELECT *
FROM employees
WHERE emp_no IN (10001, 10005);
-- 4번 사원번호가 10001,10005인 사원의 사원테이블의 모든정보를 조회해주세요


SELECT emp_no, title
FROM titles
WHERE title LIKE ('%engineer%');
-- 5번 직급명에 "engineer"가 포함된 사원의 사번과 직급을 조회해주세요


SELECT first_name, LAST_name
FROM employees
ORDER by first_name ASC;
-- 6번 사원 이름을 오름차순으로 정열해 주세요


SELECT emp_no, AVG(salary) AS sal_avg
FROM salaries
GROUP BY emp_no ;
-- 7번 사원별 급여의 평균을 조회해 주세요.


SELECT emp_no, AVG(salary) AS sal_avg
FROM salaries 
GROUP BY emp_no 
	HAVING sal_avg <= 50000 
	and sal_avg >= 30000;
-- 8번 사원별 급여의평균이 30000 ~ 50000인 사원의 사원번호와 평균급여를 조회해주세요.


SELECT emp.emp_no ,emp.first_name ,emp.last_name ,emp.gender
FROM employees AS emp
WHERE emp_no in(
	SELECT sal.emp_no
	FROM salaries AS sal
	GROUP BY sal.emp_no 
		HAVING AVG (sal.salary) >= 70000
	);
-- 9번 사원별 급여의 평균이 70000이상인 사원의 사번,이름,성,성별을 조회해 주세요


SELECT emp.emp_no, emp.gender
FROM employees as emp
WHERE emp.emp_no in( 
	select tit.emp_no
	FROM titles AS tit
	WHERE tit.title = 'senior engineer'
		AND tit.to_date > 20230904);
-- 10번 현재 직책이 'senior engineer'인 , 사원의 사원번호와 성을 조회해 주세요