<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->config(array(
    'debug' => true,
    'mode' => 'development',
    'templates.path' => 'views',
    'view' => '\Slim\LayoutView',
    'layout' => 'template.php'
));

$app->get('/', function () use($app) {
    $database = new Model\Database();
    $app->render("pages/home.php");
});

$app->run();