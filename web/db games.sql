create table games (
	gameid serial primary key,
	priority int not null,
	title text not null,
	price int not null,
	publisherid int not null,
	platformid int not null,
	releasedate date not null,
	dateadded date not null,
	rating text not null);

create table publishers (
	publisherid serial primary key,
	name text not null,
	url text not null
);

create table platforms (
	platformid serial primary key,
	title text not null
);

insert into games (priority,title,price,publisherid,platformid,releasedate,dateadded,rating)
	values (1,'Overwatch',40.00,1,1,'2016-5-24',now(),'T');

insert into games (priority,title,price,publisherid,platformid,releasedate,dateadded,rating)
	values (2,'Diablo III',20,1,1,'2012-5-15',now(),'M');

insert into games (priority,title,price,publisherid,platformid,releasedate,dateadded,rating)
	values (3,'Hearthstone',0,1,1,'2014-3-11',now(),'T');

insert into games (priority,title,price,publisherid,platformid,releasedate,dateadded,rating)
	values (4,'World of Warcraft',15,1,1,'2004-11-23',now(),'T');

SELECT priority, title, price, releasedate, dateadded, rating, p.name, p.url 
FROM games g
INNER JOIN publishers p on p.publisherid = g.publisherid
