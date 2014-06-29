<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'vendor/autoload.php';

use \Hyan\Model\Database as Db;

$app = new \Slim\Slim();

$app->config(array(
    'debug' => true,
    'mode' => 'development',
    'templates.path' => 'views',
    'view' => '\Slim\LayoutView',
    'layout' => 'template.php'
));

$app->get('/', function () use($app) {
    $database = new Classes\Model\Database();
    $app->render("pages/home.php");
});

$app->run();