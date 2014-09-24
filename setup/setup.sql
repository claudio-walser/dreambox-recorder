CREATE DATABASE `dreambox-recorder`;

CREATE TABLE `dreambox-recorder`.`recording` (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	token VARCHAR(255),
	state VARCHAR(255),
	timeStart INT(11),
	timeEnd INT(11),
	file VARCHAR(255),
	title VARCHAR(255),
	subtitle VARCHAR(255),
	serviceName VARCHAR(255)
);


#ALTER TABLE `dreambox-recorder`.`recording`
#ADD serviceName VARCHAR(255);