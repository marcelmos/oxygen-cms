<?php

use App\SystemController;
use App\Request;

include_once "../vendor/autoload.php";
include_once "../src/databaseActions.php";

const APP_DIR = __DIR__;

$request = new Request($_GET, $_POST, $_SERVER);

$controller = new SystemController($request);
$controller->process();