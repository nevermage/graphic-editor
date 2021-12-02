<?php

namespace Classes\Figures;

use Classes\Figure;

class Text extends Figure
{
    public $text;
    public $font;

    public function setDots($dots)
    {
        $this->x1 = $dots['x1'];
        $this->y1 = $dots['y1'];
        $this->text = $dots['text'];
        $this->font = intval($dots['font']);
    }
    public function addFigure()
    {
        imagefttext($this->image, $this->font, 0, $this->x1, $this->y1, $this->color, 'fonts/Calibri.ttf', $this->text) ;
    }
}
