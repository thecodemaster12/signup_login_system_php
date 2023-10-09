-- For users table
CREATE TABLE users (
    id int(11) NOT null AUTO_INCREMENT,
    username varchar(30) not null,
    email varchar(100),
    pwd varchar(255),
    created_at datetime NOT null DEFAULT CURRENT_DATE,
    PRIMARY key (id)
);