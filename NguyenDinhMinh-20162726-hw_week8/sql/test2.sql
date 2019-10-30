-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `test2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `phonenumber` text NOT NULL,
  `password` text NOT NULL,
  `sex` text NOT NULL,
  `hobbies` text NOT NULL,
  `bday` date NOT NULL,
  `program` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `password`, `sex`, `hobbies`, `bday`, `program`, `reg_date`) VALUES
(9, 'Minh Duc', 'Nguyen ', 'aaa@aa.com', '12312', '4123', 'male', 'sport', '2019-10-10', 'sie', '2019-10-05 08:44:41'),
(10, 'Hillary', 'Rodham Clinton', 'hill@mail.com', '01234', '123', 'female', 'sport, music', '2019-10-02', 'ict', '2019-10-05 08:44:41'),
(11, 'minhla', 'asdas', '123@ass', '1231', '', 'female', 'sport', '2019-10-01', 'dsai', '2019-10-05 08:44:41'),
(14, 'Ruge', 'Eugen ', 'euge123@mail.com', '1112', 'a123456', 'male', 'reading', '2000-01-18', 'hedspi', '2019-10-05 09:02:04');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
