-- 1. auto_increment 란?
-- 자동 증가 값을 가지는 컬럼으로 값을 직접 대입할수 없습니다.
-- 중간에 값을 삭제한다고 해서,삭제된 값을 재사용 하지 않으며
-- 레코드가 적재될때마다 1씩 증가하게 됩니다.
-- PK에만 적용할수 있습니다.

CREATE TABLE members (
	mem_no 	INT PRIMARY KEY AUTO_INCREMENT
	,mem_name	VARCHAR(50)
);


-- 3. auto_increment 수정
-- 이미 생성한 테이블의 컬럼에 추가할때
ALTER TABLE 테이블명 MODIFY 컬럼명 INT(11) PRIMARY KEY AUTO_INCREMENT


-- auto_increment 값을 특정값으로 설정(현재 들어있는 PK의 최대값이하로는 설정이 안됨)
ALTER TABLE 테이블명AUTO_INCREMENT=1s