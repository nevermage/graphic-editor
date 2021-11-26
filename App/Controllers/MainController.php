<?php

namespace App\Controllers;

use Classes\View;
use Classes\Pictures;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../View/Templates');
    }

    public function addFigurePage()
    {
        $this->view->renderPage('addFigure.php');
    }
    public function allFiguresPage()
    {
        $p = new Pictures();
        $images = $p->getAll();
        $this->view->renderPage('allFigures.php', $images);
    }

}
