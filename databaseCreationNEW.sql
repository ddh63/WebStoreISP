CREATE DATABASE `ispproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `ispproject`;

CREATE TABLE IF NOT EXISTS `users` (
	`user_id` int(10) NOT NULL AUTO_INCREMENT primary key,
	`username` varchar(20) DEFAULT NULL,
	`password` varchar(20) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `products` (
	`product_id` int(10) NOT NULL AUTO_INCREMENT primary key,
	`product_name` varchar(30) DEFAULT NULL,
	`product_price` decimal(10,2) DEFAULT NULL,
	`product_desc` varchar(255) DEFAULT NULL,
	`product_img` varchar(255) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `users_cart` (
	`user_id` int(10) DEFAULT NULL,
	`product_id` int(10) DEFAULT NULL,
	`product_size` varchar(2) DEFAULT NULL,
	`quantity` int(10) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `sizes` (
	`id` int(10) NOT NULL primary key,
	`size` varchar(2) DEFAULT NULL,
	`order` int(10) NOT NULL
);

CREATE TABLE IF NOT EXISTS `product_sizes` (
	`product_id` int(10) NOT NULL,
	`size_id` int(10) NOT NULL
);

INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 19.99, 'A nice shirt', 'img/products/1.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 18.99, 'A nice shirt', 'img/products/2.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 17.99, 'A nice shirt', 'img/products/3.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 16.99, 'A nice shirt', 'img/products/4.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 15.99, 'A nice shirt', 'img/products/5.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 14.99, 'A nice shirt', 'img/products/6.jpg');
INSERT INTO `products` (`product_name`, `product_price`, `product_desc`, `product_img`) VALUES('Shirt', 13.99, 'A nice shirt', 'img/products/7.jpg');

INSERT INTO `sizes` (`id`, `size`, `order`) VALUES(1, 'S', 10);
INSERT INTO `sizes` (`id`, `size`, `order`) VALUES(2, 'M', 20);
INSERT INTO `sizes` (`id`, `size`, `order`) VALUES(3, 'L', 30);
INSERT INTO `sizes` (`id`, `size`, `order`) VALUES(4, 'XL', 40);

INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(1, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(1, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(1, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(1, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(2, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(2, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(2, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(2, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(3, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(3, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(3, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(3, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(4, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(4, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(4, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(4, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(5, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(5, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(5, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(5, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(6, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(6, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(6, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(6, 4);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(7, 1);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(7, 2);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(7, 3);
INSERT INTO `product_sizes` (`product_id`, `size_id`) VALUES(7, 4);

INSERT INTO `users` (`username`, `password`) VALUES('firstuser', 'password');