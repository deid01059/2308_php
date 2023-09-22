CREATE DATABASE chimhaha;

USE chimhaha;

CREATE TABLE users(
	user_id INT PRIMARY KEY AUTO_INCREMENT
	,user_name VARCHAR(30) NOT NULL
	,phone INT(11) NOT NULL
	,join_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE board(
	board_no INT PRIMARY KEY AUTO_INCREMENT
	,user_id int NOT NULL
	,title VARCHAR(50) NOT NULL
	,content VARCHAR(1000) NOT NULL
	,write_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,FOREIGN KEY(user_id) REFERENCES users(user_id)
);


users
COMMIT;