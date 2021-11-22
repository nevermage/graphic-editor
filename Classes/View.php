<?php

namespace Classes;

class View
{
    private $template;

    public function __construct(string $template)
    {
        $this->template = $template;
    }

    public function renderPage(string $templateName, $images = [], $code = 200)
    {
        http_response_code($code);

        ob_start();
        include $this->template . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();
        include '../App/View/Layouts/main.php';
    }
}
