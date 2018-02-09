<?php

namespace ImGrowth\Layout\Dashboard;



use Phi\Template\PHPTemplate;

class Main extends PHPTemplate
{

    public function render($template = null, $values = null)
    {
        return parent::render(__DIR__.'/template/main.php', $values);
    }



}