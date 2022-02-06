<?php

// declare(strict_type=1);

namespace App;

class View {

    public function __construct(
        private string $action
    ){
        echo "View, ";
    }

    public function render(string $template): void{
        include_once __DIR__ . "/../views/layout.php";
    }

    public function renderSys(string $template): void{

        if($template == 'ox-setup'){
            require_once APP_DIR . "/../system-views/" . $template . ".php";
        }else {
            include_once __DIR__ . "/../system-views/layout.php";
        }

    }
}
