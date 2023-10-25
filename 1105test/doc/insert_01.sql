INSERT INTO 
	lists (content, to_date,ten_flg) 
VALUES
	('가상 버킷리스트 데이터 1', '2024-01-01','0'),
	('가상 버킷리스트 데이터 2', '2034-01-01','1');
COMMIT;

SELECT * FROM lists