DROP TABLE USER;

CREATE TABLE user (
	email varchar(255) NOT NULL PRIMARY KEY,
	password varchar(255) NOT NULL,
	phone varchar(25),
	firstname varchar(25),
	lastname varchar(25),
	spoken_language varchar(15),
	is_admin int NOT NULL
)

DROP TABLE TRIP;

CREATE TABLE trip {
	id int NOT NULL AUTO_INCREMENT,
	name varchar(50),
	duration varchar(10),
	description text,
	image varchar(255),
	lang varchar(20),
}

DROP TABLE BOOKING;

CREATE TABLE booking {
	id int NOT NULL AUTO_INCREMENT,
	start_date datetime NOT NULL,
	end_date datime NOT NULL,
	meeting_point varchar(255),
	comment varchar(255),
	trip_id int,
	CONSTRAINT fk_TripId FOREIGN KEY (trip_id) REFERENCES trip(id)
}