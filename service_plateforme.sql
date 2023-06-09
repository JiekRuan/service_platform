CREATE TABLE `Users` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `password` varchar(255) NOT NULL,
  `email` varchar(255) UNIQUE NOT NULL,
  `phone` varchar(15),
  `role` varchar(30) DEFAULT null,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
  `status` varchar(15) DEFAULT 'active'
);

CREATE TABLE `apartments` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `arrondissement` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `squareMeter` int(11) DEFAULT NULL,
  `numberBathroom` int(11) DEFAULT NULL,
  `housingType` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `balcon` varchar(255) DEFAULT NULL,
  `terasse` varchar(255) DEFAULT NULL,
  `vueSur` varchar(255) DEFAULT NULL,
  `quartier` varchar(255) DEFAULT NULL
);

CREATE TABLE `apartment_photos` (
  `apartment_id` int(11),
  `photo` varchar(255)
);

CREATE TABLE `Services` (
  `apartment_id` int(11),
  `service` varchar(255)
);

DROP TABLE IF EXISTS `opinion`;
CREATE TABLE IF NOT EXISTS `opinion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Opinion_photos` (
  `opinion_id` int(11),
  `picture` varchar(255)
);

CREATE TABLE `Maintenance` (
  `reservation_id` int(11),
  `start_time` date,
  `apartment_id` int(11),
  `team_id` int(4),
  `note` varchar(255)
);

CREATE TABLE `Favorites` (
  `user_id` int(11),
  `apartment_id` int
);

CREATE TABLE `Reservation` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` int(11),
  `apartment_id` int(11),
  `start_time` date,
  `end_time` date,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Reservation_support` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11),
  `intern_id` int(11)
);

CREATE TABLE `Reservation_support_messages` (
  `reservation_support_id` int(11),
  `content` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Session` (
  `token` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
  `expiration_date` TIMESTAMP DEFAULT DATEADD(hour, 1, CURRENT_TIMESTAMP)
);

ALTER TABLE `Reservation` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Reservation` ADD FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`);

ALTER TABLE `apartment_photos` ADD FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`);

ALTER TABLE `Maintenance` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Opinion` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Services` ADD FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`);

ALTER TABLE `Reservation_support` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Reservation_support` ADD FOREIGN KEY (`intern_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Reservation_support_messages` ADD FOREIGN KEY (`reservation_support_id`) REFERENCES `Reservation_support` (`id`);

ALTER TABLE `Favorites` ADD FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`);

ALTER TABLE `Favorites` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Opinion_photos` ADD FOREIGN KEY (`opinion_id`) REFERENCES `Opinion` (`id`);

ALTER TABLE `Session` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE favorites
ADD CONSTRAINT unique_favorite
UNIQUE (user_id, apartment_id);