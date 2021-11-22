<?php

namespace Classes;

class Image
{
    public $file;
    public $width;
    public $height;

    public function __construct()
    {
        if ($_SESSION['imgFile']) {
            $this->file = $_SESSION['imgFile'];
            echo '1';
        } else {
            $this->file = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
        }
        $this->width = imagesx($this->file);
        $this->height = imagesy($this->file);
        $this->saveFileToSession();
    }

    public function setPictureWidth(int $width)
    {
        $this->width = $width;
    }
    public function getPictureWidth()
    {
        return $this->width;
    }

    public function setPictureHeight(int $height)
    {
        $this->height = $height;
    }
    public function getPictureHeight()
    {
        return $this->height;
    }

    public function getNewImageName()
    {
        $files = scandir('img/', SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        if ($newest_file === '..') {
            $l = 1;
        } else {
            $l = intval(pathinfo($newest_file, PATHINFO_FILENAME)) + 1;
        }
        return "img/$l.png";
    }

    public function savePicture()
    {
        imagepng($this->file, $this->getNewImageName());
    }

    public function saveFileToSession()
    {
        $_SESSION['imgFile'] == $this->file;
    }
}