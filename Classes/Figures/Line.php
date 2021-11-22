<?php

namespace Classes\Figures;

use Classes\Figure;

class Line extends Figure
{
    public $x2;
    public $y2;

    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->x2 = $dots['x2'];
        $this->y2 = $dots['y2'];
    }
    public function addFigure($imgFile)
    {
        imageline($this->image,$this->x1, $this->y1, $this->x2, $this->y2, $this->color);
        imagepng($this->image, $imgFile);
    }
}