SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `miesto` text NOT NULL,
    `nazov`    text DEFAULT NULL,
    `obrazok` varchar(300) NOT NULL,
    `text` text NOT NULL,
    `datum` text NOT NULL,
    `user` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user`) REFERENCES users(`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;
