<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//$dsn = 'mysql:dbname=testTask;host=127.0.0.1';
//$user = 'root';
//$password = 'root';
//
//$pdo = new PDO($dsn, $user, $password);
//$stmt = $pdo->query("select * from images");
//$result = $stmt->fetchAll();
//var_dump($result);

//print_r($_FILES['inputImg']);

header("Content-type: image/png");
$im = imagecreatefrompng($_FILES['inputImg']['tmp_name']);
imagepng($im);
var_dump($im);