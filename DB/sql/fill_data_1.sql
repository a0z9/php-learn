use customers;

insert into users(name,sname,expired)
values("Kate","The Student", date_add(now(),interval 7 day));

select * from users;

insert into logins(user_id,login,password,expires)
values (3,"kate",sha2("pass",256), date_add(now(),interval 15 day)); 

---- transaction test -------
start transaction;

insert into users(name,sname,expired)
values("Jane","The Student", date_add(now(),interval 7 day));

set @id = last_insert_id();
select @id as 'imserted id';
insert into logins(user_id,login,password,expires)
values (@id,"jane",sha2("pass",256), date_add(now(),interval 15 day)); 

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