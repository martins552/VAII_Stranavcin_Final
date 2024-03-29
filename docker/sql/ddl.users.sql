SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `username` text NOT NULL,
    `password` text NOT NULL,
    `email`    text DEFAULT NULL,
    `birthdate` date NOT NULL,
    `obrazok` varchar(300) NOT NULL,
    `permission` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`permission`) references permissions(`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `users` (id, username, password, birthdate, obrazok, permission)
VALUES (1, 'admin', '$2y$10$OmbuvCUN21PlAUR25jXlAugiT6JZzFwE4ClQ6nVU5rt9IiCWWjGAO', 1999-01-01, '26029600639913-default_avatar.jpg', 1);