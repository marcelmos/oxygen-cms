<?php

// declare(strict_type=1);

namespace App;

class SystemController {

    private View $view;
    public function __construct(
        private Request $request
    ) {
        $this->view = new View(
            $this->request->action()
        );
    }

    public function process(): void{
        // Routing
        $action = $this->request->action();
        if(!method_exists($this, $action)){
            $this->error404();
        }

        $this->$action();
    }

    private function index(): void{
        $this->view->renderSys('ox-default');
    }

    private function ox_pages(): void{
        $this->view->renderSys('ox-pages');
    }

    private function ox_articles(): void{
        $this->view->renderSys('ox-articles');
    }

    private function ox_media(): void{
        $this->view->renderSys('ox-media');
    }

    private function ox_users(): void{
        $this->view->renderSys('ox-users');
    }

    private function ox_settings(): void{
        $this->view->renderSys('ox-settings');
    }

    private function error404(): void{
        $this->view->render('404');     // Use 404 pages from ../view
    }
}