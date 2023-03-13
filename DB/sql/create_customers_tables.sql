use customers;

create table if not exists users
(id int primary key auto_increment,
 name varchar(64) not null,
 sname varchar(64) not null,
 expired date
)