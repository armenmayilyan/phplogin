CREATE TABLE `admins` (
                          `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                          `email` text NOT NULL,
                          `password` text NOT NULL,
                          `role` enum('all','manage_posts') NOT NULL
);