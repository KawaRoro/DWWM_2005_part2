DROP DATABASE IF EXISTS db_users_simple;

CREATE DATABASE db_users_simple CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use db_users_simple;



CREATE TABLE users_roles(
   role_id INT PRIMARY KEY AUTO_INCREMENT,
   role_name VARCHAR(32) NOT NULL,
   role_level INT NOT NULL,
   UNIQUE(role_name)
);

CREATE TABLE users(
   user_id INT PRIMARY KEY AUTO_INCREMENT,
   user_name VARCHAR(32) NOT NULL,
   user_email VARCHAR(128) NOT NULL,
   user_pwd CHAR(60),
   user_role INT NOT NULL,
   UNIQUE(user_name),
   UNIQUE(user_email)   
);


ALTER TABLE users 
    ADD CONSTRAINT fk_user_role FOREIGN KEY(user_role) REFERENCES users_roles(role_id);



CREATE VIEW users_view
AS
SELECT * FROM users 
INNER JOIN users_roles ON users.user_role = users_roles.role_id;



INSERT INTO users_roles 
(role_name, role_level)
VALUES
('Invité', 0),
('Client', 1),
('Commercial', 10),
('Administrateur', 100);

INSERT INTO users 
(user_name, user_email, user_pwd, user_role) 
VALUES 
('guest', 'name@example.com', '$2y$10$HyRgOxmXTZLledYsRtcWJ.qGYPTvJgofQQw/sBUxduCfTfh3HpROa', 1),
('admin', 'admin@agence.fr', '$2y$10$0NhX0eZJTogKL8HVZLIyYO7UP9qJCah30VzX69hgxKTZ6IgMff/lC', 4),
('com1', 'com1@agence.fr', '$2y$10$rASnJrRfubEeiHq18Oh/p.cwkJ/ULEWlBf4Y38mbg9tHonLA2H0LG', 3),
('com2', 'com2@agence.fr', '$2y$10$KvRHSbLe55y5ED/s2f41t.lTOHXNrjwiPzWwReMJ4RI5oWKnJaDoO', 3),
('com3', 'com3@agence.fr', '$2y$10$ptGhTF/xox4vVRM1yQ7BMeWsCbWwhTfAxB5xH5qsbHEYDxv5qQlj6', 3),
('client1', 'client1@email.fr', '$2y$10$c4BuXm6BqumMt.ubu3aryes7Xcjdne5Rulxpm3W7WIwud1.Lkbbai', 2),
('client2', 'client2@email.fr', '$2y$10$km7UZyLJicJK.qzgQt8Jg.GaDQe.Y8MonnN6GbK.6Y0989bzwvo3a', 2),
('client3', 'client3@email.fr', '$2y$10$jf7fGp0Y1UtPrb1DaBAfWOEe8AxuiSvR1rBed4nizVDB7dZVyRHc.', 2);



SELECT * FROM users_roles;
SELECT * FROM users;
SELECT * FROM users_view;
