CREATE TABLE user(
    login VARCHAR(20),
    pass VARCHAR(20),
    admin TINYINT
);

INSERT INTO user(login, pass, admin) VALUES('admin', 'secret', 1);
INSERT INTO user(login, pass, admin) VALUES('manu', 'secret', 0);

