create table text_archives (
id int not null primary key auto_increment,
user varchar(20) default 'unknown',
txt  varchar(200) not null,
created timestamp default current_timestamp
);
