use customers;

insert into users(name,sname,expired)
values("Kate","The Student", date_add(now(),interval 7 day));

select * from users;

insert into logins(user_id,login,password,expires)
values (3,"kate",sha2("pass",256), date_add(now(),interval 15 day)); 

---- transaction test -------
start transaction;

insert into users(name,sname,expired)
values("Lucy","The Student", date_add(now(),interval 7 day));

set @id = last_insert_id();
select @id as 'inserted id';
insert into logins(user_id,login,password,expires)
values (@id,"jucy",sha2("pass",256), date_add(now(),interval 15 day)); 
-- test transaction rollback
-- values (25,"jucy",sha2("pass",256), date_add(now(),interval 15 day)); 

commit;


select * from logins;

--- old style
select name, sname, login
from logins, users
where logins.user_id = users.id;

-- join style
select u.name, u.sname, l.login
from logins l
join users u
on l.user_id = u.id;

select u.name, u.sname, l.login
from logins l
right join users u
on l.user_id = u.id;

insert into logins(user_id,login,password,expires)
values (7,"peter",sha2("pass",256), date_add(now(),interval 15 day)); 