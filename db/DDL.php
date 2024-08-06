<?php

// Connection
$conn = mysqli_connect($_ENV["SERVERNAME"], $_ENV["USERNAME"], $_ENV["PASSWORD"]);
if (!$conn) {
    die('Connection failed' . mysqli_connect_error());
}

// Query
$create_db = "CREATE DATABASE IF NOT EXISTS {$_ENV['DBNAME']}";
$activity = "CREATE TABLE IF NOT EXISTS Activity (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
content VARCHAR(30),
prio ENUM('High', 'Normal', 'Low') NOT NULL,
create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
finish BOOLEAN DEFAULT 0)";

// Create DB
if (!mysqli_query($conn, $create_db)) {
    echo 'failed to create database';
}
mysqli_close($conn);

// Create Table
$conn = mysqli_connect($_ENV["SERVERNAME"], $_ENV["USERNAME"], $_ENV["PASSWORD"], $_ENV["DBNAME"]);
if (!$conn) {
    die('Connection failed' . mysqli_connect_error());
}
if (!mysqli_query($conn, $activity)) {
    echo 'failed to create table';
}
mysqli_close($conn);

// Disconnect