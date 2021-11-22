<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//header("Content-type: image/png");

$files = scandir('img/', SCANDIR_SORT_DESCENDING);
$newest_file = $files[0];
if ($newest_file === '..') {
    $l = 1;
} else {
    $l = intval(pathinfo($newest_file, PATHINFO_FILENAME)) + 1;
}
$newPng = "img/$l.png";

$dsn = 'mysql:dbname=testTask;host=127.0.0.1';
$user = 'root';
$password = 'root';
$pdo = new PDO($dsn, $user, $password);
$sql = "INSERT INTO `testTask`.`images` (`author`, `image`, `date`) 
        VALUES ('$newPng', '" . $_POST['author'] . "', date(curdate()));";
$stmt = $pdo->query($sql);

//$result = $stmt->fetchAll();
//var_dump($result);

$im = imagecreatefrompng($_FILES['inputImg']['tmp_name']);
imagepng($im, $newPng);
imagedestroy($im);
