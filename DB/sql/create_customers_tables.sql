use customers;

create table if not exists users
(id int primary key auto_increment,
 name varchar(64) not null,
 sname varchar(64) not null,
 expired date
);

create table if not exists logins
(id int auto_increment,
 user_id int not null,
 login varchar(64) not null,
 password varchar(64) not null,
 expires date,
 is_locked boolean not null default 0,
 constraint foreign key login_user_id (user_id) references users(id),
 primary key (id)

);

