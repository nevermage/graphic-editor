<?php

namespace Classes\Figures;

use Classes\Figure;

class Square extends Figure
{
    public $squareLength;
    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->squareLength = $dots['squareLength'];
    }
    public function addFigure($imgFile)
    {
        $x2 = intval($this->x1) + $this->squareLength;
        $y2 = intval($this->y1) + $this->squareLength;
        imagerectangle($this->image,$this->x1, $this->y1, $x2, $y2, $this->color);
        imagepng($this->image, $imgFile);
    }
}