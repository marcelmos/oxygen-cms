<?php

// declare(strict_type=1);

namespace App;

class Request {

    public function __construct(
        private array $get,
        private array $post,
        private array $server
    ) {}

    public function action(): string{
        return $this->get['action'] ?? 'index';
    }
}
