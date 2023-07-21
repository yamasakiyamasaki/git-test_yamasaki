CREATE DATABASE `git-test`;
USE `git-test`;
CREATE TABLE `comments` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `comments`
--

INSERT INTO `comments` (`name`, `email`, `message`) VALUES
('', '', ''),
('', '', '');
COMMIT;