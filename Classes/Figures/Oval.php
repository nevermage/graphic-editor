<?php

namespace Classes\Figures;

use Classes\Figure;

class Oval extends Figure
{
    public $height;
    public $width;

    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->height = $dots['height'];
        $this->width = $dots['width'];
    }
    public function addFigure()
    {
        imageellipse($this->image,$this->x1, $this->y1, $this->width, $this->height, $this->color);
    }
}
