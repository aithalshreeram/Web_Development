-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 02:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION
    ;
SET
    time_zone = "+05:30";
CREATE TABLE `transaction`(
    `Sno` INT(3) NOT NULL,
    `Sender` VARCHAR(55) NOT NULL,
    `Receiver` VARCHAR(55) NOT NULL,
    `Amount` INT(11) NOT NULL,
    `Date and Time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; INSERT INTO `transaction`(
        `Sno`,
        `Sender`,
        `Receiver`,
        `Amount`,
        `Date and Time`
    )
VALUES(
    1,
    'SHREYAS E',
    'SAMARTH',
    1000,
    '2021-07-05 19:47:59'
),
(
    2,
    'SAMARTH',
    'SANKET',
    2000,
    '2021-07-05 20:08:05'
),
(
    3,
    'SHAILESH',
    'SHREYAS E',
    2000,
    '2021-07-05 20:49:06'
),
(
    4,
    'PRAJWAL',
    'SHAILESH',
    1000,
    '2021-07-05 21:00:53'
),
(
    5,
    'SHREYAS T',
    'SHAILESH',
    8000,
    '2021-07-05 21:28:51'
),
(
    6,
    'SHAILESH',
    'SHREYAS T',
    7000,
    '2021-07-05 22:46:54'
),
(
    7,
    'PRAJWAL',
    'SHREYAS T',
    1000,
    '2021-07-06 00:26:06'
),
(
    8,
    'NIRANJAN',
    'SAMARTH',
    2000,
    '2021-07-06 00:30:53'
),
(
    9,
    'PRAJWAL',
    'SHREYAS E',
    1000,
    '2021-07-06 00:32:49'
),
(
    10,
    'PRAJWAL',
    'SHREYAS E',
    4000,
    '2021-07-06 11:53:35'
);
CREATE TABLE `users`(
    `Branch_Id` INT(5) NOT NULL,
    `Name` TEXT NOT NULL,
    `Email` VARCHAR(30) NOT NULL,
    `Account_Balance` INT(8) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4; INSERT INTO `users`(
    `Branch_id`,
    `Name`,
    `Email`,
    `Account_Balance`
)
VALUES(
    10001,
    'SHREAYS E',
    'shreyas.e@gmail.com',
    34898
),
(
    10002,
    'SANKET',
    'sanket.gpatil@gmail.com',
    50002
),
(
    10003,
    'SHAILESH',
    'shailesh.kumar@gmail.com',
    10200
),
(
    10004,
    'SAMARTH',
    'samarth.pshet@gmail.com',
    18800
),
(
    10005,
    'SREEKAR',
    'sreekar.o@gmail.com',
    20101
),
(
    10006,
    'PRAJWAL',
    'prajwalkumar@email.com',
    10801
),
(
    10007,
    'SHREYAS T',
    'shreyast@email.com',
    10990
),
(
    10008,
    'NIRANJAN',
    'niranjan@email.com',
    10000
),
(
    10009,
    'VINAY',
    'vinay@email.com',
    10700
),
(
    10010,
    'KARTHIK',
    'karthikraj@email.com',
    78099
);
ALTER TABLE
    `transaction` ADD PRIMARY KEY(`Sno`);
    --

    -- Indexes for table `users`
    --

ALTER TABLE
    `users` ADD PRIMARY KEY(`Branch_Id`);
    --

    -- AUTO_INCREMENT for dumped tables
    --

    --

    -- AUTO_INCREMENT for table `transaction`
    --

ALTER TABLE
    `transaction` MODIFY `Sno` INT(3) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;
    /*!40101
SET
    @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
    /*!40101
SET
    @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
    /*!40101
SET
    @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
    /*!40101
SET NAMES
    utf8mb4 */;