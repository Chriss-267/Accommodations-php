use alojamientos;
select * from accommodations;
select * from users;
select * from user_selections;

INSERT INTO users( username, email,
                password, rol) VALUES ('wi','wi@gmail.com',1234,'usuario');
                
                INSERT INTO users( username, email,
                password, rol) VALUES ('leo','le@gmail.com',1234,'usuario');
                
 CREATE TABLE `user_selections` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `accommodation_id` int(11) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations`(`id_accomodation`) ON DELETE CASCADE,
    UNIQUE KEY `unique_selection` (`user_id`, `accommodation_id`)
);
