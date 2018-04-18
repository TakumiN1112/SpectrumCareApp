CREATE TABLE 'USER' (
  'id' int(10) NOT NULL,
  'firstname' varchar(30) NOT NULL,
  'surname' varchar(30) NOT NULL,
  'email' varchar(50) NOT NULL,
  'password' varchar(50) NOT NULL
) AUTO_INCREMENT = 1 ;

ALTER TABLE 'USER' ADD PRIMARY KEY ('id');
ALTER TABLE 'USER' MODIFY 'id' int(10) NOT NULL AUTO_INCREMENT;
