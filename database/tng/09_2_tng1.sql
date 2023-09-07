-- 1번
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)


VALUES (
	500001
	,19981023
	,'JeongHun'
	,'Choi'
	,'m'
	,20230907
);
-- 2번
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'staff'
	,20230907
	,99990101
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,500000
	,20230907
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d008'
	,20230907
	,99990101
);


-- 3번

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,20000114
	,'Cat'
	,'Rose'
	,'F'
	,20230907
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Senior Engineer'
	,20230907
	,99990101
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,400000
	,20230907
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d008'
	,20230907
	,99990101
);

-- 3번 2
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500003
	,19930921
	,'Sujin'
	,'Yang'
	,'F'
	,20230907
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500003
	,'Senior Engineer'
	,20230907
	,99990101
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500003
	,410000
	,20230907
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500003
	,'d008'
	,20230907
	,99990101
);




-- 4번
UPDATE dept_emp
SET to_date = 20230907
WHERE emp_no = 500001
	or emp_no = 500002
	or emp_no = 500003
;

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)



VALUES (
	500001
	,'d009'
	,20230907
	,99990101
);

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d009'
	,20230907
	,99990101
);

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500003
	,'d009'
	,20230907
	,99990101
);



-- 5번
DELETE from employees
WHERE emp_no = 500002
	OR emp_no = 500003
;

DELETE from dept_emp
WHERE emp_no = 500002
	OR emp_no = 500003
;

DELETE from titles
WHERE emp_no = 500002
	OR emp_no = 500003
;

DELETE from salaries
WHERE emp_no = 500002
	OR emp_no = 500003
;




-- 6번
UPDATE dept_manager
SET to_date = 20230907
WHERE emp_no =(
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd009'
	AND to_date >= NOW()
);

INSERT INTO dept_manager(
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES (
	'd009'
	,500001
	,20230907
	,99990101
);




-- 7번
UPDATE titles
SET to_date = 20230907
WHERE emp_no = 500001;

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'senior engineer'
	,20230907
	,99990101
);



-- 8번

SELECT
	emp.emp_no
	,emp.first_name
	,salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
where(
	sal.salary = (SELECT MAX(salary) FROM salaries) 
	or sal.salary = (SELECT MIN(salary) FROM salaries)
);


-- 9번
SELECT * -- AVG(salary)
FROM salaries
;


-- 10번
SELECT AVG(salary) 499975_avg_sal
FROM salaries
where emp_no = 499975
;

