CREATE TABLE user(
    login VARCHAR(20),
    mail VARCHAR(40),
    pass VARCHAR(20),
    admin TINYINT
);

INSERT INTO user(login, mail, pass, admin) VALUES('admin', 'admin@mail.com', 'secret', 1);
INSERT INTO user(login, mail, pass, admin) VALUES('manu', 'manu@othermail.com', 'secret', 0);
INSERT INTO user(login, mail, pass, admin) VALUES('marcel', 'marcel@anothermail.com', 'secret', 0);
INSERT INTO user(login, mail, pass, admin) VALUES('igor', 'igor@anothermail.com', 'secret', 0);

