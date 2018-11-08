CREATE TABLE admin (
	username VARCHAR(30) PRIMARY KEY,
	password VARCHAR(100) NOT NULL
);

CREATE TABLE user (
	username VARCHAR(30) PRIMARY KEY,
	password VARCHAR(100) NOT NULL,
	full_name VARCHAR(30) NOT NULL,
	gender VARCHAR(10) NOT NULL,
	phone_num VARCHAR(20),
	facebook VARCHAR(100),
	balance FLOAT NOT NULL,
	t_balance FLOAT NOT NULL,
	verify BOOLEAN NOT NULL,
	mssv VARCHAR(60) NOT NULL,
	university VARCHAR(100) NOT NULL,
	created DATETIME NOT NULL,
	image VARCHAR(50),
	CMND VARCHAR(20)
);

/* verify email, cmnd, scard, clerfied */
CREATE TABLE verify (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	from_user VARCHAR(30) NOT NULL,
	type VARCHAR(30),
	content VARCHAR(100),
	status VARCHAR(20),
	hash VARCHAR(32),
	FOREIGN KEY (from_user) REFERENCES user(username)
);

CREATE TABLE place (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	descript VARCHAR(200) NOT NULL,
	image VARCHAR(50)
);

CREATE TABLE price (
	start_from INT(6) UNSIGNED,
	finish_to INT(6) UNSIGNED,
	amount FLOAT NOT NULL,
	FOREIGN KEY (start_from) references place(id),
	FOREIGN KEY (finish_to) references place(id),
	PRIMARY KEY (start_from, finish_to)
);

CREATE TABLE trip (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	owner VARCHAR(30) NOT NULL,
	guess VARCHAR(30),
	start_from INT(6) UNSIGNED NOT NULL,
	finish_to INT(6) UNSIGNED NOT NULL,
	timestart VARCHAR(30) NOT NULL,	
	created DATETIME NOT NULL,
	note VARCHAR(1000),	
	code INT NOT NULL,
	success BOOLEAN NOT NULL,
	type_transaction VARCHAR(30),
	price FLOAT NOT NULL,
	FOREIGN KEY (start_from) references place(id),
	FOREIGN KEY (finish_to) references place(id),
	FOREIGN KEY (owner) references user(username),
	FOREIGN KEY (guess) references user(username)
);

CREATE TABLE needed_trip (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	asker VARCHAR(30) NOT NULL,
	timestart VARCHAR(30) NOT NULL,
	created DATETIME NOT NULL,
	start_from INT(6) UNSIGNED NOT NULL,
	finish_to INT(6) UNSIGNED NOT NULL,
	price FLOAT NOT NULL,
	type_transaction VARCHAR(30) NOT NULL,
	trip_id INT(6) UNSIGNED,
	FOREIGN KEY (start_from) references place(id),
	FOREIGN KEY (finish_to) references place(id),
	FOREIGN KEY (asker) references user(username)
);

CREATE TABLE request (	
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	trip_id INT(6) UNSIGNED NOT NULL,
	guess_id VARCHAR(30) NOT NULL,
	created DATETIME NOT NULL,
	type_transaction VARCHAR(30) NOT NULL,
	FOREIGN KEY (trip_id) references trip(id),
	FOREIGN KEY (guess_id) references user(username)	
);

CREATE TABLE conversation (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	first_user VARCHAR(30) NOT NULL,
	second_user VARCHAR(30) NOT NULL,
	FOREIGN KEY (first_user) references user(username),
	FOREIGN KEY (second_user) references user(username)
);

CREATE TABLE message (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	from_user VARCHAR(30) NOT NULL,
	to_user VARCHAR(30) NOT NULL,
	time DATETIME NOT NULL,
	content VARCHAR(300),
	seen BOOLEAN NOT NULL,
	conversation_id INT(6) UNSIGNED NOT NULL,
	FOREIGN KEY (from_user) references user(username),
	FOREIGN KEY (to_user) references user(username),
	FOREIGN KEY (conversation_id) REFERENCES conversation(id)
);

CREATE TABLE notify (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	to_user VARCHAR(30) NOT NULL,
	time DATETIME NOT NULL,
	content VARCHAR(300) NOT NULL,
	type_noti VARCHAR(30),
	where_noti VARCHAR(10),
	seen BOOLEAN NOT NULL,
	FOREIGN KEY (to_user) REFERENCES user(username)
);

CREATE TABLE review (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	from_user VARCHAR(30) NOT NULL,
	to_user VARCHAR(30) NOT NULL,
	content VARCHAR(300),
	created DATETIME,
	FOREIGN KEY (from_user) references user(username),
	FOREIGN KEY (to_user) references user(username)
);

CREATE TABLE report (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	from_user VARCHAR(30) NOT NULL,
	to_user VARCHAR(30) NOT NULL,	
	reason VARCHAR(300) NOT NULL,
	FOREIGN KEY (from_user) references user(username),
	FOREIGN KEY (to_user) references user(username)
);

CREATE TABLE comment (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id VARCHAR(30)  NOT NULL,
	trip_id INT(6) UNSIGNED NOT NULL,
	created DATETIME NOT NULL,
	content VARCHAR(300) NOT NULL,
	seen BOOLEAN NOT NULL,
	FOREIGN KEY (user_id) REFERENCES user(username),
	FOREIGN KEY (trip_id) REFERENCES trip(id)
);

CREATE TABLE matched (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user1 VARCHAR(30) NOT NULL,
	user2 VARCHAR(30) NOT NULL,
	FOREIGN KEY (user1) REFERENCES user(username),
	FOREIGN KEY (user2) REFERENCES user(username)
);

CREATE TABLE verify_trip(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	trip_id INT(6) UNSIGNED NOT NULL,
	from_user VARCHAR(30) NOT NULL,
	created DATETIME NOT NULL,
	content VARCHAR(10) NOT NULL,
	FOREIGN KEY (from_user) REFERENCES user(username),
	FOREIGN KEY (trip_id) REFERENCES trip(id)
);


CREATE TABLE trip (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	owner VARCHAR(30) NOT NULL,
	guess VARCHAR(30),
	start_from INT(6) UNSIGNED NOT NULL,
	finish_to INT(6) UNSIGNED NOT NULL,
	timestart VARCHAR(30) NOT NULL,	
	created DATETIME NOT NULL,
	note VARCHAR(1000),	
	code INT NOT NULL,
	v_owner BOOLEAN NOT NULL,
	v_guess BOOLEAN NOT NULL,
	type_transaction VARCHAR(30),
	price FLOAT NOT NULL,
	FOREIGN KEY (start_from) references place(id),
	FOREIGN KEY (finish_to) references place(id),
	FOREIGN KEY (owner) references user(username),
	FOREIGN KEY (guess) references user(username)
);

ALTER TABLE trip DROP COLUMN note;
ALTER TABLE trip DROP COLUMN success;
ALTER TABLE trip DROP COLUMN type_transaction;
ALTER TABLE trip ADD v_owner BOOLEAN;
ALTER TABLE trip ADD v_guess BOOLEAN;

ALTER TABLE user ADD status DATETIME;
ALTER TABLE user ADD tai_xe BOOLEAN;


ALTER TABLE user ADD university VARCHAR(100);
ALTER TABLE user ADD subject VARCHAR(100);

CREATE TABLE cards (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id VARCHAR(30),
	price INT(6) NOT NULL,
	private_code VARCHAR(15) NOT NULL,	
	used_date DATETIME,
	is_used BOOLEAN
);

ALTER TABLE user ADD noti_email BOOLEAN;

CREATE TABLE send_mail(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	
)