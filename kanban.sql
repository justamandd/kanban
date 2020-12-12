create database kanban;
use kanban;

create table user(
	id int PRIMARY KEY AUTO_INCREMENT,
    username varchar(30),
    alias varchar(30),
    email varchar(50),
    password varchar(100),
    userPerm char(1)
);

create table board(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(30),
    description varchar(100),
    id_usuario int,
    foreign key(id_usuario) references user(id)
);

create table list(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(20),
    id_boardList int
);

create table boardList(
	id int,
	id_board int,
    id_list int,
    primary key(id),
    foreign key(id_board) references board(id),
    foreign key(id_list) references list(id)
);

create table card(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(20),
    description varchar(250),
    id_list int,
    foreign key(id_list) references list(id)
);

select * from user;
