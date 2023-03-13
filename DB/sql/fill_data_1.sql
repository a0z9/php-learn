use customers;

insert into users(name,sname,expired)
values("Andrei","The Admin", date_add(now(),interval 7 day));

select * from users;

insert into logins(user_id,login,password,expires)
values (1,"basil2",sha2("pass",256), date_add(now(),interval 15 day)) 


select * from logins;