DROP DATABASE IF EXISTS Library;

CREATE DATABASE Library;
USE Library;

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `review` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `mybooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `review` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--evt accounts 
INSERT INTO `users` (`username`, `password`) VALUES
('Admin', 'Password'),



-- prop boeken
INSERT INTO `wishlist` (`isbn`, `title`, `description`, `review`, `author`, `photo_path`) VALUES
('9780307275550', 'The Road', 'A post-apocalyptic novel about a father and son\'s journey.', 'A haunting and powerful story.', 'Cormac McCarthy', './uploads/butterfly.jpg'),
('9780385504201', 'The Da Vinci Code', 'A mystery thriller that involves a symbologist and a cryptologist.', 'A fast-paced and intriguing novel.', 'Dan Brown', './uploads/butterfly.jpg'),
('9780439064873', 'Harry Potter and the Chamber of Secrets', 'The second book in the Harry Potter series.', 'An exciting and magical adventure.', 'J.K. Rowling', './uploads/butterfly.jpg'),
('9780553380163', 'The Catcher in the Rye', 'A novel about the teenage angst and alienation of Holden Caulfield.', 'A classic coming-of-age story.', 'J.D. Salinger', './uploads/butterfly.jpg');


INSERT INTO `mybooks` (`isbn`, `title`, `description`, `review`, `author`, `photo_path`) VALUES
('9780451524935', '1984', 'A dystopian novel set in a totalitarian society under constant surveillance.', 'A chilling and thought-provoking book.', 'George Orwell', './uploads/butterfly.jpg'),
('9780679783268', 'Pride and Prejudice', 'A romantic novel that explores the themes of love and social standing.', 'A timeless and witty romance.', 'Jane Austen', './uploads/butterfly.jpg'),
('9780316769488', 'The Catcher in the Rye', 'A novel about the teenage angst and alienation of Holden Caulfield.', 'A classic coming-of-age story.', 'J.D. Salinger', './uploads/butterfly.jpg'),
('9780743273565', 'The Great Gatsby', 'A novel about the American dream and the disillusionment of the Jazz Age.', 'A beautifully written and tragic story.', 'F. Scott Fitzgerald', './uploads/butterfly.jpg'),
('9780140449136', 'The Odyssey', 'An epic poem about the adventures of Odysseus on his journey home.', 'An epic and timeless tale.', 'Homer', './uploads/butterfly.jpg');

ALTER TABLE `users` ADD COLUMN `session_token` VARCHAR(255);
