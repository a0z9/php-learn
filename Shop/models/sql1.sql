select * from users;

select u.name, u.sname, l.login, l.pass
from logins l
right join users u
on l.user_id = u.id;