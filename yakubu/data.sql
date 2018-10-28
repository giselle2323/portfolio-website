CREATE DATABASE contactform; 
USE contactform; 
CREATE TABLE contact ( 
id INT NOT NULL AUTO_INCREMENT, 
contactname VARCHAR(150) NOT NULL, 
contactemail VARCHAR(150) NOT NULL,
contactsubject VARCHAR(150) NOT NULL,
contactmessage VARCHAR(400) NOT NULL,
created_date DATETIME, 
PRIMARY KEY ( id ) 
); 