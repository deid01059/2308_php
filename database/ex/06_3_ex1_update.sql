-- UPDATE의 기본구조
-- UPDATE 테이블명
-- SET ( 컬럼1 =값1, 컬럼2 = 값2)
-- WHERE 조건
-- **추가설명 : 조건을 적지않을경우 모든레코드가 수정됩니다
--          실수를 방지하기위해 WHERE절을 먼저 작성하고 SET절을 작성하는 습관을 들이면 좋음

UPDATE titles
SET title='ceo'
WHERE emp_no = 500000;
-- 500000번 사원의 직책  변경



UPDATE titles
SET title='staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;
-- 500000번 사원의 직책을 'staff', 연봉을 '25000'



SELECT *
FROM salaries
WHERE emp_no = 500000;

rollback