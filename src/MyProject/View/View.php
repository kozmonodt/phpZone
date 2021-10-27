<?php

namespace MyProject\View;

class View
{
    private $templatesPath;
    private $extraVars = [];

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function setVar(string $name, $value): void
    {
        $this->extraVars[$name] = $value;
        
    }

    public function renderHTML(string $templateName, array $vars = [], int $responseCode = 200)
    {
        http_response_code($responseCode);
        extract($this ->extraVars);

        extract($vars);
        ob_start();
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        echo $buffer;
    }
}