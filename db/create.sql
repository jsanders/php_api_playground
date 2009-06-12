create table visitors (
  id int not null auto_increment,
  name varchar(100),
  location varchar(100), 
  message varchar(100),
  tinyurl varchar(32),
  generatedid char(7),
  primary key (id) 
);
