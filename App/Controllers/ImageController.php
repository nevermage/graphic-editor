<?php

namespace App\Controllers;

use Classes\Image;

class ImageController
{
    public function uploadImage()
    {
        $a = new Image();
    }

    public function drawFigure()
    {
        $z = json_decode(file_get_contents('php://input'), true);
        $a = new Image();
        $a->draw($z['type'], $z['color']);
        echo $a->getName();
    }

    public function saveToDatabase()
    {
        $a = new Image();
        $a->saveToDatabase();
    }
}