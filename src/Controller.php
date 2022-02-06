<?php

// declare(strict_type=1);


namespace App;

class Controller {

    private View $view;
    public function __construct(
        private Request $request
    ) {
        echo "Controller, ";

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
        $this->view->render('default');
    }

    private function blog(): void{
        $this->view->render('blog');
    }

    private function about(): void{
        $this->view->render('about');
    }

    private function faq(): void{
        $this->view->render('faq');
    }

    private function contact(): void{
        $this->view->render('contact');
    }

    private function post(): void{
        $this->view->render('post');
    }

    private function error404(): void{
        $this->view->render('404');
    }
}