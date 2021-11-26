<?php

namespace Classes;

abstract class Figure
{
    public $x1;
    public $y1;
    public $color;
    public $image;

    public function __construct($file, $imageType)
    {
        if ($imageType == 'png') {
            $this->image = imagecreatefrompng($file);
        }
        if ($imageType == 'jpg') {
            $this->image = imagecreatefromjpeg($file);
        }
    }
    public function setColor(string $id)
    {
        if ($id == 'red') {
            $this->color = imagecolorallocate($this->image, 255, 0, 0);
        }
        if ($id == 'white') {
            $this->color= imagecolorallocate($this->image, 255, 255, 255);
        }
        if ($id == 'black') {
            $this->color= imagecolorallocate($this->image, 0, 0, 0);
        }
        if ($id == 'blue') {
            $this->color= imagecolorallocate($this->image, 0, 0, 255);
        }
        if ($id == 'green') {
            $this->color= imagecolorallocate($this->image, 0, 255, 0);
        }
        if ($id == 'yellow') {
            $this->color= imagecolorallocate($this->image, 255, 255, 0);
        }
    }

    abstract public function setDots($dots);
    abstract public function addFigure($imgFile);
}
