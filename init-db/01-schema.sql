USE inventorymanagement;

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`product_id`, `product_name`, `price`, `quantity`) VALUES
(1, 'iPhone 14', 100000, 990),
(2, 'iPhone 13', 64900, 550),
(3, 'iPhone SE', 49000, 100),
(4, 'iPhone 12', 59900, 15000),
(5, 'MacBook Air 13', 99900, 596),
(6, 'MacBook Pro 14', 199900, 450),
(7, 'iMac24', 129900, 30),
(8, 'Mac Mini', 49000, 700),
(9, 'Apple Watch Ultra', 89900, 300),
(10, 'Apple Watch SE', 29900, 500),
(11, 'AirPods', 14900, 1500),
(12, 'AirPods Max', 59000, 900),
(14, 'Apple TV 8K', 599000, 150);

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'admin@apple.com', '$2y$10$ILlZGyREPx6jLC2ImzKHj.TWZQ8Q54UpGyLzv3RR3mv/xt88shn9u');
