-- (RE)INITIALISATION DE LA BASE DE DONNEES db_trips (TP Agence de Voyages)

DROP DATABASE IF EXISTS db_bibli;

CREATE DATABASE IF NOT EXISTS db_bibli CHARACTER SET utf8 COLLATE utf8_general_ci; 

USE db_bibli;

-- clients ( client_id, client_name, client_address )
-- books ( book_id, book_title, book_editor, book_date, book_state )
-- authors ( author_id, author_name )
-- books_clients ( #book_id, #client_id,  loan_date, loan_return)
-- books_authors (#book_id, #author_id)


CREATE TABLE clients 
(
	client_id INT PRIMARY KEY AUTO_INCREMENT,
    client_name VARCHAR(50) NOT NULL,
    client_address VARCHAR(255) NOT NULL,
    client_deposit TINYINT UNSIGNED NOT NULL
)
Engine=InnoDb;

CREATE TABLE books(
   book_id INT AUTO_INCREMENT,
   book_title VARCHAR(100) NOT NULL,
   book_editor VARCHAR(50) NOT NULL,
   book_date DATETIME NOT NULL,
   book_state VARCHAR(255),
   PRIMARY KEY(book_id)
)
Engine=InnoDb;

CREATE TABLE authors(
   author_id INT AUTO_INCREMENT,
   author_name VARCHAR(50) NOT NULL,
   PRIMARY KEY(author_id)
)
Engine=InnoDb;

CREATE TABLE books_authors(
   book_id INT,
   author_id INT,
   PRIMARY KEY(book_id, author_id),
   FOREIGN KEY(book_id) REFERENCES books(book_id),
   FOREIGN KEY(author_id) REFERENCES authors(author_id)
)
Engine=InnoDb;

CREATE TABLE books_clients
(
	book_id INT,
    client_id INT,
    loan_date DATETIME NOT NULL,
    loan_return DATETIME NULL,
    PRIMPRIMARYARY KEY(book_id, client_id)
)
Engine=InnoDb;


ALTER TABLE books_clients 
	ADD FOREIGN KEY (book_id) REFERENCES books(book_id);

