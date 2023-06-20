CREATE TABLE `Users` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) UNIQUE NOT NULL,
  `phone` varchar(255),
  `role` varchar(255) DEFAULT null,
  `created_at` timestamp
);

CREATE TABLE `Appartments` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `location` varchar(255),
  `capacity` int,
  `price` int,
  `description` varchar(255)
);

CREATE TABLE `Appartment_photos` (
  `appartment_id` int,
  `photo` varchar(255)
);

CREATE TABLE `Services` (
  `appartment_id` int,
  `service` varchar(255)
);

CREATE TABLE `Opinion` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `reservation_id` int,
  `user_id` int,
  `content` varchar(255),
  `created_at` timestamp
);

CREATE TABLE `Opinion_photos` (
  `opinion_id` int,
  `picture` varchar(255)
);

CREATE TABLE `Maintenance` (
  `reservation_id` int,
  `start_time` date,
  `appartment_id` int,
  `team_id` int,
  `note` varchar(255)
);

CREATE TABLE `Favorites` (
  `user_id` int,
  `appartment_id` int
);

CREATE TABLE `Reservation` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `user_id` int,
  `appartment_id` int,
  `start_time` date,
  `end_time` date,
  `created_at` timestamp
);

CREATE TABLE `Reservation_support` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `reservation_id` int,
  `intern_id` int
);

CREATE TABLE `Reservation_support_messages` (
  `reservation_support_id` int,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp
);

ALTER TABLE `Reservation` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Reservation` ADD FOREIGN KEY (`appartment_id`) REFERENCES `Appartments` (`id`);

ALTER TABLE `Appartment_photos` ADD FOREIGN KEY (`appartment_id`) REFERENCES `Appartments` (`id`);

ALTER TABLE `Maintenance` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Opinion` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Services` ADD FOREIGN KEY (`appartment_id`) REFERENCES `Appartments` (`id`);

ALTER TABLE `Reservation_support` ADD FOREIGN KEY (`reservation_id`) REFERENCES `Reservation` (`id`);

ALTER TABLE `Reservation_support` ADD FOREIGN KEY (`intern_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Reservation_support_messages` ADD FOREIGN KEY (`reservation_support_id`) REFERENCES `Reservation_support` (`id`);

ALTER TABLE `Favorites` ADD FOREIGN KEY (`appartment_id`) REFERENCES `Appartments` (`id`);

ALTER TABLE `Favorites` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Opinion_photos` ADD FOREIGN KEY (`opinion_id`) REFERENCES `Opinion` (`id`);
