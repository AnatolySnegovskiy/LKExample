<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once __DIR__ . '/libs/Core/Base.class.php';
require_once __DIR__ . '/libs/Core/Template.class.php';
require_once __DIR__ . '/libs/Core/Page.class.php';

global $template;

$lk = new Base;
$template = new Template($lk);

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

require_once 'router.php';