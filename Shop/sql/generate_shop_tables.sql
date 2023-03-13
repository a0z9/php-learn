-- create db
create database if not exists shop2;

grant all on shop2.* to shop_user;
flush privileges; 

use shop2;

-- create tables
create table if not exists users(
    id int primary key auto_increment,
    name varchar(64) not null,
    sname varchar(64) not null,
    constraint unique full_name(name,sname)
);

create table if not exists logins(
    id int primary key auto_increment,
    user_id int not null unique,
    login varchar(64) not null unique,
    pass varchar(1024) not null,
    expired date not null default DATE_ADD(now(), INTERVAL 31 DAY),
    is_locked boolean not null default 0,
    foreign key (user_id) references users (id) 
);

create table if not exists store(
    id int primary key auto_increment,
    name varchar(64) not null,
    qty int not null check (qty >= 0),
    price float not null check (price >= 0)
);

create table if not exists orders(
    id int primary key auto_increment,
    name varchar(64) not null,
    login_id int not null,
    order_date datetime not null default now(),
    payment_date datetime,
    status boolean not null default 0,
    foreign key (login_id) references logins(id)
);

create table if not exists orders(
    id int primary key auto_increment,
    name varchar(64) not null,
    login_id int not null,
    order_date datetime not null default now(),
    payment_date datetime,
    status boolean not null default 0,
    foreign key (login_id) references logins(id)
);

create table if not exists order_details(
    id int auto_increment,
    order_id int not null,
    store_id int not null,
    qty int not null check (qty >= 0),
    foreign key (order_id) references orders(id),
    foreign key (store_id) references store(id),
    unique key order_details_key(id),
    primary key (order_id, store_id)
);
