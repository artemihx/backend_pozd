<?php

namespace View;

class View
{
    private $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars = [], int $code = 200)
    {
        http_response_code($code);
        extract($vars);

        include $this->templatesPath . '/' . $templateName;

        //$buffer = ob_get_contents();
        if (ob_get_contents()) ob_end_clean();

    }
}