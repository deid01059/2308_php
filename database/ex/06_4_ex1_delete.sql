-- delete의 기본구조
-- delete from 테이블명
-- where 조건
-- **추가설명 : 조건을 적지않을경우 모든레코드가 수정됩니다
--          실수를 방지하기위해 WHERE절을 먼저 작성하고 SET절을 작성하는 습관을 들이면 좋음

INSERT INTO departments (
	dept_no
	,dept_name
)
VALUES (
	'd010'
	,'new'
);
-- departments테이블에 d010추가

DELETE FROM departments
WHERE dept_no = '010';






--사원정보테이블에서 사원번호가 500001이상인 사원의 데이터를 모두 삭제해 주세요
DELETE FROM employees
WHERE emp_no >= 500001 ;



-- ROLLBACK;
-- 이전상태로 되돌림

-- COMMIT;
-- 저장


SELECT * FROM departments


