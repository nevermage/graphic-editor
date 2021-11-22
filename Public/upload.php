<?php
session_start();
require '../Classes/Image.php';
use Classes\Image;

if ($_FILES['fileToUpload']['tmp_name'] != "") {
    $a = new Image();
    $a->savePicture();
} else {
}

unset($_SESSION['imgFile']);
session_destroy();