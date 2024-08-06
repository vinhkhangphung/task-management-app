<?php

require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(["SERVERNAME", "USERNAME", "PASSWORD", "DBNAME"]);

include 'routes.php';
