<?php

namespace Classes\Figures;

use Classes\Figure;

class Dot extends Figure
{
    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
    }
    public function addFigure($imgFile)
    {
        imagesetpixel($this->image,$this->x1, $this->y1, $this->color);
        imagepng($this->image, $imgFile);
    }
}