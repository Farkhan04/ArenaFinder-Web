-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 03:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arenafinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `device` enum('Website','Mobile') NOT NULL,
  `device_token` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id_session`, `email`, `device`, `device_token`, `created_at`) VALUES
(18, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-07 09:53:44'),
(19, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-07 09:54:36'),
(25, 'pramudyap333@gmail.com', 'Mobile', 'b6b36d61-75bf-47c3-a457-1ec6a7ba0df3', '2023-11-15 10:18:54'),
(29, 'shelawahyu5@gmail.com', 'Mobile', '3111b242-4195-4a38-b978-30e1e63a0e74', '2023-11-15 11:16:18'),
(30, 'shelawahyu5@gmail.com', 'Mobile', 'ce9d6418-cc49-48ef-83bd-8b4da709844d', '2023-11-16 11:39:43'),
(39, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-16 11:57:49'),
(40, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-16 12:30:44'),
(42, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-17 09:02:03'),
(43, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-17 13:06:39'),
(44, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-17 15:31:34'),
(45, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-17 15:32:19'),
(46, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-18 10:34:06'),
(47, 'syamadanisyah@gmail.com', 'Mobile', 'c4Ayq2XjSmudWeQpWzw4kf:APA91bErVNBufnasAog6DaBF7MlC5SUfvv6kEQbLeNQHYckmZXZN9D3n0wnjK-so5R7gE7EMrczzW4qHpSDpX42cuBcO8yd1uR546rcOCrLkd8sqatzMk44xjk249puXlT88-tYTw_6y', '2023-11-20 14:11:40'),
(48, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-22 01:06:32'),
(49, 'hakiahmad756@gmail.com', 'Mobile', 'adsak', '2023-11-22 01:40:42'),
(50, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 08:52:00'),
(51, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 11:04:16'),
(52, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 11:53:32'),
(53, 'shelawahyu5@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 11:59:12'),
(54, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 12:54:09'),
(55, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-22 13:25:11'),
(56, 'atilahlazuardi9@gmail.com', 'Mobile', 'cvBmD_ekRzCUqCiMdD9WR8:APA91bGYVvfrhNGFiL9tEm6LWCEGzZAy41Ld1APb4AT5ycYAC7V_gZwGSUvLAqed_GJkwAxeiyxJ120I6qCe4stDsJnj8jFBQUKLbjywoKwgy3mOftaXDtG12EXgQ1e1zroJHT3zmUAn', '2023-11-22 13:59:50'),
(57, 'shelawahyu5@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-22 14:02:57'),
(58, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-22 22:28:06'),
(59, 'atilahlazuardi9@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-23 09:26:40'),
(60, 'atilahlazuardi9@gmail.com', 'Mobile', 'c4Ayq2XjSmudWeQpWzw4kf:APA91bGPWuusyV5h-lDsAYgK1RQlqMkyDVXTTJIMbdHWbr15Ov04fgMrKK-HOuYgoHImqwEqyuDJ9Q0JkxP3ujPIw0ls4Rc6QoaBR__q3rGUpNsfco19PAoyGNrMngidj_85Q1PsngJn', '2023-11-23 11:41:37'),
(61, 'e41222905@student.polije.ac.id', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-24 10:10:47'),
(62, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-24 13:13:25'),
(63, 'shelawahyu5@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-24 13:48:14'),
(64, 'shelawahyu5@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-24 14:10:37'),
(65, 'shelawahyu5@gmail.com', 'Mobile', 'fG1hbLTJRI6NLPm3jM_-RQ:APA91bHbYfqPNI3Iwb4V7Ef8f57luD7fn9Gp12KPNeC--iLTdOFxyq7F8dWhv3-jmLmoUezgd2QC8Mj0MB_29vUhZ3eHr0ChodJKj_uACPq5bpp9d6UV1TeQPc_2sQzgvwx3j2pJ6ZEz', '2023-11-24 15:58:45'),
(66, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-25 17:29:32'),
(67, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:30:52'),
(68, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:31:11'),
(69, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:31:35'),
(70, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:32:12'),
(71, 'shelawahyu16@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-27 10:33:48'),
(72, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:34:07'),
(73, 'shelawahyu16@gmail.com', 'Mobile', 'eYL4ykSDQxy7M2gJQ_CCtr:APA91bG68ILuVxnuoMjweOAFflJ4v42aKUi4qZMkMJ3CdTPPB18e9iLIgNzhB7XJfeUeGbcVhnO2jRzdi-Gj61lEyyhkEDEBGXIlaDZc-tG5mOhV41vLg6Y0oa3L1rJnWr-KgLac4z7V', '2023-11-27 10:35:24'),
(74, 'shelawahyu16@gmail.com', 'Mobile', 'eUZoBLV4TUy1oBX9ij5pee:APA91bH59u1b6B52RI4a_TsSpcKe6LZPCLAfGY2VCwCT5Ow66HQgOCjv2EoAjWNo8mEqgjtuNVq9azTYd_sEcmzm1wZURpPJSl3UcTm8TnNrzohbi2IXbmpB3DvztCrYvUBIaOxEpxHu', '2023-11-27 10:39:18'),
(75, 'shelawahyu16@gmail.com', 'Mobile', 'fwuu9FhkR6eEI7FAScuywX:APA91bFbOaHOB3iCenBE7IoDymEWCutNf70PXxnXplObBMD9iSebHUgcL9IUPcmyh5VZmihpy8vkUtmVfVei4VVVS1eu4qTBS1fbDrUnroEtb1e-Gk8iph0UJEgrIuHObpmfbLV4xLrc', '2023-11-27 10:42:52'),
(76, 'shelawahyu16@gmail.com', 'Mobile', 'fNFy5uk6RDKYmiyZ3_8ot7:APA91bGbtpTXiAhKWE7kJQyEVb7RUjCtLXfSa1_Km_Ni4uYpJ9Vkd2ZCULu_M3VjLAmiuAI3QrUQ1wMOyFf0DvbdFXIu5Am36QW1eBzcnVAgQ4cjMFjN46EhDVfi5qbdm6Fc_YKeZQMF', '2023-11-27 15:37:07'),
(77, 'atilahlazuardi9@gmail.com', 'Mobile', 'fNFy5uk6RDKYmiyZ3_8ot7:APA91bGbtpTXiAhKWE7kJQyEVb7RUjCtLXfSa1_Km_Ni4uYpJ9Vkd2ZCULu_M3VjLAmiuAI3QrUQ1wMOyFf0DvbdFXIu5Am36QW1eBzcnVAgQ4cjMFjN46EhDVfi5qbdm6Fc_YKeZQMF', '2023-11-27 15:37:23'),
(78, 'cyprus0903@gmail.com', 'Mobile', 'fNFy5uk6RDKYmiyZ3_8ot7:APA91bGbtpTXiAhKWE7kJQyEVb7RUjCtLXfSa1_Km_Ni4uYpJ9Vkd2ZCULu_M3VjLAmiuAI3QrUQ1wMOyFf0DvbdFXIu5Am36QW1eBzcnVAgQ4cjMFjN46EhDVfi5qbdm6Fc_YKeZQMF', '2023-11-27 15:38:45'),
(79, 'hakiahmad756@gmail.com', 'Mobile', 'ea5FWUS9Rt21bOkiKXqJq-:APA91bFdmXkKQxD-0f5NCoAO_XPbMFRn_KkMP5NoN3sQ9bTBmau9HPdN9Weh21nDqLLty5SO1Lif4CNPcO1qjJDoFdVd6w43ZlAJOFOPlGnZ5cyrFxu1kgklEH5ZasNXMSMnfSWbrOJM', '2023-11-27 21:51:32'),
(80, 'shelawahyu16@gmail.com', 'Mobile', 'eQGkxRYOQfKl8ocNIRes9v:APA91bHNzfVtS1_Ufo2fpAm5UMlrLws-oZNkmmt-IO9y2PUn5QI30pfiI2qvLEu5XmaSjd1jwx22dk0WDLGusObw9_aaKTTUlSGoRN9vvlvuGE9ndpEhNr6XUPGg8Fkp9ly5hOrhYDip', '2023-11-27 23:51:08'),
(81, 'shelawahyu16@gmail.com', 'Mobile', 'dTrfSAuJTAOtBNT54NoBVW:APA91bHZd6exYF9Nv_Tp3jfgfZRQO-PwNXlj6YP6RvyZB-XYS8Ao73yC8y9ssH4H_YvZ43FBNoG5vGEF3g9PgCbbZ-XAjv3mrFJ01a3E-zLPoIHnTupoOSTl8xffd8emVCrKBHZpEkIo', '2023-11-27 23:56:42'),
(82, 'hakiahmad756@gmail.com', 'Mobile', 'dTrfSAuJTAOtBNT54NoBVW:APA91bHZd6exYF9Nv_Tp3jfgfZRQO-PwNXlj6YP6RvyZB-XYS8Ao73yC8y9ssH4H_YvZ43FBNoG5vGEF3g9PgCbbZ-XAjv3mrFJ01a3E-zLPoIHnTupoOSTl8xffd8emVCrKBHZpEkIo', '2023-11-27 23:57:17'),
(83, 'hakiahmad756@gmail.com', 'Mobile', 'dAwiC5xhTxWfTW-3-tLkjv:APA91bGSIh9TgLuS7-OhkszOhymfb33mWTOKLph92ekP4bA5-c7eYorRCt6p6okwsko7LoINCNCl3Jab8I3VIRJa_IHmcLuvTeJV5PLiIDbNpusRhffAkuzq7iWdHZLTd3lYMYFhCFSG', '2023-11-27 23:59:03'),
(84, 'hakiahmad756@gmail.com', 'Mobile', 'dsoPU6OgRXmgUPFZq-_sh9:APA91bGZCdYp83eA0-CYEwy4k7gVhObL0Y6MkQhEIcT76ITie2d1TQIuxOqwfvM1QwbdoB1URzjKMeTtORg4tKwalav7bT8H8bZ6r4DSwQ_sO3WRUBlCZ7ZPH3t_JGry2kV0VP4ee4Nh', '2023-11-28 01:42:27'),
(85, 'hakiahmad756@gmail.com', 'Mobile', 'dsoPU6OgRXmgUPFZq-_sh9:APA91bGZCdYp83eA0-CYEwy4k7gVhObL0Y6MkQhEIcT76ITie2d1TQIuxOqwfvM1QwbdoB1URzjKMeTtORg4tKwalav7bT8H8bZ6r4DSwQ_sO3WRUBlCZ7ZPH3t_JGry2kV0VP4ee4Nh', '2023-11-28 02:27:23'),
(88, 'hakiahmad999@gmail.com', 'Mobile', 'adflkalf', '2023-11-28 02:36:36'),
(89, 'akuntester.140123@gmail.com', 'Mobile', 'dsoPU6OgRXmgUPFZq-_sh9:APA91bGZCdYp83eA0-CYEwy4k7gVhObL0Y6MkQhEIcT76ITie2d1TQIuxOqwfvM1QwbdoB1URzjKMeTtORg4tKwalav7bT8H8bZ6r4DSwQ_sO3WRUBlCZ7ZPH3t_JGry2kV0VP4ee4Nh', '2023-11-28 02:42:08'),
(90, 'hakiahmad756@gmail.com', 'Mobile', 'dsoPU6OgRXmgUPFZq-_sh9:APA91bGZCdYp83eA0-CYEwy4k7gVhObL0Y6MkQhEIcT76ITie2d1TQIuxOqwfvM1QwbdoB1URzjKMeTtORg4tKwalav7bT8H8bZ6r4DSwQ_sO3WRUBlCZ7ZPH3t_JGry2kV0VP4ee4Nh', '2023-11-28 02:48:36'),
(91, 'atilahlazuardi9@gmail.com', 'Mobile', 'c4Ayq2XjSmudWeQpWzw4kf:APA91bGPWuusyV5h-lDsAYgK1RQlqMkyDVXTTJIMbdHWbr15Ov04fgMrKK-HOuYgoHImqwEqyuDJ9Q0JkxP3ujPIw0ls4Rc6QoaBR__q3rGUpNsfco19PAoyGNrMngidj_85Q1PsngJn', '2023-11-28 10:30:32'),
(93, 'e41222905@student.polije.ac.id', 'Mobile', 'e9bxeTUARTeRSvAVC4WQjj:APA91bE8GNRMH83sU7apvT6Xly8uLQqyi5PQxEhknXg42eGq-JQ282QVxtp9qDJrYvZyBylQNhzZoNNeslrlfQ-i5w1zWV36qSx_TrEakqMLu3shxLMPBbo8GC_NBoNCKrRh_s_P2BnX', '2024-08-31 13:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL DEFAULT '',
  `full_name` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `password` text NOT NULL,
  `level` enum('SUPER ADMIN','ADMIN','END USER') NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `user_photo` varchar(100) NOT NULL DEFAULT 'default.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `no_hp`, `full_name`, `alamat`, `password`, `level`, `is_verified`, `user_photo`, `created_at`) VALUES
(2, 'testing', 'testing@gmail.com', '', 'Akun Testing', '', '$2y$10$DFL.EHAB1xbCcUHqlwiEJOXLV4tRVpWKw9mo2z/nYVjg3BRsZ8Hwm', 'END USER', 1, 'default.png', '2023-10-22 15:14:04'),
(23, 'pkmki2', 'pkmki2023.thegsteam@gmail.com', '', 'PKM KI 2', '', '$2y$10$LWb6VXN4OEZAAwC4sFURTe3L1XXXXwLyIbkOhzEllNZXyR46vWTPa', 'END USER', 0, '651fa53b6afcc.png', '2023-10-22 15:14:04'),
(24, 'haqiachd', 'hakiahmad756@gmail.com', '085655864624', 'Achmad Baihaqi', '', '$2y$10$u3JUdPf8d4lBBNv2R/gHGeFttNuDvRaw0ShfIQ71V25mqGqVaLCsm', 'ADMIN', 1, '6564edb2b39b9.png', '2023-10-22 15:14:04'),
(47, 'syam_gimak', 'haqiachd.me@gmail.com', '', 'Syamaidzar Adani', '', '$2y$10$ysxvrb11ujekKTsM.L0JFuZBKzbPIlXcKPlQ1y4EbCtx.D9reARNi', 'END USER', 0, '653e533a730fd.png', '2023-10-22 15:14:04'),
(48, 'arena', 'arenafinder.app@gmail.com', '085655864624', 'ArenaFinder', '', '$2y$10$r/ALhux3mzSwc.jbtis4su9sXTBCBM1B9bQN8j2z9fANAnkyneeMu', 'SUPER ADMIN', 1, '653e5386b7e05.png', '2023-10-22 15:14:04'),
(53, 'haad', 'hakiahmad756@gmail.como', '085749812345', 'Acmad', '', '$2y$10$a18FWZIn0TebIuAtfnaQnOJg0GetFBbb27Rk8Kc94LH3Aw3Lk30OW', 'END USER', 0, 'default.png', '2023-10-22 15:14:04'),
(54, 'haqiachd7', 'hakiahmad7777@gmail.com', '', 'ArenaFinder User', '', '$2y$10$SAFn6DrjBcpKxG4MvUlNzel62Hzxc5ho9Q2cU9iIgDiHbby2C/aem', 'END USER', 1, 'default.png', '2023-10-22 15:50:40'),
(56, 'tif.23', 'tif.nganjuk22@gmail.com', '', 'ArenaFinder User', '', '$2y$10$VSdZ8Eb//gLEyqZLXinWDucxf2eQQ6PW933BeENpbq1k8M1An/isK', 'END USER', 1, 'default.png', '2023-10-22 16:02:24'),
(59, 'pramguy', 'hakibaihaki598@gmail.com', '', 'Pramudya Pratama', '', '$2y$10$BEEbst1ugnqr8O1NyJ7TnOD7/w3Q06/dlLdsvCLlDT5YGK0x9rsr6', 'END USER', 1, '653e53ec7fe73.png', '2023-10-22 16:27:20'),
(60, 'e41222905', 'e41222905@student.polije.ac.id', '', 'E41222095 Polije', '', '$2y$10$AS.QlwF0yme0fD6ovV0DgOjwsvfCuYVNMynG9yOAQoziv2L6ujJ/K', 'END USER', 1, '654a5445f353e.png', '2023-10-26 12:51:28'),
(61, '5775858', 'shelawahyu5@gmail.com', '', 'dydh', '', '$2y$10$wCRXe7YL8ueIGRt.a5s6auLl.cxh0B1IGcSevAvelaKhNhtx9Xko6', 'END USER', 1, 'default.png', '2023-11-13 10:14:17'),
(62, 'pram', 'pramudyap333@gmail.com', '', 'Pramudya Putra Pratama', '', '$2y$10$ewzeazcHwi2fzrN8jJpEQ.6ojvXohspFMVfbESQodngWUqPlyfhV6', 'END USER', 1, 'default.png', '2023-11-15 10:16:53'),
(63, '1342', 'atilahlazuardi9@gmail.com', '', '....', '', '$2y$10$W7B0GAPU6QhJRsYyvLuFAOblIXNSfBHLYcrfPmsfEUIYiahfuAkLC', 'END USER', 1, 'default.png', '2023-11-16 12:19:16'),
(64, 'haqiachd7a', 'hakiahmad7777@gmail.coma', '', 'ArenaFinder User', '', '$2y$10$wKmnd3QoTd8iF9NGoEObJOUutqst7ShAjaZwa4vC7cGjos.oMEBjW', 'END USER', 1, 'default.png', '2023-11-20 14:09:45'),
(65, 'syam', 'syamadanisyah@gmail.com', '', 'syamaidzaradani syah', '', '$2y$10$xgC402bpfKXFIKDLPFTF5.jHc8WiAauw5ZOxMSKUr0PInQeA6mxlO', 'END USER', 1, '655b07964b81f.png', '2023-11-20 14:11:10'),
(66, 'haadas', 'hakiahmad756@gmail.comd', '', 'Acmadd', '', '$2y$10$n4wYJ29XDwhmks3cm4xQieXi6xgVdmMtpp5OxxV67I6i6tEzGptZy', 'END USER', 0, 'default.png', '2023-11-22 01:23:20'),
(67, 'azra', 'shelawahyu16@gmail.com', '', 'atilah', '', '$2y$10$TfhuL2DKReMx7OHRZ.720eqWaMjWH8ufUkjEDqSkhU42cwmGHpN2q', 'END USER', 1, 'default.png', '2023-11-27 10:30:11'),
(68, 'atilah', 'cyprus0903@gmail.com', '', 'Atilah Azra', '', 'c', 'END USER', 1, 'default.png', '2023-11-27 15:38:32'),
(71, 'dfkasf', 'hakiahmad999@gmail.com', '', 'ArenaFinder User', '', '$2y$10$BKMtEp1rv1lMnk8k6JhalOR6ncTBjPZNe3gvbFFaanB975jPo/35i', 'END USER', 1, 'default.png', '2023-11-28 02:36:36'),
(72, 'akuntest', 'akuntester.140123@gmail.com', '', 'Akun', '', '$2y$10$f6sUbKpYCy.vxxmBdeE/b.xgbZrGRK5FitxfDUkGdBFi3vCeEMcoy', 'END USER', 1, 'default.png', '2023-11-28 02:42:08'),
(73, '333', '3', '0856558646243', 'Achmad Baihaqi', '3', '3', 'SUPER ADMIN', 0, 'default.png', '2024-04-06 10:49:02'),
(104, 'Farkhan', 'Hanntok2802@gmail.com', '', '', '', '$2y$10$X3feGxo4ILKv3IxKQNcMUOIF3e/LZ45dVL/AjbsAvgQYfPhhcVsE6', 'ADMIN', 1, 'default.png', '2024-10-29 11:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `id_venue` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `venue_name` varchar(50) NOT NULL,
  `coordinate` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `desc_venue` text NOT NULL,
  `desc_facility` text NOT NULL,
  `total_lapangan` tinyint(2) NOT NULL,
  `status` enum('Disewakan','Berbayar','Gratis') NOT NULL,
  `sport` enum('Futsal','Bulu tangkis','Sepak bola','Bola Basket','Bola Voli','Tenis Lapangan','Atletik','Fitness','Renang','Pencak Silat') NOT NULL,
  `sport_status` enum('Indoor','Outdoor') NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `price_membership` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `shared` int(11) NOT NULL DEFAULT 0,
  `venue_photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`id_venue`, `email`, `venue_name`, `coordinate`, `location`, `desc_venue`, `desc_facility`, `total_lapangan`, `status`, `sport`, `sport_status`, `price`, `price_membership`, `views`, `shared`, `venue_photo`) VALUES
(1, 'hakiahmad756@gmail.como', 'Blessing Futsal', '-7.5760948911111035, 112.13568081471642', 'Jl. Tol Mojokerto - Kertosono, Semelo, Kayen, Kec. Bandarkedungmulyo, Kabupaten Jombang, Jawa Timur 61462', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in felis eu justo lacinia elementum. Nullam eget nunc at risus tristique consectetur. Phasellus vestibulum urna nec enim tincidunt euismod. Aenean cursus tortor vitae tortor ultrices, nec suscipit justo iaculis. Vestibulum vestibulum a elit id volutpat. Fusce et aliquet velit, nec lobortis metus. Sed vel feugiat justo. Nulla bibendum, lectus vel faucibus cursus, ex sapien malesuada arcu, non laoreet purus nunc nec libero. ', 'Fusce vel nisl ac velit dignissim iaculis. Sed euismod libero a nunc laoreet, et pharetra orci ullamcorper. Suspendisse potenti.\r\n', 0, 'Disewakan', 'Futsal', 'Indoor', 0, 0, 1224, 0, 'venue-2.png'),
(2, 'e41222905@student.polije.ac.id', 'GOR Bulutangkis Bhayangkara', '-7.58100688171412, 112.1438935', 'Jl. Raya Kayen, Semelo, Jombang, Kec. Bandarkedungmulyo, Kab. Jombang, Jawa Timur 61462', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in felis eu justo lacinia elementum. Nullam eget nunc at risus tristique consectetur. Phasellus vestibulum urna nec enim tincidunt euismod. Aenean cursus tortor vitae tortor ultrices, nec suscipit justo iaculis. Vestibulum vestibulum a elit id volutpat. Fusce et aliquet velit, nec lobortis metus. Sed vel feugiat justo. Nulla bibendum, lectus vel faucibus cursus, ex sapien malesuada arcu, non laoreet purus nunc nec libero. ', 'Fusce vel nisl ac velit dignissim iaculis. Sed euismod libero a nunc laoreet, et pharetra orci ullamcorper. Suspendisse potenti.\r\n', 0, 'Disewakan', 'Bulu tangkis', 'Indoor', 0, 0, 77, 0, 'venue-1.png'),
(3, 'hakibaihaki598@gmail.com', 'Kolam renang sumber laut', '-7.58100688171412, 112.1438935', 'Jl. Raya Kayen, Semelo, Jombang, Kec. Bandarkedungmulyo, Kab. Jombang, Jawa Timur 61462', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in felis eu justo lacinia elementum. Nullam eget nunc at risus tristique consectetur. Phasellus vestibulum urna nec enim tincidunt euismod. Aenean cursus tortor vitae tortor ultrices, nec suscipit justo iaculis. Vestibulum vestibulum a elit id volutpat. Fusce et aliquet velit, nec lobortis metus. Sed vel feugiat justo. Nulla bibendum, lectus vel faucibus cursus, ex sapien malesuada arcu, non laoreet purus nunc nec libero. ', 'Fusce vel nisl ac velit dignissim iaculis. Sed euismod libero a nunc laoreet, et pharetra orci ullamcorper. Suspendisse potenti.\r\n', 0, 'Berbayar', 'Renang', 'Indoor', 10000, 0, 21, 0, 'venue-1.png'),
(4, 'haqiachd.me@gmail.com', 'Lapangan Basket Anjuk Ladang', '-7.58100688171412, 112.1438935', 'Jl. Raya Kayen, Semelo, Jombang, Kec. Bandarkedungmulyo, Kab. Jombang, Jawa Timur 61462', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in felis eu justo lacinia elementum. Nullam eget nunc at risus tristique consectetur. Phasellus vestibulum urna nec enim tincidunt euismod. Aenean cursus tortor vitae tortor ultrices, nec suscipit justo iaculis. Vestibulum vestibulum a elit id volutpat. Fusce et aliquet velit, nec lobortis metus. Sed vel feugiat justo. Nulla bibendum, lectus vel faucibus cursus, ex sapien malesuada arcu, non laoreet purus nunc nec libero. \r\n', 'Fusce vel nisl ac velit dignissim iaculis. Sed euismod libero a nunc laoreet, et pharetra orci ullamcorper. Suspendisse potenti.\r\n', 0, 'Gratis', 'Bola Basket', 'Indoor', 0, 0, 69, 0, 'venue-1.png'),
(5, 'arenafinder.app@gmail.com', 'Stadion Anjuk Ladang Nganjuk', '-7.58100688171412, 112.1438935', 'Lorem ipsum dolor si', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in felis eu justo lacinia elementum. Nullam eget nunc at risus tristique consectetur. Phasellus vestibulum urna nec enim tincidunt euismod. Aenean cursus tortor vitae tortor ultrices, nec suscipit justo iaculis. Vestibulum vestibulum a elit id volutpat. Fusce et aliquet velit, nec lobortis metus. Sed vel feugiat justo. Nulla bibendum, lectus vel faucibus cursus, ex sapien malesuada arcu, non laoreet purus nunc nec libero. ', 'Fusce vel nisl ac velit dignissim iaculis. Sed euismod libero a nunc laoreet, et pharetra orci ullamcorper. Suspendisse potenti.\r\n', 0, 'Gratis', 'Sepak bola', 'Indoor', 0, 0, 103, 0, '4ad488410776525e8655'),
(8, 'hakiahmad756@gmail.com', 'fasfasjflajslfjsald', '-7.598803978172756, 111.91078229', 'afaksfjlsjflasdlfsl', 'fasfasjflajslfjsald', '', 2, 'Gratis', 'Futsal', 'Indoor', 0, 0, 0, 0, '359@2x.png');

-- --------------------------------------------------------

--
-- Table structure for table `venue_aktivitas`
--

CREATE TABLE `venue_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `nama_aktivitas` varchar(50) NOT NULL,
  `desc_aktivitas` text DEFAULT NULL,
  `sport` enum('Futsal','Bulu tangkis','Sepak bola','Bola Basket','Bola Voli','Tenis Lapangan','Atletik','Fitness','Renang','Pencak Silat') NOT NULL,
  `max_member` int(5) NOT NULL DEFAULT 0,
  `membership` enum('Non Member','Member') NOT NULL,
  `jam_main` tinyint(2) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_aktivitas`
--

INSERT INTO `venue_aktivitas` (`id_aktivitas`, `id_venue`, `nama_aktivitas`, `desc_aktivitas`, `sport`, `max_member`, `membership`, `jam_main`, `date`, `price`, `photo`) VALUES
(1, 2, 'Latihan Bersama Badminton TIF Nganjuk', NULL, 'Bulu tangkis', 32, 'Non Member', 2, '2023-11-30', 15000, 'aktivitas-1.png'),
(3, 1, 'Main Bareng Olahraga Futsal', NULL, 'Futsal', 30, 'Member', 1, '2023-11-09', 25000, 'aktivitas-1.png'),
(4, 3, 'Pelatihan Renang Kelompok Muda Kura-Kura', NULL, 'Renang', 25, 'Non Member', 2, '2023-11-29', 15000, 'aktivitas-2.png'),
(5, 2, 'Turnamen Bulu Tangkis Kota Nganjuk', NULL, 'Bulu tangkis', 40, 'Non Member', 3, '2023-11-29', 10000, 'aktivitas-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `venue_aktivitas_member`
--

CREATE TABLE `venue_aktivitas_member` (
  `id_member` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `joined_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_aktivitas_member`
--

INSERT INTO `venue_aktivitas_member` (`id_member`, `id_aktivitas`, `email`, `joined_date`) VALUES
(1, 1, 'hakiahmad756@gmail.como', '2023-11-01 18:14:36'),
(12, 3, 'hakiahmad756@gmail.com', '2023-11-15 00:54:26'),
(19, 1, 'hakiahmad756@gmail.com', '2023-11-17 13:28:42'),
(20, 4, 'atilahlazuardi9@gmail.com', '2023-11-22 10:58:59'),
(24, 1, 'atilahlazuardi9@gmail.com', '2023-11-23 11:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `venue_booking`
--

CREATE TABLE `venue_booking` (
  `id_booking` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` enum('Offline','Online') NOT NULL DEFAULT 'Offline',
  `payment_status` enum('Pending','Rejected','Accepted') NOT NULL DEFAULT 'Pending',
  `date_confirmed` datetime NOT NULL DEFAULT current_timestamp(),
  `membership` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_booking`
--

INSERT INTO `venue_booking` (`id_booking`, `id_venue`, `email`, `total_price`, `payment_method`, `payment_status`, `date_confirmed`, `membership`, `created_at`) VALUES
(1, 1, 'hakiahmad756@gmail.como', 225000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-01 05:58:32'),
(4, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 02:12:32'),
(5, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 02:51:09'),
(6, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 02:51:42'),
(7, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 02:52:18'),
(8, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 02:53:16'),
(9, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:04:01'),
(10, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:04:23'),
(11, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:04:53'),
(12, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:04:58'),
(13, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:05:37'),
(14, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:06:11'),
(15, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:07:45'),
(16, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:10:08'),
(17, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:10:54'),
(18, 1, 'hakiahmad756@gmail.com', 225000, 'Offline', 'Accepted', '2023-11-13 08:53:56', 0, '2023-11-08 03:15:05'),
(19, 1, 'hakiahmad756@gmail.com', 225000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 03:15:39'),
(20, 1, 'hakiahmad756@gmail.com', 225000, 'Offline', 'Accepted', '2023-11-13 08:53:56', 0, '2023-11-08 03:15:55'),
(21, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-13 08:53:56', 0, '2023-11-08 08:25:36'),
(22, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Accepted', '2023-11-13 08:53:56', 0, '2023-11-08 08:32:38'),
(23, 1, 'hakiahmad756@gmail.com', 300000, 'Offline', 'Accepted', '2023-11-13 08:53:56', 0, '2023-11-08 09:34:21'),
(24, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Rejected', '2023-11-13 08:53:56', 0, '2023-11-09 09:23:56'),
(25, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Rejected', '2023-11-13 08:53:56', 0, '2023-11-12 01:45:47'),
(26, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-14 19:56:50', 0, '2023-11-14 19:56:50'),
(27, 1, 'hakiahmad756@gmail.com', 150000, 'Offline', 'Pending', '2023-11-15 02:06:50', 0, '2023-11-15 02:06:50'),
(28, 1, 'shelawahyu5@gmail.com', 75000, 'Offline', 'Pending', '2023-11-15 11:19:06', 0, '2023-11-15 11:19:06'),
(29, 1, 'shelawahyu5@gmail.com', 75000, 'Offline', 'Pending', '2023-11-15 11:20:28', 0, '2023-11-15 11:20:28'),
(30, 1, 'syamadanisyah@gmail.com', 75000, 'Offline', 'Accepted', '2023-11-20 14:13:39', 0, '2023-11-20 14:13:39'),
(31, 5, 'atilahlazuardi9@gmail.com', 0, 'Offline', 'Pending', '2023-11-23 12:02:12', 0, '2023-11-23 12:02:12'),
(32, 4, 'atilahlazuardi9@gmail.com', 0, 'Offline', 'Pending', '2023-11-23 12:02:56', 0, '2023-11-23 12:02:56'),
(33, 1, 'hakiahmad756@gmail.com', 0, 'Offline', 'Accepted', '2023-11-23 22:53:57', 0, '2023-11-23 22:53:57'),
(34, 1, 'hakiahmad756@gmail.com', 100000, 'Offline', 'Pending', '2023-11-26 18:11:08', 0, '2023-11-26 18:11:08'),
(35, 1, 'hakiahmad756@gmail.com', 100000, 'Offline', 'Pending', '2023-11-26 18:11:40', 0, '2023-11-26 18:11:40'),
(36, 1, 'hakiahmad756@gmail.com', 175000, 'Offline', 'Pending', '2023-11-26 18:12:36', 0, '2023-11-26 18:12:36'),
(37, 1, 'hakiahmad756@gmail.com', 175000, 'Offline', 'Pending', '2023-11-26 18:18:57', 0, '2023-11-26 18:18:57'),
(38, 1, 'hakiahmad756@gmail.com', 175000, 'Offline', 'Pending', '2023-11-26 18:20:43', 0, '2023-11-26 18:20:43'),
(49, 1, 'hakiahmad756@gmail.com', 150000, 'Offline', 'Pending', '2023-11-26 20:29:14', 0, '2023-11-26 20:29:14'),
(50, 1, 'hakiahmad756@gmail.com', 150000, 'Offline', 'Pending', '2023-11-26 20:30:10', 0, '2023-11-26 20:30:10'),
(51, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-26 20:42:59', 0, '2023-11-26 20:42:59'),
(52, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-26 21:29:32', 0, '2023-11-26 21:29:32'),
(54, 1, 'hakiahmad756@gmail.com', 100000, 'Offline', 'Pending', '2023-11-26 23:23:39', 0, '2023-11-26 23:23:39'),
(55, 1, 'hakiahmad756@gmail.com', 175000, 'Offline', 'Pending', '2023-11-26 23:26:21', 0, '2023-11-26 23:26:21'),
(56, 1, 'hakiahmad756@gmail.com', 175000, 'Offline', 'Pending', '2023-11-26 23:29:07', 0, '2023-11-26 23:29:07'),
(57, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-27 00:00:09', 0, '2023-11-27 00:00:09'),
(58, 1, 'hakiahmad756@gmail.com', 75000, 'Offline', 'Pending', '2023-11-27 00:07:36', 0, '2023-11-27 00:07:36'),
(59, 1, 'hakiahmad756@gmail.com', 150000, 'Offline', 'Pending', '2023-11-27 02:31:02', 0, '2023-11-27 02:31:02'),
(60, 1, 'e41222905@student.polije.ac.id', 15000, 'Offline', 'Pending', '2024-08-31 15:11:49', 0, '2024-08-31 15:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `venue_booking_detail`
--

CREATE TABLE `venue_booking_detail` (
  `id_booking` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_booking_detail`
--

INSERT INTO `venue_booking_detail` (`id_booking`, `date`, `id_price`) VALUES
(1, '2023-11-08', 6),
(1, '2023-11-08', 7),
(1, '2023-11-08', 8),
(4, '2023-11-09', 8),
(4, '2023-11-09', 6),
(4, '2023-11-09', 7),
(1, '2023-11-08', 10),
(15, '2023-11-14', 6),
(16, '2023-11-11', 6),
(17, '2023-11-11', 7),
(18, '2023-11-13', 7),
(18, '2023-11-13', 6),
(18, '2023-11-13', 8),
(19, '2023-11-12', 6),
(19, '2023-11-12', 7),
(19, '2023-11-12', 8),
(20, '2023-11-12', 13),
(20, '2023-11-12', 14),
(20, '2023-11-12', 12),
(21, '2023-11-08', 9),
(22, '2023-11-14', 7),
(23, '2023-11-08', 11),
(23, '2023-11-08', 12),
(23, '2023-11-08', 13),
(23, '2023-11-08', 14),
(1, '2023-11-08', 10),
(25, '2023-11-18', 6),
(27, '2023-11-21', 6),
(27, '2023-11-21', 7),
(29, '2023-11-16', 12),
(30, '2023-11-20', 6),
(1, '2023-11-08', 10),
(38, '2023-11-26', 6),
(38, '2023-11-26', 7),
(37, '2023-11-08', 10),
(37, '2023-11-08', 10),
(37, '2023-11-08', 15),
(37, '2023-11-08', 9),
(37, '2023-11-26', 8),
(49, '2023-11-26', 9),
(49, '2023-11-26', 10),
(50, '2023-11-26', 12),
(50, '2023-11-26', 11),
(51, '2023-11-26', 13),
(52, '2023-11-26', 15),
(54, '3923-11-26', 6),
(55, '2023-11-30', 6),
(55, '2023-11-30', 15),
(56, '2023-11-29', 7),
(56, '2023-11-29', 6),
(57, '2023-11-26', 14),
(58, '2023-12-14', 23),
(59, '2023-11-27', 15),
(59, '2023-11-27', 16),
(60, '2024-09-01', 24);

-- --------------------------------------------------------

--
-- Table structure for table `venue_fasilitas`
--

CREATE TABLE `venue_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `nama_fasilitas` varchar(20) NOT NULL,
  `fasilitas_photo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_fasilitas`
--

INSERT INTO `venue_fasilitas` (`id_fasilitas`, `id_venue`, `nama_fasilitas`, `fasilitas_photo`) VALUES
(1, 1, 'Kantin', 'kantin.png'),
(2, 1, 'Tempat Parkir Mobil ', 'parkir.png'),
(3, 1, 'Musholla', 'musholla.png'),
(4, 1, 'Gereja', 'gereja.png');

-- --------------------------------------------------------

--
-- Table structure for table `venue_galery`
--

CREATE TABLE `venue_galery` (
  `id_galery` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `photo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `venue_lapangan`
--

CREATE TABLE `venue_lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL,
  `photo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_lapangan`
--

INSERT INTO `venue_lapangan` (`id_lapangan`, `id_venue`, `nama_lapangan`, `photo`) VALUES
(1, 1, 'Lapangan 1', 'lapangan-1.png'),
(2, 1, 'Lapangan 2', 'lapangan-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `venue_membership`
--

CREATE TABLE `venue_membership` (
  `id_membership` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `hari_main` text NOT NULL,
  `waktu_main` time NOT NULL,
  `durasi_main` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('Member Aktif','Member Non Aktif') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_membership`
--

INSERT INTO `venue_membership` (`id_membership`, `id_venue`, `email`, `nama`, `alamat`, `no_telp`, `hari_main`, `waktu_main`, `durasi_main`, `harga`, `status`, `created_at`) VALUES
(0, 1, 'hakiahmad756@gmail.com', 'Achmad Baihaqi', 'Jombang, Jatim', '085655864624', 'Kamis', '07:00:00', 2, 15000, 'Member Aktif', '2023-11-29 22:24:27'),
(1, 2, 'hakiahmad756@gmail.com', 'Achmad Baihaqi', 'Kayen, Jombang', '085655864624', 'Senin,Selasa', '21:16:31', 2, 90000, 'Member Aktif', '2023-11-18 21:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `venue_operasional`
--

CREATE TABLE `venue_operasional` (
  `id_operasional` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `day_name` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `opened` time NOT NULL,
  `closed` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_operasional`
--

INSERT INTO `venue_operasional` (`id_operasional`, `id_venue`, `day_name`, `opened`, `closed`) VALUES
(1, 1, 'Senin', '07:00:00', '20:00:00'),
(2, 1, 'Selasa', '07:00:00', '20:00:00'),
(3, 1, 'Rabu', '07:00:00', '20:00:00'),
(4, 1, 'Kamis', '07:00:00', '20:00:00'),
(5, 1, 'Jumat', '07:00:00', '20:00:00'),
(6, 1, 'Sabtu', '07:00:00', '20:00:00'),
(8, 2, 'Senin', '07:00:00', '20:00:00'),
(9, 5, 'Senin', '07:00:00', '20:00:00'),
(30, 8, 'Senin', '07:00:00', '23:00:00'),
(31, 8, 'Selasa', '07:00:00', '23:00:00'),
(32, 8, 'Rabu', '07:00:00', '23:00:00'),
(33, 8, 'Kamis', '07:00:00', '23:00:00'),
(34, 8, 'Jumat', '07:00:00', '23:00:00'),
(35, 8, 'Sabtu', '07:00:00', '23:00:00'),
(36, 8, 'Minggu', '07:00:00', '23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `venue_price`
--

CREATE TABLE `venue_price` (
  `id_price` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `price` int(11) NOT NULL,
  `membership` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_price`
--

INSERT INTO `venue_price` (`id_price`, `id_venue`, `id_lapangan`, `date`, `start_hour`, `end_hour`, `price`, `membership`) VALUES
(6, 1, 1, '2023-12-19', '07:00:00', '08:00:00', 100000, 0),
(7, 1, 1, '2023-12-19', '08:00:00', '09:00:00', 75000, 0),
(8, 1, 1, '2023-12-19', '09:00:00', '10:00:00', 75000, 0),
(9, 1, 1, '2023-12-19', '10:00:00', '11:00:00', 75000, 0),
(10, 1, 1, '2023-12-19', '11:00:00', '12:00:00', 75000, 0),
(11, 1, 1, '2023-12-19', '12:00:00', '13:00:00', 75000, 0),
(12, 1, 1, '2023-12-19', '13:00:00', '14:00:00', 75000, 0),
(13, 1, 1, '2023-12-19', '14:00:00', '15:00:00', 75000, 0),
(14, 1, 1, '2023-12-19', '15:00:00', '16:00:00', 75000, 0),
(15, 2, 2, '2024-09-01', '07:00:00', '08:00:00', 75000, 0),
(16, 2, 2, '2023-12-19', '08:00:00', '09:00:00', 75000, 0),
(17, 2, 2, '2023-12-19', '09:00:00', '10:00:00', 75000, 0),
(18, 2, 2, '2023-12-19', '10:00:00', '11:00:00', 75000, 0),
(19, 2, 2, '2023-12-19', '11:00:00', '12:00:00', 75000, 0),
(20, 2, 2, '2023-12-19', '12:00:00', '13:00:00', 75000, 0),
(21, 2, 2, '2023-12-19', '13:00:00', '14:00:00', 75000, 0),
(22, 2, 2, '2023-12-19', '14:00:00', '15:00:00', 75000, 0),
(23, 2, 2, '2023-12-19', '15:00:00', '16:00:00', 75000, 0),
(24, 1, 1, '2024-09-01', '16:00:00', '16:59:00', 15000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue_review`
--

CREATE TABLE `venue_review` (
  `id_review` int(11) NOT NULL,
  `id_venue` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL DEFAULT '5',
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue_review`
--

INSERT INTO `venue_review` (`id_review`, `id_venue`, `id_users`, `rating`, `comment`, `date`) VALUES
(1, 1, 72, '3', 'sfsf', '2023-11-29 18:17:04'),
(19, 2, 48, '5', 'bagus', '2023-11-05 08:29:17'),
(44, 2, 60, '2', 'lapangan bagus', '2023-11-05 15:08:00'),
(45, 3, 60, '3', 'Lumayan lah', '2023-11-05 15:05:34'),
(53, 3, 24, '5', '', '2023-11-05 15:34:16'),
(56, 1, 23, '5', 'Saya sering datang ke sini untuk bermain futsal bersama teman-teman. Harga sewa lapangan yang terjangkau dan suasana yang ramah membuat tempat ini menjadi pilihan utama kami.', '2023-11-07 23:03:57'),
(57, 1, 47, '5', 'Tempat futsal ini memang tempat yang bagus untuk bermain. Lapangan yang bersih dan peralatan yang terawat dengan baik membuat pengalaman bermain futsal sangat menyenangkan', '2023-11-07 23:08:02'),
(58, 1, 59, '2', 'Tempatnya jelek', '2023-11-07 23:08:57'),
(65, 4, 24, '5', 'p', '2023-11-25 21:16:05'),
(69, 1, 48, '', 'afsf', '2023-11-29 18:18:05'),
(70, 2, 24, '1', 'SUDAH BAGUS', '2023-11-29 18:56:31'),
(71, 1, 24, '5', '', '2024-08-31 12:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id_verification` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `type` enum('SignUp','ForgotPass') NOT NULL,
  `start_millis` bigint(13) NOT NULL,
  `end_millis` bigint(13) NOT NULL,
  `device` enum('Website','Mobile') NOT NULL,
  `resend` int(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id_verification`, `email`, `otp`, `type`, `start_millis`, `end_millis`, `device`, `resend`, `created_at`) VALUES
(20, 'hakiahmad756@gmail.com', '071900', 'SignUp', 1697896839246, 1697897739246, 'Mobile', 8, '2023-10-21 18:04:32'),
(32, 'hakiahmad777@gmail.com', '621652', 'ForgotPass', 1697896124147, 1697897024147, 'Mobile', 0, '2023-10-21 20:48:44'),
(33, 'hakiahmad777@gmail.com', '702658', 'ForgotPass', 1697896557077, 1697897457077, 'Mobile', 7, '2023-10-21 20:49:15'),
(34, 'pkmki2023.thegsteam@gmail.com', '926682', 'SignUp', 1697897579444, 1697898479444, 'Mobile', 0, '2023-10-21 21:12:59'),
(35, 'pkmki2023.thegsteam@gmail.com', '479918', 'ForgotPass', 1697897611807, 1697898511807, 'Mobile', 0, '2023-10-21 21:13:31'),
(36, 'hakiahmad756@gmail.com', '967496', 'ForgotPass', 1697898278031, 1697899178031, 'Mobile', 0, '2023-10-21 21:24:38'),
(37, 'hakiahmad756@gmail.com', '113777', 'ForgotPass', 1697899615949, 1697900515949, 'Mobile', 0, '2023-10-21 21:46:55'),
(38, 'hakiahmad756@gmail.com', '690329', 'ForgotPass', 1697900046326, 1697900946326, 'Mobile', 0, '2023-10-21 21:54:06'),
(39, 'hakiahmad756@gmail.com', '526216', 'ForgotPass', 1697900395564, 1697901295564, 'Mobile', 0, '2023-10-21 21:59:55'),
(40, 'hakiahmad756@gmail.com', '476293', 'ForgotPass', 1697901942516, 1697902842516, 'Mobile', 0, '2023-10-21 22:25:42'),
(41, 'hakiahmad756@gmail.com', '298416', 'ForgotPass', 1697902011406, 1697902911406, 'Mobile', 0, '2023-10-21 22:26:51'),
(42, 'hakiahmad756@gmail.com', '828498', 'ForgotPass', 1697902470647, 1697903370647, 'Mobile', 0, '2023-10-21 22:34:30'),
(43, 'hakiahmad756@gmail.com', '758088', 'ForgotPass', 1697902779174, 1697903679174, 'Mobile', 0, '2023-10-21 22:39:39'),
(44, 'pkmki2023.thegsteam@gmail.com', '700508', 'ForgotPass', 1697902902720, 1697903802720, 'Mobile', 0, '2023-10-21 22:41:42'),
(45, 'hakiahmad756@gmail.com', '694774', 'ForgotPass', 1697903129379, 1697904029379, 'Mobile', 0, '2023-10-21 22:45:29'),
(46, 'hakiahmad756@gmail.com', '657051', 'ForgotPass', 1697903424075, 1697904324075, 'Mobile', 0, '2023-10-21 22:50:24'),
(47, 'hakiahmad756@gmail.com', '289097', 'ForgotPass', 1697904035020, 1697904935020, 'Mobile', 0, '2023-10-21 23:00:35'),
(48, 'hakiahmad756@gmail.com', '513897', 'ForgotPass', 1697905015184, 1697905915184, 'Mobile', 3, '2023-10-21 23:02:46'),
(49, 'hakiahmad756@gmail.com', '425546', 'ForgotPass', 1697905953631, 1697906853631, 'Mobile', 1, '2023-10-21 23:31:22'),
(50, 'hakiahmad756@gmail.com', '008196', 'ForgotPass', 1697906177692, 1697907077692, 'Mobile', 0, '2023-10-21 23:36:17'),
(51, 'hakiahmad756@gmail.com', '533467', 'ForgotPass', 1697906224283, 1697907124283, 'Mobile', 0, '2023-10-21 23:37:04'),
(52, 'hakiahmad756@gmail.com', '659736', 'ForgotPass', 1697906475865, 1697907375865, 'Mobile', 1, '2023-10-21 23:40:09'),
(53, 'hakiahmad756@gmail.com', '658953', 'ForgotPass', 1697906623273, 1697907523273, 'Mobile', 0, '2023-10-21 23:43:43'),
(54, 'hakiahmad756@gmail.com', '368294', 'ForgotPass', 1697908666032, 1697909566032, 'Mobile', 0, '2023-10-22 00:17:46'),
(56, 'haqiachd.me@gmail.com', '734380', 'SignUp', 1697909046648, 1697909946648, 'Mobile', 1, '2023-10-22 00:22:51'),
(57, 'hakibaihaki598@gmail.com', '647995', 'SignUp', 1697965709670, 1697966609670, 'Mobile', 2, '2023-10-22 16:03:53'),
(58, 'hakibaihaki598@gmail.com', '145547', 'ForgotPass', 1697965789919, 1697966689919, 'Mobile', 0, '2023-10-22 16:09:49'),
(59, 'hakibaihaki598@gmail.com', '098266', 'SignUp', 1697966682093, 1697967582093, 'Mobile', 0, '2023-10-22 16:24:42'),
(60, 'hakibaihaki598@gmail.com', '474211', 'SignUp', 1697966840795, 1697967740795, 'Mobile', 0, '2023-10-22 16:27:20'),
(61, 'hakibaihaki598@gmail.com', '898357', 'ForgotPass', 1697966919331, 1697967819331, 'Mobile', 0, '2023-10-22 16:28:39'),
(62, 'hakiahmad756@gmail.com', '469644', 'ForgotPass', 1698197767191, 1698198667191, 'Mobile', 0, '2023-10-25 08:36:07'),
(63, 'hakiahmad756@gmail.com', '757988', 'ForgotPass', 1698203620193, 1698204520193, 'Mobile', 1, '2023-10-25 10:12:29'),
(64, 'e41222905@student.polije.ac.id', '719710', 'SignUp', 1698299489120, 1698300389120, 'Mobile', 0, '2023-10-26 12:51:29'),
(65, 'arenafinder.app@gmail.com', '203496', 'ForgotPass', 1698304364304, 1698305264304, 'Mobile', 0, '2023-10-26 14:12:44'),
(66, 'e41222905@student.polije.ac.id', '771833', 'ForgotPass', 1698389217620, 1698390117620, 'Mobile', 0, '2023-10-27 13:46:57'),
(67, 'e41222905@student.polije.ac.id', '602387', 'ForgotPass', 1698389317518, 1698390217518, 'Mobile', 0, '2023-10-27 13:48:37'),
(68, 'e41222905@student.polije.ac.id', '429422', 'ForgotPass', 1698392270613, 1698393170613, 'Mobile', 0, '2023-10-27 14:37:50'),
(69, 'cakerkita@gmail.com', '550054', 'ForgotPass', 1699235886721, 1699236786721, 'Mobile', 0, '2023-11-06 08:58:06'),
(70, 'hakiahmad756@gmail.com', '270910', 'ForgotPass', 1699235905847, 1699236805847, 'Mobile', 0, '2023-11-06 08:58:25'),
(71, 'e41222905@student.polije.ac.id', '199722', 'ForgotPass', 1699235956326, 1699236856326, 'Mobile', 0, '2023-11-06 08:59:16'),
(72, 'e41222905@student.polije.ac.id', '498610', 'ForgotPass', 1699236219108, 1699237119108, 'Mobile', 0, '2023-11-06 09:03:39'),
(73, 'e41222905@student.polije.ac.id', '138034', 'ForgotPass', 1699236299706, 1699237199706, 'Mobile', 0, '2023-11-06 09:04:59'),
(74, 'cakerkita@gmail.com', '625115', 'ForgotPass', 1699236379515, 1699237279515, 'Mobile', 0, '2023-11-06 09:06:19'),
(75, 'hakiahmsad756@gmail.com', '463034', 'ForgotPass', 1699845090427, 1699845990427, 'Mobile', 0, '2023-11-13 10:11:30'),
(76, 'shelawahyu5@gmail.com', '014058', 'ForgotPass', 1700017511828, 1700018411828, 'Mobile', 0, '2023-11-15 10:05:11'),
(77, 'shelawahyu5@gmail.com', '568005', 'ForgotPass', 1700017667932, 1700018567932, 'Mobile', 0, '2023-11-15 10:07:47'),
(78, 'hakiahmad756@gmail.com', '307315', 'ForgotPass', 1700017784759, 1700018684759, 'Mobile', 0, '2023-11-15 10:09:44'),
(79, 'hakiahmad756@gmail.com', '982601', 'ForgotPass', 1700017848781, 1700018748781, 'Mobile', 0, '2023-11-15 10:10:48'),
(80, 'pramudyap333@gmail.com', '319439', 'ForgotPass', 1700018276047, 1700019176047, 'Mobile', 0, '2023-11-15 10:17:56'),
(81, 'pramudyap333@gmail.com', '588537', 'ForgotPass', 1700018310028, 1700019210028, 'Mobile', 0, '2023-11-15 10:18:30'),
(82, 'hakiahmad756@gmail.com', '767505', 'ForgotPass', 1700029820550, 1700030720550, 'Mobile', 0, '2023-11-15 13:30:20'),
(83, 'hakiahmad756@gmail.com', '086732', 'ForgotPass', 1700029834755, 1700030734755, 'Mobile', 0, '2023-11-15 13:30:34'),
(84, 'hakiahmad756@gmail.com', '374808', 'ForgotPass', 1700029860279, 1700030760279, 'Mobile', 0, '2023-11-15 13:31:00'),
(85, 'hakiahmad756@gmail.com', '414629', 'ForgotPass', 1700109602785, 1700110502785, 'Mobile', 0, '2023-11-16 11:40:02'),
(86, 'hakiahmad756@gmail.com', '237113', 'ForgotPass', 1700110106311, 1700111006311, 'Mobile', 0, '2023-11-16 11:48:26'),
(87, 'hakiahmad756@gmail.com', '867501', 'ForgotPass', 1700110206797, 1700111106797, 'Mobile', 0, '2023-11-16 11:50:06'),
(88, 'hakiahmad756@gmail.com', '127567', 'ForgotPass', 1700110618772, 1700111518772, 'Mobile', 0, '2023-11-16 11:56:58'),
(89, 'atilahlazuardi9@gmail.com', '163389', 'SignUp', 1700111956753, 1700112856753, 'Mobile', 0, '2023-11-16 12:19:16'),
(90, 'atilahlazuardi9@gmail.com', '748680', 'ForgotPass', 1700635623651, 1700636523651, 'Mobile', 1, '2023-11-22 13:39:13'),
(91, 'atilahlazuardi9@gmail.com', '604464', 'ForgotPass', 1700637892554, 1700638792554, 'Mobile', 0, '2023-11-22 14:24:52'),
(92, 'hakiahmad756@gmail.com', '557351', 'ForgotPass', 1700639152709, 1700639212709, 'Mobile', 0, '2023-11-22 14:45:52'),
(93, 'hakiahmad757@gmail.com', '024488', 'ForgotPass', 1700639266049, 1700639272049, 'Mobile', 0, '2023-11-22 14:47:46'),
(94, 'hakiahmad756@gmail.com', '274249', 'ForgotPass', 1700639416400, 1700639431400, 'Mobile', 0, '2023-11-22 14:50:16'),
(95, 'hakiahmad757@gmail.com', '631551', 'ForgotPass', 1700639553462, 1700639568462, 'Mobile', 0, '2023-11-22 14:52:33'),
(96, 'hakiahmad756@gmail.com', '319065', 'ForgotPass', 1700639593156, 1700639608156, 'Mobile', 0, '2023-11-22 14:53:13'),
(97, 'hakiahmad757@gmail.com', '234489', 'ForgotPass', 1700639759366, 1700639774366, 'Mobile', 0, '2023-11-22 14:55:59'),
(98, 'hakiahmad756@gmail.com', '400210', 'ForgotPass', 1700639805056, 1700639820056, 'Mobile', 0, '2023-11-22 14:56:45'),
(99, 'hakiahmad757@gmail.com', '622235', 'ForgotPass', 1700639837973, 1700639852973, 'Mobile', 0, '2023-11-22 14:57:17'),
(100, 'hakiahmad756@gmail.com', '133509', 'ForgotPass', 1700639906316, 1700639921316, 'Mobile', 0, '2023-11-22 14:58:26'),
(101, 'hakiahmad756@gmail.com', '028177', 'ForgotPass', 1700640181266, 1700640196266, 'Mobile', 0, '2023-11-22 15:03:01'),
(102, 'hakiahmad756@gmail.com', '974862', 'ForgotPass', 1700640205719, 1700640220719, 'Mobile', 0, '2023-11-22 15:03:25'),
(103, 'atilahlazuardi9@gmail.com', '718138', 'ForgotPass', 1700640849551, 1700640909551, 'Mobile', 1, '2023-11-22 15:09:56'),
(104, 'atilahlazuardi9@gmail.com', '670959', 'ForgotPass', 1700642822748, 1700642882748, 'Mobile', 3, '2023-11-22 15:21:18'),
(105, 'atilahlazuardi99@gmail.com', '914279', 'ForgotPass', 1700647636783, 1700647696783, 'Mobile', 0, '2023-11-22 17:07:16'),
(106, 'atilahlazuardi9@gmail.com', '833171', 'ForgotPass', 1700647760853, 1700647820853, 'Mobile', 0, '2023-11-22 17:09:20'),
(107, 'shelawahyu16@gmail.com', '621802', 'SignUp', 1701055812502, 1701055872502, 'Mobile', 0, '2023-11-27 10:30:12'),
(108, 'hakiahmad756@gmail.com', '010642', 'ForgotPass', 1701114933084, 1701114993084, 'Mobile', 0, '2023-11-28 02:55:33'),
(109, 'hakiahmad756@gmail.com', '070324', 'ForgotPass', 1701114950071, 1701115010071, 'Mobile', 0, '2023-11-28 02:55:50'),
(110, 'hakiahmad756@gmail.com', '302994', 'ForgotPass', 1701141112065, 1701142012065, 'Mobile', 0, '2023-11-28 10:11:52'),
(111, 'hakiahmad756@gmail.com', '899304', 'ForgotPass', 1701141167188, 1701142067188, 'Mobile', 0, '2023-11-28 10:12:47'),
(112, 'hakiahmad756@gmail.com', '590816', 'ForgotPass', 1701158569095, 1701159469095, 'Mobile', 0, '2023-11-28 15:02:49'),
(113, 'hakiahmad756@gmail.com', '053917', 'ForgotPass', 1701159864426, 1701160764426, 'Mobile', 0, '2023-11-28 15:24:24'),
(114, 'e41222905@student.polije.ac.id', '718496', 'ForgotPass', 1725085547385, 1725086447385, 'Mobile', 0, '2024-08-31 13:25:47'),
(115, 'e41222905@student.polije.ac.id', '272522', 'ForgotPass', 1725085706538, 1725086606538, 'Mobile', 0, '2024-08-31 13:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`),
  ADD KEY `in_email` (`email`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `in_username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`id_venue`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `venue_aktivitas`
--
ALTER TABLE `venue_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_aktivitas_member`
--
ALTER TABLE `venue_aktivitas_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_aktivitas` (`id_aktivitas`,`email`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `venue_booking`
--
ALTER TABLE `venue_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_venue` (`id_venue`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `venue_booking_detail`
--
ALTER TABLE `venue_booking_detail`
  ADD KEY `in_id_booking` (`id_booking`),
  ADD KEY `id_price` (`id_price`);

--
-- Indexes for table `venue_fasilitas`
--
ALTER TABLE `venue_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_galery`
--
ALTER TABLE `venue_galery`
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_lapangan`
--
ALTER TABLE `venue_lapangan`
  ADD PRIMARY KEY (`id_lapangan`),
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_membership`
--
ALTER TABLE `venue_membership`
  ADD PRIMARY KEY (`id_membership`),
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_operasional`
--
ALTER TABLE `venue_operasional`
  ADD PRIMARY KEY (`id_operasional`),
  ADD KEY `id_venue` (`id_venue`);

--
-- Indexes for table `venue_price`
--
ALTER TABLE `venue_price`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `id_venue` (`id_venue`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indexes for table `venue_review`
--
ALTER TABLE `venue_review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_venue` (`id_venue`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id_verification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `id_venue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `venue_aktivitas`
--
ALTER TABLE `venue_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue_aktivitas_member`
--
ALTER TABLE `venue_aktivitas_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `venue_booking`
--
ALTER TABLE `venue_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `venue_fasilitas`
--
ALTER TABLE `venue_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue_lapangan`
--
ALTER TABLE `venue_lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue_operasional`
--
ALTER TABLE `venue_operasional`
  MODIFY `id_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `venue_price`
--
ALTER TABLE `venue_price`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `venue_review`
--
ALTER TABLE `venue_review`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id_verification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venues`
--
ALTER TABLE `venues`
  ADD CONSTRAINT `venues_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `venue_aktivitas`
--
ALTER TABLE `venue_aktivitas`
  ADD CONSTRAINT `venue_aktivitas_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);

--
-- Constraints for table `venue_aktivitas_member`
--
ALTER TABLE `venue_aktivitas_member`
  ADD CONSTRAINT `venue_aktivitas_member_ibfk_1` FOREIGN KEY (`id_aktivitas`) REFERENCES `venue_aktivitas` (`id_aktivitas`),
  ADD CONSTRAINT `venue_aktivitas_member_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_booking`
--
ALTER TABLE `venue_booking`
  ADD CONSTRAINT `venue_booking_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`),
  ADD CONSTRAINT `venue_booking_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `venue_booking_detail`
--
ALTER TABLE `venue_booking_detail`
  ADD CONSTRAINT `venue_booking_detail_ibfk_1` FOREIGN KEY (`id_price`) REFERENCES `venue_price` (`id_price`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venue_booking_detail_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `venue_booking` (`id_booking`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_fasilitas`
--
ALTER TABLE `venue_fasilitas`
  ADD CONSTRAINT `venue_fasilitas_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);

--
-- Constraints for table `venue_galery`
--
ALTER TABLE `venue_galery`
  ADD CONSTRAINT `venue_galery_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);

--
-- Constraints for table `venue_lapangan`
--
ALTER TABLE `venue_lapangan`
  ADD CONSTRAINT `venue_lapangan_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);

--
-- Constraints for table `venue_membership`
--
ALTER TABLE `venue_membership`
  ADD CONSTRAINT `venue_membership_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);

--
-- Constraints for table `venue_operasional`
--
ALTER TABLE `venue_operasional`
  ADD CONSTRAINT `venue_operasional_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_price`
--
ALTER TABLE `venue_price`
  ADD CONSTRAINT `venue_price_ibfk_1` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`),
  ADD CONSTRAINT `venue_price_ibfk_2` FOREIGN KEY (`id_lapangan`) REFERENCES `venue_lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue_review`
--
ALTER TABLE `venue_review`
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `venue_review_ibfk_2` FOREIGN KEY (`id_venue`) REFERENCES `venues` (`id_venue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
