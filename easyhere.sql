-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2018 at 08:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyhere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('hanh', 'aa78a8f0735a1bc3c74bffcf7a95b3c8');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trip_id` int(6) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `trip_id`, `created`, `content`, `seen`) VALUES
(3, 'Anhthu7920', 30, '2018-10-12 21:37:16', 'B ơi', 1),
(4, 'Anhthu7920', 30, '2018-10-12 21:37:27', 'Mai đi 7h nha', 1),
(5, 'Duy_Phuong', 30, '2018-10-12 21:38:17', 'okie, mai tầm 6h50 bạn chuẩn bị từ ph&ograve;ng của bạn ra cổng ktx nhen, 7h m&igrave;nh qua l&agrave; chở bạn đi lu&ocirc;n ', 1),
(6, 'Anhthu7920', 30, '2018-10-12 21:38:48', 'Đi ra ngo&agrave;i cổng hả b', 1),
(7, 'Anhthu7920', 30, '2018-10-12 21:38:58', 'Cổng trc hay sau ạ', 1),
(8, 'Duy_Phuong', 30, '2018-10-12 21:39:15', 'uhm, cổng bự bự mới x&acirc;y &aacute; :v', 1),
(9, 'Anhthu7920', 30, '2018-10-12 21:39:56', '0399 599 540 sdt t', 1),
(10, 'Duy_Phuong', 30, '2018-10-12 21:40:17', '0981.865.898 sđt tui', 1),
(11, 'Anhthu7920', 30, '2018-10-12 21:40:54', 'Đến đ&uacute;ng h nha b :&quot;&gt; để t c&oacute; thể ngủ th&ecirc;m 1 t&iacute;', 1),
(12, 'Duy_Phuong', 30, '2018-10-12 21:43:09', 'okie', 1),
(13, 'Anhthu7920', 30, '2018-10-12 21:46:03', '&Agrave; b c&oacute; mũ bảo hiểm kh ạ', 1),
(14, 'Duy_Phuong', 30, '2018-10-12 21:48:40', 'm&igrave;nh c&oacute; mũ bảo hiểm :P', 1),
(15, 'Duy_Phuong', 30, '2018-10-12 22:03:26', 'https://www.facebook.com/profile.php?id=100023295143166', 1),
(16, 'Duy_Phuong', 30, '2018-10-12 22:03:49', 'đ&acirc;y l&agrave; link facebook của m&igrave;nh, mai bạn thấy thằng y chang trong avrtar th&igrave; đ&oacute; l&agrave; m&igrave;nh :v', 1),
(17, 'Anhthu7920', 30, '2018-10-13 21:34:36', 'H&ocirc;m nay cảm ơn bạn nhiều lắm nha', 1),
(18, 'thinhlazero1', 43, '2018-10-13 23:09:03', 'Hi', 1),
(19, 'thinhlazero1', 43, '2018-10-13 23:13:04', 'Bạn đi đh khtn đ&uacute;ng k', 1),
(20, 'thinhlazero1', 43, '2018-10-13 23:26:55', 'S&aacute;ng mai cứ gọi tui ', 1),
(21, 'thinhlazero1', 43, '2018-10-13 23:27:18', 'Tui chở đi', 1),
(22, 'Anhthu7920', 43, '2018-10-14 05:07:33', 'Okay b. Tui ngủ sớm qu&aacute; h mới thấy tin nhắn', 1),
(23, 'Anhthu7920', 43, '2018-10-14 05:16:21', 'M&agrave; t kh thấy sdt ghi ở đ&acirc;u hết', 1),
(24, 'Anhthu7920', 43, '2018-10-14 05:16:47', 'Cứ 7h 10 đi l&agrave; ok. 0399 599 540 sdt t', 1),
(25, 'thinhlazero1', 43, '2018-10-14 06:39:03', 'Sđt t 0923674774', 1),
(26, 'Anhthu7920', 43, '2018-10-14 06:44:38', 'Gặp nhau ở đ&acirc;u vậy bạn', 1),
(27, 'thinhlazero1', 43, '2018-10-14 07:02:41', 'Trước ktx nha', 1),
(28, 'Anhthu7920', 43, '2018-10-14 07:03:24', 'V t đứng ngay cổng nha', 1),
(29, 'thinhlazero1', 43, '2018-10-14 07:03:59', 'Ok', 1),
(30, 'Duy_Phuong', 30, '2018-10-14 20:11:35', 'kh&ocirc;ng c&oacute; chi :P', 1),
(31, 'namnd', 49, '2018-10-14 20:11:47', 'hi bạn', 1),
(32, 'namnd', 49, '2018-10-14 20:15:38', 'bạn add fb.com/nam.uit cho dễ trao đổi nha :D', 1),
(34, 'dungdq97', 63, '2018-10-16 19:39:25', 'Bạn ơi cho m&igrave;nh số điện thoại để dễ li&ecirc;n lạc nh&eacute;', 1),
(35, 'dungdq97', 63, '2018-10-16 19:41:47', 'Số điện thoại của m&igrave;nh l&agrave; 0702918200', 1),
(36, 'minhduc2018', 65, '2018-10-16 20:24:43', 'bạn ơi m&igrave;nh c&oacute; thể li&ecirc;n lạc với bạn như thế n&agrave;o vậy???', 1),
(37, 'Anhthu7920', 65, '2018-10-16 20:32:04', '0399 599 540 sdt t nha', 1),
(38, 'Anhthu7920', 65, '2018-10-16 20:32:44', 'Bạn đi sớm hơn 7h 5\' dc kh ạ bởi v&igrave; gi&aacute;o vi&ecirc;n n&agrave;y khắt khe về thời gian', 1),
(39, 'minhduc2018', 65, '2018-10-16 20:33:51', 'bạn t&ograve;a n&agrave;o để m&igrave;nh chạy qua sdt minh 0363146409', 1),
(40, 'Anhthu7920', 65, '2018-10-16 20:36:10', 'Qua to&agrave; lu&ocirc;n hả', 1),
(41, 'Anhthu7920', 65, '2018-10-16 20:36:22', 'Wow', 1),
(42, 'minhduc2018', 65, '2018-10-16 20:38:39', 'hihi th&igrave; đưa rước đ&agrave;ng qu&agrave;ng chứ', 1),
(43, 'Anhthu7920', 65, '2018-10-16 20:40:17', 'To&agrave; ba3 b nha', 1),
(44, 'minhduc2018', 65, '2018-10-16 20:41:14', 'ministop h&atilde; bn', 1),
(45, 'Anhthu7920', 65, '2018-10-16 20:43:10', 'Family mart', 1),
(46, 'minhduc2018', 65, '2018-10-16 20:43:54', '&agrave; okay vậy 6h50 t qua bạn rồi đi nhỉ', 1),
(47, 'Anhthu7920', 65, '2018-10-16 20:44:09', 'Okay :&quot;&gt;', 1),
(48, 'minhduc2018', 65, '2018-10-16 20:46:41', 'okay bạn c&aacute;m ơn bạn hẹn gặp v&agrave;o ng&agrave;y mai ch&uacute;c bn buổi tối vui vẻ', 1),
(49, 'Anhthu7920', 65, '2018-10-16 20:50:00', 'Cảm ơn bạn. Buổi tối vui vẻ ^^', 1),
(50, 'Anhthu7920', 65, '2018-10-16 20:54:42', '&Agrave; b c&oacute; mũ bảo hiểm kh ạ', 1),
(51, 'minhduc2018', 65, '2018-10-16 20:55:47', 'khỏi cũng đc bạn ơi ', 1),
(52, 'Dancute', 66, '2018-10-16 20:57:41', 'Anh ơi , mai e c&oacute; thể gặp a ở đ&acirc;u để c&ugrave;ng đi ak', 1),
(53, 'Duy_Phuong', 66, '2018-10-16 20:58:19', 'k&yacute; t&uacute;c x&aacute; B nha bạn :v', 1),
(54, 'Duy_Phuong', 66, '2018-10-16 20:58:58', 'bạn gửi m&igrave;nh sđt, khi n&agrave;o tới m&igrave;nh nhắn', 1),
(55, 'Dancute', 66, '2018-10-16 21:00:41', '0924639307 đ&acirc;y a ơi', 1),
(56, 'Dancute', 66, '2018-10-16 21:01:04', ':)))', 1),
(58, 'Duy_Phuong', 66, '2018-10-16 21:02:14', 'sđt tớ: 0981.865.898', 1),
(62, 'Dancute', 66, '2018-10-16 21:05:00', ':))) um ', 1),
(65, 'Duy_Phuong', 66, '2018-10-16 21:06:45', 'đ&uacute;ng 7h tớ đến trước cổng ktx nhen :v', 1),
(67, 'Anhthu7920', 65, '2018-10-16 21:11:05', 'Lỡ mấy con pikachu thổi th&igrave; sao', 1),
(68, 'Dancute', 66, '2018-10-16 21:12:16', ':(( &Agrave; qu&ecirc;n ', 1),
(69, 'Dancute', 66, '2018-10-16 21:12:30', '7h v&agrave;o học td mất r', 1),
(70, 'Dancute', 66, '2018-10-16 21:12:43', '6h50 đi được hong :((((', 1),
(71, 'minhduc2018', 65, '2018-10-16 21:13:21', 'okay sợ bạn k th&iacute;ch th&ocirc;i chứ m&igrave;nh sao cũng đc', 1),
(72, 'Duy_Phuong', 66, '2018-10-16 21:39:59', 'anh mới tắm xong :v', 1),
(73, 'Duy_Phuong', 66, '2018-10-16 21:40:04', '6h55 nhen', 1),
(74, 'Duy_Phuong', 66, '2018-10-16 21:40:13', '6h50 anh sợ kh&ocirc;ng qua kịp', 1),
(75, 'TieuPhung', 63, '2018-10-16 21:41:36', '01222152415', 1),
(76, 'TieuPhung', 63, '2018-10-16 21:42:20', 'bạn ơi bạn v&agrave;o AG3 đ&oacute;n m&igrave;nh c&oacute; được kh&ocirc;ng?', 1),
(77, 'ntnhan', 68, '2018-10-16 22:20:42', 'Ch&agrave;o bạn, s&aacute;ng mai bạn li&ecirc;n hệ m&igrave;nh qua sđt: 01642 379 962 nha.', 1),
(78, 'ntnhan', 68, '2018-10-16 22:26:37', 'Vui l&ograve;ng để lại sđt của bạn để m&igrave;nh dễ li&ecirc;n hệ!', 1),
(79, 'quynhpham', 68, '2018-10-16 22:35:06', 'Bạn đ&oacute;n m&igrave;nh trước cổng khu A hay sao ạ?', 1),
(80, 'Dancute', 66, '2018-10-16 22:35:12', 'Dạ ', 1),
(81, 'Dancute', 66, '2018-10-16 22:35:14', ':))', 1),
(82, 'dungdq97', 63, '2018-10-16 22:46:22', 'Bạn ra ngo&agrave;i cổng KTX khu A được kh&ocirc;ng do m&igrave;nh ở b&ecirc;n KTX X&atilde; Hội H&oacute;a kh&ocirc;ng biết c&oacute; chạy xe v&agrave;o được kh&ocirc;ng nữa, c&ograve;n ph&iacute; vận chuyển th&igrave; m&igrave;nh kh&ocirc;ng lấy, sinh vi&ecirc;n gi&uacute;p đỡ nhau ^_^', 1),
(83, 'TieuPhung', 63, '2018-10-16 22:48:37', 'ok cảm ơn bạn nha', 1),
(84, 'ntnhan', 68, '2018-10-16 22:49:08', 'Đ&uacute;ng rồi bạn!', 1),
(85, 'dungdq97', 63, '2018-10-16 22:51:22', 'C&oacute; g&igrave; 6h50 -&gt; 7h gặp nhau trước cổng, c&oacute; sdt đ&oacute; bạn m&igrave;nh gọi để biết mặt', 1),
(86, 'quynhpham', 68, '2018-10-16 22:52:32', 'SĐT m&igrave;nh 090 197 3352', 1),
(87, 'quynhpham', 68, '2018-10-16 22:52:54', 'Bạn đ&oacute;n m&igrave;nh đ&uacute;ng giờ nha. Cảm ơn bạn ^^', 1),
(88, 'Duy_Phuong', 69, '2018-10-16 22:54:21', 'khi n&agrave;o bạn ra cổng ktx A th&igrave; alo cho m&igrave;nh: 0981.865.898', 1),
(89, 'Duy_Phuong', 71, '2018-10-16 22:55:30', 'khi n&agrave;o bạn ra cổng ktx th&igrave; alo cho m&igrave;nh: 0981.865.898', 1),
(90, 'nganguyen', 69, '2018-10-16 22:59:01', 'ok bạn. sđt m&igrave;nh 0327453118', 1),
(91, 'ntnhan', 68, '2018-10-16 23:01:08', 'Mai gặp bạn nha.', 1),
(92, 'lanthao2211', 71, '2018-10-16 23:02:42', 'okay bạn, số m&igrave;nh l&agrave; 0902216524', 1),
(93, 'Duy_Phuong', 69, '2018-10-16 23:05:33', 'Nga bạn học khoa n&agrave;o của UIT vậy ?', 1),
(94, 'Duy_Phuong', 71, '2018-10-16 23:05:49', 'Bạn học khoa n&agrave;o của UIT vậy ?', 1),
(95, 'lanthao2211', 71, '2018-10-16 23:07:16', 'm&igrave;nh khoa hệ thống th&ocirc;ng tin', 1),
(96, 'nganguyen', 69, '2018-10-16 23:07:37', 'Hệ thống ấy. bạn cũng học UIT hả ', 1),
(97, 'Duy_Phuong', 69, '2018-10-16 23:08:33', 'Bạn học lớp ti&ecirc;n tiến &agrave; ?', 1),
(98, 'Duy_Phuong', 69, '2018-10-16 23:08:46', 'yupppp, m&igrave;nh học KHMT', 1),
(99, 'Duy_Phuong', 71, '2018-10-16 23:09:17', 'Ohhh, đ&uacute;ng 7h25 m&igrave;nh đ&oacute;n nhen', 1),
(100, 'Duy_Phuong', 71, '2018-10-16 23:09:20', 'm&igrave;nh học KHMT', 1),
(101, 'nganguyen', 69, '2018-10-16 23:12:32', 'm&igrave;nh học CLC :))) ', 1),
(102, 'Duy_Phuong', 69, '2018-10-16 23:14:13', 'xe dịch 7h30 m&igrave;nh qua ktxA chở bạn hen :P', 1),
(103, 'lanthao2211', 71, '2018-10-16 23:16:04', 'ờm okay :&gt;', 1),
(104, 'nganguyen', 69, '2018-10-16 23:18:39', 'okay bạn :))', 1),
(114, 'hello', 85, '2018-10-17 23:59:23', 'Ch&agrave;o bạn, gọi cho m&igrave;nh v&agrave;o buổi s&aacute;ng nh&eacute; 0394679529', 1),
(116, 'Tri.phan1999', 98, '2018-10-18 02:53:24', '01639052124 ', 1),
(117, 'haiyen', 85, '2018-10-18 06:02:46', 'Ok bạn ', 1),
(118, 'thanhaon774', 101, '2018-10-18 07:06:17', 'li&ecirc;n hệ 0868036856', 1),
(119, 'Thuhang', 98, '2018-10-18 07:42:54', '0397465149, bạn đ&oacute;n m&igrave;nh ở khu AG3 đc kh&ocirc;ng? Nếu kh&ocirc;ng th&igrave; chờ m&igrave;nh ở cổng khu A cũng đc, cảm ơn nhiều.', 0),
(120, 'thanhaon7741', 104, '2018-10-18 09:56:56', 'li&ecirc;n hệ sdt 0868036856', 0),
(121, 'thanhthanh', 106, '2018-10-18 11:14:15', 'chuyến n&agrave;y l&agrave; của ng&agrave;y mai nha bạn ơi', 1),
(122, 'lemy', 106, '2018-10-18 12:39:30', 'Ok b, mình đặt cho mai mà', 1),
(123, 'lemy', 106, '2018-10-18 12:46:57', 'Mai mình đợi bạn ở đ&acirc;u đc nhỉ', 1),
(126, 'thanhthanh', 106, '2018-10-18 17:47:13', 'bạn ở t&ograve;a n&agrave;o . M  ở F1 ko th&igrave; M lại t&ograve;a bạn rước cũng được . M&igrave;nh đi cup số xe 66FC 0762', 1),
(127, 'lemy', 106, '2018-10-18 18:39:50', 'Mình ở tòa A3 á, bạn th&acirc;́y ti&ecirc;̣n thì rước mình, k thì bạn ở đ&acirc;u mình qua ch&ocirc;̃ đó nha', 1),
(128, 'lemy', 106, '2018-10-18 20:31:37', 'Sđt m 0344533191', 1),
(129, 'thanhthanh', 106, '2018-10-18 20:42:49', 'oki m lại rước nha 0939342035', 1),
(130, 'haibatluong', 115, '2018-10-18 21:08:32', 'sđt: 0964598830', 1),
(131, 'Anhthu7920', 115, '2018-10-18 21:09:00', '0399 599 540', 1),
(132, 'Anhthu7920', 115, '2018-10-18 21:09:55', 'Gặp nhau ở đ&acirc;u th&igrave; được ạ', 1),
(133, 'haibatluong', 115, '2018-10-18 21:10:20', 'Kh&ocirc;ng c&oacute; mũ bảo hiểm. Được kh&ocirc;ng?', 1),
(134, 'haibatluong', 115, '2018-10-18 21:10:54', 'Bạn chọn địa điểm gặp đi.', 1),
(135, 'haibatluong', 115, '2018-10-18 21:11:10', 'nội trong khu b l&agrave; được.', 1),
(136, 'Anhthu7920', 115, '2018-10-18 21:13:00', 'Đ&oacute;n tại to&agrave; th&igrave; c&oacute; phiền b kh', 1),
(137, 'Anhthu7920', 115, '2018-10-18 21:13:10', 'Hay m&igrave;nh ra cổng chờ', 1),
(138, 'haibatluong', 115, '2018-10-18 21:14:00', 'Tại t&ograve;a được rồi.', 1),
(139, 'Anhthu7920', 115, '2018-10-18 21:15:28', 'V đ&oacute;n ở ba3 nha', 1),
(140, 'Anhthu7920', 115, '2018-10-18 21:15:39', 'To&agrave; c&oacute; family mart', 1),
(141, 'haibatluong', 115, '2018-10-18 21:17:28', 'OK, m&igrave;nh wave đen, mũ bh xanh dương.', 1),
(142, 'Anhthu7920', 115, '2018-10-18 21:18:53', 'Ừm. Hẹn gặp ng&agrave;y mai. Buổi tối tốt l&agrave;nh.', 1),
(143, 'lemy', 106, '2018-10-18 22:55:50', 'Cảm ơn b nhi&ecirc;̀u', 0),
(144, 'dungdq97', 122, '2018-10-19 00:16:21', '&Agrave; Phụng mai bạn cũng đi học bắt đầu l&uacute;c 9h30 lu&ocirc;n &agrave;.', 1),
(145, 'Duy_Phuong', 120, '2018-10-19 00:47:48', 'Sorry bạn nhiều nha, nay m&igrave;nh onl trễ n&ecirc;n accept trễ. SĐT m&igrave;nh: 0981.8656.898', 0),
(146, 'Duy_Phuong', 120, '2018-10-19 00:49:05', 'Mai đ&uacute;ng 7h m&igrave;nh đến trước cổng ktx :v', 0),
(147, 'TieuPhung', 122, '2018-10-19 00:49:42', 'Ừm bạn. Hẹn bạn ở cổng giờ đ&oacute; nha', 1),
(148, 'dungdq97', 122, '2018-10-19 00:56:49', 'okay ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `matched`
--

CREATE TABLE `matched` (
  `id` int(11) NOT NULL,
  `user1` varchar(30) NOT NULL,
  `user2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matched`
--

INSERT INTO `matched` (`id`, `user1`, `user2`) VALUES
(1, 'lvhanh', 'lvhanh270597'),
(2, 'namnd', 'tamduc'),
(3, 'lvhanh', 'huyentrangbui99'),
(4, 'lvhanh', 'huyentrangbui99'),
(5, 'Duy_Phuong', 'Anhthu7920'),
(6, 'thinhlazero1', 'Anhthu7920'),
(7, 'Duy_Phuong', 'quyetthangnqt'),
(8, 'minhduc2018', 'Anhthu7920'),
(9, 'Duy_Phuong', 'Dancute'),
(10, 'test_270597', 'lvhanh'),
(11, 'minhnguyen01', 'Phanngocanhh'),
(12, 'thanhaon774', 'lethanhbinh'),
(13, 'thanhthanh', 'lemy'),
(14, 'lvhanh', 'test_270597'),
(15, 'dungdq97', 'TieuPhung'),
(16, 'Duy_Phuong', 'nhuquynh326');

-- --------------------------------------------------------

--
-- Table structure for table `needed_trip`
--

CREATE TABLE `needed_trip` (
  `id` int(6) UNSIGNED NOT NULL,
  `asker` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `timestart` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `start_from` int(6) UNSIGNED NOT NULL,
  `finish_to` int(6) UNSIGNED NOT NULL,
  `price` float NOT NULL,
  `type_transaction` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `needed_trip`
--

INSERT INTO `needed_trip` (`id`, `asker`, `timestart`, `created`, `start_from`, `finish_to`, `price`, `type_transaction`, `trip_id`) VALUES
(2, 'leloc0206', '2018-10-08 11:20:38', '0000-00-00 00:00:00', 2, 4, 5000, 'Trực tiếp', 0),
(3, 'admin', '2018-10-09 22:21:03', '0000-00-00 00:00:00', 1, 2, 4000, 'Trực tiếp', 0),
(4, 'abx00000', '2018-10-10 23:31:57', '0000-00-00 00:00:00', 2, 7, 4000, 'Trực tiếp', 0),
(5, 'Nhung', '2018-10-14 11:45:00', '2018-10-14 09:07:48', 2, 5, 4000, 'Trực tiếp', 0),
(6, 'TieuPhung', '2018-10-17 07:00:00', '2018-10-16 19:10:50', 1, 5, 2000, 'Trực tiếp', 63),
(8, 'Lanmeow', '2018-10-17 11:20:00', '2018-10-16 20:47:23', 5, 2, 4000, 'Trực tiếp', 67),
(9, 'nganguyen', '2018-10-17 07:30:00', '2018-10-16 22:14:33', 1, 4, 2000, 'Trực tiếp', 69),
(10, 'lanthao2211', '2018-10-17  07:25:00', '2018-10-16 22:15:08', 1, 4, 2000, 'Trực tiếp', 71),
(12, 'moccat99', '2018-10-17 09:55:00', '2018-10-16 23:00:56', 1, 4, 2000, 'Trực tiếp', 0),
(13, 'Suu2803', '2018-10-17 07:15:00', '2018-10-16 23:43:46', 1, 4, 2000, 'Trực tiếp', 0),
(22, 'Thuhang', '2018-10-18 12:40', '2018-10-17 22:20:09', 1, 5, 2000, 'Trực tiếp', 98),
(24, 'huytran1120', '2018-10-19 07:00', '2018-10-17 23:30:42', 2, 3, 4000, 'Trực tiếp', 108),
(25, 'haiyen', '2018-10-18 07:00', '2018-10-17 23:35:03', 2, 5, 4000, 'Trực tiếp', 85),
(26, 'ngnam544', '2018-10-18 07:15', '2018-10-17 23:48:45', 1, 4, 2000, 'Trực tiếp', 0),
(27, 'Ngocdiem0410', '2018-10-18 06:30', '2018-10-18 00:05:15', 2, 5, 4000, 'Trực tiếp', 93),
(28, 'Anb3401', '2018-10-18 08:00', '2018-10-18 00:47:59', 2, 3, 4000, 'Trực tiếp', 100),
(29, 'huutaiprovn', '2018-10-18 07:15', '2018-10-18 02:16:54', 2, 4, 5000, 'Trực tiếp', 0),
(30, 'UsSh1234', '2018-10-18 14:15', '2018-10-18 09:12:28', 1, 5, 2000, 'Trực tiếp', 104),
(31, 'Anhthu7920', '2018-10-19 06:55', '2018-10-18 19:27:34', 2, 5, 4000, 'Trực tiếp', 115),
(33, 'lanthao2211', '2018-10-19 07:25', '2018-10-18 21:35:34', 1, 4, 2000, 'Trực tiếp', 0),
(35, 'Suu2803', '2018-10-19 12:45', '2018-10-18 22:08:19', 1, 4, 4000, 'Trực tiếp', 0),
(37, 'lvhanh', '2018-10-19 01:00', '2018-10-18 23:42:35', 2, 7, 3000, 'Trực tiếp', 124);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(6) UNSIGNED NOT NULL,
  `to_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `type_noti` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `where_noti` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `to_user`, `time`, `content`, `type_noti`, `where_noti`, `seen`) VALUES
(1, 'lvhanh', '2018-10-12 12:32:10', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(2, 'thientrang0706', '2018-10-06 03:42:09', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 0),
(3, 'lvhanh', '2018-10-06 04:01:43', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(4, 'lvhanh', '2018-10-06 04:26:58', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(5, 'lvhanh', '2018-10-06 04:29:29', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(6, 'lvhanh', '2018-10-06 04:32:56', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(7, 'lvhanh', '2018-10-06 04:35:40', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(8, 'lvhanh', '2018-10-06 04:38:46', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(9, 'lvhanh', '2018-10-06 04:39:05', 'Bạn đã xác thực thành công email sinh viên.', 'verify', '', 1),
(10, 'lvhanh', '2018-10-06 04:40:26', 'Bạn đã xác thực thành công email sinh viên.', 'verify', '', 1),
(11, 'lvhanh', '2018-10-06 04:41:11', 'Bạn đã xác thực thành công email sinh viên.', 'verify', '', 1),
(12, 'lvhanh', '2018-10-06 04:41:45', 'Bạn đã xác thực thành công email sinh viên.', 'verify', '', 1),
(13, 'lvhanh', '2018-10-06 05:36:50', 'Bạn đã gửi yêu cầu tới chuyến đi 1 với hình thức Trực tiếp.', 'trip', '1', 1),
(14, 'thientrang0706', '2018-10-06 05:36:50', 'Lê Văn Hạnh đã gửi yêu cầu đến chuyến đi 1 của bạn.', 'edit_trip', '1', 0),
(15, 'lvhanh', '2018-10-06 05:46:33', 'Bạn đã hủy yêu cầu tới chuyến đi 1.', 'trip', '1', 1),
(16, 'lvhanh', '2018-10-06 10:18:31', 'Bạn đã gửi yêu cầu tới chuyến đi 4 với hình thức Trực tiếp.', 'trip', '4', 1),
(17, 'Duy_Phuong', '2018-10-06 10:18:31', 'Lê Văn Hạnh đã gửi yêu cầu đến chuyến đi 4 của bạn.', 'edit_trip', '4', 1),
(18, 'lvhanh', '2018-10-06 10:29:58', 'Bạn đã hủy yêu cầu tới chuyến đi 4.', 'trip', '4', 1),
(19, 'lvhanh', '2018-10-07 21:04:19', 'Bạn đã gửi yêu cầu tới chuyến đi 6 với hình thức Trực tiếp.', 'trip', '6', 1),
(20, 'minhnguyen01', '2018-10-07 21:04:19', 'Lê Văn Hạnh đã gửi yêu cầu đến chuyến đi 6 của bạn.', 'edit_trip', '6', 1),
(21, 'lvhanh', '2018-10-07 21:05:31', 'Bạn đã hủy yêu cầu tới chuyến đi 6.', 'trip', '6', 1),
(22, 'lvhanh', '2018-10-07 21:13:19', 'Bạn đã gửi yêu cầu tới chuyến đi 7 với hình thức Trực tiếp.', 'trip', '7', 1),
(23, 'letien', '2018-10-07 21:13:19', 'Lê Văn Hạnh đã gửi yêu cầu đến chuyến đi 7 của bạn.', 'edit_trip', '7', 1),
(24, 'lvhanh', '2018-10-07 21:18:07', 'le tien đã đồng ý yêu cầu của bạn ở trong chuyến đi 7', 'trip', '7', 1),
(25, 'letien', '2018-10-07 21:18:07', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 7', 'trip', '7', 0),
(26, 'letien', '2018-10-07 21:19:20', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(27, 'lvhanh', '2018-10-07 21:21:01', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(28, 'lvhanh', '2018-10-07 21:21:05', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(29, 'letien', '2018-10-07 21:21:11', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(30, 'lvhanh', '2018-10-07 21:21:11', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(31, 'letien', '2018-10-07 21:21:21', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(32, 'lvhanh', '2018-10-07 21:22:34', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(33, 'lvhanh', '2018-10-07 21:22:41', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(34, 'letien', '2018-10-07 21:22:48', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(35, 'lvhanh', '2018-10-07 21:22:57', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(36, 'lvhanh', '2018-10-07 21:22:58', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(37, 'letien', '2018-10-07 21:23:09', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(38, 'lvhanh', '2018-10-07 21:23:11', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(39, 'letien', '2018-10-07 21:23:13', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(40, 'lvhanh', '2018-10-07 21:23:13', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(41, 'letien', '2018-10-07 21:23:20', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(42, 'letien', '2018-10-07 21:26:18', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(43, 'letien', '2018-10-07 21:26:20', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(44, 'letien', '2018-10-07 21:26:45', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(45, 'letien', '2018-10-07 21:26:47', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(46, 'letien', '2018-10-07 21:26:49', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(47, 'letien', '2018-10-07 21:26:58', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(48, 'lvhanh', '2018-10-07 21:27:34', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(49, 'lvhanh', '2018-10-07 21:27:42', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(50, 'lvhanh', '2018-10-07 21:27:49', 'le tien đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(51, 'letien', '2018-10-07 21:28:45', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(52, 'letien', '2018-10-07 21:28:45', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 0),
(53, 'letien', '2018-10-07 21:28:50', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '7', 1),
(54, 'lvhanh', '2018-10-07 22:14:03', 'Bạn đã gửi yêu cầu tới chuyến đi 2 với hình thức Trực tiếp.', 'trip', '2', 1),
(55, 'namnd', '2018-10-07 22:14:03', 'Lê Văn Hạnh đã gửi yêu cầu đến chuyến đi 2 của bạn.', 'edit_trip', '2', 1),
(56, 'lvhanh', '2018-10-07 22:14:38', 'Bạn đã hủy yêu cầu tới chuyến đi 2.', 'trip', '2', 1),
(57, 'huyenngoc2025', '2018-10-07 23:17:02', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(58, 'huyenngoc2025', '2018-10-07 23:21:14', 'Liên kết xác thực không đúng.', '', '', 1),
(59, 'huyenngoc2025', '2018-10-07 23:22:54', 'Liên kết xác thực không đúng.', '', '', 0),
(60, 'test', '2018-10-08 07:15:54', 'Bạn đã gửi yêu cầu tới chuyến đi 9 với hình thức Trực tiếp.', 'trip', '9', 1),
(61, 'lvhanh', '2018-10-08 07:15:54', 'test đã gửi yêu cầu đến chuyến đi 9 của bạn.', 'edit_trip', '9', 1),
(62, 'test', '2018-10-08 07:19:41', 'Lê Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 9', 'trip', '9', 1),
(63, 'lvhanh', '2018-10-08 07:19:41', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 9', 'trip', '9', 1),
(64, 'ducanh97', '2018-10-08 08:38:55', 'Bạn đã gửi yêu cầu tới chuyến đi 10 với hình thức Trực tiếp.', 'trip', '10', 1),
(65, 'ntnhan', '2018-10-08 08:38:55', 'Đức Anh đã gửi yêu cầu đến chuyến đi 10 của bạn.', 'edit_trip', '10', 1),
(66, 'test', '2018-10-08 20:03:22', 'Bạn đã gửi yêu cầu tới chuyến đi 17 với hình thức Trực tiếp.', 'trip', '17', 1),
(67, 'lvhanh', '2018-10-08 20:03:22', 'test đã gửi yêu cầu đến chuyến đi 17 của bạn.', 'edit_trip', '17', 1),
(68, 'test', '2018-10-08 20:03:28', 'Lê Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 17', 'trip', '17', 1),
(69, 'lvhanh', '2018-10-08 20:03:29', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 17', 'trip', '17', 1),
(70, 'havi98', '2018-10-08 20:18:34', 'Bạn đã gửi yêu cầu tới chuyến đi 16 với hình thức Trực tiếp.', 'trip', '16', 0),
(71, 'minhdang123486', '2018-10-08 20:18:34', 'Nguyễn Hạ Vi đã gửi yêu cầu đến chuyến đi 16 của bạn.', 'edit_trip', '16', 1),
(72, 'ducanh97', '2018-10-08 21:09:33', 'Nguyễn Trọng Nhân đã đồng ý yêu cầu của bạn ở trong chuyến đi 10', 'trip', '10', 0),
(73, 'ntnhan', '2018-10-08 21:09:33', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 10', 'trip', '10', 1),
(74, 'havi98', '2018-10-08 21:27:07', 'Quách Minh Đăng đã đồng ý yêu cầu của bạn ở trong chuyến đi 16', 'trip', '16', 1),
(75, 'minhdang123486', '2018-10-08 21:27:07', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 16', 'trip', '16', 1),
(76, 'minhdang123486', '2018-10-08 21:28:57', 'Nguyễn Hạ Vi đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '16', 1),
(77, 'minhdang123486', '2018-10-08 21:30:50', 'Nguyễn Hạ Vi đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '16', 1),
(78, 'minhdang123486', '2018-10-08 21:31:10', 'Nguyễn Hạ Vi đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '16', 1),
(79, 'havi98', '2018-10-08 21:31:56', 'Bạn đã gửi yêu cầu tới chuyến đi 15 với hình thức Trực tiếp.', 'trip', '15', 0),
(80, 'nguyenducduyxx', '2018-10-08 21:31:56', 'Nguyễn Hạ Vi đã gửi yêu cầu đến chuyến đi 15 của bạn.', 'edit_trip', '15', 0),
(81, 'havi98', '2018-10-08 21:32:10', 'Bạn đã hủy yêu cầu tới chuyến đi 15.', 'trip', '15', 0),
(82, 'havi98', '2018-10-08 21:32:11', 'Bạn đã hủy yêu cầu tới chuyến đi .', 'trip', NULL, 1),
(83, 'mikinguyen', '2018-10-08 21:38:07', 'Bạn đã gửi yêu cầu tới chuyến đi 15 với hình thức Trực tiếp.', 'trip', '15', 0),
(84, 'nguyenducduyxx', '2018-10-08 21:38:07', 'Nguyễn Mỹ Kỳ đã gửi yêu cầu đến chuyến đi 15 của bạn.', 'edit_trip', '15', 0),
(85, 'test', '2018-10-09 02:24:02', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(86, 'test', '2018-10-09 04:31:08', 'Bạn đã gửi yêu cầu tới chuyến đi 22 với hình thức Trực tiếp.', 'trip', '22', 1),
(87, 'lvhanh', '2018-10-09 04:31:08', 'test đã gửi yêu cầu đến chuyến đi 22 của bạn.', 'edit_trip', '22', 1),
(88, 'test', '2018-10-09 04:31:16', 'Lê Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 22', 'trip', '22', 1),
(89, 'lvhanh', '2018-10-09 04:31:16', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 22', 'trip', '22', 1),
(90, 'test', '2018-10-09 04:31:49', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(91, 'lvhanh', '2018-10-09 04:32:01', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(92, 'test', '2018-10-09 04:32:10', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(93, 'lvhanh', '2018-10-09 04:32:21', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(94, 'lvhanh', '2018-10-09 04:32:24', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(95, 'test', '2018-10-09 04:32:36', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(96, 'test', '2018-10-09 04:32:41', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(97, 'lvhanh', '2018-10-09 04:33:00', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(98, 'lvhanh', '2018-10-09 04:33:03', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(99, 'test', '2018-10-09 04:33:36', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(100, 'test', '2018-10-09 04:33:41', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(101, 'lvhanh', '2018-10-09 04:34:01', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(102, 'test', '2018-10-09 04:34:22', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(103, 'test', '2018-10-09 04:34:29', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(104, 'lvhanh', '2018-10-09 04:34:39', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(105, 'test', '2018-10-09 04:34:53', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(106, 'test', '2018-10-09 04:35:43', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '22', 1),
(107, 'tamduc', '2018-10-09 08:51:12', 'Bạn đã gửi yêu cầu tới chuyến đi 2 với hình thức Trực tiếp.', 'trip', '2', 1),
(108, 'namnd', '2018-10-09 08:51:12', 'Tâm Đức đã gửi yêu cầu đến chuyến đi 2 của bạn.', 'edit_trip', '2', 1),
(109, 'admin', '2018-10-09 22:50:46', 'Bạn đã gửi yêu cầu tới chuyến đi 4 với hình thức Trực tiếp.', 'trip', '4', 1),
(110, 'Duy_Phuong', '2018-10-09 22:50:46', 'Nguyen Van Thai đã gửi yêu cầu đến chuyến đi 4 của bạn.', 'edit_trip', '4', 1),
(111, 'admin', '2018-10-09 22:50:50', 'Bạn đã hủy yêu cầu tới chuyến đi 4.', 'trip', '4', 1),
(112, 'mocemkim', '2018-10-10 09:33:47', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 0),
(113, 'test', '2018-10-10 12:01:40', 'Bạn đã gửi yêu cầu tới chuyến đi 24 với hình thức Trực tiếp.', 'trip', '24', 1),
(114, 'lvhanh', '2018-10-10 12:01:40', 'test đã gửi yêu cầu đến chuyến đi 24 của bạn.', 'edit_trip', '24', 1),
(115, 'test', '2018-10-10 12:01:46', 'Lê Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 24', 'trip', '24', 1),
(116, 'lvhanh', '2018-10-10 12:01:46', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 24', 'trip', '24', 1),
(117, 'lvhanh', '2018-10-10 14:16:08', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '24', 1),
(118, 'test', '2018-10-10 14:16:25', 'Lê Văn Hạnh đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '24', 1),
(119, 'lvhanh', '2018-10-10 12:16:19', 'test đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '24', 1),
(120, 'deathvn', '2018-10-11 01:36:47', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(121, 'lvhanh270597', '2018-10-11 15:53:28', 'Bạn đã gửi yêu cầu tới chuyến đi 29 với hình thức Trực tiếp.', 'trip', '29', 0),
(122, 'lvhanh', '2018-10-11 15:53:28', 'L&ecirc; Văn Hạnh đã gửi yêu cầu đến chuyến đi 29 của bạn.', 'edit_trip', '29', 1),
(123, 'lvhanh270597', '2018-10-11 15:53:15', 'L&ecirc; Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 29', 'trip', '29', 0),
(124, 'lvhanh', '2018-10-11 15:53:15', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 29', 'trip', '29', 1),
(125, 'lvhanh270597', '2018-10-11 16:00:14', '<strong> Lê Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '29', 0),
(126, 'lvhanh', '2018-10-11 16:01:09', '<strong> Lê Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '29', 1),
(127, 'lvhanh270597', '2018-10-11 16:02:52', 'L&ecirc; Văn Hạnh đ&atilde; x&oacute;a chuyến đi 29 m&agrave; bạn quan t&acirc;m.', 'profile', 'lvhanh2705', 0),
(128, 'pppp', '2018-10-11 23:08:47', 'Bạn đã gửi yêu cầu tới chuyến đi 31 với hình thức Trực tiếp.', 'trip', '31', 0),
(129, 'thong', '2018-10-11 23:08:47', '&aacute;d đã gửi yêu cầu đến chuyến đi 31 của bạn.', 'edit_trip', '31', 1),
(130, 'tamduc', '2018-10-11 23:19:54', 'Nguyen Dinh Nam đã đồng ý yêu cầu của bạn ở trong chuyến đi 2', 'trip', '2', 0),
(131, 'namnd', '2018-10-11 23:19:54', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 2', 'trip', '2', 1),
(132, 'lvhanh', '2018-10-12 08:42:52', 'Bạn đã gửi yêu cầu tới chuyến đi 30 với hình thức Trực tiếp.', 'trip', '30', 1),
(133, 'Duy_Phuong', '2018-10-12 08:42:52', '  đã gửi yêu cầu đến chuyến đi 30 của bạn.', 'edit_trip', '30', 1),
(134, 'lvhanh', '2018-10-12 08:43:01', 'Bạn đã hủy yêu cầu tới chuyến đi 30.', 'trip', '30', 1),
(135, 'pppp', '2018-10-12 10:10:55', 'admin đã xóa chuyến đi 31 mà bạn quan tâm.', 'profile', 'pppp', 0),
(136, 'lvhanh', '2018-10-12 12:33:07', 'Student card của bạn đã được gửi đi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(137, 'huyentrangbui99', '2018-10-12 12:41:08', 'Bạn đã gửi yêu cầu tới chuyến đi 35 với hình thức Gián tiếp. Chúng tôi đã chuyển số tiền là 4000 từ tài khoản chính sang tài khoản dự bị của bạn.', 'profile', 'huyentrang', 1),
(138, 'lvhanh', '2018-10-12 12:46:10', 'B&ugrave;i Thị Huyền Trang đã gửi yêu cầu đến chuyến đi 35 của bạn.', 'edit_trip', '35', 1),
(139, 'huyentrangbui99', '2018-10-12 12:45:21', 'Bạn đã hủy yêu cầu tới chuyến đi 35.Chúng tôi đã chuyển lại từ tài khoản dự bị vào tài khoản chính cho bạn số tiền 4000', 'profile', 'huyentrang', 1),
(140, 'huyentrangbui99', '2018-10-12 12:46:10', 'Bạn đã gửi yêu cầu tới chuyến đi 35 với hình thức Trực tiếp.', 'trip', '35', 0),
(141, 'huyentrangbui99', '2018-10-12 12:46:56', 'L&amp;ecirc; Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 35', 'trip', '35', 0),
(142, 'lvhanh', '2018-10-12 12:46:56', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 35', 'trip', '35', 1),
(143, 'lvhanh', '2018-10-12 12:49:11', '<strong> Bùi Thị Huyền Trang</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '35', 1),
(144, 'huyentrangbui99', '2018-10-12 12:49:54', '<strong> L&ecirc; Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '35', 0),
(145, 'huyentrangbui99', '2018-10-12 13:05:12', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 36', 'trip', '36', 0),
(146, 'lvhanh', '2018-10-12 13:05:12', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 36', 'trip', '36', 1),
(147, 'Anhthu7920', '2018-10-12 21:15:26', 'Bạn đã gửi yêu cầu tới chuyến đi 30 với hình thức Trực tiếp.', 'trip', '30', 1),
(148, 'Duy_Phuong', '2018-10-12 21:15:26', 'Phạm Quỳnh Anh Thư đã gửi yêu cầu đến chuyến đi 30 của bạn.', 'edit_trip', '30', 1),
(149, 'Anhthu7920', '2018-10-12 21:34:12', 'Đinh Duy Phương đã đồng ý yêu cầu của bạn ở trong chuyến đi 30', 'trip', '30', 1),
(150, 'Duy_Phuong', '2018-10-12 21:34:12', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 30', 'trip', '30', 1),
(151, 'Duy_Phuong', '2018-10-13 21:34:36', '<strong> Phạm Quỳnh Anh Thư</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '30', 1),
(152, 'Anhthu7920', '2018-10-14 20:11:35', '<strong> Đinh Duy Phương</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '30', 1),
(153, 'aaaaaaaa', '2018-10-13 11:22:06', 'Bạn đã gửi yêu cầu tới chuyến đi 41 với hình thức Trực tiếp.', 'trip', '41', 0),
(154, 'letien', '2018-10-13 11:22:06', 'aaaaaaaa đã gửi yêu cầu đến chuyến đi 41 của bạn.', 'edit_trip', '41', 1),
(155, 'Anhthu7920', '2018-10-13 21:20:12', 'Bạn đã gửi yêu cầu tới chuyến đi 43 với hình thức Trực tiếp.', 'trip', '43', 1),
(156, 'thinhlazero1', '2018-10-13 21:20:12', 'Phạm Quỳnh Anh Thư đã gửi yêu cầu đến chuyến đi 43 của bạn.', 'edit_trip', '43', 1),
(157, 'Anhthu7920', '2018-10-13 23:06:30', 'L&ecirc; Thanh T&uacute; đã đồng ý yêu cầu của bạn ở trong chuyến đi 43', 'trip', '43', 1),
(158, 'thinhlazero1', '2018-10-13 23:06:30', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 43', 'trip', '43', 1),
(159, 'Anhthu7920', '2018-10-14 07:03:59', '<strong> Lê Thanh Tú</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '43', 1),
(160, 'test_270597', '2018-10-13 23:59:33', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(161, 'thinhlazero1', '2018-10-14 07:03:24', '<strong> Phạm Quỳnh Anh Thư</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '43', 1),
(162, 'thinhlazero1', '2018-10-14 11:17:00', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 46', 'trip', '46', 1),
(163, 'thinhlazero1', '2018-10-14 11:17:00', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 46', 'trip', '46', 1),
(164, 'ahihihi', '2018-10-14 19:34:20', 'Bạn đã gửi yêu cầu tới chuyến đi 47 với hình thức Trực tiếp.', 'trip', '47', 1),
(165, 'DuyenPham', '2018-10-14 19:34:20', 'ahuhuhu đã gửi yêu cầu đến chuyến đi 47 của bạn.', 'edit_trip', '47', 1),
(166, 'namnd', '2018-10-14 20:11:32', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 49', 'trip', '49', 1),
(167, 'anhthu.m45', '2018-10-14 20:11:32', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 49', 'trip', '49', 0),
(168, 'anhthu.m45', '2018-10-14 20:15:38', '<strong> Nguyen Dinh Nam</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '49', 1),
(169, 'ahihihi', '2018-10-14 20:49:18', 'Phạm Thị Th&ugrave;y Duy&ecirc;n đ&atilde; x&oacute;a chuyến đi 47 m&agrave; bạn quan t&acirc;m.', 'profile', 'ahihihi', 0),
(170, 'ntnhan', '2018-10-14 22:50:22', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 52', 'trip', '52', 1),
(171, 'Lanmeow', '2018-10-14 22:50:22', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 52', 'trip', '52', 1),
(172, 'Lanmeow', '2018-10-14 22:51:41', '<strong> Nguyễn Trọng Nhân</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '52', 1),
(173, 'quyetthangnqt', '2018-10-15 10:06:28', 'Bạn đã gửi yêu cầu tới chuyến đi 54 với hình thức Trực tiếp.', 'trip', '54', 0),
(174, 'Duy_Phuong', '2018-10-15 10:06:28', 'Nguyễn Quyết Thắng đã gửi yêu cầu đến chuyến đi 54 của bạn.', 'edit_trip', '54', 1),
(175, 'quyetthangnqt', '2018-10-15 10:07:02', 'Đinh Duy Phương đã đồng ý yêu cầu của bạn ở trong chuyến đi 54', 'trip', '54', 0),
(176, 'Duy_Phuong', '2018-10-15 10:07:02', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 54', 'trip', '54', 1),
(177, 'lvhanh', '2018-10-15 10:37:46', 'Bạn đã gửi yêu cầu tới chuyến đi 45 với hình thức Trực tiếp.', 'trip', '45', 1),
(178, 'ntnhan', '2018-10-15 10:37:46', 'L&amp;ecirc; Văn Hạnh đã gửi yêu cầu đến chuyến đi 45 của bạn.', 'edit_trip', '45', 1),
(179, 'lvhanh', '2018-10-15 10:37:49', 'Bạn đã hủy yêu cầu tới chuyến đi 45.', 'trip', '45', 1),
(180, 'aaaaaaaa', '2018-10-15 21:43:26', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 55', 'trip', '55', 0),
(181, 'Nguyenthao', '2018-10-15 21:43:26', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 55', 'trip', '55', 0),
(182, 'aaaaaaaa', '2018-10-15 22:24:04', 'Bạn đã gửi yêu cầu tới chuyến đi 57 với hình thức Trực tiếp.', 'trip', '57', 0),
(183, 'thinhlazero1', '2018-10-15 22:24:04', 'aaaaaaaa đã gửi yêu cầu đến chuyến đi 57 của bạn.', 'edit_trip', '57', 1),
(184, 'aaaaaaaa', '2018-10-15 22:24:17', 'Bạn đã hủy yêu cầu tới chuyến đi 57.', 'trip', '57', 0),
(185, 'lvhanh', '2018-10-16 13:45:46', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 63', 'trip', '63', 1),
(186, 'lvhanh', '2018-10-16 13:45:46', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 63', 'trip', '63', 1),
(187, 'lvhanh', '2018-10-16 13:46:14', '<strong> L&ecirc; Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '63', 1),
(188, 'dungdq97', '2018-10-16 19:25:15', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 63', 'trip', '63', 1),
(189, 'TieuPhung', '2018-10-16 19:25:15', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 63', 'trip', '63', 1),
(190, 'TieuPhung', '2018-10-16 22:51:22', '<strong> Dư Quốc Dũng</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '63', 1),
(191, 'Vodanh', '2018-10-16 20:10:36', 'Bạn đã gửi yêu cầu tới chuyến đi 65 với hình thức Trực tiếp.', 'trip', '65', 1),
(192, 'minhduc2018', '2018-10-16 20:10:36', 'V&ocirc; Danh đã gửi yêu cầu đến chuyến đi 65 của bạn.', 'edit_trip', '65', 1),
(193, 'Vodanh', '2018-10-16 20:15:01', 'Bạn đã hủy yêu cầu tới chuyến đi 65.', 'trip', '65', 1),
(194, 'Anhthu7920', '2018-10-16 20:16:07', 'Bạn đã gửi yêu cầu tới chuyến đi 65 với hình thức Trực tiếp.', 'trip', '65', 1),
(195, 'minhduc2018', '2018-10-16 20:16:07', 'Phạm Quỳnh Anh Thư đã gửi yêu cầu đến chuyến đi 65 của bạn.', 'edit_trip', '65', 1),
(196, 'Anhthu7920', '2018-10-16 20:18:46', 'Trần Minh Đức đã đồng ý yêu cầu của bạn ở trong chuyến đi 65', 'trip', '65', 1),
(197, 'minhduc2018', '2018-10-16 20:18:46', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 65', 'trip', '65', 1),
(198, 'Anhthu7920', '2018-10-16 21:13:21', '<strong> Trần Minh Đức</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '65', 1),
(199, 'minhduc2018', '2018-10-16 21:11:05', '<strong> Phạm Quỳnh Anh Thư</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '65', 1),
(200, 'Dancute', '2018-10-16 20:53:50', 'Bạn đã gửi yêu cầu tới chuyến đi 66 với hình thức Trực tiếp.', 'trip', '66', 0),
(201, 'Duy_Phuong', '2018-10-16 20:53:50', 'Dương Thị Linh Đan đã gửi yêu cầu đến chuyến đi 66 của bạn.', 'edit_trip', '66', 1),
(202, 'Dancute', '2018-10-16 20:56:01', 'Đinh Duy Phương đã đồng ý yêu cầu của bạn ở trong chuyến đi 66', 'trip', '66', 0),
(203, 'Duy_Phuong', '2018-10-16 20:56:01', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 66', 'trip', '66', 1),
(204, 'Duy_Phuong', '2018-10-16 22:35:14', '<strong> Dương Thị Linh Đan</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '66', 1),
(205, 'Dancute', '2018-10-16 21:40:13', '<strong> Đinh Duy Phương</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '66', 0),
(206, 'Hoangbuu98', '2018-10-16 21:01:44', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 67', 'trip', '67', 1),
(207, 'Lanmeow', '2018-10-16 21:01:44', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 67', 'trip', '67', 1),
(208, 'Lanmeow', '2018-10-16 21:06:36', '<strong> Võ Hoàng Bửu</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '67', 1),
(209, 'Hoangbuu98', '2018-10-17 06:08:48', '<strong> Cao Hoàng Lan</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '67', 1),
(210, 'dungdq97', '2018-10-16 22:48:37', '<strong> Ch&acirc;u Tiểu Phụng</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '63', 1),
(211, 'ntnhan', '2018-10-16 22:19:53', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 68', 'trip', '68', 1),
(212, 'quynhpham', '2018-10-16 22:19:53', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 68', 'trip', '68', 1),
(213, 'quynhpham', '2018-10-16 23:01:08', '<strong> Nguyễn Trọng Nhân</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '68', 1),
(214, 'Duy_Phuong', '2018-10-16 22:23:03', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 69', 'trip', '69', 1),
(215, 'nganguyen', '2018-10-16 22:23:03', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 69', 'trip', '69', 1),
(216, 'ntnhan', '2018-10-16 22:52:54', '<strong> Phạm Diễm Quỳnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '68', 1),
(217, 'nganguyen', '2018-10-16 23:14:13', '<strong> Đinh Duy Phương</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '69', 1),
(218, 'Duy_Phuong', '2018-10-16 22:54:44', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 71', 'trip', '71', 1),
(219, 'lanthao2211', '2018-10-16 22:54:44', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 71', 'trip', '71', 1),
(220, 'lanthao2211', '2018-10-16 23:09:20', '<strong> Đinh Duy Phương</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '71', 1),
(221, 'Duy_Phuong', '2018-10-16 23:18:39', '<strong> Nga</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '69', 1),
(222, 'Duy_Phuong', '2018-10-16 23:16:04', '<strong> Nguyễn Ngọc Lan Thảo</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '71', 1),
(223, 'Huynhthicham', '2018-10-16 23:51:57', 'Bạn đã gửi yêu cầu tới chuyến đi 41 với hình thức Trực tiếp.', 'trip', '41', 0),
(224, 'letien', '2018-10-16 23:51:57', 'Huynh Thi Cham đã gửi yêu cầu đến chuyến đi 41 của bạn.', 'edit_trip', '41', 1),
(225, 'Huynhthicham', '2018-10-16 23:53:00', 'Bạn đã hủy yêu cầu tới chuyến đi 41.', 'trip', '41', 0),
(226, 'Suu2803', '2018-10-17 00:51:49', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(227, 'Phanngocanhh', '2018-10-17 04:06:13', 'Bạn đã gửi yêu cầu tới chuyến đi 64 với hình thức Trực tiếp.', 'trip', '64', 0),
(228, 'minhnguyen01', '2018-10-17 04:06:13', 'Phan Ngọc &Aacute;nh đã gửi yêu cầu đến chuyến đi 64 của bạn.', 'edit_trip', '64', 1),
(229, 'test_270597', '2018-10-17 09:02:04', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 72', 'trip', '72', 1),
(230, 'lvhanh', '2018-10-17 09:02:04', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 72', 'trip', '72', 1),
(231, 'lvhanh', '2018-10-17 09:03:13', '<strong> Lê Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '72', 1),
(232, 'test_270597', '2018-10-17 09:03:55', '<strong> L&ecirc; Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '72', 1),
(233, 'lvhanh', '2018-10-17 09:46:09', 'Bạn đã gửi yêu cầu tới chuyến đi 73 với hình thức Trực tiếp.', 'trip', '73', 1),
(234, 'test_270597', '2018-10-17 09:46:09', 'L&amp;ecirc; Văn Hạnh đã gửi yêu cầu đến chuyến đi 73 của bạn.', 'edit_trip', '73', 1),
(235, 'lvhanh', '2018-10-17 09:46:34', 'L&ecirc; Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 73', 'trip', '73', 1),
(236, 'test_270597', '2018-10-17 09:46:34', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 73', 'trip', '73', 1),
(237, 'lvhanh', '2018-10-17 09:47:44', '<strong> Lê Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '73', 1),
(238, 'test_270597', '2018-10-17 09:48:00', '<strong> L&ecirc; Văn Hạnh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '73', 1),
(239, 'San.huynhbkk17', '2018-10-17 11:41:19', 'Bạn đã gửi yêu cầu tới chuyến đi 41 với hình thức Trực tiếp.', 'trip', '41', 0),
(240, 'letien', '2018-10-17 11:41:19', 'Huỳnh H&ocirc;̀ng San đã gửi yêu cầu đến chuyến đi 41 của bạn.', 'edit_trip', '41', 1),
(241, 'San.huynhbkk17', '2018-10-17 11:41:37', 'Bạn đã hủy yêu cầu tới chuyến đi 41.', 'trip', '41', 0),
(242, 'voxlink', '2018-10-17 23:25:44', 'Bạn đã gửi yêu cầu tới chuyến đi 81 với hình thức Trực tiếp.', 'trip', '81', 0),
(243, 'thanhthanh', '2018-10-17 23:25:44', 'Linh V&otilde; Ho&agrave;i đã gửi yêu cầu đến chuyến đi 81 của bạn.', 'edit_trip', '81', 1),
(244, 'voxlink', '2018-10-17 23:25:48', 'Bạn đã hủy yêu cầu tới chuyến đi 81.', 'trip', '81', 0),
(245, 'Phanngocanhh', '2018-10-17 23:49:27', 'nguyenvanminh đã đồng ý yêu cầu của bạn ở trong chuyến đi 64', 'trip', '64', 0),
(246, 'minhnguyen01', '2018-10-17 23:49:27', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 64', 'trip', '64', 1),
(247, 'hello', '2018-10-17 23:57:28', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 85', 'trip', '85', 1),
(248, 'haiyen', '2018-10-17 23:57:28', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 85', 'trip', '85', 0),
(249, 'haiyen', '2018-10-17 23:59:23', '<strong> Nguyễn Văn To&agrave;n</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '85', 0),
(250, 'Trangbui', '2018-10-18 00:03:19', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 87', 'trip', '87', 0),
(251, 'Thuhang', '2018-10-18 00:03:19', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 87', 'trip', '87', 1),
(252, 'vinhprolk125', '2018-10-18 00:11:58', 'Student card của bạn đã được gửi đi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(253, 'thanhaon774', '2018-10-18 00:27:38', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 93', 'trip', '93', 1),
(254, 'Ngocdiem0410', '2018-10-18 00:27:38', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 93', 'trip', '93', 0),
(255, 'Ngocdiem0410', '2018-10-18 00:28:22', '<strong> nguyễn minh th&agrave;nh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '93', 1),
(256, 'quyen_quyen', '2018-10-18 00:45:10', 'Student card của bạn đã được gửi đi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(257, 'Kimanh', '2018-10-18 02:11:30', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 95', 'trip', '95', 0),
(258, 'huytran1120', '2018-10-18 02:11:30', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 95', 'trip', '95', 0),
(259, 'Tri.phan1999', '2018-10-18 02:48:38', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 97', 'trip', '97', 1),
(260, 'Thuhang', '2018-10-18 02:48:38', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 97', 'trip', '97', 1),
(261, 'Tri.phan1999', '2018-10-18 02:51:45', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 98', 'trip', '98', 1),
(262, 'Thuhang', '2018-10-18 02:51:45', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 98', 'trip', '98', 1),
(263, 'Thuhang', '2018-10-18 02:53:24', '<strong> Đình Trí Phan</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '98', 1),
(264, 'hello', '2018-10-18 06:02:46', '<strong> Trần Thị Hải Yến</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '85', 1),
(265, 'mocemkim', '2018-10-18 06:29:55', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 100', 'trip', '100', 1),
(266, 'Anb3401', '2018-10-18 06:29:55', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 100', 'trip', '100', 0),
(267, 'lethanhbinh', '2018-10-18 07:03:45', 'Bạn đã gửi yêu cầu tới chuyến đi 101 với hình thức Trực tiếp.', 'trip', '101', 0),
(268, 'thanhaon774', '2018-10-18 07:03:45', 'Thanh B&igrave;nh đã gửi yêu cầu đến chuyến đi 101 của bạn.', 'edit_trip', '101', 1),
(269, 'lethanhbinh', '2018-10-18 07:04:23', 'Bạn đã gửi yêu cầu tới chuyến đi 79 với hình thức Trực tiếp.', 'trip', '79', 0),
(270, 'minhnguyen01', '2018-10-18 07:04:23', 'Thanh B&igrave;nh đã gửi yêu cầu đến chuyến đi 79 của bạn.', 'edit_trip', '79', 0),
(271, 'lethanhbinh', '2018-10-18 07:04:29', 'Bạn đã hủy yêu cầu tới chuyến đi 79.', 'trip', '79', 0),
(272, 'lethanhbinh', '2018-10-18 07:04:53', 'Trần hải vũ đã đồng ý yêu cầu của bạn ở trong chuyến đi 101', 'trip', '101', 0),
(273, 'thanhaon774', '2018-10-18 07:04:53', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 101', 'trip', '101', 1),
(274, 'lethanhbinh', '2018-10-18 07:06:17', '<strong> Trần hải vũ</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '101', 1),
(275, 'Tri.phan1999', '2018-10-18 07:42:54', '<strong> Hồ Thị Thu Hằng</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '98', 0),
(276, 'phamhaotiep', '2018-10-18 08:53:48', 'Bạn đã gửi yêu cầu tới chuyến đi 81 với hình thức Trực tiếp.', 'trip', '81', 1),
(277, 'thanhthanh', '2018-10-18 08:53:48', 'Phạm H&agrave;o Tiệp đã gửi yêu cầu đến chuyến đi 81 của bạn.', 'edit_trip', '81', 1),
(278, 'phamhaotiep', '2018-10-18 08:56:46', 'Bạn đã hủy yêu cầu tới chuyến đi 81.', 'trip', '81', 0),
(279, 'thangnq95', '2018-10-18 08:57:01', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(280, 'thanhaon7741', '2018-10-18 09:56:30', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 104', 'trip', '104', 1),
(281, 'UsSh1234', '2018-10-18 09:56:30', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 104', 'trip', '104', 0),
(282, 'UsSh1234', '2018-10-18 09:56:56', '<strong> Lưu Lâm Vĩ</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '104', 0),
(283, 'Lucnhu', '2018-10-18 10:00:50', 'Bạn đã gửi yêu cầu tới chuyến đi 81 với hình thức Trực tiếp.', 'trip', '81', 1),
(284, 'thanhthanh', '2018-10-18 10:00:50', 'Lục Thị Như đã gửi yêu cầu đến chuyến đi 81 của bạn.', 'edit_trip', '81', 1),
(285, 'Lucnhu', '2018-10-18 10:03:43', 'Trần Thanh Thanh đ&atilde; x&oacute;a chuyến đi 81 m&agrave; bạn quan t&acirc;m.', 'profile', 'Lucnhu', 1),
(286, 'lemy', '2018-10-18 10:48:17', 'Bạn đã gửi yêu cầu tới chuyến đi 106 với hình thức Trực tiếp.', 'trip', '106', 0),
(287, 'thanhthanh', '2018-10-18 10:48:17', 'L&ecirc; My đã gửi yêu cầu đến chuyến đi 106 của bạn.', 'edit_trip', '106', 1),
(288, 'lemy', '2018-10-18 11:12:57', 'Trần Thanh Thanh đã đồng ý yêu cầu của bạn ở trong chuyến đi 106', 'trip', '106', 0),
(289, 'thanhthanh', '2018-10-18 11:12:57', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 106', 'trip', '106', 1),
(290, 'lemy', '2018-10-18 20:42:49', '<strong> Trần Thanh Thanh</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '106', 1),
(291, 'thanhthanh', '2018-10-18 22:55:50', '<strong> L&ecirc; My</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '106', 0),
(292, 'tonnym1208', '2018-10-18 16:01:17', 'Email của bạn đã được ghi nhận! Hãy kiểm tra mail để xác thực email.', '', '', 1),
(293, 'tonnym1208', '2018-10-18 16:01:17', 'Bằng lái xe của bạn đang được gửi đi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(294, 'tonnym1208', '2018-10-18 16:01:17', 'Giấy chứng minh nhân dân của bạn đã được gửi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(295, 'tonnym1208', '2018-10-18 16:01:17', 'Student card của bạn đã được gửi đi. Vui lòng chờ admin xác thực.', 'verify', '', 1),
(296, 'tonnym1208', '2018-10-18 16:06:07', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 108', 'trip', '108', 1),
(297, 'huytran1120', '2018-10-18 16:06:07', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 108', 'trip', '108', 0),
(298, 'huytran1120', '2018-10-18 16:11:33', '<strong> Nguyễn Chấn Hiệp</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '108', 0),
(299, 'peaceplusyou', '2018-10-18 16:13:19', 'Bạn đã gửi yêu cầu tới chuyến đi 105 với hình thức Trực tiếp.', 'trip', '105', 0),
(300, 'thanhthanh', '2018-10-18 16:13:19', 'Catherine Ross đã gửi yêu cầu đến chuyến đi 105 của bạn.', 'edit_trip', '105', 1),
(301, 'xesieudep', '2018-10-18 17:29:15', 'Bạn đã gửi yêu cầu tới chuyến đi 107 với hình thức Trực tiếp.', 'trip', '107', 0),
(302, 'thanhthanh', '2018-10-18 17:29:15', 'nguoi dung thu đã gửi yêu cầu đến chuyến đi 107 của bạn.', 'edit_trip', '107', 1),
(303, 'peaceplusyou', '2018-10-18 17:48:19', 'Trần Thanh Thanh đ&atilde; x&oacute;a chuyến đi 105 m&agrave; bạn quan t&acirc;m.', 'profile', 'peaceplusy', 0),
(304, 'Anhthu7920', '2018-10-18 19:16:07', 'Bạn đã gửi yêu cầu tới chuyến đi 107 với hình thức Trực tiếp.', 'trip', '107', 1),
(305, 'thanhthanh', '2018-10-18 19:16:07', 'Phạm Quỳnh Anh Thư đã gửi yêu cầu đến chuyến đi 107 của bạn.', 'edit_trip', '107', 1),
(306, 'Anhthu7920', '2018-10-18 19:16:19', 'Bạn đã hủy yêu cầu tới chuyến đi 107.', 'trip', '107', 1),
(307, 'haibatluong', '2018-10-18 21:07:53', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 115', 'trip', '115', 1),
(308, 'Anhthu7920', '2018-10-18 21:07:53', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 115', 'trip', '115', 1),
(309, 'Anhthu7920', '2018-10-18 21:17:28', '<strong> Nguyễn Hải</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '115', 1),
(310, 'haibatluong', '2018-10-18 21:18:53', '<strong> Phạm Quỳnh Anh Thư</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '115', 1),
(311, 'nhuquynh326', '2018-10-18 22:15:21', 'Bạn đã gửi yêu cầu tới chuyến đi 120 với hình thức Trực tiếp.', 'trip', '120', 1),
(312, 'Duy_Phuong', '2018-10-18 22:15:21', 'Phạm Thị Như Quỳnh đã gửi yêu cầu đến chuyến đi 120 của bạn.', 'edit_trip', '120', 0),
(313, 'test_270597', '2018-10-18 23:41:08', 'Bạn đã gửi yêu cầu tới chuyến đi 123 với hình thức Trực tiếp.', 'trip', '123', 0),
(314, 'lvhanh', '2018-10-18 23:41:08', 'L&ecirc; Văn Hạnh đã gửi yêu cầu đến chuyến đi 123 của bạn.', 'edit_trip', '123', 0),
(315, 'test_270597', '2018-10-18 23:41:20', 'L&amp;ecirc; Văn Hạnh đã đồng ý yêu cầu của bạn ở trong chuyến đi 123', 'trip', '123', 0),
(316, 'lvhanh', '2018-10-18 23:41:20', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 123', 'trip', '123', 0),
(317, 'test_270597', '2018-10-18 23:42:59', 'Bạn đã đồng ý mở chuyến đi. Và mã số chuyến đi của bạn có là: 124', 'trip', '124', 0),
(318, 'lvhanh', '2018-10-18 23:42:59', 'Chuyến đi mà bạn yêu cầu đã được mở. Chuyến đi của bạn là: 124', 'trip', '124', 0),
(319, 'Ngocdiem0410', '2018-10-19 00:01:09', 'Bạn đã gửi yêu cầu tới chuyến đi 120 với hình thức Trực tiếp.', 'trip', '120', 1),
(320, 'Duy_Phuong', '2018-10-19 00:01:09', 'L&ecirc; Thị Ngọc Diễm đã gửi yêu cầu đến chuyến đi 120 của bạn.', 'edit_trip', '120', 0),
(321, 'Ngocdiem0410', '2018-10-19 00:07:14', 'Bạn đã hủy yêu cầu tới chuyến đi 120.', 'trip', '120', 0),
(322, 'TieuPhung', '2018-10-19 00:09:47', 'Bạn đã gửi yêu cầu tới chuyến đi 122 với hình thức Trực tiếp.', 'trip', '122', 0),
(323, 'dungdq97', '2018-10-19 00:09:47', 'Ch&amp;acirc;u Tiểu Phụng đã gửi yêu cầu đến chuyến đi 122 của bạn.', 'edit_trip', '122', 1),
(324, 'TieuPhung', '2018-10-19 00:11:30', 'Dư Quốc Dũng đã đồng ý yêu cầu của bạn ở trong chuyến đi 122', 'trip', '122', 0),
(325, 'dungdq97', '2018-10-19 00:11:30', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 122', 'trip', '122', 1),
(326, 'TieuPhung', '2018-10-19 00:56:49', '<strong> Dư Quốc Dũng</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '122', 0),
(327, 'Lanmeow', '2018-10-19 00:28:48', 'Bạn đã gửi yêu cầu tới chuyến đi 120 với hình thức Trực tiếp.', 'trip', '120', 1),
(328, 'Duy_Phuong', '2018-10-19 00:28:48', 'Cao Ho&agrave;ng Lan đã gửi yêu cầu đến chuyến đi 120 của bạn.', 'edit_trip', '120', 1),
(329, 'nhuquynh326', '2018-10-19 00:46:34', 'Đinh Duy Phương đã đồng ý yêu cầu của bạn ở trong chuyến đi 120', 'trip', '120', 0),
(330, 'Duy_Phuong', '2018-10-19 00:46:34', 'Bạn đã đồng ý yêu cầu ở trong chuyến đi 120', 'trip', '120', 1),
(331, 'nhuquynh326', '2018-10-19 00:49:05', '<strong> Đinh Duy Phương</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '120', 0),
(332, 'dungdq97', '2018-10-19 00:49:42', '<strong> Ch&acirc;u Tiểu Phụng</strong> đã bình luận tại chuyến đi mà bạn đang tham gia.', 'trip', '122', 1);

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descript` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `descript`, `image`) VALUES
(1, 'Kí túc xá Khu A', 'Đông Hòa, Dĩ An, Bình Dương', '20130330112802.jpg'),
(2, 'Kí túc xá Khu B', 'Đông Hòa, Dĩ An, Bình Dương', '11.JPG'),
(3, 'ĐH Khoa Học Tự Nhiên', 'Linh Trung, Thủ Đức', 'dh-kh--tu-nhien--tphcm-ACZC.jpg'),
(4, 'ĐH Công Nghệ Thông Tin', 'Khu phố 6, phường Linh Trung, quận Thủ Đức', 'uit2.jpg'),
(5, 'ĐH Khoa Học Xã Hội & Nhân Văn', 'Khu phố 6, phường Linh Trung, quận Thủ Đức', 'IMG4543.jpg'),
(7, 'ĐH Bách Khoa', 'Cơ sở Thủ Đức', 'DH-BK-TPHCM.jpg'),
(8, 'ĐH Nông Lâm', 'KP6, Thủ Đức, Hồ Chí Minh, Việt Nam', 'dhnonglam2.jpg'),
(9, 'ĐH Kinh Tế - Luật', 'Linh Xuân, Thủ Đức, Hồ Chí Minh, Việt Nam', '792w-3-truong-dai-hoc-kinh-te-luat.jpg'),
(10, 'ĐH Công Nghệ', 'Tăng Nhơn Phú A, Quận 9, Hồ Chí Minh, Việt Nam', 'phoi-canh-kcn-cao-hutech-quan-9jpg.jpg'),
(11, 'ĐH Quốc Tế', 'khu phố 6, Thủ Đức, Bình Dương, Việt Nam', 'daihoccongnghegqgw.jpg'),
(12, 'ĐH Sư Phạm Kĩ Thuật', '1 Võ Văn Ngân, Linh Chiểu, Thủ Đức, Hồ Chí Minh, Việt Nam', 'y3buurd.jpg'),
(13, 'Khu Giáo Dục Quốc Phòng', '', '0013.jpg'),
(15, 'ĐH Ngân Hàng', '56 Hoàng Diệu 2, Linh Chiểu, Thủ Đức, Hồ Chí Minh', '599067431056766934645631303543n.jpg'),
(16, 'Thư Viện Trung Tâm', 'KP6, Thủ Đức, Hồ Chí Minh, Việt Nam', '05big.jpg'),
(17, 'KTX Xã Hội Hóa', 'Địa chỉ: Đông Hoà, Dĩ An, Bình Dương\r\nTỉnh: Bình Dương\r\nĐiện thoại: 028 6278 0295', 'download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `start_from` int(6) UNSIGNED NOT NULL,
  `finish_to` int(6) UNSIGNED NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`start_from`, `finish_to`, `amount`) VALUES
(1, 2, 4000),
(1, 3, 2000),
(1, 4, 2000),
(1, 5, 2000),
(1, 8, 4000),
(1, 9, 5000),
(1, 11, 2000),
(1, 12, 6000),
(1, 13, 2000),
(1, 15, 7000),
(1, 16, 2000),
(2, 1, 4000),
(2, 3, 4000),
(2, 4, 5000),
(2, 5, 4000),
(2, 7, 4000),
(2, 8, 4000),
(2, 9, 3000),
(2, 10, 10000),
(2, 11, 4000),
(2, 12, 6000),
(2, 13, 3000),
(2, 15, 4000),
(2, 16, 4000),
(2, 17, 4000),
(3, 1, 2000),
(3, 2, 4000),
(3, 17, 2000),
(4, 1, 2000),
(4, 2, 5000),
(4, 17, 2000),
(5, 1, 2000),
(5, 2, 4000),
(5, 17, 2000),
(7, 2, 4000),
(8, 1, 4000),
(8, 2, 4000),
(8, 17, 4000),
(9, 1, 5000),
(9, 2, 3000),
(9, 17, 5000),
(10, 2, 10000),
(10, 4, 7000),
(11, 1, 2000),
(11, 2, 4000),
(11, 17, 2000),
(12, 1, 6000),
(12, 2, 6000),
(13, 1, 2000),
(13, 2, 3000),
(13, 17, 2000),
(15, 1, 7000),
(15, 2, 4000),
(16, 1, 2000),
(16, 2, 4000),
(17, 2, 4000),
(17, 3, 2000),
(17, 4, 2000),
(17, 5, 2000),
(17, 8, 4000),
(17, 9, 5000),
(17, 11, 2000),
(17, 13, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(6) UNSIGNED NOT NULL,
  `from_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `to_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `reason` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(6) UNSIGNED NOT NULL,
  `trip_id` int(6) UNSIGNED NOT NULL,
  `guess_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `type_transaction` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `trip_id`, `guess_id`, `created`, `type_transaction`) VALUES
(12, 15, 'mikinguyen', '2018-10-08 21:38:07', 'Trực tiếp'),
(27, 107, 'xesieudep', '2018-10-18 17:29:15', 'Trực tiếp');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(6) UNSIGNED NOT NULL,
  `from_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `to_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `from_user`, `to_user`, `content`, `created`) VALUES
(1, 'huyentrangbui99', 'lvhanh', 'bạn n&agrave;y im im qu&aacute;', '2018-10-12 12:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(6) UNSIGNED NOT NULL,
  `owner` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `guess` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_from` int(6) UNSIGNED NOT NULL,
  `finish_to` int(6) UNSIGNED NOT NULL,
  `timestart` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `note` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` int(11) NOT NULL,
  `success` tinyint(1) NOT NULL,
  `type_transaction` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `owner`, `guess`, `start_from`, `finish_to`, `timestart`, `created`, `note`, `code`, `success`, `type_transaction`, `price`) VALUES
(4, 'Duy_Phuong', NULL, 2, 5, '2018-10-10 7:30', '2018-10-06 10:14:28', '15520659@gm.uit.edu.vn. Sinh viên trường Đại học Công nghệ Thông tin. Hotline: 0981.865.898', 617924, 0, NULL, 5000),
(6, 'minhnguyen01', NULL, 2, 5, '2018-10-09 07:30', '2018-10-07 20:47:08', NULL, 944904, 0, NULL, 5000),
(12, 'Hungkhaipham', NULL, 2, 3, '2018-10-08 12:00', '2018-10-08 10:32:58', NULL, 263871, 0, NULL, 4000),
(14, 'Nguyendangkhoa', NULL, 1, 3, '2018-10-09 07:30', '2018-10-08 17:35:44', NULL, 781954, 0, NULL, 2000),
(15, 'nguyenducduyxx', NULL, 2, 9, '2018-10-09 14:30', '2018-10-08 19:42:03', 'Gặp trước cổng kí túc xá. Ra tới gọi tôi. ', 706470, 0, NULL, 3000),
(20, 'minhdang123486', NULL, 2, 4, '2018-10-09 07:10', '2018-10-08 21:35:21', 'đến cổng ktx gọi mình. 0933994185', 997136, 0, NULL, 5000),
(23, 'Hoangbuu1998', NULL, 2, 3, '2018-10-09 07:00', '2018-10-09 17:52:33', 'Mình đi vào thứ 2,4,6 các ngày trong tuần. 3,5,7 đi vào 8h nhé các bạn. Bạn nào cần liên hệ mình. Fb : Võ Hoàng Bửu \r\nSđt 0376395169', 868742, 0, NULL, 4000),
(30, 'Duy_Phuong', 'Anhthu7920', 2, 5, '2018-10-13 08:00:00', '2018-10-11 16:16:38', NULL, 931352, 1, 'Trực tiếp', 4000),
(36, 'huyentrangbui99', 'lvhanh', 2, 4, '2018-10-13 10:10:00', '2018-10-12 13:03:14', NULL, 645483, 1, 'Trực tiếp', 5000),
(40, 'namnd', NULL, 2, 4, '2018-10-14 07:30:00', '2018-10-13 10:31:39', NULL, 924249, 0, NULL, 5000),
(41, 'letien', NULL, 1, 4, '2018-10-19 07:30', '2018-10-13 10:32:48', NULL, 294728, 0, NULL, 2000),
(43, 'thinhlazero1', 'Anhthu7920', 2, 3, '2018-10-14 07:10:00', '2018-10-13 20:42:41', NULL, 151893, 1, 'Trực tiếp', 4000),
(49, 'namnd', 'anhthu.m45', 2, 5, '2018-10-15 06:30:00', '2018-10-14 20:01:23', NULL, 115840, 1, 'Trực tiếp', 4000),
(53, 'mocemkim', NULL, 2, 3, '2018-10-15 06:45:00', '2018-10-15 06:27:00', NULL, 952518, 0, NULL, 4000),
(54, 'Duy_Phuong', 'quyetthangnqt', 5, 2, '2018-10-15 12:00:00', '2018-10-15 09:47:32', NULL, 343583, 1, 'Trực tiếp', 4000),
(57, 'thinhlazero1', NULL, 2, 3, '2018-10-16 07:20:00', '2018-10-15 22:06:57', NULL, 463187, 0, NULL, 4000),
(58, 'thinhlazero1', NULL, 2, 3, '2018-10-16 08:35:00', '2018-10-15 22:07:47', NULL, 213255, 0, NULL, 4000),
(59, 'thinhlazero1', NULL, 2, 3, '2018-10-16 09:50:00', '2018-10-15 22:08:56', NULL, 915828, 0, NULL, 4000),
(62, 'mocemkim', NULL, 2, 5, '2018-10-16 12:40:00', '2018-10-16 11:12:24', NULL, 990187, 0, NULL, 4000),
(63, 'dungdq97', 'TieuPhung', 1, 5, '2018-10-17 07:00:00', '2018-10-16 19:10:50', NULL, 975871, 1, 'Trực tiếp', 2000),
(64, 'minhnguyen01', 'Phanngocanhh', 2, 5, '2018-10-17 07:40:00', '2018-10-16 19:42:49', NULL, 102573, 1, 'Trực tiếp', 4000),
(65, 'minhduc2018', 'Anhthu7920', 2, 5, '2018-10-17 07:00:00', '2018-10-16 19:47:32', NULL, 576267, 1, 'Trực tiếp', 4000),
(66, 'Duy_Phuong', 'Dancute', 2, 5, '2018-10-17 07:00:00', '2018-10-16 20:06:53', NULL, 395844, 1, 'Trực tiếp', 4000),
(68, 'ntnhan', 'quynhpham', 1, 5, '2018-10-17 06:50:00', '2018-10-16 19:53:09', NULL, 858604, 1, 'Trực tiếp', 2000),
(69, 'Duy_Phuong', 'nganguyen', 1, 4, '2018-10-17 07:30:00', '2018-10-16 22:14:33', NULL, 615680, 1, 'Trực tiếp', 2000),
(71, 'Duy_Phuong', 'lanthao2211', 1, 4, '2018-10-17 07:25:00', '2018-10-16 22:15:08', NULL, 928991, 1, 'Trực tiếp', 2000),
(76, 'Hoangbuu98', NULL, 2, 3, '2018-10-17 13:30', '2018-10-17 12:19:51', NULL, 866860, 0, NULL, 4000),
(78, 'Duy_Phuong', NULL, 2, 9, '2018-10-18 07:30', '2018-10-17 20:12:38', NULL, 719030, 0, NULL, 3000),
(79, 'minhnguyen01', NULL, 2, 5, '2018-10-18 07:30', '2018-10-17 21:37:33', NULL, 457906, 0, NULL, 4000),
(85, 'hello', 'haiyen', 2, 5, '2018-10-18 07:00', '2018-10-17 23:35:03', NULL, 344877, 1, 'Trực tiếp', 4000),
(98, 'Tri.phan1999', 'Thuhang', 1, 5, '2018-10-18 12:40', '2018-10-17 22:20:09', NULL, 704211, 1, 'Trực tiếp', 2000),
(101, 'thanhaon774', 'lethanhbinh', 2, 3, '2018-10-18 07:20', '2018-10-18 06:31:52', NULL, 668709, 1, 'Trực tiếp', 4000),
(104, 'thanhaon7741', 'UsSh1234', 1, 5, '2018-10-18 14:15', '2018-10-18 09:12:28', NULL, 631664, 1, 'Trực tiếp', 2000),
(106, 'thanhthanh', 'lemy', 2, 5, '2018-10-19 12:45', '2018-10-18 10:06:55', NULL, 147189, 1, 'Trực tiếp', 4000),
(107, 'thanhthanh', NULL, 2, 5, '2018-10-20 06:50', '2018-10-18 10:07:27', NULL, 687348, 0, NULL, 4000),
(109, 'ntth1999', NULL, 2, 8, '2018-10-19 06:40', '2018-10-18 19:11:54', NULL, 393863, 0, NULL, 4000),
(114, 'thanhaon774', NULL, 2, 9, '2018-10-19 07:00', '2018-10-18 21:03:23', NULL, 790292, 0, NULL, 2000),
(115, 'haibatluong', 'Anhthu7920', 2, 5, '2018-10-19 06:55', '2018-10-18 19:27:34', NULL, 713653, 1, 'Trực tiếp', 4000),
(116, 'tonnym1208', NULL, 1, 3, '2018-10-19 07:00', '2018-10-18 21:19:12', NULL, 992357, 0, NULL, 4000),
(117, 'tonnym1208', NULL, 1, 3, '2018-10-19 07:10', '2018-10-18 21:19:44', NULL, 595586, 0, NULL, 4000),
(118, 'tonnym1208', NULL, 1, 3, '2018-10-19 07:20', '2018-10-18 21:20:34', NULL, 606947, 0, NULL, 4000),
(119, 'tonnym1208', NULL, 1, 3, '2018-10-19 07:30', '2018-10-18 21:21:19', NULL, 756530, 0, NULL, 4000),
(120, 'Duy_Phuong', 'nhuquynh326', 2, 5, '2018-10-19 06:55', '2018-10-18 21:25:49', NULL, 683205, 1, 'Trực tiếp', 3499),
(122, 'dungdq97', 'TieuPhung', 1, 4, '2018-10-19 09:30', '2018-10-18 22:40:12', NULL, 726632, 1, 'Trực tiếp', 1000),
(125, 'tonnym1208', NULL, 1, 5, '2018-10-19 07:05', '2018-10-18 23:55:05', NULL, 440766, 0, NULL, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` float NOT NULL,
  `t_balance` float NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `mssv` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `university` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CMND` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `full_name`, `gender`, `phone_num`, `facebook`, `balance`, `t_balance`, `verify`, `mssv`, `university`, `created`, `image`, `CMND`) VALUES
('aaaaaaaa', '$2y$11$cXIKgVWy0y7OEDz5r24rKenrzYueSr794k0pMJgFwlq7Ym22QGFku', 'aaaaaaaa', 'nam', NULL, NULL, 1599, 0, 0, '', '', '2018-10-13 11:10:03', NULL, NULL),
('ABC123', '$2y$11$Oiw2nlH3PEGbgmOCFnFB/Oa4hzBu4uTaiOTPnU9m2gox0Qap5AdNa', 'Võ Phương Duyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:57:04', NULL, NULL),
('Abcxyz', '$2y$11$Isf0PK3mj6SnJsskzL.a0OqVI3mCGxB11x6D/cULOT32sufdopcLy', 'Vô Danh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 18:58:42', NULL, NULL),
('abx00000', '$2y$11$TnFlLeAHZaAz.R4/IpPseOQaEq71IyCdtLER3glzc0T4lee7f/phe', 'Nguyễn Trần Hoàng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('adladl', '$2y$11$SdsbuPsDPapd5AM17i/ZSuUeeDbEo1v47jx.zBEbZvpQPeURvRpJ.', 'Nguyễn Lê Thái Hoàng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:47:19', NULL, NULL),
('admin', '$2y$11$KCGqBrsqND8QoL.uZXhna.9ebgGdWnz0ZmRc5XfNtZZrc/uLR4b0i', 'Ttes', 'nam', '', NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('ahihihi', '$2y$11$7LoGGApbtq0w.NAPFpdFru8gicSaYjpGgHqO5puzdDljvua8LYUtu', 'ahuhuhu', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 19:33:42', NULL, NULL),
('Anb3401', '$2y$11$R14NaCPFY91F8DRsTjq.wunsjBmnIs55SXq7jhJfBoQz3d/SgHZ/2', 'Nguyễn Thị Hạnh Duy&ecirc;n', 'nu', '0799979587', NULL, 1999, 0, 0, '', '', '2018-10-18 00:42:27', 'FBIMG1529851192161.jpg', NULL),
('anhddq', '$2y$11$l/MbtQwQ.UXbdl2JSkkfbeTOPjHRoVJXsRJgkxwewkSM9MDnnBDay', 'Đặng Đình Quyền Anh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:28:33', NULL, NULL),
('Anhduc', '$2y$11$c.VKBzbhLSkJeCF5WkA6Tu.B5ujGMkwuEZvXEZR8k9iSHUB3L1scq', 'Nguyễn Ánh Đức', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:49:40', NULL, NULL),
('Anhhong', '$2y$11$Z6hqz.wkptOutXKZr3yXI.KfQW0B1jirKMvl0mdy/sxb6jtYHWmOK', 'Lê Thị Ánh Hồng', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:58:38', NULL, NULL),
('anhnhusoshi', '$2y$11$aIyowJk5OP3IB6AzXJfjjOEIcd8YzoGf32pk6UVR1ISYd0jiBAYem', 'Anh Như', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:03:07', NULL, NULL),
('anhntv', '$2y$11$VSAJqvyc0c.Fbj6sUn5.k.ygcRldcBKZ2CpdxGLX92YmpV91uxB/u', 'Nguyễn Thị Vân Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:37:41', NULL, NULL),
('anhntv1925', '$2y$11$3p6LRfFAPhyvcKo1S73xNOq9cbMnpm0VLgctMNqPEZE6vBC7Tm6ua', 'Nguyễn Thị Vân Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:38:32', NULL, NULL),
('anhthu.m45', '$2y$11$UVw35X8TPDQ0ByicUTiMSuxLDxh1rvrbK5SkGsX2OdOX5dxHnYQNW', 'Lê Ngọc Anh Thư', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 19:57:22', NULL, NULL),
('Anhthu7920', '$2y$11$ktVMeLkuDw7PPvxiSN8V1uCy3AUDJELpD.ZyRTmqvvXKx44xgo1vi', 'Phạm Quỳnh Anh Thư', 'nu', '0399599540', NULL, 1999, 0, 0, '', '', '2018-10-12 20:48:03', NULL, NULL),
('anhthutonhi', '$2y$11$NfOgcFOOYCmjfvT2o5oxVOR50OwhTDQ3a615ByOTyECYYG7q6d17e', 'T&ocirc; Nhị Anh Thư', 'nu', '0939342035', 'https://www.facebook.com/1cuckeo2keocuc3cuckeo4keocuc', 1999, 0, 0, '', '', '2018-10-17 21:50:20', NULL, NULL),
('Anlinh97', '$2y$11$KSVVplmszgp9Ec8ST47MBuTuMhDexkhJY46NYCx7YMABy1SDJSuna', 'Thu An', 'nu', '0944107198', 'https://m.facebook.com/anlinh97.paris?ref=bookmarks', 5000, 0, 0, '', '', '2018-10-12 17:43:03', 'IMG20180927174642.jpg', NULL),
('annienguyen000', '$2y$11$J73JPIOo7ilaxuxY4dHlSOAVA8vR3gcrdcMmGmoVOo.wQIggjxA9u', 'Nguyễn Tú Phương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 08:33:31', NULL, NULL),
('anvnt', '$2y$11$/g5kb5v7qKu3HnEb0Van0.C5EjX6f6CTo3VPWpHuWdnHsryXNKqp.', 'Võ Nguyễn Tâm An', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('azenka123lk', '$2y$11$8hN2gfn87l4luYoUbM.Jjed4.Ujusrx4MBGguCFXcJM/fcDZWdtXu', 'Tran Duy Minh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:26:05', NULL, NULL),
('Babysitter', '$2y$11$UEpTOMV3pNSopSUT2VYPSuA4EeNG1QP3pPZGrQejrsJvd.qlaMYz2', 'Huỳnh Như Nguyên', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:25:32', NULL, NULL),
('Bach', '$2y$11$cra55crkWRVa1279MJ8B2OTdMv7iWTq6MmuQ75ITWJm1oAgg9lDRi', 'Châu Đoàn Phương Bảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 21:53:16', NULL, NULL),
('ball06', '$2y$11$f6yTQQqYiGsE.0q6iRSLHOzhq6HQqIAuFysefUMggCsGyuH83o7Ga', 'Lê Võ Thị Quỳnh Nhiêm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:43:14', NULL, NULL),
('banhbeo1001', '$2y$11$E6M48R5B8KC/.ybuIn7Sl.9/KQLF6dLxvbbJUm8N2vjxkgwJLrPNe', 'Bùi Thị Thúy Nhi', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:50:47', NULL, NULL),
('bjn_hungho', '$2y$11$WHbREGTi2wbEU6gscW.6Kentjtf0Q0n1ADYB9Z1VTWGUJmCj5FnSe', 'Vương Nguyễn', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Bluemoon135', '$2y$11$WFUP2QJ6Mkihmv6XGxGqO.0kWZw6NJtCyIZgmSD7rNjHOfcp58enu', 'Trần Thanh Bảo Ngọc', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 21:29:31', NULL, NULL),
('Camhuynh', '$2y$11$BWcQccu8ulAIzJaEWSAI8eAm0/Bljsxpd3Fjo5lOST5zjipgxppfG', 'Trần Thị Cẩm Huỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 19:23:24', NULL, NULL),
('camlaidang2199', '$2y$11$sZLXOKloBmCwxcRpCSWiveGmXe7WdICbp7VxwbfoQu7XWRXb/u27S', 'Dang Cam Lai', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 20:53:07', NULL, NULL),
('Cham1411', '$2y$11$adsUBloTwDl7u5um8TbGFujz44AUAQAARn78D3mLM.h83DCrb6kSK', 'Huỳnh Thị Chầm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 10:43:20', NULL, NULL),
('ChangChang', '$2y$11$k0HliTzuME7YTTWcuU9Lmueknhk/RYg4EuWoGhFdT3HkTkmlRxQAC', 'Nguyễn Thị Thu Trang', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 12:43:54', NULL, NULL),
('ChauNhatTan', '$2y$11$tvL3U/xrapkGFCB6l545DuI/fMObkNTi8vN7kKSq0a7qZqmnBcbu2', 'Châu Nhật Tân', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:20:06', NULL, NULL),
('Comme_leo', '$2y$11$ee1bFojWp8D1UaNZGSAPT.ZLy.5qZflNlDWzYjPlro//XQYwZxrA6', 'Võ Thị Thùy Em', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:45:52', NULL, NULL),
('crazy_girl', '$2y$11$X3zMDmHpkJNrOIPkqhjUse3FDHyO6E32O8AwNIEFO5FE54NTxSO0.', 'Nguyễn Ngọc Thùy Tiên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 21:07:28', NULL, NULL),
('Cuanehihi', '$2y$11$3f2Kyw6FK1LhblGmqF0.9eZ9IDI.vz6z68SEGEGV54YY9gwF190Oi', 'Nguyễn Mộng Mỹ Duyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 10:40:50', NULL, NULL),
('Dancute', '$2y$11$IG1bXP/Jw5tP.AVnpR56AOt0yP3vGlJa/l3KAlzdMklpRlsRstoi6', 'Dương Thị Linh Đan', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 20:51:15', NULL, NULL),
('danhnguyen', '$2y$11$WQrwP21tYi6vPKkB2BPfq.u3kbfLZ7Q6fhVbPgViHJjDMYZMZxbJ.', 'NGUYEN QUOC DANH', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('deathvn', '$2y$11$uXXD.OuPzWpeaVJdULggNej3RMTLZHxdZ8X4.7zyfGU4O83RkQai2', 'Trần Khả Phiêu', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Dino', '$2y$11$UyW.A4WFB8k/5qdCi5Wl1eHqnGrZ4PgUuko70wkml1OlbYS85ONCa', 'Thao Le', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 15:58:46', NULL, NULL),
('dl30699', '$2y$11$Iq3W/BDas0gPITMFphpBeeGFvfWmn6eI5x09t2diM3KLDMOcS44Om', 'Đặng Thị Hồng Loan', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:22:29', NULL, NULL),
('dongxoaytr', '$2y$11$tdnvc.wOk7yVnzRcuxHE5.U2/FPiO7fsSLThiTZOUtV.zukD0EWTu', 'Le Thuy Trieu', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('dothuyaithu', '$2y$11$czQtvo8ZgwR0tlPnvK2rDu3bbfHmDOWpOwa0dXOiPNBDb8DazVnGa', 'Đỗ Thụy Ái Thư', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:54:44', NULL, NULL),
('dovybao', '$2y$11$McAI53hM7/B1uF55W54B3OrUhowomy.mSQzGAX.GYJu/dQB59IY8q', 'Bảo', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 11:29:29', NULL, NULL),
('dttn', '$2y$11$CGEFCMAaVTc.Tp57BFLlN.KKX1TYEj24URqJULczeCBPJ3sosK9sO', 'Đặng Thị Thùy Nhi', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 12:42:19', NULL, NULL),
('ducanh97', '$2y$11$Mv7//TanrAOvOtPUJ7alxuuUvmSXhXi3t4fYferuxg86pDYYC/wpa', 'Đức Anh', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('ducideas', '$2y$11$6iTXvcngM2wwnucOunM/d.sx5vf3ClmofNxlpKIw2agVgwzqTxwzO', 'Lê Huỳnh Đức', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('ductienuit', '$2y$11$yUfAYm3YkZP3GhLZvYDq4e5lPXZQphIpj4IS1bUJ8hU5BvwjITOea', 'Tien', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('dungdq97', '$2y$11$LvuViOrMRrlnHUIV6NsrweWxuIb7PK0RnlwKVwhg/QKLNvYJqxA/S', 'Dư Quốc Dũng', 'nam', NULL, NULL, 4400, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Duong', '$2y$11$HxSuOgjJFUI9NtTz5cvg0Oj44jJXy2YNiUr518Kg4EiOU9mIycVxy', 'Phạm Thị Thuỳ Dương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 12:36:07', NULL, NULL),
('Duong1', '$2y$11$/43WqBhOQH0zkbo/2H2BZuhfPcRccOVZYGrgzDfdP42SrYhljn/yW', 'Nguyễn Văn Đương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 00:08:48', NULL, NULL),
('Duy_Phuong', '$2y$11$Ago1kVQ9R/UmsPbB/9qX7epFRlDU.l2qFf43a/3xm7bJeAn.JeySi', 'Đinh Duy Phương', 'nam', NULL, NULL, 1100.2, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('DuyenPham', '$2y$11$uBv5DAJhKl23TwuHGyn93uadoj3nNXIt4v2oumMqAXQBEo.c2Is0O', 'Phạm Thị Thùy Duyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 21:08:57', NULL, NULL),
('Duyson12', '$2y$11$vFmYJvE.OhblfMkM1/A6qOMUNW7YlC8hR6UpaCk8xs/u0D47HWxP2', 'Đặng Duy Sơn', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 01:20:12', NULL, NULL),
('Duyson123', '$2y$11$HGrJC8XEXfOGQJ7KReGH1eV4lKylz9DaIPk1W68aomMIfgxJp/Rqq', 'Đặng Duy Sơn', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 01:21:08', NULL, NULL),
('ffo3son', '$2y$11$KsP3cQnqg4DFglge6ENBHesvzUybpS3YxSE6/FAfLmFTCS2NoY5j6', 'Ho Huynh Son', 'khac', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 20:48:25', NULL, NULL),
('gakupuuu', '$2y$11$L9qEKG3YcDaWSzIZQ6NJkuLqqt6iZVwSRlm2kr2sd72BRRrTfEByC', 'Nguyễn Văn An', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:58:53', NULL, NULL),
('haibatluong', '$2y$11$GWVaBKzWJJ37ZW6dyBdhTOC/S0ts0La7x9scKGKj4E.qSbsgOHyGy', 'Nguyễn Hải', 'nam', '0964598830', NULL, 1199, 0, 0, '', '', '2018-10-18 21:06:20', NULL, NULL),
('haiyen', '$2y$11$MxaDf6UVdlhzlj7YaIAfqet4F9FfzkeKxJ0eglpeEgE9R5yGmiqvO', 'Trần Thị Hải Yến', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:22:32', NULL, NULL),
('Haiyen1910', '$2y$11$opXX5C0WATL5.0shjTjopuqkB9hIGHGhTD1ogqAM6Tn.xD1NggRmK', 'Nguyen Le Hai Yen', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:18:18', NULL, NULL),
('hamyna38', '$2y$11$b7QFo1H132XD9uqNGK4Y/.VezC/LffJZvQFUtQXFwwF2qAlJz3SJy', 'Hà Mỹ Na', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:29:05', NULL, NULL),
('hantran', '$2y$11$N9Bpc8DhwZnaAOWwn49mRuWtC0tBhEqfMS47EKid0A4CJdeQzdamm', 'Trần Huỳnh Ngọc Hân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 12:12:11', NULL, NULL),
('happyyoung1999', '$2y$11$8QpW1tV5KO2FbJA2F31qQOkkXX0wzjhw7WOKImTFckGUushgkBdle', 'Huỳnh Đức Huy', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 08:41:08', NULL, NULL),
('havi98', '$2y$11$seIMt6w3AkvWtXi9LrQr9eSoePuNYnF.tYJHqRAXIdo/CglYwrlBS', 'Nguyễn Hạ Vi', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('hello', '$2y$11$dX6iVR0mSxHQfXeGFi3X..KLhUvCsJIIjspAAHBQHN3/GpU3fLt8S', 'Nguyễn Văn To&agrave;n', 'nam', '0394679529', 'https://www.facebook.com/UIT.VanToan', 1199, 0, 0, '', '', '2018-10-17 23:26:21', 'a1024x1024.jpg', NULL),
('Hoangbuu1998', '$2y$11$7pZ9dKxU6hFV5pNGSl/uJu0Chycy7XPbpulqpa7x9mRYSB8DHbe1m', 'Võ Hoàng Bửu', 'nu', NULL, NULL, 1999, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Hoangbuu98', '$2y$11$uUorYo.X7DtRM7hZD6bHPuQXhkiODZEBV3Owox24VS96.CVMOGM8C', 'Võ Hoàng Bửu', 'nam', NULL, NULL, 4200, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Hoangtan710', '$2y$11$aTqBrZd2usnk6JNFP4.dV.s/xHOrRFc2LZLoLmDnpYVczfUd8RLT.', 'Lê Hoàng Tân', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:43:41', NULL, NULL),
('Hongtham', '$2y$11$mNg9piPz2EdjeSLZSmpB..5Yong9/7Jg0JskuHlMnERFA0gH8E6la', 'Nông Thị Hồng Thắm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 01:26:23', NULL, NULL),
('Hothinh', '$2y$11$xUOCmvAJaXLmlPXnkbfb/.TtMTS2cpksi6y4rHSD.iuio2GMoRvAa', 'Ho thinh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:00:34', NULL, NULL),
('ht.duong118', '$2y$11$YAPo0F6pwaQaPA/SBs/ksuspDXk6NsUpsxqYYfX0zEnyyY20Ae6IS', 'Dương Thị Hoài Thương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:58:41', NULL, NULL),
('Hungkhaipham', '$2y$11$PGg4Rbxt.KawVM0ySTaZm.q7KX4DO83Z3v6zlveL6sOl54oprB5Au', 'Phạm Khải Hưng', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('hunglv1997', '$2y$11$8nCVk2z4oyCVs9/bDNcUQ.j6hfX02PMFo1pTs3vb0JK.MgbziYYYO', 'Lê Văn Hùng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:40:36', NULL, NULL),
('huongmxst', '$2y$11$h1TTPKunkOXP6oJTwpbPf.dkx.HwEXuOOxwOF5SfaCacSg38YZH5y', 'Trương Cẩm Hương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:17:35', NULL, NULL),
('huutaiprovn', '$2y$11$DR9BYsAtvEP9qI4o76NtQew7OMQ/cw2sVV2gUPL/UBCt/TVeAwAq.', 'Hữu Tài', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 02:15:06', NULL, NULL),
('huya9tv1', '$2y$11$odBu9CBNIFL7022c3J3NgOoMKwJFLH7LlNuRr3ayPZxcz5sgr8KI6', 'Trương Hoàng Huy', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:25:07', NULL, NULL),
('huyenngoc2025', '$2y$11$6mYuCtKtKKLJZ0v6Vpm1POsxocIP.dnGSvy4Q5SrcqpY0H0rujMWu', 'Hồ Thị Ngọc Huyền', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Huyentram128', '$2y$11$8PAvhJNpoiM5gNM3ign.ourswaU3iHq/390B3yiNtwczc3d3jgc3y', 'Hoàng Trâm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 22:18:14', NULL, NULL),
('huyentrangbui99', '$2y$11$1mYfstfBGgmv/OVLZB65o.MKMG5aV5IRLXXtDgcSlRXfdMnmFt71G', 'Bùi Thị Huyền Trang', 'nu', NULL, NULL, 4010, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('huynh', '$2y$11$i3mVY78e3U30ll/RALWmAec5ZrGO07.5P847Qp3gk9Q4kJ37MRAxK', 'Dương Văn Huỳnh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 04:52:45', NULL, NULL),
('huynhnhu', '$2y$11$.u58pCG41YNyY6l3ZNdfAOMHj/zxy5dWG4X93K4hGijLww7/bGfU.', 'Huỳnh Như', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 00:47:03', NULL, NULL),
('Huynhthicham', '$2y$11$PMS44em27B756rso82ddFOwiaz2k13Ry1dBHnmUsA71xD6hJwDr0e', 'Huynh Thi Cham', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 12:33:25', NULL, NULL),
('huynhtotran_', '$2y$11$BGl3igXc4712BguMeh8Qv.JsXLBqXXYjurKAcez7yuMFKi1QJMFm2', 'Huỳnh Ngọc Tố Trân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:50:39', NULL, NULL),
('HuynhTram', '$2y$11$Ks9r7GsjduoNMcpB4C2I8O8hWG48p3nB3jmwZThU.qCOCRE4ABjQa', 'Trương Thị Huỳnh Trâm', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('huytran1120', '$2y$11$PY/.UsEeeHPo.Jh23G535O88DcrzBGdJDuvZ2rQhfok6X9c7X2.a6', 'Trần Công Huy', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:28:07', NULL, NULL),
('Khaky1509', '$2y$11$Sdl43Gp46aSvbdcTrAOiu.5mPbh9/PJMWoy54gF8496RaXdJE6VBm', 'Nguyễn Khả  Kỳ', 'nu', '0932943771 ', 'Nguyễn Khả Kỳ ', 1999, 0, 0, '', '', '2018-10-13 06:50:06', NULL, NULL),
('khangnguyen35', '$2y$11$GOu1DBMFa1Qa2/cIZ8DmDOAbJ6WkAxhLpkdwRhd5xzemw1AFKcnZy', 'Nguyễn Trọng Khang', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:37:01', NULL, NULL),
('KhanhLinh', '$2y$11$2zX/MvF9mwFcemnH45/I2uid7m6KC7xsSRiwfrOkZgVXQcotnvWV2', 'Lữ Huỳnh Khánh Linh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 11:05:24', NULL, NULL),
('khuonganh747', '$2y$11$pyKNljVcH0aAC3Y.hhwjzegjc/k8lfhAJ4xwuR9GLy7wluZl4mq/m', 'Truyện Văn Mạnh Khương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:15:53', NULL, NULL),
('khuongkimphung', '$2y$11$uH7do76LY5WsIpl3t5tWAe0LyTCGBl28qn7hihJS2omlkVnC3NerK', 'Khương Kim Phụng', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 01:56:23', NULL, NULL),
('Kimanh', '$2y$11$xkGv6.t3ClhNJNT/j0a/5eVuQxoqoiBDKgE82GEKLob4Nq76d5jlq', 'Nguyễn Thị Kim Anh', 'nu', NULL, NULL, 1199, 0, 0, '', '', '2018-10-18 02:08:21', NULL, NULL),
('kimthu', '$2y$11$f9AOTCepp9c4e3gKvNSGzOlzSSsHcwSszj3wMWfYMr0i7o9TJjVe6', 'nguyễn thị kim thư', 'khac', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:27:17', NULL, NULL),
('KimTien', '$2y$11$z9Ay4QtGMXkdRwFvCb6SX.cbYlnxHHD10AsuJG7D5VnYjYRKwqhsO', 'Lê Ngọc Kim Tiền', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:33:48', NULL, NULL),
('KTM08051998', '$2y$11$sgM3XiuX4jHgQN8i/ehtducU7dQm.zF9dWueRp1MpvETR72lt.QH6', 'Kiều Tuấn Minh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:39:02', NULL, NULL),
('Ky_14', '$2y$11$lQt6jWuVg/oOt4tlgfkwpO.suzNN2M/kEDBIso5NrfCXsmrF2wqIC', 'Trần Lê Thuý Hiền', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 13:52:45', NULL, NULL),
('Lalanh', '$2y$11$lNgKXy8W.Abv3Ypi82mgxuBZq2tPQYQwI99e0DT8JvRQRPwL0E0SC', 'La Thị Lành', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:06:43', NULL, NULL),
('Lanmeow', '$2y$11$mSwgnBsI.qiu5ZCpK/nqV.mfs..YVR20EwqdmB34C5KPTUA7GlwEK', 'Cao Hoàng Lan', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:07:41', NULL, NULL),
('Lannl', '$2y$11$rEdYpfiyh2VY7MQ1cnWRJOXErm9S3xzeNmvvzHDjL10Yrtxiyx4aW', 'Nguyễn Thị Lan', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 19:31:10', NULL, NULL),
('lanthao2211', '$2y$11$f06YlSVwYYRE1pFx0ccJsuwDcQk4e1889JdNfRK/kdx/RLlTqX4oq', 'Nguyễn Ngọc Lan Thảo', 'nu', '0902216524', NULL, 1999, 0, 0, '', '', '2018-10-16 22:09:51', NULL, NULL),
('leloc0206', '$2y$11$0OxTUYNBNNs8eBvnIJN5JOFtaW008R/v4YUAvkMVUO3uMjXleoxCa', 'Lê Xuân Lộc', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('lemy', '$2y$11$T6Q6mJnFnqlt1GEflRjwg.jPk/m2gDJ0B1i1XdgJn9C5HBrBWEV8i', 'L&ecirc; My', 'nu', '0344533191', NULL, 1999, 0, 0, '', '', '2018-10-15 10:06:10', NULL, NULL),
('Lenhatle', '$2y$11$xS8zuMzfZRhevlQTPbtiy.hN6Hi7nFp.xqUrU6gXeufunGAgaJcfO', 'LÊ NHẬT LỆ', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 13:35:31', NULL, NULL),
('lequocuyvinh', '$2y$11$245s64Deyc/fp0wweXtnOuEsluQaLd2LEwuyTR1o4VBCruaK.JCzC', 'L&ecirc; Quốc Uy Vinh', 'nam', '03699307302', 'https://www.fb.com/lequocuyvinh', 1999, 0, 0, '', '', '2018-10-16 20:46:29', NULL, NULL),
('lethanhbinh', '$2y$11$So2tzeot/PGESiVuSwQHcesF2STCSWJScHjYeeTMa0TxHFXCICypS', 'Thanh Bình', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:28:46', NULL, NULL),
('lethanhngan', '$2y$11$jKel0XCXQuEc25KBIPG2nuvOk5KdOI9Tx26MzhXGEXMWiXnl/TQYG', 'Lê Thanh Ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 14:27:00', NULL, NULL),
('letien', '$2y$11$FGJEGiUsDmcExc1W5aXXveK0Jm8h23XT15G8PrKAzIGJjpfkLyZBO', 'le tien', 'nam', NULL, NULL, 9600, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('linh', '$2y$11$chA70rZOoZyH.pqs8Im1CeAkBks/1pprMfRB1zQ0QF68TOIRlInEi', 'Phạm Ngọc Linh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 13:03:01', NULL, NULL),
('Linh_dan', '$2y$11$tVt/O/tBa.Ruea0oDQCp1uma.YDkBq1pQQ2DdLBHJADRRpQHKrhf.', 'Linh Đan', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:02:14', NULL, NULL),
('linhchau', '$2y$11$DNpAfR3HwuC0jS8/spMA2uANpHphAjTU3LKueBBczvQxhbq7tGQfu', 'Linh Châu', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 20:47:51', NULL, NULL),
('Linnn', '$2y$11$ylXAWZLh/m5foMNMJr8/aeXwws2PNivjZ3gjsXH8rhM2QL6fss8HS', 'Trần Hoàng Phương Linh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 18:43:44', NULL, NULL),
('Llasaka', '$2y$11$/7oplAupr9RJ4NvWzEV5JuVtf5zEv3NWCAC7pWzxrCEomg4rpzHyO', 'Phan Thanh Huyền ', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('loank18405ca', '$2y$11$ObrUcRY.2CoC6cEvsMQOD.fWGdr2Q93cAYGSHmDqFH.loH7TqVkue', 'Nguyễn Thị Thanh Loan', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:41:37', NULL, NULL),
('Lucnhu', '$2y$11$0KgO3XuXWUBr10XVRtw0MuP41f4qZVW5JdF7bazaKgUDgqHpo999W', 'Lục Thị Như', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:47:03', NULL, NULL),
('luongkute1212', '$2y$11$xTqjdo2nJ9jpH.noE5rIIOUXzJs0wE6Kx/q0FSOXQ7w3NIrLdE5gK', 'Nguyễn Văn Lương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 20:55:25', NULL, NULL),
('Luscat', '$2y$11$hcFKuBu4vFhwbj/zSk6gXuQz947IKyGDqfqVTBsKS1WDdVEr3iS6u', 'Võ Trương Yến Linh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 17:32:29', NULL, NULL),
('lvhanh', '$2y$11$Ty9EQOw0vEYAXOzKYrMt1e74JoIV5WvSQMgRleS9nRtHN.uJj78r.', 'L&ecirc; Văn Hạnh', 'nam', '01653001561', 'sac', 3210, 0, 0, '', '', '0000-00-00 00:00:00', 'Screenshotfrom2018-10-0807-36-08.png', NULL),
('lvhanh270597', '$2y$11$TCVgCY0RcFfRy/5o/Q3hmOrnfYVgK0JxSqY2jPs/8HpXytTUkq3aK', 'Lê Văn Hạnh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-11 15:52:21', NULL, NULL),
('lyngocthe', '$2y$11$znZMvtzSJmm0VrqktyXs6eWJQcuPJOOlxY/EckucyUGWqCyw6aNPG', 'Lý Ngọc Thể', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 10:42:20', NULL, NULL),
('MaiThy99', '$2y$11$Kp00QeqOgZgwo9N3pRvU4OIYvMACV9oTJw0.6PeKt3diu4xgG0Et2', 'Nguyễn Anh My', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 12:37:48', NULL, NULL),
('maruko2kdth', '$2y$11$UYl5LnA78H..YSWSI1tdTeWb7kXlU267Zsgn1DbF7UiX4gI5HSpDG', 'Nguyễn Ngọc Sơn', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 15:17:14', NULL, NULL),
('Mchuong645', '$2y$11$VfYeHghtFLarjoIXrEQRWORYgM.DYyzIEmHwv/xpBseu8Q2ZrSR52', 'Huỳnh Lý Minh Chương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:22:55', 'FBIMG1539141504619.jpg', NULL),
('Metto', '$2y$11$7ltVAu/UqG6VVvjGfiYGAe3fR2PF0RIshyNVMuP9fnPCFMsXCdbZG', 'Nguyễn Thị Thu Thảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:40:10', NULL, NULL),
('MidoriNhi', '$2y$11$PvfBUrtYgz.Sz31TWV6BhuTdmISQqGJeTpdVHzu1nkpWe5vE0ByP.', 'Trần Nguyễn Uyển Nhi', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 20:26:54', NULL, NULL),
('mikinguyen', '$2y$11$o3tne4fnhizMU/CrC0k7xee8EjdCRms6vmnfS0/BQtfLdkML5jexi', 'Nguyễn Mỹ Kỳ', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('minh.lai4250', '$2y$11$QtfyP6R2ICj4RMiUR/xYEeCTIahA25ANNxFGBnZn5L62J69C9qz/S', 'Lại Công Minh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:34:23', NULL, NULL),
('Minhanh11042000', '$2y$11$YhcGwNblt2dP3ROPaZfDceJ1YADntQf3r3JFDWMrtkJQ2OhVS5KaO', 'Nguyễn Minh Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:39:26', NULL, NULL),
('minhdang123486', '$2y$11$Sam4lvm2OfN/2TMO/4DYTuHg2KfNloRWS/QsI4IBPGDKiIbFo/rXm', 'Quách Minh Đăng', 'nam', '0933994185', NULL, 4000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('minhduc2018', '$2y$11$J6iWw/2UDrZKEQCVyRDY9O9Ee1QJzb/Ja4LX6Bx/VMojXG4cctBuy', 'Trần Minh Đức', 'nam', NULL, NULL, 1199, 0, 0, '', '', '2018-10-16 19:40:19', NULL, NULL),
('Minhminh', '$2y$11$./Mn9/dhgYBKPp0tjbOJwehYUx6Ar6QLSSSaTYbc7TBH8j/zuAjbG', 'Lưu Lệ Minh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 23:05:28', NULL, NULL),
('MinhNgoc', '$2y$11$KTupSrgtd4tw2mXI/R9CIu/v3OXZY5SqRTZvIuSu/4Ny25b8DLJe2', 'Minh Ngọc', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:26:52', NULL, NULL),
('minhnguyen01', '$2y$11$Tt57a62m6a12ZzwPkdssSeEYR4LDiZ9UDirBGvhSWuOt7Chs14BYe', 'nguyenvanminh', 'nam', NULL, NULL, 4200, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Minhthu', '$2y$11$10cnJsODfjv96.yX3Jt47OqKX5dUf5cMmpwwitSDXKE7fcuTbruri', 'Nguyễn Ngọc Minh Thư', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 11:04:28', NULL, NULL),
('Minhtram', '$2y$11$sXKfnHFaUBHbjQaiZXNXS.mPOEYE9.ch3JuDVEgdEq2Jh4GAqj26G', 'Minh Trâm', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 12:20:28', NULL, NULL),
('Misumisu', '$2y$11$t/o54afn.tmoVrFJC43oLeEbl1HFQOC72VP8FyDYHvqrKC/tJ4x62', 'Lê Thùy Dung', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 22:11:42', NULL, NULL),
('moccat99', '$2y$11$Xh9NYHgSnem223deWUom8OV/h0IytvIImjS61wyHwJolmDmJYmELC', 'mộc c&aacute;t', 'nu', '0975985781', NULL, 1999, 0, 0, '', '', '2018-10-16 22:09:40', NULL, NULL),
('mocemkim', '$2y$11$NjuBn6gI.5lgbbMgPGr25e/piJ4I5uS8ZH/iaEhMwS9FrYqpLMU5u', 'Le Hoang Kim', 'nam', NULL, NULL, 4200, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('mr.rrquaan', '$2y$11$FoIFuoOTZhOJuCZ9SNfKdOGZiZTVqdCU5wkDkmg/z3xN3ZOm9FIBe', 'Chung Phạm Minh Quân', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:57:17', NULL, NULL),
('myquynh3110', '$2y$11$3fxVN9Vm1m3j4.v9CvUpUOMWcyoe2jr2.9C8B6HZSr5VzxjMNA18a', 'Nguyễn Võ Mỹ Quỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:22:36', NULL, NULL),
('namnd', '$2y$11$A6wWgRe0AG2u.ozXsUS8KOCLqszCIVKYyToR3Nog3Hx9hxTuOuNU2', 'Nguyen Dinh Nam', 'nam', NULL, NULL, 3200, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Nene', '$2y$11$BbQmwF.0JKf9Kr3/bVDvDOPBgr51updnUxU.mfI/Juun.UyzPNL1S', 'Siu H Anne', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:07:36', NULL, NULL),
('ngan', '$2y$11$wZyLH2.XmKsdI2Ov/Zh2sODZqWQ1cokce.ene1AY7f5OYiT70stAa', 'Nguyễn Thị Kim Ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 23:14:04', NULL, NULL),
('Ngan18409', '$2y$11$pl1jYUvLlsXdkADpLMjr3uGPKhI1gBv5g5tfLsEKJ.OLYnpGRsCby', 'Nguyễn Thị Thanh Ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:27:40', NULL, NULL),
('ngan747', '$2y$11$st9geQaFGQfSW5pthGe09Ojl4sIUJ/NkJZygkHaBvAk2j6IFjFOr.', 'Nguyễn Ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 21:33:25', NULL, NULL),
('nganguyen', '$2y$11$pfvUGU/mt6lLl2fnDBLsrOgqsbgbFMSSn61Db.Gism0IFAzC/Ea/u', 'Nga', 'nu', '0327453118', 'https://www.facebook.com/ngaleo99', 1999, 0, 0, '', '', '2018-10-16 22:06:54', NULL, NULL),
('ngnam544', '$2y$11$bMVZ/C5lsT8w64wFBGb8B.w5/Btsf.cMOMkzz17UAryCbx9IjYasu', 'Nguyễn Nam', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:29:04', NULL, NULL),
('Ngocdiem0410', '$2y$11$z3.C6tDB43fzF3wll1Y/FOm/iTDM1MnoqktXaqhfJUdl5zlyVcalO', 'Lê Thị Ngọc Diễm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:01:28', NULL, NULL),
('Ngocdiemdayhihi', '$2y$11$s/27c.uHcMw7m9cS21Rb9.iyqDnd9swFd6c8LAd0JHX9XN8X90are', 'Lê Thị Ngọc Diễm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:49:01', NULL, NULL),
('ngocntm16411', '$2y$11$EVQVdZTDLjN.y1g8Gud08O5r5Hy4s7dgdJ48tM92bYoo0/iGK1rPq', 'Nguyễn Thị Minh Ngọc', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Ngocthao', '$2y$11$FTrkXLzsx0IUd372A/ba1.Py0fHzhswvObNNUupQDgilGvVSWlwZm', 'Phạm thị ngọc thảo', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:04:57', NULL, NULL),
('Ngoctrai102', '$2y$11$6JW5mxP7csiKdLw0bpBx8ub8qT/SF/ORH/06rIAdA.lcH3cucFTTi', 'Ngọc Trai', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 11:57:55', NULL, NULL),
('ngpmtam', '$2y$11$SD3X/b4ZRZ.jbanO7Bty8.FdDaFsUY.DrGetLz035XZx.ghEWDqba', 'Nguyễn Phạm Minh Tâm', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 01:25:08', NULL, NULL),
('nguyen_ngoc', '$2y$11$F69y5am7zZCoKYrbPUC6Le.Hm9jQtmRNNamUQXTm70DQEE.oSg0hy', 'nguyễn thị như ngọc', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 23:12:10', NULL, NULL),
('Nguyendangkhoa', '$2y$11$TNJJQsQ/iPXG1Xd3/RUERuvZ4XSHp6e7W8ykP3l5BopP1VEaHZbky', 'Nguyễn Đăng Khoa', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('nguyenducduyxx', '$2y$11$JEAwvcsIpjwqGmWIDpc2OOvLy9mpeAAHu7eDSmksHSH/5DZEeC5yq', 'Nguyễn Đức Duy', 'nam', '0974057645', 'fb.com/nguyeducduyxx', 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('nguyenhh', '$2y$11$4a1KXyWuk65nxlchaucr8.4cafKrsBF1A/euJGLYDNPedqmCrQsma', 'Nguyễn Hoàng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:38:08', NULL, NULL),
('nguyenmai', '$2y$11$NsWh3UjGyH96M5cTQfLCrekWNAmldZURi6630zhyIunsk/tTNWUPS', 'Nguyễn Thi Mai', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 22:41:15', NULL, NULL),
('Nguyenthao', '$2y$11$zHhgTwlvF6kGNti1Z8M65ens1y1TEX0NsAbr.l8w7SR6nSRz96qda', 'Nguyễn Thị Dạ Thảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 12:58:56', NULL, NULL),
('nguyenvanminh', '$2y$11$LklD58C06Jo4T8nAzfvjbeb3y.8N4TKLn.z4oCxWSJAPYEGZBXFnS', 'nguyenvanminh', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Nguyet132', '$2y$11$OL1K4jFXMO7C8hfk2Gvo7e/uKeqaH4pPh0kZ/OwDWEOhxV9i9ssyS', 'Huynh Thi Anh Nguyet', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 23:50:34', NULL, NULL),
('nhatdq_', '$2y$11$u9BjpR7bD1kp7g.OuX0Nouut5bPsL8fA.qJA/Zq1JGSn78ZjJaGVW', 'Quang Nhật', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 12:27:30', NULL, NULL),
('nhoxtuapro1', '$2y$11$.tBw7KBQ7VAla.CVDPLHpuqCS.na7MfSUmZrz/QIBDX9clqFgMxwy', 'Lê Tuấn Anh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:30:32', NULL, NULL),
('Nhung', '$2y$11$FvMb6GLW0kK7007VaDTuie0vOYQdv/7k4SBxiqxPnCBG/zBnwub2G', 'Dương Cẩm Nhung', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 00:54:58', NULL, NULL),
('Nhung1997', '$2y$11$rI2TRinz6smaION3CUJaj.7oBMPPF2WYrqjbG31yzi4y4A8Wx0gri', 'Lê Thị Hồng Nhung', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:41:57', NULL, NULL),
('nhuquynh326', '$2y$11$4Zf5tcwku.zUZlcg9lIfheY5OUVm7hJerXl1LhN08Jq/PZTl5piuW', 'Phạm Thị Như Quỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 22:12:41', NULL, NULL),
('nnt1st', '$2y$11$TzHJ62NzfplTC0RpxqTWdOt.NvmoVyZpo3MxXWqzXJFqc5M5rycwS', 'Nguyễn Nhật Toàn', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:39:49', NULL, NULL),
('Nnyaus', '$2y$11$.f0IDGelugn/SdfsYE57b.u8gDGs1Ra8srl7S5PaG6SxLq3CPRfwq', 'Bùi Thị Ny Ny', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:48:59', NULL, NULL),
('Nobutanquyen', '$2y$11$LSzzDumblZ6mB.nSjFwSme6NOL3JoFbrVwfTpdUG7MF7r2MN5wvWq', 'Nguyễn Thị Kim Thoa', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Nonamer', '$2y$11$etS8WMdhFVWsYrwyvOusEuFnTMaT900piHQRDPoOJDP2maLk2B.fy', 'Nguyễn  Huy hoàng ', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Nqdung', '$2y$11$UA7S.gEUK7kKobJKACwuj.0Q250iKzfraC44v.e4TAKsfu.LgIFqa', 'Ngô quang dũng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 05:53:08', NULL, NULL),
('NST_UIT', '$2y$11$0myHdD4B1F0fIKFCiYL5/exijn/NumdvtJAFtHoLzsqwJByodLPde', 'Nguyen Son Tra', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('nthtram', '$2y$11$a5fsIewiRY4xlUacxDV8Kesfs4O8CE0vh.eiuzVltzwvjds8ldfC2', 'Ngô Thị Hoài Trâm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 01:21:03', NULL, NULL),
('ntkgoktx', '$2y$11$OOaqtzpyecmNZ3hBIvMSYOnRSnk9Gi5oZw6DYW.dbnkPMSOCeXAWO', 'NGUYỄN TỬ KỲ', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 07:38:46', 'B61220180818114243795-01.jpeg', NULL),
('ntkhanh', '$2y$11$s5lWfWc7ZR/Rwjfh/yEjxetTac1u2WSo.Fa1wFPl6JFgujkNMxw1C', 'Ngô Trọng Khánh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:26:26', NULL, NULL),
('ntnhan', '$2y$11$mslxfhdAlGheso1j2F6A1ejMTanVNvrSdLGYlzxQHX9O/L0m5igvq', 'Nguyễn Trọng Nhân', 'nam', NULL, 'fb.com/trongnhancp', 2800, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('ntth1999', '$2y$11$B3pWMLTdKVG6kDrUpDy/gOF8leGWc2GIrBRYVdtKB/GZbC0i9bPP2', 'Nguyễn Thị Thu Hường', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:38:58', NULL, NULL),
('Nttloan', '$2y$11$tsnO4H4GUZyQ3IQB2PGxXutg9QIdLJ8DRH1ksJSA1KVO9dZqcEmJK', 'Nguyễn Thị Thanh Loan', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:04:14', NULL, NULL),
('OanhCaCa', '$2y$11$L8tYaZlUid7lLP.NjUPQRuoW52.hrSKfHfMMe5hj2XHl8aUJ877a.', 'Phạm Duy Phương Oanh', 'nam', '0966967919', 'Ktx khu B Đại học quốc gia tp HCM', 1999, 0, 0, '', '', '2018-10-18 08:42:42', NULL, NULL),
('peaceplusyou', '$2y$11$3e7l2xczddjMDDO9m5GMM.dBhkvHQcHus3dJT81gdwASpuBUFhBma', 'Catherine Ross', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:41:44', NULL, NULL),
('Pham_Ngan', '$2y$11$Tj0TlbWY3Fjq/lo2rqyCW.7Xt1umI8ZFxe2BD6Wel77MgiL.mW8Ay', 'Phạm Ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:38:50', NULL, NULL),
('phamhaotiep', '$2y$11$j5gjcjPNbolX.1YSszWKo.Wn1F/J3Pm3mPotxbuQfuY.RdpueyRvS', 'Phạm Hào Tiệp', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:39:14', NULL, NULL),
('Phamtien', '$2y$11$fpi2D9O4sh/Hnw8oTqZM3uQ.gsxi3Zs6ZOg7cV27Dsnn2ZABH7SQu', 'Phạm thi tiền', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 05:04:54', NULL, NULL),
('phamtpthao', '$2y$11$c6ULTA4a6O5Xsc/4f8ly5eCUVWyedYqTk4WyaJRe3oPMqqzvK5cq2', 'Phạm Trần Phương Thảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 19:15:29', NULL, NULL),
('Phanngocanhh', '$2y$11$q2KBoAI9SbG2yUWKLEr5Be.y6CRdci86gU8xS3dY2e8Sxwlop3uf6', 'Phan Ngọc Ánh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 03:49:16', NULL, NULL),
('phucpham', '$2y$11$bS31ZGqfAw4uos/nSSpQzeMB6vVl/EiCW.5MTJZc.5wzhNQYh9FYq', 'Hồng Phúc', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 23:22:51', NULL, NULL),
('Phuong', '$2y$11$tyF9VbvAHjZG3ZFi6D78u.ntMEoLDr.PMlPLW/1y3Do1hX6L4KrOG', 'Trần Thị Hiền Phương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 13:28:06', NULL, NULL),
('Phuongbhn', '$2y$11$FiPdWefruGNjcz4yS7b.wenPJmtjYOHc.SgnmoWuMQGTNNDPz0hUq', 'Bùi Hoàng Nhất Phương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:46:29', NULL, NULL),
('phuongghj123', '$2y$11$9Pe2yfH.WEOaqNZxdCpPgOh1.L9V4KiRh.36LPgiBM5HtgZUmMKeW', 'Lỡ Đình Phương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 21:49:38', NULL, NULL),
('Phuongnhien', '$2y$11$HWmSjs8NKDL.zt9GQnSGyuLTap7AHIa3S1M/PwmzgqDH8O1ge2G3G', 'Nguyễn Phương Nhiên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 07:21:44', NULL, NULL),
('plphungbk1994', '$2y$11$F7/X2rNbQGzOomncmVGFDu3kQVuFUyjXcyMtBw0hqbthl0MINb.tm', 'Phan Linh Phụng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 03:20:22', NULL, NULL),
('Po123', '$2y$11$fE9u0LOVgQbIA2Qz4nw0AeUJCn1sEdmjxRxAqky.7rnuw1atnTVgS', 'Nguyễn Thị Hải Yến', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:28:51', NULL, NULL),
('pppp', '$2y$11$fguQssX2ZdnRsbwSoZUMquhIzvPANiAqYonvu8gCJ/shmz/fJ0Xzy', ' ', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-11 23:08:06', NULL, NULL),
('quyen_quyen', '$2y$11$bO2PyqJ5MkgSHJ7CmRFSUe3jAnAcQG298VuxP26jESXTCZso8QAp6', 'quyển quyển', 'nu', '0376608273', 'quyển quyển', 1999, 0, 0, '', '', '2018-10-18 00:16:12', '4300982118156090018220066417619732312096768n.jpg', NULL),
('quyen2511', '$2y$11$SkjH5Fgf0UvFQfkjWs5Il.5vvtSLWeh8/zd86l4VRZYQjdym0x49i', 'Đỗ Thị Quyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 22:43:20', NULL, NULL),
('quyetthangnqt', '$2y$11$U9V8Gs7whw6Vm.SoWZeoLOamfVV54ic6cbfFchN/8K.wN80ZQygyi', 'Nguyễn Quyết Thắng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:04:56', NULL, NULL),
('quynh_nguyen', '$2y$11$.6gH5PHViXllLYy.HGO7Ke91nMKTeqaASdbwXoOQjAMdcyAfnO0dy', 'Nguyễn Ngọc Trúc Quỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 12:04:06', NULL, NULL),
('Quynh_nhu', '$2y$11$eFQbbwA9F5H12HYMePuPq.jmuGBIAUiSOMzJb40KFiZRsSjshPlpe', 'Quỳnh Như', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 10:25:27', NULL, NULL),
('Quynh_thoa1984', '$2y$11$fBpewPRo.7yCf72sSsYHcO.8RE.qTRYYa20Og8HGYaIRuiYB34XUa', 'Nguyễn thị quỳnh thoa', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 23:24:20', NULL, NULL),
('Quynh123', '$2y$11$7Ew7e4A5f7QQXX2Lxu0pgOqER7XWYpB9NrnHYd6FUDa0ykyAHat.u', 'Nguyễn Thị Như Quỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:34:27', NULL, NULL),
('quynhnhu', '$2y$11$FC4feeETqVFOy..8wycIFus0sBpvdp6GittUq7MPHKkgC8pwBz4UG', 'Mai Thị Quỳnh Như', 'nu', '0964419781 ', NULL, 1999, 0, 0, '', '', '2018-10-18 09:01:36', NULL, NULL),
('quynhpham', '$2y$11$PnQPcl1YdEA4mBBj90Z5Cukej46j3SFqSckegiCHjhIBLco7DSNTu', 'Phạm Diễm Quỳnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 19:49:06', 'IMG1794.JPG', NULL),
('QuynhTram', '$2y$11$6f4GaD/u4VFd1SpnbEtVVO1O17QSc9PRFTRsIrYdvni14A0kQryOO', 'Nguyễn Đặng Quỳnh Trâm', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 20:52:59', NULL, NULL),
('rkltt99', '$2y$11$.tWp5rAOcriqzBtXzqj0jubBs4zCHwN8cG4etKAyzQG2m22ai4YY.', 'L&ecirc; Thanh Tuấn', 'nam', '01212809769', NULL, 1999, 0, 0, '', '', '2018-10-12 17:57:29', NULL, NULL),
('rozacsaid98', '$2y$11$/z0TuisfKpIN89mdLUghNO.ZpSSugcS3mVmlnFUYxj16rbSFYDpgC', 'RO ZAC SAID', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 01:20:41', 'IMG20180915202005775.jpg', NULL),
('Samquick', '$2y$11$hrnKqYt.hfiiHSej7hMYjuuYpL7OaCYGJYvlXJNGzxX/LP98JBJwW', 'Nguyễn Hữu Nhật Quang', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 23:08:17', NULL, NULL),
('San.huynhbkk17', '$2y$11$M/KGSYFojuaqiEgvVpLFUu7RGrjfsABaw.hbwV4Gyr0AnNbh5P1wW', 'Huỳnh Hồng San', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 11:37:24', NULL, NULL),
('Seikyrynllar', '$2y$11$S8Kwg1PaRTcKQdSPhnMyzuS3lY.7HXG1sSsxgfPF8zn2yJff/kaK.', 'Nguyễn Lan Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 22:34:03', NULL, NULL),
('Shijiblack', '$2y$11$kN2zep6Xz/L2NjtI91O0FOhdyKWwfkhQrq3voAkKC7/kXTV7ObWd.', 'Nguyễn Chính Sỹ', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 18:01:01', NULL, NULL),
('Silentway', '$2y$11$aH.3MCkYA36utXmcSCRacOOjQcKdHxuqMdhPOeBZmTPeGOSh4GViG', 'Nguyễn Thị Dạ Thảo', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('sinsinsin', '$2y$11$bT1qLHAFs/D67upuZhI5wuRmQaHwDoODqN/mKc/L0ED3TIi0SCJka', 'sinsinsin', 'nu', '0961448753', 'https://www.facebook.com/sssiiinnn111', 1999, 0, 0, '', '', '2018-10-16 22:17:44', NULL, NULL),
('snow150399', '$2y$11$yMuwDRuXgCMNeJG7OIz2seIXApKvQ/4ji7Rm5OLnE//hPfco5B8FK', 'Tạ Quang Nam', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 11:27:09', NULL, NULL),
('Suu2803', '$2y$11$4vPTEYmq/6VFDa0vPFLMrut/hHtoGu5ZLfVHgSWSJqjvcaFKno7WW', 'Minh Thư', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 23:42:20', NULL, NULL),
('Syphan.12', '$2y$11$tvwPKH6pk0GrfAk7U4maZe2iQewabUynsq9fcDpumey320TywAvSC', 'Nguyễn sỹ phan', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:10:01', NULL, NULL),
('taiem', '$2y$11$uxfNB4Th2mQLGg.mlxW6Yu2tgqvX8tKAJb7tS/NQyy1r.iZBY7S6O', 'Trần Tấn T&agrave;i', 'nam', '0969448153', NULL, 1999, 0, 0, '', '', '2018-10-13 14:11:55', NULL, NULL),
('Taimiru', '$2y$11$JGbxu/cpor3/mYxkncjNDuaX1xzz1GfB3VLFEN9j6B5vueOYbByTm', 'Tống Phước Tài', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:07:17', NULL, NULL),
('taisaomaem', '$2y$11$d7d2T7YqH3YJdn2oe1p.veX1Ybe3tb90XxzZmQRbsk/FH8/1RnNGu', 'Lại Nguyễn Ph&uacute;c Hưng', 'nam', '0332976257', NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('tamduc', '$2y$11$P3RoDBhrja9/WwPDzvg.cOsE3mpqXt6nuAT5uMuPACcSTp2edrXgO', 'Tâm Đức', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('tdungsi1', '$2y$11$m.0cpWyDj1I48gqjQn4Ye.rNbYHSSd6jYKdeLV3RNj02hbGj6FG4W', 'Ngô Quang Trí', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('TE001', '$2y$11$s1eq/gL5n8PUvB/Q6DFII.48eiJYMyTjZzr3TWizmQRiZIVbQI00W', 'Test ez', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 15:28:34', NULL, NULL),
('Tekis', '$2y$11$RS3y8n2cJCOaH1upEpL2t.vLsftNrhu.rduIZLGZ7ZTPtNyVdN3Se', 'Lê lưu toàn', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 01:41:03', NULL, NULL),
('test', '$2y$11$qI7KVzxRzYuENuJ5MsI.nu.nhXkDqh0nwMoMxjboM3g7FGKBSRr/q', 'test', 'nam', NULL, NULL, 1999, 0, 0, '', '', '0000-00-00 00:00:00', '', NULL),
('test_270597', '$2y$11$UWW8AuF1DpKyFcomhRSPxOCHmnqOlRHMUlDjxN6XcJH6/armnRgy6', 'Lê Văn Hạnh', 'khac', NULL, NULL, 799, 0, 0, '', '', '2018-10-12 23:18:15', NULL, NULL),
('test1234', '$2y$11$yuvAdL5pjiLuP33YmTskweP6fv7MF42qkR3tWMdCy4PBukNJu7eoe', 'dsadsa', 'nam', NULL, NULL, 1999, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('thangnq95', '$2y$11$1HSNsOK7EFy6fEBr3RCZ/OmtIvw1p2zV4r4eFUaJtY6MRvQ1bhJe6', 'Nguyễn Quốc Thắng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:53:01', '307071897628918339004191443527873846575104o.jpg', NULL),
('thanhaon774', '$2y$11$4dczrT4HD8qiQrEfF/Rp5Oe7LXpLwETgwUxjFROAy1I0djHLcPqcW', 'Trần hải vũ', 'nam', '0868036856', 'https://www.facebook.com/thanh.nguyenminh.9250595', 399, 0, 0, '', '', '2018-10-18 00:20:59', NULL, NULL),
('thanhaon7741', '$2y$11$YWLJXPhtebVei7yRqusdoeSnTyJohEe7L6oWIbPWa7qsofRCBn0vy', 'Lưu Lâm Vĩ', 'nam', NULL, NULL, 1599, 0, 0, '', '', '2018-10-18 09:56:09', NULL, NULL),
('thanhchi', '$2y$11$/47aNIfqW0f49JsmGSrHj.aYSDocwID/kxxXWw0HIDeKPqeq8YRyO', 'trịnh thanh chí', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:37:12', NULL, NULL),
('Thanhhao09', '$2y$11$oF1wz1FjTJTGkru8e3Ym4OSVRRvdkPtpuEWaQ/fzxy8O5.Zovcamu', 'Phạm Thị Thanh Hảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-14 10:38:34', NULL, NULL),
('Thanhloan', '$2y$11$gtYWNyrxjFpVdVc7i2glBOhqOvo6XaarbD7Zmk4uyJzScQbJ/AoDm', 'Thanh Loan', 'khac', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:35:38', NULL, NULL),
('Thanhmai', '$2y$11$dd0XqC4S4UKXe5iGFls08.dMY29WJf2Op0QNhxrD1t.Z8mIUwftsC', 'Nguyễn Thị Thanh Mai', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 20:52:08', NULL, NULL),
('thanhmito', '$2y$11$UFyopPf2W29QKU81lE2mJe1umXfnvQmfODfdHq51BhEgOlFT71JZq', 'Nguyễn Văn Thành', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('thanhthanh', '$2y$11$T.c3K.CLA1WAVmGU/K2ta.8DFWJ/nsB7BbYWl2Y3ViAsbVTQpRdR6', 'Trần Thanh Thanh', 'nu', NULL, NULL, 1199, 0, 0, '', '', '2018-10-17 22:05:35', NULL, NULL),
('Thanhthao', '$2y$11$B1/daqSBzh/KAZGJOhP2Heb2whIaC7nD0iugRIp/pGtGEF7yZo7Wm', 'Trần Thị Thanh Thảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 00:19:10', NULL, NULL),
('Thao', '$2y$11$Knv.GTmO7Yr1L8bIQLTGBuSf47Ozl5Gy9bNezbf.pvo51uFYsDpwi', 'PhuongThao', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('thao_nguyen', '$2y$11$sFrTcHKhkMCUgMAruU/kLuFsw3zQKzBHkPBeDHySwGcniPg8HMz7K', 'Thảo Nguyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:41:50', NULL, NULL),
('thaokute', '$2y$11$4OIvjqj2Ad4MJLPXaN7Ssuo.NHK52BO1JznYWipI7ISzH5kvGkJdK', 'Nguyễn Thị Thảo', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 22:05:25', NULL, NULL),
('Thien_Nhi', '$2y$11$gNtvU5KqCKRwaboRphVQ1.QD8O047ngTp8mXMHgj.qwMdSKTNfAUi', 'Lê Thiên Nhi', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:38:02', NULL, NULL),
('thienthuspk3', '$2y$11$9A5KjRc00yf/XRAyYabQI.T4cD.MzxC6Y56bMybeHZvUHo86A4ICi', 'Nguyễn Ngọc Thiên Thư', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:06:37', NULL, NULL),
('thientrang0706', '$2y$11$JGvBIejnXTSqH8gMPMSj2.IX4G/zUl3ye5Fd4ACx8SLOqTDF2/tMi', 'Huynh Ngoc Thien Trang', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', '4211428522244633545004113974372563156467712n.jpg', NULL),
('thinh', '$2y$11$khg2pVAqv/UlDTuuwBDPnudgUULie8sGrLfY/WJJ2HJ75BQuyYiNC', 'Đinh văn cường thịnh', 'nam', '01634727910', 'https://www.facebook.com/thinh.dinhvan.73', 1999, 0, 0, '', '', '2018-10-13 02:50:54', NULL, NULL),
('thinhlazero1', '$2y$11$OgTlNxdxZyRF9cI38y0Gq.57DRd7rhmJLVA4N28oeR3Eo.v61Lyz.', 'Lê Thanh Tú', 'khac', '0923674774', NULL, 3400, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('thong', '$2y$11$.R4aCOSRh2TXafefogQ4tuHlisDlkHHuqXPpUAB.Sqhe6ida43I0e', 'hacker', 'nam', '0123456789', NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('thphuong101', '$2y$11$XzB48.7BKEqja81uvZs0uOD0mf0L67bO8rk3Y1qYKyzTetudtDTjy', 'Nguyễn Thành Phương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 20:08:33', NULL, NULL),
('Thuanphong1801', '$2y$11$7lzJFsRuiBdAqHByRDwg.uV3Cb9XOsB8Z8L9dolHOwVGV7RJVqJa2', 'Đỗ Nguyễn Thuận Phong', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 13:18:51', NULL, NULL),
('Thucvo', '$2y$11$l.9X34bon5Y8dnxiMHIaeeMro7rc5V5eXavqn542/itTq/sXkxmw2', 'Võ thức', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 18:07:48', NULL, NULL),
('Thuhang', '$2y$11$YTYEErMrAfj7JfFXccOjguDUtH9zc/8rQ5A8GNqBwtktJ.ypuEBsG', 'Hồ Thị Thu Hằng', 'nu', '0397465149', NULL, 1999, 0, 0, '', '', '2018-10-13 13:49:00', 'FBIMG1538315338854.jpg', NULL),
('thuhuong8199', '$2y$11$.tt.93GDn08Utxwfukj5P.aYTkIr8RDr3X8l0AiQ7hGXp3JChYpyu', 'Trần Thu Hương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 20:43:23', NULL, NULL),
('Thuong', '$2y$11$T0Vnz7e79.NWgpR6Rev15uQ9mimeXVkNVcTD2WYkr1u3wEOEmofmK', 'Trần Ái Thương', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:11:50', NULL, NULL),
('Thuy305', '$2y$11$gLMgct63YcNslO.hDb20a.gFJZr6hO5vWkvWmNV3J03/fs/6spPyW', 'Huỳnh Ngọc Châu Thúy', 'nu', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('Thuyanh', '$2y$11$tb4xH4VvhqOmA8WCAHpVLOJf7JO5ycQ0Hr2/lSovuo9ZiDrM69Mxi', 'Đặng Thúy Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:40:07', NULL, NULL),
('thuyduong1602', '$2y$11$DF6abakJbiuPX8ivfTEdEOun/pBzcD/q5qhlngGNhRxqFE0zHFfgm', 'Lữ Dương', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:36:13', NULL, NULL),
('Thuykieu', '$2y$11$gf0TqgQvWx07qqQi197H6.uQUUsYDBb4gCsCr2/7JXAXvfEXDWx.y', 'Trần Thị Thúy Kiều', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 10:37:39', NULL, NULL),
('Thuyngann', '$2y$11$U4TSj8ohtb5jkY/lN2c2we.rF/W6/rRFRrAFZc75s55dgP5Xs.oHW', 'Nguyễn thị thùy ngân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 06:49:48', NULL, NULL),
('TieuPhung', '$2y$11$Dnx9SUTlohhRRlPBV8lmIO//dYM.AOOQt9fS0LW4BWeOQQhHmhxyq', 'Ch&acirc;u Tiểu Phụng', 'nu', '01222152415', 'fb.com/hiimtifu', 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('toanjackiephan', '$2y$11$hh7.7isabGlKIqnPIvQhmueGJuFlVnB3UGgVUh2fMq5MStMwwSzrO', 'phan nguyễn quang toàn', 'nam', '01678852565', 'https://www.facebook.com/toanjackie.phan', 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('tonnym1208', '$2y$11$WJDfKEeK5shfXGphXshIR.vJeEq7nwo2/uCrXEmCffFEZW/ceFrfC', 'Nguyễn Chấn Hiệp', 'nam', '0916330013', 'https://www.facebook.com/tonnym.scorp', 1199, 0, 0, '', '', '2018-10-18 15:50:34', '3017126819543251982300767242732505181570644o.jpg', NULL),
('tranchiu', '$2y$11$Lp8TRTDqdJMIREOGtnipN.qcdvXl5qU7hW5uafnEcet2UaSmkuC7a', 'Chìu Ngọc Trân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 10:19:58', NULL, NULL),
('Trang', '$2y$11$rmTbJm73r0YeI6DVQ1jJiOGVb/pAKTpe.rwT/Lxom.fMxhEaHPMHu', 'Nguyễn Thị Thùy Trang', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:03:27', NULL, NULL),
('Trangbui', '$2y$11$otwKz0e4IUv3FmPzpWiiLer0C6IKKQxkPSAbO6lw1961YTuD6owvu', 'Bùi Thị Thảo Trang', 'nu', NULL, NULL, 1599, 0, 0, '', '', '2018-10-13 00:36:19', NULL, NULL),
('TrangMay', '$2y$11$vYOYWIKBilem5by.zyCVLeqcyQ.xrCZvt5r3YEX4wHdZZ6PKhXWKK', 'Nguyễn Thị Thu Trang', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 12:45:08', NULL, NULL),
('Tri.phan1999', '$2y$11$e8P06qgAOlBBRAlrzwBUfOL0Ce8eUV/ymcw/h0AvhiL6J3b3zkOMG', 'Đình Trí Phan', 'nam', NULL, NULL, 1199, 0, 0, '', '', '2018-10-18 02:45:32', NULL, NULL),
('Trithuan113', '$2y$11$EJkdYgd0J51JKSMvObR6EO80obuKHEx2ESoRHwZsbf39tmX7OA9yS', 'Nguyễn Tri Thuận', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 05:26:33', NULL, NULL),
('trungtruc91', '$2y$11$FriXf9oiV31XifSxYgGMEuEPIYW1k96NMvLVvVLwremHtNuMQ0Ykm', 'trần trung trực', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:21:24', NULL, NULL),
('truongnhatuyendi', '$2y$11$q745SrcSvc1piAbk0bHo1.746/PHrvPUrFI005czbbn.C8jE09Dpy', 'trương nhật uyển di', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 21:31:25', NULL, NULL),
('truongtrang.it', '$2y$11$Q8Zu57JuN6xERMzm4TnH8.LfQwA/qiOB/WpP2smO.HDt3VHzKq6TO', 'Nguyễn Trường Tráng', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:07:56', NULL, NULL),
('Tuanh1998', '$2y$11$MJxcj6M2qQa5I3HsCHLIaeSG3Ng9uU8pcfXMDNe.Te20szOWweyBS', 'Lê Thị Tú Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 10:10:54', NULL, NULL),
('tuihocbk', '$2y$11$LPyfK95yCmR7F18Cy5sfB.0J0CMBv9VWZThIkGHZctDZUhucIdjJ6', 'Nguyễn Thị Phương Trinh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:10:00', NULL, NULL),
('tuyendo289', '$2y$11$chEshjJX/ClHHR33HyCXee9pK/Y6mBlV2L4oD48P/dn85d.AzGVL2', 'Đỗ Ngọc Tuyền', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 06:47:11', NULL, NULL),
('Tuyetmayy123', '$2y$11$AN0zoYXOAbZiWrMDTYT8KuEYL/NxZIdYnCuYKszsYpfiOo.5aOV1y', 'Tuyết Nguyễn', 'nu', '01232673975', NULL, 1999, 0, 0, '', '', '2018-10-13 09:01:43', NULL, NULL),
('tuyetnhung0904', '$2y$11$sOZGqI3Exj.FCJxkqfBPcenv/3kREmL4iFGx7hg.ffm5rmYgd8OKW', 'Lê Thị Tuyết Nhung', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 09:53:23', NULL, NULL),
('UsSh1234', '$2y$11$uoFM2PabiZkMGEvI3BLIh./kbdGTkichGxNxU90EYHSFaaQ3HWCsS', 'Võ Phương Duyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 08:59:21', NULL, NULL),
('vannariii', '$2y$11$JNXYdykgF6GYES6dA/fTius9sWRfpIYBqUnnve0CEG9i7UMKPUkSu', 'Đỗ Thị Long Vân', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:30:43', NULL, NULL),
('vanvu5353', '$2y$11$1X/iAkdjvcGQxOp9nlFBVuBWnUpPz7c3VOE0kPR9aNfwiXpJr4NzO', 'Vu Van', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-12 17:01:59', NULL, NULL),
('Victory', '$2y$11$n5ztl4d8sDC.xLjJEAQ1nubIzDWK7M33E21wB9/r1CjJXYd3fZCBu', 'Nguyễn Huỳnh Phương Anh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:40:25', NULL, NULL),
('vinhprolk125', '$2y$11$1aGzF48LCMslQ2ZQxUqWwe4HQkcQp.ezy7D8q3YkP7CcyZA8lXlii', 'La Kh&aacute;nh Vĩnh', 'nam', '0362492902', NULL, 1999, 0, 0, '', '', '2018-10-17 23:57:23', NULL, NULL),
('violetxchi', '$2y$11$kmgirCi9Y6XTEBofzzjDVOkbckyPUU7x0sx3prO34kJ9v0ZS0wKYC', 'Trần Ngọc Quỳnh Chi', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 09:00:43', NULL, NULL),
('vitamin', '$2y$11$ofo1ctLsE8TRgB.8wvJsZeh.6wC/E.YexTwXQQf3LUdmwBptzhwUm', 'Hồng Hạnh', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 21:34:46', NULL, NULL),
('Vodanh', '$2y$11$I8zSi6ktJX5VVNJPwT8vneRqBreSmT8EinioVDaLbkauig5.EmAte', 'Vô Danh', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-16 18:59:48', NULL, NULL),
('votruongtoan', '$2y$11$MZ4t/o4OSw16kM64g1Di5.1j.Re3d5kJ6vuM4dsrUcFJJDe8SeP4m', 'votruongtoan', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 00:19:59', NULL, NULL),
('voxlink', '$2y$11$mf1N1qW5u6j6Lc.qgkbkbeBjNHoVBt17fPuv4YanDK6tste1e6rz2', 'Linh Võ Hoài', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-17 23:22:44', NULL, NULL),
('Vuminhthu', '$2y$11$kaYPbty1uUiSe3jIrycMtOQeTdW1/ODXnuisMH54.eTCTpupROS5C', 'Vũ Thị Minh thư', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 07:54:39', NULL, NULL),
('wellnguyen', '$2y$11$yxbMgmGcKZZBrdsdCCcMN.eyCIEyfzYu3zjQcmwfFJ6tV4rPXD/A6', 'Nguyễn Đức Thịnh', 'nam', NULL, NULL, 5000, 0, 0, '', '', '0000-00-00 00:00:00', NULL, NULL),
('xesieudep', '$2y$11$UJcxxHuAvjGjaGKzB8Px/u5rUptimsNXUbdZeKiL/sjco18yWXpPi', 'nguoi dung thu', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 17:28:30', NULL, NULL),
('xuanlocvn123', '$2y$11$sBisSBAAGtXPF7vjGCjKCuKFJCpNJzVWJPrvbrIHx.03t02ttpecm', 'Nguyễn Xuân Lộc', 'nam', NULL, NULL, 1999, 0, 0, '', '', '2018-10-15 00:32:35', NULL, NULL),
('XuanUyen', '$2y$11$gmLprHWAS43YZnQ4OvmM9.Zun9hVMsR2MwDOohqpZWNbtwwe.X25.', 'Nguyễn Thọ Xuân Uyên', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-18 20:23:00', NULL, NULL),
('yaibatran', '$2y$11$a5yI89IjFgrDLbTcRFGJAONk1pCKDTxFuI.HozQa3I7peK4shiS/C', 'Trần Việt H&ugrave;ng', 'nam', '0706809965', NULL, 1999, 0, 0, '', '', '2018-10-15 14:06:51', NULL, NULL),
('YenLe', '$2y$11$d7OIMFwYiDjlMAox0kfg.OJj4t40OaIg7zaYRTm4BiT/TlhHToA7m', 'Le Bui Phuong Yen', 'nu', NULL, NULL, 1999, 0, 0, '', '', '2018-10-13 08:02:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(6) UNSIGNED NOT NULL,
  `from_user` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `from_user`, `type`, `content`, `status`, `hash`) VALUES
(9, 'huyenngoc2025', 'student email', '17520596@gm.uit.edu.vn', 'OK', '9455dcfda0fa353956e83513b7952168'),
(11, 'mocemkim', 'student email', '16520633@gm.uit.edu.vn', 'OK', 'e7efbcc75a5019b7ca0aedb9f2524be1'),
(12, 'deathvn', 'student email', '15520614@gm.uit.edu.vn', 'OK', '659c6db83dfe3ba8ba80b5707ab356e8'),
(13, 'lvhanh', 'student email', '15520197@gm.uit.edu.vn', 'OK', '288157b7c352425569c4ad0f8b3d20c7'),
(14, 'Suu2803', 'student email', '17521106@gm.uit.edu.vn', 'OK', '710c329bc2b8c55674b10b1ec9d08544'),
(15, 'vinhprolk125', 'student card', 'IMG20181018000735.jpg', 'OK', NULL),
(16, 'quyen_quyen', 'student card', '030434180170.jpg', 'OK', NULL),
(17, 'thangnq95', 'student email', '13520769@gm.uit.edu.vn', 'OK', '080ac3fb0c948fce6e90abeadd0ce663'),
(18, 'tonnym1208', 'student email', '1621016@student.hcmus.edu.vn', 'Pending', 'a22eea54b946b5b57cf21b34162a74e3'),
(19, 'tonnym1208', 'driver card', '442431443527835121332488962797388913704960n.jpg', 'OK', NULL),
(20, 'tonnym1208', 'cmnd card', '442945342372385571501241284022250286088192n.jpg', 'Pending', NULL),
(21, 'tonnym1208', 'student card', '442214015299576907791908241043257400754176n.jpg', 'Đang chờ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trip_id` (`trip_id`);

--
-- Indexes for table `matched`
--
ALTER TABLE `matched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needed_trip`
--
ALTER TABLE `needed_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start_from` (`start_from`),
  ADD KEY `finish_to` (`finish_to`),
  ADD KEY `asker` (`asker`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`start_from`,`finish_to`),
  ADD KEY `finish_to` (`finish_to`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `guess_id` (`guess_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `start_from` (`start_from`),
  ADD KEY `finish_to` (`finish_to`),
  ADD KEY `owner` (`owner`),
  ADD KEY `guess` (`guess`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `matched`
--
ALTER TABLE `matched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `needed_trip`
--
ALTER TABLE `needed_trip`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`);

--
-- Constraints for table `needed_trip`
--
ALTER TABLE `needed_trip`
  ADD CONSTRAINT `needed_trip_ibfk_1` FOREIGN KEY (`start_from`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `needed_trip_ibfk_2` FOREIGN KEY (`finish_to`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `needed_trip_ibfk_3` FOREIGN KEY (`asker`) REFERENCES `user` (`username`);

--
-- Constraints for table `notify`
--
ALTER TABLE `notify`
  ADD CONSTRAINT `notify_ibfk_1` FOREIGN KEY (`to_user`) REFERENCES `user` (`username`);

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`start_from`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`finish_to`) REFERENCES `place` (`id`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `user` (`username`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`guess_id`) REFERENCES `user` (`username`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`to_user`) REFERENCES `user` (`username`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`start_from`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`finish_to`) REFERENCES `place` (`id`),
  ADD CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`owner`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `trip_ibfk_4` FOREIGN KEY (`guess`) REFERENCES `user` (`username`);

--
-- Constraints for table `verify`
--
ALTER TABLE `verify`
  ADD CONSTRAINT `verify_ibfk_1` FOREIGN KEY (`from_user`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
