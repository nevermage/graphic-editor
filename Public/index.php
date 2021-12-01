<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require '../vendor/autoload.php';
use Classes\Router;
use Classes\DotEnv;

$dotenv = new Dotenv(__DIR__ . '/../.env');
$dotenv->load();

$route = new Router();
$route->getDestination();
