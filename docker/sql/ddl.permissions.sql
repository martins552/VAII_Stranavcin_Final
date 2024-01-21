SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`
(
    `id` int(11)      NOT NULL AUTO_INCREMENT,
    `type` int(11) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

INSERT INTO `permissions` (`id`, `type`, `description`)
VALUES (1, 1, 'Administratíávne oprávnenia'), (2, 2, 'Moderátorské oprávnenia'), (3, 3, 'Bežné oprívnenia');