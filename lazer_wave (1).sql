-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2025 at 09:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazer_wave`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balance`
--

CREATE TABLE `account_balance` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Amount` int(128) NOT NULL,
  `Account_no` int(10) NOT NULL,
  `Account_status` varchar(25) NOT NULL,
  `Last_updated` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_limit`
--

CREATE TABLE `account_limit` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) DEFAULT NULL,
  `Limit_amount` int(123) DEFAULT NULL,
  `Time_id` time DEFAULT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `API_key` varchar(255) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `User_id`, `API_key`, `Status`) VALUES
(1, 1, '655c47857e80513855655c47857e84f1964533291', 'granted');

-- --------------------------------------------------------

--
-- Table structure for table `authentication_table`
--

CREATE TABLE `authentication_table` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Hash_key` varchar(255) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authentication_table`
--

INSERT INTO `authentication_table` (`id`, `User_id`, `Hash_key`, `Date_created`) VALUES
(1, 1, '$2y$10$6okgbdr/hzj/TdZWsxuzs.ld5HygSMY4ZGT9Ud.2wk0YC5kuxC4te', '2023-10-11 07:42:20'),
(2, 1, '$2y$10$vWWfCY1zGhtQKuehYT7sQuTPx/iNubuYqjBvNhCYjJTJ0N/4YvMNG', '2023-10-11 07:44:33'),
(3, 1, '$2y$10$RiORcKm8/P4H..jSBFNWV.pV3YZCZHvYeX2nJdNzsFXyLLZsWTdOu', '2023-10-11 08:06:05'),
(4, 1, '$2y$10$tTRpXpVQ46th0yWlz5Sv9OCrI2CiM87Bez0Lw6R5akbKBUIdEWekO', '2023-10-11 08:08:16'),
(5, 1, '$2y$10$gd0t.A1hzzfTm3ZeTjigB.m.uUb3Sd9J5ho7jHeWLpc2sypIy7IPG', '2023-10-13 07:56:10'),
(6, 1, '$2y$10$2PAsnOSDXdr2LANApT4f9OgofqIraqFyLIhi52xS3Am/fsBKsAy5m', '2023-10-13 08:29:44'),
(7, 1, '$2y$10$T2XQckjusEMNoZvsRSx1J.A42jk5EJJT3ouwCP9MEgV4ppvw0Hwp.', '2023-10-13 12:05:29'),
(8, 1, '$2y$10$k.ZPK1Kbl3u.c5FmIpTO..sxIfugpEO1jnL2YNX3KO0L4FBL02XNK', '2023-10-13 15:55:20'),
(9, 1, '$2y$10$6DslBC9YXHTs26VsUqE3GOgxyi0LN7PZB7aoyovS8JvxVKOWclN5u', '2023-10-14 08:04:05'),
(10, 1, '$2y$10$ImCDBV82ih56es4kY5WaLu3L.nfjDb2.SNmtNpVjlzaN4Lah.MS12', '2023-10-15 13:13:31'),
(11, 1, '$2y$10$gQXRTzg0P23pPQhOm0gNGuMD/Xla3gLphDudlDFmwguY9ZghQArC6', '2023-10-15 15:08:10'),
(12, 1, '$2y$10$xNw73Dy.g5X2.DqAjkNVL.DWyugunS2VIgiOC9WJhA/3IrCPTvX..', '2023-10-15 17:10:58'),
(13, 1, '$2y$10$QO12EstYWmoS6v1pPVV/g.n/HWB3e0GW3eO4sAIS.DS70NCuETqW.', '2023-10-16 10:17:52'),
(14, 1, '$2y$10$Q.06p3TOi./FC3DtFGFF7O8LfdV3Jaq1luxLWEFpOXbbsuSMrB2vK', '2023-10-17 11:27:19'),
(15, 2, '$2y$10$0dzRpydzEOZP4hlqLo/9i.3ljdVvbpM0biP39hcGvWsleynRgqpky', '2023-10-17 12:21:35'),
(16, 1, '$2y$10$SPoRZf/LeoC/O578PZ5ztuwPSem2e.OYFzgHycBvFZ1IZf41DupmC', '2023-10-18 12:32:34'),
(17, 2, '$2y$10$zeDV9Gp3oJtst.ySfbAO3.s.sm.wZy7ajUKthhBlYepVFFcDCMpfq', '2023-10-18 13:18:34'),
(18, 2, '$2y$10$5PE/bT3zQsVGnIsqmQDnDeiYCGHjOW5I2oVhyoB0gPTydXlClOSOO', '2023-10-18 15:11:08'),
(19, 1, '$2y$10$jKiyPR0rstsd5GItnOlDQucP5LBTWZkHtAy24bdI0WpXxxcrP7mJG', '2023-10-19 07:51:50'),
(20, 2, '$2y$10$qVi3GfxC.JRLcUOYfQ2xruTIwvwWSB5gmOfzQ8tt3bdZiPoCR8/WG', '2023-10-19 10:59:18'),
(21, 1, '$2y$10$n7KDHwGKqyADoPjaEzu9XuQ04lABwxzp4cWGWF/aPlxkV1mzVX21W', '2023-10-19 23:14:32'),
(22, 1, '$2y$10$GCH0H/rrcumjCrRifhKAX.YdX4hSZ6M5LOr6rnQuYL0GX.wfYxXQO', '2023-10-20 08:22:39'),
(23, 2, '$2y$10$/TeBBRij2Oh0iWx8131nmOIfWgxlqya2YHwdLfNJlYGEZV8ZeD9Sm', '2023-10-20 09:07:24'),
(24, 1, '$2y$10$i3ga7ohNHIXEfx6hy4ioxOWT7fzlq35Jo5sFkNSt/CtbaIGfRjZve', '2023-10-20 10:13:37'),
(25, 1, '$2y$10$pauJUTfvPJDOede/8AvtDeOgpVL2i8yg7magG5XsK.2vSydxKxlDe', '2023-10-20 14:18:58'),
(26, 1, '$2y$10$69Xy3R5k6GV0RGXLoko1geRSGxD/mi91JlOzC2eCHkncDRCJTytE6', '2023-10-20 15:02:54'),
(27, 1, '$2y$10$nYC.t0TcYMn6iWrDJxqRDOESfZtl9ODYZdKQu6SPUUtVLpGuHXY4q', '2023-10-22 09:56:19'),
(28, 2, '$2y$10$sCO1epmn5e8hqK.fugLKrOyttN40zFSASSGSwuDzEy21i3CqRXS/K', '2023-10-22 12:03:36'),
(29, 1, '$2y$10$omfrroNMmvH.tJKPb5TXsOC40V6qHL0wnUwfWzEkbQxzOLK1IWdDG', '2023-10-23 09:46:08'),
(30, 1, '$2y$10$B1SiC4Sp0v6JiR4X5mjnluLUKz2BFgyFJanl1c716I6z2t.LAoIJi', '2023-10-23 18:09:40'),
(31, 1, '$2y$10$hhu5daN0qm6u8VreXP97EO.evE4AtnnfuQxR/zlWfioOy9utmqUJS', '2023-10-23 19:46:48'),
(32, 1, '$2y$10$4UCZy5aN3wxpq4IwmWW3supTTgeXbIgunMM7Y6vfJHM8J.Cq4Y8DO', '2023-10-24 11:24:17'),
(33, 2, '$2y$10$LrOBJAItUud.ZbiKl.yVBugheOW4XIYgbyfxcj3.RcpC/PvuRIaKi', '2023-10-24 11:32:23'),
(34, 1, '$2y$10$9hu0IgLcLSB50e3gMZVZD.hEPXnjkgua/J8.4I1TOg7bKGbhzBzSC', '2023-10-24 12:06:33'),
(35, 1, '$2y$10$U29cGRJhQiCoOnLk0F1MieqXRTXYW1dgvmY.a9CTI/MJP.HFDH9fS', '2023-11-01 08:47:06'),
(36, 1, '$2y$10$73l32hKR3gb26oivY0usQe8kRbgDhSfV8rVFFSPOzVKSaxal1lzl6', '2023-11-04 07:34:30'),
(37, 1, '$2y$10$LYlqlalgz99NiDM8T7wwDecp/F1nlliOfwWNFBw1bKR2XQi4HDvHa', '2023-11-04 07:42:58'),
(38, 1, '$2y$10$51ttlwPWU76VHoa77fb5j.My/5fKw.X5qcZFWP9kwCmOboz3tf.Ju', '2023-11-07 06:51:53'),
(39, 2, '$2y$10$mZexVfhkNfwkpE3M/Lx3B.KViLOd1UEnQNvlRROx813cQGhe.zQOe', '2023-11-07 09:55:40'),
(40, 1, '$2y$10$QRjBHTSuLKMQmfDjaJwfM.vYIvywFG0ZmZSiSfLOFxSUr2o/Hcaou', '2023-11-07 15:21:44'),
(41, 1, '$2y$10$67rdTRgCBG6AU1B2O6ParuTvDpZsLeivsRtxMuUgAPHLkoiSR30Yq', '2023-11-08 07:05:55'),
(42, 1, '$2y$10$69Hi2Jjg23pasZ3rINpky.L4k7pWW/R/zXXXdTVY47SaQiKuoyKyO', '2023-11-10 06:15:19'),
(43, 1, '$2y$10$jSKeWSXyWEEyfl7NV9TJvePu1EzqobPCQj0pwTQtG..FxV26BQg82', '2023-11-12 07:20:20'),
(44, 9, '$2y$10$NTMGxNsVC0D6IuZUuKDUmepkj6.a96bksV6Aa.FXxBdwffrpzBwm.', '2023-11-14 06:15:41'),
(45, 1, '$2y$10$OoPkeh2aoOh9pl95htoS/ObFFs06tRnFIIphlLQkP/ch8YQe6AfvK', '2023-11-14 06:16:05'),
(46, 1, '$2y$10$G6am5tBkdoeru0l6d.brd.pBrNNdNQZC9pbYM0TeCjTgrWRohqhMa', '2023-11-18 10:26:47'),
(47, 1, '$2y$10$jZYGQAcGuAYDpDP.x0monugH4AC7IecPegXNPCuuvdYZb6.XMCCfi', '2023-11-18 11:49:53'),
(48, 1, '$2y$10$fjkUAbz7uq4QQ5lXb6JrPe31wqNgT3kY25V8fNpkAw/eR1XJJldia', '2023-11-20 11:44:00'),
(49, 1, '$2y$10$NLz69fwGYFQX9P0cI19UpeTjhs1HD53vuLV7VPdqKFZuM0y3kAg5a', '2023-11-21 05:23:33'),
(50, 1, '$2y$10$U6.vrSxS7ytTYTsfUWSwq.OxHBTY.UcuFvDaABm7UQlrv9udl9N4a', '2023-11-21 05:47:54'),
(51, 1, '$2y$10$1q.UO7GrUZzLgk/e8LkoI.opqXE.O1/cqF80AZnx98mleBAhKQYCC', '2023-11-23 07:20:27'),
(52, 1, '$2y$10$vKNtKY36g5JPPlUOy78uzOkza3Ix0.9ZHQ/OfyFnvUuWCdg4VgzuG', '2023-11-24 06:48:40'),
(53, 1, '$2y$10$.A6rZhGsH1/p4xKM4q.BOuRZ5LtTYF7SLrNdODE9NUzdpSVtx6nei', '2023-11-26 07:18:53'),
(54, 1, '$2y$10$oRNMOtXLkNi1AOH1ZtF4FOz0QQskQRNZhjJfuo5VoysETlAhlj1q2', '2023-11-26 21:14:29'),
(55, 1, '$2y$10$BmtVg1l6KQlDMyEiSykK../mHIsvFl0BG5zuly05xAGpSzkWakLcW', '2023-12-03 12:50:43'),
(56, 1, '$2y$10$PPM0jVHPXLW0G8eclD0EtuhBApL7gq5NDskDw5kMJS4rQvywozHGS', '2023-12-03 12:56:26'),
(57, 1, '$2y$10$r4xQrr2wc8TyM2UE2TjL1eaSyEqDfPdvBQb3bMzdgsChlwv8dSnv6', '2023-12-03 12:57:35'),
(58, 1, '$2y$10$US0dtPUPfXPGPUC6F/2o/.pEk1SrqXaQy94nGGjeM4wIv7PPVlfKi', '2024-07-07 18:49:12'),
(59, 1, '$2y$10$ETK22fyKrpWHSAWDYjxMj.bryl2zUnCR9kP6eMCSWetD.Uy22NCam', '2024-07-07 20:06:18'),
(60, 1, '$2y$10$HTyV3by6h.x/xz7vaUAFBeIjg5umM.KdKUQth32hggLJLDC9dz1rG', '2024-07-07 20:14:11'),
(61, 1, '$2y$10$dGbRKmNfVsouf/i0UQhxsuMRic0e4s0E2M8lCB4ZxM.1FnYWOLIBy', '2024-07-07 20:15:05'),
(62, 1, '$2y$10$g13CDoawrVHcBodEamz5.OCcaeQg/ZwtKi/jo4ZlTuIgLCi8GvVNG', '2024-07-07 20:51:36'),
(63, 2, '$2y$10$KZ5uUQzvHxQ8/IHHEzpCre1VLNfgpjLg22Tc1pMm585kg0IsgOley', '2024-07-07 23:50:03'),
(64, 1, '$2y$10$.Di/.18d8CcDfhImePrpI.9JcJF0zQ7yUW7vcsTgvw5tfg6RfTNFC', '2024-07-08 19:16:25'),
(65, 1, '$2y$10$.MJyGXR803FzawWjbzEKCeEPU6e/GOqgkCgc9W3XwZJ8z1uA5RuyC', '2024-07-09 08:18:14'),
(66, 1, '$2y$10$vn.LEMxA8UHTULhU2455OOVew5PN30P0Lu4LqDfaETElgYPO1gUyW', '2024-07-09 10:50:31'),
(67, 2, '$2y$10$/CqkQZXJn1KfgTvSkVz2Oe3KLZGJRbeC486Di6eRVR3LAWUDk1Fsy', '2024-07-09 10:56:30'),
(68, 1, '$2y$10$4fbRQK6wbiEpC8zsrRMeFumRV9QixunWwstpL8dGHIg54BDctHq/C', '2024-07-09 12:26:12'),
(69, 1, '$2y$10$uur/DmuwL.T4xDnQSWNcqe3kJSYAJW21jjQF8P4htW5qTMZ58ssbW', '2024-07-09 13:04:06'),
(70, 2, '$2y$10$OgvJ6T6eFtAuZHA1lR4S8ub36z07fdlQFqnfFctNowd.XussbHYMC', '2024-07-09 18:03:38'),
(71, 1, '$2y$10$krK07STyZ4MCfnFMkq9bgeMHZXKDH//RmEmkjgSzUP2Luecq/iyCy', '2024-07-09 22:47:42'),
(72, 1, '$2y$10$DBGAnIAKdMLhHiJBK5xkHezrP/a8BKsbI9ge7475GJig0Us0KIQq6', '2024-07-10 07:45:59'),
(73, 2, '$2y$10$aixL9hDhApsuej3OYZXz9Okr1dM7FWusDwQJDj3g9sAU8uXWT1q7i', '2024-07-10 11:36:17'),
(74, 1, '$2y$10$UI.JaBKpIShcdgSc5lAjxOJQtTdnaTkHmQXlj.0nzCYArQ.MOEdEa', '2024-07-11 08:29:39'),
(75, 1, '$2y$10$sofs2yELIrXWxquXPtkcV.Ms2Soug/ZzhjoKSTyDpb6aypQPfsray', '2024-07-12 09:47:26'),
(76, 1, '$2y$10$bVafPhyw/e0epLY7/1Wx9eEB75dtKsfO1nR5A/.ZYJyHT4yqLFj/K', '2024-07-13 16:59:13'),
(77, 2, '$2y$10$2VLL.IkdQ3h8f8gkxRmTVuCp9Ofk8xMgQx9udWKzfv2oVMwP4P63W', '2024-07-13 18:47:04'),
(78, 1, '$2y$10$jSakRPoShJbHYqj3QtqA7eY9U9HwYQpSdjoMQmMahIELWVf6HBalC', '2024-07-13 18:50:25'),
(79, 10, '$2y$10$XkgzfD7bHMnFkSPUD6sICeIQJOz1xVg.9LG9maDY0lc0ZYoyga6gS', '2024-07-13 22:42:47'),
(80, 1, '$2y$10$x6KdcNr2w.0Ar7hoCH2DDe888or1zIbuYQ4s7/zIe8z1km/xZwMUi', '2024-07-13 22:53:15'),
(81, 10, '$2y$10$2q.ynTf9UzIhCPf9QqAsLecFieoj3ph0Dj04EGgKSeqVCKI/IjCCu', '2024-07-13 23:02:02'),
(82, 10, '$2y$10$g0QxW1MqIPmseU09ao8m5eFckvsxeDeAy/h1n.xjWgdzIpfd4ib2a', '2024-07-14 08:25:22'),
(83, 2, '$2y$10$CmMEUpBVShgYrGjMymeNa.zGSoEu2snd.cS5iO5c/8raAR8fIOrTW', '2024-07-14 12:09:04'),
(84, 10, '$2y$10$u.BbaWVwbHRAEMERuj6aR.mPqhekQkiSaQdfwVFx0kX2vBXKN9GAq', '2024-07-16 22:10:08'),
(85, 10, '$2y$10$JY1H5AqqlB/7bnn0X1ZtEeA.nZJkSbJd7BspNXbj7e2Wlilrtncri', '2024-07-17 15:28:33'),
(86, 10, '$2y$10$vCtx1GfuU2TYsK3d3Fn6DuJKsMkB3MWI4uHwG6.gZvvnyTNejozwu', '2024-07-21 16:25:42'),
(87, 1, '$2y$10$UFPMIjVwqMuJtq3jGTwdxuQ3KEt3ToqpPxTPMK8ls2LEiZnCWsAMS', '2024-07-30 15:30:56'),
(88, 1, '$2y$10$O232uAihd7Df9uSNr3AKze1j6rDZ.NuYE7/WzGRlg4s8u4XyTrVR.', '2024-08-10 15:38:18'),
(89, 1, '$2y$10$lwDdOf9GGUr6bG5uqrFFqOXsZEJD1VH/eZA/Gy0462Gc2Bc5ZmDW6', '2024-09-04 15:26:28'),
(90, 1, '$2y$10$mNNmgW6KfnCjeZFC7bhLfePaRZuJFbUnF0zqyeTUH.NwE4L/MjAR6', '2024-09-04 15:27:01'),
(91, 1, '$2y$10$LstpAiKyl.PmoxHnFEWOiuzniK08sTl4ggZBGFTZvUsjDpkRTLf0S', '2024-09-04 19:59:05'),
(92, 1, '$2y$10$BZ23mb7/N7k7bMmHzn04/upDdjnSpkIuF.bc4CPJ74OAJzG0sxvCm', '2024-09-09 22:34:26'),
(93, 1, '$2y$10$sa.lW1Qj22Rzqol.WaegXOez61pbD6DaTRXG6a6w8ia4rBwumt5YO', '2024-09-09 22:34:41'),
(94, 1, '$2y$10$aKsWe1AszeEmlwfWp8gVEOdCK3WOYSoVsZ0pbAhLrUCZ3HPBlt8TO', '2024-09-16 14:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Full_name` text NOT NULL,
  `Acct_no` int(12) NOT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_id` time NOT NULL,
  `Ip_addr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`id`, `User_id`, `Full_name`, `Acct_no`, `Date_id`, `Time_id`, `Ip_addr`) VALUES
(1, 1, 'ONYEKA ENEWA PRECIOUS', 2106676155, '2023-11-07 10:58:04', '11:58:04', '::1'),
(2, 1, 'JOHNDOE  DOE', 710908402, '2024-07-10 14:01:41', '15:01:41', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `block_account`
--

CREATE TABLE `block_account` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Account_status` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_addr` varchar(255) DEFAULT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block_account`
--

INSERT INTO `block_account` (`id`, `User_id`, `Account_status`, `Date`, `Ip_addr`, `User_agent`) VALUES
(1, 1, 'Block', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(2, 1, 'Block', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(3, 1, 'Block', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(4, 1, 'Block', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(5, 1, 'Block', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(6, 1, 'Unblock', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(7, 1, 'Unblock', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(8, 1, 'Unblock', '2023-10-12 23:00:00', '::1', 'Desktop Windows'),
(9, 1, 'disabled', '2023-11-25 23:00:00', '::1', 'Desktop Windows'),
(10, 1, 'Unblock', '2023-11-25 23:00:00', '::1', 'Desktop Windows'),
(11, 1, 'Unblock', '2023-11-25 23:00:00', '::1', 'Desktop Windows'),
(12, 1, 'Unblock', '2023-11-26 08:13:21', '::1', 'Desktop Windows'),
(15, 1, 'Block', '2023-11-26 08:18:17', '::1', 'Desktop Windows'),
(16, 1, 'Unblock', '2023-11-26 08:18:56', '::1', 'Desktop Windows'),
(17, 1, 'Block', '2023-11-26 08:19:45', '::1', 'Desktop Windows'),
(18, 1, 'Unblock', '2023-11-26 08:19:56', '::1', 'Desktop Windows');

-- --------------------------------------------------------

--
-- Table structure for table `block_account_history`
--

CREATE TABLE `block_account_history` (
  `id` int(100) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Account_status` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_addr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `block_account_history`
--

INSERT INTO `block_account_history` (`id`, `User_id`, `Account_status`, `Date`, `Ip_addr`) VALUES
(1, 1, 'Block', '2023-10-12 23:00:00', '::1'),
(2, 1, 'Block', '2023-10-12 23:00:00', '::1'),
(3, 1, 'Block', '2023-10-12 23:00:00', '::1'),
(4, 1, 'Block', '2023-10-12 23:00:00', '::1'),
(5, 1, 'Block', '2023-10-12 23:00:00', '::1'),
(6, 1, 'Unblock', '2023-10-12 23:00:00', '::1'),
(7, 1, 'Unblock', '2023-10-12 23:00:00', '::1'),
(8, 1, 'Unblock', '2023-10-12 23:00:00', '::1'),
(9, 1, 'disabled', '2023-11-25 23:00:00', '::1'),
(10, 1, 'Unblock', '2023-11-25 23:00:00', '::1'),
(11, 1, 'Unblock', '2023-11-25 23:00:00', '::1'),
(12, 1, 'Unblock', '2023-11-26 08:13:21', '::1'),
(13, 1, 'disabled', '2023-11-26 08:16:12', '::1'),
(14, 1, 'disabled', '2023-11-26 08:17:23', '::1'),
(15, 1, 'Block', '2023-11-26 08:18:17', '::1'),
(16, 1, 'Unblock', '2023-11-26 08:18:56', '::1'),
(17, 1, 'Block', '2023-11-26 08:19:45', '::1'),
(18, 1, 'Unblock', '2023-11-26 08:19:56', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `change_password_history`
--

CREATE TABLE `change_password_history` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) DEFAULT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_addr` varchar(30) DEFAULT NULL,
  `Device_name` varchar(20) DEFAULT NULL,
  `Time_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_password_otp`
--

CREATE TABLE `change_password_otp` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) DEFAULT NULL,
  `Otp` int(6) DEFAULT NULL,
  `Time_id` time DEFAULT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_plan`
--

CREATE TABLE `data_plan` (
  `id` int(10) UNSIGNED NOT NULL,
  `Network_provider` text NOT NULL,
  `Plan` varchar(50) NOT NULL,
  `Amount` int(8) NOT NULL,
  `Hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_plan`
--

INSERT INTO `data_plan` (`id`, `Network_provider`, `Plan`, `Amount`, `Hash`) VALUES
(1, 'MTN', '₦50(40Mb)1day', 50, 'KKtar8282673GG1423H'),
(2, 'MTN', '₦100(100Mb)1day', 100, 'TJBC$%#%HGbvahgs73GG1423H'),
(3, 'MTN', '₦300(350Mb)1day', 300, 'JNVhags8-2838378383j'),
(4, 'MTN', '₦350(1Gb)1day', 350, '737en9wnznwjsa923836sbn'),
(6, 'MTN', '₦500(2.5Gb)2days', 500, 'BBjaGHksie928383mbsu93'),
(7, 'MTN', '₦500(750Mb)1week', 500, 'KKarebas0928378msamsm83'),
(8, 'MTN', '₦1,500(6Gb)1week', 1500, 'KKtar828Kaushey302983673GG1423H'),
(9, 'MTN', '₦1,000(1Gb)1month', 1000, 'PPnzxga72727anjsj82na'),
(10, 'MTN', '₦1,200(1.5Gb)1month', 1200, 'ZZnaj28934848KKahw98'),
(11, 'MTN', '₦2,000(6Gb)1month', 2000, 'BBgatqk9383m1932764sm');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `User_id`, `Status`, `Date`, `Time`) VALUES
(1, 1, 'verified', '2023-10-13 10:51:22', '11:51:22'),
(2, 10, 'verified', '2024-07-14 10:40:31', '11:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `extra_info`
--

CREATE TABLE `extra_info` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Tel` text NOT NULL,
  `State` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_addr` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extra_info`
--

INSERT INTO `extra_info` (`id`, `User_id`, `Tel`, `State`, `Address`, `Date`, `Ip_addr`) VALUES
(1, 1, '9074220984', 'Abuja', 'Satelite quaters,Kwali Abuja', '2023-10-20 11:27:43', '::1'),
(2, 9, '8036295994', 'Abuja', 'Gwagwalada', '2023-11-12 10:40:29', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `general_otp_table`
--

CREATE TABLE `general_otp_table` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Otp` int(6) NOT NULL,
  `Hash` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time NOT NULL,
  `Status` text DEFAULT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `general_otp_table`
--

INSERT INTO `general_otp_table` (`id`, `User_id`, `Otp`, `Hash`, `Date`, `Time`, `Status`, `User_agent`) VALUES
(1, 1, 39567, '$2y$10$m4REtoEOTEhhbdNq83j.6OFNlOCtuYAUbxjkz8FMHCAJK.wZONXga', '2023-10-13 10:48:08', '11:48:08', '', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(2, 1, 105363, '$2y$10$p.fq3eTOObizoukUxHQvB.z4BWGzOFw6ZWBSDJEQ.ZcMAiyZIU.aG', '2023-10-13 10:50:06', '11:50:06', '', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(3, 1, 73886, '$2y$10$cvXAhmwXjHXWE5u4Z.O2MOXk24UneUFajQtXHUappjbFS3zewndV2', '2023-10-13 09:51:22', '11:50:34', 'seen', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(4, 2, 64624, '$2y$10$iyHtXK6nwIHwVz1vXMk5gO.HYPlW5062sDewQMSL.rN6AJcijOg0W', '2023-10-16 15:19:41', '16:19:41', '', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(5, 2, 85230, '$2y$10$E.UQ8ZxUokYqisCveXMR3.lmVXkDsxd8hhBVIyRSuISV7D3MWfJXa', '2023-10-16 15:21:10', '16:21:10', '', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(6, 2, 104766, '$2y$10$F4qiempkoUhVUK2DS7nfnOAkrQkf1zz91Q4Z6ErT1yxsoSfDAK2ge', '2023-10-24 11:37:38', '12:37:38', '', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(7, 9, 28596, '$2y$10$oJJ9khFAnLpwvF4sqj7LNeudIG19Jb7RApS4Gxy0S531R6Pt8qWfi', '2023-11-12 10:39:20', '11:39:20', '', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(8, 10, 46581, '$2y$10$gt2VObtQxl37hYkI8nmtEOWs/COt5oXaldw225Dus4N/i.C0fpUSO', '2024-07-13 22:27:51', '23:27:51', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(9, 10, 70176, '$2y$10$dgvJM3dp06H7j78/rskXnu7on.Fry/mRuLdEqQYQkP6RRwTHLI4Qe', '2024-07-13 22:35:46', '23:35:46', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(10, 10, 121645, '$2y$10$fYypYsYR3yJwBCGJdQ5MiuhqEgeRTapsNhFx10eLmTRMbgbnLBdaK', '2024-07-14 08:43:00', '09:43:00', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(11, 10, 120747, '$2y$10$gEYBiWsn2rMwBjz8yY2b1efNrs15ZeKleZKou/k5hk8wAbwumpxwm', '2024-07-14 10:22:48', '11:22:48', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(12, 10, 97208, '$2y$10$wRVSlhiPo0hZWY40V0RHsu0aqpZmYSiAMqc3.OlQ1QzQ7JPyhllcG', '2024-07-14 10:22:52', '11:22:52', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(13, 10, 46013, '$2y$10$PM9qvrgvzOD.f6GX2AQBnOoStz/g0OKeKGH52gKwvE.Tef/VqSOvm', '2024-07-14 10:24:01', '11:24:01', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(14, 10, 92767, '$2y$10$BPJREpGLmN8jWelSU40RX.dEtVUlUZy5/mnscxqKfLWDiwD8USU2m', '2024-07-14 10:24:17', '11:24:17', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(15, 10, 112520, '$2y$10$ogWmYR.WNUjuExADGFO.L.27wHe8f.4iben0C1/iBmSOoQkM.rHEO', '2024-07-14 10:25:10', '11:25:10', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(16, 10, 118682, '$2y$10$zBNDl42FUwg8NzopcUv6t.dEy1vMFh1Fs/HQ5wnSY9DZd6SiWFA.W', '2024-07-14 10:25:34', '11:25:34', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(17, 10, 47940, '$2y$10$.Kg1HiBaPnByeXl7evAeoutNyBkca7tVbkAauCKzamt87D98uFC0y', '2024-07-14 10:28:21', '11:28:21', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(18, 10, 61029, '$2y$10$OSuH1IS.nNA106lgAbYxRekZNIS2YpthKG6bXPmTq3WsloP5c/Qty', '2024-07-14 10:29:23', '11:29:23', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(19, 10, 131706, '$2y$10$KSE5ewJL6hw0TegYQP.lweNtNsVfPXCYUNgjtLP3INii57pjtSi8u', '2024-07-14 10:31:25', '11:31:25', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(20, 10, 74869, '$2y$10$jYWi23FS9PNzOkvO0lOQnuaTrypz.1HHery/hh7oV7BopxNNBK7yq', '2024-07-14 10:33:44', '11:33:44', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(21, 10, 55183, '$2y$10$VvMIi.wCIJBQHeAN5ZpAG.IVsMX8B438OiX/ahqnqWfT5uN192dGO', '2024-07-14 10:33:55', '11:33:55', '', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(22, 10, 48423, '$2y$10$FiHSfGEwJ9Zr6nPkOf74bOWsDt34lDQ3YGpnO895QH6rgFqxSqY8e', '2024-07-14 09:40:31', '11:38:09', 'seen', 'Desktop Windows on Google Chrome 126.0.0.0 on windows');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL,
  `Ip_addr` varchar(20) DEFAULT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `User_id`, `Date`, `Time`, `Ip_addr`, `User_agent`) VALUES
(1, 1, '2023-10-10 23:00:00', '08:42:19', '::1', 'Desktop Windows'),
(2, 1, '2023-10-11 07:44:32', '08:44:32', '::1', 'Desktop Windows'),
(3, 1, '2023-10-11 08:06:04', '09:06:04', '::1', 'Desktop Windows Google Chrome 117.0.0.0 on windows'),
(4, 1, '2023-10-11 08:08:15', '09:08:15', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(5, 1, '2023-10-13 07:56:08', '08:56:08', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(6, 1, '2023-10-13 08:29:44', '09:29:44', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(7, 1, '2023-10-13 12:05:26', '13:05:26', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(8, 1, '2023-10-13 15:55:19', '16:55:19', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(9, 1, '2023-10-14 08:04:03', '09:04:03', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(10, 1, '2023-10-15 13:13:31', '14:13:31', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(11, 1, '2023-10-15 15:08:09', '16:08:09', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(12, 1, '2023-10-15 17:10:57', '18:10:57', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(13, 1, '2023-10-16 10:17:52', '11:17:52', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(14, 1, '2023-10-17 11:27:04', '12:27:04', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(15, 2, '2023-10-17 12:21:30', '13:21:30', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(16, 1, '2023-10-18 12:32:32', '13:32:32', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(17, 2, '2023-10-18 13:18:33', '14:18:33', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(18, 2, '2023-10-18 15:11:08', '16:11:08', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(19, 1, '2023-10-19 07:51:49', '08:51:49', '::1', 'Desktop Windows Google Chrome on 117.0.0.0 on windows'),
(20, 2, '2023-10-19 10:59:14', '11:59:14', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(21, 1, '2023-10-19 23:14:31', '00:14:31', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(22, 1, '2023-10-20 08:22:39', '09:22:39', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(23, 2, '2023-10-20 09:06:41', '10:06:41', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(24, 1, '2023-10-20 10:13:37', '11:13:37', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(25, 1, '2023-10-20 14:18:57', '15:18:57', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(26, 1, '2023-10-20 15:02:54', '16:02:54', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(27, 1, '2023-10-22 09:56:09', '10:56:09', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(28, 2, '2023-10-22 12:03:36', '13:03:36', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(29, 1, '2023-10-23 09:46:07', '10:46:07', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(30, 1, '2023-10-23 18:09:39', '19:09:39', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(31, 1, '2023-10-23 19:46:48', '20:46:48', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(32, 1, '2023-10-24 11:24:17', '12:24:17', '127.0.0.1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(33, 2, '2023-10-24 11:32:22', '12:32:22', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(34, 1, '2023-10-24 12:06:27', '13:06:27', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(35, 1, '2023-11-01 08:47:04', '09:47:04', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(36, 1, '2023-11-04 07:34:29', '08:34:29', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(37, 1, '2023-11-04 07:42:57', '08:42:57', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(38, 1, '2023-11-07 06:51:53', '07:51:53', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(39, 2, '2023-11-07 09:55:40', '10:55:40', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(40, 1, '2023-11-07 15:21:44', '16:21:44', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(41, 1, '2023-11-08 07:05:55', '08:05:55', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(42, 1, '2023-11-10 06:15:18', '07:15:18', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(43, 1, '2023-11-12 07:19:28', '08:19:28', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(44, 9, '2023-11-14 06:15:39', '07:15:39', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(45, 1, '2023-11-14 06:16:03', '07:16:03', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(46, 1, '2023-11-18 10:26:41', '11:26:41', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(47, 1, '2023-11-18 11:49:53', '12:49:53', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(48, 1, '2023-11-20 11:43:59', '12:43:59', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(49, 1, '2023-11-21 05:23:32', '06:23:32', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(50, 1, '2023-11-21 05:47:54', '06:47:54', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(51, 1, '2023-11-23 07:20:26', '08:20:26', '::1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(52, 1, '2023-11-24 06:47:21', '07:47:21', '127.0.0.1', 'Desktop Windows Google Chrome on 118.0.0.0 on windows'),
(53, 1, '2023-11-26 07:18:51', '08:18:51', '::1', 'Desktop Windows Google Chrome on 119.0.0.0 on windows'),
(54, 1, '2023-11-26 21:14:28', '22:14:28', '::1', 'Desktop Windows Google Chrome on 119.0.0.0 on windows'),
(55, 1, '2023-12-03 12:50:38', '13:50:38', '::1', 'Desktop Windows Google Chrome on 119.0.0.0 on windows'),
(56, 1, '2023-12-03 12:56:25', '13:56:25', '::1', 'Desktop Windows Google Chrome on 119.0.0.0 on windows'),
(57, 1, '2023-12-03 12:57:35', '13:57:35', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(58, 1, '2024-07-07 18:49:11', '19:49:11', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(59, 1, '2024-07-07 20:06:17', '21:06:17', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(60, 1, '2024-07-07 20:14:10', '21:14:10', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(61, 1, '2024-07-07 20:15:05', '21:15:05', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(62, 1, '2024-07-07 20:51:35', '21:51:35', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(63, 2, '2024-07-07 23:49:59', '00:49:59', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(64, 1, '2024-07-08 19:16:24', '20:16:24', '::1', 'Desktop Windows Google Chrome on 125.0.0.0 on windows'),
(65, 1, '2024-07-09 08:18:12', '09:18:12', '::1', 'Desktop Windows Google Chrome on 125.0.0.0 on windows'),
(66, 1, '2024-07-09 10:50:27', '11:50:27', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(67, 2, '2024-07-09 10:56:26', '11:56:26', '::1', 'Desktop Windows Google Chrome on 125.0.0.0 on windows'),
(68, 1, '2024-07-09 12:26:11', '13:26:11', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(69, 1, '2024-07-09 13:04:05', '14:04:05', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(70, 2, '2024-07-09 18:03:38', '19:03:38', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(71, 1, '2024-07-09 22:47:40', '23:47:40', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(72, 1, '2024-07-10 07:45:58', '08:45:58', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(73, 2, '2024-07-10 11:36:16', '12:36:16', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(74, 1, '2024-07-11 08:29:39', '09:29:39', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(75, 1, '2024-07-12 09:47:25', '10:47:25', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(76, 1, '2024-07-13 16:59:12', '17:59:12', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(77, 2, '2024-07-13 18:47:04', '19:47:04', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(78, 1, '2024-07-13 18:50:23', '19:50:23', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(79, 1, '2024-07-13 20:50:54', '21:50:54', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(80, 10, '2024-07-13 22:42:46', '23:42:46', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(81, 1, '2024-07-13 22:53:14', '23:53:14', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(82, 10, '2024-07-13 23:02:02', '00:02:02', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(83, 10, '2024-07-14 08:25:22', '09:25:22', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(84, 2, '2024-07-14 12:08:47', '13:08:47', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(85, 10, '2024-07-16 22:10:03', '23:10:03', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(86, 10, '2024-07-17 15:28:32', '16:28:32', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(87, 10, '2024-07-21 16:25:41', '17:25:41', '::1', 'Desktop Windows Google Chrome on 126.0.0.0 on windows'),
(88, 1, '2024-07-30 15:30:55', '16:30:55', '::1', 'Desktop Windows on Google Chrome 126.0.0.0 on windows'),
(89, 1, '2024-08-10 15:38:17', '16:38:17', '::1', 'Desktop Windows on Google Chrome 127.0.0.0 on windows'),
(90, 1, '2024-09-04 15:26:26', '16:26:26', '::1', 'Desktop Windows on Google Chrome 128.0.0.0 on windows'),
(91, 1, '2024-09-04 15:26:29', '16:26:29', '::1', 'Desktop Windows on Google Chrome 128.0.0.0 on windows'),
(92, 1, '2024-09-04 15:27:00', '16:27:00', '::1', 'Desktop Windows on Google Chrome 128.0.0.0 on windows'),
(93, 1, '2024-09-04 19:59:04', '20:59:04', '::1', 'Desktop Windows Google Chrome on 128.0.0.0 on windows'),
(94, 1, '2024-09-09 22:34:24', '23:34:24', '::1', 'Desktop Windows Google Chrome on 128.0.0.0 on windows'),
(95, 1, '2024-09-09 22:34:40', '23:34:40', '::1', 'Desktop Windows Google Chrome on 128.0.0.0 on windows'),
(96, 1, '2024-09-16 14:59:54', '15:59:54', '::1', 'Desktop Windows Google Chrome on 128.0.0.0 on windows');

-- --------------------------------------------------------

--
-- Table structure for table `more_information`
--

CREATE TABLE `more_information` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `DOB` date NOT NULL,
  `State_origin` text NOT NULL,
  `LGA` text NOT NULL,
  `Mother_name` text NOT NULL,
  `Next_kin` text NOT NULL,
  `Relationship_kin` text NOT NULL,
  `Occupation` text DEFAULT NULL,
  `Date_sub` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_add` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `more_information`
--

INSERT INTO `more_information` (`id`, `User_id`, `DOB`, `State_origin`, `LGA`, `Mother_name`, `Next_kin`, `Relationship_kin`, `Occupation`, `Date_sub`, `Ip_add`) VALUES
(1, 1, '1999-09-23', 'Benue', 'Ogbadibo', 'Janet', 'Enewa Precious', 'Benue', 'Student', '2023-10-19 13:51:55', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(132) DEFAULT NULL,
  `Amount` int(20) NOT NULL,
  `Message` text NOT NULL,
  `Receiver_id` int(20) NOT NULL,
  `Notify_id` varchar(25) NOT NULL,
  `Type` text NOT NULL,
  `Status` text DEFAULT NULL,
  `Remark` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL,
  `Ip_addr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `User_id`, `Amount`, `Message`, `Receiver_id`, `Notify_id`, `Type`, `Status`, `Remark`, `Date`, `Time`, `Ip_addr`) VALUES
(1, 2, 90, 'Money Request from AJEH LAZER ABRAHAM', 1, '6530fc18cb0001671306530fc', 'Money request', 'Null', 'seen', '2023-10-19 10:00:22', '11:51:20', '::1'),
(2, 2, 90, 'Money Request from AJEH LAZER ABRAHAM', 1, '6530fed2bbbe51555956530fe', 'Money request', 'Accepted', 'seen', '2023-10-20 08:52:11', '12:02:58', '::1'),
(3, 2, 1900, 'Money Request from AJEH LAZER ABRAHAM', 1, '653103ca4a2a6143235653103', 'Money request', 'Accepted', 'seen', '2023-10-20 08:42:39', '12:24:10', '::1'),
(4, 2, 1200, 'Money Request from AJEH LAZER ABRAHAM', 1, '6531060d284de128060653106', 'Money request', 'Accepted', 'seen', '2023-10-20 08:41:14', '12:33:49', '::1'),
(5, 1, 9000, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '6531068c2c52d737896531068', 'Money request', 'Null', 'seen', '2023-10-19 10:36:39', '12:35:56', '::1'),
(6, 1, 500, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '653127500925c178932653127', 'Money request', 'Accepted', 'seen', '2023-10-19 12:56:03', '14:55:44', '::1'),
(7, 1, 700, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '6532357e95d70114958653235', 'Money request', 'Null', 'seen', '2023-10-20 08:08:30', '10:08:30', '::1'),
(8, 1, 260, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '653235b5980fe116174653235', 'Money request', 'Null', 'seen', '2023-10-20 08:09:27', '10:09:25', '::1'),
(9, 1, 70000, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '653235df1bbdd58735653235d', 'Money request', 'Null', 'seen', '2023-10-20 08:10:07', '10:10:07', '::1'),
(10, 1, 1, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '6532360e44eeb115571653236', 'Money request', 'Null', 'seen', '2023-10-20 08:11:10', '10:10:54', '::1'),
(11, 1, 9000, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '6532363d02521182536653236', 'Money request', 'Null', 'seen', '2023-10-20 08:11:50', '10:11:41', '::1'),
(12, 1, 700, 'Money Request from ONYEKA ENEWA PRECIOUS', 2, '653236cfa075f73328653236c', 'Money request', 'Null', 'seen', '2023-10-20 08:14:25', '10:14:07', '::1'),
(13, 1, 800, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', 2, '65323ac9b17048552', 'Transfer', '', 'seen', '2023-10-20 08:31:08', '10:31:03', ''),
(14, 1, 800, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', 2, '65323b63208b12294', 'Transfer', '', 'seen', '2023-10-20 08:34:16', '10:33:39', '::1'),
(15, 1, 0, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', 2, '65323d2a46fa710148', 'Accepted', '', 'seen', '2023-10-20 08:41:38', '10:41:14', '::1'),
(16, 1, 1900, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', 2, '65323d7f391f811653', 'Accepted', '', 'seen', '2023-10-20 08:43:38', '10:42:39', '::1'),
(17, 1, 90, 'Your account has been credited with ₦90From ONYEKA PRECIOUS', 2, '65323fbb8a8246408', 'Money request', 'Accepted', 'seen', '2023-10-20 08:52:14', '10:52:11', '::1'),
(18, 8, 33000, 'Registration Welcome Bonus', 3, '653501f1f26c4', 'Bonus', '', 'seen', '2023-10-22 11:56:01', '13:05:21', '::1'),
(19, 11111111, 33000, 'Registration Welcome Bonus', 4, '653505e6d08c7', 'Bonus', '', NULL, '2023-10-22 12:22:14', '13:22:14', '::1'),
(20, 202020, 33000, 'Registration Welcome Bonus', 5, '65350ad32ded8', 'Bonus', '', NULL, '2023-10-22 12:43:15', '13:43:15', '::1'),
(21, 202020, 33000, 'Registration Welcome Bonus', 6, '65350bdd9d67f', 'Bonus', '', NULL, '2023-10-22 12:47:41', '13:47:41', '::1'),
(22, 202020, 33000, 'Registration Welcome Bonus', 7, '65350ce26be4b', 'Bonus', '', NULL, '2023-10-22 12:52:02', '13:52:02', '::1'),
(23, 202020, 33000, 'Registration Welcome Bonus', 8, '65350dbbabf06', 'Bonus', '', NULL, '2023-10-22 12:55:39', '13:55:39', '::1'),
(24, 1, 12500, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', 8, '653529eea3a98', 'Transfer', '', 'seen', '2023-10-22 13:56:24', '15:55:58', '::1'),
(25, 1, 80, 'Interbank Transfer To AJEH LAZER ABRAHAM(1758015466) Repayment ', 8, '65352a7092c44', 'Transfer', '', 'seen', '2023-10-22 13:58:11', '15:58:08', '::1'),
(26, 2, 8999, 'Money Request from AJEH LAZER ABRAHAM', 1, '65460c0dd2f2713912765460c', 'Money request', 'Null', 'seen', '2023-11-07 09:56:31', '10:17:01', '::1'),
(27, 2, 56555, 'Money Request from AJEH LAZER ABRAHAM', 1, '65460cc39beaf11886765460c', 'Money request', 'Null', 'seen', '2023-11-07 09:56:31', '10:20:03', '::1'),
(28, 2, 70, 'Your account has been credited via Interbank Transfer from AJEH LAZER ABRAHAM(1758015466) ', 1, '65462a78f28e9', 'Transfer', '', 'seen', '2023-11-07 09:56:31', '12:26:48', '::1'),
(29, 2, 50, 'Your account has been credited via Interbank Transfer from AJEH LAZER ABRAHAM(1758015466) offering', 1, '654a157119fef', 'Transfer', '', 'seen', '2023-11-07 10:47:21', '11:46:08', '::1'),
(30, 9, 33000, 'Registration Welcome Bonus', 20202020, '6550a6e41800a', 'Bonus', '', 'seen', '2023-11-12 10:20:40', '11:20:20', '::1'),
(31, 2, 8525, 'Money Request from AJEH LAZER ABRAHAM', 1, '668bc6d96ab0c', 'Money request', 'Null', 'seen', '2024-07-09 09:57:12', '13:00:41', '::1'),
(32, 2, 8525, 'Money Request from AJEH LAZER ABRAHAM', 1, '668bc6d9c86af', 'Money request', '', 'seen', '2024-07-09 09:57:12', '13:00:41', '::1'),
(33, 9, 73, 'Your account has been credited via Interbank Transfer from AJEH LAZER ABRAHAM(1758015466) ', 1, '668e8626b36bc', 'Transfer', '', NULL, '2024-07-10 14:01:25', '15:01:25', '::1'),
(34, 10, 33000, 'Registration Welcome Bonus', 20202020, '6692f094ea288', 'Bonus', '', 'seen', '2024-07-13 21:25:02', '23:24:35', '::1'),
(35, 1, 500, 'Referal Bonus', 2020202020, '6692f0953672a', 'Bonus', '', 'seen', '2024-07-13 21:53:46', '23:24:35', '::1'),
(36, 10, 509, 'Money Request from AJEH LAZER ABRAHAM', 1, '6692f8aaa8bab', 'Money request', 'Null', 'seen', '2024-07-13 22:02:23', '23:59:06', '::1'),
(37, 10, 509, 'Money Request from AJEH LAZER ABRAHAM', 1, '6692f8aac4c53', 'Money request', '', 'seen', '2024-07-13 22:02:23', '23:59:06', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `payment_link_table`
--

CREATE TABLE `payment_link_table` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Amount` int(15) NOT NULL,
  `Hash_link` varchar(255) NOT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_addr` text DEFAULT NULL,
  `Image_path` varchar(200) DEFAULT NULL,
  `Link_message` text DEFAULT NULL,
  `Time` time NOT NULL,
  `Title` text NOT NULL,
  `Terms` text NOT NULL,
  `Status` text NOT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_link_table`
--

INSERT INTO `payment_link_table` (`id`, `User_id`, `Amount`, `Hash_link`, `Date_created`, `Ip_addr`, `Image_path`, `Link_message`, `Time`, `Title`, `Terms`, `Status`, `User_agent`) VALUES
(1, 1, 12500, '6528f467924ba636536528f4679287a408116528f4679287e', '2023-10-13 08:40:23', '::1', '', 'Help stop world hunger by donating to help save the children around the globe,Nothing is too little or small.Thank you! ', '09:40:23', 'Donation', 'Yes', 'Active', 'Desktop Windows'),
(2, 1, 22500, '652c13303b7f363754652c13303c91e60581652c13303c932', '2023-10-15 17:28:32', '::1', '', 'Help save the children globally by stopping world hunger.Thank you!', '18:28:32', 'Donation(Save the children)', 'Yes', 'Active', 'Desktop Windows'),
(3, 1, 22790, '652c14478175f63692652c1447820787328652c14478207e', '2023-10-15 17:33:11', '::1', '', 'Help stop world hunger', '18:33:11', 'Donation(Save the children)', 'Yes', 'Active', 'Desktop Windows'),
(4, 1, 22890, '652c154eace9963743652c154ead6da98702652c154ead6e1', '2023-10-15 17:37:34', '::1', '', 'Help stop world hunger', '18:37:34', 'Donation(Save the children)', 'Yes', 'Active', 'Desktop Windows'),
(5, 1, 155000, '652c1635becea63678652c1635bf71384525652c1635bf718', '2023-10-15 17:41:25', '::1', '', '', '18:41:25', 'House Rent', 'Yes', 'Active', 'Desktop Windows'),
(6, 1, 120789, '652c16bc2bf6063709652c16bc2c56a44593652c16bc2c56e', '2023-10-15 17:43:40', '::1', '', '', '18:43:40', 'School fee', 'Yes', 'Active', 'Desktop Windows'),
(7, 1, 12000000, '652c177232ce163717652c1772332da54726652c1772332de', '2023-10-15 17:46:42', '::1', '', '', '18:46:42', 'House Rent', 'Yes', 'Active', 'Desktop Windows'),
(8, 1, 15900, '652d04b972e3f322447652d04b973407', '2023-10-16 11:36:54', '::1', '', 'Help children globally and stop world hunger and starvation,nothing is too small.Thank you!\r\n', '11:39:05', 'Donation(Save the children)', 'Yes', 'Active', 'Desktop Windows'),
(9, 1, 12700, '6549e01b4faa84333236549e01b4fd41', '2023-11-07 06:58:35', '::1', '6549e01b541f99502366549e01b54204WhatsApp Image 2022-12-12 at 9.56.57 AM (19).jpeg', '', '07:58:35', 'Monthly savings', 'Yes', 'Active', 'Desktop Windows'),
(10, 1, 6750, '668dbd705c2ae298324668dbd705c2bf', '2024-07-09 23:45:04', '::1', '', 'Send funds please 😢', '00:45:04', 'School fee and Hoiuse rent', 'Yes', 'Active', 'Desktop Windows'),
(11, 1, 12400, '668dbfa327d38692132668dbfa327d5d', '2024-07-09 23:54:27', '::1', '', 'Please help me out', '00:54:27', 'Emergency', 'Yes', 'Active', 'Desktop Windows');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

CREATE TABLE `profile_picture` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Image_path` varchar(255) NOT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_id` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`id`, `User_id`, `Image_path`, `Date_id`, `Time_id`) VALUES
(1, 1, '10 Tue October 2023 (1). image 39193308865257a8950976WhatsApp Image 2022-11-10 at 9.01.31 PM.jpeg', '2023-10-10 17:23:37', '18:23:37'),
(2, 1, '23 Mon October 2023 (1). image 4469148046536b1703d5b7WhatsApp Image 2022-12-12 at 9.56.57 AM (27).jpeg', '2023-10-23 18:46:24', '19:46:24'),
(3, 1, '23 Mon October 2023 (1). image 12888863966536b232456b9WhatsApp Image 2022-11-10 at 9.01.31 PM.jpeg', '2023-10-23 18:49:38', '19:49:38'),
(4, 1, '23 Mon October 2023 (1). image 13649534646536b9115e16dIMG_7358.JPEG', '2023-10-23 19:18:57', '20:18:57'),
(5, 2, '24 Tue October 2023 (2). image 158851288265379e61c6ed6IMG_0028.JPG', '2023-10-24 11:37:21', '12:37:21'),
(6, 1, '08 Wed November 2023 (1). image 827083592654b3c4bc4817WhatsApp Image 2022-11-10 at 9.01.31 PM.jpeg', '2023-11-08 07:44:11', '08:44:11'),
(7, 9, '12 Sun November 2023 (9). image 4385510996550ab30ab6e7WhatsApp Image 2022-12-12 at 9.56.57 AM (20).jpeg', '2023-11-12 10:38:40', '11:38:40'),
(8, 10, '14 Sun July 2024 (10). image 1605207213669383b620868IMG-20211222-WA0017.jpg', '2024-07-14 08:52:22', '09:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `refer_and_earn`
--

CREATE TABLE `refer_and_earn` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Link_key` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refer_and_earn`
--

INSERT INTO `refer_and_earn` (`id`, `User_id`, `Amount`, `Link_key`, `Date`) VALUES
(1, 1, 1000, '8271652961efdc3a919', '2023-10-13 16:27:43'),
(2, 1, 1000, '4837653121657b56630', '2023-10-19 13:30:29'),
(3, 1, 1000, '4407653122316ea8837', '2023-10-19 13:33:53'),
(4, 1, 1000, '33336531242eeeb5e52', '2023-10-19 13:42:22'),
(5, 1, 1000, '8836653500d44442220', '2023-10-22 12:00:36'),
(6, 1, 1000, '4207653505a4832fd29', '2023-10-22 12:21:08'),
(7, 1, 1000, '408865351b8a8d50953', '2023-10-22 13:54:34'),
(8, 1, 1000, '623865351b8e0a87331', '2023-10-22 13:54:38'),
(9, 1, 1000, '117265351b8fb5ea729', '2023-10-22 13:54:39'),
(10, 1, 1000, '528965351b91559f458', '2023-10-22 13:54:41'),
(11, 1, 1000, '898365351b92cf43013', '2023-10-22 13:54:42'),
(12, 1, 1000, '981065351b948b45171', '2023-10-22 13:54:44'),
(13, 9, 1000, '14806550ad57c713a67', '2023-11-12 10:47:51'),
(14, 9, 1000, '20826550ad5bea4eb76', '2023-11-12 10:47:55'),
(15, 9, 1000, '8066550ad5d60d2057', '2023-11-12 10:47:57'),
(16, 9, 1000, '37076550ad5fdaabd44', '2023-11-12 10:47:59'),
(17, 9, 1000, '80976550ad6146d9e44', '2023-11-12 10:48:01'),
(18, 9, 1000, '56246550ad62af40074', '2023-11-12 10:48:02'),
(19, 9, 1000, '75616550ad64013a818', '2023-11-12 10:48:04'),
(20, 9, 1000, '20816550ad6556e7e47', '2023-11-12 10:48:05'),
(21, 9, 1000, '86966550ad66c910f65', '2023-11-12 10:48:06'),
(22, 9, 1000, '30306550ad68085e034', '2023-11-12 10:48:08'),
(23, 9, 1000, '78356550ad6921b5325', '2023-11-12 10:48:09'),
(24, 1, 1000, '1151668d92552141217', '2024-07-09 20:41:09'),
(25, 1, 1000, '4135668d9d786bf1a29', '2024-07-09 21:28:40'),
(26, 1, 1000, '7475668d9d7a7963e65', '2024-07-09 21:28:42'),
(27, 1, 1000, '1299668d9d7c10ad771', '2024-07-09 21:28:44'),
(28, 1, 1000, '3707668d9d7d7585c15', '2024-07-09 21:28:45'),
(29, 1, 1000, '6996668d9d7ed9ab968', '2024-07-09 21:28:46'),
(30, 1, 1000, '4253668d9d803270b53', '2024-07-09 21:28:48'),
(31, 1, 1000, '3353668da0e88352d27', '2024-07-09 21:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `refer_and_record`
--

CREATE TABLE `refer_and_record` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Amount` int(5) NOT NULL,
  `Link_key` varchar(255) NOT NULL,
  `Referal_user_id` int(20) NOT NULL,
  `Status` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refer_and_record`
--

INSERT INTO `refer_and_record` (`id`, `User_id`, `Amount`, `Link_key`, `Referal_user_id`, `Status`, `Date`) VALUES
(1, 1, 58029, '', 5, 'success', '2023-10-22 12:43:15'),
(2, 0, 58529, '', 6, 'success', '2023-10-22 12:47:41'),
(3, 1, 59029, '', 7, 'success', '2023-10-22 12:52:02'),
(4, 1, 59529, '4207653505a4832fd29', 8, 'success', '2023-10-22 12:55:39'),
(5, 1, 500, '3353668da0e88352d27', 10, 'success', '2024-07-13 22:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `register_db`
--

CREATE TABLE `register_db` (
  `id` int(20) UNSIGNED NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Last_name` varchar(255) DEFAULT NULL,
  `First_name` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `I_agree` varchar(8) NOT NULL,
  `Account_no` text NOT NULL,
  `Account_balance` int(128) NOT NULL,
  `Date_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_reg` time DEFAULT NULL,
  `Acct_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_db`
--

INSERT INTO `register_db` (`id`, `Surname`, `Last_name`, `First_name`, `Country`, `Email`, `Password`, `Gender`, `I_agree`, `Account_no`, `Account_balance`, `Date_reg`, `Time_reg`, `Acct_type`) VALUES
(1, 'AJEH', 'LAZER', 'ABRAHAM', 'Nigeria', 'Ajehabraham51@gmail.com', '$2y$10$D5J5AQvGS481ZB/wa2mJC.9ugp2I4v5Bz.e4spP1NKtAXO5tZfWzm', 'Male', 'Yes', '1758015466', 70126, '2024-07-13 21:24:37', '18:06:02', ''),
(2, 'ONYEKA', 'ENEWA', 'PRECIOUS', 'Ghana', 'ajehabraham55@Gmail.com', '$2y$10$hJjOUlW7MCAhMMY1lBaUO.d3NhcJUx1eV5VqQbwAxgZEs06ZvRJNS', 'Female', 'Yes', '2106676155', 88175, '2023-11-07 10:46:08', '16:15:44', ''),
(4, 'JONAH', '', 'PAUL', 'Ghana', 'ajehabraham15@Gmail.com', '$2y$10$JOVNRJfKqsjduR8/Ew96bOT6aegBkZQjxrRd5v0CKlTljFNympePW', 'Male', 'Yes', '190780926', 33000, '2023-10-21 23:00:00', '13:22:14', ''),
(5, 'JONAH', '', 'PAUL', 'Ghana', 'ajehabraham555@Gmail.com', '$2y$10$fVb6ahvR2zJDXwWL.WrPge/Jhlq7v0zjxr9h.DB0EF1TyvvGrMre.', 'Male', 'Yes', '906778537', 33000, '2023-10-21 23:00:00', '13:43:15', ''),
(6, 'JOEL', 'BLESSING', 'AMINA', 'Nigeria', 'ajehabraham5555@Gmail.com', '$2y$10$A/f0MrTswgB4/MCasBGnkuPfFaq8uc7QqqyMnVJfu9UzLnXsnN9jC', 'Female', 'Yes', '1673471124', 33000, '2023-10-21 23:00:00', '13:47:41', ''),
(7, 'RUTH', '', 'RUTH', 'Ghana', 'ajehabraham55555@Gmail.com', '$2y$10$3tgR4rF3.ANaJacFDOd/J.Z2ntwppl6UhsXkicWJAXAiqAGEzqnBK', 'Female', 'Yes', '134395520', 33000, '2023-10-21 23:00:00', '13:52:02', ''),
(8, 'JONAH', 'BLESSING', 'AMINA', 'Ghana', 'ajehabraham555555@Gmail.com', '$2y$10$ZCgUJMBTl.RVXSH2E2ueHOzbFmBhdKiA8HcZX2aTxYQ0hY2e4bx2K', 'Female', 'Yes', '2122468469', 20420, '2023-10-22 13:58:08', '13:55:39', ''),
(9, 'JOHNDOE', '', 'DOE', 'Ghana', 'Ajehabraham5050@gmail.com', '$2y$10$b3LoTy5kQd6g6mMSW9ArQeDGAxfWB/5Ylx1ajsF0NYDwtIPzSge0q', 'Male', 'Yes', '710908402', 33073, '2024-07-10 13:01:26', '11:20:19', ''),
(10, 'UDOJI', 'CHINEYE', 'MARYANN', 'Nigeria', 'Ajehabraham51@yahoo.com', '$2y$10$OSw0HXmBKQNJjwJx9Y/onuvTH.vAsgiAdMxzvF8pKX1EzID.mtI5K', 'Female', 'Yes', '815492164', 32000, '2024-07-14 09:52:45', '23:24:34', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `register_tmp`
--

CREATE TABLE `register_tmp` (
  `id` int(20) UNSIGNED NOT NULL,
  `Email` text DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Country` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL,
  `User_agent` text DEFAULT NULL,
  `Ip_addr` text DEFAULT NULL,
  `Key_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_tmp`
--

INSERT INTO `register_tmp` (`id`, `Email`, `Password`, `Country`, `Date`, `Time`, `User_agent`, `Ip_addr`, `Key_id`) VALUES
(1, 'Ajehabraham51@gmail.com', '$2y$10$VOr9AJ0tbmBZApbaistTfOGAReMaFm2f/SUTL55dqrYJt4icLsvhW', 'Nigeria', '2023-10-09 23:00:00', '16:34:31', 'Desktop Windows', '::1', '1534748533652560f76737d3374437652560f7673a9'),
(2, 'ajehabraham55@Gmail.com', '$2y$10$hJjOUlW7MCAhMMY1lBaUO.d3NhcJUx1eV5VqQbwAxgZEs06ZvRJNS', 'Ghana', '2023-10-15 23:00:00', '16:13:27', 'Desktop Windows', '::1', '916432483652d4507d39303506894652d4507d3b2a'),
(3, 'ajehabraham15@Gmail.com', '$2y$10$JOVNRJfKqsjduR8/Ew96bOT6aegBkZQjxrRd5v0CKlTljFNympePW', 'Ghana', '2023-10-21 23:00:00', '13:03:03', 'Desktop Windows', '::1', '444630790'),
(4, 'ajehabraham555@Gmail.com', '$2y$10$fVb6ahvR2zJDXwWL.WrPge/Jhlq7v0zjxr9h.DB0EF1TyvvGrMre.', 'Ghana', '2023-10-21 23:00:00', '13:42:50', 'Desktop Windows', '::1', '4207653505a4832fd29'),
(5, 'ajehabraham5555@Gmail.com', '$2y$10$A/f0MrTswgB4/MCasBGnkuPfFaq8uc7QqqyMnVJfu9UzLnXsnN9jC', 'Nigeria', '2023-10-21 23:00:00', '13:47:04', 'Desktop Windows', '::1', '4207653505a4832fd29'),
(6, 'ajehabraham55555@Gmail.com', '$2y$10$3tgR4rF3.ANaJacFDOd/J.Z2ntwppl6UhsXkicWJAXAiqAGEzqnBK', 'Ghana', '2023-10-21 23:00:00', '13:51:36', 'Desktop Windows', '::1', '4207653505a4832fd29'),
(7, 'ajehabraham555555@Gmail.com', '$2y$10$ZCgUJMBTl.RVXSH2E2ueHOzbFmBhdKiA8HcZX2aTxYQ0hY2e4bx2K', 'Ghana', '2023-10-21 23:00:00', '13:55:11', 'Desktop Windows', '::1', '4207653505a4832fd29'),
(8, 'Ajehabraham5050@gmail.com', '$2y$10$b3LoTy5kQd6g6mMSW9ArQeDGAxfWB/5Ylx1ajsF0NYDwtIPzSge0q', 'Ghana', '2023-11-11 23:00:00', '11:19:30', 'Desktop Windows', '::1', '1554921472'),
(10, 'Ajehabraham51@yahoo.com', '$2y$10$OSw0HXmBKQNJjwJx9Y/onuvTH.vAsgiAdMxzvF8pKX1EzID.mtI5K', 'Nigeria', '2024-07-12 23:00:00', '21:52:38', 'Desktop Windows', '::1', '3353668da0e88352d27');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Hash_key` varchar(255) DEFAULT NULL,
  `Key_id` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User_agent` text DEFAULT NULL,
  `Ip` varchar(30) DEFAULT NULL,
  `Status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `User_id`, `Email`, `Hash_key`, `Key_id`, `Date`, `User_agent`, `Ip`, `Status`) VALUES
(1, 1, 'Ajehabraham51@gmail.com', '65295692f29af13685865295692f314565295692f314c', '$2y$10$CL0pikEjhsB16NucNk9fu.8aZtw5TY4WDss48S51v3fa.zLnwmkFa', '2023-10-13 15:39:14', 'Desktop Windows', '::1', 'Null'),
(2, 1, 'Ajehabraham51@gmail.com', '652956b37f30b668772652956b37f36a652956b37f36c', '$2y$10$ug/bap9VXByxSR5P/J7Ci.AuYx/S6gZrNai6s8dP.Kfh7Iy7NVtA6', '2023-10-13 15:39:47', 'Desktop Windows', '::1', 'Null'),
(3, 1, 'Ajehabraham51@gmail.com', '652959e8c2198350369652959e8c26a2652959e8c26a8', '$2y$10$EoMQ2uP7YzWaO414x9vdKe0WQQT6hPt7moeZ3E3A3A5scabmP/iM2', '2023-10-13 15:53:28', 'Desktop Windows', '::1', 'Null'),
(4, 1, 'Ajehabraham51@gmail.com', '652959ff1c74f128477652959ff1c789652959ff1c78b', '$2y$10$FFV9QWpCb32dLutju2bCzOVWG2Zepx2zxdOA1LwvueSAUmChup19u', '2023-10-13 15:53:51', 'Desktop Windows', '::1', 'Null'),
(5, 1, 'Ajehabraham51@gmail.com', '65295a03ba53169766265295a03ba5aa65295a03ba5ac', '$2y$10$Xm60Wy8Ofzmj.BQKbjkDkONyYcTP6v5RTpMlrF6qTWGImfBKvpGYC', '2023-10-13 15:53:55', 'Desktop Windows', '::1', 'Null'),
(6, 1, 'Ajehabraham51@gmail.com', '65295a4e325f211766865295a4e3269d65295a4e3269f', '$2y$10$qFFKCaHpG29XNFFArywsZuvHNpjNvAHNyuZ.bZx61Uk5Q4qOJ7Ura', '2023-10-13 15:55:10', 'Desktop Windows', '::1', 'Null'),
(7, 1, 'Ajehabraham51@gmail.com', '6545f524cc92c973726545f524ccaa56545f524ccaab', '$2y$10$KFMd/uKOuNXHGjt1pKf6KuQmxKC8Iu1nnQbhyTLCwAeuCuoj.IPpO', '2023-11-04 07:42:44', 'Desktop Windows', '::1', 'exp'),
(8, 1, 'Ajehabraham51@gmail.com', '6692af4edf1b11097516692af4edf1c26692af4edf1c4', '$2y$10$5GjdbXcILjTM/tG9q/ZuBe7E4xG0Vt0SLN5Yx6Vvy/./wGim2F7KK', '2024-07-13 17:46:06', 'Desktop Windows', '::1', 'Null'),
(9, 1, 'Ajehabraham51@gmail.com', '6692afe3ac2241734106692afe3ac2366692afe3ac238', '$2y$10$5k7BFBh9kScmBse/0OPzjepx.YkKunl5nxk/q6XRLtJyo9Q8vRLRy', '2024-07-13 17:48:35', 'Desktop Windows', '::1', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `top_up`
--

CREATE TABLE `top_up` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Payment_type` varchar(30) NOT NULL,
  `Card_no` varchar(255) NOT NULL,
  `Amount` int(128) NOT NULL,
  `Status_id` varchar(30) NOT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_id` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Transaction_id` varchar(128) NOT NULL,
  `Amount` int(30) NOT NULL,
  `Type_name` varchar(128) NOT NULL,
  `Remark` text NOT NULL,
  `Status_remark` text DEFAULT NULL,
  `Sender_account_no` varchar(15) NOT NULL,
  `Receiver_account_no` varchar(12) NOT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_id` time NOT NULL,
  `Ip_addr` varchar(20) NOT NULL,
  `Type` text NOT NULL,
  `Bank` text NOT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `User_id`, `Transaction_id`, `Amount`, `Type_name`, `Remark`, `Status_remark`, `Sender_account_no`, `Receiver_account_no`, `Date_id`, `Time_id`, `Ip_addr`, `Type`, `Bank`, `User_agent`) VALUES
(1, 1, '127136526595530b57', 500, 'MTN 500 -9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-11 09:14:13', '10:14:13', '::1', 'Data purchase', '', 'Desktop Windows'),
(2, 1, '53214652659728c80d', 2000, 'MTN 2000 -9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-11 09:14:42', '10:14:42', '::1', 'Data purchase', '', 'Desktop Windows'),
(3, 1, '198976526598a66af9', 100, 'MTN 100 -9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-11 09:15:06', '10:15:06', '::1', 'Data purchase', '', 'Desktop Windows'),
(4, 1, '24815652663749db02', 100, '9MOBILE 100 To 9074220984', '- Debit', 'Successful', '9MOBILE', '9074220984', '2023-10-11 09:57:24', '10:57:24', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(5, 1, '135156526639185e17', 500, 'MTNData Purchase 500 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-11 09:57:53', '10:57:53', '::1', 'Data purchase', '', 'Desktop Windows'),
(6, 1, '58267652674dbbc8a8', 120, 'GLO Airtime Purchase 120 To 9074220984', '- Debit', 'Successful', 'GLO', '9074220984', '2023-10-11 11:11:39', '12:11:39', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(7, 1, '9007652674ec56cd9', 90, 'AIRTEL Airtime Purchase 90 To 9074220984', '- Debit', 'Successful', 'AIRTEL', '9074220984', '2023-10-11 11:11:56', '12:11:56', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(8, 1, '504186529605a9e894', 133, '9MOBILE Airtime Purchase ₦133 To 9074220984', '- Debit', 'Successful', '9MOBILE', '9074220984', '2023-10-13 16:20:58', '17:20:58', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(9, 1, '35734652960865669c', 133, '9MOBILE Airtime Purchase ₦133 To 9074220984', '- Debit', 'Successful', '9MOBILE', '9074220984', '2023-10-13 16:21:42', '17:21:42', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(10, 1, '37767652960da0d458', 500, 'MTN Data Purchase ₦500 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-13 16:23:06', '17:23:06', '::1', 'Data purchase', '', 'Desktop Windows'),
(11, 1, '4128665296104a823f', 500, 'MTN Data Purchase ₦500 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-13 16:23:48', '17:23:48', '::1', 'Data purchase', '', 'Desktop Windows'),
(12, 1, '57456529618189697', 10, 'ACCOUNT STATEMENT', '- Debit', 'Successful', '1758015466', 'Lazerwave', '2023-10-13 16:25:53', '17:25:53', '::1', 'Account Statement', '', NULL),
(13, 1, '223465296183bf56e', 10, 'ACCOUNT STATEMENT', '- Debit', 'Successful', '1758015466', 'Lazerwave', '2023-10-13 16:25:55', '17:25:55', '::1', 'Account Statement', '', NULL),
(14, 1, '31431652fcf3adb384', 1000, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '- Debit', '+ Credit', '2106676155', '1758015466', '2023-10-18 13:27:38', '14:27:38', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(15, 1, '75958652fd2c75abe0', 1000, 'Interbank Transfer via Money Request To ONYEKA ENEWA PRECIOUS(2106676155)', '- Debit', 'Successful', '1758015466', '2106676155', '2023-10-18 13:42:47', '14:42:47', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(16, 2, '75958652fd2c75abe0', 1000, 'Interbank Transfer via Money Request To ONYEKA ENEWA PRECIOUS(2106676155)', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-10-18 13:42:47', '14:42:47', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(17, 2, '43052652fd47ceed52', 200000, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466) Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-18 13:50:04', '14:50:04', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(18, 2, '24817652fd4811eafc', 200000, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466) Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-18 13:50:09', '14:50:09', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(19, 1, '65243652fe49b2edbf', 90, 'Interbank Transfer To ONYEKA ENEWA PRECIOUS(2106676155) remaning balance', '- Debit', 'Successful', '1758015466', '2106676155', '2023-10-18 14:58:51', '15:58:51', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(20, 2, '65243652fe49b2edbf', 90, 'Interbank Transfer From ONYEKA ENEWA PRECIOUS(2106676155) remaning balance', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-10-18 14:58:51', '15:58:51', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(21, 1, '46928652fe76f05de0', 55, 'Interbank Transfer To ONYEKA ENEWA PRECIOUS(2106676155) House rent', '- Debit', 'Successful', '1758015466', '2106676155', '2023-10-18 15:10:55', '16:10:55', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(22, 2, '46928652fe76f05de0', 55, 'Interbank Transfer From ONYEKA ENEWA PRECIOUS(2106676155) House rent', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-10-18 15:10:55', '16:10:55', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(23, 1, '8869652fefad91886', 1000, 'Virtual card', '- Debit', 'Successful', '1758015466', 'Lazerwave', '2023-10-18 15:46:05', '16:46:05', '::1', 'Virtual card', '', 'Desktop Windows'),
(24, 1, '134806531276396f03', 500, 'Interbank Transfer via Money Request To ONYEKA ENEWA PRECIOUS(2106676155)', '- Debit', 'Successful', '1758015466', '2106676155', '2023-10-19 13:56:03', '14:56:03', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(25, 2, '134806531276396f03', 500, 'Interbank Transfer via Money Request To ONYEKA ENEWA PRECIOUS(2106676155)', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-10-19 13:56:03', '14:56:03', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(26, 1, '826866531ae984b666', 300, 'Interbank Transfer To ONYEKA ENEWA PRECIOUS(2106676155) School fee', '- Debit', 'Successful', '1758015466', '2106676155', '2023-10-19 23:32:56', '00:32:56', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(27, 2, '826866531ae984b666', 300, 'Interbank Transfer From ONYEKA ENEWA PRECIOUS(2106676155) School fee', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-10-19 23:32:56', '00:32:56', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(28, 2, '1743665323ac7b26ac', 800, 'Interbank Transfer To AJEH LAZER ABRAHAM(1758015466) Repayment ', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:31:03', '10:31:03', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(29, 1, '1743665323ac7b26ac', 800, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:31:03', '10:31:03', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(30, 2, '3697265323b6304f49', 800, 'Interbank Transfer To AJEH LAZER ABRAHAM(1758015466) Repayment ', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:33:39', '10:33:39', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(31, 1, '3697265323b6304f49', 800, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:33:39', '10:33:39', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(32, 2, '1254065323d2a39867', 1200, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:41:14', '10:41:14', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(33, 1, '1254065323d2a39867', 1200, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:41:14', '10:41:14', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(34, 2, '3614765323d7f3592c', 1900, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:42:39', '10:42:39', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(35, 1, '3614765323d7f3592c', 1900, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:42:39', '10:42:39', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(36, 2, '5622465323fbb83d56', 90, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:52:11', '10:52:11', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(37, 1, '5622465323fbb83d56', 90, 'Interbank Transfer via Money Request To AJEH LAZER ABRAHAM(1758015466)', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 09:52:11', '10:52:11', '::1', 'Money Request', 'Lazerwave', 'Desktop Windows'),
(38, 1, '1330653260ad77a27', 1000, 'Virtual card', '- Debit', 'Successful', '1758015466', 'Lazerwave', '2023-10-20 12:12:45', '13:12:45', '::1', 'Virtual card', '', 'Desktop Windows'),
(39, 2, '57296532626171960', 1000, 'Virtual card', '- Debit', 'Successful', '2106676155', 'Lazerwave', '2023-10-20 12:20:01', '13:20:01', '::1', 'Virtual card', '', 'Desktop Windows'),
(40, 1, '74711653262939f7b2', 500, 'Interbank Transfer via Card Top using Lazerwave card 705739524595245Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 12:20:51', '13:20:51', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(41, 2, '74711653262939f7b2', 500, 'Interbank Transfer via Card Top using Lazerwave card 705739524595245Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 12:20:51', '13:20:51', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(42, 1, '61194653266251e8a4', 500, 'Interbank Transfer via Card Top using Lazerwave card 705739524595245', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:36:05', '13:36:05', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(43, 2, '61194653266251e8a4', 500, 'Interbank Transfer via Card Top using Lazerwave card 705739524595245', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:36:05', '13:36:05', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(44, 1, '524296532680309f5e', 550, 'Interbank Transfer via Card Top using Lazerwave card 63591*****63591705*****', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:44:03', '13:44:03', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(45, 2, '524296532680309f5e', 550, 'Interbank Transfer via Card Top using Lazerwave card 63591*****63591705*****', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:44:03', '13:44:03', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(46, 1, '33858653269bd01dcc', 1000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****7057395245', '+ Credit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:51:25', '13:51:25', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(47, 2, '33858653269bd01dcc', 1000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****7057395245', '- Debit', 'Successful', '2106676155', '1758015466', '2023-10-20 12:51:25', '13:51:25', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(48, 1, '7024665326a58bdebd', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 95245*****7057395245Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 12:54:00', '13:54:00', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(49, 2, '7024665326a58bdebd', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 95245*****7057395245Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 12:54:00', '13:54:00', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(50, 1, '8373965326b8794e10', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****7057395245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 12:59:03', '13:59:03', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(51, 2, '8373965326b8794e10', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****7057395245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 12:59:03', '13:59:03', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(52, 1, '3668165326bd075f42', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****7395245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:00:16', '14:00:16', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(53, 2, '3668165326bd075f42', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****7395245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:00:16', '14:00:16', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(54, 1, '5980565326c02938c8', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:01:06', '14:01:06', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(55, 2, '5980565326c02938c8', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 5245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:01:06', '14:01:06', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(56, 1, '4119565326c32ab31c', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:01:54', '14:01:54', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(57, 2, '4119565326c32ab31c', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:01:54', '14:01:54', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(58, 1, '2016265326c5102c72', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:02:25', '14:02:25', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(59, 2, '2016265326c5102c72', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:02:25', '14:02:25', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(60, 1, '5401665326c66e56ef', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 95245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:02:46', '14:02:46', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(61, 2, '5401665326c66e56ef', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 95245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:02:46', '14:02:46', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(62, 1, '2186565326c7c7314d', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:08', '14:03:08', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(63, 2, '2186565326c7c7314d', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 7057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:08', '14:03:08', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(64, 1, '240065326c96d2c9e', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 917057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:34', '14:03:34', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(65, 2, '240065326c96d2c9e', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 917057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:34', '14:03:34', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(66, 1, '4793165326cae69dc4', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:58', '14:03:58', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(67, 2, '4793165326cae69dc4', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:03:58', '14:03:58', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(68, 1, '7931165326cc443fa5', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 917057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:04:20', '14:04:20', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(69, 2, '7931165326cc443fa5', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 917057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:04:20', '14:04:20', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(70, 1, '6078365326ce958186', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 17057395245*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:04:57', '14:04:57', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(71, 2, '6078365326ce958186', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 17057395245*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:04:57', '14:04:57', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(72, 1, '1344465326d12f2372', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 6359*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:05:38', '14:05:38', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(73, 2, '1344465326d12f2372', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 6359*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:05:38', '14:05:38', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(74, 1, '715265326d32538a3', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 63591*****95245 Insufficient Funds', 'Failed', 'Failed', '2106676155', '1758015466', '2023-10-20 13:06:10', '14:06:10', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(75, 2, '715265326d32538a3', 1000000, 'Interbank Transfer via Card Top using Lazerwave card 63591*****95245 Insufficient Funds', '- Debit', 'Failed', '2106676155', '1758015466', '2023-10-20 13:06:10', '14:06:10', '::1', 'Top up', 'Lazerwave', 'Desktop Windows'),
(76, 3, '29651653501f1cbe86', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '144980998', '2023-10-22 12:05:21', '13:05:21', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(77, 4, '66367653505e6ce779', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '190780926', '2023-10-22 12:22:14', '13:22:14', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(78, 5, '3261665350ad32b20e', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '906778537', '2023-10-22 12:43:15', '13:43:15', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(79, 1, '1139565350ad33626c', 58029, 'Referal Bonus', '+ Credit', 'Successful', 'Lazerwave', '1758015466', '2023-10-22 12:43:15', '13:43:15', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(80, 6, '2444365350bdd9c043', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '1673471124', '2023-10-22 12:47:41', '13:47:41', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(81, 1, '970665350bddaaf7a', 58529, 'Referal Bonus', '+ Credit', 'Successful', 'Lazerwave', '1758015466', '2023-10-22 12:47:41', '13:47:41', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(82, 7, '3352865350ce26a513', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '134395520', '2023-10-22 12:52:02', '13:52:02', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(83, 1, '723665350ce275d1d', 59029, 'Referal Bonus', '+ Credit', 'Successful', 'Lazerwave', '1758015466', '2023-10-22 12:52:02', '13:52:02', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(84, 8, '5041865350dbba99c5', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '2122468469', '2023-10-22 12:55:39', '13:55:39', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(85, 1, '344465350dbbc563c', 59529, 'Referal Bonus', '+ Credit', 'Successful', 'Lazerwave', '1758015466', '2023-10-22 12:55:39', '13:55:39', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(86, 8, '25713653529ee8b14c', 12500, 'Interbank Transfer To AJEH LAZER ABRAHAM(1758015466) Repayment ', '- Debit', 'Successful', '2122468469', '1758015466', '2023-10-22 14:55:58', '15:55:58', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(87, 1, '25713653529ee8b14c', 12500, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', '+ Credit', 'Successful', '2122468469', '1758015466', '2023-10-22 14:55:58', '15:55:58', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(88, 8, '2023465352a7083934', 80, 'Interbank Transfer To AJEH LAZER ABRAHAM(1758015466) Repayment ', '- Debit', 'Successful', '2122468469', '1758015466', '2023-10-22 14:58:08', '15:58:08', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(89, 1, '2023465352a7083934', 80, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) Repayment ', '+ Credit', 'Successful', '2122468469', '1758015466', '2023-10-22 14:58:08', '15:58:08', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(90, 1, '2479265364ceaf07c0', 90, 'MTN Airtime Purchase ₦90 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-23 11:37:30', '12:37:30', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(91, 1, '3242665366b179510a', 50, 'MTN Data Purchase ₦50(40Mb)1day ₦50 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-23 13:46:15', '14:46:15', '::1', 'Data purchase', '', 'Desktop Windows'),
(92, 1, '864665366c6963130', 100, 'MTN Data Purchase ₦100(100Mb)1day  To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-10-23 13:51:53', '14:51:53', '::1', 'Data purchase', '', 'Desktop Windows'),
(93, 2, '619765379d8ca0a67', 50, 'MTN Data Purchase ₦50(40Mb)1day', '- Debit', 'Successful', 'MTN', '8036295994', '2023-10-24 11:33:48', '12:33:48', '::1', 'Data purchase', '', 'Desktop Windows'),
(94, 1, '7923665461eda6c4f4', 1000, 'GLO Airtime Purchase ₦1000 To 9074220984', '- Debit', 'Successful', 'GLO', '9074220984', '2023-11-04 10:37:14', '11:37:14', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(95, 1, '5462665461f63aab59', 50, 'AIRTEL Airtime Purchase ₦50 To 9074220984', '- Debit', 'Successful', 'AIRTEL', '9074220984', '2023-11-04 10:39:31', '11:39:31', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(96, 1, '237256546207490c6a', 1000, 'MTN Airtime Purchase ₦1000 To 9074220984', '- Debit', 'Successful', 'MTN', '9074220984', '2023-11-04 10:44:04', '11:44:04', '::1', 'Airtime purchase', '', 'Desktop Windows'),
(97, 1, '5826365462a78d6ada', 70, 'Interbank Transfer To ONYEKA ENEWA PRECIOUS(2106676155) ', '- Debit', 'Successful', '1758015466', '2106676155', '2023-11-04 11:26:48', '12:26:48', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(98, 2, '5826365462a78d6ada', 70, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) ', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-11-04 11:26:48', '12:26:48', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(99, 1, '5770654a1570ad6f8', 50, 'Interbank Transfer To ONYEKA ENEWA PRECIOUS(2106676155) offering', '- Debit', 'Successful', '1758015466', '2106676155', '2023-11-07 10:46:08', '11:46:08', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(100, 2, '5770654a1570ad6f8', 50, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) offering', '+ Credit', 'Successful', '1758015466', '2106676155', '2023-11-07 10:46:08', '11:46:08', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(101, 9, '182366550a6e416002', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '710908402', '2023-11-12 10:20:20', '11:20:20', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(102, 1, '7568668e8625b8dd0', 73, 'Interbank Transfer To JOHNDOE  DOE(710908402) ', '- Debit', 'Successful', '1758015466', '710908402', '2024-07-10 14:01:25', '15:01:25', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(103, 9, '7568668e8625b8dd0', 73, 'Interbank Transfer From AJEH LAZER ABRAHAM(1758015466) ', '+ Credit', 'Successful', '1758015466', '710908402', '2024-07-10 14:01:25', '15:01:25', '::1', 'Transfer', 'Lazerwave', 'Desktop Windows'),
(104, 10, '673726692f09355ce5', 33000, 'Registration Welcome Bonus', '+ Credit', 'Successful', 'Lazerwave', '815492164', '2024-07-13 22:24:35', '23:24:35', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(105, 1, '72096692f09517483', 500, 'Referal Bonus', '+ Credit', 'Successful', 'Lazerwave', '1758015466', '2024-07-13 22:24:35', '23:24:35', '::1', 'Bonus', 'Lazerwave', 'Desktop Windows'),
(106, 10, '694566939fed73e25', 1000, 'Virtual card', '- Debit', 'Successful', '815492164', 'Lazerwave', '2024-07-14 10:52:45', '11:52:45', '::1', 'Virtual card', '', 'Desktop Windows');

-- --------------------------------------------------------

--
-- Table structure for table `two_factor`
--

CREATE TABLE `two_factor` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Status` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Ip_add` varchar(20) NOT NULL,
  `User_agent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `two_factor`
--

INSERT INTO `two_factor` (`id`, `User_id`, `Status`, `Date`, `Ip_add`, `User_agent`) VALUES
(1, 1, 'ON', '2023-10-11 10:23:06', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(2, 1, 'OFF', '2023-10-11 10:23:10', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(3, 1, 'OFF', '2023-10-11 10:23:34', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(4, 1, 'OFF', '2023-10-11 10:23:57', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(5, 1, 'ON', '2023-10-11 10:36:24', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(6, 1, 'OFF', '2023-10-11 10:40:09', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(7, 1, 'ON', '2023-10-11 10:40:19', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(8, 1, 'OFF', '2023-10-11 10:40:24', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(9, 1, 'ON', '2023-10-11 10:44:52', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(10, 1, 'OFF', '2023-10-11 10:45:45', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(11, 1, 'ON', '2023-10-11 10:45:55', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(12, 1, 'OFF', '2023-10-11 10:48:52', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(13, 1, 'ON', '2023-10-11 10:48:58', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(14, 1, 'OFF', '2023-10-11 10:49:59', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(15, 1, 'ON', '2023-10-11 10:50:03', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(16, 1, 'OFF', '2023-10-11 11:28:48', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(17, 1, 'ON', '2023-10-11 11:29:23', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(18, 1, 'OFF', '2023-10-11 12:06:26', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(19, 1, 'ON', '2023-10-11 12:06:34', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(20, 1, 'OFF', '2023-10-11 12:06:42', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(21, 1, 'ON', '2023-10-11 12:16:14', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(22, 1, 'OFF', '2023-10-11 12:16:20', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(23, 2, 'ON', '2023-10-18 13:24:34', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(24, 1, 'ON', '2023-10-19 13:29:39', '::1', 'Desktop Windows on Google Chrome 117.0.0.0 on windows'),
(25, 9, 'ON', '2023-11-12 10:42:39', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(26, 9, 'OFF', '2023-11-12 10:44:26', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(27, 9, 'ON', '2023-11-12 10:44:32', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(28, 9, 'OFF', '2023-11-12 10:45:01', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(29, 9, 'ON', '2023-11-12 10:45:18', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(30, 1, 'OFF', '2023-11-23 07:27:58', '::1', 'Desktop Windows on Google Chrome 118.0.0.0 on windows'),
(31, 1, 'ON', '2023-11-26 07:31:29', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(32, 1, 'OFF', '2023-11-26 07:32:04', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(33, 1, 'ON', '2023-11-26 07:39:40', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(34, 1, 'OFF', '2023-11-26 07:39:42', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(35, 1, 'ON', '2023-11-26 07:39:43', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(36, 1, 'OFF', '2023-11-26 07:39:45', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(37, 1, 'ON', '2023-11-26 07:39:46', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(38, 1, 'OFF', '2023-11-26 07:39:47', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(39, 1, 'ON', '2023-11-26 07:40:05', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(40, 1, 'OFF', '2023-11-26 07:40:11', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(41, 1, 'ON', '2023-11-26 07:40:16', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(42, 1, 'OFF', '2023-11-26 07:40:20', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(43, 1, 'ON', '2023-11-26 08:18:35', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(44, 1, 'OFF', '2023-11-26 08:18:39', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(45, 1, 'ON', '2023-11-26 08:18:44', '::1', 'Desktop Windows on Google Chrome 119.0.0.0 on windows'),
(46, 1, 'OFF', '2024-07-08 08:40:16', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(47, 1, 'ON', '2024-07-08 08:40:20', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(48, 1, 'OFF', '2024-07-08 10:20:18', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(49, 1, 'ON', '2024-07-08 10:20:27', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(50, 1, 'OFF', '2024-07-08 10:30:42', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(51, 1, 'ON', '2024-07-08 10:30:52', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(52, 1, 'OFF', '2024-07-08 10:46:54', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(53, 1, 'ON', '2024-07-08 10:46:59', '::1', 'Desktop Windows on Google Chrome 125.0.0.0 on windows'),
(54, 1, 'OFF', '2024-08-10 15:41:45', '::1', 'Desktop Windows on Google Chrome 127.0.0.0 on windows'),
(55, 1, 'ON', '2024-08-10 15:41:50', '::1', 'Desktop Windows on Google Chrome 127.0.0.0 on windows');

-- --------------------------------------------------------

--
-- Table structure for table `username`
--

CREATE TABLE `username` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Username` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL,
  `ip_addr` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `username`
--

INSERT INTO `username` (`id`, `User_id`, `Username`, `Date`, `Time`, `ip_addr`) VALUES
(1, 1, '@Lazer', '2023-10-10 15:43:28', '16:43:28', '::1'),
(2, 2, '@Newa', '2023-10-16 15:17:00', '16:17:00', '::1'),
(3, 3, '@Lyga', '2023-10-22 12:09:55', '13:09:56', '::1'),
(4, 4, '@LygaR', '2023-10-22 12:22:50', '13:22:50', '::1'),
(5, 5, '@Lygaa', '2023-10-22 12:45:43', '13:45:43', '::1'),
(6, 8, '@Lygaaa', '2023-10-22 12:55:57', '13:55:57', '::1'),
(7, 9, '@Naj', '2023-11-12 10:21:11', '11:21:11', '::1'),
(8, 10, '@Ann', '2024-07-13 22:25:35', '23:25:35', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user_card`
--

CREATE TABLE `user_card` (
  `id` int(128) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Card_no` varchar(255) NOT NULL,
  `Full_name` varchar(255) NOT NULL,
  `Ccv` varchar(255) NOT NULL,
  `Pin` varchar(255) NOT NULL,
  `Exp_date` int(10) DEFAULT NULL,
  `Status_r` varchar(15) NOT NULL,
  `Hash_key` varchar(255) DEFAULT NULL,
  `Type` text DEFAULT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time_id` time DEFAULT NULL,
  `User_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_card`
--

INSERT INTO `user_card` (`id`, `User_id`, `Card_no`, `Full_name`, `Ccv`, `Pin`, `Exp_date`, `Status_r`, `Hash_key`, `Type`, `Date_created`, `Time_id`, `User_agent`) VALUES
(1, 1, '752307334493538', 'AJEH LAZER ABRAHAM', '590', '$2y$10$jvaX606NeBBHW89NbqnDNeyc03RtP4yA4MTO1m9T5fZJ/YYNBEG36', 2027, 'UnBlock', '652fefad91d4a427830652fefad91d5c535543', 'Debit Card', '2023-10-20 12:35:33', '16:46:05', 'Desktop Windows'),
(2, 1, '663337201494406', 'AJEH LAZER ABRAHAM', '331', '$2y$10$avubpRO.kBtQz1eaANdnU.kyIN3nS6Zj/AjLEz3iKk8BLFan7KbQ6', 2027, 'Block', '653260ad77f7e492136653260ad77f90437751', 'Debit Card', '2024-07-11 08:41:23', '13:12:45', 'Desktop Windows'),
(3, 2, '635917057395245', 'ONYEKA ENEWA PRECIOUS', '467', '$2y$10$FS9Rfz38W8D5812isqz/eOdJZJur0Enc0/lrZO6uF704s0ePQ0.P6', 2027, 'UnBlock', '65326261723b816688365326261723cb592795', 'Debit Card', '2023-10-20 12:20:01', '13:20:01', 'Desktop Windows'),
(4, 10, '695736594483538', 'UDOJI CHINEYE MARYANN', '334', '$2y$10$QjIwpOmwDLCJq0Kf9vvTKu/wAakr7wxrNjWeCGc7GBb3tK5OjiOHy', 2028, 'UnBlock', '66939fed73e2e41666166939fed73e2f397409', 'Debit Card', '2024-07-14 10:52:45', '11:52:45', 'Desktop Windows');

-- --------------------------------------------------------

--
-- Table structure for table `user_pin`
--

CREATE TABLE `user_pin` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Pin` varchar(255) NOT NULL,
  `Date_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_pin`
--

INSERT INTO `user_pin` (`id`, `User_id`, `Pin`, `Date_id`) VALUES
(1, 1, '$2y$10$pH8wfCF.gEEwYLNMxSJji.d6d0vj1IGBQBYjoRcUlO8WByBpoJXgO', '2023-10-10 17:28:30'),
(2, 2, '$2y$10$1bzGJbMhBd/2kWqYkIrT.O31BoGSRkfUfpk0Sm3GKs/1KUJ8I7Wp6', '2023-10-18 13:25:21'),
(3, 8, '$2y$10$ZTgev9J9OqzXWja1IQqEE.zaZtkxPq9Jqq8ytVfj/Wp7V625j3sEq', '2023-10-22 14:52:53'),
(4, 9, '$2y$10$ex0zqrxrOBiHG50/P6Uw7u0MQEIhxVLBWwKUDZRnFWmTTPN.4Zuai', '2023-11-12 10:37:03'),
(5, 10, '$2y$10$njTCbGsgGNJcE8HQxUPsJOsRd44JRcjtL7bgcUgLo9114Fsf.i8zK', '2024-07-13 22:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_session_id`
--

CREATE TABLE `user_session_id` (
  `id` int(20) UNSIGNED NOT NULL,
  `User_id` int(20) NOT NULL,
  `Session_id` varchar(255) DEFAULT NULL,
  `Hash_key` varchar(255) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Time` time DEFAULT NULL,
  `Ip_addr` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_session_id`
--

INSERT INTO `user_session_id` (`id`, `User_id`, `Session_id`, `Hash_key`, `Date`, `Time`, `Ip_addr`) VALUES
(1, 1, '298urmln4e9b4ktsl2djqk9qgh', '1275377589652562d98224d952570963', '2023-10-10 15:42:33', '16:42:33', '::1'),
(2, 1, 'm8gntsjuv0i5dsn5l5agbv2nql', '8085310636525766a9f6601144731874', '2023-10-10 17:06:02', '18:06:02', '::1'),
(3, 1, '90hck8og1ah9lusvhfn3a9e0sv', '166068718065263d9dc70991809809695', '2023-10-11 07:15:57', '08:15:57', '::1'),
(4, 1, 'kscgh4uav643qrsp9ei9l2ak9g', '111066934965264357dd46c13578008', '2023-10-11 07:40:23', '08:40:23', '::1'),
(5, 1, '0f9kjogm648taljk33u6sorrsl', '3654594526526435c69b87382147430', '2023-10-11 07:40:28', '08:40:28', '::1'),
(6, 1, '86l0khfr8ml8a3fiplvrdoih27', '1631065696526435d86f54224333624', '2023-10-11 07:40:29', '08:40:29', '::1'),
(7, 1, 'dh8n3mnjo4hct8v53hl3rbbp9f', '970620718652643cb281841110151022', '2023-10-11 07:42:19', '08:42:19', '::1'),
(8, 1, 'r63q6pjo2klem94b1i1t0m7qgm', '27335383565264450b777a636371605', '2023-10-11 07:44:32', '08:44:32', '::1'),
(9, 1, 'i025f33bq9b6tc92fn744kc0fs', '12497045546526495c6b56f1379873448', '2023-10-11 08:06:04', '09:06:04', '::1'),
(10, 1, 'jk2ij72poavlnkj4eakasu9eha', '168124044652649dfaccf31077390280', '2023-10-11 08:08:15', '09:08:15', '::1'),
(11, 1, 'bm6ph0cnjkgt9afh2jo2oj01b5', '20987288346528ea0841f2c1177057449', '2023-10-13 07:56:08', '08:56:08', '::1'),
(12, 1, 'ik9f42qtsveopg982jg7dnlui9', '19757518486528f1e8241b7804703152', '2023-10-13 08:29:44', '09:29:44', '::1'),
(13, 1, '484d6toh61gae8cbqmr4ctcons', '704832920652924766dc53486562417', '2023-10-13 12:05:26', '13:05:26', '::1'),
(14, 1, '7hca9gvksddq3c537klocg1v06', '28554944865295a572448d556516930', '2023-10-13 15:55:19', '16:55:19', '::1'),
(15, 1, 'c723v91u41q1lgpugllam4a4od', '1392367287652a3d62de31468630937', '2023-10-14 08:04:02', '09:04:02', '::1'),
(16, 1, 'sctp0o0pna4ggcqcuphpt6eh42', '208826209652bd76ad91761956103200', '2023-10-15 13:13:30', '14:13:30', '::1'),
(17, 1, '0hqqaequalk9hd7cvmvpgrs2j1', '438339000652bf2497d2241896976806', '2023-10-15 15:08:09', '16:08:09', '::1'),
(18, 1, 'oaq70p2jliocesfo2iuqvpekfl', '75837849652c0f11c86a72059948908', '2023-10-15 17:10:57', '18:10:57', '::1'),
(19, 1, 'rup7jieq7r7mbff32os7h0nhl1', '1465604064652cffc01e15f1114550985', '2023-10-16 10:17:52', '11:17:52', '::1'),
(20, 2, '8jotpk3kvt3tl2gfvna7buip7l', '662421513652d4590c9d181293692031', '2023-10-16 15:15:44', '16:15:44', '::1'),
(21, 1, '6ich0gkf14a0sk4ub119qquudr', '368688251652e61782820c1629612965', '2023-10-17 11:27:04', '12:27:04', '::1'),
(22, 2, '862qtnt6fcuavn0bne7spvakhi', '1149207038652e6e3933fc11190541448', '2023-10-17 12:21:29', '13:21:29', '::1'),
(23, 1, 'eiq1dn0o7fqjku6b1q30204aql', '1306524331652fc2501c4ce2137856662', '2023-10-18 12:32:32', '13:32:32', '::1'),
(24, 2, 'rkkmpd758s3th9efkpd9alh4td', '1587394665652fcd18a71dc1762527148', '2023-10-18 13:18:32', '14:18:32', '::1'),
(25, 2, 'q7j6pujd8mhmm2759gjubb6rtk', '1222401533652fe77c374ea162525026', '2023-10-18 15:11:08', '16:11:08', '::1'),
(26, 1, '8bg5naqmskv8p28eo02iganaf8', '8032349666530d201e60961616422943', '2023-10-19 07:51:45', '08:51:45', '::1'),
(27, 2, 'mm3e010lcpm54diron3f7700kn', '7768108526530fdf1568f21689126378', '2023-10-19 10:59:13', '11:59:13', '::1'),
(28, 1, 'fopqau72arcnsmlkd93kb14lhm', '18547441476531aa4757c871650558751', '2023-10-19 23:14:31', '00:14:31', '::1'),
(29, 1, '7hs1ij1jv6dablnjnoa37vidve', '149806369965322abf6913e1064868355', '2023-10-20 08:22:39', '09:22:39', '::1'),
(30, 2, '2ti3tvv0vs4v11m7us641fgrr6', '110675596565323510bf60b335037051', '2023-10-20 09:06:40', '10:06:40', '::1'),
(31, 1, '3op18u4itapdg05n0uegvhbc5n', '427651507653244c11a9031009586453', '2023-10-20 10:13:37', '11:13:37', '::1'),
(32, 1, 'sorvm99s0litk68a9sbk0lhkdd', '170014815765327e41903012085283397', '2023-10-20 14:18:57', '15:18:57', '::1'),
(33, 1, 'm0d7rjmgvbpscs0tesq9ck56f6', '8028710946532888e2540b1290069329', '2023-10-20 15:02:54', '16:02:54', '::1'),
(34, 1, 'q6utag1edjdd694sn2kkq14ags', '18328384346534e3a5f13142050735146', '2023-10-22 09:56:06', '10:56:06', '::1'),
(35, 2, 'cl0j6td2lbpljt2dn67lv0am7e', '1716422258653501881c2cf1330783574', '2023-10-22 12:03:36', '13:03:36', '::1'),
(36, 3, '8uhabq613dh1vogh73v6gp01li', '804811259653501f19247a945724380', '2023-10-22 12:05:21', '13:05:21', '::1'),
(37, 4, 'fujfge9pq36p80s5q5tra5ejse', '669108860653505e6cd7c2501691250', '2023-10-22 12:22:14', '13:22:14', '::1'),
(38, 5, 'h3j228n52d0jetjuccvnidunvn', '97241447765350ad32919d2082075365', '2023-10-22 12:43:15', '13:43:15', '::1'),
(39, 6, 'etbvi4revfni5euknrbv7jo21h', '13428350665350bdd9ada8246913119', '2023-10-22 12:47:41', '13:47:41', '::1'),
(40, 7, '5herfo9g5jpr9u3e2d7nr8gl86', '28519853765350ce2688cc1777325191', '2023-10-22 12:52:02', '13:52:02', '::1'),
(41, 8, '5kea3sq6fuofu38pjsupelni25', '74651996065350dbba858d312483881', '2023-10-22 12:55:39', '13:55:39', '::1'),
(42, 1, 'k55mff3vvutufglts0cmr3k3vs', '434899334653632cf4379c1405134270', '2023-10-23 09:46:07', '10:46:07', '::1'),
(43, 1, 'fu20plf2170t3p43pc5hoqu3jq', '11358692876536a8d3987e11226415999', '2023-10-23 18:09:39', '19:09:39', '::1'),
(44, 1, 'k0l5pq7iht3am2vs4g5eg7eiqq', '3363812026536bf9877cfa1236380889', '2023-10-23 19:46:48', '20:46:48', '::1'),
(45, 1, 'ko569ja1gugn8vtrlvqueacqn8', '43953959265379b51096e5666012768', '2023-10-24 11:24:17', '12:24:17', '127.0.0.1'),
(46, 2, '3iqlglumma41c6esumavfc7a2i', '169236837165379d3652fee1204472186', '2023-10-24 11:32:22', '12:32:22', '::1'),
(47, 1, '160ljp7a5j91m44olr99l4vot4', '20760907086537a5339a8921049570674', '2023-10-24 12:06:27', '13:06:27', '::1'),
(48, 1, 'uag3jb76r6lkg4tnjb9lgui9uu', '1970379856654210884ec0414189653', '2023-11-01 08:47:04', '09:47:04', '::1'),
(49, 1, '41dj0nudcpup3q8ei3u4o5lare', '16343704916545f4058e9b9944340297', '2023-11-04 07:34:29', '08:34:29', '::1'),
(50, 1, '1q64vpe0i9dsfnngd2ao973hbv', '4621137746545f601ba3b11036433850', '2023-11-04 07:42:57', '08:42:57', '::1'),
(51, 1, 'e21nuf2eb4pg0d3mrfekve9g31', '12810373316549de88d7f9a99668123', '2023-11-07 06:51:52', '07:51:52', '::1'),
(52, 2, 'ij13iqm27939f82f1ef03rrkke', '571494744654a099beacf1874042910', '2023-11-07 09:55:39', '10:55:39', '::1'),
(53, 1, 'agvsio31svj9qmk190vni2jjvk', '111511632654a5608006dd1215081677', '2023-11-07 15:21:44', '16:21:44', '::1'),
(54, 1, 'uc3nrm1abhm6q1g4g522hof485', '948182067654b335365219361277620', '2023-11-08 07:05:55', '08:05:55', '::1'),
(55, 1, 'smvd60c0qm6s55sc8aniur1j3v', '1382624930654dca768132e1960621594', '2023-11-10 06:15:18', '07:15:18', '::1'),
(56, 1, 'steutjbmjcl60r9arvnq6qahpm', '104205288465507c76f1def1097379069', '2023-11-12 07:19:18', '08:19:19', '::1'),
(57, 9, 'g4grmkhdbaflhgu31206769ne9', '14884204926550a6e4145d8328026704', '2023-11-12 10:20:20', '11:20:20', '::1'),
(58, 9, 'k3r3igkkc05sgpgv31ce79hvre', '9416705916553108b9850f1426365488', '2023-11-14 06:15:39', '07:15:39', '::1'),
(59, 1, 't3epd28c7mii2bgrkk2v2m9c3u', '1296387090655310a3d5612573171711', '2023-11-14 06:16:03', '07:16:03', '::1'),
(60, 1, '2dnhuk292be31odskr9e055p89', '8883637766558916126f3c1044412662', '2023-11-18 10:26:41', '11:26:41', '::1'),
(61, 1, 'dm0kjdlq00vbk3d1kdbgmmjour', '1817860476558a4e1325d42054702499', '2023-11-18 11:49:53', '12:49:53', '::1'),
(62, 1, '50115scgtstusdcucb03h5fes3', '740235834655b467fa518a182561489', '2023-11-20 11:43:59', '12:43:59', '::1'),
(63, 1, 'lb4a1doc0d7s5q3cplkeoqsmsf', '1305454460655c3ed453e7d810877336', '2023-11-21 05:23:32', '06:23:32', '::1'),
(64, 1, 'r4f7d15i995pn29gvvn7ggn7uv', '2119980317655c4489ed3b51827767072', '2023-11-21 05:47:53', '06:47:53', '::1'),
(65, 1, 'jc3cd2f9nj2es943eks6kp3tk5', '2094813849655efd3a8cc52705363222', '2023-11-23 07:20:26', '08:20:26', '::1'),
(66, 1, '0kfu7v3jm5g8e5ihdpbidbeqhs', '1012733086656046f63aba0415159224', '2023-11-24 06:47:18', '07:47:18', '127.0.0.1'),
(67, 1, '7mshqurdi09fh5uhv2dond6qrk', '14440918536562f15b072481774556172', '2023-11-26 07:18:51', '08:18:51', '::1'),
(68, 1, '5t61b4lkfm6usmqnqg581intnn', '3433225086563b534c197d1124244731', '2023-11-26 21:14:28', '22:14:28', '::1'),
(69, 1, 'l6dv9s3smfcpov1oeu3r8fg5v3', '975564994656c799dd95591325671429', '2023-12-03 12:50:37', '13:50:37', '::1'),
(70, 1, 'g2e7g6tb2rsh9i30iilh718sl2', '740146464656c7af96f390232849899', '2023-12-03 12:56:25', '13:56:25', '::1'),
(71, 1, 'i6i74eedaoq3vlukntare1p7fg', '1977216633656c7b3f2cdc41126360402', '2023-12-03 12:57:35', '13:57:35', '::1'),
(72, 1, 'g9mckdt9koh2f0jcq9irc8ej3v', '1992032318668ad517bd001283140821', '2024-07-07 18:49:11', '19:49:11', '::1'),
(73, 1, '04f5565v6q94627rhla4ib6a1h', '285359302668ae729bfb9c1815862246', '2024-07-07 20:06:17', '21:06:17', '::1'),
(74, 1, 'g41f2mkeivrllvffrc3c5kal9e', '1710868060668ae90276b91852455587', '2024-07-07 20:14:10', '21:14:10', '::1'),
(75, 1, 'tq07lt5loskl4q3al0f9jqochc', '2132031873668ae9391e7a61020148351', '2024-07-07 20:15:05', '21:15:05', '::1'),
(76, 1, 'jtcakprklbk3riol3euqcrsi2i', '1792416459668af1c7b4f34755169398', '2024-07-07 20:51:35', '21:51:35', '::1'),
(77, 2, '0ikf9ufkt9dv4lopvij4rc7fqg', '175539246668b1b9787e2c2040234646', '2024-07-07 23:49:59', '00:49:59', '::1'),
(78, 1, '24e78n3cfq3l6herl6n53cstuu', '998967834668c2cf6181ba223247666', '2024-07-08 19:16:22', '20:16:22', '::1'),
(79, 1, '6cshq3ovissnre79cn9nf285mj', '1445273693668ce4348a549819157433', '2024-07-09 08:18:12', '09:18:12', '::1'),
(80, 1, 'rar8rd1bij05f9f5154dh0j0kq', '392354051668d07cab33d8373456827', '2024-07-09 10:50:03', '11:50:03', '::1'),
(81, 2, '6v5snub569i7bf7g1ds7k5tbih', '832253871668d09482576e1052662478', '2024-07-09 10:56:24', '11:56:24', '::1'),
(82, 1, 'eurns7dct4ki2h7jh5updmfd7v', '1925257892668d1e534eda8587565996', '2024-07-09 12:26:11', '13:26:11', '::1'),
(83, 1, '6mmg4ieud16nh9gcun863im747', '1598328575668d2734ed37d373109291', '2024-07-09 13:04:04', '14:04:04', '::1'),
(84, 2, '0sk4p0imf9kpr41ugajj8iqk92', '1612162085668d6d68e3fbe2015752977', '2024-07-09 18:03:36', '19:03:36', '::1'),
(85, 1, 'tpv8jnsq5459jflo335qkrl6fm', '827725381668daff8f14be2059022134', '2024-07-09 22:47:37', '23:47:37', '::1'),
(86, 1, '485lnj1jgach58ultbjm61sg4s', '1304044364668e2e265eeb319223598', '2024-07-10 07:45:58', '08:45:58', '::1'),
(87, 2, 'ap5dvhh1fr38d92srr331pvdn6', '915841566668e641f95bf31498020171', '2024-07-10 11:36:15', '12:36:15', '::1'),
(88, 1, '2mqgcav3345h90ootg023dngue', '2076985587668f89e2377091622174191', '2024-07-11 08:29:38', '09:29:38', '::1'),
(89, 1, '2hfvjln56fkm7ckn96okhl0tvq', '18725741406690ed9bd4ba71278522142', '2024-07-12 09:47:23', '10:47:23', '::1'),
(90, 1, '62sn16j697gfb36nvkeintsk25', '2036550576692a44f03902954470935', '2024-07-13 16:59:11', '17:59:11', '::1'),
(91, 2, 'elvgnbdq98en9hqbcqrvhqh42h', '4044538906692bd9333714918037004', '2024-07-13 18:46:59', '19:46:59', '::1'),
(92, 1, 'rfp6pmk63bqs8des0ub787ji1p', '18118218786692be5d89d6d405152979', '2024-07-13 18:50:21', '19:50:21', '::1'),
(93, 1, 'ehc9nrd6t6r95isp6r1hpj7grk', '17601466306692da9e0b0f11118646310', '2024-07-13 20:50:54', '21:50:54', '::1'),
(94, 10, 'ctah9q7naqhdcpgbgbf07ob9v2', '14643106196692f093300f82077013707', '2024-07-13 22:24:35', '23:24:35', '::1'),
(95, 10, 'd8gvp764gv3sbdtmd2a97hkg3l', '16813195106692f4d665d981848475487', '2024-07-13 22:42:46', '23:42:46', '::1'),
(96, 1, 'rkup0ikrkjammpbvbl4gvf22nm', '11921450456692f74ad3fb21143506954', '2024-07-13 22:53:14', '23:53:14', '::1'),
(97, 10, 'cpm22mf6ajttk4hgv5kkn29u9f', '17471200416692f95a57098881580096', '2024-07-13 23:02:02', '00:02:02', '::1'),
(98, 10, '22amhqshrj35eoh3vm7av6agmr', '194213253166937d625992a1635203047', '2024-07-14 08:25:22', '09:25:22', '::1'),
(99, 2, 'e68qdbctfms5gj6dvpr2bm60u4', '3142214466693b1b9cee1733356772', '2024-07-14 12:08:42', '13:08:42', '::1'),
(100, 10, 'uji42unk639sge0tee9m7641um', '14881291776696e1a91806d782949117', '2024-07-16 22:10:01', '23:10:01', '::1'),
(101, 10, 'ga34abp45i6pmi7qf8p0v7gevh', '6618466706697d5102dec8264724902', '2024-07-17 15:28:32', '16:28:32', '::1'),
(102, 10, 'aor3583hk18lv2h1j5cb05bpjq', '641221042669d287499b8c1517060599', '2024-07-21 16:25:40', '17:25:40', '::1'),
(103, 1, 'n11cqdalmqlfva49pl0nr3nodt', '93640903066a8f91cdabf7301556986', '2024-07-30 15:30:52', '16:30:52', '::1'),
(104, 1, 'o9k0tn03ts03dujcovgr9k7f69', '97416920966b77b575acad1481626187', '2024-08-10 15:38:15', '16:38:15', '::1'),
(105, 1, 'tqofimsvo7s38i1bv94kgpkst3', '188840494866d86e120c2531981366996', '2024-09-04 15:26:26', '16:26:26', '::1'),
(106, 1, 'hs8qq7fe2olenhtmv4hggbcmmr', '114021914966d86e1581aa11948063217', '2024-09-04 15:26:29', '16:26:29', '::1'),
(107, 1, 'oi0b2uf4h6lpiqcs0n1485vkpi', '55646213866d86e34c221f1145003073', '2024-09-04 15:27:00', '16:27:00', '::1'),
(108, 1, 'attgv25f5r5fiv9odr9ulackcl', '102001129266d8adf7926b51921038269', '2024-09-04 19:59:03', '20:59:03', '::1'),
(109, 1, 'fv6e99hekk77mo0c2s6v5obim0', '39355990666df69df67563286142485', '2024-09-09 22:34:23', '23:34:23', '::1'),
(110, 1, 'uke1ni9b4m6un9v6viv1ma1mc6', '187130398366df69f0c8cac1078863167', '2024-09-09 22:34:40', '23:34:40', '::1'),
(111, 1, 'dajs3vc3tl75oflbinp7tkg1g9', '145275671066e839d80c91a682317850', '2024-09-16 14:59:52', '15:59:52', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balance`
--
ALTER TABLE `account_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_limit`
--
ALTER TABLE `account_limit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authentication_table`
--
ALTER TABLE `authentication_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_account`
--
ALTER TABLE `block_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block_account_history`
--
ALTER TABLE `block_account_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_password_history`
--
ALTER TABLE `change_password_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `change_password_otp`
--
ALTER TABLE `change_password_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_plan`
--
ALTER TABLE `data_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_info`
--
ALTER TABLE `extra_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_otp_table`
--
ALTER TABLE `general_otp_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `more_information`
--
ALTER TABLE `more_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_link_table`
--
ALTER TABLE `payment_link_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_picture`
--
ALTER TABLE `profile_picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_and_earn`
--
ALTER TABLE `refer_and_earn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refer_and_record`
--
ALTER TABLE `refer_and_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_db`
--
ALTER TABLE `register_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `register_tmp`
--
ALTER TABLE `register_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_up`
--
ALTER TABLE `top_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `two_factor`
--
ALTER TABLE `two_factor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `username`
--
ALTER TABLE `username`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_card`
--
ALTER TABLE `user_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pin`
--
ALTER TABLE `user_pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_session_id`
--
ALTER TABLE `user_session_id`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_balance`
--
ALTER TABLE `account_balance`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_limit`
--
ALTER TABLE `account_limit`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authentication_table`
--
ALTER TABLE `authentication_table`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `block_account`
--
ALTER TABLE `block_account`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `block_account_history`
--
ALTER TABLE `block_account_history`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `change_password_history`
--
ALTER TABLE `change_password_history`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `change_password_otp`
--
ALTER TABLE `change_password_otp`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_plan`
--
ALTER TABLE `data_plan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extra_info`
--
ALTER TABLE `extra_info`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_otp_table`
--
ALTER TABLE `general_otp_table`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `more_information`
--
ALTER TABLE `more_information`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment_link_table`
--
ALTER TABLE `payment_link_table`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profile_picture`
--
ALTER TABLE `profile_picture`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `refer_and_earn`
--
ALTER TABLE `refer_and_earn`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `refer_and_record`
--
ALTER TABLE `refer_and_record`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register_db`
--
ALTER TABLE `register_db`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `register_tmp`
--
ALTER TABLE `register_tmp`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `top_up`
--
ALTER TABLE `top_up`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `two_factor`
--
ALTER TABLE `two_factor`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `username`
--
ALTER TABLE `username`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` int(128) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_pin`
--
ALTER TABLE `user_pin`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_session_id`
--
ALTER TABLE `user_session_id`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
