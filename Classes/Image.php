<?php

namespace Classes;

require '../vendor/autoload.php';

use Classes\Figures\Circle;
use Classes\Figures\Dot;
use Classes\Figures\Line;
use Classes\Figures\Oval;
use Classes\Figures\Parallelogram;
use Classes\Figures\Rectangle;
use Classes\Figures\Square;
use Classes\Figures\Triangle;
use Classes\Figures\Text;

class Image
{
    public $file;
    public $fileName;
    public $width;
    public $height;
    public $dots;
    public $imageType;

    public function __construct()
    {
        if (!isset($_FILES['fileToUpload']['tmp_name'])) {
            $x = pathinfo($_SESSION['fileName']);
            $this->imageType = $x['extension'];
            $this->fileName = $_SESSION['fileName'];
            if ($this->imageType == 'png') {
                $this->file = imagecreatefrompng($this->fileName);
            }
            if ($this->imageType == 'jpg') {
                $this->file = imagecreatefromjpeg($this->fileName);
            }
        } else {
            $this->imageType = exif_imagetype($_FILES['fileToUpload']['tmp_name']);
            if ($this->imageType == 3) {
                $this->file = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
                $this->imageType = 'png';
            }
            if ($this->imageType == 2) {
                $this->imageType = 'jpg';
                $this->file = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
            }
            $this->fileName = $this->getNewImageName();
        }
        $this->savePicture();
        $this->width = imagesx($this->file);
        $this->height = imagesy($this->file);
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

    public function getName()
    {
        return $this->fileName;
    }
    public function getNewImageName()
    {
        $path = "img/";
        $files = scandir($path, SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        if ($newest_file === '..') {
            $l = 1;
        } else {
            $latest_ctime = 0;
            $latest_filename = '';
            $d = dir($path);
            while (false !== ($entry = $d->read())) {
                $filepath = "{$path}/{$entry}";
                // could do also other checks than just checking whether the entry is a file
                if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
                    $latest_ctime = filectime($filepath);
                    $latest_filename = $entry;
                }
            }
            $l = intval(pathinfo($latest_filename, PATHINFO_FILENAME)) + 1;
        }
        return "img/$l.png";
    }

    public function savePicture()
    {
        imagepng($this->file, $this->getName());
        $_SESSION['fileName'] = $this->getName();
    }

    public function updateClassObject()
    {
        if ($this->imageType == 'png') {
            $this->file = imagecreatefrompng($this->fileName);
        }
        if ($this->imageType == 'jpg') {
            $this->file = imagecreatefromjpeg($this->fileName);
        }
    }

    public function setDots()
    {
        $z = json_decode(file_get_contents('php://input'), true);
        $dots = [
            'x1' => $z['x1'],
            'y1' => $z['y1'],
        ];
        if ($z['type'] == 'Square') {
            $dots += ['squareLength' => $z['squareLength']];
        }
        if ($z['type'] == 'Rectangle') {
            $dots += [
                'x2' => $z['x2'],
                'y2' => $z['y2'],
            ];
        }
        if ($z['type'] == 'Parallelogram') {
            $dots += [
                'x2' => $z['x2'],
                'y2' => $z['y2'],
                'x3' => $z['x3'],
                'y3' => $z['y3'],
                'x4' => $z['x4'],
                'y4' => $z['y4'],
            ];
        }
        if ($z['type'] == 'Oval') {
            $dots += [
                'height' => $z['height'],
                'width' => $z['width'],
            ];
        }
        if ($z['type'] == 'Circle') {
            $dots += [
                'radius' => $z['radius']
            ];
        }
        if ($z['type'] == 'Line') {
            $dots += [
                'x2' => $z['x2'],
                'y2' => $z['y2'],
            ];
        }
        if ($z['type'] == 'Triangle') {
            $dots += [
                'x2' => $z['x2'],
                'y2' => $z['y2'],
                'x3' => $z['x3'],
                'y3' => $z['y3'],
            ];
        }
        if ($z['type'] == 'Text') {
            $dots += [
                'font' => $z['font'],
                'text' => $z['text'],
            ];
        }
        $this->dots = $dots;
    }
    public function draw(string $type, string $color)
    {
        $this->setDots();
        if ($type == "Square") {
            $Figure = new Square($this->getName(), $this->imageType);
        }
        if ($type == "Rectangle") {
            $Figure = new Rectangle($this->getName(), $this->imageType);
        }
        if ($type == "Parallelogram") {
            $Figure = new Parallelogram($this->getName(), $this->imageType);
        }
        if ($type == "Oval") {
            $Figure = new Oval($this->getName(), $this->imageType);
        }
        if ($type == "Circle") {
            $Figure = new Circle($this->getName(), $this->imageType);
        }
        if ($type == "Dot") {
            $Figure = new Dot($this->getName(), $this->imageType);
        }
        if ($type == "Line") {
            $Figure = new Line($this->getName(), $this->imageType);
        }
        if ($type == "Triangle") {
            $Figure = new Triangle($this->getName(), $this->imageType);
        }
        if ($type == "Text") {
            $Figure = new Text($this->getName(), $this->imageType);
        }
        $Figure->setColor($color);
        $Figure->setDots($this->dots);
        $Figure->addFigure($this->getName());
        $this->updateClassObject();
    }


    public function saveToDatabase()
    {
        $save = new Pictures();
        $z = json_decode(file_get_contents('php://input'), true);
        $save->saveToDatabase($this->fileName, $z['author']);
    }
}
