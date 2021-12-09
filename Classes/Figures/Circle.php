<?php

namespace Classes\Figures;

use Classes\Figure;

class Circle extends Figure
{
    public $radius;

    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->radius = $dots['radius'];
    }
    public function addFigure()
    {
        imageellipse($this->image,$this->x1, $this->y1, $this->radius*2, $this->radius*2, $this->color);
    }
}