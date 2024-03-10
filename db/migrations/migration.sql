CREATE DATABASE IF NOT EXISTS catalog;
USE catalog;
CREATE TABLE IF NOT EXISTS categories (id INT unsigned NOT NULL AUTO_INCREMENT,
                                        name VARCHAR(255) NOT NULL,
                                        parent_id INT unsigned,
                                        PRIMARY KEY(id),
                                        FOREIGN KEY(parent_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE
                                        );