drop database if exists piephp;
create database piephp;
user piephp;

create table users(
    users_id int(3) not null auto_increment,
    email varchar(255) not null UNIQUE,
    password varchar(255) not null,
    primary key(users_id);
)