<?php

namespace Classes\Figures;

use Classes\Figure;

class Triangle extends Figure
{
    public $x2;
    public $y2;
    public $x3;
    public $y3;

    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->x2 = $dots['x2'];
        $this->y2 = $dots['y2'];
        $this->x3 = $dots['x3'];
        $this->y3 = $dots['y3'];
    }
    public function addFigure()
    {
        imageline($this->image,$this->x1, $this->y1, $this->x2, $this->y2, $this->color);
        imageline($this->image,$this->x2, $this->y2, $this->x3, $this->y3, $this->color);
        imageline($this->image,$this->x3, $this->y3, $this->x1, $this->y1, $this->color);
    }
}