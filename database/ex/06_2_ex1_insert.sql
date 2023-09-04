
-- INSERT 문
-- INSERT INTO 테이블명 [ (속성1,속성2) ]
-- VALUES ( 속성값1, 속성값2 )


-- 500000번 사원 추가
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19910101
	,'o'
	,'ral'
	,'m'
	,20230904
);

-- 500000번 사원의 급여데이터를 삽입해주세요
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,45000
	,20230904
	,20990101
);

-- 500000번 사원의 소속부서데이터를 삽입해주세요
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d005'
	,20230904
	,20990101
);

-- 500000번 사원의 직책  데이터를 삽입해주세요
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Engineer'
	,20230904
	,20990101
);



SELECT * 
FROM titles
WHERE emp_no=500000;