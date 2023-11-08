CREATE DATABASE station;
USE station;

CREATE TABLE users(
    id int(255) auto_increment not null,
    username varchar(255) not null,
    surname varchar(255),
    user_type varchar(255) not null,
    email varchar(255) not null,
    user_password varchar(255) not null,
    userslocation varchar(255),
    profile_image varchar(255),
    hiring_info text,
CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE = InnoDb;

INSERT INTO users VALUES(NULL, 'Admin', 'Admin', 'admin', 'admin@admin.com', 'password', 'spain', null, null);
ALTER TABLE users ADD registration_date date null; 

CREATE TABLE categories(
    id int(255) auto_increment not null,
    category_name varchar(255) not null,
    category_description text,
CONSTRAINT pk_categories PRIMARY KEY (id)
)ENGINE = InnoDb;

INSERT INTO categories VALUES(NULL, 'Default', 'Default category');

CREATE TABLE publications(
    id int(255) auto_increment not null,
    category_id int(255) not null,
    users_id int(255) not null,
    title text not null,
    content text,
    img file,
    publication_date date not null,
    views int(255),
    visibility varchar(255),
CONSTRAINT pk_publications PRIMARY KEY(id),
CONSTRAINT fk_publication_category FOREIGN KEY(category_id) REFERENCES categories(id),
CONSTRAINT fk_publication_user FOREIGN KEY(users_id) REFERENCES users(id)
)ENGINE = InnoDb;

INSERT INTO publications VALUES(NULL, 1, 1, 'New Publication', 'Write the content over here', CURRENT_DATE, NULL, 'PUBLIC');

CREATE TABLE publicationlikes(
    id int(255) auto_increment not null,
    publication_id int(255) not null,
    users_id int(255) not null,
CONSTRAINT pk_publicationlikes PRIMARY KEY (id),
CONSTRAINT fk_publicationlike_publication FOREIGN KEY (publication_id) REFERENCES publications(id),
CONSTRAINT fk_publicationlike_user FOREIGN KEY (users_id) REFERENCES users(id)
)ENGINE = InnoDb;

INSERT INTO publicationlikes VALUES(NULL, 1, 1);

CREATE TABLE images(
    id int(255) auto_increment not null,
    publication_id int(255) not null,
    title varchar(255) not null,
    alt varchar(255),
    img_format varchar(255),
CONSTRAINT pk_images PRIMARY KEY (id),
CONSTRAINT fk_image_publication FOREIGN KEY (publication_id) REFERENCES publications(id)
)ENGINE = InnoDb;

INSERT INTO images VALUES(NULL, 1, 'Default Image', 'default image', NULL);

CREATE TABLE comments(
    id int(255) auto_increment not null,
    users_id int(255) not null,
    publication_id int(255) not null,
    content text not null,
    comment_date date,
CONSTRAINT pk_comments PRIMARY KEY (id),
CONSTRAINT fk_comment_user FOREIGN KEY (users_id) REFERENCES users(id),
CONSTRAINT fk_comment_publication FOREIGN KEY (publication_id) REFERENCES publications(id)
)ENGINE = InnoDb;

INSERT INTO comments VALUES(NULL, 1, 'Write your comment...', CURRENT_DATE);

CREATE TABLE commentanswers(
    id int(255) auto_increment not null,
    comment_id int(255) not null,
    content text not null,
    commentanswer_date date,
CONSTRAINT pk_commentanwers PRIMARY KEY (id),
CONSTRAINT fk_commentanswer_comment FOREIGN KEY (comment_id) REFERENCES comments(id)
)ENGINE = InnoDb;

INSERT INTO commentanswers VALUES(NULL, 1, 'Default Content', CURRENT_DATE);

CREATE TABLE commentlikes(
    id int(255) auto_increment not null,
    comment_id int(255) not null,
    users_id int(255) not null,
CONSTRAINT pk_commentanwers PRIMARY KEY (id),
CONSTRAINT fk_commentlike_comment FOREIGN KEY (comment_id) REFERENCES comments(id)
)ENGINE = InnoDb;

INSERT INTO commentlikes VALUES(NULL, 1, 1);

CREATE TABLE products(
    id int(255) auto_increment not null,
    users_id int(255) not null,
    product_name text not null,
    product_description text,
    price float(255, 2) not null,
    upload_date date,
CONSTRAINT pk_products PRIMARY KEY (id),
CONSTRAINT fk_product_user FOREIGN KEY (users_id) REFERENCES users(id)
)Engine=InnoDb;

INSERT INTO products VALUES(NULL, 1, 'Producto 1', 'Es el primer producto', 14.99, CURRENT_DATE );

CREATE TABLE purchases(
    id int(255) auto_increment not null,
    purchase_date date,
CONSTRAINT pk_purchases PRIMARY KEY (id)
)Engine=InnoDb;

INSERT INTO purchases VALUES(NULL, CURRENT_DATE);

CREATE TABLE lines_purchases(
    id int(255) auto_increment not null,
    users_id int(255) not null,
    purchase_id int(255) not null,
CONSTRAINT pk_lines_purchases PRIMARY KEY (id),
CONSTRAINT fk_line_user FOREIGN KEY (users_id) REFERENCES users(id),
CONSTRAINT fk_line_purchase FOREIGN KEY (purchase_id) REFERENCES purchases(id)
)Engine=InnoDb;

CREATE TABLE challenges(
    id int(255) auto_increment not null,
    publication_id int(255) not null,
    challenge_start date,
    challenge_end date,
    challenge_name text not null,
    challenge_description text,
CONSTRAINT pk_challenges PRIMARY KEY (id),
CONSTRAINT fk_challenge_publication FOREIGN KEY (publication_id) REFERENCES publications(id)
)Engine=InnoDb;

INSERT INTO products VALUES(NULL, 1, CURRENT_DATE, CURRENT_DATE, 'Desafío 1', 'El primer concurso');
